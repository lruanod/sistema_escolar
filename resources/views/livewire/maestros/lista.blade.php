<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Maestros</h4>
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
                            <label for="buscar" class="text-white">Nombre del maestro</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ maestros</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmaestro" title="Agragar maestro">
                            <i class="fas fa-user-graduate fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Grados</label><br>
                        <a  href="/grados" type="submit" class="btn btn-success" title="Agragar Grados academicos">
                            <i class="fas fa-chart-bar fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Niveles </label><br>
                        <a  href="/niveles" type="submit" class="btn btn-success" title="Agragar niveles academicos">
                            <i class="fas fa-signal fa-fw"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista maestros</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Dirección
            </th>
            <th>
                CUI
            </th>
            <th>
                Tel
            </th>
            <th>
                Contraseña
            </th>
            <th>
                Usuario
            </th>
            <th>
                Correo
            </th>
            <th>
                Estado
            </th>
            <th>
                Cursos
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($maestros as $maestro)
            <tr>
                <td>
                    {{$maestro->mnombre}}
                </td>
                <td>
                    {{$maestro->mdireccion}}
                </td>
                <td>
                    {{$maestro->mcui}}
                </td>
                <td>
                    {{$maestro->mcel}}
                </td>
                <td>
                    {{$maestro->mpass}}
                </td>
                <td>
                    {{$maestro->musuario}}
                </td>
                <td>
                    {{$maestro->mcorreo}}
                </td>
                <td>
                    {{$maestro->mestado}}
                </td>

                <td>
                    @foreach($asignars as $asignar)
                        @if($asignar->maestro_id==$maestro->id)
                            {{\carbon\carbon::parse($asignar->fecha)->format('d/m/Y')}}<br>
                            Curso:&nbsp;{{$asignar->curso->cnombre}}<br>
                            Grado:&nbsp;{{$asignar->curso->grado->gnombre}}<br>
                            Sección:&nbsp;{{$asignar->curso->grado->gseccion}}<br>
                            Nivel:&nbsp;{{$asignar->curso->grado->nivel->nnombre}}<br>
                            Estado:&nbsp;{{$asignar->estado}}<br>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editasignar" title="editar asignación" wire:click="editasignar({{$asignar->id}},{{$maestro->id}})" >
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </button>
                            <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editestudiante" title="Editar estudiente" wire:click="edit({{$maestro->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addasignar" title="Agregar asignación" wire:click="addasignar({{$maestro->id}})" >
                        <i class="fas fa-book fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$maestros->links()}}
</div>
