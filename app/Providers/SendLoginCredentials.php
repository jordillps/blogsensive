<?php

namespace App\Providers;

use App\Providers\UserWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginCredentials;

class SendLoginCredentials
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        //Enviar el email con las credenciales del login

        Mail::to($event->user)->queue(
            new LoginCredentials($event->user, $event->password)
        );

    }
}
