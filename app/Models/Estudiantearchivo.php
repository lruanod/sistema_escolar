<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantearchivo extends Model
{
    protected $fillable =['eurl','etitulo','entregatarea_id','estudiantecurso_id'];

    /***  relacion de asignar solo tiene un estudiante**/
    public function estudiantecurso(){
        return $this->belongsTo('App\Models\Asignaciongrado');
    }

    /***  relacion de asignar solo tiene un estudiante**/
    public function entregatarea(){
        return $this->belongsTo('App\Models\Entregatarea');
    }
}
