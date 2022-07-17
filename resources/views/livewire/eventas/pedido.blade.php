<!-- modal addpedido-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="verpedido" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
                <h5 class="modal-title text-white " id="verpedido" >Pedido</h5>
                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                            <div class="row form-group ">
                                <label for="cliente" class=" text-white">Cliente</label>
                                <input type="text"  class="form-control" wire:model.defer="cliente">
                                @error('cliente') <span class="text-warning">{{$message}}</span> @enderror
                            </div>

                            <div class="row form-group">
                                <label for="tipo" class="text-white" >Tipo</label>
                                <select class="form-control " wire:model.defer="tipo">
                                    <option value="">Seleccionar tipo</option>
                                    <option value="Estudiate">Estudiante</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Familiar">Familiar</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('tipo') <span class="text-warning">{{$message}}</span> @enderror
                            </div>

                            <div class="col-2">
                                <label  class="text-white">+ Pedido</label>
                                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#addpedido" title="Agragar producto">
                                    <i class="fas fa-cart-plus fa-fw"></i>
                                </button>
                            </div>
                            @include('livewire.eventas.pedidoform')
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

<!-- modal buscarpedido-->
