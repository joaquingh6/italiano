<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Imagen extends Model
{

	protected $table = "imagenes";
     protected $fillable = [
        'url', 'titulo', 'descripcion','user_id','confirmado'
    ];

    public function votos()
    {
        return $this->hasMany('App\Voto');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function votar(){

         $voto = new Voto;
         $voto->user_id = Auth::user()->id;
         $voto->imagen_id = $this->id;
         $voto->save();
    }
}
