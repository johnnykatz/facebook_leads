<?php

namespace App\Console\Commands;

use App\Services\LandingsService;
use Illuminate\Console\Command;

class SincronizarLandingsEstructura extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SincronizarLandingsEstructura';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo " Comienza sincronizacion de estructura de Landings" . chr(10) . chr(13);
        $servicio = new LandingsService(null);
        $servicio->sincronizarEstructura();
        echo " Finaliza sincronizacion de estructura de Landings" . chr(10) . chr(13);
    }
}
