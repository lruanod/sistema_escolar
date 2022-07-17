<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Entradas</h4>
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
                        <div class="col-md-7">
                            <label  class="text-white ">+ Entrada</label><br>
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#addentrada" title="Agragar entrada">
                                <i class="fas fa-store fa-fw"></i>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Entradas registradas</h4>
    </div><br>
    <div class="table-responsive ">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Producto
            </th>
            <th>
                Descripción
            </th>
            <th>
                Precio anterior
            </th>
            <th>
                Precio entrada
            </th>
            <th>
                Catidad anterior
            </th>
            <th>
                Catidad entrada
            </th>
            <th>
                Catidad disponible
            </th>
            <th>
                Descripción de entrada
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody class="text-dark">
        @foreach($entradas as $entrada)
            <tr>
                <td>
                    {{\carbon\carbon::parse($entrada->created_at)->format('d/m/Y')}}
                </td>
                <td>
                    {{$entrada->producto->nombre}}
                </td>
                <td>
                    {{$entrada->producto->descripcion}}
                </td>
                <td>
                    {{$entrada->precioa}}
                </td>
                <td>
                    {{$entrada->precioe}}
                </td>
                <td>
                    {{$entrada->stocka}}
                </td>
                <td>
                    {{$entrada->stocke}}
                </td>
                <td>
                    {{$entrada->stockt}}
                </td>
                <td>
                    {{$entrada->descripcione}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editentrada" title="Editar entrada" wire:click="edit({{$entrada->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$entradas->links()}}
</div>
