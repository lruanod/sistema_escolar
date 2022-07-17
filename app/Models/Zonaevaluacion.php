<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonaevaluacion extends Model
{

    protected $fillable =['bimestre','zepunteo','zona_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function zona(){
        return $this->belongsTo('App\Models\Zona');
    }
}
