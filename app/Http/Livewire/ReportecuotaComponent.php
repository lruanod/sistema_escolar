<?php

namespace App\Http\Livewire;

use App\Models\Asignaciongrado;
use App\Models\Ciclo;
use App\Models\Cuota;
use App\Models\Grado;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class ReportecuotaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public  $finicio,$ffinal, $grado_id, $estudiante_id,$enombre, $asignargrado_id, $ciclo_id;
    public $buscar;


    public function getAsignarsProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Asignaciongrado::join('estudiantes','asignaciongrados.estudiante_id','estudiantes.id')->
        join('grados','asignaciongrados.grado_id','grados.id')->
        join('nivels','grados.nivel_id','nivels.id')->
        where('asignaciongrados.estado','=','Habilitado')->where('estudiantes.enombre','like',$busqueda)->orwhere('grados.gnombre','like',$busqueda)->
        select("asignaciongrados.id","estudiantes.enombre","estudiantes.edireccion","estudiantes.ecui","grados.gnombre","grados.gseccion","nivels.nnombre","asignaciongrados.estado")->paginate(8,['*'],'asignaciongrado');
    }

    public function render()
    {
        return view('livewire.reportecuota-component',[
            'grados'=>Grado::all(),
            'asignars'=> $this->getAsignarsProperty(),
            'ciclos'=>Ciclo::all()

        ]);
    }

    public function busquedae($id){
        $asignaciongrado = Asignaciongrado::find($id);
        $this->asignargrado_id=$id;
        $this->estudiante_id =$asignaciongrado->estudiante_id;
        $this->enombre=$asignaciongrado->estudiante->enombre;
        $this->grado_id=$asignaciongrado->grado_id;
        $this->ciclo_id=$asignaciongrado->ciclo_id;
        $this->msjexitop();
    }


    public function Generarpdf(){
        $this->validate([
            'finicio'=> 'required',
            'ffinal'=> 'required'
        ]);

        if(!empty($this->asignargrado_id) && empty($this->grado_id) && empty($this->ciclo_id)){
            $cuotas = Cuota::where('asignaciongrado_id', '=', $this->asignargrado_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }
        if(!empty($this->grado_id) && empty($this->estudiante_id) && empty($this->ciclo_id) ){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.grado_id', '=', $this->grado_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }
        if(!empty($this->ciclo_id) && empty($this->estudiante_id) && empty($this->grado_id) ){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.ciclo_id', '=', $this->ciclo_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }

        if(!empty($this->asignargrado_id) && !empty($this->grado_id) && empty($this->ciclo_id)){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.id', '=', $this->asignargrado_id)->where('asignaciongrados.grado_id', '=', $this->grado_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }
        if(!empty($this->asignargrado_id) && !empty($this->ciclo_id) && empty($this->grado_id)){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.id', '=', $this->asignargrado_id)->where('asignaciongrados.ciclo_id', '=', $this->ciclo_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }

        if(empty($this->asignargrado_id) && !empty($this->ciclo_id) && !empty($this->grado_id)){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('asignaciongrados.ciclo_id', '=', $this->ciclo_id)->where('asignaciongrados.grado_id', '=', $this->grado_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }
        if(!empty($this->asignargrado_id) && !empty($this->ciclo_id) && !empty($this->grado_id)){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->where('cuotas.asignaciongrado_id', '=', $this->asignargrado_id)->where('asignaciongrados.ciclo_id', '=', $this->ciclo_id)->where('asignaciongrados.grado_id', '=', $this->grado_id)->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }

        if(empty($this->asignargrado_id) && empty($this->ciclo_id) && empty($this->grado_id)){
            $cuotas = Cuota::join('asignaciongrados','cuotas.asignaciongrado_id','asignaciongrados.id')->whereBetween('cuotas.cfecha',array($this->finicio,$this->ffinal))->orderBy('cuotas.asignaciongrado_id')->get();
        }

        if ($cuotas->count()>=1){
          //  $cuotas->orderBy('cuotas.asignaciongrado_id');
            $this->default();
            $this->msjexitopdf();
            $this->resetPage();
            $this->redirect('/reportecuotas');
            $inicio= $this->finicio;
            $final = $this->ffinal;
            $total=$cuotas->sum('abono');
            $pdf = PDF::loadView('livewire.reportecuotas.reportepdf', compact('cuotas','final','inicio','total'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                function () use ($pdf){
                    echo $pdf;
                }, 'Reporte_abonos'.now().'.pdf');

        } else  {
            $this->msjedit();
            $this->default();
        }


    }


    public function default(){
        $this->ffinal='';
        $this->finicio='';
        $this->enombre='';
        $this->asignargrado_id='';
        $this->ciclo_id='';
        $this->grado_id='';
    }



    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alertpdf',['message'=>'PDF generado']);
    }

    public function msjexitop(){
        $this->dispatchBrowserEvent('alertpp',['message'=>'Estudiante seleccionado']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'No hay registros']);
    }

}
