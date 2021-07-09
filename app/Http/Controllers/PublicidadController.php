<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Comentario;
use moviemega\Movie;
use moviemega\Publicidad;
use moviemega\Server;

class PublicidadController extends Controller
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
        $publicidad = new Publicidad(); /*instanciar el modelo*/
        $publicidad->proveedor=$request->input('proveedor');
        $publicidad->descripcion=$request->input('descripcion');
        $publicidad->movie_id=$request->input('movie_id');
        $publicidad->tipo=$request->input('tipo');

        $publicidad->save();
        $movie =Movie::findOrFail($request->input('movie_id'));
        if (!empty($request->user()->email)) {
            return redirect()->route('movies.show',[$movie->slug])->with('status','publicidad registrada correctamente');
            /* return 'guardado';*/
        } else {
            return redirect()->back()->with('status','publicidad registrada correctamente');;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tipo = rtrim($request->input('tipo'));
        $urlu = rtrim($request->input('urlu'));
        $movie= rtrim($request->input('movie_id'));
        $publicidades=Publicidad::where('movie_id','=',$movie)->where('tipo','=',$tipo)->paginate(10);

        return view('publicidad.show', compact('publicidades','urlu'));
    }

    public function showo(Request $request)
    {
        $tipo = rtrim($request->input('tipo'));
        $movie= rtrim($request->input('movie_id'));
        $urlse = rtrim($request->input('urlse'));
        $publicidades=Publicidad::where('movie_id','=',$movie)->where('tipo','=',$tipo)->paginate(10);

        return view('publicidad.showo', compact('publicidades','urlse'));
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
    public function destroy(Publicidad $publicidad, Request $request)
    {
        $publicidad->delete();
        $movie =Movie::findOrFail($request->input('movie_id'));
        return redirect()->route('movies.show',[$movie->slug])->with('status','publicidad eliminada correctamente');
    }
}
