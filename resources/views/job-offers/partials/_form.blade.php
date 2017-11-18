@if( empty($jobOffer) )
    {!! Form::open(['route' => 'job-offer.store']) !!}
@else
    {!! Form::model($jobOffer, ['route' => ['job-offer.update', $jobOffer->id]]) !!}
    {{ method_field('PUT') }}
@endif

    <h3>Información principal</h3>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Titulo de la oferta') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                @if ($errors->has('title'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('type_offer') ? ' has-error' : '' }}">
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
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('offer_country') ? ' has-error' : '' }}">
                {!! Form::label('offer_country', 'País') !!}
                {!! Form::text('offer_country', null, ['class' => 'form-control']) !!}

                @if ($errors->has('offer_country'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('offer_country') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('offer_city') ? ' has-error' : '' }}">
                {!! Form::label('offer_city', 'Ciudad') !!}
                {!! Form::text('offer_city', null, ['class' => 'form-control']) !!}

                @if ($errors->has('offer_city'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('offer_city') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('remote') ? ' has-error' : '' }}">
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
    <h3>Remuneración</h3>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group{{ $errors->has('salary_from') ? ' has-error' : '' }}">
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
            <div class="form-group{{ $errors->has('salary_until') ? ' has-error' : '' }}">
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
            <div class="form-group{{ $errors->has('cunrrency') ? ' has-error' : '' }}">
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
            <div class="form-group{{ $errors->has('type_salary') ? ' has-error' : '' }}">
                {!! Form::label('type_salary', 'Tipo de salario') !!}
                {!! Form::select('type_salary', [1 => 'Anual', 2 => 'Mensual'], NULL, [
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
    <h3>Habilidades</h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('', 'Habilidades') !!}
                {!! Form::text('', '', ['class' => 'form-control',
                    'placeholder' => 'JavaScript, Laravel, Bootstrap, GitHub, Mysql',
                    'disabled' => 'disabled']) !!}
            </div>
        </div>
    </div>
    <br>
    <h3>Información detallada</h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
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
            <div class="form-group{{ $errors->has('restrictions') ? ' has-error' : '' }}">
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
    <h3>Como será contactado</h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
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
