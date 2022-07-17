<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Actividades</h4>
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
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del curso</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista actividades</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha de asignación
            </th>
            <th>
                Curso
            </th>
            <th>
                Grado
            </th>
            <th>
                Nivel
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($estudiantecursos as $ec)
            <tr>
                <td>
                    {{\carbon\carbon::parse($ec->asignaciongrado->fecha)->format('d/m/Y')}}
                </td>
                <td>
                    {{$ec->curso->cnombre}}
                </td>
                <td>
                    Grado:&nbsp;{{$ec->curso->grado->gnombre}}&nbsp;&nbsp;Sección:&nbsp;&nbsp;{{$ec->curso->grado->gseccion}}
                </td>
                <td>
                    {{$ec->curso->grado->nivel->nnombre}}
                </td>
                <td>
                    <a type="button" class="btn btn-info" title="clases virtuales"  href="eonlines/{{$ec->curso_id}}" >
                        <i class="fas fa-globe fa-fw"></i>
                    </a>
                    <a type="button" class="btn btn-warning" title="Tareas/entregables"  href="etareas/{{$ec->curso_id}}" >
                        <i class="fas fa-book fa-fw"></i>
                    </a>
                    <a type="button" class="btn btn-success" title="Cuestionarios"  href="ecuestionarios/{{$ec->curso_id}}" >
                        <i class="fas fa-align-left fa-fw"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$estudiantecursos->links()}}
</div>