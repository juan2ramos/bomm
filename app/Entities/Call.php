<?php

namespace Bomm\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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

    function Music()
    {
        return $this->belongsTo(Music::class, 'id_grupos_musica');
    }

    public function getDateHumanAttribute()
    {
        if ($this->fecha_finalizacion) {
            $date = new Date($this->fecha_finalizacion);
            return $date->format('l j F Y');
        }
        return '';
    }

}
