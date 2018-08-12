<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";

    protected $fillable = ["name", "email", "telefono", "prospecto_id", "requerimiento_id", "ft_id"];
}
