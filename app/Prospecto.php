<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $table = "prospectos";

    protected $fillable = [
    	"codigo", "titulo", "foto", "descripcion", "user_id",
    	"tipo_id", "departamento_id", "provincia_id", "distrito_id", "antiguedad",
    	"dormitorios", "estacionamientos", "b_completos", "b_medio", "precio_des",
    	"precio_sol", "precio_dol", "metros_con", "metros_tot", "direccion","codigo_postal", "opcion", "status_id"
    ];

    public function user(){
    	return $this->belongsTo("App\User", "user_id");
    }

    public function tipo(){
    	return $this->belongsTo("App\TipoInmueble", "tipo_id");
    }

    public function departamento(){
    	return $this->belongsTo("App\Departamento", "departamento_id");
    }

    public function provincia(){
    	return $this->belongsTo("App\Provincia", "provincia_id");
    }

    public function distrito(){
    	return $this->belongsTo("App\Distrito", "distrito_id");
    }

    public function status(){
        return $this->belongsTo("App\Status", "status_id");
    }

    public function persona(){
        return $this->hasOne("App\Persona", "prospecto_id");
    }

    public function imagenes(){
    	return $this->hasMany("App\Imagen", "prospecto_id");
    }
}
