<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $primaryKey = 'RolID';
    protected $fillable = ['Nombre'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'RolID');
    }

    public function acciones()
    {
        return $this->hasMany(Accion::class, 'RolID');
    }
}
