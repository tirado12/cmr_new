<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class MunicipioController extends Controller
{
    //

    public function getMunicipio($id_municipio){
        $municipio = Municipio::where('id_municipio', $id_municipio)->first();
        return response()->json($municipio,200);
    }


}
