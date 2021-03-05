<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfc',
        'razon_social',
        'representante_legal',
        'domicilio',
        'telefono',
        'correo',
        'numero_padron_contratista'
    ];
}
