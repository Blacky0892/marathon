<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class NewUser extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        private string $email,
        private string $password
    )
    {}

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
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Эксперт в конкурсе')
            ->bcc('kozlovse@gppc.ru', 'Козлов Сергей Евгеньевич')
            ->bcc('mironovab@gppc.ru', 'Козлов Сергей Евгеньевич')
            ->markdown(
            'emails.expert', [
                'url' => config('app.url'),
                'email' => $this->email,
                'password' => $this->password
            ]
        );
    }

}
