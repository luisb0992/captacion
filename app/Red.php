<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    protected $table = 'redes';

    protected $fillable = ['user_id','link','fecha','hora','cantidad_per', 'numero_click', 'descripcion', 'provincia'];

    public function user(){
    	return $this->belongsTo("App\User", "user_id");
    }

}
