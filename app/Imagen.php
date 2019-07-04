<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
      protected $fillable = [
        'url', 'titulo', 'descripcion','user_id'
    ];
}
