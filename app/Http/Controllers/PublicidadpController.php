<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Movie;
use moviemega\Program;
use moviemega\Publicidad;
use moviemega\Publicidadp;

class PublicidadpController extends Controller
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
        $publicidadp = new Publicidadp(); /*instanciar el modelo*/
        $publicidadp->proveedor=$request->input('proveedor');
        $publicidadp->descripcion=$request->input('descripcion');
        $publicidadp->tipo=$request->input('tipo');
        $publicidadp->program_id=$request->input('program_id');

        $publicidadp->save();
        $prgram =Program::findOrFail($request->input('program_id'));
        if (!empty($request->user()->email)) {
            return redirect()->route('programs.show',[$prgram->slug])->with('status','publicidad registrada correctamente');
            /* return 'guardado';*/
        } else {
            return redirect()->back()->with('status','publicidad registrada correctamente');;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tipo = rtrim($request->input('tipo'));
        $urlu = rtrim($request->input('urlu'));
        $program= rtrim($request->input('program_id'));
        $publicidades=Publicidadp::where('program_id','=',$program)->where('tipo','=',$tipo)->paginate(10);

        return view('publicidad.show', compact('publicidades','urlu'));
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
    public function destroy(Publicidadp $publicidadp, Request $request)
    {
        $publicidadp->delete();
        $program =Program::findOrFail($request->input('program_id'));
        return redirect()->route('programs.show',[$program->slug])->with('status','publicidad eliminada correctamente');
    }
}
