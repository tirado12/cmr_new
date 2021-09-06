<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraModalidadEjecucion extends Model
{
    use HasFactory;

    protected $table = "obra_modalidad_ejecucion";

    protected $fillable = [
        'obra_id',
        'obra_administracion_id',
        'parte_social_tecnica_id',
        'obra_contrato_id'
    ];

    public function obra(){
        return $this->hasOne(Obra::class, 'id_obra', 'obra_id'); //arg1 - Model, arg2 - foreign key
    }

    public function obraAdmin(){
        return $this->hasOne(ObrasAdministracion::class, 'id_obra_administracion', 'obra_administracion_id'); //arg1 - Model, arg2 - foreign key
    }

    public function obraContrato(){
        return $this->hasOne(ObrasContrato::class, 'id_obra_contrato', 'obra_contrato_id'); //arg1 - Model, arg2 - foreign key
    }

    public function parteSocial(){
        return $this->hasOne(ParteSocialTecnica::class, 'id_parte_social_tecnica', 'parte_social_tecnica_id'); //arg1 - Model, arg2 - foreign key
    }
}