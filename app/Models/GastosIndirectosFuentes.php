<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosIndirectosFuentes extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_fuentes_gastos_indirectos';

    protected $table = "fuentes_gastos_indirectos";
}
