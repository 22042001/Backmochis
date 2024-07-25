<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'id_rol', 'nombre', 'apellido', 'email', 'contraseña',
        'fecha_nacimiento', 'genero', 'biografia', 'foto_perfil'
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function experiencias()
    {
        return $this->hasMany(Experiencia::class, 'id_usuario');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }

    public function foroTemas()
    {
        return $this->hasMany(ForoTema::class, 'id_usuario');
    }

    public function foroRespuestas()
    {
        return $this->hasMany(ForoRespuesta::class, 'id_usuario');
    }

    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class, 'id_usuario');
    }
}
