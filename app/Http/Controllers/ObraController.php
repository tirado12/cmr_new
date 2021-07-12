<?php

namespace App\Http\Controllers;

use App\Custom\Ejemplo as CustomNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    //
    
    public function getObrasCliente($cliente_id, $anio){

        $obras = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
                    
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->orderBy('numero_obra')
            ->select('obras.nombre_corto as nombre_obra', 'nombre_archivo' ,'obras.monto_contratado','obras.monto_modificado',\DB::raw('round((obras.avance_tecnico + obras.avance_economico + obras.avance_fisico) / 3, 0) AS avance_tecnico'), 'acta_integracion_consejo', 'acta_priorizacion', 'adendum_priorizacion', 'obras.modalidad_ejecucion', 'obras.id_obra')
            ->distinct()
            ->get();
        $desglose = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
                    
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->join('desglose_pagos_obra', 'desglose_pagos_obra.obras_id', '=', 'obras.id_obra')
            ->select('id_obra', \DB::raw('count(desglose_pagos_obra.obras_id) as pagos_count'))
            ->where('desglose_pagos_obra.nombre', 'like', 'Estimacion%')
            ->groupBy('id_obra')
            ->get();
        
        $anticipo = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
                    
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->join('desglose_pagos_obra', 'desglose_pagos_obra.obras_id', '=', 'obras.id_obra')
            ->join('observaciones_desglose', 'observaciones_desglose.desglose_pagos_id','=', 'desglose_pagos_obra.id_desglose_pagos')
            
            ->select('id_obra', \DB::raw('count(desglose_pagos_obra.obras_id) as user_count'))
            ->groupBy('id_obra')
            ->get();
        $resources = array(
                'desglose' => $desglose,
                'obras' => $obras,
        );
            return [$resources];
            
    }

    public function sendMessage($mensaje, $id, $titulo){
        
        $response = new CustomNotification();
        $response1 =  $response->sendMessage($mensaje, $id, $titulo);
        $return["allresponses"] = $response1;
        $return = json_encode($return);
        
        $data = json_decode($response1, true);
        print_r($data);
        $id = $data['id'];
        print_r($id);

        print("\n\nJSON received:\n");
        print($return);
        print("\n");
    }
    public function getProdim($cliente_id, $anio){
        $prodim = DB::table('fuentes_clientes')
        ->orWhere(function($query) use($cliente_id, $anio) {
            $query->where('cliente_id', $cliente_id)
                ->where('ejercicio',$anio)
                ->where('fuente_financiamiento_id',2);
        })
        ->select('prodim','gastos_indirectos')
        ->get();

        $obras = DB::table('fuentes_clientes')
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
            })
            ->join('obras_fuentes', 'obras_fuentes.fuente_financiamiento_cliente_id', '=', 'fuentes_clientes.id_fuente_financ_cliente')
            ->join('obras', 'obras.id_obra', '=', 'obras_fuentes.obra_id')
            ->orderBy('id_obra')
            ->select('id_obra', 'nombre_corto')
            ->distinct()
            ->get();

        $resources = array(
            'prodim' => $prodim,
            'obras' => $obras,
        );
        return [$resources];
        
    }    
}
