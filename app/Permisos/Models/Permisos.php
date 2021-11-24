<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $fillable =[
        'nombre','slug','descripcion',
    ];
    
    public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Roles')->withTimesTamps();
    }
}
