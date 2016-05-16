<?php

namespace Bomm\Entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function call(){
        return $this->hasOne(Call::class, 'id_grupos_musica');
    }
    public function related(){
        return $this->hasOne(Related::class, 'id_grupo_musica');
    }
}
