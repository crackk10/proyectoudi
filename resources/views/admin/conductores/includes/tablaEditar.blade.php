<tr class="col-sm">
    <th>
        <strong>Codigo</strong>
    </th>
    <td>{{ $item->id }}</td>
</tr>
<tr>
    <th>
        <strong>Transportadora</strong> 
    </th>
    <td>
        <select class="form-control " id="id_transportadora" name="id_transportadora" >
        </select>
    </td>
</tr>
<tr>
    <th>
        <strong>Nombres</strong>  
    </th>
    <td>
        <input  type="text" id="nombre" name="nombre" class="form-control"  value="{{ $item->nombre}}">
    </td>
</tr>                            
<tr>
    <th>
        <strong>Apellidos</strong>  
    </th>
    <td>
        <input  type="text" id="apellido" name="apellido" class="form-control"  value="{{ $item->apellido}}">
    </td>
</tr>
<tr>
    <th>
        <strong>Tipo de Documento</strong>  
    </th>
    <td>
        <select class="form-control " id="tipo_documento" name="tipo_documento" >
            <option value="CC" >CC</option>
            <option value="CE" >CE</option>
            
        </select>
    </td>
</tr>
<tr>
    <th>
        <strong>Documento</strong>  
    </th>
    <td>
        <input  type="number" id="documento" name="documento" class="form-control"  value="{{ $item->documento}}">
    </td>
</tr>
<tr>
    <th>
        <strong>Tipo de licencia</strong>  
    </th>
    <td>
        <select class="form-control " id="tipo_licencia" name="tipo_licencia" >
            <option value="B2" >B2</option>
            <option value="B3" >B3</option>
            <option value="C3" >C3</option>
        </select>
    </td>
</tr>
<tr>
    <th>
        <strong>Estado del Conductor</strong>  
    </th>
    <td>
        <select class="form-control " id="id_estado_conductor" name="id_estado_conductor" >
            <option value="1" >Activo</option>
            <option value="2" >Inactivo</option>   
        </select>
    </td>
</tr>
<tr>
    <th>
        <strong>Telefono</strong>  
    </th>
    <td>
        <input  type="number" id="telefono" name="telefono" class="form-control"  value="{{$item->telefono}}" >
    </td>
</tr>
<tr>
    <th>
        <strong>E-mail</strong>  
    </th>
    <td>
        <input  type="email" id="email" name="email" class="form-control"  value="{{$item->email}}" >
    </td>
</tr>