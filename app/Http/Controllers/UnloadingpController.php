<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Program;
use moviemega\Unloadingp;

class UnloadingpController extends Controller
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
        $unloadigp = new Unloadingp(); /*instanciar el modelo*/
        $unloadigp->servidor=$request->input('servidor');
        $unloadigp->urlu=$request->input('urlu');
        $unloadigp->program_id=$request->input('program_id');
        $unloadigp->save();

        $program =Program::findOrFail($request->input('program_id'));

        return redirect()->route('programs.show',[$program->slug])->with('status','Descarga registrada correctamente');


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
    public function destroy(Unloadingp $unloadingp, Request $request)
    {
        $unloadingp->delete();
        $program =Program::findOrFail($request->input('program_id'));
        return redirect()->route('programs.show',[$program->slug])->with('status','descarga eliminada correctamente');
    }
}
