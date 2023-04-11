<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegrantesCabildo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_integrante';
    
    protected $table = 'integrantes_cabildo';

    protected $fillable = [
        'nombre',
        'cargo',
        'telefono',
        'correo',
        'rfc',
        'cliente_id'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id'); //arg1 - Model, arg2 - foreign key
    }
}
