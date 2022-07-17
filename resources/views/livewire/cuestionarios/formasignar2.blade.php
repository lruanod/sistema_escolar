
<div class="row form-group">
    <label for="respuesta" class="col-5 text-white">Respuesta</label>
    <textarea class="form-control col-md-5" wire:model="respuesta"  rows="3"></textarea>
    @error('respuesta') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="restado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="restado">
        <option value="">Seleccionar respuesta</option>
        <option value="Correcta">Correcta</option>
        <option value="Incorrecta">Incorrecta</option>
        <option value="Verificar">Verificar</option>
    </select>
    @error('restado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pregunta2" class="col-5 text-white">Pregunta</label>
    <textarea class="form-control col-md-5" wire:model="pregunta2"  rows="4" readonly="readonly"></textarea>
    @error('pregunta2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="titulo2" class="col-5 text-white">cuestionario</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo2" readonly="readonly">
    @error('titulo2') <span class="text-warning">{{$message}}</span> @enderror
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


