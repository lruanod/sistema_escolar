<!-- modal editar producto-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editproducto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editproducto">Editar producto</h5>
                <button id="cerrareditproducto" class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
                        <div class="card-header text-center text-dark">
                            Editar producto
                        </div>
                        <div class="card-body">
                            @include('livewire.eventas.editproductoform')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="update" class="btn btn-danger col-md-5">Actualizar</button>
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

<!-- modal buscarpedido-->
