<div class="col-md-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h4 class="text-center text-white">Ventas</h4>
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
                    <div class="col-md-5">
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del producto</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row form-group">
                            <label for="" class="text-white mb" >Categoría</label>
                            <select class="form-control " wire:model="buscar">
                                <option value="">Seleccionar Categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(empty(session('venta_id')))
                    <div class="col-md-2">
                        <label  class="text-white">+ Pedido</label>
                        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#addpedido" title="Agragar cliente">
                            <i class="fas fa-cart-plus fa-fw"></i>
                        </button>
                    </div>
                    @endif
                    @if(!empty(session('venta_id')))
                    <div class="col-md-2">
                        <label  class="text-white">+ Editar</label><br>
                        <a  type="submit" class="btn btn-success " data-toggle="modal" data-target="#editpedido" wire:click="edit()" title="Editar pedido">
                            <i class="fas fa-save fa-fw"></i>
                        </a>
                    </div>
                        <div class="col-md-2">
                            <label  class="text-white">+ Ver pedido</label><br>
                            <a   type="submit" class="btn btn-success " data-toggle="modal" data-target="#verpedido"  title="Editar pedido">
                                <i class="fas fa-eye fa-fw"></i>
                            </a>
                        </div>


                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h4 class="text-center text-white">Productos {{session('venta_id')}}</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Precio
            </th>
            <th>
                Descripción
            </th>
            <th>
                Descuento
            </th>
            <th>
                Cantidad disponible
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($productos as $producto)
            <tr>
                <td>
                    {{$producto->nombre}}
                </td>
                <td>
                    {{$producto->precio}}
                </td>
                <td>
                    {{$producto->descripcion}}
                </td>
                <td>
                    {{$producto->descuento}}
                </td>
                <td>
                    {{$producto->stock}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#adddetalle" id="btndetalle" title="Agragar" wire:click="detalle({{$producto->id}})" >
                        <i class="fas fa-plus fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$productos->links()}}
</div>
