<?php

namespace moviemega\Http\Controllers;

use Illuminate\Http\Request;
use moviemega\Categoriep;
use moviemega\Comentariop;
use moviemega\Program;

class ProgramclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Program $program, Request $request)
    {
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
        return view('programscliente.index', compact('programs', 'categorieps',  'programs2'));
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
    public function show(Program $program, Request $request)
    {
        $scrimps = Program::find($program->id)->scrimps;
        $unloadingps=Program::find($program->id)->unloadingps;
        //  $scrimps = Scrimp::where('program_id','=',$program->id);
        //  $unloadingps = Unloadingp::where('program_id','=',$program->id);
        $comentariops=Comentariop::where('program_id','=',$program->id)->paginate(10);


        return view('programscliente.show', compact('program', 'scrimps', 'unloadingps','comentariops'));
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
