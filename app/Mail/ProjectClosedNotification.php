<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use App\Models\Proiect;

class ProjectClosedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '';

    public function __construct(public Proiect $proiect)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.project_closed'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
