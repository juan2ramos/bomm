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
    <h2 class="title"><span style="font-weight: normal">Información: </span> {{$group->name}}</h2>

    <div class="row" style="margin: auto;width:970px">

        <div class="col-4" style="padding: 20px 20px 10px 10px">
            <figure><img src="{{url('uploads/photoGroups/'.$group->image)}}" alt=""></figure>
            <h2 class="title" style="position: relative; z-index: 3">Menú:</h2>
            <nav class="Menu-evaluation">
                <ul>
                    <li><a href="{{route('usersCurator')}}"> Regresar al listado de artistas</a></li>
                    <li><a href="{{route('userCurator',['view'=> 'musica','id' => $group->id])}}"> Música</a></li>
                    <li><a href="{{route('userCurator',['view'=> 'videos','id' => $group->id])}}"> Videos</a></li>
                    <li><a href="{{route('userCurator',['view'=> 'social','id' => $group->id])}}"> Redes</a></li>
                    <li><a href="{{route('userCurator',['view'=> 'presentation','id' => $group->id])}}">
                            Presentación</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-8" style="margin-top: 20px">
            <h2 class="title">Música</h2>
            @if($view == 'musica')
                <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://soundcloud.com/sebasti-n-vasco/senuelosseven"></iframe>
            @endif
            @if($view == 'videos')
            @endif
            <h2 class="title">Evaluación</h2>
            <form action="{{route('userCuratorSave')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <h3 class="title-h3">1. Música</h3>
                <div class="Evaluation">
                    <div class="row middle">
                        <div class="col-3">a. Calidad artística</div>
                        <div class="col-9">
                            @for($i=0;$i <= 15; $i++)
                                <input type="radio" name="artistic_quality" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3"> b. Originalidad</div>
                        <div class="col-9">
                            @for($i=0;$i <= 15; $i++)
                                <input type="radio" name="originality" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3">c. Calidad de producción</div>
                        <div class="col-9">
                            @for($i=0;$i <= 15; $i++)
                                <input {{(isset($score->production_quality_music ) && $score->production_quality_music == $i )?'checked':''}}
                                       type="radio" name="production_quality_music" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                    <div class="row middle">
                        <div class="col-3">d. Potencial comercial</div>
                        <div class="col-9">
                            @for($i=0;$i <= 15; $i++)
                                <input type="radio" name="market_potential" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                </div>
                <h3 class="title-h3">2. Videos</h3>
                <div class="Evaluation">
                    <div class="row middle">
                        <div class="col-3">a. Calidad de producción</div>
                        <div class="col-9">
                            @for($i=0;$i <= 5; $i++)
                                <input type="radio" name="production_quality_video" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3"> b. Dirección artística</div>
                        <div class="col-9">
                            @for($i=0;$i <= 5; $i++)
                                <input type="radio" name="artistic_direction" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                </div>
                <h3 class="title-h3">3. Redes</h3>
                <div class="Evaluation">
                    <figure><img style="margin: auto" src="{{url('images/redes.jpg')}}" alt=""></figure>
                    <div class="row middle">
                        <div class="col-3">a. Facebook</div>
                        <div class="col-9">
                            @for($i=0;$i <= 5; $i++)
                                <input type="radio" name="facebook" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3"> b. Twitter</div>
                        <div class="col-9">
                            @for($i=0;$i <= 5; $i++)
                                <input type="radio" name="twitter" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3">c. Instagram</div>
                        <div class="col-9">
                            @for($i=0;$i <= 5; $i++)
                                <input type="radio" name="instagram" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                </div>
                <h3 class="title-h3">4. Presentación</h3>
                <div class="Evaluation">
                    <div class="row middle">
                        <div class="col-3">a. Calidad texto</div>
                        <div class="col-9">
                            @for($i=0;$i <= 4; $i++)
                                <input type="radio" name="quality_text" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3"> b. Calidad fotos</div>
                        <div class="col-9">
                            @for($i=0;$i <= 4; $i++)
                                <input type="radio" name="quality_photos" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-3">c. Información técnica</div>
                        <div class="col-9">
                            @for($i=0;$i <= 4; $i++)
                                <input type="radio" name="technical_information" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                    <div class="row middle">
                        <div class="col-3">d. Pitch</div>
                        <div class="col-9">
                            @for($i=0;$i <= 3; $i++)
                                <input type="radio" name="pitch" value="{{$i}}">{{$i}}
                            @endfor
                        </div>
                    </div>

                </div>
                <h3 class="title-h3">5. Showcase</h3>
                <div class="Evaluation">
                    <div class="row middle">
                        <div class="col-3">¿Grupo seleccionado para showcase?</div>
                        <div class="col-9">
                            <input type="radio" name="showcase" value="1">Si
                            <input type="radio" name="showcase" value="2">No

                        </div>
                    </div>

                </div>
                <input type="hidden" name="group_id" value="{{$id}}">
                <div class="row end" style="margin: 5px 0 15px">
                    <button class="Button">Guardar datos</button>
                </div>
            </form>
        </div>


    </div>


@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms3.js')}}"></script>
@endsection
