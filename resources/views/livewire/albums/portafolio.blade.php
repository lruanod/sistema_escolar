
<!-- Portfolio-->
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="row g-0">
                @foreach($imagenes as $imag)
                            <div class="col-lg-4 col-sm-6">
                                <a class="portfolio-box" href="{{asset("storage/".$imag->iurl)}}" title="{{$imag->galeria->ndescripcion}}"  >
                                    <img class="img-fluid" src="{{asset("storage/".$imag->iurl)}}"  alt="..." >
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">{{\carbon\carbon::parse($imag->galeria->gfecha)->format('d/m/Y')}}</div>
                                        <div class="project-name">{{$imag->galeria->galbum}}</div>
                                    </div>
                                </a>
                            </div>
                @endforeach
            </div>
            <br>
            <div class="align-items-center">
                {{$imagenes->links()}}
            </div>
        </div>
    </div>
</div>
<!-- Call to action-->
<section class="page-section bg-dark text-white">
    <div class="container px-4 px-lg-5 text-center">
        <h2 class="mb-4">Misión</h2>
        <p class="text-white-75 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
        <a class="btn btn-light btn-xl" href="#services">niveles academicos</a>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div wire:ignore.self class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Agendar cita de instalaciones</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Registra los datos que a acontinuación se te solicitan, nos pondremos en contacto contigo para confirmar la cita</p>
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                @include('livewire.albums.formcita')

                <button   wire:click="store" class="btn btn-primary btn-xl" >Enviar</button>

            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 text-center mb-5 mb-lg-0">
                <i class="bi-phone fs-2 mb-3 text-muted"></i>
                <div>+(502) 123-4567</div>
            </div>
        </div>
    </div>
</section>

















