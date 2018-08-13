<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $table = "requerimientos";

    protected $fillable = [
    	"user_id", "tipo_id", "departamento_id", "provincia_id", "distrito_id", "antiguedad",
    	"dormitorios", "estacionamientos", "b_completos", "b_medio", "presupuesto", 
    	"unidad_id", "opcion", "metros_cua", "referencia", "comentario", "status"
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

    public function unidad(){
    	return $this->belongsTo("App\Unidad", "unidad_id");
    }

    public function persona(){
        return $this->hasOne("App\Persona", "requerimiento_id");
    }

    public function per($id){
        return Persona::where("requerimiento_id", $id)->first();
    }
}
