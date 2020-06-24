<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ComputerAssistanceReport extends Notification
{
    use Queueable;


  private $computerassistance;
   
    /* 
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($computerassistance)
    {
        $this->computerassistance = $computerassistance;
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
        ->markdown('mail.computerasst.computerasst',
                    ['title' => $this->computerassistance['title'],
                    'department' => $this->computerassistance['department'],
                    'description' => $this->computerassistance['description'],   
                    'name' => $this->computerassistance['name']
                    ]);
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
