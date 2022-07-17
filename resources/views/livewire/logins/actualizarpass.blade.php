
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block ">
                            <img id="logo" src="./img/logo.png" width="100%"  alt="logo" >
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Actualizar contraseña!</h1>
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
                                    @endif

                                    <div class="row form-group">
                                        <label for="pass" class=" text-dark">Contraseña actual</label>
                                        <input type="password" class="form-control " wire:model="pass">
                                        @error('pass') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>

                                    <div class="row form-group">
                                        <label for="pass2" class=" text-dark">Contraseña nueva</label>
                                        <input type="password" class="form-control " wire:model="pass2">
                                        @error('pass2') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>
                                    <div class="row form-group">
                                        <label for="pass3" class=" text-dark">Repetir contraseña nueva</label>
                                        <input type="password" class="form-control " wire:model="pass3">
                                        @error('pass3') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>
                                        @if(session('eusuario'))
                                            <a  href="/eactividades" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
                                            </a>
                                        @endif
                                        @if(session('ausuario'))
                                            <a   href="/estudiantes" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
                                            </a>
                                        @endif
                                        @if(session('musuario'))
                                            <a   href="/actividades" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
                                            </a>
                                        @endif
                                        @if(session('pusuario'))
                                            <a   href="/pactividades" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
                                            </a>
                                        @endif

                                    <button wire:click="actualizar"  class="btn btn-primary btn-user btn-block">
                                        Actualizar
                                    </button>
                                @endif
                                    <hr>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



