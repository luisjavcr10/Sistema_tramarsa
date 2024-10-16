<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T2 extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 't2';

    // Llave primaria de la tabla (Laravel lo detecta automáticamente si es 'id')
    protected $primaryKey = 'id';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'duracion',
        'GuiManID',
    ];

    // Definir la relación con el modelo Inventario
    public function guiamantenimiento()
    {
        return $this->belongsTo(GuiaMantenimiento::class, 'GuiManID');
    }
}
