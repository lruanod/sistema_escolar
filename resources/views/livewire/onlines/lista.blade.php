<div class="col-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #1cc88a  , #18181c );" >
        <h4 class="text-center text-white">Clases online</h4>
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
                        <label  class="text-white">+ Clase online</label><br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addonline" title="Agragar clase online">
                            <i class="fas fa-globe fa-fw"></i>
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
        <h4 class="text-center text-white">Lista clases online</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha de la clase
            </th>
            <th>
                Link
            </th>
            <th>
                Descripci??n
            </th>
            <th>
                Curso
            </th>
            <th>
                Acci??n
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($onlines as $online)
            <tr>
                <td>
                    {{\carbon\carbon::parse($online->fecha)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$online->ourl}}
                </td>
                <td>
                    {{$online->odescripcion}}
                </td>
                <td>
                    Curso:&nbsp;{{$online->maestrocurso->curso->cnombre}}<br>
                    Grado:&nbsp;{{$online->maestrocurso->curso->grado->gnombre}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editonline" title="Editar clase online" wire:click="edit({{$online->id}})" >
                        <i class="fas fa-pencil-alt fa-fw"></i>
                    </button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$onlines->links()}}
</div>
