<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\User;
use App\Comentario;
use App\Categoria;

class showController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        $autor = User::findOrFail($articulo->author_id);
        $categoria = Categoria::findOrFail($articulo->categoria_id);
        $comentarios = Comentario::all();
        return view('publicacion',['articulo' => $articulo,'autor' => $autor,'comentarios' => $comentarios,'categoria' => $categoria]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return redirect('/profile/'.$id);
    }
}
