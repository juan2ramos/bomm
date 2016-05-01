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
            <label for="password" class="row middle">
                <span class="col-5 cols-12">* Contraseña:</span>
                <input class="col-6" type="password" id="password" name="password">
                <em>?
                        <span>
                            Máximo 12 caracteres
                        </span>
                </em>
            </label>
        </div>
    </form>
@endsection
