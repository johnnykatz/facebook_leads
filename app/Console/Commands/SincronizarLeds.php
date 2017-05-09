<?php

namespace App\Console\Commands;

use App\Models\Admin\CategoriaXProducto;
use App\Models\Admin\LogAbako;
use App\Models\Admin\Marca;
use App\Models\Admin\Media;
use App\Models\Admin\MovilwayProducto;
use App\Models\Admin\Oferta;
use App\Models\Admin\PedidoXProducto;
use App\Models\Admin\PrecioOferta;
use App\Models\Admin\PrecioProducto;
use App\Models\Admin\Producto;
use App\Models\Admin\ProductoDistribuidor;
use App\Models\Admin\Vendedor;
use App\Providers\FacebookProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SincronizarLeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SincronizarLeds';

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
        $facebook = new FacebookProvider();
        $facebook->sincronizarLeads();
    }
}
