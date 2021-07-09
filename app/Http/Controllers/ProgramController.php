<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Categoriep;
use moviemega\Comentario;
use moviemega\Comentariop;
use moviemega\Program;
use moviemega\Publicidad;
use moviemega\Publicidadp;


class ProgramController extends Controller
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
                $programs = Program::where('nombre','LIKE','%' . $buscar . '%')->orderBy("created_at", "desc")->paginate(30);
            }
            if (!empty($request->input('categoria'))){
                $categoria= $request->input('categoria');
                $programs = Program::where('categoriep_id','=',$categoria)->orderBy("created_at", "desc")->paginate(30);
            }

            if (empty($request->input('buscar'))&& empty($request->input('categoria'))){
                $programs=Program::orderBy("created_at", "desc")->paginate(30);

            }

            $programs2 = Program::latest()->take(30)->get();
            $categorieps = Categoriep::all();


            // $language_movies = Language_movie::with('movie', 'language')->where('movie_id', 'language_id')->get();
            return view('programs.index', compact('programs', 'categorieps',  'programs2'));

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

            $categorieps = Categoriep::pluck('nombrec', 'id')->prepend('Selcciona categoría', '');
            return view('programs.create', compact('categorieps'));
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
    public function store(Request $request)
    {
        if (!empty($request->user()->email)) {
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/

            if ($request->hasFile('portada')) {
                $file = $request->file('portada');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/

            $program = new Program(); /*instanciar el modelo*/
            $program->nombre = $request->input('nombre');
            $program->descripcion = $request->input('descripcion');
            $program->portada = $name;
            $program->slug = $request->input('nombre') . time();
            $program->categoriep_id = $request->input('categoriep_id');
            $program->save();
            return redirect()->route('programs.index')->with('status', 'Pelicula registrada correctamente');
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
    public function show(Program $program, Request $request)
    {
        if (!empty($request->user()->email)) {

           $scrimps = Program::find($program->id)->scrimps;
           $unloadingps=Program::find($program->id)->unloadingps;
          //  $scrimps = Scrimp::where('program_id','=',$program->id);
          //  $unloadingps = Unloadingp::where('program_id','=',$program->id);

            $comentariops=Comentariop::where('program_id','=',$program->id)->paginate(10);
            $publicidadpsd=Publicidadp::where('program_id','=',$program->id)->where('tipo','=','descarga')->paginate(10);
            $publicidadpso=Publicidadp::where('program_id','=',$program->id)->where('tipo','=','online')->paginate(10);


            return view('programs.show', compact('program', 'scrimps', 'unloadingps','comentariops','publicidadpso','publicidadpsd'));

            // return $unloadings;

        }  else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program, Request $request)
    {
        if (!empty($request->user()->email)) {
            $categorieps = Categoriep::pluck('nombrec', 'id')->prepend('Selcciona categoría', '');

            return view('programs.edit', compact('program', 'categorieps'));
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
    public function update(Request $request, Program $program)
    {
        if (!empty($request->user()->email)) {
            $program->fill($request->except('portada'));

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            if ($request->hasFile('portada')) {
                $file = $request->file('portada');
                $name = time() . $file->getClientOriginalName();
                $program->portada = $name;
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/

            $program->save();
            return redirect()->route('programs.show', [$program])->with('status', 'Pelicula actualizada correctamente');
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
    public function destroy($id)
    {
        //
    }
}
