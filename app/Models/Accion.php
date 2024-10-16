<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;

    protected $table = 'accion';
    protected $primaryKey = 'AccionID';
    protected $fillable = ['Nombre', 'Estado', 'RolID'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'RolID');
    }
}

