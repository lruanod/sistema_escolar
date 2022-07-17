<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Estudiantes</h4>
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
                            <label for="buscar" class="text-white">Nombre del estudiante</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ estudiantes</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addestudiante" title="Agragar estudiante">
                            <i class="fas fa-user-graduate fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Grados</label><br>
                        <a  href="/Grados" type="submit" class="btn btn-success" title="Agragar Grados academicos">
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
        <h4 class="text-center text-white">Lista estudiantes</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                información
            </th>
            <th>
                Foto
            </th>
            <th>
                Grados
            </th>
            <th>
                Responbles
            </th>
            <th>
                Estado
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($estudiantes as $estudiante)
            <tr>
                <td>
                    {{$estudiante->enombre}}
                </td>
                <td>
                    Dirección:&nbsp;{{$estudiante->edireccion}}<br>
                    CUI:&nbsp;{{$estudiante->ecui}}<br>
                    Correo:&nbsp;{{$estudiante->ecorreo}}<br>
                    Contraseña:&nbsp; {{$estudiante->epass}}<br>
                    Usuario:&nbsp;{{$estudiante->eusuario}}
                </td>
                <td>
                    <img class="rounded" src="{{asset("storage/$estudiante->eurl")}}" alt="Generic placeholder image" width="110vw" height="150vh"  href="#">
                </td>
                <td>
                    @foreach($asignars as $asignar)
                        @if($asignar->estudiante_id==$estudiante->id)
                            {{\carbon\carbon::parse($asignar->fecha)->format('d/m/Y')}}<br>
                            Grado:&nbsp;{{$asignar->grado->gnombre}}<br>
                            Sección:&nbsp;{{$asignar->grado->gseccion}}<br>
                            Nivel:&nbsp;{{$asignar->grado->nivel->nnombre}}<br>
                            Ciclo:&nbsp;{{$asignar->ciclo->ano}}<br>
                            Estado:&nbsp;{{$asignar->estado}}<br>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editasignar" title="editar asignación" wire:click="editasignar({{$asignar->id}},{{$estudiante->id}})" >
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </button>
                            <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($padreestudiantes as $padree)
                        @if($padree->estudiante_id==$estudiante->id)
                            {{$padree->padre->pnombre}}<br>
                            Direc:&nbsp;{{$padree->padre->pdireccion}}<br>
                            Cel:&nbsp;{{$padree->padre->pcel}}<br>
                            DPI:&nbsp;{{$padree->padre->pcui}}<br>
                            Parentesco:&nbsp;{{$padree->padre->ppariente}}<br>
                            Correo:&nbsp;{{$padree->padre->pcorreo}}<br>
                            Contra:&nbsp;{{$padree->padre->ppass}}<br>
                            Usuario:&nbsp;{{$padree->padre->pusuario}} <br>
                            <button type="button" class="btn btn-danger " title="desasociar pariente" wire:click="destroy2({{$padree->id}})" >
                                <i class="fas fa-cut fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editpadre" title="editar padre" wire:click="editpadre({{$padree->padre->id}},{{$estudiante->id}})" >
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </button>
                            <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    {{$estudiante->eestado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editestudiante" title="Editar estudiente" wire:click="edit({{$estudiante->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addpadre" title="Agregar padre" wire:click="addpadre({{$estudiante->id}})" >
                        <i class="fas fa-user-plus fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#vera" title="Asignar padre" wire:click="modalasignar({{$estudiante->id}})" >
                        <i class="fas fa-restroom fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#addasignar" title="Agregar asignación" wire:click="addasignar({{$estudiante->id}})" >
                        <i class="fas fa-chart-bar fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$estudiantes->links()}}
</div>
