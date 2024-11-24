<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
           SendEmailVerificationNotification::class,
        ],
         '\App\Events\ServicioSaved' => [ //Evento
        '\App\Listeners\OptimizeServicioImage' //Listener
        ]
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
            
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
