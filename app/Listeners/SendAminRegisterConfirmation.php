<?php

namespace App\Listeners;

use App\Events\AdminRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendAminRegisterConfirmation
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
     * @param  AdminRegistered  $event
     * @return void
     */
    public function handle(AdminRegistered $event)
    {
        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to Admin Panel. Hope you will enjoy our management system');
        Mail::send('emails.welcome
        mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Welcome to Admin Panel');
            $message->from('notification@adminpanel.com');
        });
    }
}
