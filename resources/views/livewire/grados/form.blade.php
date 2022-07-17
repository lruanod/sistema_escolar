

<div class="row form-group">
    <label for="gnombre" class="col-5 text-white">Nombre del grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="gnombre">
    @error('gnombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="gseccion" class="col-5 text-white">Sección</label>
    <input type="text"  class="form-control col-md-5" wire:model="gseccion">
    @error('gseccion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Nivel académico</label>
    <select class="form-control col-md-5" wire:model="nivel_id">
        <option value="">Seleccionar Nivel</option>
        @foreach($nivels as $nivel)
            <option value="{{$nivel->id}}">{{$nivel->nnombre}}</option>
        @endforeach
    </select>
    @error('nivel_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="monto" class="col-5 text-white">Costo de Mensualidad</label>
    <input type="number" wire:model="monto" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('monto') <span class="text-warning">{{$message}}</span> @enderror
</div>




