

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre del producto</label>
    <input type="text"  class="form-control col-md-5" wire:model.defer="nombre">
    @error('nombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control col-md-5" wire:model.defer="descripcion"  rows="3"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="precio" class="col-5 text-white">Precio</label>
    <input type="number" wire:model.defer="precio" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('precio') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stock" class="col-5 text-white">Stock</label>
    <input type="number" wire:model.defer="stock" class="form-control col-md-5"  placeholder="0"  min="0">
    @error('stock') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descuento" class="col-5 text-white">Descuento</label>
    <input type="number" wire:model.defer="descuento" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('descuento') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="estado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model.defer="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="categoria_id" class="col-5 text-white" >Categoría</label>
    <select class="form-control col-md-5" wire:model.defer="categoria_id">
        <option value="">Seleccionar Categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->nombrec}}</option>
        @endforeach
    </select>
    @error('categoria_id') <span class="text-warning">{{$message}}</span> @enderror
</div>







