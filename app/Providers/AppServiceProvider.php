<?php

namespace App\Providers;

use App\Events\ImportCsvCompleted;
use App\Events\ImportCsvQueued;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function (JobProcessing $event) {
            event(new ImportCsvQueued());

            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });
 
        Queue::after(function (JobProcessed $event) {
            event(new ImportCsvCompleted());
            // $event->connectionName
            // $event->job
            // $event->job->payload()
        });
    }
}
