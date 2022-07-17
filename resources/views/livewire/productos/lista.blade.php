<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Productos</h4>
    </div>
</div>

<div class="col-12 mt-2">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c );">
            <div class="card-header text-center text-dark">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="buscar" class=" col-5 text-white">Nombre del producto</label>
                                <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-6">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="" class="col-3 text-white" >Categoría</label>
                                <select class="form-control col-md-6" wire:model="categoria_id">
                                    <option value="">Seleccionar Categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Producto</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addproducto" title="Agragar producto">
                            <i class="fas fa-cart-plus fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Categoria</label><br>
                        <a  href="/categorias" type="submit" class="btn btn-success" title="Agragar Productos">
                            <i class="fas fa-bookmark fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Ventas</label><br>
                        <a  href="/ventas" type="submit" class="btn btn-success" title="Registrar venta">
                            <i class="fas fa-store fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista productos</h4>
    </div><br>
    <div class="table-responsive ">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Descripcion
            </th>
            <th>
                Precio
            </th>
            <th>
                Catidad disponible
            </th>
            <th>
                Descuento
            </th>
            <th>
                Estado
            </th>
            <th>
                Categoria
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
                    {{$producto->descripcion}}
                </td>
                <td>
                    {{$producto->precio}}
                </td>
                <td>
                    {{$producto->stock}}
                </td>
                <td>
                    {{$producto->descuento}}
                </td>
                <td>
                    {{$producto->estado}}
                </td>
                <td>
                    {{$producto->categoria->nombrec}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editproducto" title="Editar producto" wire:click="edit({{$producto->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
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
