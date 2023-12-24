<?php

namespace App\Notifications;

use App\Mail\RegisterdMail;
use App\Models\Director;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterdEmailNotification extends Notification
{
    use Queueable;

    /**
     * Director Model.
     *
     * @var Director
     */
    protected $director;
    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password, Director $director)
    {
        $this->director = $director;
        $this->password = $password;
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
        return new RegisterdMail($this->password, $this->director);
    }
}
