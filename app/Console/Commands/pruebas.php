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
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class pruebas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pruebas';

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

        $productos = Producto::with(array('marca' => function ($query) {
            $query->where('marcas.compania_id', 4);
        }))->get();
        foreach ($productos as $producto) {

            $producto->categorias()->sync([145, 152]);
//            $cat = CategoriaXProducto::where('producto_id', $producto->id)->first();
//            if (!$cat) {
//                $cat = new CategoriaXProducto();
//                $cat->producto_id = $producto->id;
//                $cat->categoria_id = 145;
//                $cat->save();
//
//                $cat = new CategoriaXProducto();
//                $cat->producto_id = $producto->id;
//                $cat->categoria_id = 152;
//                $cat->save();
//            }

        }
        exit();
//        $Producto = DB::table("productos")->join('marcas as m', 'm.id', '=', 'productos.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->update(["visible" => 0]);

//        $marcas = Marca::where("compania_id", 5)->delete();
//        $vendedores = Vendedor::join("companias_x_distribuidores as cxd", "cxd.id", '=', 'vendedores.compania_x_distribuidor_id')
//            ->where("distribuidor_id", 4)->delete();

//        $precios = PrecioProducto::join('productos_distribuidores as pd', 'pd.id', '=', 'precios_productos.producto_distribuidor_id')
//            ->join('productos as p', 'p.id', '=', 'pd.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
////        $precios = LogAbako::join('pedidos_x_productos as pp', 'pp.id', '=', 'log_abako.pedido_x_producto_id')
////            ->join('productos_distribuidores as pd', 'pd.id', '=', 'pp.producto_distribuidor_id')
////            ->join('productos as p', 'p.id', '=', 'pd.producto_id')
////            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
////            ->join('companias as c', 'c.id', '=', 'm.compania_id')
////            ->where('c.id', '=', 2)
////            ->delete();
////
//        $preciosOfertas = PrecioOferta::join('ofertas as o', 'o.id', '=', 'precios_ofertas.oferta_id')
//            ->join('productos_distribuidores as pd', 'pd.id', '=', 'o.producto_distribuidor_id')
//            ->join('productos as p', 'p.id', '=', 'pd.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//        $precios = PedidoXProducto::join('productos_distribuidores as pd', 'pd.id', '=', 'pedidos_x_productos.producto_distribuidor_id')
//            ->join('productos as p', 'p.id', '=', 'pd.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//
//        $oferta = Oferta::join('productos_distribuidores as pd', 'pd.id', '=', 'ofertas.producto_distribuidor_id')
//            ->join('productos as p', 'p.id', '=', 'pd.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//        $ProductoDistribuidor = ProductoDistribuidor::join('productos as p', 'p.id', '=', 'productos_distribuidores.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//        $CategoriaXProducto = CategoriaXProducto::join('productos as p', 'p.id', '=', 'categoria_producto.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//        $medias = Media::join('productos as p', 'p.id', '=', 'medias.producto_id')
//            ->join('marcas as m', 'm.id', '=', 'p.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('p.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//
//        $Producto = Producto::join('marcas as m', 'm.id', '=', 'productos.marca_id')
//            ->join('companias as c', 'c.id', '=', 'm.compania_id')
//            ->where('c.id', '=', 2)
//            ->whereNotIn('productos.cod_sap', ['84164721', '84157824', 'CO0879', 'OF0281', 'OF0282', 'CO1079', 'CO1149', 'CO0856', '573799', '584819', '84160062', '924023'])
//            ->delete();
//


        dd("ok");
    }
}
