<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuentesFinanciamiento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_fuente_financiamiento';
    protected $table = "fuentes_financiamientos";

    protected $fillable = [
        'nombre_largo',
        'nombre_corto'
    ];


    public function fuentesClientes(){
        return $this->belongsTo(FuentesCliente::class, 'id_fuente_financiamiento'); //arg1 - Model, arg2 - foreign key
    }
}
