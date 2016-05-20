<?php

namespace Bomm\Entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;

class Curator extends Model
{
    public function user(){
        return $this->hasOne(User::class);
    }
    public function curators(){
        return $this->belongsTo(Group::class);
    }
}
