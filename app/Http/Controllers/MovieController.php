<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Comentario;
use moviemega\Movie;
use moviemega\Category;
use moviemega\Language;
use moviemega\Publicidad;
use moviemega\Scrim;
use moviemega\Unloading;
use moviemega\Language_movie;
use moviemega\Server;
use moviemega\Http\Requests\StoreMovieRequest;
use Cohensive\Embed\Facades\Embed;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->user()->email)) {
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
                //$languages=Language::where('id','=',$idioma);
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
            return view('movies.index', compact('movies', 'categories', 'languages', 'language_movies', 'language_movies2', 'movies2'));

        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!empty($request->user()->email)) {

            $categories = Category::pluck('nombrec', 'id')->prepend('Selcciona categoría', '');
            $languages = Language::pluck('nombrel', 'id')->prepend('Selcciona el idioma', '');
            return view('movies.create', compact('categories', 'languages'));
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        if (!empty($request->user()->email)) {
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/

            if ($request->hasFile('portada')) {
                $file = $request->file('portada');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/

            $movie = new Movie(); /*instanciar el modelo*/
            $movie->nombre = $request->input('nombre');
            $movie->sinopsis = $request->input('sinopsis');
            $movie->calidad = $request->input('calidad');
            $movie->fechaestreno = $request->input('fechaestreno');
            $movie->trailer = $request->input('trailer');
            $movie->portada = $name;
            $movie->estrella = $request->input('estrella');
            $movie->slug = $request->input('nombre') . time();
            $movie->category_id = $request->input('category_id');
            $idioma = $request->input('language_id');
            $movie->save();
            $movie->languages()->sync($idioma);
            return redirect()->route('movies.index')->with('status', 'Pelicula registrada correctamente');
            /* return 'guardado';*/
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie, Request $request)
    {
        if (!empty($request->user()->email)) {
            $languages = Language::get()->pluck('idioma', 'id')->prepend('Selcciona idioma', '');
            $scrims = Movie::find($movie->id)->scrims;
            $language_movie_unloadings = Unloading::join('language_movies', 'unloadings.language_movie_id', 'language_movies.id')->where('language_movies.movie_id', '=', $movie->id)->get();

            $language_movie_servers = Server::join('language_movies', 'servers.language_movie_id', 'language_movies.id')->where('language_movies.movie_id', '=', $movie->id)->get();

            $servers = Language_movie::with('movie', 'language', 'servers')->where('movie_id', $movie->id)->get();

            $language_movies = Language_movie::with('movie', 'language')->where('movie_id', $movie->id)->get();

            $language_movies2 = Language_movie::join('languages', 'language_movies.language_id', 'languages.id')->select('languages.nombrel', 'languages.descripcionl', 'language_movies.id')->where('language_movies.movie_id', '=', $movie->id)->get();

            $laguage_unloadings = $language_movies2->pluck('idioma', 'id')->prepend('selecionar idioma de enlace', '');

            $comentarios=Comentario::where('movie_id','=',$movie->id)->paginate(10);
            $publicidadsd=Publicidad::where('movie_id','=',$movie->id)->where('tipo','=','descarga')->paginate(10);
            $publicidadso=Publicidad::where('movie_id','=',$movie->id)->where('tipo','=','online')->paginate(10);

              return view('movies.show', compact('movie', 'scrims', 'language_movie_unloadings', 'languages', 'language_movie_servers', 'language_movies', 'laguage_unloadings','comentarios','publicidadsd','publicidadso'));


        }  else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *ss
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie, Request $request)
    {
        if (!empty($request->user()->email)) {
            $languages = Language::pluck('nombrel', 'id')->prepend('Selcciona el idioma', '');
            $categories = Category::pluck('nombrec', 'id')->prepend('Selcciona categoría', '');

            return view('movies.edit', compact('movie', 'categories', 'languages'));
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        if (!empty($request->user()->email)) {
            $movie->fill($request->except('portada'));

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            if ($request->hasFile('portada')) {
                $file = $request->file('portada');
                $name = time() . $file->getClientOriginalName();
                $movie->portada = $name;
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/

            $movie->save();
            return redirect()->route('movies.show', [$movie])->with('status', 'Pelicula actualizada correctamente');
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie, Request $request)
    {
        if (!empty($request->user()->email)) {
            $movie->delete();
            return redirect()->route('movies.index')->with('status2', 'Pelicula eliminada');
        }  else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }
}
