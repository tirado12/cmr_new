<?php

namespace App\Http\Controllers;

use App\Models\FuentesCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuenteClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Fuente Cliente";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
    // ======================= Funciones API ========================= //
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
