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
    <h2 class="title">Envío definitivo de la inscripción</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
            <span> Finalización</span>
        </p>
    </div>
    <form action="{{route('stepFourPost')}}" enctype="multipart/form-data" method="post" id="upload_form"
          class="steps Form-inputs Terms">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <p>Haz clic en "Confirmar inscripción" para enviar tu solicitud. Al hacerlo, entiendes que NO podrás editar, borrar ni adjuntar más información a tu cuenta y que el jurado recibirá tu inscripción tal y como la has elaborado hasta este punto. Recibirás un correo electrónico notificando tu inscripción definitiva al BOmm "Bogotá Music Market".

        <div class="offset-8 col-4 ">
            <input type="submit" value="Confirmar inscripción" name="submit" class="Button">
            <a href="{{url('logout')}}" class="Button">Continuar más tarde</a>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms3.js')}}"></script>
@endsection
