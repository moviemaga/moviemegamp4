<?php

namespace moviemega\Http\Controllers;
use moviemega\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if (!empty($request->user()->email)) {
                $categories = Category::paginate(3);
                return view('categories.index', compact('categories'));
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
            return view('categories.create');
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
            $category = new Category(); /*instanciar el modelo*/
            $category->nombrec = $request->input('nombrec');
            $category->slugc = $request->input('nombrec') . time();
            $category->save();
            return redirect()->route('categories.index')->with('status', 'Categoria registrada correctamente');
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
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,Request $request)
    {
        if (!empty($request->user()->email)) {
            return view('categories.edit', compact('category'));
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
    public function update(Request $request, Category $category)
    {
        if (!empty($request->user()->email)) {
            $category->fill($request->all());
            $category->save();
            return redirect()->route('categories.index', [$category])->with('status', 'Categoria actualizada correctamente');
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
    public function destroy(Category $category, Request $request)
    {
        if (!empty($request->user()->email)) {
            $category->delete();
            return redirect()->route('categories.index')->with('status2', 'Categoria eliminada');
        } else {
            return redirect('/login')->with('notification', 'Debes iniciar session!');
        }
    }
}
