<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Program;
use moviemega\Scrimp;

class ScrimpController extends Controller
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
            $scrimp = new Scrimp(); /*instanciar el modelo*/
            $scrimp->urls=$name;
            $scrimp->program_id=$request->input('program_id');
            $scrimp->save();
        }
        /*fin*/
        $prgram =Program::findOrFail($request->input('program_id'));

        return redirect()->route('programs.show',[$prgram->slug])->with('status','Scrims registrados correctamente');
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
    public function destroy(Scrimp $scrimp, Request $request)
    {
        $scrimp->delete();
        $program =Program::findOrFail($request->input('program_id'));
        return redirect()->route('programs.show',[$program->slug])->with('status','Scrim eliminado correctamente');
    }
}
