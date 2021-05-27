<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable=[
        'acta_integracion_consejo',
        'acta_priorizacion',
        'prodim',
        'gastos_indirectos',
        'anio',
        'anio_inicio',
        'ani_fin',
        'municipio_id'
    ];
    protected $primaryKey = 'id_cliente';
}
