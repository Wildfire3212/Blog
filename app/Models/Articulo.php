<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
	// SE ESTÁ RELACIONANDO LA CANTIDAD DE COMENTARIOS QUE PUEDE TENER UN ARTÍCULO
    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }
}
