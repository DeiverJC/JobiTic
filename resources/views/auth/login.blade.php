@extends('layouts.master')

@section('header')
    @include('layouts.partials._header_auth')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center row-top">
        <div class="col-md-6">
            <div class="card bg-default" style="border: 0; padding-top: 20px;">


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6">Correo Electronico</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Contraseña</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                                <a class="btn-link float-right" href="{{ route('password.request') }}">
                                    ¿Olvido su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
