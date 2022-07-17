
<div class="row form-group">
    <label for="zestado" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="zestado">
        <option value="">Seleccionar Estado</option>
        <option value="Aprobado">Aprobado</option>
        <option value="No aprobado">No aprobado</option>
    </select>
    @error('zestado') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="zona" class="col-5 text-white">Zona</label>
    <input type="number" wire:model="zona" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" wire:change="change()">
    @error('zona') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="aspecto" class="col-5 text-white">Aspectos</label>
    <input type="number" wire:model="aspecto" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7"  wire:change="change()">
    @error('aspecto') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="evaluacion" class="col-5 text-white">Evaluaciones</label>
    <input type="number" wire:model="evaluacion" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('evaluacion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="total" class="col-5 text-white">Total</label>
    <input type="number" wire:model="total" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly"  wire:change="change()">
    @error('total') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="enombre" class="col-5 text-white">Estudiante</label>
    <input type="text"  class="form-control col-md-5" wire:model="enombre" readonly="readonly">
</div>

<div class="row form-group">
    <label for="gnombre" class="col-5 text-white">Grado</label>
    <input type="text"  class="form-control col-md-5" wire:model="gnombre" readonly="readonly">
</div>

<div class="row form-group">
    <label for="cnombre" class="col-5 text-white">curso</label>
    <input type="text"  class="form-control col-md-5" wire:model="cnombre" readonly="readonly">
</div>








