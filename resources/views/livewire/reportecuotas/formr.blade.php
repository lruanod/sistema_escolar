<!-- modal addpedido-->


                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
                        <div class="card-header text-center text-dark">
                            Reporte por fechas
                        </div>
                        <div class="card-body">

                            <div class="row form-group">
                                <label for="finicio" class="col-5 text-white">Fecha incio</label>
                                <input type="datetime-local" wire:model="finicio" class="form-control col-md-5">
                                @error('finicio') <span class="text-warning">{{$message}}</span> @enderror
                            </div>
                            <div class="row form-group">
                                <label for="ffinal" class="col-5 text-white">Fecha final</label>
                                <input type="datetime-local" wire:model="ffinal" class="form-control col-md-5">
                                @error('ffinal') <span class="text-warning">{{$message}}</span> @enderror
                            </div>

                            <div class="row form-group">
                                <label for="enombre" class="col-5 text-white">Estudiante</label>
                                <input type="text"  class="form-control col-md-5" wire:model.defer="enombre" readonly="readonly">
                                @error('enombre') <span class="text-warning">{{$message}}</span> @enderror
                                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#addestudiante" title="Agragar estudiante">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>

                            <div class="row form-group">
                                <label for="grado_id" class="col-5 text-white" >Grado</label>
                                <select class="form-control col-md-5" wire:model.defer="grado_id">
                                    <option value="">Seleccionar grado</option>
                                    @foreach($grados as $grado)
                                        <option value="{{$grado->id}}">{{$grado->gnombre}}&nbsp;Sección:&nbsp;{{$grado->gseccion}}&nbsp;Nivel:&nbsp;{{$grado->nivel->nnombre}}</option>
                                    @endforeach
                                </select>
                                @error('grado_id') <span class="text-warning">{{$message}}</span> @enderror
                            </div>
                            <div class="row form-group">
                                <label for="ciclo_id" class="col-5 text-white" >Ciclo escolar</label>
                                <select class="form-control col-md-5" wire:model.defer="ciclo_id">
                                    <option value="">Seleccionar ciclo</option>
                                    @foreach($ciclos as $ciclo)
                                        <option value="{{$ciclo->id}}">{{$ciclo->ano}}</option>
                                    @endforeach
                                </select>
                                @error('ciclo_id') <span class="text-warning">{{$message}}</span> @enderror
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="Generarpdf" class="btn btn-danger col-md-5">Generar pdf</button>
                            </div>
                        </div>
                    </div>
                </div>



