<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =['nombre','descripcion','precio','stock','descuento','estado','categoria_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    /***  relacion de productos a muchos detalles**/
    public function productos(){
        return $this->hasMany(
            'App\Models\Detalle','App\Models\Entrada');
    }
}
