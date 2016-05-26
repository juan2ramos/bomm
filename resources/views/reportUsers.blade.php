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

    <div style="margin: auto;width:900px">

        <div class="row">
            <div class="col-4">
            <table >
                <thead>
                <tr>
                    <th>Año</th>
                    <th>Inscritos</th>
                    <th>Finalizados</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="red">2013</td>
                    <td>{{$thirteen}}</td>
                    <td>{{$thirteenFinish}}</td>
                </tr>
                <tr>
                    <td class="red">2014</td>
                    <td>{{$fourteen}}</td>
                    <td>{{$fourteenFinish}}</td>
                </tr>
                <tr>
                    <td class="red">2015</td>
                    <td>{{$fifteen}}</td>
                    <td>{{$fifteenFinish}}</td>
                </tr>
                </tbody>
            </table>
            </div>
            <table class="col-5">
                <tr>
                    <td class="red">Inscritos</td>
                    <td>{{$registers}}</td>
                </tr>
                <tr>
                    <td class="red">Inscritos finalizados</td>
                    <td>{{$finish}}</td>
                </tr>
            </table>


        </div>

        <table class="Table">
            <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Año inscripción</th>
                <th>Fecha de inscripción</th>
                <th>Fecha de Finalizacion</th>
                <th>Formulario</th>
                <th>Ver datos</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group )
                <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->name}}</td>
                    <td>{{$group->call->inscripcion_inicial}}</td>
                    <td>{{$group->date_human}}</td>
                    <td>{{$group->call->date_human}}</td>
                    <td>{{$group->call->step}}</td>
                    <td><a href="{{route('user',['id' => $group->id])}}">VER</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms3.js')}}"></script>
@endsection
