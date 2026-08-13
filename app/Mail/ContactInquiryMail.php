<?php

namespace App\Mail;

use App\Models\ContactSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactSubmission $submission) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New contact inquiry — '.$this->submission->name,
            replyTo: [
                new Address($this->submission->email, $this->submission->name),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.contact-inquiry',
        );
    }
}
