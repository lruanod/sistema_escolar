<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable =['zestado','zona','total','aspecto','estudiantecurso_id','évaluacion'];



    /***  relacion de grado solo tiene un nivel**/
    public function estudiantecurso(){
        return $this->belongsTo('App\Models\Estudiantecurso');
    }

    /***  relacion de estudiante a muchos padres**/
    public function zonas(){
        return $this->hasMany('App\Models\Zonaevaluacion');
    }
}
