<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaMantenimiento;
use App\Models\Maquinaria;
use App\Models\Almacen;
use App\Models\Empleado;
use App\Models\T2;

class GuiaMantenimientoController extends Controller
{
    public function index()
    {
        $guiasMantenimiento = GuiaMantenimiento::with('maquinaria', 'almacen', 'empleado')->get();
        return view('guia-mantenimiento.index', compact('guiasMantenimiento'));
    }

    public function create()
    {
        session(['start_time' => microtime(true)]);
        $maquinarias = Maquinaria::all();
        $almacenes = Almacen::all();
        $empleados = Empleado::all();
        return view('guia-mantenimiento.create', compact('maquinarias', 'almacenes', 'empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaquinariaID' => 'required|exists:maquinaria,MaquinariaID',
            'AlmacenID' => 'required|exists:almacen,AlmacenID',
            'Numero' => 'required|max:255',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'nullable|date|after_or_equal:FechaInicio',
            'Serie' => 'required|max:255',
            'Ubicacion' => 'required|max:255',
            'Observaciones' => 'nullable',
            'EmpleadoID' => 'required|exists:empleado,EmpleadoID',
        ]);

        sleep(4);

        $guia= GuiaMantenimiento::create($request->all());

        // Recuperar el timestamp de la sesión
        $start_time = session('start_time');
        
        if ($start_time) {
            $end_time = microtime(true);
            $duration = $end_time - $start_time;
            $formatted_duration = round($duration, 0); // Redondear a 2 decimales

            // Crear una instancia del modelo T1 y guardar la duración y el InventarioID
            T2::create([
                'duracion' => $formatted_duration,
                'GuiManID' => $guia->GuiManID,
            ]);
        }

        return redirect()->route('guia-mantenimiento.index')->with('success', 'Guía de Mantenimiento creada con éxito.');
    }
}
