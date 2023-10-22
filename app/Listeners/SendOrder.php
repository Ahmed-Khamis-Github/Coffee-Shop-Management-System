<?php

namespace App\Listeners;

use App\Events\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Order $event): void
    {
        $order = $event->order; 
        $user = User::where('role', 'admin')->first();
         if ($user) {
            $user->notify(new OrderNotification($order));
        }
    }
    }

