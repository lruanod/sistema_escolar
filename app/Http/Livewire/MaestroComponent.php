<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Curso;
use App\Models\Maestro;
use App\Models\Maestrocurso;
use Livewire\Component;
use Livewire\WithPagination;

class MaestroComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $maestro_id,$mnombre,$mdireccion,$mcel,$mcui,$mcorreo,$mpass,$musuario,$mestado;
    public $maestrocurso_id,$fecha,$curso_id,$mnombre2,$estado;
    public $buscar;

    public function getMaestrosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Maestro::where('mnombre','like',$busqueda)->paginate(8,['*'],'maestro');
    }
    public function render()
    {
        return view('livewire.maestro-component',[
            'maestros' => $this->getMaestrosProperty(),
            'asignars'=> Maestrocurso::all(),
            'cursos'=> Curso::join('maestrocursos','cursos.id','maestrocursos.id')->get()

        ]);
    }
    public function store(){
        $this->validate([
            'mnombre'=> 'required|string|max:75',
            'mdireccion'=> 'required|string|max:75',
            'mcui'=> 'required|integer|min:10',
            'mcel'=> 'required|integer|min:7',
            'mcorreo'=> 'required|email|max:45|unique:maestros',
            'mpass'=> 'required|string|min:7',
            'musuario'=> 'required|string|max:45|unique:maestros',
            'mestado'=> 'required|string|max:45'
        ]);
        Maestro::create([
            'mnombre'=> $this->mnombre,
            'mdireccion'=>$this->mdireccion,
            'mcui'=> $this->mcui,
            'mcel'=> $this->mcel,
            'mpass'=> $this->mpass,
            'musuario'=> $this->musuario,
            'mcorreo'=> $this->mcorreo,
            'mestado'=> $this->mestado,
            'murl'=> ""

        ]);
        $this->msjexito();
        $this->default();
    }

    public function addasignar($id){
        $maestro=Maestro::find($id);
        $this->mnombre2=$maestro->mnombre;
        $this->maestro_id=$maestro->id;
    }

    public function regasignar(){
        $this->validate([
            'fecha'=> 'required|date',
            'maestro_id'=> 'required|integer',
            'curso_id'=> 'required|integer',
            'estado'=> 'required|string|max:20',
        ]);
        Maestrocurso::create([
            'fecha'=> $this->fecha,
            'maestro_id'=>$this->maestro_id,
            'curso_id'=>$this->curso_id,
            'estado'=> $this->estado
        ]);
        $this->msjexito3();
        $this->default();
    }

    public function edit($id){
        $maestro= Maestro::find($id);
        $this->maestro_id = $maestro->id;
        $this->mnombre = $maestro->mnombre;
        $this->mdireccion = $maestro->mdireccion;
        $this->mcui = $maestro->mcui;
        $this->mcel = $maestro->mcel;
        $this->mcorreo = $maestro->mcorreo;
        $this->mpass = $maestro->mpass;
        $this->musuario = $maestro->musuario;
        $this->mestado = $maestro->mestado;
    }

    public function editasignar($id,$id_ma){
        $asignar= Maestrocurso::find($id);
        $mastro=Maestro::find($id_ma);
        $this->maestrocurso_id = $asignar->id;
        $this->fecha = $asignar->fecha;
        $this->maestro_id = $asignar->maestro_id;
        $this->curso_id = $asignar->curso_id;
        $this->estado = $asignar->estado;
        $this->mnombre2 = $mastro->mnombre;
    }

    public function update(){
        $this->validate([
            'mnombre'=> 'required|string|max:75',
            'mdireccion'=> 'required|string|max:75',
            'mcui'=> 'required|integer|min:10',
            'mcel'=> 'required|integer|min:7',
            'mpass'=> 'required|string|min:7',
            'mestado'=> 'required|string|max:45'
        ]);

        $maestro= Maestro::find($this->maestro_id);
        $maestro->update([
            'mnombre'=> $this->mnombre,
            'mdireccion'=>$this->mdireccion,
            'mcui'=> $this->mcui,
            'mcel'=> $this->mcel,
            'mpass'=> $this->mpass,
            'mestado'=> $this->mestado
        ]);
        $this->msjedit();
        $this->default();

    }

    public function updateasignar(){
        $this->validate([
            'fecha'=> 'required|date',
            'maestro_id'=> 'required|integer',
            'curso_id'=> 'required|integer',
            'estado'=> 'required|string|max:20',
        ]);

        $asignar= Maestrocurso::find($this->maestrocurso_id);
        $asignar->update([
            'estado'=> $this->estado
        ]);
        $this->msjedit3();
        $this->default();

    }

    public function default(){
        $this->mnombre = '';
        $this->mdireccion = '';
        $this->mcui = '';
        $this->mcel = '';
        $this->mcorreo = '';
        $this->mpass = '';
        $this->musuario = '';
        $this->mestado = '';
        $this->buscar = '';

        $this->fecha = '';
        $this->maestro_id = '';
        $this->mnombre2 = '';
        $this->curso_id = '';
        $this->estado = '';

    }


    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Maestro registrado correctamente']);
    }
    public function msjexito3(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Asignación registrada correctamente']);
    }
    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Maestro editado correctamente']);
    }

    public function msjedit3(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Asignación editada correctamente']);
    }

}
