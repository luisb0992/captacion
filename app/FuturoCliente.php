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

    public function persona(){
    	return $this->hasOne("App\Persona", "ft_id");
    }

    // metodos
    public function fecha(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }
}
