<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetASickReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $leaveData;

    /**
     * Create a new message instance.
     */
    public function __construct(Request $leaveData)
    {
        $this->leaveData = $leaveData;
    }


    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('backend.emails.leave_created')  // Make sure to create this view in resources/views/emails
                    ->with([
                        'leaveData' => $this->leaveData,
                    ]);
    }
}
