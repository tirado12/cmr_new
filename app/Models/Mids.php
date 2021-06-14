<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mids extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mids';
    
    protected $table = "mids";
}
