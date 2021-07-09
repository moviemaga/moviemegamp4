<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Movie;
use moviemega\Server;
use moviemega\Unloading;

class ServerController extends Controller
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
       $serve = new Server(); /*instanciar el modelo*/
       $serve->nombres=$request->input('nombres');
       $serve->urlse=$request->input('urlse');
       $serve->language_movie_id=$request->input('language_movie_id');

      // $idioma=$request->input('language_id');
       $serve->save();
      // $movie->languages()->sync($idioma);
       return redirect()->route('movies.index')->with('status','Servidor registrado correctamente');
      /* return 'guardado';*/




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
    public function destroy(Server $server, Request $request)
    {
        $server->delete();
        $movie =Movie::findOrFail($request->input('movie_id'));
        return redirect()->route('movies.show',[$movie->slug])->with('status','servidor online eliminado correctamente');
    }
}
