@extends('layouts.master')

@section('header')
    @include('layouts.partials._header_company')
@endsection

@section('content')

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <header class="section-header">
                        <span>mis ofertas</span>
                        <h2>Mis ofertas</h2>
                    </header>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ session('status') }}</strong>
                        </div>
                    @endif
                    <div class="row">

                    @if(empty($jobOffers->all()))
                    <div class="col-md-12 text-center">
                        <div class="alert alert-primary" role="alert">
                            <strong>Aún no publica ofertas.</strong>
                        </div>
                    </div>
                    @else
                        @foreach($jobOffers as $jobOffer)
                            <div class="col-md-12">
                                <div class="magic-btn float-right">
                                    <a href="{{ route('job-offer.edit', $jobOffer->id) }}" class="btn-sm btn-info btn-pdd">
                                        Editar
                                    </a>
                                </div>
                                <div class="magic-btn-2 float-right">
                                    {!! Form::open(['route' => ['job-offer.destroy', $jobOffer->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn-sm btn-danger btn-plus']) !!}
                                    {!! Form::close() !!}
                                </div>

                                <article class="article-job">
                                    <a href="#" class="item-block">
                                        <header>

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
                        <br>
                        <nav aria-label="Page navigation example">
                            {{ $jobOffers->render() }}
                        </nav>
                    @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if(!empty($dataUser))
                            <h3 class="card-title">{{ $dataUser->business_name }}</h3>
                            <p class="card-text">{{ $dataUser->economic_activity }}</p>
                            <p class="card-text">Fecha de inscripción: {{ $dataUser->created_at->format('d/m/Y') }}</p>
                            <div class="text-center">
                                <a href="{{ route('job-offer.create') }}" class="btn-sm btn-success">Crear oferta</a>
                                <a href="{{ route('company.edit', Auth::user()) }}" class="btn-sm btn-primary">
                                    Actualizar información
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


    {{-- <div class="col-md-8">



        <div class="card">
            <h3 class="card-header">
                Mis vacantes

                <span class="float-right">
                        <a href="{{ route('job-offer.create') }}" class="btn btn-info">Crear oferta</a>
                </span>
            </h3>
            <div class="card-body">
                @if(empty($jobOffers->all()))
                    <p class="card-text">Aún no publica ofertas.</p>
                @else
                    @foreach($jobOffers as $jobOffer)
                        <div class="col-md-12">
                            <div class="btn-group float-right">
                                {!! Form::open(['route' => ['job-offer.destroy', $jobOffer->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn-sm btn-danger card-link']) !!}
                                {!! Form::close() !!}
                                <a href="{{ route('job-offer.edit', $jobOffer->id) }}" class="btn-sm btn-info card-link">
                                    Editar
                                </a>
                            </div>
                        <a href="#" class="card-link">
                                <h4 class="card-title">{{ $jobOffer->title }}</h4>
                                <span class="float-right text-gray-dark">{{ $jobOffer->created_at->diffForHumans() }}</span>
                                <p class="card-subtitle">
                                    {{ $jobOffer->location->city->state->country->name }} - {{ $jobOffer->location->city->name }}
                                </p>
                            <hr>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div> --}}

@endsection
