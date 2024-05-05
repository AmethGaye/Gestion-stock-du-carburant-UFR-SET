<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Models\Remboursement_vac;

class ComptableNotification extends Notification
{
    use Queueable;
    public Remboursement_vac $comptableNotification;
    /**
     * Create a new notification instance.
     */
    public function __construct(Remboursement_vac $comptableNotification)
    {
        $this->comptableNotification=$comptableNotification ;
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
            'id_demande'=>$this->comptableNotification->id,
            'id_demandeur'=>$this->comptableNotification->user_id,
            'cours_id'=>$this->comptableNotification->cours_id,
            'nom_directeur' => auth()->user()->prenom . ' ' . auth()->user()->nom,
        ];
    }
    public function toBroadCast($notifiable){
         return new BroadcastMessage(
            [
            
            'id_demande'=>$this->comptableNotification->id,
            'id_demandeur'=>$this->comptableNotification->user_id,
            'cours_id'=>$this->comptableNotification->cours_id,
            'nom_directeur' => auth()->user()->prenom . ' ' . auth()->user()->nom,
        
            ]
            );
    }
}
