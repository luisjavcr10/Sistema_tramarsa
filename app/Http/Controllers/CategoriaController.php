<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'Codigo' => 'required|unique:categoria,Codigo|max:255',
            'Nombre' => 'required|max:255',
            'Descripcion' => 'nullable|string',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categoria.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'Codigo' => 'required|max:255|unique:categoria,Codigo,' . $categoria->id,
            'Nombre' => 'required|max:255',
            'Descripcion' => 'nullable|string',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
