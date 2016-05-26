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
                <table>
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
                    <tr>
                        <td class="red">2016</td>
                        <td>{{$sixteen}}</td>
                        <td>{{$sixteenFinish}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-7">
                <table>
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
            <div class="col-2 excel" style="max-width: 50px;margin: 30px 0;">
                <a href="{{route('usersExcel')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         x="0px" y="0px" viewBox="0 0 76.222 125" enable-background="new 0 0 76.222 100"
                         xml:space="preserve"><g>
                            <g>
                                <g>
                                    <g>
                                        <path d="M50.339,0l-3.535,0.075H9.022C4.038,0.075,0,4.108,0,9.088v81.896C0,95.965,4.038,100,9.022,100h58.176      c4.982,0,9.02-4.035,9.02-9.017V29.982l0.004-3.535L50.339,0z M68.202,90.983c0,0.552-0.451,0.999-1.003,0.999H9.022      c-0.558,0-1.006-0.447-1.006-0.999V9.088c0-0.548,0.448-0.996,1.006-0.996h37.782v21.891h21.397V90.983z"/>
                                    </g>
                                </g>
                            </g>
                            <polygon
                                    points="47.125,80.28 58.191,80.28 43.642,58.79 55.734,40.927 44.668,40.927 38.109,50.618 31.55,40.927 20.48,40.927    32.576,58.79 18.028,80.28 28.601,80.28 29.09,80.28 42.074,80.28 38.161,73.927 33.393,73.927 38.109,66.961  "/>
                        </g></svg>
                </a>
            </div>

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
