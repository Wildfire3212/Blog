<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // OBTENER TODOS LOS DATOS DEL MODELO ATÍCULO
        $categorias = Categoria::all();
        return view('admin.categorias.index',['categorias'=>$categorias]);
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
        return view('admin.categoria.create');
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
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save(); 
        return redirect('AdminArticulos');
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
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit',['categorias'=>$categorias]);
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
        $categoria = Categoria::findOrFail($id);
        $backup = $categoria;
        $categoria->nombre = $request->nombre;
        return redirect('AdminCategorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        foreach (Articulo::all() as $articulo) {
            if($articulo->categoria_id = $categoria->id){
                $articulo->delete();
            }
        }

        $categoria->delete();

        return redirect('AdminCategorias');
    }
}
