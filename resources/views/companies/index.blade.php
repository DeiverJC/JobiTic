@extends('layouts.app')


@section('content')


    <div class="col-md-8">

        <div class="panel panel-primary">
            <div class="panel-body">
                <h2>
                    Mis vacantes
                    <span class="pull-right">
                        <a href="#" class="btn btn-primary">Crear vacante</a>
                    </span>
                </h2>

                Aún no publica vacantes.
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="panel panel-default">
            <div class="panel-body">
                <h5>
                    Bienvenido(a) a JobiTic la bolsa de empleo
                    pública donde podrá encontrar el Verdadero talento TIC
                </h5>
                <h4 class="company-title">Nombre de la empresa</h4>
                <p>Actividad de la empresa</p>
                <p>Fecha de inscripción: 16-10-2017</p>
                <a href="{{ route('company.create') }}" class="btn btn-primary">Actualizar información</a>
            </div>
        </div>

    </div>

@endsection
