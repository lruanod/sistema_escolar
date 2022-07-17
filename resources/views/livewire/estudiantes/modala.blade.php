<!-- modal buscarcurso-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="vera" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="vera">Asignar encargado</h5>
                <button class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                            @include('livewire.estudiantes.listapadre')

                    <div class="row form-group ">
                        <button  class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcurso-->
