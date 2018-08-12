<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInmueble extends Model
{
    protected $table = "tipos_inmuebles";

    protected $fillable = ["name", "categoria"];
}
