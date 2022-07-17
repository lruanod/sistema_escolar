<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable =['cliente','descuentov','total','tipo'];


    /***  relacion de productos a muchos detalles**/
    public function Ventas(){
        return $this->hasMany(
            'App\Models\Detalle');
    }
}
