@extends('layouts.master')

@section('header')
    @include('layouts.partials._header_offer_show')
@endsection

@section('content')
    <div class="container">
        <div class="row row-top">
            <div class="col-md-12">

                <div class="card border-light" style="border: 0;">
                  <div class="card-body">
                    <img src="{{ asset('img/logo.jpg') }}" class="img-fluid float-left">
                    <p class="float-right text-muted text">{{ $jobOffer->created_at->diffForHumans() }}</p>
                    <h1 class="card-title text-muted">{{ $jobOffer->title }}</h1>
                    <h4 class="card-subtitle mb-2 text-muted">{{ $jobOffer->user->basicData->business_name }}</h4>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="location text-muted">
                                <i class="fa fa-map-marker"></i>
                                {{ $jobOffer->location->city->name }}, {{ $jobOffer->location->city->state->country->name }}
                            </span><br>
                            <span class="location text-muted">
                                <i class="fa fa-globe"></i>
                                @if( $jobOffer->remote === 'No' )
                                    En sitio
                                @else
                                    Remoto
                                @endif
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="location text-muted">
                                <i class="fa fa-map-marker"></i>
                                {{ $jobOffer->type_offer }}
                            </span><br>
                            <span class="location text-muted">
                                <i class="fa fa-tags"></i>

                                @foreach( $jobOffer->skills as $skill )
                                    {{ $skill->name }},
                                @endforeach

                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="location text-muted">
                                <i class="fa fa-money"></i>
                                {{ $jobOffer->salary_from }} - {{ $jobOffer->salary_until }} {{ $jobOffer->cunrrency }}
                            </span><br>
                            <span class="location text-muted">
                                <i class="fa fa-dollar"></i>
                                {{ $jobOffer->type_salary }}
                            </span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <h3 class="card-title text-muted">Descripción de la oferta</h3>
                    <p class="card-text text-muted">
                        {{ $jobOffer->description }}
                    </p>
                    <br>
                    <br>
                    <h3 class="card-title text-muted">Restricciones</h3>
                    <p class="card-text text-muted">
                        {{ $jobOffer->restrictions }}
                    </p>
                    <br>
                    <br>
                    <h3 class="card-title text-muted">Como aplicar a la oferta</h3>
                    <p class="card-text text-muted">
                        Enviar un correo electronico con su hoja de vida a:
                        <strong>{{ $jobOffer->user->contactInfo->email }}</strong>
                    </p>
                    <br>
                    <br>
                    <h3 class="card-title text-muted">Acerca de la empresa</h3>
                    <p class="card-text text-muted">
                        <strong>{{ $jobOffer->user->basicData->business_name }}</strong><br>
                        Dedicada a {{ $jobOffer->user->basicData->economic_activity }}
                    </p>
                  </div>
                </div>

            </div>
        </div>
    </div>
@endsection
