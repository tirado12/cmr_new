<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_contratista';
    protected $table = "contratistas";
    

    protected $fillable = [
        'rfc',
        'razon_social',
        'nombre',
        'apellidos',
        'domicilio',
        'telefono',
        'correo',
        'numero_padron_contratista',
        'municipio_id',
    ];
}
