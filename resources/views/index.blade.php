@extends('layouts.master')

@section('header')
    @include('layouts.partials._header')
@endsection

@section('content')
    @include('layouts.partials._content', $jobOffers)
@endsection
