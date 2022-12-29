<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    

    protected $table = 'usuario';

    protected $fillable = [
        'ID_Rol',
        'Nombre',
        'Apellido',
        'Rut',
        'Email',
        'Contraseña',
        'Activo'
    ];

    public function comentario()
    {
        return $this->belongsToMany(Usuario::class, 'comentarios');
    }

    public function lista_tutoria()
    {
        return $this->belongsToMany(Usuario::class, 'lista_tutorias');
    }

}
