<?php

namespace Bomm\Entities;

use Bomm\User;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'grupos_musica';
    private $arrayData;

    public function users()
    {
        return $this->belongsToMany(User::class, 'usuarios_grupos_musica', 'id_usuario', 'id_grupo_musica');
    }

    public function normalizeData()
    {
        $this->name = $this->nombre;
        $this->short_review = $this->resena_corta;
        $this->type_proposal = $this->tipo_propuesta;
        $this->other_proposal = $this->otro;
        $this->genre = $this->genero2;
        $this->show_cost = $this->pre5;
        $this->showcases = $this->showcase;

        return $this;

    }


}
