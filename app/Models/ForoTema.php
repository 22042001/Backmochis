<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForoTema extends Model
{
    protected $table = 'foro_temas';
    protected $primaryKey = 'id_foro_tema';

    protected $fillable = ['id_usuario', 'titulo', 'estado'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function respuestas()
    {
        return $this->hasMany(ForoRespuesta::class, 'id_foro_tema');
    }
}