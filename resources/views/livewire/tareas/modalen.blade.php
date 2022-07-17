<!-- modal buscarestudiante-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="modalen" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="modalen">Calificación de tareas</h5>
                <button wire:click="default"  class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
                        <h4 class="text-center text-white">Calificaciones de actividades</h4>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Fecha de entrega
                                </th>
                                <th>
                                    Calificación
                                </th>
                                <th>
                                    Descripción profesor
                                </th>
                                <th>
                                    Descripción estudiante
                                </th>
                                <th>
                                    Tarea
                                </th>
                                <th>
                                    Archivos estudiante
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entregatareas as $ent)
                                <tr>
                                    <td>
                                        {{$ent->enfecha}}
                                    </td>
                                    <td>
                                        {{$ent->calificacion}}/{{$ent->tarea->punteo}}
                                    </td>
                                    <td>
                                        {{$ent->endescripcion}}
                                    </td>
                                    <td>
                                        {{$ent->edescripcion}}
                                    </td>
                                    <td>
                                        Titulo:&nbsp;{{$ent->tarea->titulo}} <br>
                                        Descripcion:&nbsp;{{$ent->tarea->tdescripcion}}
                                    </td>
                                    <td>
                                        @foreach($estudiantearchivos as $archivo2)
                                            @if($ent->id==$archivo2->entregatarea_id)
                                                @if(preg_match('/.pdf/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-pdf text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.png/i',$archivo2->etitulo))
                                                    <i class="fas fa-image text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.jpg/i',$archivo2->etitulo))
                                                    <i class="fas fa-images text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.xls/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-excel text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.docs/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-word text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.ppt/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-powerpoint text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.zip/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                                    <br>
                                                @endif
                                                @if(preg_match('/.rar/i',$archivo2->etitulo))
                                                    <i class="fas fa-file-archive text-success fa-3x" ></i>
                                                    <br>
                                                @endif

                                                <span>{{$archivo2->etitulo}}</span>
                                                <br>
                                                <a type="button" class="btn-sm btn-success " title="Descargar archivo" href="{{asset("storage/$archivo2->eurl")}}" download="{{$archivo2->etitulo}}" >
                                                    <i class="fas fa-download "></i>
                                                </a>
                                                <br><br>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal buscarestudiante-->
