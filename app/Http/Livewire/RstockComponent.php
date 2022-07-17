<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class RstockComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public  $categoria_id, $producto_id,$nombre;
    public $buscar;


    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Producto::where('nombre','like',$busqueda)->orwhere('categoria_id','like',$busqueda)->paginate(8,['*'],'producto');
    }

    public function render()
    {
        $busqueda= $this->buscar;
        return view('livewire.rstock-component',[
            'categorias'=>Categoria::all(),
            'productos'=> $this->getProductosProperty()

        ]);
    }

    public function busquedap($id){
        $producto = Producto::find($id);
        $this->producto_id =$producto->id;
        $this->nombre=$producto->nombre;
        $this->msjexitop();
    }


    public function Generarpdf(){
        if(!empty($this->producto_id) && empty($this->categoria_id)){
            $productos = Producto::where('id', '=', $this->producto_id)->get();
        }
        if(!empty($this->categoria_id) && empty($this->producto_id) ){
            $productos = Producto::where('categoria_id', '=', $this->categoria_id)->get();
        }
        if(!empty($this->categoria_id) && !empty($this->producto_id) ){
            $productos = Producto::where('categoria_id', '=', $this->categoria_id)->where('id','=',$this->producto_id)->get();
        }
        if(empty($this->categoria_id) && empty($this->producto_id)){
            $productos=  Producto::all();
        }

        $this->default();
        $this->msjexitopdf();
        $this->resetPage();
        $this->redirect('/rstocks');
        $pdf = PDF::loadView('livewire.rstocks.reportepdf', compact('productos'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'Reporte_Stock_'.now().'.pdf');

    }


    public function default(){
        $this->nombre='';
        $this->producto_id='';
        $this->categoria_id='';
    }



    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alertpdf',['message'=>'PDF generado']);
    }


    public function msjexitop(){
        $this->dispatchBrowserEvent('alertpp',['message'=>'Producto seleccionado']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'No hay registros']);
    }
}
