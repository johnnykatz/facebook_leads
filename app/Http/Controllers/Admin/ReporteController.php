<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Formulario;
use App\Models\Admin\Landing;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{


    public function reporteFormularios(Request $request)
    {
        $formularios = Formulario::orderBy('activo', 'DESC')->orderBy('nombre', 'ASC')->get();
        return view('admin.reportes.reporte_formularios')->with(['formularios' => $formularios]);
    }


    /*
     *
     */
    public function excelReporteFormularios(Request $request)
    {
        if ($request['fecha'] == '') {
            if (isset($request['formulario']) & count($request['formulario']) > 0) {
                $datos = array();
                foreach ($request['formulario'] as $form) {
                    $formulario = Formulario::find($form);
                    if ($formulario) {
                        $cantidad = DB::select('SELECT count(id) as cantidad
                          FROM ' . $formulario->db_name);

                        $enviado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=1');

                        $rechazado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=2');

                        $filtrado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=3');

                        $datos[] = array(
                            "formulario" => $formulario->nombre,
                            "form id" => $formulario->form_id,
                            "cantidad_leads" => $cantidad[0]->cantidad,
                            "leads_enviados_con_exito" => $enviado[0]->cantidad,
                            "leads_rechazados" => $rechazado[0]->cantidad,
                            "leads_filtrados" => $filtrado[0]->cantidad
                        );
                    }
                }
            }
        } else {
            $fechas = explode("-", $request['fecha']);
            $fecha_inicio = date("Y-m-d", strtotime($this->guardarFecha(trim($fechas[0]))));
            $fecha_fin = date("Y-m-d", strtotime($this->guardarFecha(trim($fechas[1]))));

            if (isset($request['formulario']) & count($request['formulario']) > 0) {
                $datos = array();
                foreach ($request['formulario'] as $form) {
                    $formulario = Formulario::find($form);
                    if ($formulario) {
                        $cantidad = DB::select('SELECT count(id) as cantidad
                          FROM ' . $formulario->db_name .
                            ' WHERE date(created_time) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

//                        dd(DB::getQueryLog());
                        $enviado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=1 and
                          date(created_time) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');


                        $rechazado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=2 and
                          date(created_time) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

                        $filtrado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $formulario->db_name . ' as a
                          
                          JOIN formularios_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estado_id=3 and 
                          date(created_time) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

                        $datos[] = array(
                            "formulario" => $formulario->nombre,
                            "form id" => $formulario->form_id,
                            "cantidad_leads" => $cantidad[0]->cantidad,
                            "leads_enviados_con_exito" => $enviado[0]->cantidad,
                            "leads_rechazados" => $rechazado[0]->cantidad,
                            "leads_filtrados" => $filtrado[0]->cantidad
                        );
                    }
                }
            }

        }
        if (isset($datos)) {
            Excel::create('Leads', function ($excel) use ($datos) {
                $excel->sheet('Leads', function ($sheet) use ($datos) {
                    $sheet->fromArray($datos);
                });
            })->export("xls");

        }
    }

    public function reporteLandings(Request $request)
    {
        $landings = Landing::orderBy('activo', 'DESC')->orderBy('nombre', 'ASC')->get();
        return view('admin.reportes.reporte_landings')->with(['landings' => $landings]);
    }


    public function excelReporteLandings(Request $request)
    {
        if ($request['fecha'] == '') {
            if (isset($request['landing']) & count($request['landing']) > 0) {
                $datos = array();
                foreach ($request['landing'] as $land) {
                    $landing = Landing::find($land);
//                    dd($landing);
                    if ($landing) {
                        $cantidad = DB::select('SELECT count(id) as cantidad
                          FROM ' . $landing->db_name);

                        $enviado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=1');

                        $rechazado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=2');

                        $filtrado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=3');

                        $datos[] = array(
                            "landing" => $landing->nombre,
                            "canal" => $landing->canal,
                            "cantidad_leads" => $cantidad[0]->cantidad,
                            "leads_enviados_con_exito" => $enviado[0]->cantidad,
                            "leads_rechazados" => $rechazado[0]->cantidad,
                            "leads_filtrados" => $filtrado[0]->cantidad
                        );
                    }
                }
            }
        } else {
            $fechas = explode("-", $request['fecha']);
            $fecha_inicio = date("Y-m-d", strtotime($this->guardarFecha(trim($fechas[0]))));
            $fecha_fin = date("Y-m-d", strtotime($this->guardarFecha(trim($fechas[1]))));

            if (isset($request['landing']) & count($request['landing']) > 0) {
                $datos = array();
                foreach ($request['landing'] as $land) {
                    $landing = Formulario::find($land);
                    if ($landing) {
                        $cantidad = DB::select('SELECT count(id) as cantidad
                          FROM ' . $landing->db_name .
                            ' WHERE date(fecha_creacion) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

                        $enviado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=1 and
                          date(fecha_creacion) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');


                        $rechazado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=2 and
                          date(fecha_creacion) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

                        $filtrado = DB::select('SELECT count(a.id) as cantidad
                          FROM ' . $landing->db_name . ' as a
                          
                          JOIN landings_enviados_x_servicios as b
                          ON a.id=b.registro_id
                          WHERE b.estados_envio_id=3 and 
                          date(fecha_creacion) between "' . $fecha_inicio . '" and "' . $fecha_fin . '"');

                        $datos[] = array(
                            "landing" => $landing->nombre,
                            "canal" => $landing->canal,
                            "cantidad_leads" => $cantidad[0]->cantidad,
                            "leads_enviados_con_exito" => $enviado[0]->cantidad,
                            "leads_rechazados" => $rechazado[0]->cantidad,
                            "leads_filtrados" => $filtrado[0]->cantidad
                        );
                    }
                }
            }

        }
        if (isset($datos)) {
            Excel::create('Leads', function ($excel) use ($datos) {
                $excel->sheet('Leads', function ($sheet) use ($datos) {
                    $sheet->fromArray($datos);
                });
            })->export("xls");

        }
    }


    private function guardarFecha($fecha)
    {
        $fecha = str_replace("/", "-", $fecha);
        list($d, $m, $a) = explode('-', $fecha);
        return "$a-$m-$d";
    }
}
