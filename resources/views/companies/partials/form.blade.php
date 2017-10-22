{!! Form::open(['route' => 'company.store']) !!}


{{-- - - - - - - - - Basic Data - - - - - - - - --}}
    <h3 class="title-form">Información básica</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('business_name', '*Razon social') !!}
                {!! Form::text('business_name', '', ['class' => 'form-control', 'placeholder' => 'Nombre de la empresa']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('num_workers', '*Número de emplados') !!}
                {!! Form::number('num_workers', '', ['class' => 'form-control', 'placeholder' => 'Número de empleados']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('legal_repre', '*Representante legal') !!}
                {!! Form::text('legal_repre', '', ['class' => 'form-control', 'placeholder' => 'Representante legal']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', 'E-mail address') !!}
                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'micorreo@email.com', 'disabled' => 'disabled']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('type_company', 'Tipo de empresa') !!}
                {!! Form::text('type_company', '', ['class' => 'form-control', 'placeholder' => 'Tipo de empresa']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nature', 'Naturaleza') !!}
                {!! Form::select('nature',
                    ['1' => 'Privada', '2' => 'Pública', '3' => 'Mixta'], null,
                    ['class' => 'form-control', 'placeholder' => 'Elija una opción...'] ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('hierarchy', 'Jerarquía') !!}
                {!! Form::select('hierarchy',
                    ['1' => 'Principal', '2' => 'Sucursal'], null,
                    ['class' => 'form-control', 'placeholder' => 'Elija una opción...'] ) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('economic_activity', '*Actividad economica') !!}
                {!! Form::text('economic_activity', '', ['class' => 'form-control', 'placeholder' => 'Actividad economica']) !!}
            </div>
        </div>
    </div>

{{-- - - - - - - - - Location Data - - - - - - - - --}}
    <h3 class="title-form">Localizacion de la empresa</h3>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('country', '*Pais') !!}
                {!! Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'País']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('departament', '*Departamento') !!}
                {!! Form::text('departament', '', ['class' => 'form-control', 'placeholder' => 'Departamento']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('municipality', '*Municipio') !!}
                {!! Form::text('municipality', '', ['class' => 'form-control', 'placeholder' => 'Municipio o Ciudad']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('address', 'Dirección') !!}
                {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Dirección de la empresa']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::label('phone_indic', '*Teléfono') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone_indic', '', ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone_num', '', ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone_ext', '', ['class' => 'form-control', 'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('phone2_ind', 'Teléfono alternativo') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone2_ind', '', ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone2_num', '', ['class' => 'form-control', 'placeholder' => 'Teléfono alternativo']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone2_ext', '', ['class' => 'form-control', 'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('celphone', 'Celular') !!}
                {!! Form::text('celphone', '', ['class' => 'form-control', 'placeholder' => 'Número de celular']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('website', 'Página web') !!}
                {!! Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Página web de la empresa']) !!}
            </div>
        </div>
    </div>

{{-- - - - - - - - - contact infomation - - - - - - - - --}}
    <h3 class="title-form">Información de contacto</h3>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', '*Nombre del encargado') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('surnames', '*Apellidos del encargado') !!}
                {!! Form::text('surnames', '', ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('position', '*Cargo') !!}
                {!! Form::select('position', ['1' => 'Presidente', '2' => 'Director', '3' => 'Gerente',
                                            '4' => 'Jefe', '5' => 'Coordinador', '6' => 'Analista'], null,
                                            ['class' => 'form-control', 'placeholder' => 'Elija un cargo...'] ) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', '*Correo electronico') !!}
                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Correo electronico']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Form::label('phone_ind_hr', '*Teléfono') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone_indic_hr', '', ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone_num_hr', '', ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone_ext_hr', '', ['class' => 'form-control', 'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('phone2_ind_hr', 'Teléfono alternativo') !!}
            <div class="form-group form-row">
                <div class="col-md-3">
                    {!! Form::text('phone2_indic_hr', '', ['class' => 'form-control', 'placeholder' => 'Ind.']) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('phone2_num_hr', '', ['class' => 'form-control', 'placeholder' => 'Teléfono alternativo']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('phone2_ext_hr', '', ['class' => 'form-control', 'placeholder' => 'ext.']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
