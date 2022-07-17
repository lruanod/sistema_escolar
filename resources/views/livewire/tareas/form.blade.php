
<div class="row form-group">
    <label for="fcreado" class="col-5 text-white">Fecha y hora de inicio</label>
    <input type="datetime-local"  class="form-control col-md-5" wire:model="fcreado">
    @error('fcreado') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="ffinalizacion" class="col-5 text-white">Fecha y hora de Finalización</label>
    <input type="datetime-local"  class="form-control col-md-5" wire:model="ffinalizacion">
    @error('ffinalizacion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">Titulo</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo">
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="testado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="testado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('testado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="tdescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model="tdescripcion"  rows="3"></textarea>
    @error('tdescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="punteo" class="col-5 text-white">Punteo</label>
    <input type="number" wire:model="punteo" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('punteo') <span class="text-warning">{{$message}}</span> @enderror
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







