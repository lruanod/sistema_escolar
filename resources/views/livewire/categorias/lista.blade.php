<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Categoria</h4>
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
                    <div class="col-md-4">
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre de la categoria</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Categoria</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcategoria" title="Agragar categoria">
                            <i class="fas fa-bookmark fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Producto</label><br>
                        <a  href="/productos" type="submit" class="btn btn-success" title="Agragar Productos">
                            <i class="fas fa-cart-plus fa-fw"></i>
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
        <h4 class="text-center text-white">Lista categorias</h4>
    </div><br>
    <div class="table-responsive ">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Categoria
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($categorias as $categoria)
            <tr>
                <td>
                    {{$categoria->nombrec}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcategoria" title="Editar categoria" wire:click="edit({{$categoria->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$categorias->links()}}
</div>
