<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactReply;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');

        $messages = ContactMessage::latest()
            ->when($filter === 'unread', fn($q) => $q->where('is_read', false))
            ->when($filter === 'read', fn($q) => $q->where('is_read', true))
            ->paginate(10)
            ->withQueryString();

        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('admin.messages.index', compact('messages', 'filter', 'unreadCount'));
    }

    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return redirect()->route('admin.messages.index');
    }

    public function markAsRead(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return response()->json(['success' => true]);
    }

    public function reply(Request $request, ContactMessage $message)
    {
        $request->validate(['reply_body' => 'required|string|max:5000']);

        try {
            Mail::to($message->email)->send(new ContactReply(
                name: $message->name,
                email: $message->email,
                subjectLine: $message->service ?? 'Inquiry dari Website',
                replyBody: $request->input('reply_body'),
                originalMessage: $message->message,
                sentAt: $message->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB',
            ));
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Contact reply failed', ['email' => $message->email, 'error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Gagal mengirim balasan. Periksa konfigurasi email.'], 500);
        }

        $message->update(['is_read' => true]);

        Log::info('Contact reply sent', ['to' => $message->email, 'by' => auth()->user()->name]);

        return response()->json(['success' => true, 'message' => 'Balasan berhasil dikirim.']);
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
