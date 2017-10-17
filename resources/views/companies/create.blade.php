@extends('layouts.app')

@section('content')

    <h2 class="company-title">Actualizar información de la empresa</h2>

    <div class="alert alert-warning" role="alert">
        <span class="company-title">Campos obligatorios</span> Los campos o elementos del formulario que están marcados con un asterisco (*) son obligatorios. Hasta que no se completen estos datos el sistema no dejará guardar los cambios
    </div>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#tab_basicInformation">Informacón básica</a></li>
        <li role="presentation"><a href="#tab_synthesis">Síntesis</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab_basicInformation" class="tab-pane fade active in">

            {!! Form::open(['route' => 'company.store']) !!}
            {{-- - - - - - - - - Basic Data - - - - - - - - --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('business_name', '*Razon social') !!}
                            {!! Form::text('business_name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('num_workers', '*Número de emplados') !!}
                            {!! Form::number('num_workers', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('legal_repre', '*Representante legal') !!}
                            {!! Form::text('legal_repre', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail address') !!}
                            {!! Form::text('email', 'example@gmail.com', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
