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
       		
       			<div class="row">
			      	@foreach($fotos as $foto)
			      		<div class="col-3">
			      			<img src="/img/{{$foto->url}}" width="200px">
			      			<p><b>Nº de votos:</b>{{$foto->votos->count()}}</p>
			      			@if(isset(Auth::user()->id))
			      			<?php $var = false; ?>
			      			<?php $botones = 0; ?>
				      			@foreach($foto->votos as $voto)

				      				

			      					@if(Auth::user()->id == $voto->user_id)
			      						<?php $var = true; ?>
				      				@endif

						      		@if($var == true && $botones == 0)
						      			<button class="btn btn-sm btn-danger" disabled="disabled">Votar</button>
						      			<?php $botones++ ?>
						      		@endif

					      		@endforeach	
					      		@if($var == false)
					      		<form method="POST" action="{{ action('VotosController@votarFoto', $foto->id) }}">
					      			 @csrf
					      			<button class="btn btn-sm btn-danger">Votar</button>
					      		</form>
					      		@endif

					      		
					      	@else
				      			<button data-toggle="modal" data-target="#imagen-{{$foto->id}}" class="btn btn-sm btn-danger">Votar no logueado</button>
				      			@include('galeria.modal_voto',['foto' => $foto])
				      		@endif


			      		</div>
			      	@endforeach
		      	</div>
	      	</div>
        @endsection