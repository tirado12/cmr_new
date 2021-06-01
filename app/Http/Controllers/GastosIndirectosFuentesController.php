<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosIndirectosFuentesController extends Controller
{
    //
    public function getDesgloseGI($cliente_id, $anio){

        $fuente_gi = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio)
                    ->where('fuente_financiamiento_id',2);
            })
            ->join('fuentes_gastos_indirectos', 'fuentes_gastos_indirectos.fuente_cliente_id', '=', 'id_fuente_financ_cliente')
            ->select('indirectos_id', 'monto')
            ->get();
        $fuente = DB::table('gastos_indirectos')
            ->select('nombre')
            ->get();
        return [$fuente,$fuente_gi];
    }
}
