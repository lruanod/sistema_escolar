<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable =['precioe','precioa','stocke','stocka','stockt','descripcione','producto_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

}
