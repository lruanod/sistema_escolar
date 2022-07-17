<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Zonas</h4>
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
                            <label for="zestado" class="col-md-3 text-white" >Curso</label>
                            <select class="form-control col-md-8" wire:model="buscar">
                                <option value="">Seleccionar curso</option>
                                @foreach($maestrocursos as $mcurso)
                                    <option value="{{$mcurso->curso_id}}">{{$mcurso->curso->cnombre}}</option>
                                @endforeach
                            </select>
                        </div>
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
        <h4 class="text-center text-white">Lista de calificaciones</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Estudiante
            </th>
            <th>
                Grado
            </th>
            <th>
                Aspectos
            </th>
            <th>
                Zona
            </th>
            <th>
                Total de evaluaciones
            </th>
            <th>
                Total
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
        @foreach($zonas as $zona)
            <tr>
                <td>
                    {{$zona->enombre}}
                </td>
                <td>
                    Grado:&nbsp;{{$zona->gnombre}}<br>
                    Sección:&nbsp;{{$zona->gseccion}}<br>
                    Nivel:&nbsp;{{$zona->nnombre}}<br>
                </td>
                <td>
                    {{$zona->aspecto}}
                </td>
                <td>
                    {{$zona->zona}}
                </td>
                <td>
                    {{$zona->evaluacion}}
                </td>
                <td>
                    {{$zona->total}}
                </td>
                <td>
                    {{$zona->zestado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editzona" title="Asignar notas" wire:click="edit({{$zona->zonaid}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#modalze" title="Asignar notas de bimestre" wire:click="verze({{$zona->zonaid}})" >
                        <i class="fas fa-clipboard-check fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$zonas->links()}}
</div>
