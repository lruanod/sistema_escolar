<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padresestudiante extends Model
{
    protected $fillable =['estudiante_id','padre_id'];
    /***  relacion de padre solo tiene un estudiante**/
    public function estudiante(){
        return $this->belongsTo('App\Models\Estudiante');
    }
    /***  relacion de padre solo tiene un estudiante**/
    public function padre(){
        return $this->belongsTo('App\Models\Padre');
    }
}
