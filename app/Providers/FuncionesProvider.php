<?php

namespace App\Providers;


class FuncionesProvider
{
    public static function  limpiaCadena($cadena)
    {
        $charset='UTF-8'; // o 'UTF-8'
        $cadena=  iconv($charset, 'ASCII//TRANSLIT', $cadena);

        return  preg_replace("/[^A-Za-z0-9 ]/", '', $cadena);
        return (preg_replace('[^ A-Za-z0-9_-ñÑ]', '', $cadena));
    }

}
