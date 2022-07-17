<div class="col-md-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h4 class="text-center text-white">Editar ventas</h4>
    </div>
</div>

<div class="col-12 mt-2">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
            <div class="card-header text-center text-dark">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="finicio" class="text-white">Fecha incio</label>
                            <input type="datetime-local" wire:model="finicio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ffinal" class="text-white">Fecha final</label>
                            <input type="datetime-local" wire:model="ffinal" class="form-control">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h4 class="text-center text-white">Ventas realizadas</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                No.
            </th>
            <th>
                Cliente
            </th>
            <th>
                Descuento
            </th>
            <th>
                Total
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($ventas as $venta)
            <tr>
                <td>
                    {{\carbon\carbon::parse($venta->created_at)->format('d/m/Y')}}
                </td>
                <td>
                    {{$venta->id}}
                </td>
                <td>
                    {{$venta->cliente}}<br>
                    {{$venta->tipo}}
                </td>
                <td>
                    {{$venta->descuentov}}
                </td>
                <td>
                    {{$venta->total}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#verpedido" id="btndetalle" title="Editar pedido" wire:click="edit({{$venta->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$ventas->links()}}
</div>
