<!-- Modal -->
<div class="modal fade" id="imagen-{{$foto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ action('VotosController@votarFotoGuest', $foto->id) }}">
          @csrf  
          <input type="text" name="email" class="form-control" placeholder="Email">
             <div class="modal-footer">
              <button type="submit">Enviar</button>
            </div>     
        </form>
      </div>
   
    </div>
  </div>
</div>