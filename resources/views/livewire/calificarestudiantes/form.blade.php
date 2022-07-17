

<div class="row form-group">
    <label for="pregunta" class="col-5 text-white">Pregunta</label>
    <textarea class="form-control col-md-5" wire:model="pregunta"  rows="3" readonly="readonly"></textarea>
    @error('pregunta') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ppunteo" class="col-5 text-white">Punteo</label>
    <input type="number" wire:model="ppunteo" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5" readonly="readonly">
    @error('ppunteo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="rerespuesta" class="col-5 text-white">Respuesta</label>
    <textarea class="form-control col-md-5" wire:model="rerespuesta"  rows="3" readonly="readonly"></textarea>
    @error('rerespuesta') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="calificar" class="col-5 text-white">Calificar</label>
    <input type="number" wire:model="calificar" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('calificar') <span class="text-warning">{{$message}}</span> @enderror
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







