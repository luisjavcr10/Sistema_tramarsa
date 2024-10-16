<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $fillable = ['EmpleadoID', 'Correo', 'Contrasena', 'RolID'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'EmpleadoID');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'RolID');
    }
}

