<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voto;
use App\User;
use App\Imagen;
use Auth;

class AdminController extends Controller
{
    public function index(){
    	$imagenes = Imagen::all();
    	return view('admin.index')->with('imagenes' ,$imagenes);
    }

    public function confirmarFoto($foto){
    	$imagen = Imagen::find($foto);

    	$imagen->confirmado = 1;
    	$imagen->save();
    	return back()->with('message_success','Foto confirmada correctamente');
    }
}
