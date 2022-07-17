
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img id="logo" src="./img/logo.png" width="100%"  alt="logo" >
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenido de nuevo!</h1>
                                </div>
                                @if(empty(session('rol')))
                                    <div class="row form-group">
                                        <label for="usuario" class="text-dark">Usuario</label>
                                        <input type="text" class="form-control " wire:model="usuario">
                                        @error('usuario') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>

                                    <div class="row form-group">
                                        <label for="pass" class=" text-dark">Contraseña</label>
                                        <input type="password" class="form-control " wire:model="pass">
                                        @error('pass') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>
                                    <div class="row form-group">
                                        <label for="" class=" text-dark" >Perfil</label>
                                        <select class="form-control " wire:model="rol">
                                            <option value="">Seleccionar perfil</option>
                                            <option value="Estudiante">Estudiante</option>
                                            <option value="Profesor">Profesor</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Padre">Padre</option>
                                        </select>
                                        @error('rol') <span class="text-warning">{{$message}}</span> @enderror
                                    </div>
                                    <button wire:click="login"  class="btn btn-primary btn-user btn-block">
                                        Ingresar
                                    </button>
                                @endif

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
                                        <a  href="/eactividades" class="btn btn-success btn-user btn-block">
                                            <i class="fab fa-door-open fa-fw"></i>Inicio
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
                                            <a   href="/estudiantes" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
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
                                            <a   href="/actividades" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
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
                                            <a   href="/pactividades" class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-door-open fa-fw"></i>Inicio
                                            </a>
                                        @endif
                                    <button type="submit" wire:click="logout" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-sign-out-alt fa-fw"></i>Cerrar sesión
                                    </button>

                                @endif

                                    <hr>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">olvidaste tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



