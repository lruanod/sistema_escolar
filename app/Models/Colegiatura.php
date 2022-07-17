<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegiatura extends Model
{
    protected $fillable =['monto','grado_id'];
    /***  relacion de grado solo tiene un nivel**/
    public function grado(){
        return $this->belongsTo('App\Models\Grado');
    }
}
