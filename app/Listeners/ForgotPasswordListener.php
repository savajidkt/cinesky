<?php

namespace App\Listeners;

use App\Events\ForgotPasswordEvent;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ForgotPasswordListener
{
    /**
     * Handle the event.
     *
     * @param  ForgotPasswordEvent  $event
     * @return void
     */
    public function handle(ForgotPasswordEvent $event)
    {
        $event->user->notify(new ForgotPasswordNotification($event->user));
    }
}
