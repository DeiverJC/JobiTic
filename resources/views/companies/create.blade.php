@extends('layouts.app')

@section('content')

    <h2 class="company-title">Actualizar información de la empresa</h2>

    <div class="alert alert-warning" role="alert">
        <span class="company-title">Campos obligatorios</span> Los campos o elementos del formulario que están marcados con un asterisco (*) son obligatorios. Hasta que no se completen estos datos el sistema no dejará guardar los cambios
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab_basicInfo">Datos de la Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Resumen</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                @include('companies.partials.form')

          </div>
    </div>
    </div>

@endsection
