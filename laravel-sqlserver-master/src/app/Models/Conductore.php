<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductore extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'movil', 'categoria', 'imagen', 'email', 'telefono'];
}
