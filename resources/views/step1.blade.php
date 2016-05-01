@extends('layouts.front')

@section('content')
    <h2 class="title">Datos representante rueda de negocios</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
         <span> Progreso paso 1</span>
        </p>
        <div class="Progress-bar"><span></span></div><span class="Progress-val">100%</span>
    </div>
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <form action="" class="row">
        <div class="col-5">
            asdasd
        </div>
        <div class="col-7 Form-inputs">
            <label for="" class="row middle">
                <span class="col-5 cols-12">* Nombre del artista o grupo:</span>
                <input class="col-6" type="text" id="name" name="name">
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
            <label for="resena" class="row middle">
                <span class="col-12 cols-12">* Escribe una breve reseña de la agrupación o artista: (700 caracteres)</span>
                <textarea class="col-11 cols-12" name="resena"></textarea>
            </label>
            <label for="" class="row middle">
                <span class="col-5 cols-12">* Tipo </span>
                <input class="col-6" type="text" id="name" name="name">
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
        </div>
    </form>
@endsection
