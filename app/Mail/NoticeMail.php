<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NoticeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function build()
    {
        return $this->subject('Policy Notice Update')
                    ->view('emails.notice')
                    ->with('username', $this->username);
    }

}
