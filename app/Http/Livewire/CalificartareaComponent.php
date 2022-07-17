<?php

namespace App\Http\Livewire;

use App\Models\Cuestionario;
use App\Models\Cuestionarioestudiante;
use App\Models\Entregatarea;
use App\Models\Estudiantearchivo;
use App\Models\Maestroarchivo;
use App\Models\Respuestaestudiante;
use App\Models\Tarea;
use Livewire\Component;
use Livewire\WithPagination;

class CalificartareaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $inicio,$fin,$ta_id,$curso_id;
    public $ngrado,$nnivel,$ncurso;
    public $tarea_id,$titulo, $punteo;
    public $buscar;
    public $entregatarea_id, $calificacion, $endescripcion;


    public function mount($ta_id =null){
        $this->tarea_id =$ta_id;
        $entregatareas = Entregatarea::where('tarea_id','=',$ta_id)->get();
        foreach ( $entregatareas as $etarea){
            $this->ngrado = $etarea->estudiantecurso->curso->grado->gnombre;
            $this->nnivel = $etarea->estudiantecurso->curso->grado->nivel->nnombre;
            $this->ncurso =$etarea->estudiantecurso->curso->cnombre;
            $this->curso_id=$etarea->estudiantecurso->curso->id;
        }
    }
    public function getEntregatareaProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Entregatarea::join('tareas','entregatareas.tarea_id','tareas.id')->join('estudiantecursos','entregatareas.estudiantecurso_id','estudiantecursos.id')->join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->join('cursos','estudiantecursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->whereBetween('entregatareas.enfecha',array($this->inicio,$this->fin))->where('entregatareas.tarea_id','=',$this->tarea_id)->paginate(8,['*'],'entregatarea');
        } else{
            return Entregatarea::join('tareas','entregatareas.tarea_id','tareas.id')->join('estudiantecursos','entregatareas.estudiantecurso_id','estudiantecursos.id')->join('asignaciongrados','estudiantecursos.asignaciongrado_id','asignaciongrados.id')->join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->join('cursos','estudiantecursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->where('entregatareas.tarea_id','=',$this->tarea_id)->select("entregatareas.id as iden","tareas.ffinalizacion","tareas.fcreado","tareas.tdescripcion","tareas.punteo","tareas.titulo","cursos.cnombre","grados.gnombre","estudiantes.enombre","entregatareas.tarea_id","tareas.id as idta","entregatareas.calificacion")->paginate(8,['*'],'entregatarea');
        }

    }
    public function render()
    {
        return view('livewire.calificartarea-component',[
            'entregatareas' => $this->getEntregatareaProperty(),
            'maestroarchivos'=> Maestroarchivo::where('tarea_id','=',$this->tarea_id)->get(),
            'estudiantearchivos'=> Estudiantearchivo::join('entregatareas','estudiantearchivos.entregatarea_id','entregatareas.id')->where('entregatareas.tarea_id','=',$this->tarea_id)->get()
        ]);
    }

    public function calificar($id){
        $entregatarea= Entregatarea::find($id);
        $this->entregatarea_id=$entregatarea->id;
        $this->titulo=$entregatarea->tarea->titulo;
        $this->punteo=$entregatarea->tarea->punteo;
        $this->calificacion=$entregatarea->calificacion;
        $this->endescripcion=$entregatarea->endescripcion;
    }

    public function registrar(){
        $this->validate([
            'calificacion'=> 'required|numeric|min:0',
            'endescripcion'=> 'required|string|max:500',
        ]);
        $entregatarea= Entregatarea::find($this->entregatarea_id);;
        $entregatarea->update([
            'calificacion'=> $this->calificacion,
            'endescripcion'=> $this->endescripcion
        ]);

        $this->msjexito();
        $this->default();
    }
    public  function  default(){
        $this->calificacion="";
        $this->endescripcion="";
    }
    public function msjexito(){
        $this->dispatchBrowserEvent('alertcalificar',['message'=>'Tarea calificada']);
    }
}
