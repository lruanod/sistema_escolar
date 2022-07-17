<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Cursos</h4>
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
                                <input type="date" wire:model="inicio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="final" class="text-white">Fecha final</label>
                                <input type="date" wire:model="fin" class="form-control">
                            </div>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Cuota</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcuota" title="Agragar cuota">
                            <i class="fas fa-money-bill-alt fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Grados</label><br>
                        <a  href="/grados" type="submit" class="btn btn-success" title="Agragar Grados académicos">
                            <i class="fas fa-chart-bar fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Nivel</label><br>
                        <a  href="/nivels" type="submit" class="btn btn-success" title="Agragar Nivel acedémicos">
                            <i class="fas fa-signal fa-fw"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card col-12" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Lista cuotas</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha de pago
            </th>
            <th>
                Mes
            </th>
            <th>
                Grado
            </th>
            <th>
                Nivel
            </th>
            <th>
                Ciclo
            </th>
            <th>
                Abono
            </th>
            <th>
                Estudiante
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($cuotas as $cuota)
            <tr>
                <td>
                    {{\carbon\carbon::parse($cuota->cfecha)->format('d/m/Y')}}
                </td>
                <td>
                    {{$cuota->mes}}
                </td>
                <td>
                    {{$cuota->ngrado}}
                </td>
                <td>
                    {{$cuota->asignaciongrado->grado->nivel->nnombre}}
                </td>
                <td>
                    {{$cuota->asignaciongrado->ciclo->ano}}
                </td>
                <td>
                    {{$cuota->abono}}
                </td>
                <td>
                    {{$cuota->asignaciongrado->estudiante->enombre}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcuota" title="Editar cuota" wire:click="edit({{$cuota->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$cuotas->links()}}
</div>
