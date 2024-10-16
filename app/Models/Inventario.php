<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';
    protected $fillable = ['MaquinariaID', 'AlmacenID', 'Codigo', 'Estado'];

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'MaquinariaID');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'AlmacenID');
    }
}

