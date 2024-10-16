<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documento';
    protected $primaryKey = 'DocumentoID';
    protected $fillable = ['GuiManID', 'MaquinariaID', 'AlmacenID', 'OrdUsoID', 'Documento', 'Nombre'];

    public function guiaMantenimiento()
    {
        return $this->belongsTo(GuiaMantenimiento::class, 'GuiManID');
    }

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'MaquinariaID');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'AlmacenID');
    }

    public function ordenUso()
    {
        return $this->belongsTo(OrdenUso::class, 'OrdUsoID');
    }
}

