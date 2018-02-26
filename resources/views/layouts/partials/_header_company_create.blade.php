<header class="masthead" style="background-image: url({{ url('img/bg-banner-5.jpg') }})">
    <div class="overlay overlay-plus" style="height: 60.7% !important;"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading page-heading-plus">
                @if( empty($data) )
                <h2>Ingresar Información de la empresa</h2>
                @else
                <h2>Actualizar la información de la empresa</h2>
                @endif
            </div>
        </div>
        </div>
    </div>
</header>
