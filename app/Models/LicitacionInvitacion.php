<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicitacionInvitacion extends Model
{
    use HasFactory;
    protected $table = "licitacion_invitacion";

    protected $fillable = [
        'padron_contratistas',
        'constancia_visita',
        'acta_junta_aclaraciones',
        'acta_apertura_tecnica',
        'dictamen_tecnico',
        'acta_apertura_economica',
        'dictamen_economico',
        'dictamen',
        'acta_fallo',
        'propuesta_licitantes_economica',
        'propuesta_licitantes_tecnica',
        'obra_contrato_id'
    ];
}
