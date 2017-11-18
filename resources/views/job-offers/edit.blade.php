@extends('layouts.app')

@section('content')
    <h1>Actualizar la oferta de trabajo</h1>

    <div class="col-md-12">
        <br>
        @include('job-offers.partials._form', [
            'data'      => $data,
            'jobOffer'  => $jobOffer,
            ])

    </div>
@endsection
