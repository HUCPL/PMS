<?php

namespace App\Listeners;

use App\Events\propertyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\sendMail;
class propertyListener
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
    public function handle(propertyMail $event): void
    {
        Mail::to($event->eventdata['Email'])->cc($event->eventdata['ccEmail'])->send(new sendMail($event->eventdata));
    }
}
