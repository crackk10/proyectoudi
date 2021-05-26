<button type="button" class="btn btn-secondary" id="cerrarModal" data-dismiss="modal">Cancelar</button>
<button type="button" class="btn btn-primary" id="editar">Editar</button>

@auth
    @if ( auth()->user()->tipo_usuario=="2"&&  auth()->user()->id_estado=="1")
        <button type="button" class="btn btn-danger" id="eliminar" onclick="PromptEliminar()" >
            Eliminar
        </button>
    @endif
@endauth

