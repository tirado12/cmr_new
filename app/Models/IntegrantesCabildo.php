<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrantesCabildo extends Model
{
    use HasFactory;
    
    protected $table = 'integrantes_cabildo';

    protected $fillable = [
        'nombre',
        'cargo',
        'telefono',
        'correo',
        'rfc',
        'municipío_id'
    ];
}
