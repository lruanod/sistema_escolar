<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $categoria_id,$nombrec;
    public $buscar;

    public function getCursosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Categoria::where('nombrec','like',$busqueda)->paginate(8,['*'],'categoria');
    }
    public function render()
    {
        return view('livewire.categoria-component',[
            'categorias' => $this->getCursosProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombrec'=> 'required|string|max:65'
        ]);
        Categoria::create([
            'nombrec'=> $this->nombrec
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $categoria= Categoria::find($id);
        $this->categoria_id = $categoria->id;
        $this->nombrec = $categoria->nombrec;

    }

    public function update(){
        $this->validate([
            'nombrec'=> 'required|string|max:65'
        ]);

        $categoria= Categoria::find($this->categoria_id);
        $categoria->update([
            'nombrec'=> $this->nombrec
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->nombrec = '';
        $this->categoria_id='';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Categoria registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Categoria editada correctamente']);
    }
}
