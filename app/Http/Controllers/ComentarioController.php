<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Articulo;
use App\Models\User;

class ComentarioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentario = new Comentario();
        $comentario->user_id = auth()->user()->id;
        $comentario->user_name = auth()->user()->name;
        $comentario->article_id = $request->article_id;
        $comentario->comment = $request->comment;
        $comentario->save();

        return redirect()->route('show.show',$comentario->article_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->route('show.show',$comentario->article_id);
    }
}