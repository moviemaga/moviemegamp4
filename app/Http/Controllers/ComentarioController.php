<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Comentario;
use moviemega\Movie;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentario = new Comentario(); /*instanciar el modelo*/
        $comentario->usuario=$request->input('usuario');
        $comentario->descripcion=$request->input('descripcion');
        $comentario->movie_id=$request->input('movie_id');

        $comentario->save();
        $movie =Movie::findOrFail($request->input('movie_id'));
        if (!empty($request->user()->email)) {
            return redirect()->route('movies.show',[$movie->slug])->with('status','comentario registrado correctamente');
            /* return 'guardado';*/
        } else {
            return redirect()->back()->with('status','comentario registrado correctamente');;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario, Request $request)
    {
        $comentario->delete();
        $movie =Movie::findOrFail($request->input('movie_id'));
        return redirect()->route('movies.show',[$movie->slug])->with('status','comentario eliminado correctamente');
    }
}
