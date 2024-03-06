<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    protected $order;
    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database','broadcast'];
        $channels = ['database'];

        if ($notifiable->notification_preferences['order_created']['database']??false){
            $channels[]='broadcast';
        }
        return $channels;
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
    public function toDatabase(object $notifiable): array
    {

        return [
            'body'=>"A new order (#{$this->order->id})",
            'icon'=>'nc-icon nc-bell-55',
            'url'=>url('')

        ];
    }
    public function toBroadcast($notifiable){
        $addr=$this->order->address;
        return new BroadcastMessage([
            'body'=>"A new order (#{$this->order->id}) created By {$addr->name} from {$addr->country_name}",
            'icon'=>'nc-icon nc-bell-55',
            'url'=>url('/dashboard'),
            'order_id'=>$this->order->id,
        ]);
    }
}
