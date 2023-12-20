<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    use Queueable;
    protected $user;
    protected $subject;



    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$subject)
    {
        //
        $this->user = $user;
        $this->subject = $subject;

        

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        dd($this->subject,$this->user);

        return (new MailMessage)
                ->subject($this->subject)
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email', route('verification.verify', $this->verificationUrl($this->user)))
                ->line('If you did not create an account, no further action is required.');
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
