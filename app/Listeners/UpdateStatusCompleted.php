<?php

namespace App\Listeners;

use App\Events\ImportCsvEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStatusCompleted implements ShouldQueue
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
     * @param  \App\Events\ImportCsvEvent  $event
     * @return void
     */
    public function handle(ImportCsvEvent $event)
    {
        //
    }
}
