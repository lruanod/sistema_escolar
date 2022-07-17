<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use Livewire\Component;
use Livewire\WithPagination;

class NivelComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $nivel_id,$nnombre;
    public $buscar;

    public function getNivelsProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Nivel::where('nnombre','like',$busqueda)->paginate(8,['*'],'nivel');
    }
    public function render()
    {
        return view('livewire.nivel-component',[
            'nivels' => $this->getNivelsProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nnombre'=> 'required|string|max:75',
        ]);
        Nivel::create([
            'nnombre'=> $this->nnombre,
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $nivel= Nivel::find($id);
        $this->nivel_id = $nivel->id;
        $this->nnombre = $nivel->nnombre;
    }

    public function update(){
        $this->validate([
            'nnombre'=> 'required|string|max:75',
        ]);

        $nivel= Nivel::find($this->nivel_id);
        $nivel->update([
            'nnombre'=> $this->nnombre,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->nnombre = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Nivel académico registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Nivel académico editado correctamente']);
    }
}
