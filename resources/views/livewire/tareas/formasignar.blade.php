
<div class="row form-group">
    <label for="murl" class="col-5 text-white">Archivo</label>
    <input type="file" class="form-control col-md-5" wire:model="murl" id="{{$identificador3}}" multiple>
    @error('murl') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">Tarea</label>
    <input type="text"  class="form-control col-md-5" wire:model="titulo" readonly>
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
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

<div class="card-body align-content-center">
    <div wire:loading wire:target="murl" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que el archivo se haya cargado</li>
        </ul>
    </div>
</div> <br>













