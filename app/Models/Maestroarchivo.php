<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestroarchivo extends Model
{
    protected $fillable =['murl','mtitulo','tarea_id','maestrocurso_id'];

    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function tarea(){
        return $this->belongsTo('App\Models\Tarea');
    }

}
