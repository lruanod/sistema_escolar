<?php

namespace App\Http\Livewire;

use App\Models\Ciclo;
use Livewire\Component;
use Livewire\WithPagination;

class CicloComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $ciclo_id,$ano;
    public $buscar;

    public function getCiclosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Ciclo::where('ano','like',$busqueda)->paginate(8,['*'],'ciclo');
    }
    public function render()
    {
        return view('livewire.ciclo-component',[
            'ciclos' => $this->getCiclosProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'ano'=> 'required|integer',
        ]);
        Ciclo::create([
            'ano'=> $this->ano,
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $ciclo= Ciclo::find($id);
        $this->ciclo_id = $ciclo->id;
        $this->ano = $ciclo->ano;
    }

    public function update(){
        $this->validate([
            'ano'=> 'required|integer',
        ]);

        $ciclo= Ciclo::find($this->ciclo_id);
        $ciclo->update([
            'ano'=> $this->ano,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->ano = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Ciclo escolar registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Ciclo escolar editado correctamente']);
    }
}
