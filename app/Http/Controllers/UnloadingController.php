<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Scrim;
use moviemega\Unloading;
use moviemega\Movie;

class UnloadingController extends Controller
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

                  $unloadig = new Unloading(); /*instanciar el modelo*/
                  $unloadig->servidor=$request->input('servidor');
                  $unloadig->urlu=$request->input('urlu');
                  $unloadig->language_movie_id=$request->input('language_movie_id');
                  $unloadig->save();

                  $movie =Movie::findOrFail($request->input('movie_id'));

         return redirect()->route('movies.show',[$movie->slug])->with('status','Descarga registrada correctamente');


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
    public function destroy(Unloading $unloading, Request $request)
    {
        $unloading->delete();
        $movie =Movie::findOrFail($request->input('movie_id'));
        return redirect()->route('movies.show',[$movie->slug])->with('status','descarga eliminada correctamente');
    }
}
