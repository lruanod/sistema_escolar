<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Citas</h4>
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

                    <div class="col-md-3">
                        <label  class="text-white">+ Curso</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcurso" title="Agragar curso">
                            <i class="fas fa-calendar-alt fa-fw"></i>
                        </button>
                    </div>

                    <div class="col-md-4">
                        <label  class="text-white">+ Grados</label><br>
                        <a  href="/grados" type="submit" class="btn btn-success" title="Agragar Grados académicos">
                            <i class="fas fa-chart-bar fa-fw"></i>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <label  class="text-white">+ Niveles</label><br>
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
        <h4 class="text-center text-white">Lista de citas</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha de solocitud
            </th>
            <th>
                Nombre
            </th>
            <th>
                Correo
            </th>
            <th>
                Teléfono
            </th>
            <th>
                Descripción
            </th>
            <th>
                Fecha de visita
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
        @foreach($citas as $cita)
            <tr>
                <td>
                    {{\carbon\carbon::parse($cita->created_at)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$cita->cinombre}}
                </td>
                <td>
                    {{$cita->cicorreo}}
                </td>
                <td>
                    {{$cita->cicel}}
                </td>
                <td>
                    {{$cita->cidescripcion}}
                </td>
                <td>
                    {{\carbon\carbon::parse($cita->cifecha)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$cita->ciestado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcita" title="Editar cita" wire:click="edit({{$cita->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$citas->links()}}
</div>
