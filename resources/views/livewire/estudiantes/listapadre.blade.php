<div class="container-fluid">

    <div class="col-12 mt-2">
        <div class=" row justify-content-center">
            <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c );">
                <div class="card-header text-center text-dark">
                    Busqueda
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <label for="buscar" class="text-white">Nombre del pariente</label>
                                <input type="text" placeholder="buscar"  wire:model="buscar2" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label  class="text-white">+ Padres</label><br>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addpadre" title="Registrar Padre">
                                <i class="fas fa-user-graduate fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
            <h4 class="text-center text-white">Lista parientes</h4>
        </div><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Información
                    </th>
                    <th>
                        Foto
                    </th>
                    <th>
                        Acción
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($padres2 as $padre2)
                    <tr>
                        <td>
                            {{$padre2->pnombre}}
                        </td>
                        <td>
                            Dirección:&nbsp;{{$padre2->pdireccion}}<br>
                            CUI:&nbsp;{{$padre2->pcui}}<br>
                            Correo:&nbsp;{{$padre2->pcorreo}}<br>
                            Contraseña:&nbsp;{{$padre2->ppass}}<br>
                            Usuario:&nbsp;{{$padre2->pusuario}}
                        </td>
                        <td>
                            <img class="rounded" src="{{asset("storage/$padre2->purl")}}" alt="Generic placeholder image" width="110vw" height="150vh"  href="#">
                        </td>
                        <td>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editestudiante" title="Editar padre" wire:click="editpadre({{$padre2->id}})">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-warning"   title="Asignar estudiante" wire:click="asignarpadre({{$padre2->id}})" >
                                <i class="fas fa-user-plus fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-danger " title="Eliminar pariente" wire:click="destroy({{$padre2->id}})" >
                                <i class="fas fa-cut fa-fw"></i>
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






</div>




