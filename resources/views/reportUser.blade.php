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
    <h2 class="title">Reporte usuarios</h2>

    <div style="margin: 20px auto;width:900px; display:flex ">
        <div style="padding: 10px; width: 50%">
            <h2>Datos básicos</h2>
            <p><img src="{{url('uploads/photoGroups/'.$group->image)}}" alt=""></p>
            <p>Nombre del grupo: {{$group->name}}</p>
            <p>Tipo de propuesta: {{$group->type_proposal}}</p>
            <p style="text-align: justify">Reseña: {{$group->short_review}}</p>
            <p style="text-align: justify">Reseña Ingles: {{$group->short_review_en}}</p>
            <p>Género: {{$group->genre}}</p>
            <p>Facebook:{{$group->facebook}}</p>
            <p>Twitter: {{$group->twitter}}</p>
            <p>Instagram: {{$group->instagram}}</p>
            <p>¿Cuánto cuesta tu show en vivo? {{$group->show_cost}}</p>
            <p>Manager o representante: {{$group->manager}}</p>
            <p>Propuesta sea evaluada para participar en los showcases: {{$group->showcases}}</p>
            <p>Pdf: <a target="_blank" href="{{url('uploads/pdfGroups/'.$group->pdf)}}">VER</a></p>
            <p>Website: {{$group->website}}</p>
            <p>Recibiendo servicios empresariales de la Cámara de Comercio {{$group->services}}</p>

            <h2>Grabaciones</h2>
            <p>Video 1: {{$group->video1}}</p>
            <p>Video 2: {{$group->video2}}</p>
            <p>Video 3: {{$group->video3}}</p>
            <p>Audio 1: {{$group->audio1}}</p>
            <p>Audio 2: {{$group->audio2}}</p>
            <p>Audio 3: {{$group->audio3}}</p>
            <p>Productor: {{$group->producer}}</p>

        </div>
        @if($representative)
            <div style="padding: 10px; width: 50%">

                <h2>Datos representante</h2>
                <p>Nombre(s) de la persona que va en representación: {{ $representative->name_representative }}</p>
                <p><img src="{{url('uploads/photoRepresentative/'.$representative->image_representative)}}" alt=""></p>
                <p>Apellido(s): {{ $representative->last_name_representative }}</p>
                <p>Tipo de documento de identificación: {{ $representative->identification_representative }}</p>
                <p>Número de identificación: {{ $representative->identification_number_representative }}</p>
                <p>Género{{ $representative->gender_representative }}</p>
                <p> Fecha de nacimiento {{ $representative->day_representative }}
                    /{{ $representative->month_representative }}
                    /{{ $representative->year_representative }}</p>
                <p>País: {{ $representative->country_representative }}</p>
                <p>Departamento:{{ $representative->state_representative }}</p>
                <p>Ciudad:{{ $representative->city_representative }}</p>
                <p>Dirección:{{ $representative->address_Representative }}</p>
                <p>Teléfono fijo:{{ $representative->phone_Representative }}</p>
                <p>Teléfono celular:{{ $representative->mobile_representative }}</p>
                <p>Correo electrónico:{{ $representative->email_representative }}</p>
                <p>Correo alternativo {{ $representative->email_alternative_representative }}</p>
                <p>Nivel de estudios:{{ $representative->level_education_representative }}</p>
                <p>¿Vienes en representación de una empresa?:{{ $representative->is_company }}</p>
                <p>Nombre de la Empresa:{{ $representative->company_representative }}</p>
                <p>NIT:{{ $representative->nit_company }}</p>
                <p>¿Qué cargo tienes en la empresa?{{ $representative->position_company }}</p>
            </div>
        @endif
    </div>
    <div class="row col-12">
        <a href="{{route('users')}}" class="Button">Regresar</a>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms3.js')}}"></script>
@endsection
