<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosIndirectos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_indirectos';
    protected $table = "gastos_indirectos";

    protected $fillable = [
        'clave',
        'nombre',
    ];
}
