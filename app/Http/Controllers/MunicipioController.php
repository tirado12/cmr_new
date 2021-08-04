<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use App\Models\Distrito;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MunicipioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipio = Municipio::with('distrito')->get();
        
        $distrito = Distrito::join('regiones', 'regiones.id_region', '=', 'distritos.region_id')
        ->select('id_distrito','distritos.nombre', 'regiones.nombre as nombre_region')
        ->orderBy('id_distrito')
        ->get();
         //$roles_list=Role::all();
        return view('municipio.index',compact('municipio','distrito'));
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
        $request->validate([
            'nombre' => 'required',
            '' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ]);
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
        ])->assignRole($request->roles);
        
        return redirect()->route('admin.users.index');
      
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
    public function edit(Municipio $municipio)
    {
        $distrito=Distrito::all();
        return view('municipio.edit',compact('municipio','distrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        
        $request->validate([
            'nombre' => 'required',
            'distrito_id' => 'required',
            'rfc' => 'required',
            'direccion' => 'required'
        ]);

        $municipio->update($request->all());
        
        return redirect()->route('municipio.index');
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

    
    // ======================= Funciones API ====================== //

    public function getMunicipio($id_municipio){
        $municipio = Municipio::where('id_municipio', $id_municipio)->first();
        return response()->json($municipio,200);
    }


}
