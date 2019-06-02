<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $message,$subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from,$subject,$message)
    {
        $this->from($from);
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.guest.contact')
                    ->with([
                        'subjects' => $this->subject,
                        'messages' => $this->message,
                    ]);
    }
}
