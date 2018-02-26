<header class="masthead" style="background-image: url({{ url('img/bg-banner-4.jpg') }})">
    <div class="overlay overlay-plus"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading page-heading-plus">
                @if( empty($jobOffer) )
                <h2>Crear una oferta de trabajo</h2>
                @else
                <h2>Actualizar la oferta de trabajo</h2>
                @endif
            <span class="subheading">
                Ingresa toda la informacion de la oferta, mientras mas detallada mejor.
            </span>
            </div>
        </div>
        </div>
    </div>
</header>
