<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionarioestudiante extends Model
{
    protected $fillable =['cefecha','cepunteo','cuestionario_id','estudiante_id','reintento'];
    protected $casts=[
        'cefecha'=> 'datetime:d-m-Y H:i'
    ];


    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionario(){
        return $this->belongsTo('App\Models\Cuestionario');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante');
    }

    /***  relacion de estudiante a muchos padres**/
    public function cuestionarioestudiantes(){
        return $this->hasMany('App\Models\Preguntaestudiante','App\Models\Respuestaestudiante');
    }
}
