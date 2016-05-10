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
    <h2 class="title">Datos básicos artista o grupo</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
            <span> Progreso paso 1</span>
        </p>
        <div class="Progress-bar"><span></span></div>
        <span class="Progress-val"></span>
    </div>
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <form action="{{route('stepOne')}}" enctype="multipart/form-data" method="post" id="upload_form" class="row steps">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="col-4">
            <label for="image1" class="col-3">
                <p class="image-p">!Haz clic o arrastra la imagen en jpg o png de tu grupo¡</p>
                <input  type="file" class="file required" name="image1" id="image1">
                <figure class="FigureInputImage row middle center">
                    <svg width="81px" height="47px">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result"></output>
            </label>
        </div>
        <div class="col-8 Form-inputs">
            <label for="name" class="row middle">
                <span class="col-5 cols-12">* Nombre del artista o grupo:</span>
                <input  class="col-6 required" type="text" id="name" name="name" value="{{$group->name}}">
            </label>
            <label for="short_review" class="row middle">
                <span class="col-12 cols-12">* Escribe una breve reseña de la agrupación o artista: (700 caracteres)</span>
                <textarea  class="col-11 cols-12 required" id="short_review"
                          name="short_review">{{$group->short_review}}</textarea>
            </label>
            <label for="short_review_en" class="row middle">
                <span class="col-12 cols-12">* Escribe una breve reseña en ingles de la agrupación o artista: (700 caracteres)</span>
                <textarea  class="col-11 cols-12 required" id="short_review_en"
                          name="short_review_en">{{$group->short_review_en}}</textarea>
            </label>
            <label for="type_proposal" class="row middle">
                <span class="col-5  cols-12">* Tipo de propuesta: </span>

                <select  id="type_proposal" name="type_proposal" class="col-6 required"
                        title="Selecciona el tipo de propuesta">
                    <option value="">Selecciona...</option>
                    <option value="1" {{$group->type_proposal == 1 ? 'selected' : ''}}>Cantante/Solista</option>
                    <option value="5" {{$group->type_proposal == 5 ? 'selected' : ''}}>Compositor</option>
                    <option value="2" {{$group->type_proposal == 2 ? 'selected' : ''}}>Banda/Orquesta</option>
                    <option value="3" {{$group->type_proposal == 3 ? 'selected' : ''}}>Músico/Instrumentista</option>
                    <option value="6" {{$group->type_proposal == 6 ? 'selected' : ''}}>Otro</option>
                </select>
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
            <label for="other_proposal" class="row middle">
                <span class="col-5 cols-12">Si has respondido "Otro", por favor indica cuál:</span>
                <input class="col-6" type="text" id="other_proposal" name="other_proposal"
                       value="{{$group->other_proposal}}">
            </label>
            <label for="genre" class="row middle">
                <span class="col-5  cols-12">* Género:</span>
                <select  id="genre" name="genre" class="required col-6" title="Selecciona el tipo de género">
                    <option value="">Selecciona...</option>
                    <option value="1" {{$group->genre == 1 ? 'selected' : ''}}>Balada</option>
                    <option value="40" {{$group->genre == 40 ? 'selected' : ''}}>Bachata</option>
                    <option value="2" {{$group->genre == 2 ? 'selected' : ''}}>Blues</option>
                    <option value="4" {{$group->genre == 4 ? 'selected' : ''}}>Bolero</option>
                    <option value="5" {{$group->genre == 5 ? 'selected' : ''}}>Cumbia</option>
                    <option value="6" {{$group->genre == 6 ? 'selected' : ''}}>Electrónica</option>
                    <option value="8" {{$group->genre == 8 ? 'selected' : ''}}>Fusión</option>
                    <option value="41" {{$group->genre == 41 ? 'selected' : ''}}>Góspel</option>
                    <option value="9" {{$group->genre == 9 ? 'selected' : ''}}>Heavy Metal</option>
                    <option value="10" {{$group->genre == 10 ? 'selected' : ''}}>Hip-hop/Rap</option>
                    <option value="11" {{$group->genre == 11 ? 'selected' : ''}}>Jazz</option>
                    <option value="44" {{$group->genre == 44 ? 'selected' : ''}}>Mariachi</option>
                    <option value="12" {{$group->genre == 12 ? 'selected' : ''}}>Merengue</option>
                    <option value="13" {{$group->genre == 13 ? 'selected' : ''}}>Música clásica/Opera</option>
                    <option value="32" {{$group->genre == 32 ? 'selected' : ''}}>Música infantil</option>
                    <option value="17" {{$group->genre == 17 ? 'selected' : ''}}>Pop alternativo</option>
                    <option value="42" {{$group->genre == 42 ? 'selected' : ''}}>Pop Contemporáneo</option>
                    <option value="18" {{$group->genre == 18 ? 'selected' : ''}}>Pop electrónico</option>
                    <option value="19" {{$group->genre == 19 ? 'selected' : ''}}>Pop rock</option>
                    <option value="16" {{$group->genre == 16 ? 'selected' : ''}}>Popular</option>
                    <option value="20" {{$group->genre == 20 ? 'selected' : ''}}>Punk/Hardcore</option>
                    <option value="22" {{$group->genre == 22 ? 'selected' : ''}}>Reggae</option>
                    <option value="23" {{$group->genre == 23 ? 'selected' : ''}}>Reggaeton/Urbano</option>
                    <option value="24" {{$group->genre == 24 ? 'selected' : ''}}>Rock clásico</option>
                    <option value="25" {{$group->genre == 25 ? 'selected' : ''}}>Salsa y son</option>
                    <option value="26" {{$group->genre == 26 ? 'selected' : ''}}>Ska</option>
                    <option value="27" {{$group->genre == 27 ? 'selected' : ''}}>Tango</option>
                    <option value="43" {{$group->genre == 43 ? 'selected' : ''}}>Tropical Contemporáneo</option>
                    <option value="28" {{$group->genre == 28 ? 'selected' : ''}}>Vallenato</option>
                    <option value="29" {{$group->genre == 29 ? 'selected' : ''}}>Vocal y acapella</option>
                    <option value="30" {{$group->genre == 30 ? 'selected' : ''}}>World music</option>
                </select>
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
            <label for="pdfArtist" class="row middle">
                <span class="col-5 cols-12">* Presentación del grupo/artista en un solo archivo PDF:</span>
                <input  data-url="{{route('uploadPdfArtist')}}" class="required col-6" type="file" id="pdfArtist"
                       name="pdfArtist">
                <input type="hidden" name="pdf" id="pdfNameInput">
                <em>?<span>Se sugiere que como mínimo debe contener los siguientes componentes: Pitch (un párrafo que reseña la propuesta), el EPK (EPK significa Electronic Press Kit por sus siglas en inglés. Es una herramienta promocional en la que se incluye la biografía de la banda, fotos, información de contacto de la banda, manager, discografía, entre otros), y el Rider Técnico, la relación de los requerimientos mínimos para llevar a cabo una presentación en vivo del grupo/artista (si aplica)</span></em>
            </label>
            <label for="website" class="row middle">
                <span class="col-5 cols-12">Sitio web:</span>
                <input  class="col-6 required" type="text" id="website" name="website" value="{{$group->website}}">
            </label>
            <p class="col-11">
                Envíanos las dos redes sociales que más usas. Ten en cuenta que los curadores asignan el puntaje de
                acuerdo con el número de seguidores que tienes en cada red.
            </p>
            <div id="social">
                <label for="facebook" class="row middle ">
                    <span class="col-5 cols-12"><input type="checkbox" style="width: 20px">* Facebook:</span>
                    <input class="col-6" type="text" id="facebook" name="facebook" value="{{$group->facebook}}">
                    <em>?<span>Recuerda que la dirección de tu facebook debe estar de esta forma https://www.facebook.com/XXXXX</span></em>
                </label>
                <label for="twitter" class="row middle">
                    <span class="col-5 cols-12"><input type="checkbox" style="width: 20px">* Twitter</span>
                    <input class="col-6" type="text" id="twitter" name="twitter" value="{{$group->twitter}}">
                    <em>? <span>Recuerda que la dirección de tu twitter debe estar de esta forma @XXXXXX</span></em>
                </label>
                <label for="instagram" class="row middle">
                    <span class="col-5 cols-12"> <input type="checkbox" style="width: 20px">* Instagram</span>
                    <input class="col-6" type="text" id="instagram" name="instagram" value="{{$group->instagram}}">
                    <em>? <span>Recuerda que la dirección de tu instagram debe estar de esta forma @XXXXXX </span></em>
                </label>
            </div>
            <label for="manager" class="row middle">
                <span class="col-5 cols-12">* Manager o representante:</span>
                <input  class="col-6 required" type="text" id="manager" name="manager" value="{{$group->manager}}">
                <em>? <span>Indica si tienes un manager que representa tu agrupación</span></em>
            </label>
            <label for="show_cost" class="row middle">
                <span class="col-5 cols-12">¿Cuánto cuesta tu show en vivo? (sin contemplar gastos de traslado a otra ciudad)</span>
                <input  class="col-6 required" type="text" id="show_cost" name="show_cost" value="{{$group->show_cost}}">
            </label>
            <label for="showcases" class="row middle">
                <span class="col-5 cols-12">* Indica si quieres que tu propuesta sea evaluada para participar en los showcases:</span>
                <select  id="showcases" class="col-6 required" name="showcases"
                        title="Indica si quieres que tu propuesta sea evaluada para participar en los showcases">
                    <option value="">Selecciona...</option>
                    <option value="1" {{($group->showcases == 1 ? 'selected' : '' )}}>Sí</option>
                    <option value="2" {{($group->showcases == 2 ? 'selected' : '' )}}>No</option>
                </select>
                <em>? <span>No todos los artistas desean presentarse en vivo. Indica si aceptas que tu agrupación sea tenida en cuenta para la selección de los showcases por parte de los curadores</span></em>
            </label>
        </div>
        <div class="offset-9 col-3 ">
            <button class="Button">GUARDAR DATOS</button>
            <a class="Button">CONTINUAR</a>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/pdfobject.min.js')}}"></script>
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>

@endsection
