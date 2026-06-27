<?php

namespace App\Mail;

use App\Models\Artwork;
use App\Models\ArtworkEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArtworkEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public ArtworkEnquiry $enquiry;
    public Artwork $artwork;

    /**
     * Create a new message instance.
     */
    public function __construct(ArtworkEnquiry $enquiry, Artwork $artwork)
    {
        $this->enquiry = $enquiry;
        $this->artwork = $artwork;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Artwork Enquiry: ' . $this->artwork->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.artwork-enquiry',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}