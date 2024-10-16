<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacen';
    protected $primaryKey = 'AlmacenID';
    protected $fillable = ['Codigo', 'Nombre', 'Ubicacion', 'Capacidad', 'Estado'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'AlmacenID');
    }

    public function ordenesUso()
    {
        return $this->hasMany(OrdenUso::class, 'AlmacenID');
    }

    public function guiasMantenimiento()
    {
        return $this->hasMany(GuiaMantenimiento::class, 'AlmacenID');
    }
}
