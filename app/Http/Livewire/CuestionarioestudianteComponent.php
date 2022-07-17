<?php

namespace App\Http\Livewire;

use App\Models\Administrador;
use App\Models\Cuestionario;
use App\Models\Cuestionarioestudiante;
use App\Models\Maestrocurso;
use App\Models\Pregunta;
use App\Models\Preguntaestudiante;
use App\Models\Respuesta;
use App\Models\Respuestaestudiante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CuestionarioestudianteComponent extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $cuestionario_id,$fcreado,$ffinalizacion,$titulo,$punteo, $maestrocurso_id,$inicio,$fin,$ec_id,$cestado, $cues;
    public $ngrado,$nnivel,$ncurso,$totalpunteo,$respuesta,$identificador;
    public $curso_id;
    public $pregunta_id,$pregunta,$tipo,$ppunteo;
    public $cuestionarioestudiante_id,$erespuesta,$restado;
    public $buscar, $estudiante_id;
    public $reintento, $reintentoc, $cantidadp, $preguntaestudiante_id;


    public function mount($ec_id =null){
        $this->estudiante_id=session()->get('estudiante_id');
        $this->ec_id =$ec_id;
        $this->curso_id=$ec_id;
        $cursos = Maestrocurso::where('curso_id','=',$ec_id)->get();
        foreach ( $cursos as $curso){
            $this->ngrado = $curso->curso->grado->gnombre;
            $this->nnivel = $curso->curso->grado->nivel->nnombre;
            $this->ncurso =$curso->curso->cnombre;
            $this->maestrocurso_id=$curso->id;
        }
    }
    public function getCuestionariosProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Cuestionario::join('maestrocursos','cuestionarios.maestrocurso_id','maestrocursos.id')->join('cursos','maestrocursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->whereBetween('cuestionarios.ffinalizacion',array($this->inicio,$this->fin))->where('maestrocursos.curso_id','=',$this->ec_id)->where('cuestionarios.cestado','=','Habilitado')->select("cuestionarios.id as cid","cuestionarios.ffinalizacion","cuestionarios.fcreado","cuestionarios.titulo","cuestionarios.cdescripcion","cuestionarios.cestado","cuestionarios.punteo","cursos.cnombre","grados.gnombre")->paginate(8,['*'],'cuestionario');
        } else{
            return Cuestionario::join('maestrocursos','cuestionarios.maestrocurso_id','maestrocursos.id')->join('cursos','maestrocursos.curso_id','cursos.id')->join('grados','cursos.grado_id','grados.id')->orderBy("cuestionarios.created_at", "desc")->where('maestrocursos.curso_id','=',$this->ec_id)->where('cuestionarios.cestado','=','Habilitado')->select("cuestionarios.id as cid","cuestionarios.ffinalizacion","cuestionarios.fcreado","cuestionarios.titulo","cuestionarios.cdescripcion","cuestionarios.cestado","cuestionarios.punteo","cursos.cnombre","grados.gnombre")->paginate(8,['*'],'cuestionario');
        }

    }
    public function render()
    {
        return view('livewire.cuestionarioestudiante-component',[
            'cuestionarios' => $this->getCuestionariosProperty(),
            'preguntaestudiantes'=> Preguntaestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('cuestionarioestudiante_id','=',$this->cuestionarioestudiante_id)->get(),
            'respuestas'=> Respuesta::where('maestrocurso_id','=',$this->maestrocurso_id)->where('cuestionario_id','=',$this->cuestionario_id)->get(),
            'respuestaestudiantes' =>Respuestaestudiante::where('cuestionario_id','=',$this->cuestionario_id)->get(),
            'punteos'=> Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->get(),
            'cuestionarioestudiantes' => Cuestionarioestudiante::where('id','=',$this->cuestionarioestudiante_id)->get()

        ]);
    }

    public function cuestionario($id){
        $cuestionario= Cuestionario::find($id);
        $this->cuestionario_id=$cuestionario->id;
        $this->cantidadp= $cuestionario->cantidadp;
        $this->reintentoc=$cuestionario->reintento;

        if(Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->count() > 0){
           $cuestionarioestudiantes= Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->take(1)->get();
           foreach ($cuestionarioestudiantes as $ces){
               $this->cuestionarioestudiante_id=$ces->id;
           }
        } else{
            Cuestionarioestudiante::create([
                'cefecha'=> now(),
                'cepunteo'=> 0,
                'cuestionario_id'=> $this->cuestionario_id,
                'estudiante_id'=> $this->estudiante_id,
                'reintento'=> 1,
            ]);

            $cuestionarioestudiantes= Cuestionarioestudiante::where('cuestionario_id','=',$this->cuestionario_id)->where('estudiante_id','=',$this->estudiante_id)->take(1)->get();
            foreach ($cuestionarioestudiantes as $ces){
                $this->cuestionarioestudiante_id=$ces->id;
            }

            $preguntas= Pregunta::where('cuestionario_id','=',$this->cuestionario_id)->inRandomOrder()->limit($this->cantidadp)->get();
            foreach ($preguntas as $pre){
                Preguntaestudiante::create([
                    'cuestionarioestudiante_id'=> $this->cuestionarioestudiante_id,
                    'pregunta_id'=> $pre->id,
                    'cuestionario_id'=> $this->cuestionario_id
                ]);
            }


        }
    }
    public  function  repetir($id){
        if($this->reintentoc > $id){
            if(Respuestaestudiante::where('cuestionarioestudiante_id','=',$this->cuestionarioestudiante_id)->count() > 0){
                $respuestaestudiantes= Respuestaestudiante::where('cuestionarioestudiante_id','=',$this->cuestionarioestudiante_id)->get();
                foreach ($respuestaestudiantes  as $resp){
                    Respuestaestudiante::destroy($resp->id);
                }
                $preguntaestudiantes= Preguntaestudiante::where('cuestionarioestudiante_id','=',$this->cuestionarioestudiante_id)->get();
                foreach ($preguntaestudiantes  as $resp2){
                    Preguntaestudiante::destroy($resp2->id);
                }
                $cuestionarioestudiante= Cuestionarioestudiante::find($this->cuestionarioestudiante_id);
                $this->reintento=$cuestionarioestudiante->reintento;
                $cuestionarioestudiante->update([
                    'cefecha'=> now(),
                    'reintento'=> $this->reintento +1,
                ]);
                $preguntas= Pregunta::where('cuestionario_id','=',$this->cuestionario_id)->inRandomOrder()->limit($this->cantidadp)->get();
                foreach ($preguntas as $pre){
                    Preguntaestudiante::create([
                        'cuestionarioestudiante_id'=> $this->cuestionarioestudiante_id,
                        'pregunta_id'=> $pre->id,
                        'cuestionario_id'=> $this->cuestionario_id
                    ]);
                }
           } else {
               $this->msjreintentono();
           }
        } else {
            $this->msjreintento();
        }

    }
    public function calificar($idp,$idr){
       $cuestionario=Cuestionario::find($this->cuestionario_id);
       $preguntaestudiante = Preguntaestudiante::find($idp);
       if(now() <= $cuestionario->ffinalizacion && $preguntaestudiante->cuestionarioestudiante->reintento <= $cuestionario->reintento) {
           $respuesta = Respuesta::find($idr);
           if ($respuesta->restado == "Correcta") {
               Respuestaestudiante::create([
                   'rerespuesta' => $respuesta->respuesta,
                   'reestado' => $respuesta->restado,
                   'repunteo' => $preguntaestudiante->pregunta->ppunteo,
                   'preguntaestudiante_id' => $preguntaestudiante->id,
                   'cuestionario_id' => $this->cuestionario_id,
                   'cuestionarioestudiante_id' => $this->cuestionarioestudiante_id
               ]);
               $cuestionarioestudiante = Cuestionarioestudiante::find($this->cuestionarioestudiante_id);
               $panterior = 0;
               if ($cuestionarioestudiante->cepunteo != null) {
                   $panterior = $cuestionarioestudiante->cepunteo;
               }
               $cuestionarioestudiante->update([
                   'cepunteo' => $panterior + $preguntaestudiante->pregunta->ppunteo,
               ]);
               $this->msjexito();

           } else {
               Respuestaestudiante::create([
                   'rerespuesta' => $respuesta->respuesta,
                   'reestado' => $respuesta->restado,
                   'repunteo' => 0,
                   'preguntaestudiante_id' => $preguntaestudiante->id,
                   'cuestionario_id' => $this->cuestionario_id,
                   'cuestionarioestudiante_id' => $this->cuestionarioestudiante_id
               ]);
               $this->msjdelete();
           }
       } else{
           $this->msjalerta();
       }
    }

    public function  change($idp){
        $cuestionario=Cuestionario::find($this->cuestionario_id);
        $preguntaestudiante= Preguntaestudiante::where('pregunta_id','=',$idp)->get();
        foreach ($preguntaestudiante  as $prees){
            $this->preguntaestudiante_id= $prees->id;
            $this->cuestionarioestudiante_id=$prees->cuestionarioestudiante_id;
        }

        if(now() <= $cuestionario->ffinalizacion) {
            Respuestaestudiante::create([
                'rerespuesta' => $this->erespuesta,
                'reestado' => "Verificar",
                'repunteo' => 0,
                'preguntaestudiante_id' => $this->preguntaestudiante_id,
                'cuestionario_id' => $this->cuestionario_id,
                'cuestionarioestudiante_id' => $this->cuestionarioestudiante_id
            ]);
            $this->msjverificar();

            $this->erespuesta="";
        }    else{
            $this->msjalerta();
        }
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'La Respuesta correcta']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'La Respuesta Incorrecta']);
    }
    public function msjalerta(){
        $this->dispatchBrowserEvent('alert3',['message'=>'El cuestionario esta cerrado']);
    }
    public function msjverificar(){
        $this->dispatchBrowserEvent('alert2',['message'=>'La Respuesta sera verificada']);
    }
    public function msjreintento(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Numero de reintentos ya superado']);
    }
    public function msjreintentono(){
        $this->dispatchBrowserEvent('alert3',['message'=>'No cuenta con intento anterior']);
    }
}
