@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('status') }}</strong>
            </div>
        @endif

        <div class="card">
            <h3 class="card-header">
                Mis vacantes

                <span class="float-right">
                        <a href="{{ route('job-offer.create') }}" class="btn btn-info">Crear oferta</a>
                </span>
            </h3>
            <div class="card-body">
                {{-- {{dd($jobOffers)}} --}}
                @if(empty($jobOffers->all()))
                    <p class="card-text">Aún no publica ofertas.</p>
                @else
                    @foreach($jobOffers as $jobOffer)
                        <div class="col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('job-offer.edit', $jobOffer->id) }}" class="btn-sm btn-info card-link">
                                        Editar
                                    </a>
                                    {!! Form::model($jobOffer, ['route' => ['job-offer.destroy', $jobOffer->id]]) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn-danger btn-sm card-link']) !!}
                                    {!! Form::close() !!}
                                </div>

                        <a href="#" class="card-link">
                                <h4 class="card-title">{{ $jobOffer->title }}</h4>
                                <span class="float-right text-gray-dark">{{ $jobOffer->created_at->diffForHumans() }}</span>
                                <p class="card-subtitle">{{ $jobOffer->offer_country }} - {{ $jobOffer->offer_city }}</p>
                            <hr>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Bienvenido(a) a JobiTic donde encontrar talento TIC es muy facil.
                </h5>
                @if(!empty($dataUser))
                <h3 class="card-title">{{ $dataUser->business_name }}</h3>
                <p class="card-text">{{ $dataUser->economic_activity }}</p>
                <p class="card-text">Fecha de inscripción: {{ $dataUser->created_at->format('d/m/Y') }}</p>
                <a href="{{ route('company.edit', Auth::user()) }}" class="btn btn-info float-right">
                    Actualizar información
                </a>
                @endif
            </div>
        </div>

    </div>

@endsection
