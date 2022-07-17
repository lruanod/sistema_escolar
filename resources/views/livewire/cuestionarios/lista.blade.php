<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Cuestionarios</h4>
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
                            <label for="inicio" class="text-white">Fecha incio</label>
                            <input type="datetime-local" wire:model="inicio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="final" class="text-white">Fecha final</label>
                            <input type="datetime-local" wire:model="fin" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label  class="text-white">+ Cuestionario</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcuestionario" title="Agragar cuestionario">
                            <i class="fas fa-book fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-4">
                        <label  class="text-white">+ Salir</label><br>
                        <a  href="/actividades" type="submit" class="btn btn-success" title="salir a actividades">
                            <i class="fas fa-sign-out-alt fa-fw"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista cuestionarios</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha de finalización
            </th>
            <th>
                Fecha de Iniciación
            </th>
            <th>
                Titulo
            </th>
            <th>
                Descripción
            </th>
            <th>
                Estado
            </th>
            <th>
                Punteo
            </th>
            <th>
                Curso
            </th>
            <th>
                Pregunta
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($cuestionarios as $cuestionario)
            <tr>
                <td>
                    {{\carbon\carbon::parse($cuestionario->ffinalizacion)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{\carbon\carbon::parse($cuestionario->fcreado)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$cuestionario->titulo}}
                </td>
                <td>
                    {{$cuestionario->cdescripcion}}
                </td>
                <td>
                    {{$cuestionario->cestado}}
                </td>
                <td>
                    {{$cuestionario->punteo}}
                </td>
                <td>
                    Curso:&nbsp;{{$cuestionario->maestrocurso->curso->cnombre}}<br>
                    Grado:&nbsp;{{$cuestionario->maestrocurso->curso->grado->gnombre}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#verp" title="ver preguntas" wire:click="verp({{$cuestionario->id}})" >
                        <i class="fas fa-question fa-fw"></i>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcuestionario" title="Editar cuestionario" wire:click="edit({{$cuestionario->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>

                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#addasignar" title="Agregar pregunta" wire:click="addasignar({{$cuestionario->id}})" >
                        <i class="fas fa-question fa-fw"></i>
                    </button>
                    <a type="button" class="btn btn-success" title="Calificar cuestionarios"  href="calificarcuestionarios/{{$cuestionario->id}}" >
                        <i class="fas fa-check-double fa-fw"></i>
                    </a>

                    <button type="button" class="btn btn-danger" title="Ver resultados" data-toggle="modal" data-target="#vere"  wire:click="verp({{$cuestionario->id}})" >
                        <i class="fas fa-check-circle fa-fw"></i>
                    </button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$cuestionarios->links()}}
</div>
