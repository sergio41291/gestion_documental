<?php

namespace App\Permisos\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable =[
        'nombre','slug','descripcion','acceso-ilimitado',
    ];

    public function usuarios(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permisos(){
        return $this->belongsToMany('App\Permisos\Models\Permisos')->withTimesTamps();
    }
}
