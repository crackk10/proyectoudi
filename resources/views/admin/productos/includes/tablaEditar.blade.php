<table class="table table-hover">
    <tr class="col-sm">
        <th>
            <strong>Codigo</strong>
        </th>
        <td>{{ $item->id }}</td>
    </tr>
    <tr>
        <th>
            <strong>nombre</strong>  
        </th>
        <td>
            <input  type="text" id="nombre" name="nombre" class="form-control"  value="{{ $item->nombre}}">
        </td>
    </tr>                            
    <tr>
        <th>
            <strong>Precio</strong>  
        </th>
        <td>
            <input  type="number" id="valor" name="valor" class="form-control"  value="{{ $item->valor}}">
        </td>
    </tr>
    <tr>
        <th>
            <strong>Estado</strong>  
        </th>
        <td>
            <select class="form-control " id="id_estado" name="id_estado" >
                <option value="1" >Activo</option>
                <option value="2" >Inactivo</option>   
            </select>
        </td>
    </tr>
    <tr>
        <th>
            <strong>descripcion</strong>  
        </th>
        <td>
            <textarea name="descripcion" id="observacines" class="form-control" cols="10" rows="3">{{ $item->descripcion}}</textarea>
        </td>
        
    </tr>


</table>