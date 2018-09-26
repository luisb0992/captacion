<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagenes";
    protected $fillable = ['imagen', 'prospecto_id'];
}
