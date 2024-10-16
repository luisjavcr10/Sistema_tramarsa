<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'guia_mantenimiento';
    protected $primaryKey = 'GuiManID';
    protected $fillable = ['MaquinariaID', 'AlmacenID', 'Numero', 'FechaInicio', 'FechaFin', 'Serie', 'Ubicacion', 'Observaciones', 'EmpleadoID'];

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'MaquinariaID');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'AlmacenID');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'EmpleadoID');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'GuiManID');
    }
}

