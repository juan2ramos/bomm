<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('openGraph')
    <title>BOmm</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
            <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
</head>
<body>

<main>
    <header class="Header">
        <figure>
            <img src="{{url('images/logo_ccb.jpg')}}" alt="Logo Camara de Comercio de Bogotá">
        </figure>
        <h1 class="Header-barInfo">
            Bogotá Music Market - BOmm 2016 - Inscripciones
        </h1>
        <div class="Header-route">
            <a href="http://www.bogotamusicmarket.com/">Inicio</a> <span> > </span> Información BOmm
        </div>
        @if(Auth::check() && Auth::user()->role == 3)
            <a class="Logout" href="{{route('logout')}}">Cerrar sesión[X]</a>

        <ul class="row middle Steps">
            <li>pasos de <br>Inscripción</li>
            <li><a class="{{($step == 1)? 'current':''}}" href="{{route('dashboard')}}">Datos básicos artista o grupo</a></li>
            <li><a class="{{($step == 2)? 'current':''}}" href="{{route('stepTwo')}}">Datos representante rueda de negocios </a></li>
            <li><a class="{{($step == 3)? 'current':''}}" href="{{route('stepThree')}}">Grabaciones</a></li>
            <li><a class="{{($step == 4)? 'current':''}}" href="{{route('stepFour')}}">Aceptación términos y condiciones </a></li>
        </ul>
        @endif
        <div class="Header-bar row middle end">
            @if(Auth::check())
                <a class="Logout" href="http://www.bogotamusicmarket.com/images/phocadownload/Reglamento_BOmm%202016%20v1.pdf" target="_blank">Reglamento de participación</a>
            @endif
        </div>
    </header>
    @yield('content')
    <footer class="Footer">
        <hr>
        <div class="Footer-info">
            Contáctese con la CCB:<br>
            Línea de Respuesta Inmediata (57 1) 3830330 |
            <a href="http://www.ccb.org.co/Preguntas-frecuentes" target="_blank">Preguntas frecuentes</a> |
            <a href="http://chat.millenium.com.co:8080/webchatccb/userinfo.jsp?chatID=N00A730aPr&workgroup=agentesccb@workgroup.chatminco.millenium.com.co"
               target="_blank">Chat</a> |
            <a href="http://190.144.149.101:8080/click/ccbclick.html" target="_blank">Llamada virtual </a> |
            <a href="http://www.ccb.org.co/Escribanos" target="_blank">Contáctenos</a> |
            <a href="http://sqyf.ccb.org.co/(S(ecrrfjf1wy1xde214cjzrxdq))/frmDefault.aspx#posicionpagina"
               target="_blank"> Sugerencias, quejas y felicitaciones</a>
            <a href="http://www.ccb.org.co/La-Camara-CCB/Nuestras-sedes" target="_blank">Mapa de sedes</a> |
            <a href="http://www.ccb.org.co/La-Camara-CCB/Nuestras-sedes" target="_blank"> Directorio de sedes</a> |
            <a href="http://www.ccb.org.co/La-Camara-CCB/Nuestras-sedes" target="_blank">Horarios de atención</a>
        </div>
        <hr>
        <div>
            Cámara de Comercio de Bogotá © Todos los derechos reservados | Términos y condiciones de uso de:
            <a href="http://www.ccb.org.co/Terminos-y-condiciones" target="_blank">Sitio </a>,
            <a href="http://chat.millenium.com.co:8080/webchatccb/userinfo.jsp?chatID=N00A730aPr&workgroup=agentesccb@workgroup.chatminco.millenium.com.co"
               target="_blank">Chat</a> |y
            <a href="http://www.ccb.org.co/Reglas-en-redes-sociales" target="_blank">Reglas en redes sociales</a> |
            <a href="http://www.ccb.org.co/La-Camara-CCB/Nuestras-sedes" target="_blank">Mapa del sitio</a> |
            <a href="http://www.ccb.org.co/Inscripciones-y-renovaciones/Medios-de-pago" target="_blank">Medios de
                pago</a>
            Recomendado visualizar en : IE7 - IE8 - Firefox 3.0 - Safari - Chrome | Este sitio está certificado por
            <a href="https://web.certicamara.com/" target="_blank"> Certicámara S.A.</a>
            Autoridad de certificación digital abierta | Optimizada 1024 x 768

        </div>
    </footer>
</main>


<script src="{{asset('http://code.jquery.com/jquery-1.11.2.min.js')}}"></script>
@yield('scripts')
</body>
</html>