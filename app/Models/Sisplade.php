<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sisplade extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sisplade';

    protected $table = "sisplade";

    public function fuentesCliente() {
        return $this->belongsTo(FuentesCliente::class,'fuentes_clientes_id');
    }
}
// user contiene id_profession 