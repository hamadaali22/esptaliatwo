<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Doctor;
class DoctorNewNotification extends Notification
{
    use Queueable;
    private $name;
    private $title;
    private $desc;    
    
    public function __construct($name, $title,$desc)
    {
        $this->name= $name;
        $this->title=$title;
        $this->desc=$desc;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase()
    {
        return[
            'name'=>    $this->name,
            'object'=> $this->title,
            'data'=>  $this->desc
        ];
    }   
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
