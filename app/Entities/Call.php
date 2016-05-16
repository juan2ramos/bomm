<?php

namespace Bomm\Entities;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'inscripcion_inicial',
        'convocatoria',
        'fecha_registro',
        'fecha_finalizacion',
        'id_grupos_musica',
        'step',
    ];

    function Music(){
        return $this->belongsTo(Music::class,'id_grupos_musica');
    }

}
