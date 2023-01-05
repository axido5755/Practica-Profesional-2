<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutoria extends Model
{
    use HasFactory;

    protected $table = 'tutorias';
    protected $primaryKey = 'ID_Tutoria';
    public function comentario()
    {
        return $this->belongsToMany(Tutoria::class, 'comentarios');
    }
}
