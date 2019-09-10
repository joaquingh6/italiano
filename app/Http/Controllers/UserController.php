<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use App\Voto;
use App\Imagen;
use Auth;

class UserController extends Controller
{
    public function RegistrarUsuarios(Request $request){

    	 
    	$existe = User::where('email' , $request->email)->first();
    	if ($existe) {
    		$user = new User;
			 $user->name = $request->name;
			 $user->email = $request->email;
			 $user->password = bcrypt($request->password);
			 $user->save();

			 $imagen = new Imagen;
			 $extension = $request->file('imagen')->getClientOriginalExtension();
			 $file_name = $user->id .'.'.$extension;

			 Image::make($request->file('imagen'))
			  ->resize(144 , 144)
			  ->save('img/' . $file_name);
			 
			 $imagen->url = $file_name;
			 $imagen->titulo = 'prueba';
			 $imagen->descripcion = 'descripcion prueba';
			 $imagen->user_id = $user->id;
			 $imagen->save();

			 /*
			 $voto = new Voto;
			 $voto->user_id = $user->id;
			 $voto->imagen_id = $imagen->id;
			 $voto->save();
			 */
			  //filename = $temp_name;
			 return redirect('/login');
    		
    	}
    	return back()->with('message_error','Este usuario ya existe')->withInput();
		 
		    	
	}

	public function perfil(){
			$user = Auth::user();
			return view('perfil')->with('user' ,$user);
	 }

	 public function editarPerfil(Request $request , $id){

	 	$user = User::find($id);

	 	$user->name = $request->name;
	 	$user->apellidos = $request->apellidos;
	 	$user->ciudad = $request->ciudad;
	 	$user->fecha_nacimiento = $request->date;
	 	$user->numero = $request->numero;
	 	$user->email = $request->email;
	 	if($request->password){
	 		$user->password = $request->password;
	 	}
	 	$user->save();


	 	return back()->with('message_success','Perfil editado correctamente');

	 }
}
