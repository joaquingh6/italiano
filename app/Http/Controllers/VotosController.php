<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Voto;
use App\User;
use Illuminate\Support\Facades\Mail;
class VotosController extends Controller
{
    public function votarFoto($foto_id)
    {
    	$user = Auth::user();

    	$existe = Voto::where('user_id' ,$user->id)->where('imagen_id',$foto_id)->first();
    	if ($existe) {
    		return back()->with('message_error','Este usuario ya ha votado a esta foto');
    	}else{
    		$voto = new Voto;
			$voto->imagen_id = $foto_id;
			$voto->user_id = $user->id;
			$voto->save();

			return back()->with('message_success','Voto realizado correctamente');
    	}
    	
    }
    public function votarFotoGuest(Request $request , $foto_id)
    {
        $user = User::where('email',$request->email)->first();
        if ($user) {

            $existe = Voto::where('user_id' ,$user->id)->where('imagen_id',$foto_id)->first();
            if ($existe) {
                return back()->with('message_error','Este usuario ya ha votado a esta foto');
            }else{
                $voto = new Voto;
                $voto->imagen_id = $foto_id;
                $voto->user_id = $user->id;
                $voto->save();
                return back()->with('message_success','Voto realizado correctamente');
            }
            
        }else{

            $new_user = new User;
            $new_user->name = 'nombre';
            $new_user->email = $request->email;
            $new_user->password = bcrypt('123456');
            $new_user->save();

            $voto = new Voto;
            $voto->imagen_id = $foto_id;
            $voto->user_id = $new_user->id;
            $voto->save();
            $data =array('email' => $request->email);
            $for = 

            $subject = "Contraseña de prueba";
            $for = $request->email;
            Mail::send('emails.welcome',$request->all(), function($msj) use($subject,$for){
                $msj->from("joaquingh10@gmail.com","Joaquin Garcia");
                $msj->subject($subject);
                $msj->to($for);
            });



            return back()->with('message_success','Voto realizado correctamente');
        }
    }
}
