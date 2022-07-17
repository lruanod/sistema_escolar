<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Cuota;
use App\Models\Mensualidad;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class CuotaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $cuota_id,$mes,$grado,$nivel,$abono,$cfecha,$estudiante_id,$grado_id,$enombre,$asignaciongrado_id;
    public $inicio,$fin,$buscar;


    public function getCuotasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Cuota::whereBetween('cfecha',array($this->inicio,$this->fin))->paginate(8,['*'],'cuota');
        } else{
            return Cuota::orderBy("created_at", "desc")->paginate(8,['*'],'cuota');
        }

    }
    public function getAsignarsProperty(){
        $busqueda='%'.$this->buscar.'%';
       // return Asignaciongrado::simplePaginate(8);
        return Asignaciongrado::join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
        join('grados','asignaciongrados.grado_id','grados.id')->
        join('nivels','grados.nivel_id','nivels.id')->
        where('asignaciongrados.estado','=','Habilitado')->where('estudiantes.enombre','like',$busqueda)->
        select("asignaciongrados.id","estudiantes.enombre","estudiantes.edireccion","estudiantes.ecui","grados.gnombre","grados.gseccion","nivels.nnombre","asignaciongrados.estado")->paginate(8,['*'],'asignaciongrado');
    }
    public function render()
    {
        return view('livewire.cuota-component',[
            'cuotas' => $this->getCuotasProperty(),
            'asignars'=> $this->getAsignarsProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'mes'=> 'required|string|max:45',
            'grado'=> 'required|string|max:45',
            'nivel'=> 'required|string|max:45',
            'abono'=> 'required|numeric|min:0',
            'enombre'=> 'required|string|max:45',
            'asignaciongrado_id'=> 'required|integer',
        ]);

        Cuota::create([
            'mes'=> $this->mes,
            'ngrado'=> $this->grado,
            'nivel'=> $this->nivel,
            'abono'=> $this->abono,
            'cfecha'=> now(),
            'asignaciongrado_id'=>  $this->asignaciongrado_id
        ]);

        $cuotas= Cuota::where('asignaciongrado_id','=',$this->asignaciongrado_id)->orderBy('id','desc')->take(1)->get();
        $this->msjexito();
        $this->default();
        $this->redirect('/cuotas');
        $pdf = PDF::loadView('livewire.cuotas.boletapago', compact('cuotas'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'BoletaPago '.now().'.pdf');
    }

    public function edit($id){
        $cuota= Cuota::find($id);
        $this->cuota_id = $cuota->id;
        $this->mes = $cuota->mes;
        $this->grado = $cuota->ngrado;
        $this->nivel = $cuota->nivel;
        $this->abono = $cuota->abono;
        $this->cfecha = $cuota->cfecha;
        $this->asignaciongrado_id = $cuota->asignaciongrado_id;
        $this->enombre=$cuota->estudiante->enombre;
    }

    public function update(){
        $this->validate([
            'mes'=> 'required|string|max:45',
            'grado'=> 'required|string|max:45',
            'nivel'=> 'required|string|max:45',
            'abono'=> 'required|numeric|min:0',
            'enombre'=> 'required|string|max:45',
            'asignaciongrado_id'=> 'required|integer'
        ]);

        $cuota= Cuota::find($this->cuota_id);
        $cuota->update([
            'mes'=> $this->mes,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function addestudiante($id){
        $asig=Asignaciongrado::find($id);
        $this->asignaciongrado_id=$id;
        $this->enombre=$asig->estudiante->enombre;
        $this->grado=$asig->grado->gnombre;
        $this->nivel=$asig->grado->nivel->nnombre;
        $this->abono=$asig->grado->monto;
    }

    public function default(){
        $this->mes = '';
        $this->grado = '';
        $this->nivel = '';
        $this->abono = '';
        $this->cfecha = '';
        $this->estudiante_id = '';
        $this->asignaciongrado_id='';
        $this->enombre = '';
        $this->inicio = '';
        $this->fin = '';
        $this->buscar='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Cuota registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Cuota editada correctamente']);
    }
}
