<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleado';
    protected $primaryKey = 'EmpleadoID';
    protected $fillable = ['Nombre', 'Apellido', 'DNI', 'Estado'];

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'EmpleadoID');
    }

    public function ordenesUso()
    {
        return $this->hasMany(OrdenUso::class, 'EmpleadoID');
    }

    public function guiasMantenimiento()
    {
        return $this->hasMany(GuiaMantenimiento::class, 'EmpleadoID');
    }
}

