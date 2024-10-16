<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Maquinaria;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index()
    {
        $maquinarias = Maquinaria::all();
        return view('maquinaria.index', compact('maquinarias'));
    }

    public function create()
    {
        $categorias = Categoria::get();
        //dd($categorias) ;
        return view('maquinaria.create',compact('categorias'));
    }

    public function store(Request $request)
    { 
        //dd($request);
        $request->validate([
            'Codigo' => 'required|max:255',
            'Nombre' => 'required|max:255',
            'Marca' => 'required|max:255',
            'Modelo' => 'required|max:255',
            'CategoriaID' => 'required|exists:categoria,CategoriaID'
        ]);

        Maquinaria::create($request->all());

        return redirect()->route('maquinaria.index')->with('success', 'Maquinaria creada con éxito.');
    }


    public function edit($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $categorias = Categoria::all();
        return view('maquinaria.edit', compact('maquinaria', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Codigo' => 'required|max:255',
            'Nombre' => 'required|max:255',
            'Marca' => 'required|max:255',
            'Modelo' => 'required|max:255',
            'CategoriaID' => 'required|exists:categoria,CategoriaID'
        ]);

        $maquinaria = Maquinaria::findOrFail($id);
        $maquinaria->update($request->all());

        return redirect()->route('maquinaria.index')->with('success', 'Maquinaria actualizada con éxito.');
    }

    public function destroy(Maquinaria $maquinaria)
    {
        $maquinaria->delete();
        return redirect()->route('maquinaria.index')->with('success', 'Maquinaria eliminada con éxito.');
    }
}
