@extends('layouts/front')

        <!-- Main Content -->
@section('content')
    <div class="container">


        <h2 class="title">Restaurar contraseña</h2>
        <form class="steps Form-inputs Terms" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <label for="email" class="row middle col-4">
                @if ($errors->has('email'))<p class="Form-errors">{{$errors->first('email')}}</p>@endif
                <span class="col-12 cols-12">Email</span>
                <input type="email" class="col-12 cols-12" id="" name="email" value="{{ old('email') }}">
            </label>
            <div class="offset-1" style="padding-left: 24px">
                <button type="submit" class="Button">Restaurar Contraseña</button>
            </div>
        </form>

    </div>
    </div>
@endsection
