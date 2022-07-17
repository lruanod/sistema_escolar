<!-- modal addpedido-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addproducto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
                <h5 class="modal-title  text-white" id="addproducto">Agregar productos</h5>
                <button class="close col-md-1 btn btn-danger " id="cerrarpedido" data-dismiss="modal" aria-label="Close">
                   <i class="fas fa-times-circle fa-fw text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                    @include('livewire.reportes.listap')
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarpedido-->
