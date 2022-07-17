

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">Titulo tarea</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo" readonly="readonly">
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="punteo" class="col-5 text-white">Punteo de tarea</label>
    <input type="number" wire:model="punteo" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5" readonly="readonly">
    @error('punteo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="calificacion" class="col-5 text-white">Calificación</label>
    <input type="number" wire:model="calificacion" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('calificacion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="endescripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model="endescripcion"  rows="3" ></textarea>
    @error('endescripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ngrado" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="ngrado" readonly="readonly">
    @error('ngrado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="nnivel" class="col-5 text-white">Nivel</label>
    <input type="text"  class="form-control col-md-5" wire:model="nnivel" readonly="readonly">
    @error('nnivel') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="ncurso" class="col-5 text-white">Curso/Materia</label>
    <input type="text"  class="form-control col-md-5" wire:model="ncurso" readonly="readonly">
    @error('ncurso') <span class="text-warning">{{$message}}</span> @enderror
</div>







