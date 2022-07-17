<?php

namespace App\Http\Livewire;

use App\Models\Anuncio;
use Livewire\Component;
use Livewire\WithPagination;

class MostraranuncioComponent extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.mostraranuncio-component',[
            'anuncios'=> Anuncio::all(),
        ]);
    }
}
