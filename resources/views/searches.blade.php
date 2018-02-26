@extends('layouts.master')

@section('header')
    @include('layouts.partials._header_search')
@endsection

@section('content')
    <main>
        <section>
            <div class="container">
                <header class="section-header">
                    <span>Resultados de la busqueda</span>
                    <h2>Resultados de la bussqueda</h2>
                </header>
                @if( $jobOffers->count() )

                    @foreach($jobOffers as $jobOffer)
                        <div class="col-xs-12">
                            <article class="article-job">
                                <a href="{{ route('job-offer.show', $jobOffer->id) }}" class="item-block">
                                    <header>
                                        <img src="img/logo.jpg">
                                        <div class="header-meta">
                                            <span class="location">
                                                <i class="fa fa-map-marker"></i>
                                                {{ $jobOffer->country_name }} - {{ $jobOffer->city_name }}
                                            </span>
                                            @if($jobOffer->type_offer === 'Medio tiempo')
                                                <span class="badge badge-info">{{ $jobOffer->type_offer }}</span>
                                            @elseif($jobOffer->type_offer === 'Timepo completo')
                                                <span class="badge badge-success">{{ $jobOffer->type_offer }}</span>
                                            @else
                                                <span class="badge badge-dark">{{ $jobOffer->type_offer }}</span>
                                            @endif

                                        </div>
                                        <div class="hgroup">
                                            <h4>{{ $jobOffer->title }}</h4>
                                            <h5 class="text-muted">
                                                {{ $jobOffer->company_name }}
                                            </h5>
                                        </div>
                                    </header>
                                </a>
                            </article>
                        </div>
                    @endforeach

                @else

                    <div class="col-xs-12 text-center">
                        <div class="alert alert-info" role="alert">
                            <strong>
                                No se encontraron resultados para <span class="text-info">{{ $title }}</span> o <span class="text-info">{{ $city }}</span>
                            </strong>
                        </div>
                    </div>

                @endif
            </div>
        </section>
    </main>
    <br>
    <br>
    <br>

@endsection
