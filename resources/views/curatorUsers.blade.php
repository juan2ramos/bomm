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
    <h2 class="title"><span style="font-weight: normal">Bienvenido</span> {{Auth::user()->nombre}}</h2>

    <div style="margin: auto;width:900px">



        <table class="Table">
            <thead style="color: #BE0F34; background: #F4F4F4;">
            <tr>
                <th>No.</th>
                <th></th>
                <th>Nombre</th>
                <th>Música <span>60 puntos</span></th>
                <th>Videos <span>10 puntos</span></th>
                <th>Redes <span>10 puntos</span></th>
                <th>Presentación <span>15 puntos</span></th>
                <th>Servicios CCB <span>5 puntos</span></th>
                <th>Total <span>100 puntos</span></th>

            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group )
                <tr>
                    <td>{{$group->id}}</td>
                    <td><a style="color:#be0f34" href="{{route('userCurator',['view'=> 'musica','id' => $group->id])}}">Evaluar artista</a></td>
                    <td>{{$group->name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

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
