<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all();
        return view('almacen.index', compact('almacenes'));
    }

    public function create()
    {
        return view('almacen.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'Codigo' => 'required|unique:categoria,Codigo|max:255',
            'Nombre' => 'required|max:255',
            'Ubicacion' => 'required|max:255',
            'Capacidad' => 'required|integer',
            'Estado' => 'required|integer'
        ]);

        Almacen::create($request->all());

        return redirect()->route('almacen.index')->with('success', 'Almacen creada con éxito.');
    }

    public function edit(Almacen $almacen)
    {
        return view('almacen.edit', compact('almacen'));
    }

    public function update(Request $request, Almacen $almacen)
    {
        $request->validate([
            'Codigo' => 'required|unique:categoria,Codigo|max:255',
            'Nombre' => 'required|max:255',
            'Ubicacion' => 'required|max:255',
            'Capacidad' => 'required|integer',
            'Estado' => 'required|integer'
        ]);

        $almacen->update($request->all());

        return redirect()->route('almacen.index')->with('success', 'Almacen actualizada con éxito.');
    }


    public function destroy(Almacen $almacen)
    {
        $almacen->delete();

        return redirect()->route('almacen.index')->with('success', 'Almacen eliminada con éxito.');
    }
}
