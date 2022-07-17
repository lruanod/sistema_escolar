<!-- modal buscarcurso-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="vere" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="vere">Contestados</h5>
                <button class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">

                            @include('livewire.cuestionarios.estudiantes')
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcurso-->
