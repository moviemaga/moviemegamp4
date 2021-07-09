<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Scrim;
use moviemega\Movie;

class ScrimController extends Controller
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
         
    
        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            if($request->hasFile('file')){
                  $file = $request->file('file');
                  $name = time().$file->getClientOriginalName();
                  $file->move(public_path().'/images/scrims/', $name);
                  $scrim = new Scrim(); /*instanciar el modelo*/
                  $scrim->urls=$name;
                  $scrim->movie_id=$request->input('movie_id');
                  $scrim->save();
             }
      /*fin*/
         $movie =Movie::findOrFail($request->input('movie_id'));
    
      return redirect()->route('movies.show',[$movie->slug])->with('status','Scrims registrados correctamente');
     

     // return $request;
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
    public function destroy(Scrim $scrim, Request $request)
    {
         $scrim->delete();  
         $movie =Movie::findOrFail($request->input('movie_id'));
         return redirect()->route('movies.show',[$movie->slug])->with('status','Scrim eliminado correctamente');
    }
}
