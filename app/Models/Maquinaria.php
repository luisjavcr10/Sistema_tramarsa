<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;

    protected $table = 'maquinaria';
    protected $primaryKey = 'MaquinariaID';
    protected $fillable = ['Codigo', 'Nombre', 'Marca', 'Modelo', 'CategoriaID'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'CategoriaID');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'MaquinariaID');
    }

    public function ordenesUso()
    {
        return $this->hasMany(OrdenUso::class, 'MaquinariaID');
    }

    public function guiasMantenimiento()
    {
        return $this->hasMany(GuiaMantenimiento::class, 'MaquinariaID');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'MaquinariaID');
    }
}
