<!-- Button trigger modal -->
<div style="display:  none">
    <button id="btn_modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
</div>
  
  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalDetalle">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" id="headerModalEvento">
          <h5 class="modal-title" id="tituloEvento">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="descripcionEvento"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="javascript:window.print()" >Imprimir</button>
        </div>
      </div>
    </div>
  </div>
