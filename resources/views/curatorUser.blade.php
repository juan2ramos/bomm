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
            <h2 class="title">{{$title[$view]}}</h2>
            @if($view == 'musica')
                @if (!$iframeAudio)
                    <div id="player1musica" style="margin: 20px 5px">
                        {{$group->audio1}}
                    </div>
                @else
                    <div id="rever" style="margin: 20px 5px">

                        {{$group->audio1}}
                    </div>
                @endif
                @if (!$iframeAudio2)
                    <div id="player2musica" style="margin: 20px 5px">
                        {{$group->audio2}}
                    </div>
                @else
                    <div style="margin: 20px 5px">
                        {!!$group->audio2!!}
                    </div>
                @endif
                @if (!$iframeAudio3)
                    <div id="player3musica" style="margin: 20px 5px">
                        {{$group->audio3}}
                    </div>
                @else
                    <div style="margin: 20px 5px">
                        {{$group->audio3}}
                    </div>
                @endif
            @endif
            @if($view == 'videos')
                @if (!$iframe)
                    <div class="divContent" style="color: white">
                        {{$group->video1}}
                    </div>
                @else
                    <div style="color: white">
                        {{$group->video1}}
                    </div>
                @endif
                @if (!$iframe2)
                    <div class="divContent" style="color: white">
                        {{$group->video2}}
                    </div>
                @else
                    <div style="color: white">
                        {{$group->video2}}
                    </div>
                @endif
                @if (!$iframe3)
                    <div class="divContent" style="color: white">
                        {{$group->video3}}
                    </div>
                @else
                    <div style="color: white">
                        {{$group->video3}}
                    </div>
                @endif
            @endif
            @if($view == 'social')

                @if($group->instagram)
                    <iframe src="http://instagram.com/{{substr($group->instagram,1)}}/embed" width="100%" height="400px"
                            frameborder="0"></iframe>
                @endif
                @if($group->facebook)
                    <div  style="margin: 5px 0;">
                        <svg width="30px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path fill="#3B5998g" d="M95,58.698c0-2.575-1.059-5.011-2.857-6.772c1.287-1.63,2-3.643,2.016-5.773c0.018-2.448-0.96-4.793-2.752-6.597  c-1.861-1.874-4.418-2.948-7.02-2.948H63.972l1.313-8.516c0.168-1.076,0.248-2.177,0.248-3.267c0-8.425-5.689-18.217-13.021-18.217  c-2.122,0-4.189,0.749-5.817,2.107L45.94,9.347l1.065,13.998c0.045,0.598-0.002,1.19-0.14,1.76c-0.14,0.574-0.37,1.124-0.679,1.631  l-11.215,20.78l-4.196,3.59v34.363l2.941,1.336c0.273,0.124,0.563,0.32,0.911,0.616c4.007,3.407,9.185,3.447,9.404,3.447  l32.668-0.012l0.104-0.004c5.02-0.277,8.948-4.43,8.948-9.452c0-0.759-0.088-1.505-0.264-2.228c3.419-1.462,5.729-4.832,5.729-8.702  c0-1.283-0.254-2.524-0.745-3.682C93.249,65.102,95,62.075,95,58.698z M87.211,64.1l-2.593,0.807l1.633,2.166  c0.75,0.992,1.145,2.168,1.145,3.396c0,2.771-1.986,5.113-4.719,5.572l-2.592,0.431l1.209,2.334c0.422,0.81,0.636,1.686,0.636,2.593  c0,2.979-2.318,5.442-5.289,5.634l-32.605,0.014c-0.097-0.002-4.04-0.075-6.93-2.536c-0.625-0.533-1.201-0.912-1.809-1.186  l-0.699-0.319l0,0v-30.14l3.397-2.906l11.475-21.273c0.507-0.834,0.879-1.735,1.106-2.678c0.234-0.959,0.313-1.951,0.237-2.951  l-0.908-11.935c0.792-0.449,1.689-0.692,2.606-0.692c4.954,0,9.2,7.916,9.2,14.395c0,0.9-0.07,1.805-0.205,2.687l-1.993,12.92  h24.872c1.591,0,3.158,0.663,4.307,1.819c1.07,1.077,1.654,2.454,1.643,3.876c-0.011,1.764-0.83,3.392-2.245,4.464l-2.314,1.752  l2.524,1.434c1.775,1.004,2.876,2.893,2.876,4.923C91.177,61.188,89.583,63.359,87.211,64.1z M30.671,44.519H8.926  C6.76,44.519,5,46.281,5,48.446v41.018c0,2.164,1.76,3.928,3.926,3.928h21.746c2.165,0,3.928-1.764,3.926-3.928V48.446  C34.598,46.281,32.835,44.519,30.671,44.519z M22.316,86.248c-2.268,0-4.107-1.838-4.107-4.105s1.839-4.106,4.107-4.106  s4.106,1.839,4.106,4.106C26.422,84.411,24.584,86.248,22.316,86.248z"/></svg>
                         Seguidores en Facebook : <span id="facebook"></span>
                    </div>
                @endif
                @if($group->twitter)
                    <div  style="margin: 5px 0;">
                        <svg   width="30px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path fill="#50a5e6" d="M72.955,17.969l-22.41,22.41c5.637,11.592,3.65,25.958-5.978,35.585c-9.45,9.451-23.469,11.543-34.946,6.285  c17.658,17.15,45.87,17.003,63.333-0.461C90.579,64.165,90.579,35.592,72.955,17.969z"/><path fill="#50a5e6" d="M58.281,47.966c-12.855,3.768-26.293-3.047-31.006-15.339c-7.596,6.311-11.149,16.751-8.194,26.831  c3.966,13.531,18.151,21.284,31.682,17.317c13.53-3.967,21.284-18.15,17.317-31.682c-0.197-0.676-0.428-1.333-0.675-1.979  C64.803,45.275,61.731,46.954,58.281,47.966z"/><circle cx="59.292" cy="32.235" r="19.743"/><polyline points="63.206,17.134 85.582,6.98 69.975,26.159 "/><polyline points="67.625,21.553 90,11.399 74.394,30.579 "/></svg>
                        Seguidores en Twitter : {{$t}}
                    </div>
                @endif
            @endif
            @if($view == 'presentation')

                <div id="pdf"></div>
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
    <script src="{{asset('js/pdfobject.min.js')}}"></script>
    <script>
        @if($view == 'social')
        $.getJSON("https://graph.facebook.com/v2.6/{{$group->facebook}}?fields=fan_count&access_token=EAAKC2A6WhlQBAJgUp6KbCRj06IMtaGJ8OIceeKZAl6oPL9VCpQQ04DASgeyoruVFLcRYrPziujG1L6QXBC4SFSZAV86y6QQs6goRUPqCTQvygqVszKaUd0HYA8xZAjhqkd4qv9ehHEDUsrRMYtM", function (data) {
            console.log(data.fan_count);
            $('#facebook').text(data.fan_count);
        });
        @endif
         $('.divContent').html(function (i, html) {
            return html.replace(/(?:http:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g, '<iframe width="560" height="310" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>').replace(/(?:http:\/\/)?(?:www\.)?(?:vimeo\.com)\/(.+)/g, '<iframe src="https://player.vimeo.com/video/$1" width="560" height="310" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
        });
                @if($view == 'musica')
                @if(! $iframeAudio)
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src = "//sd.toneden.io/production/toneden.loader.js"
        var entry = document.getElementsByTagName("script")[0];
        entry.parentNode.insertBefore(script, entry);
        ToneDenReady = window.ToneDenReady || [];
        ToneDenReady.push(function () {
            // Modify the dom and urls parameters to position
            // your player and select tracks/sets/artists to play.
            ToneDen.player.create({
                dom: "#player1musica",
                shrink: "light",
                urls: [
                    "{{$group->audio1}}"
                ]
            });
        });
        @endif
         @if($iframeAudio == 'reverbnation')
$('#rever').html('<iframe src="{{$group->audio1}}" width="100%" height="400px" frameborder="0" >')
                @endif

                @if(! $iframeAudio2)
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src = "//sd.toneden.io/production/toneden.loader.js"
        var entry = document.getElementsByTagName("script")[0];
        entry.parentNode.insertBefore(script, entry);
        ToneDenReady = window.ToneDenReady || [];
        ToneDenReady.push(function () {
            // Modify the dom and urls parameters to position
            // your player and select tracks/sets/artists to play.
            ToneDen.player.create({
                dom: "#player2musica",
                shrink: "light",
                urls: [
                    "{{$group->audio2}}"
                ]
            });
        });
        @endif
         @if($iframeAudio2 == 'reverbnation')
$('#rever').html('<iframe src="{{$group->audio2}}" width="100%" height="400px" frameborder="0" >')
                @endif
                @if(! $iframeAudio3)
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.async = true;
        script.src = "//sd.toneden.io/production/toneden.loader.js"
        var entry = document.getElementsByTagName("script")[0];
        entry.parentNode.insertBefore(script, entry);
        ToneDenReady = window.ToneDenReady || [];
        ToneDenReady.push(function () {
            // Modify the dom and urls parameters to position
            // your player and select tracks/sets/artists to play.
            ToneDen.player.create({
                dom: "#player3musica",
                shrink: "light",
                urls: [
                    "{{$group->audio3}}"
                ]
            });
        });
        @endif
         @if($iframeAudio3 == 'reverbnation')
        $('#rever').html('<iframe src="{{$group->audio3}}" width="100%" height="400px" frameborder="0" >')
        @endif

        @if($group->pdf)
        $('#pdf').css({'height': '500px'});
        PDFObject.embed('{{url('/')}}' + '/uploads/pdfGroups/' + '{{$group->pdf}}', "#pdf", {
            page: 1,
            pdfOpenParams: {
                navpanes: 1,
                view: "FitH",
                pagemode: "thumbs"
            }
        });
        @endif
        @endif
    </script>
@endsection










