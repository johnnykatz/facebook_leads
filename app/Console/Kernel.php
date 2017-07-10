<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        Commands\pruebas::class,
        Commands\SincronizarLeads::class,
        Commands\SincronizarEstructura::class,
        Commands\SincronizarCrm::class,
        Commands\SincronizarLandings::class,
        Commands\SincronizarLandingsCrm::class,
        Commands\SincronizarLandingsEstructura::class,

        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
