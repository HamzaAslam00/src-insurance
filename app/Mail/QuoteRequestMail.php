<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public $newUser;

    public $newUserPassword;

    public function __construct($email, $newUser, $newUserPassword)
    {
        $this->email = $email;
        $this->newUser = $newUser;
        $this->newUserPassword = $newUserPassword;
    }

    public function build()
    {
        return $this->subject('Quote Request Received')
            ->view('emails.quote-received')
            ->with([
                'email' => $this->email,
                'newUser' => $this->newUser,
                'newUserPassword' => $this->newUserPassword,
            ]);
    }
}
