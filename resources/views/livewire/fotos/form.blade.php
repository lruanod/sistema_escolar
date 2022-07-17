
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="card-body align-content-center m-5">
                                <div  class="alert alert-warning">
                                    <ul>
                                        <li>Nota: Debes cerrar sección para actualizar los cambios</li>
                                    </ul>
                                </div>
                                <div wire:loading wire:target="url" class="alert alert-danger">
                                    <ul>
                                        <li>Espere un momento hasta que la imagen se haya cargado</li>
                                    </ul>
                                </div>
                                <label  class="text-dark align-content-center" >Anterior</label><br>
                                <img class="rounded" src="{{asset("storage/".session('url'))}}" width="250vw" height="300vh" >

                                @if ($url)
                                    <label  class="text-dark align-content-center m-1" >Pre visualización</label><br>
                                    <img class="rounded" src="{{$url->temporaryUrl()}}" width="250vw" height="300vh" >
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Actualizar foto de perfil</h1>
                                </div>

                                @if(!empty(session('rol')))
                                    @if(session('eusuario'))
                                    <div class="row form-group">
                                        <label for="usuario" class="text-dark">Usuario</label>
                                        <input type="text" class="form-control " value="{{session("eusuario")}}">
                                    </div>
                                    <div class="row form-group">
                                        <label for="nombre" class="text-dark">Nombre</label>
                                        <input type="text" class="form-control " value="{{session("enombre")}}">
                                    </div>
                                        <div class="row form-group">
                                            <label for="url" class="text-dark">Foto</label>
                                            <input type="file" class="form-control" wire:model="url" id="{{$identificador}}">
                                            @error('url') <span class="text-warning">{{$message}}</span> @enderror
                                        </div>
                                        <br>
                                        <a  href="/eactividades" class="btn btn-danger btn-user btn-block">
                                            <i class="fab fa-door-open fa-fw"></i>Ir al panel principal
                                        </a>

                                    @endif
                                    @if(session('ausuario'))
                                            <div class="row form-group">
                                                <label for="usuario" class="text-dark">Usuario</label>
                                                <input type="text" class="form-control " value="{{session("ausuario")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="nombre" class="text-dark">Nombre</label>
                                                <input type="text" class="form-control " value="{{session("anombre")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="url" class="text-dark">Foto</label>
                                                <input type="file" class="form-control" wire:model="url" id="{{$identificador}}">
                                                @error('url') <span class="text-warning">{{$message}}</span> @enderror
                                            </div>
                                            <br>
                                            <a   href="/estudiantes" class="btn btn-danger btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Ir al panel principal
                                            </a>
                                        @endif
                                        @if(session('musuario'))
                                            <div class="row form-group">
                                                <label for="usuario" class="text-dark">Usuario</label>
                                                <input type="text" class="form-control " value="{{session("musuario")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="nombre" class="text-dark">Nombre</label>
                                                <input type="text" class="form-control " value="{{session("mnombre")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="url" class="text-dark">Foto</label>
                                                <input type="file" class="form-control" wire:model="url" id="{{$identificador}}">
                                                @error('url') <span class="text-warning">{{$message}}</span> @enderror
                                            </div>
                                            <br>
                                            <a   href="/actividades" class="btn btn-danger btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Ir al panel principal
                                            </a>
                                        @endif
                                        @if(session('pusuario'))
                                            <div class="row form-group">
                                                <label for="usuario" class="text-dark">usuario</label>
                                                <input type="text" class="form-control " value="{{session("pusuario")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="nombre" class="text-dark">Nombre</label>
                                                <input type="text" class="form-control " value="{{session("pnombre")}}">
                                            </div>
                                            <div class="row form-group">
                                                <label for="url" class="text-dark">Foto</label>
                                                <input type="file" class="form-control" wire:model="url" id="{{$identificador}}">
                                                @error('url') <span class="text-warning">{{$message}}</span> @enderror
                                            </div>
                                            <br>
                                            <a   href="/pactividades" class="btn btn-danger btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Ir al panel principal
                                            </a>
                                        @endif
                                    <button type="submit" wire:click="save" class="btn btn-info btn-user btn-block">
                                        <i class="fab fa-file-image "></i>Guardar foto
                                    </button>

                                @endif
                                    <hr>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



