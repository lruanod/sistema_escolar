<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Entrada;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class EntradaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $entrada_id,$precioe,$precioa,$stocke,$stocka,$stockt,$descripcione,$producto_id;
    public $nombre, $descripcion;
    public $buscar,$ffinal,$finicio;


    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        if(!empty($this->categoria_id)){
            return Producto::where('categoria_id','=',$this->categoria_id)->paginate(8,['*'],'producto');
        }
        else {
            return Producto::where('nombre','like',$busqueda)->paginate(8,['*'],'producto');
        }

    }

    public function getEntradasProperty(){
        if(!empty($this->finicio)&&!empty($this->ffinal)){
            return Entrada::whereBetween('created_at',array($this->finicio,$this->ffinal))->paginate(8,['*'],'entrada');
        } else{
            return Entrada::orderBy("created_at", "desc")->paginate(8,['*'],'entrada');
        }

    }

    public function  change(){
        if(!empty($this->stocke)){
            $this->stockt= $this->stocke + $this->stocka;
        } else{
            $this->stockt= '';
        }
    }

    public function detalle($id){
        $producto = Producto::find($id);
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precioa = $producto->precio;
        $this->stocka = $producto->stock;
        $this->msjexitop();
    }

    public function render()
    {
        return view('livewire.entrada-component',[
            'entradas'=>$this->getEntradasProperty(),
            'productos' => $this->getProductosProperty(),
            'categorias'=> Categoria::all()
        ]);
    }
    public function store(){
        $this->validate([
            'precioe'=> 'required|numeric|min:0',
            'precioa'=> 'required|numeric|min:0',
            'stocke'=> 'required|integer',
            'stocka'=> 'required|integer',
            'stockt'=> 'required|integer',
            'descripcione'=> 'required|string|max:1000',
            'nombre'=> 'required|string|max:75'
        ]);
        entrada::create([
            'precioe'=> $this->precioe,
            'precioa'=> $this->precioa,
            'stocke'=> $this->stocke,
            'stocka'=> $this->stocka,
            'stockt'=> $this->stockt,
            'descripcione'=> $this->descripcione,
            'producto_id'=>$this->producto_id
        ]);
        $producto= Producto::find($this->producto_id);
        $producto->update([
            'stock' => $this->stockt,
            'precio'=> $this->precioe
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $entrada= Entrada::find($id);
        $this->entrada_id=$entrada->id;
        $this->nombre = $entrada->producto->nombre;
        $this->descripcion = $entrada->producto->descripcion;
        $this->precioe = $entrada->precioe;
        $this->precioa = $entrada->precioa;
        $this->stocke = $entrada->stocke;
        $this->stocka = $entrada->stocka;
        $this->stockt = $entrada->stockt;
        $this->descripcione = $entrada->descripcione;
        $this->producto_id = $entrada->producto_id;
    }

    public function update(){
        $this->validate([
            'precioe'=> 'required|numeric|min:0',
            'precioa'=> 'required|numeric|min:0',
            'stocke'=> 'required|integer',
            'stocka'=> 'required|integer',
            'stockt'=> 'required|integer',
            'descripcione'=> 'required|string|max:1000',
            'nombre'=> 'required|string|max:75'
        ]);
        $entrada= Entrada::find($this->entrada_id);
        //regresando stock
        $producto= Producto::find($this->producto_id);
        $producto->update([
            'stock' => ($entrada->producto->stock - $entrada->stocke)
        ]);
        $entrada->update([
            'precioe'=> $this->precioe,
            'precioa'=> $this->precioa,
            'stocke'=> $this->stocke,
            'stocka'=> $this->stocka,
            'stockt'=> $this->stockt,
            'descripcione'=> $this->descripcione,
            'producto_id'=>$this->producto_id
        ]);
        // registrar stock total
        $producto->update([
            'stock' => $this->stockt,
            'precio'=> $this->precioe
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->precioe = '';
        $this->precioa='';
        $this->stocke='';
        $this->stocka='';
        $this->stockt='';
        $this->descripcione='';
        $this->producto_id='';
        $this->nombre='';
        $this->descripcion='';
        $this->buscar = '';
        $this->ffinal = '';
        $this->finicio = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Entrada de almacén registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Entrada de almacén editada correctamente']);
    }

    public function msjexitop(){
        $this->dispatchBrowserEvent('alertpp',['message'=>'Producto seleccionado']);
    }
}
