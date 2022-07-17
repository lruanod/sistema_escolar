<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $producto_id,$nombre,$descripcion,$precio,$stock,$descuento,$estado,$categoria_id;
    public $buscar;

    public function  mount(){
        $this->categoria_id=null;
    }

    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';
        if(!empty($this->categoria_id)){
            return Producto::where('categoria_id','=',$this->categoria_id)->paginate(8,['*'],'producto');
        }
        else {
            return Producto::where('nombre','like',$busqueda)->paginate(8,['*'],'producto');
        }

    }
    public function render()
    {
        return view('livewire.producto-component',[
            'productos' => $this->getProductosProperty(),
            'categorias'=> Categoria::all()
        ]);
    }
    public function store(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'descripcion'=> 'required|string|max:500',
            'precio'=> 'required|numeric|min:0',
            'stock'=> 'required|integer',
            'descuento'=> 'required|numeric|min:0',
            'estado'=> 'required|string|max:75',
            'categoria_id'=> 'required|integer'

        ]);
        Producto::create([
            'nombre'=> $this->nombre,
            'descripcion'=> $this->descripcion,
            'precio'=> $this->precio,
            'stock'=> $this->stock,
            'descuento'=> $this->descuento,
            'estado'=> $this->estado,
            'categoria_id'=> $this->categoria_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $producto= Producto::find($id);
        $this->producto_id=$producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;
        $this->descuento = $producto->descuento;
        $this->estado = $producto->estado;
        $this->categoria_id = $producto->categoria_id;

    }

    public function update(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'descripcion'=> 'required|string|max:500',
            'precio'=> 'required|numeric|min:0',
            'stock'=> 'required|integer',
            'descuento'=> 'required|numeric|min:0',
            'estado'=> 'required|string|max:75',
            'categoria_id'=> 'required|integer'
        ]);

        $producto= Producto::find($this->producto_id);
        $producto->update([
            'nombre'=> $this->nombre,
            'descripcion'=> $this->descripcion,
            'precio'=> $this->precio,
            'stock'=> $this->stock,
            'descuento'=> $this->descuento,
            'estado'=> $this->estado,
            'categoria_id'=> $this->categoria_id
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->nombre = '';
        $this->descripcion='';
        $this->precio='';
        $this->stock='';
        $this->descuento='';
        $this->estado='';
        $this->categoria_id='';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Producto registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Producto editado correctamente']);
    }
}
