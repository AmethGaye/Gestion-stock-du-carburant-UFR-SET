<?php

namespace App\Notifications;

use App\Models\Activite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ActiviteNotification extends Notification
{
    use Queueable;
    public $activite;

    /**
     * Create a new notification instance.
     */
    public function __construct(Activite $activite)
    {
        $this->activite=$activite;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'lieux'=>$this->activite->lieux,
            'ticket_demande'=>$this->activite->ticket_demande,
            'date'=>$this->activite->date,
        ];
    }
    public function toBroadCast($notifiable){
        return new BroadcastMessage(
           [
            'lieux'=>$this->activite->lieux,
            'ticket_demande'=>$this->activite->ticket_demande,
            'date'=>$this->activite->date,
       
           ]
           );
   }
}
