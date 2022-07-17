<!-- modal buscarasigar-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editasignar2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editasignar2">Editar respuesta</h5>
                <button wire:click="default" id="cerrarasignar2" class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );">
                        <div class="card-header text-center text-dark">
                            Editar respuesta
                        </div>
                        <div class="card-body">
                            @include('livewire.cuestionarios.formasignar2')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="updateasignar2" class="btn btn-danger col-md-5">Actualizar</button>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal buscaresasignar-->
