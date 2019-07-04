<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $fillable = [
        'user_id', 'imagen_id'
    ];
}
