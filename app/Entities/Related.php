<?php

namespace Bomm\Entities;

use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $table = 'vinculados';

    public function normalizeData()
    {
        $this->name = $this->nombre;
        $this->last_name_representative = $this->apellido;
        $this->identification_representative = $this->tipo_identificacion ;
        $this->identification_number_representative = $this->numero_identificacion ;
        $this->gender_representative = $this->genero;
        $this->day_representative = $this->dia;
        $this->month_representative = $this->mes ;
        $this->year_representative = $this->ano;
        $this->country_representative = $this->pais;
        $this->state_representative = $this->departamento ;
        $this->city_representative = $this->ciudad ;
        $this->address_Representative = $this->direccion ;
        $this->phone_Representative = $this->telefono;
        $this->public_phone = $this->publicacion_tel ;
        $this->mobile_representative = $this->telefono2;
        $this->public_mobile_representative = $this->publicacion_tel2;
        $this->email_representative = $this->email ;
        $this->public_email = $this->publicacion_email;
        $this->email_alternative_representative = $this->email2 ;
        $this->public_email_alternative = $this->publicacion_email2 ;
        $this->sms_authorize = $this->envio_sms ;
        $this->level_education_representative = $this->nivel_estudio;
        $this->is_company = $this->registro_empresa;
        $this->company_representative = $this->empresa ;
        $this->nit_company = $this->nit ;
        $this->position_company = $this->cargo;



        return $this;

    }
}
