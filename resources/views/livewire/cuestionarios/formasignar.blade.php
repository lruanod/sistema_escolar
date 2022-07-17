<div class="row form-group">
    <label for="pregunta" class="col-5 text-white">Pregunta</label>
    <textarea class="form-control col-md-5" wire:model="pregunta"  rows="4"></textarea>
    @error('pregunta') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="tipo" class="col-5 text-white" >Tipo</label>
    <select class="form-control col-md-5" wire:model="tipo">
        <option value="">Seleccionar tipo</option>
        <option value="Abierta">Abierta</option>
        <option value="Cerrada">Cerrada</option>
    </select>
    @error('tipo') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="ppunteo" class="col-5 text-white">Punteo</label>
    <input type="number" wire:model="ppunteo" placeholder="0.00"   min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-5">
    @error('ppunteo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">cuestionario</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo" readonly="readonly">
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="ngrado" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="ngrado" readonly="readonly">
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














