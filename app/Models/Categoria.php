<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'CategoriaID';
    protected $fillable = ['Codigo', 'Nombre', 'Descripcion'];

    public function maquinarias()
    {
        return $this->hasMany(Maquinaria::class, 'CategoriaID');
    }
}

