
{!! Form::open(['route' => ['company.update', Auth::user()], 'method' => 'put']) !!}

@foreach($data as $dt)
{{-- - - - - - - - - Basic Data - - - - - - - - --}}
    <h3 class="title-form">Información básica</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">
                {!! Form::label('business_name', '*Razón social') !!}
                {!! Form::text('business_name', $dt->business_name, ['class'      => 'form-control',
                                                                    'placeholder' => 'Nombre de la empresa',
                                                                    'required'    => 'required']) !!}

                @if ($errors->has('business_name'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('business_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('num_workers') ? ' has-error' : '' }}">
                {!! Form::label('num_workers', '*Número de emplados') !!}
                {!! Form::number('num_workers', $dt->num_workers, ['class'       => 'form-control',
                                                     'placeholder' => 'Número de empleados',
                                                     'required'    => 'required']) !!}

                @if ($errors->has('num_workers'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('num_workers') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('legal_repre') ? ' has-error' : '' }}">
                {!! Form::label('legal_repre', '*Representante legal') !!}
                {!! Form::text('legal_repre', $dt->legal_repre, ['class'       => 'form-control',
                                                   'placeholder' => 'Representante legal',
                                                   'required'    => 'required']) !!}

                @if ($errors->has('legal_repre'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('legal_repre') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', 'Correo electrónico') !!}
                {!! Form::text('email', Auth::user()->email, ['class'       => 'form-control',
                                                              'disabled'    => 'disabled']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('type_company', 'Tipo de empresa') !!}
                {!! Form::select('type_company', [
                    '1' => 'Anónima', '2' => 'Cooperativa', '3' => 'Comandita',
                    '4' => 'Empresa Asociativa', '5' => 'Empresa Unipersonal', '6' => 'Sociedad Colectiva',
                    '7' => 'Persona Natural', '8' => 'Otra', '9' => 'No Definida'
                ], $dt->type_company, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nature', 'Naturaleza') !!}
                {!! Form::select('nature',
                    ['1' => 'Privada', '2' => 'Pública', '3' => 'Mixta'], $dt->nature,
                                                        ['class' => 'form-control'] ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('hierarchy', 'Jerarquía') !!}
                {!! Form::select('hierarchy',
                    ['1' => 'Principal', '2' => 'Sucursal'], $dt->hierarchy,
                                            ['class' => 'form-control'] ) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('economic_activity') ? ' has-error' : '' }}">
                {!! Form::label('economic_activity', '*Actividad economica') !!}
                {!! Form::text('economic_activity', $dt->economic_activity, ['class'       => 'form-control',
                                                         'placeholder' => 'Actividad economica',
                                                         'required'    => 'required']) !!}

                @if ($errors->has('economic_activity'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('economic_activity') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

{{-- - - - - - - - - Location Data - - - - - - - - --}}
    <h3 class="title-form">Localizacion de la empresa</h3>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('country', '*Pais') !!}
                <select id="country" class="form-control" name="country" required>
                    <option selected="selected" value="{{ $location->country_id }}">{{ $location->country_name }}</option>
                    @foreach($countries as $country)
                        @unless($country->id === $location->country_id)
                            <option value={{ $country->id }}>{{ $country->name }}</option>
                        @endunless
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">

                {!! Form::label('state', '*Departamento') !!}
                <select id="state" class="form-control" name="state" required>
                    <option selected="selected" value="{{ $location->state_id }}">{{ $location->state_name }}</option>
                    @foreach($states as $state)
                        @if($state->country_id === $location->country_id)
                            @unless($state->id === $location->state_id)
                                <option value={{ $state->id }}>{{ $state->name }}</option>
                            @endunless
                        @endif
                    @endforeach
                </select>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('city', '*Ciudad') !!}

                <select id="city" class="form-control" name="city_id" required>
                    <option selected="selected" value="{{ $location->city_id }}">{{ $location->city_name }}</option>
                    @foreach($cities as $city)
                        @if($city->state_id === $location->state_id)
                            @unless($city->id === $location->city_id)
                                <option value={{ $city->id }}>{{ $city->name }}</option>
                            @endunless
                        @endif
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('address', 'Dirección') !!}
                {!! Form::text('address', $dt->address, ['class'       => 'form-control',
                                               'placeholder' => 'Dirección de la empresa']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::label('phone_indic', '*Teléfono') !!}
            <div class="form-group{{ $errors->has('phone_num') ? ' has-error' : '' }} form-row">
                <div class="col-md-3">
                    {!! Form::text('phone_indic', $dt->phone_indic, ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone_num', $dt->phone_num, ['class'       => 'form-control',
                                                     'placeholder' => 'Teléfono',
                                                     'required'    => 'required']) !!}

                    @if ($errors->has('phone_num'))
                        <span class="help-block text-warning">
                            <strong>{{ $errors->first('phone_num') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone_ext', $dt->phone_ext, ['class'       => 'form-control',
                                                     'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('phone2_ind', 'Teléfono alternativo') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone2_ind', $dt->phone2_ind, ['class'       => 'form-control',
                                                      'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone2_num', $dt->phone2_num, ['class'       => 'form-control',
                                                      'placeholder' => 'Teléfono alternativo']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone2_ext', $dt->phone2_ext, ['class'       => 'form-control',
                                                      'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('celphone', 'Celular') !!}
                {!! Form::text('celphone', $dt->celphone, ['class'       => 'form-control',
                                                           'placeholder' => 'Número de celular']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('website', 'Página web') !!}
                {!! Form::text('website', $dt->website, ['class'       => 'form-control',
                                               'placeholder' => 'Página web de la empresa']) !!}
            </div>
        </div>
    </div>

{{-- - - - - - - - - contact infomation - - - - - - - - --}}
    <h3 class="title-form">Información de contacto</h3>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', '*Nombre') !!}
                {!! Form::text('name', $dt->name, ['class'       => 'form-control',
                                            'placeholder' => 'Nombre',
                                            'required'    => 'required'])!!}

                @if ($errors->has('name'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('surnames') ? ' has-error' : '' }}">
                {!! Form::label('surnames', '*Apellidos') !!}
                {!! Form::text('surnames', $dt->surnames, ['class'       => 'form-control',
                                                'placeholder' => 'Apellidos',
                                                'required'    => 'required']) !!}

                @if ($errors->has('surnames'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('surnames') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                {!! Form::label('position', '*Cargo') !!}
                {!! Form::select('position', ['1' => 'Presidente', '2' => 'Director', '3' => 'Gerente',
                                              '4' => 'Jefe', '5' => 'Coordinador', '6' => 'Analista'], $dt->position,
                                            ['class'        => 'form-control',
                                            'required'      => 'required'] ) !!}

                @if ($errors->has('position'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('position') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', '*Correo electronico') !!}
                {!! Form::text('email', $dt->email, ['class'        => 'form-control',
                                            'placeholder'   => 'Correo electronico',
                                            'required'      => 'required']) !!}

                @if ($errors->has('email'))
                    <span class="help-block text-warning">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::label('phone_ind_hr', '*Teléfono') !!}
            <div class="form-group{{ $errors->has('phone_num_hr') ? ' has-error' : '' }} form-row">
                <div class="col-md-3">
                    {!! Form::text('phone_indic_hr', $dt->phone_indic_hr, ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone_num_hr', $dt->phone_num_hr, ['class'       => 'form-control',
                                                        'placeholder' => 'Teléfono',
                                                        'required'    => 'required']) !!}
                    @if ($errors->has('phone_num_hr'))
                        <span class="help-block text-warning">
                            <strong>{{ $errors->first('phone_num_hr') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone_ext_hr', $dt->phone_ext_hr, ['class'       => 'form-control',
                                                        'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('phone2_ind_hr', 'Teléfono alternativo') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone2_indic_hr', $dt->phone2_indic_hr, ['class'       => 'form-control',
                                                           'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone2_num_hr', $dt->phone2_num_hr, ['class'        => 'form-control',
                                                         'placeholder'  => 'Teléfono alternativo']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone2_ext_hr', $dt->phone2_ext_hr, ['class'        => 'form-control',
                                                         'placeholder'  => 'ext.']) !!}
                </div>
            </div>
        </div>
    </div>

@endforeach

    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
