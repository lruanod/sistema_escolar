<!-- modal buscarestudiante-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addasignar" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addasignar">Asignar pregunta</h5>
                <button class="close col-md-1 btn " data-dismiss="modal" aria-label="Close" id="cerrarformasignar">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );">
                        <div class="card-header text-center text-dark">
                            Adjuntar pregunta
                        </div>
                        <div class="card-body">
                            @include('livewire.cuestionarios.formasignar')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="regasignar" class="btn btn-danger col-md-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarestudiante-->
