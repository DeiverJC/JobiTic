@extends('layouts.app')


    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

@section('content')

    <div class="col-md-8">

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
                <h3 class="card-title">Nombre de la empresa</h3>
                <p class="card-text">Actividad de la empresa</p>
                <p class="card-text">Fecha de inscripción: 16-10-2017</p>
                <a href="{{ route('company.edit', Auth::user()) }}" class="btn btn-info">editar</a>
                <a href="{{ route('company.create') }}" class="btn btn-info float-right">Actualizar información</a>
            </div>
        </div>

    </div>

@endsection
