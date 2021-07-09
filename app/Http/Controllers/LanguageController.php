<?php

namespace moviemega\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use moviemega\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->user()->email)) {
            $languages= Language::paginate(3);
            return view('languages.index', compact('languages'));
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
             return view('languages.create');
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

            if ($request->hasFile('bandera')) {
                $file = $request->file('bandera');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/
            $language = new Language(); /*instanciar el modelo*/
            $language->nombrel=$request->input('nombrel');
            $language->descripcionl=$request->input('descripcionl');
            $language->slugl=trim($request->input('nombrel').time());
            $language->bandera=$name;
            $language->save();
            return redirect()->route('languages.index')->with('status','Lenguaje registrado correctamente');
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
    public function edit(Language $language, Request $request)
    {
        if (!empty($request->user()->email)) {
            return view('languages.edit', compact('language'));
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
    public function update(Request $request,Language $language)
    {
        if (!empty($request->user()->email)) {
            $language->fill($request->except('bandera'));
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            if ($request->hasFile('bandera')) {
                $file = $request->file('bandera');
                $name = time() . $file->getClientOriginalName();
                $language->bandera = $name;
                $file->move(public_path() . '/images/', $name);
            }
            /*fin*/

            $language->save();

            return redirect()->route('languages.index', [$language])->with('status', 'Lenguaje actualizado correctamente');
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
    public function destroy(Language $language, Request $request)
    {
        if (!empty($request->user()->email)) {
            $language->delete();
            return redirect()->route('languages.index')->with('status2', 'Lenguaje eliminado');
        }  else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }
}
