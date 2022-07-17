<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable =['mes','ngrado','nivel','abono','cfecha','asignaciongrado_id'];
    /***  relacion de padre solo tiene un estudiante**/
    public function asignaciongrado(){
        return $this->belongsTo('App\Models\Asignaciongrado');
    }


}
