<?php

namespace App\Console\Commands;

use App\Services\CrmService;
use App\Services\LandingsService;
use Illuminate\Console\Command;

class SincronizarLandings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SincronizarLandings {servicio}';

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
        echo " Comienza sincronizacion de Landings" . chr(10) . chr(13);
        $servicio = new LandingsService($this->argument('servicio'));
        $servicio->obtenerDatos();
        echo " Finaliza sincronizacion de Landings" . chr(10) . chr(13);




        echo " Comienza sincronizacion de Landings con el Crm" . chr(10) . chr(13);
        $servicio = new LandingsService($this->argument('servicio'));
        $servicio->enviarDatos();
        echo " Finaliza sincronizacion de Landings con el Crm" . chr(10) . chr(13);

    }
}
