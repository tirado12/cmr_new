<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FuentesCliente;
use App\Models\Sisplade;
use App\Models\FuentesFinanciamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SispladeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$sisplade= Sisplade::join('fuentes_clientes','id_fuente_financ_cliente','fuentes_clientes_id')->get();
       $sisplade = Sisplade::with('fuentesCliente')->get();
       $fuentesCliente = FuentesCliente::with('clientes')->get();
       $clientes = Cliente::join('municipios', 'id_municipio', '=', 'municipio_id') //clientes existentes con sus municipios
       ->select('clientes.id_cliente', 'municipios.nombre')
       ->get();
       $fuentes = FuentesFinanciamiento::all(); //todas las fuentes de financiamiento
       //return $clientes->find($fuentesCliente[1]->cliente_id)->nombre;
        
       //return $sisplade;
        return view('sisplade.index',compact('fuentes','sisplade','fuentesCliente','clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::join('municipios', 'id_municipio', '=', 'municipio_id') //clientes existentes con sus municipios
       ->select('clientes.id_cliente', 'municipios.nombre')
       ->get();
       $fuenteClientes = FuentesCliente::with('clientes','fuente')->get(); //tabla fuenteClientes segun existentes 
       $fuentes = FuentesFinanciamiento::all(); //todas las fuentes de financiamiento
       //$cli = Cliente::has('municipio')->get();
       //return $cli;
        return view('sisplade.add_sisplade',compact('clientes','fuenteClientes','fuentes'));
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

    //========== funciones para select dinamico =================
    public function selectSearch($ejercicio,$cliente){
        //super explicacion, obtenemos las fuentes de financiamiento de las relacion Fuentesclientes existentes, a su vez filtramos segun el cliente elegido
        $fuenteCli = FuentesFinanciamiento::whereHas('fuentesClientes', function(Builder $query) use($ejercicio,$cliente){ 
            $query->where('ejercicio', $ejercicio)->where('cliente_id',$cliente);
        })
        ->get();        
        return response()->json($fuenteCli);
    }

    public function selectEjercicio($cliente){
        /*$fuenteCli = FuentesFinanciamiento::whereHas('fuentesClientes', function(Builder $query) use($cliente) { 
            $query->where('cliente_id', $cliente);
        })
        ->get(); */
        $fuenteClie = FuentesCliente::whereHas('clientes', function(Builder $query) use($cliente) { 
            $query->where('cliente_id', $cliente);
        })
        ->get();  
        return $fuenteClie;
    }

    

}
