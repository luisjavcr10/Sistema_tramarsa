<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenUso extends Model
{
    use HasFactory;

    protected $table = 'orden_uso';
    protected $primaryKey = 'OrdUsoID';
    protected $fillable = ['MaquinariaID', 'AlmacenID', 'Numero', 'FechaInicio', 'FechaFin', 'Ubicacion', 'Estado', 'EmpleadoID'];

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
        return $this->hasMany(Documento::class, 'OrdUsoID');
    }
}

