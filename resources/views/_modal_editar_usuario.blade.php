<!-- Modal -->
<div class="modal fade" id="user-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ action('UserController@editarPerfil', $user->id) }}">
	      @csrf  
	      <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nombre">
	      <input type="text" name="apellidos" value="{{$user->apellidos}}" class="form-control" placeholder="Apellidos">
	      <input type="password" name="password" value="" class="form-control" placeholder="Contraseña">
	      <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
	      <input type="text" name="ciudad" value="{{$user->ciudad}}" class="form-control" placeholder="Ciudad">
	      <input type="date" name="date" value="{{$user->fecha_nacimiento}}" class="form-control" placeholder="Fecha Nacimiento">
        	<input type="text" name="numero" value="{{$user->numero}}" class="form-control" placeholder="Numero">

             <div class="modal-footer">
              <button type="submit">Enviar</button>
            </div>     
        </form>
      </div>
   
    </div>
  </div>
</div>