<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $subjectLine,
        public readonly string $replyBody,
        public readonly string $originalMessage,
        public readonly string $sentAt,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: ' . $this->subjectLine,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.reply',
        );
    }
}
