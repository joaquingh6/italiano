<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenesController extends Controller
{
    public function galeria()
    {
    	$fotos = Imagen::where('confirmado' , 1)->get();

        return view('galeria.index')->with('fotos' , $fotos);
    }
}
