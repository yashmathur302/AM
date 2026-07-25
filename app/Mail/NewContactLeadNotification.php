<?php

namespace App\Mail;

use App\Models\ContactLead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactLeadNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public ContactLead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New contact enquiry from '.$this->lead->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-lead',
            with: ['lead' => $this->lead],
        );
    }
}
