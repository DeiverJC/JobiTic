@extends('layouts.master')

@section('header')
    @include('layouts.partials._header_company_create', ['data' => $data])
@endsection

@section('content')
    <div class="container">
        <div class="row row-top">
            <div class="col-md-12">
                <br>
                <div class="alert alert-info" role="alert">
                    <span class="company-title">Campos obligatorios</span> Los campos o elementos del formulario que están marcados con un asterisco (<strong>*</strong>) son obligatorios. Hasta que no se completen estos datos el sistema no dejará guardar los cambios
                </div>

                <div class="card border-light mb-3">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Datos de la Empresa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Resumen</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                @include('companies.partials._form')

                            </div>
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
