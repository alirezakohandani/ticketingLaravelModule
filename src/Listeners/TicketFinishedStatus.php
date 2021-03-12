<?php

namespace Kohandani\Ticketing\Listeners;

use Modules\Ticketing\Events\TicketFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ticketFinishedStatus
{
    /**
     * Handle the event.
     *
     * @param TicketFinished $event
     * @return void
     */
    public function handle(TicketFinished $event)
    {
        $event->ticket->finishedStatus();
    }
}
