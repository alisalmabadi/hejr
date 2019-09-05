<?php

namespace App\Listeners;

use App\Events\SignedUpUserEvent;
use App\Mail\UserWelcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class WelcomeEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SignedUpUserEvent  $event
     * @return void
     */
    public function handle(SignedUpUserEvent $event)
    {
        $user = $event->getUser();
        if($user->email != null) {
            \Mail::to($user)->send(new UserWelcomeEmail($user));
            \Log::info('email sent!');
        }
    }
}
