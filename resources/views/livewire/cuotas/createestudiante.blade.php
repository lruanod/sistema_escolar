<!-- modal buscarcurso-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addestudiante" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addestudiante">Asignar estudiante</h5>
                <button class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                        <div class="card-header text-center text-dark">
                            Buscar estudiante
                        </div>
                            @include('livewire.cuotas.listaestudiante')
                            <br>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcurso-->
