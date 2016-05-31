<?php

namespace Bomm\Entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
    public function score(){
        return $this->hasOne(Score::class);
    }
    public function curator(){
        return $this->belongsTo(Curator::class);
    }
    public function getDateHumanAttribute(){
        $date = new Date($this->created_at);
        return $date->format('l j F Y');
    }
}
