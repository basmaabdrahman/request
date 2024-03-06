<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        $this->order=$order;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {$order=$event->order;
        $user=User::where('user_id',$event->order->user_id)->first();
        $user->notify(new OrderNotification($order));
        $users=User::where('user_id',$event->order->user_id)->get();
        \Illuminate\Support\Facades\Notification::send($users,new OrderNotification($order));

    }
}
