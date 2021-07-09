<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Comentario;
use moviemega\language;
use moviemega\Category;
use moviemega\Language_movie;
use moviemega\Movie;
use moviemega\Server;
use moviemega\Unloading;

class MovieclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movie $movie, Request $request)
    {
        if (!empty($request->input('buscar'))){
            $buscar= $request->input('buscar');
            $movies = Movie::where('nombre','LIKE','%' . $buscar . '%')->orderBy("created_at", "desc")->paginate(30);
            $languages = Language::orderBy("created_at", "asc")->get();
            $language_movies = Language_movie::all();
        }
        if (!empty($request->input('categoria'))){
            $categoria= $request->input('categoria');
            $movies = Movie::where('category_id','=',$categoria)->orderBy("created_at", "desc")->paginate(30);
            $languages = Language::orderBy("created_at", "asc")->get();
            $language_movies = Language_movie::all();
        }
        if (!empty($request->input('idioma'))){
            $idioma= $request->input('idioma');
            $movies=Movie::orderBy("created_at", "desc")->paginate(30);
            $languages = Language::orderBy("created_at", "asc")->get();
            $language_movies = Language_movie::with('movie')->where('language_id','=',$idioma)->get();
        }

        if (empty($request->input('idioma'))&& empty($request->input('buscar'))&& empty($request->input('categoria'))){
            $movies=Movie::orderBy("created_at", "desc")->paginate(30);
            $languages = Language::orderBy("created_at", "asc")->get();
            //$languages=Language::where('id','=',$idioma);
            $language_movies = Language_movie::all();
        }

        $movies2 = Movie::latest()->take(30)->get();
        $categories = Category::all();
        $language_movies2 = Language_movie::all();


        // $language_movies = Language_movie::with('movie', 'language')->where('movie_id', 'language_id')->get();
        return view('index', compact('movies', 'categories', 'languages', 'language_movies', 'language_movies2', 'movies2'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $languages=Language::get()->pluck('idioma', 'id')->prepend('Selcciona idioma','');
        // //$languages=Movie::find($movie->id)->languages()->get();
        $scrims = Movie::find($movie->id)->scrims;

        $language_movie_unloadings=Unloading::join('language_movies','unloadings.language_movie_id','language_movies.id')->where('language_movies.movie_id','=',$movie->id)->get();

        $language_movie_servers=Server::join('language_movies','servers.language_movie_id','language_movies.id')->where('language_movies.movie_id','=',$movie->id)->get();

        $servers = Language_movie::with('movie','language','servers')->where('movie_id',$movie->id)->get();

        $language_movies=Language_movie::with('movie','language')->where('movie_id',$movie->id)->get();

        $language_movies2=Language_movie::join('languages','language_movies.language_id','languages.id')->select('languages.nombrel','languages.descripcionl','language_movies.id')->where('language_movies.movie_id','=',$movie->id)->get();

        $laguage_unloadings=$language_movies2->pluck('idioma','id')->prepend('selecionar idioma de enlace','');

        $comentarios=Comentario::where('movie_id','=',$movie->id)->paginate(10);

        return view('show', compact('movie','scrims','language_movie_unloadings','languages','language_movie_servers','language_movies','laguage_unloadings','comentarios'));

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
    public function destroy($id)
    {
        //
    }
}
