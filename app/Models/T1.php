<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T1 extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 't1';

    // Llave primaria de la tabla (Laravel lo detecta automáticamente si es 'id')
    protected $primaryKey = 'id';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'duracion',
        'InventarioID',
    ];

    // Definir la relación con el modelo Inventario
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'InventarioID');
    }
}
