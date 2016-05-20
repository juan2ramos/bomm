<?php

namespace Bomm\Entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;

class Curator extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
}
