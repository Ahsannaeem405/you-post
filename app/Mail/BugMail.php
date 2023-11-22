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
//        $path = $this->details['imagePath'];
//        dd($path);
//     $hardcodedImagePath = public_path('images/'.$this->details['imagePath'] );
//     // $hardcodedImagePath = public_path('images/1-01.png');
// dd($hardcodedImagePath);

    return $this->subject($this->details['subject'])
                ->view('email.bugEmail');
                // ->attach($hardcodedImagePath, [
                //     'as' => 'user_selected_image',
                //     'mime' => 'image/jpeg,png,jpg',
                // ]);

    }

   
}
