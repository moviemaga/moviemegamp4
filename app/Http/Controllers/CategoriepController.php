<?php

namespace moviemega\Http\Controllers;
use Illuminate\Http\Request;
use moviemega\Categoriep;


class CategoriepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->user()->email)) {
            $categorieps = Categoriep::paginate(3);
            return view('categorieps.index', compact('categorieps'));
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
            return view('categorieps.create');
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
            $categoriep = new Categoriep(); /*instanciar el modelo*/
            $categoriep->nombrec = $request->input('nombrec');
            $categoriep->slugc = $request->input('nombrec') . time();
            $categoriep->save();
            return redirect()->route('categorieps.index')->with('status', 'Categoria registrada correctamente');
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
    public function edit(Categoriep $categoriep,Request $request)
    {
        if (!empty($request->user()->email)) {
            return view('categorieps.edit', compact('categoriep'));
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
    public function update(Request $request, Categoriep $categoriep)
    {
        if (!empty($request->user()->email)) {
            $categoriep->fill($request->all());
            $categoriep->save();
            return redirect()->route('categorieps.index', [$categoriep])->with('status', 'Categoria actualizada correctamente');
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
    public function destroy(Categoriep $categoriep, Request $request)
    {
        if (!empty($request->user()->email)) {
            $categoriep->delete();
            return redirect()->route('categorieps.index')->with('status2', 'Categoria eliminada');
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }
}
