<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Almacen;
use App\Models\Maquinaria;
use App\Models\T1;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with('maquinaria', 'almacen')->get();
        return view('inventario.index', compact('inventarios'));
    }

    public function create()
    {
        // Guardar el timestamp en la sesión
        session(['start_time' => microtime(true)]);

        $maquinarias = Maquinaria::all();
        $almacenes = Almacen::all();
        return view('inventario.create', compact('maquinarias', 'almacenes'));
    }


    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'MaquinariaID' => 'required|exists:maquinaria,MaquinariaID',
            'AlmacenID' => 'required|exists:almacen,AlmacenID',
            'Codigo' => 'required|max:255',
            'Estado' => 'required|integer',
        ]);
        sleep(5);


        // Crear el registro de inventario
        $inventario = Inventario::create($request->all());

        // Recuperar el timestamp de la sesión
        $start_time = session('start_time');
        
        if ($start_time) {
            $end_time = microtime(true);
            $duration = $end_time - $start_time;
            $formatted_duration = round($duration, 0); // Redondear a 2 decimales

            // Crear una instancia del modelo T1 y guardar la duración y el InventarioID
            T1::create([
                'duracion' => $formatted_duration,
                'InventarioID' => $inventario->id,
            ]);
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('inventario.index')->with('success', 'Inventario creado con éxito.');
    }


}
