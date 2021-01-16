<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\User;
use App\Categoria;
use App\Comentario;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // OBTENER TODOS LOS DATOS DEL MODELO ARTÍCULO
        $articulos = Articulo::all();
        $categorias = Categoria::all();
        return view('admin.articulos.index',['articulos'=>$articulos],['categorias' =>$categorias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Función a llamar cuando se quiera crear un artículo
        // Se retornará una vista, la cual es un formulario.
        $categorias = Categoria::all();
        return view('admin.articulos.create',['categorias'=>$categorias]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //LA QUE REALIZA LA ACCIÓN DE "CREAR"
        $article = new Articulo();
        $article->author_id = auth()->user()->id; 

        $user = User::findOrFail($article->author_id);
        $article->categoria_id = $request->categoria_id;
        $user = Categoria::findOrFail($article->categoria_id);
        $article->author_name = $user->name;
        $article->title = $request->title;

        $article->description = $request->description;
        $article->content = $request->content;
        $article->img = $request->img;

        if($request->hasFile('img')){
            $img = $request->img;
            $name = $img->getClientOriginalName();
            // DECIRLE EN DÓNDE QUIERO GUARDAR EL ARCHIVO
            $destination = public_path().'/img/';
            // move(ruta de destino, nombre con el que se guarda)
            $img->move($destination, $name);
            $article->img = $name;
        }

        $article->save();

        return view('admin.articulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('admin.articulos.edit',['articulo'=>$articulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Articulo::findOrFail($id);
        $backup = $article;
        $article->author_id = $request->author_id;
        $article->categoria_id = $request->categoria_id;
        $article->title = $request->title;
        $article->category = $request->category;
        $article->description = $request->description;
        $article->content = $request->content;

        if($request->hasFile('img')){
            $img = $request->img;
            $name = $img->getClientOriginalName();
            // DECIRLE EN DÓNDE QUIERO GUARDAR EL ARCHIVO
            $destination = public_path().'/img/';
            // move(ruta de destino, nombre con el que se guarda)
            $img->move($destination, $name);
            $article->img = $name;
        }
        // En dado caso que el usuario no ingrese una nueva imagen,
        // solo el parámetro no se actualiza.

        $article->update();

        return redirect('AdminArticulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);

        foreach (Comentario::all() as $comentario) {
            if($comentario->article_id = $articulo->id){
                $comentario->delete();
            }
        }

        $articulo->delete();

        return redirect('AdminArticulos');
    }
}
