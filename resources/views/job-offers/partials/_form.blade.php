@if( empty($jobOffer) )
    {!! Form::open(['route' => 'job-offer.store']) !!}
@else
    {!! Form::model($jobOffer, ['route' => ['job-offer.update', $jobOffer->id]]) !!}
    {{ method_field('PUT') }}
@endif

    <h3 class="text-muted">Información principal</h3>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} text-muted">
                {!! Form::label('title', 'Titulo de la oferta') !!}
                {!! Form::text('title', null, ['class' => 'form-control',
                'placeholder' => 'Titulo de la oferta']) !!}

                @if ($errors->has('title'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('type_offer') ? ' has-error' : '' }} text-muted">
                {!! Form::label('type_offer', 'Tipo de oferta') !!}
                {!! Form::select('type_offer', [
                        1 => 'Medio tiempo',
                        2 => 'Tiempo completo',
                        3 => 'Proyecto'], null, [
                        'class' => 'form-control',
                        'placeholder' => 'Elija una tipo...',
                        'required' => 'required']) !!}

                @if ($errors->has('type_offer'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('type_offer') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">

    @if( empty($jobOffer) )

        <div class="col-md-3">
            <div class="form-group text-muted">
                {!! Form::label('country', 'País') !!}
                {!! Form::select('country', $countries->pluck('name', 'id'), null, [
                    'class' => 'form-control',
                    'id' => 'country',
                    'required' => 'required',
                    'placeholder' => 'Elija país...'
                    ]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group text-muted">
                {!! Form::label('state', 'Departamento') !!}
                {!! Form::select('state',[], null, [
                    'id' => 'state',
                    'class' => 'form-control',
                    'required' => 'required',
                    ] ) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group text-muted">
                {!! Form::label('city', 'Ciudad') !!}
                {!! Form::select('city_id', [], null, [
                    'id' => 'city',
                    'class' => 'form-control',
                    'required' => 'required',
                    ]) !!}
            </div>
        </div>

    @else

        @include('job-offers.partials._location_job_form', [
            'countries' => $countries,
            'states'    => $states,
            'cities'    => $cities,
        ])

    @endif

        <div class="col-md-3">

            <div class="form-group{{ $errors->has('remote') ? ' has-error' : '' }} text-muted">
                {!! Form::label('remote', '¿Es remoto?') !!}
                {!! Form::select('remote', [1 => 'Si', 2 => 'No'], NULL, [
                    'class' => 'form-control',
                    'placeholder' => 'Elija una tipo...',
                    'required' => 'required']) !!}

                @if ($errors->has('remote'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('remote') }}</strong>
                    </span>
                @endif
            </div>

        </div>

    </div>
    <br>
    <h3 class="text-muted">Remuneración</h3>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group{{ $errors->has('salary_from') ? ' has-error' : '' }} text-muted">
                {!! Form::label('salary_from', 'Salario desde') !!}
                {!! Form::number('salary_from', null, ['class' => 'form-control']) !!}

                @if ($errors->has('salary_from'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('salary_from') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group{{ $errors->has('salary_until') ? ' has-error' : '' }} text-muted">
                {!! Form::label('salary_until', 'Salario hasta') !!}
                {!! Form::number('salary_until', null, ['class' => 'form-control']) !!}

                @if ($errors->has('salary_until'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('salary_until') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group{{ $errors->has('cunrrency') ? ' has-error' : '' }} text-muted">
                {!! Form::label('cunrrency', 'Moneda') !!}
                {!! Form::text('cunrrency', NULL, ['class' => 'form-control', 'placeholder' => 'COP, USD...']) !!}

                @if ($errors->has('cunrrency'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('cunrrency') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group{{ $errors->has('type_salary') ? ' has-error' : '' }} text-muted">
                {!! Form::label('type_salary', 'Tipo de salario') !!}
                {!! Form::select('type_salary', [1 => 'Anual', 2 => 'Mensual'], null, [
                    'class' => 'form-control',
                    'placeholder' => 'Elija una tipo...',
                    'required' => 'required']) !!}

                @if ($errors->has('type_salary'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('type_salary') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <br>
    <h3 class="text-muted">Habilidades</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-muted">
                {!! Form::label('select-skills', 'Habilidades') !!}
                {!! Form::select('skills[]', $skills->pluck('name', 'id'), null, [
                    'id' => 'select-skills', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>
    <br>
    <h3 class="text-muted">Información detallada</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} text-muted">
                {!! Form::label('description', 'Descripción de la oferta') !!}
                {!! Form::textArea('description', NULL, ['class' => 'form-control',
                    'placeholder' => 'Redacte la descripción de su oferta laboral']) !!}

                @if ($errors->has('description'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('restrictions') ? ' has-error' : '' }} text-muted">
                {!! Form::label('restrictions', 'Restricciones de la oferta') !!}
                {!! Form::textArea('restrictions', NULL, ['class' => 'form-control',
                    'placeholder' => 'Redacte las restricciones de su oferta laboral']) !!}

                @if ($errors->has('restrictions'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('restrictions') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <br>
    <h3 class="text-muted">Como será contactado</h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-muted">
                {!! form::text('', 'Enviar hoja de vida a: '
                    .$data,
                    ['class' => 'form-control', 'rows' => '1', 'disabled' => 'disabled']) !!}
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a href="{{ route('company.index') }}" class="btn btn-danger">Cancelar</a>
        {!! Form::submit('Publicar oferta', ['class' => 'btn btn-primary']) !!}

    </div>

{!! Form::close() !!}
