

<div class="row form-group">
    <label for="iurl" class="col-5 text-white">Imagen</label>
    <input type="file" class="form-control col-md-5" wire:model="iurl" id="{{$identificador}}" multiple>
    @error('iurl') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="galbum2" class="col-5 text-white">Album</label>
    <input type="text" class="form-control col-md-5" wire:model="galbum2" readonly="readonly">
    @error('galbum2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="iurl" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($iurl)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        @foreach($iurl as $key => $image)
            <img class="rounded" src="{{$image->temporaryUrl()}}" width="250vw" height="150vh" >
        @endforeach
    @endif
</div> <br>






