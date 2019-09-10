@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     @if (session('message_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message_success') }}
                        </div>
                    @endif

                   	<table class="table">
                   		<tr>
                   			<th>Nombre</th>
                   			<td>{{$user->name}}</td>
                   			<td><button data-toggle="modal" data-target="#user-{{$user->id}}" class="btn btn-sm btn-danger">Editar</button></td>
                   		</tr>
                   		<tr>
                   			<th>Email</th>
                   			<td>{{$user->email}}</td>
                   		</tr>
                   		<tr>
                   			<th>Ciudad</th>
                   			<td>{{$user->ciudad}}</td>
                   		</tr>
                   		<tr>
                   			<th>Fecha Nacimiento</th>
                   			<td>{{$user->fecha_nacimiento}}</td>
                   		</tr>
                   		<tr>
                   			<th>Telefono</th>
                   			<td>{{$user->numero}}</td>
                   		</tr>
                   	</table>
                   	@include('_modal_editar_usuario',['user' => $user])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
