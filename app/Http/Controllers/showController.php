<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Comentario;
use App\Models\Categoria;

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
        $comentarios = Comentario::all();
        return view('publicacion',['articulo' => $articulo,'autor' => $autor,'comentarios' => $comentarios]);
    }

    public function showCategorias($id)
    {
        $categoria = Categoria::findOrFail($id);
        $articulo = Articulo::findOrFail($articulo->categoria_id);
        $autor = User::findOrFail($articulo->author_id);
        $comentarios = Comentario::all();
        return view('publicacion',['articulo' => $articulo,'autor' => $autor,'comentarios' => $comentarios]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return redirect('/profile/'.$id);
    }
}
