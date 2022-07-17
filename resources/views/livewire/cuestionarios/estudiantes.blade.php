<div class="container-fluid">
        <div class="col-12 mt-2">
            <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
                <h4 class="text-center text-white">Lista de resultados</h4>
            </div><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Estudiante
                        </th>
                        <th>
                            Fecha de realización
                        </th>
                        <th>
                            Cuestionario
                        </th>
                        <th>
                            Puntuación
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cuestionarioestudiantes as $estudiante)
                    <tr>
                        <td>{{$estudiante->estudiante->enombre}}</td>
                        <td>{{\carbon\carbon::parse($estudiante->cefecha)->format('d/m/Y H:i')}}</td>
                        <td>
                            Titulo:&nbsp;{{$estudiante->cuestionario->titulo}}<br>
                            Descripción:&nbsp;{{$estudiante->cuestionario->cdescripcion}}
                        </td>
                        <td>{{$estudiante->cepunteo}}/{{$estudiante->cuestionario->punteo}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <br>
    <div class="row form-group ">
        <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
    </div>
</div>




