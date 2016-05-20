@extends('layouts.front')

@section('content')
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <div class="row ContentForms">
        <form action="{{route('register')}}" method="POST" class="col-6 cols-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2 class="title">¿Aún no tienes una cuenta?</h2>
            <div class="ContentForms-p" style="position:relative;">
                @if(!empty($errors->get('accept')[0]))<p
                        class="Form-errors">{{$errors->get('accept')[0]}}</p>@endif
                <p><b>Paso 1:</b> Lee el reglamento y acéptalo para seguir con el paso 2</p>
                <p style="margin-left: 48px;"><input name="accept" id="accept" type="checkbox"> <label for="accept">
                        He leído y acepto el
                        <a href="http://www.bogotamusicmarket.com/images/phocadownload/Reglamento_BOmm%202016%20v1.pdf" target="_blank">
                            Reglamento de Participación
                        </a>
                    </label>
                </p>
                <p><b>Paso 2:</b> Si no tienes un portafolio creado anteriormente, crea tu cuenta con los siguientes
                    datos:</p>
            </div>
            <div class="Form-inputs">

                <label for="name" class="row middle">
                    @if(!empty($errors->get('name')[0]))<p
                            class="Form-errors">{{$errors->get('name')[0]}}</p>@endif
                    <span class="col-5 cols-12">* Nombre del grupo o artista:</span>
                    <input class="col-6" type="text" id="name" name="name" value="{{old('name')}}">

                </label>
                <label for="email" class="row middle">
                    @if(!empty($errors->get('email')[0]))<p
                            class="Form-errors">{{$errors->get('email')[0]}}</p>@endif
                    <span class="col-5 cols-12">* Correo electrónico:</span>
                    <input class="col-6" type="text" id="email" name="email" value="{{old('email')}}">
                </label>
                <label for="email_confirmation" class="row middle">
                    @if(!empty($errors->get('email_confirmation')[0]))<p
                            class="Form-errors">{{$errors->get('email_confirmation')[0]}}</p>@endif
                    <span class="col-5 cols-12">* Repetir correo electrónico:</span>
                    <input class="col-6" type="text" id="email_confirmation" name="email_confirmation" value="{{old('email_confirmation')}}">
                </label>

                <label for="password" class="row middle">
                    @if(!empty($errors->get('password')[0]))<p
                            class="Form-errors">{{$errors->get('password')[0]}}</p>@endif
                    <span class="col-5 cols-12">* Contraseña:</span>
                    <input class="col-6" type="password" id="password" name="password">
                    <em>?
                        <span>
                            Máximo 12 caracteres
                        </span>
                    </em>
                </label>
                <label for="password_confirmation" class="row middle">
                    @if(!empty($errors->get('password_confirmation')[0]))<p
                            class="Form-errors">{{$errors->get('password_confirmation')[0]}}</p>@endif
                    <span class="col-5 cols-12">* Repetir contraseña:</span>
                    <input class="col-6" type="password" id="password_confirmation" name="password_confirmation">
                    <em>?
                        <span>
                            Máximo 12 caracteres
                        </span>
                    </em>
                </label>
            </div>
            <button class="offset-5 Button">Crear Cuenta</button>

        </form>

        <form action="{{route('login')}}" method="POST" class="col-6 cols-12">
            <h2 class="title">Si ya tienes una cuenta, ingresa con tus datos:</h2>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="Form-inputs">
                <label for="email" class="row middle">
                    <span class="col-3 cols-12">* Email:</span>
                    <input class="col-6" type="text" id="email" name="email">
                </label>
                <label for="password" class="row middle">
                    <span class="col-3 cols-12">* Contraseña:</span>
                    <input class="col-6" type="password" id="password" name="password">
                </label>
                <button class="offset-3 Button">Ingresar</button>
            </div>
            <p>Si has olvidado tus datos, haz clic <a href="{{route('passwordEmail')}}">aquí</a> para recordar.</p>
        </form>
        <p class=" offset-5 Info-p" >
            Para cualquier duda puedes contactarnos al siguiente correo electrónico:
            <a href="mailto:artistas@bogotamusicmarket.com">artistas@bogotamusicmarket.com</a> <br>
            Para garantizar el buen funcionamiento de este sitio, utiliza uno de estos navegadores:<br>
            <a target="_blank" href="http://windows.microsoft.com/es-es/internet-explorer/browser-ie#touchweb=touchvidtab1">Internet Explorer 8+</a> y versiones más recientes de
            <a target="_blank" href="https://www.google.com/intl/es/chrome/browser/desktop/index.html?hl=es">Chrome</a>,
            <a target="_blank" href="https://www.mozilla.org/es-ES/firefox/new/">Firefox</a>,
            <a target="_blank" href="http://www.apple.com/co/safari/">Safari para Windows</a> o
            <a target="_blank" href="http://www.apple.com/co/safari/">Safari para Mac</a>.
        </p>
    </div>
@endsection
