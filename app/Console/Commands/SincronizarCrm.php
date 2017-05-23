<?php

namespace App\Console\Commands;

use App\Services\CrmService;
use Illuminate\Console\Command;

class SincronizarCrm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SincronizarCrm {servicio}';

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
        echo " Comienza sincronizacion de CRM" . chr(10) . chr(13);;
        $servicio = new CrmService($this->argument('servicio'));
        $servicio->enviarDatos();
        echo " Finaliza sincronizacion de CRM" . chr(10) . chr(13);;

    }
}
