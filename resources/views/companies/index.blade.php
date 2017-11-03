@extends('layouts.app')



@section('content')

    <div class="col-md-8">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('status') }}</strong>
            </div>
        @endif

        <div class="card">
            <h3 class="card-header">
                Mis vacantes

                <span class="float-right">
                        <a href="#" class="btn btn-info">Crear vacante</a>
                </span>
            </h3>
            <div class="card-body">
                <p class="card-text">Aún no publica vacantes.</p>
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Bienvenido(a) a JobiTic donde encontrar talento TIC es muy facil.
                </h5>
                @if(!empty($dataUser))
                <h3 class="card-title">{{ $dataUser->business_name }}</h3>
                <p class="card-text">{{ $dataUser->economic_activity }}</p>
                <p class="card-text">Fecha de inscripción: 16-10-2017</p>
                <a href="{{ route('company.edit', Auth::user()) }}" class="btn btn-info float-right">
                    Actualizar información
                </a>
                @endif
            </div>
        </div>

    </div>

@endsection
