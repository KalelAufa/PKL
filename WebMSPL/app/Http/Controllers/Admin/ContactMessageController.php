<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

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

        return view('admin.messages.index', compact('messages', 'filter'));
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

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
