<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuturoCliente extends Model
{
    protected $table = "futuros_clientes";

    protected $fillable = ["user_id", "nombre_captador", "nombre_peru", "opcion", "comentario"];

    public function user(){
    	return $this->belongsTo("App\User", "user_id");
    }
}
