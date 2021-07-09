<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Movie;
use moviemega\Language;
use moviemega\Language_movie;

class Language_MovieController extends Controller
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
       $idioma=$request->input('language_id');

       $language_movie=Language_movie::where('movie_id',$request->input('movie_id'))->where('language_id',$idioma)->get();
       $movie =Movie::findOrFail($request->input('movie_id'));
      if($language_movie->isEmpty()){
         
         $movie->languages()->attach($idioma);
         return redirect()->route('movies.show',[$movie->slug])->with('status','Idioma registrado correctamente');

       } else{

          return redirect()->action('MovieController@show',[$movie->slug])->with('status','Idioma ya se encuentra registrado');
         }
      // return $language_movie;
         


      
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
    public function destroy(Language_movie $language_movie)

    {
          
          $movie =Movie::findOrFail($language_movie->movie->id);


          $movie->languages()->detach($language_movie->language->id);
          //$language_movie->delete();  

        return redirect()->route('movies.show',[$movie->slug])->with('status2','Idioma desasociado'); 
    }
}
