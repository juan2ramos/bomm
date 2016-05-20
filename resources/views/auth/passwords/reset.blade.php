@extends('layouts.front')

@section('content')
    <div class="container">

        <form class="steps Form-inputs Terms" role="form" method="POST" class="steps Form-inputs " action="{{ route('passwordResetPost') }}">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">


            <h2 class="title">Restaurar contraseña</h2>
            <label for="email" class="row middle col-4">
                @if ($errors->has('email'))<p class="Form-errors">{{$errors->first('email')}}</p>@endif
                <span class="col-12 cols-12" style="padding-right: 78px">Email: </span>
                <input type="email" class="col-12 cols-12" name="email" value="{{ old('email') }}">
            </label>

            <label for="password" class="row middle col-4">
                @if ($errors->has('password'))<p class="Form-errors">{{$errors->first('password')}}</p>@endif
                <span style="padding-right: 45px" class="col-5 cols-12">Contraseña: </span>
                <input type="password" class="col-12 cols-12" id="password" name="password" value="{{ old('password') }}">
            </label>
            <label for="password_confirmation" class="row middle col-4">
                @if ($errors->has('password_confirmation'))<p class="Form-errors">{{$errors->first('password_confirmation')}}</p>@endif
                <span class="col-12 cols-12">Repetir contraseña: </span>
                <input type="password" class="col-12 cols-12" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            </label>

            <div class="offset-2" style="padding-left: 22px">
                <button type="submit" class="Button">Restaurar Contraseña</button>
            </div>
        </form>

@endsection
