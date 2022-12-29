<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lista_tutoria extends Model
{
    protected $fillable = [
        'ID_Usuario',
        'Nombre_Lenguaje',
        'Descripcion',
        'Fecha_Creacion',
        'Activo'
    ];

    protected $id = 'ID_Lista_Tutorias';
    protected $primaryKey = 'ID_Lista_Tutorias';

    protected $table = 'lista_tutorias';
}
