<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenUso;
use App\Models\Maquinaria;
use App\Models\Almacen;
use App\Models\Empleado;

class OrdenUsoController extends Controller
{
    public function index()
    {
        $ordenesUso = OrdenUso::with('maquinaria', 'almacen', 'empleado')->get();
        return view('orden-uso.index', compact('ordenesUso'));
    }

    public function create()
    {
        $maquinarias = Maquinaria::all();
        $almacenes = Almacen::all();
        $empleados = Empleado::all();
        return view('orden-uso.create', compact('maquinarias', 'almacenes', 'empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaquinariaID' => 'required|exists:maquinaria,MaquinariaID',
            'AlmacenID' => 'required|exists:almacen,AlmacenID',
            'Numero' => 'required|max:255',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'nullable|date|after_or_equal:FechaInicio',
            'Ubicacion' => 'required|max:255',
            'EmpleadoID' => 'required|exists:empleado,EmpleadoID',
            'Estado' => 'required|boolean',
        ]);

        OrdenUso::create($request->all());

        return redirect()->route('orden-uso.index')->with('success', 'Orden de Uso creada con éxito.');
    }
}
