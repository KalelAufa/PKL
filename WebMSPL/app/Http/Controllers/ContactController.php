<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Cache\RateLimiter;

class ContactController extends Controller
{
    public function store(Request $request, RateLimiter $limiter)
    {
        $key = 'contact-form:' . $request->ip();

        if ($limiter->tooManyAttempts($key, 3)) {
            return response()->json([
                'success' => false,
                'message' => 'Terlalu banyak permintaan. Silakan coba lagi dalam 1 jam.',
            ], 429);
        }

        $limiter->hit($key, 3600);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
        ]);

        $contactMessage = ContactMessage::create($validated);

        Mail::raw(
            "Pesan baru dari {$validated['name']} ({$validated['email']})\n\n"
            . "Perusahaan: " . ($validated['company'] ?? '-') . "\n"
            . "Telepon: " . ($validated['phone'] ?? '-') . "\n"
            . "Layanan: " . ($validated['service'] ?? '-') . "\n\n"
            . "Pesan:\n{$validated['message']}",
            function ($message) {
                $message->to(env('MAIL_TO_ADDRESS', 'info@ptmsp.co.id'))
                    ->subject('Pesan Baru dari Form Kontak WebMSPL');
            }
        );

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim. Tim kami akan menghubungi Anda segera.',
        ]);
    }
}
