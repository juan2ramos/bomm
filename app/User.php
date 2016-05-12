<?php

namespace Bomm;

use Bomm\entities\Group;
use Bomm\entities\Music;
use Bomm\entities\Representative;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function musics(){
        return $this->belongsToMany(Music::class, 'usuarios_grupos_musica','id_usuario','id_grupo_musica');
    }
    public function group(){
        return $this->hasOne(Group::class);
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
    }
}
