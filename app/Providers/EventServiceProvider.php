<?php

namespace App\Providers;

use App\Events\RentalSaving;
use App\Listeners\RentalSavingListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
        RentalSaving::class => [
            RentalSavingListener::class
        ]
    ];

    public function shouldDiscoverEvents()
    {
        return true;
    }
}
