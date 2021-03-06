
<header class="masthead" style="background-image: url({{ url('img/bg-banner-3.jpg') }}); ">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="post-heading text-center">
              <h1>Las mejores ofertas de <span class="text-primary">empleo</span> en el sector TIC</h1>
              <br>
              <br>

                <form action="{{ route('search') }}" method="POST" class="form-inline header-job-search justify-content-center">

                    <div class="input-group left-input">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" name="title" class="form-control" placeholder="Titulo" aria-label="Titulo" aria-describedby="sizing-addon1">
                    </div>
                    <div class="input-group right-input">
                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                      <input type="text" name="city" class="form-control" placeholder="Ciudad" aria-label="Ciudad" aria-describedby="sizing-addon2">
                    </div>
                    {{ csrf_field() }}
                    <div class="btn-search">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </header>
