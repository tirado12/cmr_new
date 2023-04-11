<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_region';
    
    protected $table = "regiones";

    protected $fillable = [
        'nombre',
        'estado_id'
    ];
}
