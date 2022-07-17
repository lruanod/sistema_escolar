<!-- modal buscarmaestro-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addmaestro" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addmaestro">Registrar maestro</h5>
                <button class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );">
                        <div class="card-header text-center text-dark">
                            crear maestro
                        </div>
                        <div class="card-body">
                            @include('livewire.maestros.form')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="store" class="btn btn-danger col-md-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal maestro-->
