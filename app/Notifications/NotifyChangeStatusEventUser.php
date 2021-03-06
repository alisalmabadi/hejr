<?php

namespace App\Notifications;

use App\EventUser;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyChangeStatusEventUser extends Notification implements ShouldQueue
{
    use Queueable;
    public $eventuser;
    public $title;
    public $text;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(EventUser $eventuser,$title,$text,$type)
    {
        $this->eventuser = $eventuser;
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    /*public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

    public function toDatabase($notifiable)
    {
        $text= str_replace('NAME',$this->eventuser->event->name,$this->text);
        return [
            'message'=>[
                'title'=>str_replace('NAME',$this->eventuser->event->name,$this->title),
                'text'=>str_replace('STATUS',$this->eventuser->userstatus->name,$text),
                'message_type_id'=>$this->type,
            ],
            'eventuser'=>$this->eventuser
        ];
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
