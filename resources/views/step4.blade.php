@extends('layouts.front')

@section('content')
    <svg width="81px" height="47px" display="none" viewBox="0 0 81 47" version="1.1">
        <g id="imageTemp" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Paso-2" transform="translate(-627.000000, -1870.000000)" fill="#C5C5C5">
                <g id="imagenes" transform="translate(307.000000, 1823.000000)">
                    <g id="Image" transform="translate(290.000000, 0.000000)">
                        <path d="M110.525,93.2974915 L92.6972512,47 L70.253812,76.5502124 L55.2899396,61.775896 L30,93.2974915 L110.525,93.2974915 Z M40.0227774,49.0124537 C36.6850109,49.0124537 33.9854165,51.7231055 33.9854165,55.0750888 C33.9854165,58.4239127 36.6865905,61.1345646 40.0227774,61.1345646 C43.3573847,61.1345646 46.0585588,58.4239127 46.0585588,55.0750888 C46.0585588,51.7231055 43.3573847,49.0124537 40.0227774,49.0124537 L40.0227774,49.0124537 Z"
                              id="Shape"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <h2 class="title">Aceptación términos y condiciones</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
            <span> Progreso paso 4</span>
        </p>
        <div class="Progress-bar"><span></span></div>
        <span class="Progress-val">100%</span>
    </div>
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <form action="{{route('stepFourPost')}}" enctype="multipart/form-data" method="post" id="upload_form"
          class="steps Form-inputs Terms">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <p>¿Actualmente estás recibiendo  servicios empresariales de la Cámara de Comercio para mejorar la viabilidad
            económica de tu proyecto?
            <select  name="services" class="required" title="Selecciona la respuesta">
                <option value="">Selecciona...</option>
                <option value="1" {{($group->services == 1) ?'selected':''}}>Sí</option>
                <option value="2" {{($group->services == 2) ?'selected':''}}>No</option>
            </select>
        </p>
        <label for="terms">
            <input type="checkbox"  {{$group->check1 == 'on' ?'checked':''}} name="check1" id="terms"> * He leído y acepto los Términos y Condiciones de participación en el BOmm
        </label>

        <label for="habeasData">
            <input type="checkbox" name="check2" {{$group->check2 == 'on' ?'checked':''}} id="habeasData" > * Manifiesto que en virtud de la Ley 1581 de 2012 “Por la cual se dictan disposiciones generales para la protección de datos personales”, autorizo a la Cámara de Comercio de Bogotá de manera expresa para llevar a cabo el uso y tratamiento de todos los datos personales y/o de la compañía.
        </label>
        <div class="offset-10 col-1 ">
            <input type="submit" value="CONTINUAR" name="submit" class="Button">
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms3.js')}}"></script>
@endsection
