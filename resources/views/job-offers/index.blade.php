@extends('layouts.master')
@section('header')
@include('layouts.partials._header_offer_show')
@endsection
@section('content')

<main>
    <section>
        <div class="container">

            <header class="section-header">
                <span>Todas las ofertas</span>
                <h2>Todas las ofertas</h2>
            </header>
            @foreach($jobOffers as $jobOffer)
                <div class="col-xs-12">
                    <article class="article-job">
                        <a href="{{ route('job-offer.show', $jobOffer->id) }}" class="item-block">
                            <header>
                                <img src="img/logo.jpg">
                                <div class="header-meta">
                                    <span class="location">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $jobOffer->location->city->state->country->name }} - {{ $jobOffer->location->city->name }}
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
                                        {{ $jobOffer->user->basicData->business_name }}
                                    </h5>
                                </div>
                            </header>
                        </a>
                    </article>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12">
                    {{ $jobOffers->links() }}
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
