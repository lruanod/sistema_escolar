<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable =['preciod','cantidad','descuentod','subtotal','producto_id','venta_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    /***  relacion de grado solo tiene un nivel**/
    public function venta(){
        return $this->belongsTo('App\Models\Venta');
    }

}
