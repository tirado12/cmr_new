<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdimFuentesController extends Controller
{
    //
    public function getDesgloseProdim($cliente_id, $anio){

        $fuente_prodim = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio)
                    ->where('fuente_financiamiento_id',2);
            })
            ->join('fuentes_prodim', 'fuentes_prodim.fuente_financiamiento_cliente_id', '=', 'id_fuente_financ_cliente')
            ->select('prodim_id', 'monto')
            ->get();
        $fuente = DB::table('prodim_catalogo')
            ->select('id_prodim','nombre')
            ->get();
            $resources = array(
                'catalogo' => $fuente,
                'montos' => $fuente_prodim
                );
    
            return [$resources];
    }
}
