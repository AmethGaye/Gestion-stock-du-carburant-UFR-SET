<?php

namespace App\Notifications;

use App\Models\Cours;
use App\Models\Vacataire;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Messages\BroadcastMessage;

class CoursNotification extends Notification
{
    use Queueable;
    public $cours;
    public $vacataire;

    /**
     * Create a new notification instance.
     */
    public function __construct(Cours $cours)
    {
        $this->cours=$cours;
        $this->vacataire = Vacataire::find($this->cours->vacataire_id);
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
            'nom_vacataire' => $this->vacataire ? $this->vacataire->nom : null,
        'prenom_vacataire' => $this->vacataire ? $this->vacataire->prenom : null,
        
        ];
    }
    public function toBroadCast($notifiable){
       
        return new BroadcastMessage(
           [

            'nom_vacataire' => $this->vacataire->nom,
            'prenom_vacataire' => $this->vacataire->prenom,
        
           ]
           );
   }
}
