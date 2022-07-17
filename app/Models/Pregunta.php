<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

    protected $fillable =['pregunta','tipo','ppunteo','cuestionario_id','maestrocurso_id'];

    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionario(){
        return $this->belongsTo('App\Models\Cuestionario');
    }

    public function preguntas(){
        return $this->hasMany('App\Models\Preguntaestudiante',);
    }
}
