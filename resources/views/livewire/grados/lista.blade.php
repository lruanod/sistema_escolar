<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Grados</h4>
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
                            <label for="buscar" class="text-white">Nombre del grado</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Grados</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addgrado" title="Agregar Grados academicos">
                            <i class="fas fa-chart-bar fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Niveles</label><br>
                        <a  href="/Grados" type="submit" class="btn btn-success" title="Agregar niveles académicos">
                            <i class="fas fa-signal fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Estudiantes </label><br>
                        <a  href="/estudiantes" type="submit" class="btn btn-success" title="Agragar estudiantes">
                            <i class="fas fa-user-graduate fa-fw"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista grados</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Grado
            </th>
            <th>
                Sección
            </th>
            <th>
                Nivel
            </th>
            <th>
                Mensualidad
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($grados as $grado)
            <tr>
                <td>
                    {{$grado->gnombre}}
                </td>
                <td>
                    {{$grado->gseccion}}
                </td>
                <td>
                    {{$grado->nivel->nnombre}}
                </td>
                <td>
                    {{$grado->monto}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editgrado" title="Editar grado" wire:click="edit({{$grado->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$grados->links()}}
</div>
