<!-- modal buscarestudiante-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="modalze" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="modalze">Asignar nota</h5>
                <button wire:click="default"  class="close col-md-1 btn " data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle fa-fw"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
                        <h4 class="text-center text-white">Calificaciones de examenes/parciales</h4>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Bimestre
                                </th>
                                <th>
                                    Punteo
                                </th>
                                <th>
                                    Acción
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($zonaevaluacions as $zonae)
                                <tr>
                                    <td>
                                        {{$zonae->bimestre}}
                                    </td>
                                    <td>
                                        {{$zonae->zepunteo}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editze" title="Asignar notas" wire:click="editze({{$zonae->id}})" >
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </button>
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
