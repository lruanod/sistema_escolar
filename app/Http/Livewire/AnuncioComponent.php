<?php

namespace App\Http\Livewire;

use App\Models\Anuncio;
use App\Models\Ciclo;
use Livewire\Component;
use Livewire\WithPagination;

class AnuncioComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $anuncio_id,$afecha,$titulo,$adescripcion;
    public $buscar;

    public function getAnunciosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Anuncio::where('titulo','like',$busqueda)->paginate(8,['*'],'anunciar');
    }
    public function render()
    {
        return view('livewire.anuncio-component',[
            'anuncios' => $this->getAnunciosProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'afecha'=> 'required|date',
            'titulo'=> 'required|string|max:65',
            'adescripcion'=> 'required|string|max:1000'
        ]);
        Anuncio::create([
            'afecha'=> $this->afecha,
            'titulo'=> $this->titulo,
            'adescripcion'=> $this->adescripcion,
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $anuncio= Anuncio::find($id);
        $this->anuncio_id = $anuncio->id;
        $this->afecha = $anuncio->afecha;
        $this->titulo = $anuncio->titulo;
        $this->adescripcion = $anuncio->adescripcion;
    }

    public function update(){
        $this->validate([
            'afecha'=> 'required|date',
            'titulo'=> 'required|string|max:65',
            'adescripcion'=> 'required|string|max:1000'
        ]);

        $anuncio= Anuncio::find($this->anuncio_id);
        $anuncio->update([
            'afecha'=> $this->afecha,
            'titulo'=> $this->titulo,
            'adescripcion'=> $this->adescripcion,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->afecha = '';
        $this->titulo = '';
        $this->adescripcion = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Anuncio registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Anuncio  editado correctamente']);
    }
}
