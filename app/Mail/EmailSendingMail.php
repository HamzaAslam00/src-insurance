<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    /**
     * Create a new message instance.
     */
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body =$body;
    }

    public function build()
    {
        return $this->subject($this->subject)->markdown('backend.emails.user-notification',['body' => $this->body]);
    }
}
