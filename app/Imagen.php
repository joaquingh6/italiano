<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{

	protected $table = "imagenes";
     protected $fillable = [
        'url', 'titulo', 'descripcion','user_id'
    ];

    public function votos()
    {
        return $this->hasMany('App\Voto');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
