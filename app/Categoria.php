<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	// SE ESTÁ RELACIONANDO LA CANTIDAD DE Articulos pertenecientes a una categoria
    public function comentarios(){
    	return $this->hasMany('App\Articulos');
    }
}
