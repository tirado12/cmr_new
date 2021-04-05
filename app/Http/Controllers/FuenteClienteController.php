<?php

namespace App\Http\Controllers;

use App\Models\FuentesCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuenteClienteController extends Controller
{
    //
    public function getFuentesCliente($cliente_id, $anio){
        $users = DB::table('fuentes_clientes')->join('fuentes_financiamientos', 'fuente_financiamiento_id', '=', 'fuentes_financiamientos.id_fuente_financiamiento')->select('id_fuente_financ_cliente', 'monto_proyectado', 'monto_comprometido', 'nombre_corto', )
            ->orWhere(function($query) use($cliente_id, $anio) {
                $query
                ->where('cliente_id', $cliente_id)
                    ->where('ejercicio',$anio);
            })
            ->get();
        return $users;
    }

}
