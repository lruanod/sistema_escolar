<?php

namespace App\Http\Livewire;

use App\Models\Entregatarea;
use App\Models\Estudiantearchivo;
use App\Models\Estudiantecurso;
use App\Models\Maestroarchivo;
use App\Models\Maestrocurso;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PtareaComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $entregatarea_id,$enfecha,$calificacion,$endescripcion,$tarea_id,$tarea_id2,$estudiantecurso_id,$edescripcion,$inicio,$fin,$ec_id,$curso_id;
    public $ngrado,$nnivel,$ncurso,$titulo,$punteo;
    public $eurl, $eurl2,$eurl3, $identificador3,$identificador4,$maestrocurso_id, $estudiantearchivo_id;
    public $es_id,$esc_id,$padre_id;
    public $buscar;

    public function mount($esc_id = null){
        $this->esc_id = $esc_id;
        $this->padre_id=session()->get('padre_id');

        $estudiantecursos= Estudiantecurso::join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
        join('cursos','estudiantecursos.curso_id','cursos.id')->
        join('grados','cursos.grado_id','grados.id')->
        join('nivels','grados.nivel_id','nivels.id')->
        where('estudiantecursos.id','=',$esc_id)->
        select("estudiantecursos.id as estudiantecursosid","asignaciongrados.estudiante_id as estudianteid",
            "grados.gnombre as gnombre","nivels.nnombre as nnombre","cursos.cnombre as cnombre","cursos.id as curso_id")->get();
        foreach ( $estudiantecursos as $cu){
            $this->ngrado = $cu->gnombre;
            $this->nnivel = $cu->nnombre;
            $this->estudiantecurso_id=$cu->estudiantecursosid;
            $this->ncurso =$cu->cnombre;
            $this->curso_id=$cu->curso_id;
            $this->es_id=$cu->estudianteid;
        }
        $maestroscursos= Maestrocurso::where('curso_id','=',$this->curso_id)->get();
        foreach ( $maestroscursos as $mcu){
            $this->maestrocurso_id=$mcu->id;
        }
    }

    public function getTareasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Tarea::join('maestrocursos','tareas.maestrocurso_id','maestrocursos.id')->
            join('cursos','maestrocursos.curso_id','cursos.id')->
            join('grados','cursos.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            whereBetween('tareas.ffinalizacion',array($this->inicio,$this->fin))->
            where('maestrocursos.curso_id','=',$this->curso_id)->
            select("tareas.id as tareaid","tareas.ffinalizacion",
                "tareas.fcreado","tareas.titulo","tareas.tdescripcion",
                "tareas.punteo","cursos.cnombre","grados.gnombre","nivels.nnombre")->paginate(8,['*'],'tarea');
        } else{
            return Tarea::join('maestrocursos','tareas.maestrocurso_id','maestrocursos.id')->
            join('cursos','maestrocursos.curso_id','cursos.id')->
            join('grados','cursos.grado_id','grados.id')->
            join('nivels','grados.nivel_id','nivels.id')->
            where('maestrocursos.curso_id','=',$this->curso_id)->
            orderBy("tareas.created_at", "desc")->
            select("tareas.id as tareaid","tareas.ffinalizacion",
                "tareas.fcreado","tareas.titulo","tareas.tdescripcion",
                "tareas.punteo","cursos.cnombre","grados.gnombre","nivels.nnombre")->paginate(8,['*'],'tarea');
        }

    }

    public function render()
    {
        return view('livewire.ptarea-component',[
            'tareas' => $this->getTareasProperty(),
            'maestroarchivos'=> Maestroarchivo::join('maestrocursos','maestroarchivos.maestrocurso_id','maestrocursos.id')->where('maestrocursos.curso_id','=',$this->curso_id)->get(),
            'estudiantearchivos'=> Estudiantearchivo::join('estudiantecursos','estudiantearchivos.estudiantecurso_id','estudiantecursos.id')->
            join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->
            where('estudiantecursos.curso_id','=',$this->curso_id)->
            where('asignaciongrados.estudiante_id','=',$this->es_id)->
            select("estudiantearchivos.id as idd","estudiantearchivos.eurl as eurl","estudiantearchivos.etitulo as etitulo","estudiantearchivos.entregatarea_id as entregatarea_id","estudiantearchivos.estudiantecurso_id as estudiantecurso_id","asignaciongrados.estudiante_id")->get(),
            'entregatareas'=>Entregatarea:: where('entregatareas.tarea_id','=',$this->tarea_id2)->get()

        ]);
    }
    public function asig($id){
        $tarea= Tarea::find($id);
        $this->tarea_id=$tarea->id;
        $this->titulo=$tarea->titulo;
        $this->punteo=$tarea->punteo;
    }


    public function vercali($id){
        $this->tarea_id2=$id;
    }

    public function default(){
        $this->enfecha = '';
        $this->calificacion='';
        $this->endescripcion='';
        $this->tarea_id='';
        $this->tarea_id2='';
        $this->estudiantecurso_id='';

        $this->eurl='';
        $this->entregatarea_id='';
        $this->estudiantecurso_id='';
        $this->entregatarea_id='';
        $this->fin='';
        $this->inicio='';
        $this->titulo='';
        $this->punteo='';
        $this->edescripcion='';


        $this->eurl2='';
        $this->eurl3='';
        $this->identificador3='';
        $this->identificador4='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Tarea registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Tarea editada correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Archivo eliminado correctamente']);
    }
}
