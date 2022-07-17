<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable =['iurl','galeria_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function galeria(){
        return $this->belongsTo('App\Models\Galeria');
    }

}
