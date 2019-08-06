<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Event;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifySignedUpEvent extends Notification implements ShouldQueue
{
    use Queueable;
    public $event;
    public $title;
    public $text;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Event $event,$title,$text,$type)
    {
        $this->event = $event;
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
        return [
            'message'=>[
                'title'=>str_replace('NAME',$this->event->name,$this->title),
                'text'=>str_replace('NAME',$this->event->name,$this->text),
                'message_type_id'=>$this->type,
            ],
            'event'=>$this->event
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
