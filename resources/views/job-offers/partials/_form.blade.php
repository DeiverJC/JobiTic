{!! Form::open(['route' => 'job-offer.store']) !!}

    <h3>Información principal</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('title', 'Titulo de la oferta') !!}
                {!! Form::text('title', '', ['class' => 'form-group']) !!}
            </div>
        </div>
        <div class="col-md-6">
                {!! Form::label('type_offer', 'Tipo de oferta') !!}
                {!! Form::select('type_offer', [
                        '1' => 'Medio tiempo',
                        '2' => 'Tiempo completo',
                        '3' => 'Proyecto'], null,
                        ['class' => 'form-group']) !!}
        </div>
    </div>

{!! Form::close() !!}
