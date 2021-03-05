<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    //

    public function getMunicipio(){
        //$curso = Municipio::find($id);
        return response()->json(Municipio::all(),200);
    }
}
