@extends('layouts.app')

@section('styles')
    {!! Html::style('css/selectize.css') !!}
@endsection

@section('content')
    <h1>Actualizar la oferta de trabajo</h1>

    <div class="col-md-12">
        <br>
        @include('job-offers.partials._form', [
            'data'      => $data,
            'jobOffer'  => $jobOffer,
            'skills'    => $skills,
            ])
    </div>
@endsection

@section('scripts')
    @include('companies.partials.scripts.dependent-selects')
    {!! Html::script('js/standalone/selectize.js') !!}
    <script>
        $('#select-skills').selectize({
            plugins: ['remove_button']
        });
    </script>
@endsection
