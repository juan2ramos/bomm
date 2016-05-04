<?php

namespace Bomm\entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'grupos_musica';

    public function users()
    {
        return $this->belongsToMany(User::class, 'usuarios_grupos_musica', 'id_usuario', 'id_grupo_musica');
    }
}
