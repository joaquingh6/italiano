<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
	protected $table = "votos";
    protected $fillable = [
        'user_id', 'imagen_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function imagen()
    {
        return $this->belongsTo('App\Imagen');
    }
}
