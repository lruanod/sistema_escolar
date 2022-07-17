
<div class="col-12 mt-2">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
            <div class="card-header text-center text-dark">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del producto</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row form-group">
                            <label for="" class="text-white mb" >Grados</label>
                            <select class="form-control " wire:model="buscar">
                                <option value="">Seleccionar Grados</option>
                                @foreach($grados as $grado)
                                    <option value="{{$grado->gnombre}}">{{$grado->gnombre}}&nbsp;Sección:&nbsp;{{$grado->gseccion}}&nbsp;Nivel:&nbsp;{{$grado->nivel->nnombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);" >
        <h4 class="text-center text-white">Estudiantes</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Dirección
            </th>
            <th>
                CUI
            </th>
            <th>
                Grados
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
        @foreach($asignars as $asignar)
            <tr>
                <td>
                    {{$asignar->enombre}}
                </td>
                <td>
                    {{$asignar->edireccion}}
                </td>
                <td>
                    {{$asignar->ecui}}
                </td>
                <td>
                    Grado:{{$asignar->gnombre}}<br>
                    Sección:{{$asignar->gseccion}}<br>
                    Nivel:{{$asignar->nnombre}}
                </td>
                <td>
                    {{$asignar->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addestudiante" title="Agregar estudiante" wire:click="busquedae({{$asignar->id}})" >
                        <i class="fas fa-chart-bar fa-fw"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    <br>
    {{$asignars->links()}}
</div>
