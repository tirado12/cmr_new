<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sisplade extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sisplade';

    protected $table = "sisplade";
}
