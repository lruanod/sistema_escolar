<!-- modal addpedido-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="verpedido" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="verpedido">Registrar pedido</h5>
                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                    <div class="card" >
                        <div class="card-body">
                            @include('livewire.ventas.pedidoform')
                            <br>
                            <div class="row col-sm-6">
                                <div class="row form-group">
                                    <label for="descuentov" class="col-md-5 text-dark">Descuento</label>
                                    <input type="number" wire:model="descuentov" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5" readonly="readonly">
                                    @error('descuentov') <span class="text-warning">{{$message}}</span> @enderror
                                </div>

                                <div class="row form-group">
                                    <label for="subtotal" class="col-md-5 text-dark">Total</label>
                                    <input type="number" wire:model="total" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5" readonly="readonly">
                                    @error('total') <span class="text-warning">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <br>

                            <div class="row form-group ">
                                <button class="btn btn-danger col-md-5" wire:click="Generarpedido()" >Generar</button>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button class="btn btn-danger col-md-5" wire:click="Cancelar()" >Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarpedido-->
