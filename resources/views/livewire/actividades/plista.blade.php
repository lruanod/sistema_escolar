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
                            <label for="grado" class="col-md-8 text-white" >Grado</label>
                            <select class="form-control col-md-12" wire:model="buscar">
                                <option value="">Seleccionar grado</option>
                                @foreach($asignaciongrados as $asignacion)
                                    <option value="{{$asignacion->grado_id}}">{{$asignacion->grado->gnombre}}</option>
                                @endforeach
                            </select>
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
                Estudiante
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
                Fecha de inscripción
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
                    {{$ec->enombre}}
                </td>
                <td>
                    {{$ec->cnombre}}
                </td>
                <td>
                    Grado:&nbsp;{{$ec->gnombre}}&nbsp;&nbsp;Sección:&nbsp;&nbsp;{{$ec->gseccion}}
                </td>
                <td>
                    {{$ec->nnombre}}
                </td>
                <td>
                    {{\carbon\carbon::parse($ec->fecha)->format('d/m/Y')}}
                </td>
                <td>
                    <a type="button" class="btn btn-warning" title="Tareas/entregables"  href="ptareas/{{$ec->estudiantecursoid}}" >
                        <i class="fas fa-book fa-fw"></i>
                    </a>
                    <a type="button" class="btn btn-success" title="Cuestionarios"  href="pcuestionarios/{{$ec->estudiantecursoid}}" >
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
