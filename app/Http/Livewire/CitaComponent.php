<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Entregatarea;
use App\Models\Estudiantearchivo;
use App\Models\Maestroarchivo;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithPagination;

class CitaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $cita_id,$cinombre,$cifecha,$cicorreo,$cicel,$cidescripcion,$ciestado,$inicio,$fin,$identificador;

    public function getCitasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Cita::whereBetween('created_at',array($this->inicio,$this->fin))->paginate(8,['*'],'cita');
        } else{
            return Cita::orderBy("created_at", "desc")->paginate(8,['*'],'cita');
        }

    }

    public function render()
    {
        return view('livewire.cita-component',[
            'citas' => $this->getCitasProperty(),
        ]);
    }

    public function edit($id){
        $cita= Cita::find($id);
        $this->cita_id=$cita->id;
        $this->cinombre=$cita->cinombre;
        $this->cicel=$cita->cicel;
        $this->cicorreo=$cita->cicorreo;
        $this->cidescripcion=$cita->cidescripcion;
        $this->cifecha=$cita->cifecha;
        $this->identificador=$cita->cifecha;
        $this->ciestado=$cita->ciestado;
    }

    public function update(){
        $this->validate([
            'ciestado'=> 'required|string|max:35',
        ]);

        $cita= Cita::find($this->cita_id);
        $cita->update([
            'cifecha'=> $this->cifecha,
            'ciestado'=> $this->ciestado
        ]);
        $this->msjedit();
        $this->default();
    }

    public function default(){
        $this->cinombre = '';
        $this->cifecha='';
        $this->cicorreo='';
        $this->cicel='';
        $this->cidescripcion='';
        $this->ciestado = '';
        $this->inicio='';
        $this->fin='';
        $this->identificador='';
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Cita editada correctamente']);
    }
}
