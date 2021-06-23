<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RftController extends Controller
{
    //
    public function getRFT($cliente_id, $anio){

        $rft = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->join('rft', 'rft.obras_id', '=', 'obras.id_obra')
            ->orderBy('numero_obra')
            ->select('nombre_corto as nombre_obra','primer_trimestre','segundo_trimestre','tercer_trimestre','cuarto_trimestre', 'numero_obra')
            ->distinct()
            ->get();
        
        $sisplade = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio)
                    ->where('fuente_financiamiento_id',2);
            })
            ->join('sisplade', 'sisplade.fuentes_clientes_id', '=', 'id_fuente_financ_cliente')
            ->select('validado','planeado','capturado')
            ->get();
        
        $mids = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio)
                    ->where('fuente_financiamiento_id',2);
            })
            ->join('mids', 'mids.fuentes_clientes_id', '=', 'id_fuente_financ_cliente')
            ->select('planeado','validado','firmado')
            ->get();
        
        $resources = array(
                'rft' => $rft,
                'mids' => $mids,
                'sisplade' => $sisplade
                );
                return [$resources];
        return $obras;
    }
}
