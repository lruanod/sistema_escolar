

<div class="row form-group">
    <label for="ourl" class="col-5 text-white">url clase virutal</label>
    <input type="text"  class="form-control col-md-5" wire:model="ourl">
    @error('ourl') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="odescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model="odescripcion"  rows="3"></textarea>
    @error('odescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="fecha" class="col-5 text-white">Fecha y hora</label>
    <input type="datetime-local"  class="form-control col-md-5" wire:model="fecha">
    @error('fecha') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ngrado" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="ngrado" readonly>
    @error('ngrado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="nnivel" class="col-5 text-white">Nivel</label>
    <input type="text"  class="form-control col-md-5" wire:model="nnivel" readonly>
    @error('nnivel') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="ncurso" class="col-5 text-white">Curso/Materia</label>
    <input type="text"  class="form-control col-md-5" wire:model="ncurso" readonly>
    @error('ncurso') <span class="text-warning">{{$message}}</span> @enderror
</div>







