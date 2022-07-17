<?php

namespace App\Http\Livewire;

use App\Models\Maestrocurso;
use App\Models\Online;
use Livewire\Component;
use Livewire\WithPagination;

class EonlineComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $fecha,$ourl,$curso_id,$estado, $maestrocurso_id, $inicio,$fin,$ec_id,$identificador;
    public $ngrado,$nnivel,$ncurso;
    public $buscar;

    public function mount($ec_id =null){
        $this->ec_id =$ec_id;
        $this->curso_id=$ec_id;
    }
    public function getEonlinesProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Online::join('maestrocursos','onlines.maestrocurso_id','maestrocursos.id')->where('onlines.fecha','>=',now())->whereBetween('onlines.fecha',array($this->inicio,$this->fin))->where('maestrocursos.curso_id','=',$this->curso_id)->select("onlines.fecha", "onlines.ourl","onlines.odescripcion","onlines.estado","onlines.maestrocurso_id")->paginate(8,['*'],'online');
        } else{
            return Online::join('maestrocursos','onlines.maestrocurso_id','maestrocursos.id')->where('onlines.fecha','>=',now())->orderBy("onlines.created_at", "desc")->where('maestrocursos.curso_id','=',$this->curso_id)->select("onlines.fecha", "onlines.ourl","onlines.odescripcion","onlines.estado","onlines.maestrocurso_id")->paginate(8,['*'],'online');
        }

    }

    public function render()
    {
        return view('livewire.eonline-component',[
            'onlines' => $this->getEonlinesProperty()
        ]);
    }
}
