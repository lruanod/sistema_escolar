<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregatarea extends Model
{
    protected $fillable =['enfecha','calificacion','endescripcion','tarea_id','estudiantecurso_id','edescripcion'];
    protected $casts=[
        'enfecha'=> 'datetime:d-m-Y H:i'
    ];
    /***  relacion de asignar solo tiene un estudiante**/
    public function estudiantecurso(){
        return $this->belongsTo('App\Models\Estudiantecurso');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function tarea(){
        return $this->belongsTo('App\Models\Tarea');
    }

    /***  relacion de estudiante a muchos padres**/
    public function entregatareas(){
        return $this->hasMany('App\Models\Estudiantearchivo');
    }
}
