@extends('layouts.app')

@section('content')
@if(session()->has('message_success'))
    <div class="alert alert-success">
        {{ session()->get('message_success') }}
    </div>
@endif
 @if(session()->has('message_error'))
    <div class="alert alert-danger">
        {{ session()->get('message_error') }}
    </div>
@endif
		<div class="container"> 
		
			
			<table class="table">
				<tr>
					<th>id</th>
					<th>email</th>
					<th>confirmar</th>
				</tr>
	      		@foreach($imagenes as $imagen)
	      		<tr>
	      			<td>{{$imagen->id}}</td>
	      			<td>{{$imagen->user->email}}</td>
	      			<td>
	      			@if($imagen->confirmado == 1 )
		      			<button>
		      				V
		      			</button>
	      			@else
	      			<form method="POST" action="{{ action('AdminController@confirmarFoto', $imagen->id) }}">
      					@csrf
	      				<button>	      					
	      						Confirmar
	      				</button>
	      			</form>
	      			@endif</td>
	      		</tr>
	      		@endforeach
	      	</table>
	      
      		</div>
  	</div>
@endsection