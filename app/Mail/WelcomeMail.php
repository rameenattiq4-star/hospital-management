<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * ✅ Image path store karne ke liye property
     */
    public $imagePath;

    /**
     * ✅ Constructor — Image path receive karta hai
     */
    public function __construct($imagePath = null)
    {
        $this->imagePath = $imagePath;
    }

    /**
     * Email ka subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Hospital Management System',
        );
    }

    /**
     * Email ka content (view)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }

    /**
     * ✅ ATTACHMENT — Image attach karta hai
     */
    public function attachments(): array
    {
        if ($this->imagePath && file_exists($this->imagePath)) {
            return [
                Attachment::fromPath($this->imagePath)
                    ->as('hospital-image.jpg')
                    ->withMime('image/jpeg'),
            ];
        }

        return [];
    }
}