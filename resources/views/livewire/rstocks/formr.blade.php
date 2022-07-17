<!-- modal addpedido-->


                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom,#1cc88a  , #18181c);">
                        <div class="card-header text-center text-dark">
                            Reporte por fechas
                        </div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label for="nombre" class="col-5 text-white">Nombre del producto</label>
                                <input type="text"  class="form-control col-md-5" wire:model.defer="nombre" readonly="readonly">
                                @error('nombre') <span class="text-warning">{{$message}}</span> @enderror
                                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#addproducto" title="Agragar producto">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>

                            <div class="row form-group">
                                <label for="categoria_id" class="col-5 text-white" >Categoría</label>
                                <select class="form-control col-md-5" wire:model.defer="categoria_id">
                                    <option value="">Seleccionar Categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <span class="text-warning">{{$message}}</span> @enderror
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="Generarpdf" class="btn btn-danger col-md-5">Generar pdf</button>
                            </div>
                        </div>
                    </div>
                </div>



