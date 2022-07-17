<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable =['respuesta','restado','pregunta_id','maestrocurso_id','cuestionario_id'];

    /***  relacion de asignar solo tiene un estudiante**/
    public function maestrocurso(){
        return $this->belongsTo('App\Models\Maestrocurso');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function pregunta(){
        return $this->belongsTo('App\Models\Pregunta');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function cuestionario(){
        return $this->belongsTo('App\Models\Cuestionario');
    }
}
