<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Albums</h4>
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
                            <label for="buscar" class="text-white">Nombre del album</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Albums</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addalbum" title="Agregar album">
                            <i class="fas fa-images fa-fw"></i>
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
        <h4 class="text-center text-white">Lista albums</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Nombre
            </th>
            <th>
                Descripcion
            </th>
            <th>
                Imagenes
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>
                    {{\carbon\carbon::parse($album->gfecha)->format('d/m/Y')}}
                </td>
                <td>
                    {{$album->galbum}}
                </td>
                <td>
                    {{$album->ndescripcion}}
                </td>

                <td>
                    @foreach($asignars as $asignar)
                        @if($asignar->galeria_id==$album->id)
                            <img class="rounded" src="{{asset("storage/$asignar->iurl")}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                            <button type="button" class="btn btn-danger " title="Eliminar fotografía" wire:click="destroy({{$asignar->id}})" >
                                <i class="fas fa-cut fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editasignar" title="editar fotografía" wire:click="editasignar({{$asignar->id}})" >
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </button>
                            <br><br>
                        @endif
                    @endforeach
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editalbum" title="Editar album" wire:click="edit({{$album->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addasignar" title="Agregar fotografía" wire:click="addasignar({{$album->id}})" >
                        <i class="fas fa-image fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$albums->links()}}
</div>
