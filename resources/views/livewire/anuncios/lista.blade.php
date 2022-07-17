<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Anuncios</h4>
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
                            <label for="buscar" class="text-white">Titulo del anuncio</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Anuncio</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addanuncio" title="Agragar anuncio">
                            <i class="fas fa-bullhorn fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Grados</label><br>
                        <a  href="/Grados" type="submit" class="btn btn-success" title="Agragar Grados académicos">
                            <i class="fas fa-chart-bar fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Niveles</label><br>
                        <a  href="/nivels" type="submit" class="btn btn-success" title="Agragar Nivel acedémicos">
                            <i class="fas fa-signal fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Estudiantes </label><br>
                        <a  href="/estudiantes" type="submit" class="btn btn-success" title="Agragar estuantes">
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
        <h4 class="text-center text-white">Lista anuncios</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Titulo
            </th>
            <th>
                Descripción
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($anuncios as $anuncio)
            <tr>
                <td>
                    {{\carbon\carbon::parse($anuncio->afecha)->format('d/m/Y')}}<br>
                </td>
                <td>
                    {{$anuncio->titulo}}
                </td>
                <td>
                    {{$anuncio->adescripcion}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editanuncio" title="Editar anuncio" wire:click="edit({{$anuncio->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$anuncios->links()}}
</div>
