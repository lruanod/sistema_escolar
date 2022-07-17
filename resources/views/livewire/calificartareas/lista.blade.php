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


                    <div class="col-md-4">
                        <label  class="text-white">+ Salir</label><br>
                        <a  href="/actividades" type="submit" class="btn btn-success" title="salir a tareas">
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
                    Fecha de entrega
                </th>
                <th>
                    Fecha de finalización
                </th>
                <th>
                    Fecha de Iniciación
                </th>
                <th>
                    Estudiante
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
                    Archivos adjuntos Maestro
                </th>
                <th>
                    Archivos adjuntos Estudiante
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
            @foreach($entregatareas as $tarea)
                <tr>
                    <td>
                        {{\carbon\carbon::parse($tarea->enfecha)->format('d/m/Y H:i')}}
                    </td>
                    <td>
                        {{\carbon\carbon::parse($tarea->ffinalizacion)->format('d/m/Y H:i')}}
                    </td>
                    <td>
                        {{\carbon\carbon::parse($tarea->fcreado)->format('d/m/Y H:i')}}
                    </td>
                    <td>
                        {{$tarea->enombre}}
                    </td>
                    <td>
                        {{$tarea->titulo}}
                    </td>
                    <td>
                        {{$tarea->tdescripcion}}
                    </td>
                    <td>
                        {{$tarea->calificacion}}/{{$tarea->punteo}}
                    </td>
                    <td>
                        @foreach($maestroarchivos as $archivo)
                            @if($tarea->tarea_id==$archivo->tarea_id)
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
                                <a type="button" class="btn-sm btn-success " title="Descargar archivo" href="{{asset("storage/$archivo->murl")}}" download="{{$archivo->mtitulo}}" >
                                    <i class="fas fa-download "></i>
                                </a>
                                <br><br>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($estudiantearchivos as $earchivo)
                            @if($tarea->tarea_id==$earchivo->entregatarea->tarea_id)
                                @if(preg_match('/.pdf/i',$earchivo->etitulo))
                                    <i class="fas fa-file-pdf text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.png/i',$earchivo->etitulo))
                                    <i class="fas fa-image text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.jpg/i',$earchivo->etitulo))
                                    <i class="fas fa-images text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.xls/i',$earchivo->etitulo))
                                    <i class="fas fa-file-excel text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.docs/i',$earchivo->etitulo))
                                    <i class="fas fa-file-word text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.ppt/i',$earchivo->etitulo))
                                    <i class="fas fa-file-powerpoint text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.zip/i',$earchivo->etitulo))
                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                    <br>
                                @endif
                                @if(preg_match('/.rar/i',$earchivo->etitulo))
                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                    <br>
                                @endif

                                <span>{{$earchivo->etitulo}}</span>
                                <br>
                                <a type="button" class="btn-sm btn-success " title="Descargar archivo" href="{{asset("storage/$earchivo->eurl")}}" download="{{$earchivo->etitulo}}" >
                                    <i class="fas fa-download "></i>
                                </a>
                                <br><br>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        Curso:&nbsp;{{$tarea->cnombre}}<br>
                        Grado:&nbsp;{{$tarea->gnombre}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#calificar" title="Calificar tarea/actividad" wire:click="calificar({{$tarea->iden}})" >
                            <i class="fas fa-pencil-alt fa-fw"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{$entregatareas->links()}}
</div>
