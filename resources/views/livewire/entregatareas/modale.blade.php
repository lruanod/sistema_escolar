<!-- modal buscarestudiante-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="modale" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="modale">Calificación</h5>
                <button wire:click="default"  class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
                        <h4 class="text-center text-white">Calificaciones de tareas/actividades</h4>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Fecha calificación
                                </th>
                                <th>
                                    Tarea
                                </th>
                                <th>
                                    Descripción del profesor
                                </th>
                                <th>
                                    Punteo
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entregatareas as $entrega)
                                <tr>
                                    <td>
                                        {{\carbon\carbon::parse($entrega->enfecha)->format('d/m/Y H:i')}}
                                    </td>
                                    <td>
                                        {{$entrega->tarea->titulo}}
                                    </td>
                                    <td>
                                        {{$entrega->endescripcion}}
                                    </td>
                                    <td>
                                        {{$entrega->tarea->punteo}}/{{$entrega->calificacion}}
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
