<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido','password','perfil_id', 'email', 'status', 
        'clave', 'online', 'departamento_id', 'distrito_id', 'provincia_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // relaciones
    
    public function perfil(){
        return $this->belongsTo("App\Perfil", "perfil_id");
    }

    public function nameStatus(){
        $status = "";
        
        if ($this->status == 1) {
            $status = "Activo";
        }elseif($this->status == 2){
            $status = "Inactivo";
        }elseif($this->status == 3){
            $status = "Suspendido";
        }

        return $status;
    }

    public function dep(){
      return $this->belongsTo("App\Departamento", "departamento_id");
    }

    public function prov(){
      return $this->belongsTo("App\Provincia", "provincia_id");
    }

    public function dist(){
      return $this->belongsTo("App\Distrito", "distrito_id");
    }

    public function departamento($id){
      return Departamento::where("id", $id)->value("departamento");
    }

    public function provincia($id){
      return Provincia::where("id", $id)->value("provincia");
    }

    public function distrito($id){
      return Distrito::where("id", $id)->value("distrito");
    }
}
