@extends('layouts.app')

@section('content')

    <h2 class="company-title">Actualizar información de la empresa</h2>

    <div class="alert alert-warning" role="alert">
        <span class="company-title">Campos obligatorios</span> Los campos o elementos del formulario que están marcados con un asterisco (*) son obligatorios. Hasta que no se completen estos datos el sistema no dejará guardar los cambios
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos de la Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Resumen</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        @include('companies.partials._form_edit', [
                                    'data'      => $data,
                                    'location'  => $location,
                                    'countries' => $countries,
                                    'states'    => $states,
                                    'cities'    => $cities,
                                    ])
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            @include('companies.partials._table', [
                                'data'      => $data,
                                'location'  => $location,
                                ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @include('companies.partials.scripts.dependent-selects')
@endsection

