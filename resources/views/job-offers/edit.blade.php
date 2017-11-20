@extends('layouts.master')

@section('styles')
    {!! Html::style('css/selectize.css') !!}
@endsection

@section('header')
    @include('layouts.partials._header_offer')
@endsection

@section('content')
    <div class="container">
        <div class="row row-top">
            <div class="col-md-12">
                <br>
                @include('job-offers.partials._form', [
                    'data'      => $data,
                    'jobOffer'  => $jobOffer,
                    'skills'    => $skills,
                    ])
            </div>
        </div>
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
