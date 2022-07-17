<div class="row col-12  mt-3">
    <div class="col-12" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h5 class="text-center text-white" >Detallo de pedido</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Cantidad
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Descuento
                </th>
                <th>
                    Precio
                </th>
                <th>
                    subtotal
                </th>
                <th colspan="3">
                    Acción
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>
                        {{$detalle->cantidad}}
                    </td>
                    <td>
                        {{$detalle->producto->nombre}}
                    </td>
                    <td>
                        {{$detalle->producto->descripcion}}
                    </td>
                    <td>
                        {{$detalle->descuentod}}
                    </td>
                    <td>
                        {{$detalle->preciod}}
                    </td>
                    <td>
                        {{$detalle->subtotal}}
                    </td>

                    <td>
                        <button type="button" class="btn-sm btn-info"  data-toggle="modal" data-target="#editproducto" title="Editar producto" wire:click="formdetalle({{$detalle->id}})" >
                            <i class="fas fa-save fa-fw"></i>
                        </button>
                    </td>

                    <td>
                        <button type="button" class="btn-sm btn-danger"  data-toggle="modal" data-target="#eliminarproducto" title="Eliminar detalle" wire:click="eliminarproducto({{$detalle->id}})" >
                            <i class="fas fa-trash-alt fa-fw"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{$detalles->links()}}
</div>







