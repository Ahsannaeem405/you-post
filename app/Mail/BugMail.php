<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BugMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
       
    $hardcodedImagePath = public_path('images/650157498769d.png');

    return $this->subject($this->details['subject'])
                ->view('email.bugEmail')
                ->attach($hardcodedImagePath, [
                    'as' => 'user_selected_image',
                    'mime' => 'image/png',
                ]);

    }

   
}
