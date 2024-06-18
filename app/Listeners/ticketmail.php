<?php

namespace App\Listeners;

use App\Events\raisedTicket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\sendMail;
class ticketmail
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
    public function handle(raisedTicket $event): void
    {
        // dd($event->ticketdata);
    }
}
