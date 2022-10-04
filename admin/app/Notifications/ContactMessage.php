<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessage extends Notification
{
    use Queueable;
    private $contactEmail;    
    private $contactName;
    private $contactMessage;    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contactEmail, $contactName, $contactMessage)
    {
        $this->contactEmail = $contactEmail;
        $this->contactName = $contactName;
        $this->contactMessage = $contactMessage;
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
        return (new MailMessage)
                    ->line('Nom du contact : ' . $this->contactName)
                    ->line('Email du contact : ' . $this->contactEmail)
                    ->line("Message envoyé : " . $this->contactMessage);
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
