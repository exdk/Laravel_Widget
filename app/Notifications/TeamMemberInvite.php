<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamMemberInvite extends Notification
{
    use Queueable;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage())
            ->subject(config('app.name') . ': Приглашение ')
            ->greeting('Добрый день,')
            ->line('приглашаем Вас присоединиться к личном кабинету нашей компании!')
            ->line('Пожалуйста, нажмите на ссылку ниже.')
            ->action('Зарегистироваться', $this->url)
            ->line('Спасибо! Ждем Вас на портале.')
            ->line(config('app.name') . ' ')
            ->salutation(' ');
    }
}
