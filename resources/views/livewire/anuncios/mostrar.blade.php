
<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Anuncios</h4>
    </div>
</div>
<div class=" row justify-content-center">
    <div class="col-md-6">
@foreach($anuncios as $anuncio)

        <div class="card mt-3" style="background: linear-gradient(to bottom,#1cc88a  , #18181c );">
            <div class="card-header text-center text-dark">
               {{$anuncio->titulo}}&nbsp;&nbsp;Fecha:&nbsp;{{\carbon\carbon::parse($anuncio->afecha)->format('d/m/Y')}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-white">
                        {{$anuncio->adescripcion}}
                    </div>
                </div>
            </div>
        </div>

@endforeach
    </div>

</div>
