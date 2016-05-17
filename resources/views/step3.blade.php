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
    <h2 class="title">Grabaciones</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
            <span> Progreso paso 2</span>
        </p>
        <div class="Progress-bar"><span></span></div>
        <span class="Progress-val">100%</span>
    </div>
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <form action="{{route('stepThreePost')}}" enctype="multipart/form-data" method="post" id="upload_form"
          class="steps Form-inputs">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <label for="producer" class="  row middle col-12">
            @if(!empty($errors->get('producer')[0]))<p class="Form-errors">{{$errors->get('producer')[0]}}</p>@endif
            <span class="col-12 cols-12">* Productor(es) <br>(500 caracteres):</span>
            <textarea class="col-12 cols-12 required" id="producer" name="producer">{{$group->producer}}</textarea>
        </label>
        <div class="Record row ">

            <div class="col-6" style="position: relative" id="Audios"><h3 class="title">* Audios online [SoundCloud - Reverbnation]
                    <a href="http://ruedadenegocios.bogotamusicmarket.com/pdf/manualAudioBOmm.pdf" target="_blank">Ver manual</a></h3>

                @if(!empty($errors->get('audio1')[0]) || !empty($errors->get('audio2')[0]) || !empty($errors->get('audio3')[0]))
                    <p class="Form-errors">Debes tener por lo menos un audio</p>
                @endif
                <label for="audio1" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 1:</span>
                    <textarea class="col-12 cols-12" id="audio1" name="audio1">{{$group->audio1}}</textarea>
                </label>
                <label for="audio2" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 2:</span>
                    <textarea class="col-12 cols-12" id="audio2" name="audio2">{{$group->audio2}}</textarea>
                </label>
                <label for="audio3" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 3:</span>
                    <textarea class="col-12 cols-12" id="audio3" name="audio3">{{$group->audio3}}</textarea>
                </label>
            </div>
            <div class="col-6" id="Videos" style="position: relative"><h3 class="title">* Video [Youtube - Vimeo]
                    <a href="http://ruedadenegocios.bogotamusicmarket.com/pdf/manualVideoBOmm.pdf" target="_blank">Ver manual</a></h3>
                @if(!empty($errors->get('video1')[0]) || !empty($errors->get('video2')[0]) || !empty($errors->get('video3')[0]))
                    <p class="Form-errors">Debes tener por lo menos un Video</p>
                @endif
                <label for="video1" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 1:</span>
                    <textarea class="col-12 cols-12" id="video1" name="video1">{{$group->video1}}</textarea>
                </label>
                <label for="video2" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 2:</span>
                    <textarea class="col-12 cols-12" id="video2" name="video2">{{$group->video2}}</textarea>
                </label>

                <label for="video3" class="row middle col-12">
                    <span class="col-12 cols-12">Enlace o embed 3:</span>
                    <textarea class="col-12 cols-12" id="video3" name="video3">{{$group->video3}}</textarea>
                </label>
            </div>

        </div>
        <div class="row col-12">
            <a href="{{route('stepTwo')}}" class="Button">Regresar</a>
            <input type="submit"  value="GUARDAR DATOS" name="submit" class="Button offset-7">
            <input type="submit" value="CONTINUAR" name="submit" class="Button offset-1">
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
    <script src="{{asset('js/forms2.js')}}"></script>
@endsection
