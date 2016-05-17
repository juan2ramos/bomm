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
    <h2 class="title">Datos representante rueda de negocios</h2>
    <div class="Progress row end middle">
        <p>Bienvenido {{Auth::user()->nombre }}<br>
            <span> Progreso paso 2</span>
        </p>
        <div class="Progress-bar"><span></span></div>
        <span class="Progress-val">100%</span>
    </div>
    <p class="requiredInfo">En caso de ser seleccionado, diligencia los siguientes datos de la persona que te
        representará en las citas de la rueda de negocios.</p>
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif
    <form action="{{route('stepTwoPost')}}" enctype="multipart/form-data" method="post" id="upload_form"
          class="row steps">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="col-4">
            <label for="imageRepresentative" class="col-3">
                <p class="image-p">!Haz clic o arrastra la imagen en jpg, png o gif de la persona que va en
                    representación! </p>
                <input type="file" class="file " name="imageRepresentative" id="photoGroup">
                <figure class="FigureInputImage row middle center">
                    @if(!$r->image_representative)
                        <svg width="81px" height="47px">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#imageTemp"></use>
                        </svg>
                    @endif
                </figure>
                <output class="result">
                    <input type="hidden" id="imageHidden" class="required" name="image_representative"
                           value="{{$r->image_representative}}">
                    @if($r->image_representative)
                        <figure>
                            <img class="thumbnail"
                                 src="{{url('uploads/photoRepresentative/' . $r->image_representative)}}"
                                 alt="">
                        </figure>
                    @endif
                </output>
            </label>
        </div>
        <div class="col-8 Form-inputs">
            <label for="nameRepresentative" class="row middle">
                @if(!empty($errors->get('name_representative')[0]))<p class="Form-errors">{{$errors->get('name_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Nombre(s) de la persona que va en representación:</span>
                <input class="col-6 required" type="text" id="nameRepresentative" name="name_representative"
                       value="{{$r->name_representative}}">
            </label>
            <label for="lastNameRepresentative" class="row middle">
                @if(!empty($errors->get('last_name_representative')[0]))<p class="Form-errors">{{$errors->get('last_name_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Apellido(s):</span>
                <input class="col-6 required" type="text" id="lastNameRepresentative" name="last_name_representative"
                       value="{{$r->last_name_representative}}">
            </label>
            <label for="identificationRepresentative" class="row middle">
<<<<<<< HEAD

=======
                @if(!empty($errors->get('identification_representative')[0]))<p class="Form-errors">{{$errors->get('identification_representative')[0]}}</p>@endif
>>>>>>> 93399367c1bd34dd6e4c93b54da38d8bec430e0c
                <span class="col-5  cols-12">* Tipo de documento de identificación: </span>

                <select id="identificationRepresentative" class=" required col-6 cols-12"
                        name="identification_representative"
                        title="Selecciona el tipo de documento de identificación">
                    <option value="">Selecciona...</option>
                    <option {{($r->identification_representative == 1)?'selected':''}} value="1">Cédula de ciudadanía
                    </option>
                    <option {{($r->identification_representative == 2)?'selected':''}}  value="2">Cédula de
                        extranjería
                    </option>
                    <option {{($r->identification_representative == 3)?'selected':''}}value="3">pasaporte</option>
                </select>
            </label>
            <label for="identificationNumberRepresentative" class="row middle">
                @if(!empty($errors->get('identification_number_representative')[0]))<p class="Form-errors">{{$errors->get('identification_number_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Número de identificación:</span>
                <input class="col-6 required" type="text" id="identificationNumberRepresentative"
                       value="{{$r->identification_number_representative}}"
                       name="identification_number_representative">
            </label>
            <label for="genderRepresentative" class="row middle">
                @if(!empty($errors->get('gender_representative')[0]))<p class="Form-errors">{{$errors->get('gender_representative')[0]}}</p>@endif
                <span class="col-5 cols-12 ">* Género </span>
                <select id="genderRepresentative" name=" gender_representative" class="required col-6 cols-12"
                        title="Selecciona el género">
                    <option value="">Selecciona...</option>
                    <option {{($r->gender_representative == 1)? 'selected':''}} value="1">Femenino</option>
                    <option {{($r->gender_representative == 2)? 'selected':''}} value="2">Masculino</option>
                </select>
            </label>
            <label for="dayRepresentative" class="row middle">
                @if(!empty($errors->get('day_representative')[0]))<p class="Form-errors">{{$errors->get('day_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Fecha de nacimiento: </span>
                <select id="dayRepresentative" name="day_representative" class="required col-2 cols-12"
                        title="Selecciona el día">
                    <option value="">DD</option>
                    @for($i = 1; $i <= 31; $i++)
                        <option {{($r->day_representative == $i)? 'selected':''}} value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <select id="monthRepresentative" name="month_representative" class=" required col-2 cols-12"
                        title="Selecciona el mes">
                    <option value="">MM</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option {{($r->month_representative == $i)? 'selected':''}} value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <select id="yearRepresentative" name="year_representative" class=" required col-2 cols-12"
                        title="Selecciona el año">
                    <option value="">YYYY</option>
                    @for($i = 1940; $i <= 2000; $i++)
                        <option {{($r->year_representative == $i)? 'selected':''}} value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </label>
            <label for="countryRepresentative" class="row middle">
                @if(!empty($errors->get('country_representative')[0]))<p class="Form-errors">{{$errors->get('country_representative')[0]}}</p>@endif
                <span class="col-5  cols-12">* País: </span>
                <select id="countryRepresentative" class="required col-6 cols-12" name="country_representative"
                        title="Selecciona el país">
                    <option value="">Selecciona...</option>
                    @foreach($countries as $country)
                        <option {{($r->country_representative == $country->id) ? 'selected' : ''}} value="{{$country->id}}">{{$country->nombre}}</option>
                    @endforeach
                </select>
            </label>
            <label for="stateRepresentative" class="row middle">
                @if(!empty($errors->get('state_representative')[0]))<p class="Form-errors">{{$errors->get('state_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Departamento:</span>
                <input class="required col-6" type="text" id="stateRepresentative" name="state_representative"
                       value="{{$r->state_representative}}">
            </label>
            <label for="cityRepresentative" class="row middle">
                @if(!empty($errors->get('city_representative')[0]))<p class="Form-errors">{{$errors->get('city_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Ciudad:</span>
                <input class="col-6 required" type="text" id="cityRepresentative" name="city_representative"
                       value="{{$r->city_representative}}">
            </label>
            <label for="addressRepresentative" class="row middle">
                @if(!empty($errors->get('address_Representative')[0]))<p class="Form-errors">{{$errors->get('address_Representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Dirección:</span>
                <input class="col-6 required" type="text" id="addressRepresentative" name="address_Representative"
                       value="{{$r->address_Representative}}">
            </label>
            <label for="phoneRepresentative" class="row middle">
                @if(!empty($errors->get('phone_Representative')[0]))<p class="Form-errors">{{$errors->get('phone_Representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Teléfono fijo:</span>
                <input class="col-6 required" type="text" id="phoneRepresentative" name="phone_Representative"
                       value="{{$r->phone_Representative}}">
                <em>?<span>Estos datos permitirán que otros participantes en el BOmm te contacten</span></em>
            </label>
            <label for="publicPhone" class="row middle">

                <span class="col-5 cols-12">¿Deseas que publiquemos en nuestro sitio web este dato? [Teléfono]:</span>
                <select id="publicPhone" class="col-6 cols-12" name="public_phone" title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->public_phone == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->public_phone == 2) ? 'selected' : ''}}value="2">No</option>
                </select>
            </label>
            <label for="mobileRepresentative" class="row middle">
                <span class="col-5 cols-12 ">Teléfono celular:</span>
                <input class="col-6" type="text" id="mobileRepresentative" name="mobile_representative"
                       value="{{$r->mobile_representative}}">
            </label>
            <label for="publicMobileRepresentative" class="row middle">
                <span class="col-5 cols-12">¿Deseas  que publiquemos en nuestro sitio web este dato? [Teléfono]:</span>
                <select id="publicMobileRepresentative" class="col-6 cols-12" name="public_mobile_representative"
                        title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->public_mobile_representative == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->public_mobile_representative == 2) ? 'selected' : ''}} value="2">No</option>
                </select>
            </label>
            <label for="emailRepresentative" class="row middle">
                @if(!empty($errors->get('email_representative')[0]))<p class="Form-errors">{{$errors->get('email_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Correo electrónico:</span>
                <input class="col-6 required" type="text" id="emailRepresentative" name="email_representative"
                       value="{{$r-> email_representative}}">
                <em>?<span>Estos datos permitirán que otros participantes en el BOmm te contacten</span></em>
            </label>
            <label for="publicEmail" class="row middle">
                <span class="col-5 cols-12">¿Deseas que publiquemos en nuestro sitio web este dato? [Correo electrónico]:</span>
                <select id="publicEmail" class="col-6 cols-12" name="public_email" title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->public_email == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->public_email == 2) ? 'selected' : ''}} value="2">No</option>
                </select>
            </label>
            <label for="emailAlternativeRepresentative" class="row middle">
                @if(!empty($errors->get('email_alternative_representative')[0]))<p class="Form-errors">{{$errors->get('email_alternative_representative')[0]}}</p>@endif
                <span class="col-5 cols-12 ">* Correo alternativo :</span>
                <input class="col-6 required" type="text" id="emailAlternativeRepresentative"
                       name="email_alternative_representative" value="{{$r->email_alternative_representative }}">
            </label>
            <label for="publicEmailAlternative" class="row middle">
                <span class="col-5 cols-12">¿Deseas que publiquemos en nuestro sitio web este dato? [Correo alternativo]:</span>
                <select id="publicEmailAlternative" class="col-6 cols-12" name="public_email_alternative"
                        title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->public_email_alternative == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->public_email_alternative == 2) ? 'selected' : ''}} value="2">No</option>
                </select>

            </label>
            <label for="smsAuthorize" class="row middle">
                @if(!empty($errors->get('sms_authorize')[0]))<p class="Form-errors">{{$errors->get('sms_authorize')[0]}}</p>@endif
                <span class="col-5 cols-12">* ¿Autorizas el envío de mensajes de texto a tu celular?:</span>
                <select id="smsAuthorize" class="col-6 cols-12 required" name="sms_authorize"
                        title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->sms_authorize == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->sms_authorize == 2) ? 'selected' : ''}} value="2">No</option>
                </select>
            </label>
            <label for="levelEducationRepresentative" class="row middle">
                @if(!empty($errors->get('level_education_representative')[0]))<p class="Form-errors">{{$errors->get('level_education_representative')[0]}}</p>@endif
                <span class="col-5 cols-12">* Nivel de estudios:</span>
                <select id="levelEducationRepresentative" name="level_education_representative"
                        class="required col-6 cols-12"
                        title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->level_education_representative == 1) ? 'selected' : ''}} value="1">Primaria</option>
                    <option {{($r->level_education_representative == 2) ? 'selected' : ''}} value="2">Bachillerato
                    </option>
                    <option {{($r->level_education_representative == 3) ? 'selected' : ''}} value="3">Técnico laboral
                    </option>
                    <option {{($r->level_education_representative == 4) ? 'selected' : ''}} value="4">Técnico
                        profesional
                    </option>
                    <option {{($r->level_education_representative == 5) ? 'selected' : ''}} value="5">Profesional
                    </option>
                    <option {{($r->level_education_representative == 6) ? 'selected' : ''}} value="6">Especialización
                    </option>
                    <option {{($r->level_education_representative == 7) ? 'selected' : ''}} value="7">Maestría</option>
                    <option {{($r->level_education_representative == 8) ? 'selected' : ''}} value="8">Doctorado</option>
                    <option {{($r->level_education_representative == 9) ? 'selected' : ''}} value="9">Ninguno</option>
                </select>
            </label>
            <label for="isCompany" class="row middle">
                @if(!empty($errors->get('is_company')[0]))<p class="Form-errors">{{$errors->get('is_company')[0]}}</p>@endif
                <span class="col-5 cols-12">* ¿Vienes en representación de una empresa?:</span>
                <select id="isCompany" class="required col-6 cols-12" name="is_company" title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->is_company == 1) ? 'selected' : ''}} value="1">Sí</option>
                    <option {{($r->is_company == 2) ? 'selected' : ''}} value="2">No</option>
                    </select>
            </label>
            <label for="companyRepresentative" class="row middle">
                <span class="col-5 cols-12">Nombre de la Empresa (fundación o corporación):</span>
                <input class="col-6" type="text" id="companyRepresentative" name="company_representative"
                       value="{{$r->company_representative }}">
            </label>
            <label for="nitCompany" class="row middle">
                <span class="col-5 cols-12">NIT:</span>
                <input class="col-6" type="text" id="nitCompany" name="nit_company" value="{{$r->nit_company }}">
            </label>
            <label for="positionCompany" class="row middle">
                <span class="col-5 cols-12">¿Qué cargo tienes en la empresa?</span>
                <select id="positionCompany" class="col-6 cols-12" name="position_company"
                        title="Selecciona la respuesta">
                    <option value="">Selecciona...</option>
                    <option {{($r->position_company == 1) ? 'selected' : ''}} value="1">Administrador</option>
                    <option {{($r->position_company == 2) ? 'selected' : ''}}value="2">Colaborador</option>
                    <option {{($r->position_company == 3) ? 'selected' : ''}}value="3">Dueño/Propietario</option>
                </select>
            </label>
        </div>
        <div class="row col-12">
            <a href="{{route('dashboard')}}" class="Button">Regresar</a>
            <input type="submit"  value="GUARDAR DATOS" name="submit" class="Button offset-7">
            <input type="submit" value="CONTINUAR" name="submit" class="Button offset-1">
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endsection
