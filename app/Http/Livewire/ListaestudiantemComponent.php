<?php

namespace App\Http\Livewire;

use App\Models\Maestrocurso;
use Livewire\Component;
use Livewire\WithPagination;

class ListaestudiantemComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $maestro_id;
    public $buscar;

    public function getMaestrocursosProperty(){
        $this->maestro_id=session()->get('maestro_id');
        $busqueda='%'.$this->buscar.'%';
        return Maestrocurso::join('cursos','curso_id','cursos.id')->where('cursos.cnombre','like',$busqueda)->where('maestro_id','=',$this->maestro_id)->paginate(8,['*'],'maestrocurso');
    }
    public function render()
    {
        return view('livewire.actividad-component',[
            'maestrocursos' => $this->getMaestrocursosProperty()
        ]);
    }
}
