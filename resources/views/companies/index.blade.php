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
                                    <a href="{{ route('job-offer.edit', $jobOffer->id) }}" class="btn-sm btn-info btn-pdd" style="padding: 5px 17px;">
                                        Editar
                                    </a>
                                </div>
                                <div class="magic-btn-2 float-right" style="right: -8%;">
                                    {!! Form::open(['route' => ['job-offer.destroy', $jobOffer->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn-sm btn-danger btn-plus']) !!}
                                    {!! Form::close() !!}
                                </div>

                                <article class="article-job">
                                    <a href="{{ route('job-offer.show', $jobOffer->id) }}" class="item-block">
                                        <header>

                                            <div class="hgroup">
                                                <h4 class="font-weight-bold">{{ $jobOffer->title }}</h4>
                                                <h5 class="text-muted">
                                                    {{ $jobOffer->user->basicData->business_name }}
                                                </h5>
                                            </div>
                                        </header>
                                    </a>
                                </article>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if(!empty($dataUser))
                            <h3 class="card-title">{{ $dataUser->business_name }}</h3>
                            <p class="card-subtitle">{{ $dataUser->economic_activity }}</p>
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

@endsection
