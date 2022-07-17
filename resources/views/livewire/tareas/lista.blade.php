<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Tareas/Actividades</h4>
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
                        <label  class="text-white">+ Tarea/actividad</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addtarea" title="Agragar tarea/actividad">
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
        <h4 class="text-center text-white">Lista tareas/actividades</h4>
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
                Punteo
            </th>
            <th>
                Archivos adjuntos
            </th>
            <th>
                Curso
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($tareas as $tarea)
            <tr>
                <td>
                    {{\carbon\carbon::parse($tarea->ffinalizacion)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{\carbon\carbon::parse($tarea->fcreado)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$tarea->titulo}}
                </td>
                <td>
                    {{$tarea->tdescripcion}}
                </td>
                <td>
                    {{$tarea->punteo}}
                </td>
                <td>
                    @foreach($maestroarchivos as $archivo)
                        @if($tarea->id==$archivo->tarea_id)
                            @if(preg_match('/.pdf/i',$archivo->mtitulo))
                                <i class="fas fa-file-pdf text-success fa-3x" ></i>
                                <br>
                            @endif
                                @if(preg_match('/.png/i',$archivo->mtitulo))
                                    <i class="fas fa-image text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.jpg/i',$archivo->mtitulo))
                                    <i class="fas fa-images text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.xls/i',$archivo->mtitulo))
                                    <i class="fas fa-file-excel text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.docs/i',$archivo->mtitulo))
                                    <i class="fas fa-file-word text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.ppt/i',$archivo->mtitulo))
                                    <i class="fas fa-file-powerpoint text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.zip/i',$archivo->mtitulo))
                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.rar/i',$archivo->mtitulo))
                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                    <br>
                                @endif

                                <span>{{$archivo->mtitulo}}</span>
                            <br>
                            <button type="button" class="btn-sm btn-danger " title="Eliminar archivo" wire:click="destroy({{$archivo->id}})" >
                                <i class="fas fa-cut "></i>
                            </button>
                            <a type="button" class="btn-sm btn-success " title="Descargar archivo" href="{{asset("storage/$archivo->murl")}}" download="{{$archivo->mtitulo}}" >
                                <i class="fas fa-download "></i>
                            </a>
                            <button type="button" class="btn-sm btn-info"  data-toggle="modal" data-target="#editasignar" title="editar archivo" wire:click="editasignar({{$archivo->id}})" >
                                <i class="fas fa-pencil-alt "></i>
                            </button>
                            <br><br>
                        @endif
                    @endforeach
                </td>
                <td>
                    Curso:&nbsp;{{$tarea->maestrocurso->curso->cnombre}}<br>
                    Grado:&nbsp;{{$tarea->maestrocurso->curso->grado->gnombre}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#edittarea" title="Editar tarea/actividad" wire:click="edit({{$tarea->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>

                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addasignar" title="Agregar archivo" wire:click="addasignar({{$tarea->id}})" >
                        <i class="fas fa-plus-circle fa-fw"></i>
                    </button>
                    <a type="button" class="btn btn-warning" title="calificar tareas" href="calificartareas/{{$tarea->id}}"  >
                        <i class="fas fa-check-double fa-fw"></i>
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalen" title="ver calificaciones" wire:click="ver({{$tarea->id}})" >
                        <i class="fas fa-eye fa-fw"></i>
                    </button>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$tareas->links()}}
</div>
