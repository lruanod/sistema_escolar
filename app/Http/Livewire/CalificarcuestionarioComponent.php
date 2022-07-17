<?php

namespace App\Http\Livewire;

use App\Models\Cuestionario;
use App\Models\Cuestionarioestudiante;
use App\Models\Entregatarea;
use App\Models\Respuestaestudiante;
use App\Models\Venta;
use App\Models\Zona;
use Livewire\Component;
use Livewire\WithPagination;

class CalificarcuestionarioComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $cu_id,$inicio,$fin,$respuesta,$cuestionario_id;
    public $respuestaestudiante_id,$rerespuesta,$pregunta;
    public $ppunteo,$cuestionarioestudiante_id,$calificar;
    public $ngrado,$ncurso,$nnivel,$curso_id, $preguntaestudiante_id;


    public function mount($cu_id =null){
        $this->cu_id=$cu_id;
        $this->cuestionario_id=$cu_id;
        $cuestionarios = Cuestionario::where('id','=',$this->cuestionario_id)->get();
        foreach ( $cuestionarios as $cuestionario){
            $this->ngrado = $cuestionario->maestrocurso->curso->grado->gnombre;
            $this->nnivel = $cuestionario->maestrocurso->curso->grado->nivel->nnombre;
            $this->ncurso = $cuestionario->maestrocurso->curso->cnombre;
            $this->curso_id=$cuestionario->maestrocurso->curso->id;
        }
    }
    public function getRespuestaestudiantesProperty(){
        if(!empty($this->inicio)&&!empty($this->final)){
            return Respuestaestudiante::whereBetween('created_at',array($this->finicio,$this->ffinal))->where('reestado','=','Verificar')->paginate(8,['*'],'respuestaestudiante');
        } else{
            return Respuestaestudiante::orderBy("created_at", "desc")->where('reestado','=','Verificar')->paginate(8,['*'],'respuestaestudiante');
        }

    }

    public function render()
    {
        return view('livewire.calificarcuestionario-component',[
            'respuestaestudiantes' => $this->getRespuestaestudiantesProperty()
        ]);
    }

    public function calificar($idr){
        $res= Respuestaestudiante::find($idr);
        $this->respuestaestudiante_id=$res->id;
        $this->rerespuesta=$res->rerespuesta;
        $this->pregunta=$res->preguntaestudiante->pregunta->pregunta;
        $this->ppunteo=$res->preguntaestudiante->pregunta->ppunteo;
        $this->preguntaestudiante_id=$res->preguntaestudiante_id;
        $this->cuestionarioestudiante_id=$res->cuestionarioestudiante_id;
        $this->cuestionario_id=$res->cuestionario_id;
    }

    public function registrar(){
        $this->validate([
            'calificar'=> 'required|numeric|min:0'
        ]);

        $cuestionarioestudiante= Cuestionarioestudiante::find($this->cuestionarioestudiante_id);
        $acepunteo= $cuestionarioestudiante->cepunteo;
        $cuestionarioestudiante->update([
            'cepunteo'=> $this->calificar+$acepunteo
        ]);

        $respuestaestudiante= Respuestaestudiante::find($this->respuestaestudiante_id);
        $respuestaestudiante->update([
            'reestado'=> "Verificado",
            'repunteo'=> $this->calificar
        ]);

            $this->msjexito();
            $this->default();
    }
    public  function  default(){
        $this->calificar="";
    }
    public function msjexito(){
        $this->dispatchBrowserEvent('alertcalificar',['message'=>'La Respuesta calificada']);
    }
}
