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

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('type_company', 'Tipo de empresa') !!}
                {!! Form::text('type_company', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nature', 'Naturaleza') !!}
                {!! Form::select('nature',
                    ['1' => 'Privada', '2' => 'Pública', '3' => 'Mixta'], null,
                    ['class' => 'form-control'] ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('hierarchy', 'Jerarquía') !!}
                {!! Form::select('hierarchy',
                    ['1' => 'Principal', '2' => 'Sucursal'], null,
                    ['class' => 'form-control'] ) !!}
            </div>
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
