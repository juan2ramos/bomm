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
        <span class="Progress-val">100%</span>
    </div>
    <p class="requiredInfo">Los campos marcados con * son necesarios</p>
    <form action="{{route('stepOne')}}" enctype="multipart/form-data" method="post" id="upload_form" class="row steps">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="col-4">
            <label for="image1" class="col-3">
                <p class="image-p">!Haz clic o arrastra la imagen en jpg o png de tu grupo¡</p>
                <input type="file" class="file" name="image1" id="image1">
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
                <input class="col-6" type="text" id="name" name="name" value="{{$group->nombre}}">
            </label>
            <label for="short_review" class="row middle">
                <span class="col-12 cols-12">* Escribe una breve reseña de la agrupación o artista: (700 caracteres)</span>
                <textarea class="col-11 cols-12" id="short_review" name="short_review"></textarea>
            </label>
            <label for="type_proposal" class="row middle">
                <span class="col-5  cols-12">* Tipo de propuesta: </span>
                <select id="type_proposal" name="type_proposal" class="col-6" title="Selecciona el tipo de propuesta">
                    <option value="">Selecciona...</option>
                    <option value="1">Cantante/Solista</option>
                    <option value="5">Compositor</option>
                    <option value="2">Banda/Orquesta</option>
                    <option value="3">Músico/Instrumentista</option>
                    <option value="6">Otro</option>
                </select>
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
            <label for="other_proposal" class="row middle">
                <span class="col-5 cols-12">Si has respondido "Otro", por favor indica cuál:</span>
                <input class="col-6" type="text" id="other_proposal" name="other_proposal">
            </label>
            <label for="genre" class="row middle">
                <span class="col-5  cols-12">* Tipo de propuesta: </span>
                <select id="genre" name="genre" class="col-6" title="Selecciona el tipo de género">
                    <option value="">Selecciona...</option>
                    <option value="1">Balada</option>
                    <option value="40">Bachata</option>
                    <option value="2">Blues</option>
                    <option value="4">Bolero</option>
                    <option value="5">Cumbia</option>
                    <option value="6">Electrónica</option>
                    <option value="8">Fusión</option>
                    <option value="41">Góspel</option>
                    <option value="9">Heavy Metal</option>
                    <option value="10">Hip-hop/Rap</option>
                    <option value="11">Jazz</option>
                    <option value="44">Mariachi</option>
                    <option value="12">Merengue</option>
                    <option value="13">Música clásica/Opera</option>
                    <option value="32">Música infantil</option>
                    <option value="17">Pop alternativo</option>
                    <option value="42">Pop Contemporáneo</option>
                    <option value="18">Pop electrónico</option>
                    <option value="19">Pop rock</option>
                    <option value="16">Popular</option>
                    <option value="20">Punk/Hardcore</option>
                    <option value="22">Reggae</option>
                    <option value="23">Reggaeton/Urbano</option>
                    <option value="24">Rock clásico</option>
                    <option value="25">Salsa y son</option>
                    <option value="26">Ska</option>
                    <option value="27">Tango</option>
                    <option value="43">Tropical Contemporáneo</option>
                    <option value="28">Vallenato</option>
                    <option value="29">Vocal y acapella</option>
                    <option value="30">World music</option>
                </select>
                <em>?<span>Máximo 12 caracteres</span></em>
            </label>
            <label for="pdfArtist" class="row middle">
                <span class="col-5 cols-12">* Presentación del grupo/artista en un solo archivo PDF:</span>
                <input data-url="{{route('uploadPdfArtist')}}" class="col-6" type="file" id="pdfArtist"
                       name="pdfArtist">
                <input type="hidden" name="pdf" id="pdfNameInput">
                <em>?<span>Se sugiere que como mínimo debe contener los siguientes componentes: Pitch (un párrafo que reseña la propuesta), el EPK (EPK significa Electronic Press Kit por sus siglas en inglés. Es una herramienta promocional en la que se incluye la biografía de la banda, fotos, información de contacto de la banda, manager, discografía, entre otros), y el Rider Técnico, la relación de los requerimientos mínimos para llevar a cabo una presentación en vivo del grupo/artista (si aplica)</span></em>
            </label>

            <label for="website" class="row middle">
                <span class="col-5 cols-12">Sitio web:</span>
                <input class="col-6" type="text" id="website" name="website">
            </label>
            <label for=facebook"" class="row middle">
                <span class="col-5 cols-12">* Facebook:</span>
                <input class="col-6" type="text" id="facebook" name="facebook">
                <em>?<span>Recuerda que la dirección de tu facebook debe estar de esta forma https://www.facebook.com/XXXXX</span></em>
            </label>
            <label for="twitter" class="row middle">
                <span class="col-5 cols-12">* Twitter</span>
                <input class="col-6" type="text" id="twitter" name="twitter">
                <em>? <span>Recuerda que la dirección de tu facebook debe estar de esta forma https://www.facebook.com/XXXXX</span></em>
            </label>
            <label for="manager" class="row middle">
                <span class="col-5 cols-12">* Manager o representante:</span>
                <input class="col-6" type="text" id="manager" name="manager">
                <em>? <span>Indica si tienes un manager que representa tu agrupación</span></em>
            </label>
            <label for="show_cost" class="row middle">
                <span class="col-5 cols-12">¿Cuánto cuesta tu show en vivo? (sin contemplar gastos de traslado a otra ciudad)</span>
                <input class="col-6" type="text" id="show_cost" name="show_cost">
            </label>
            <label for="showcases" class="row middle">
                <span class="col-5 cols-12">* Indica si quieres que tu propuesta sea evaluada para participar en los showcases:</span>
                <select id="showcases" class="col-6" name="showcases"
                        title="Indica si quieres que tu propuesta sea evaluada para participar en los showcases">
                    <option value="">Selecciona...</option>
                    <option value="1">Sí</option>
                    <option value="2">No</option>
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
@endsection
