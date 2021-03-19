@extends("theme.$theme.layout")
@section('titulo')
    Editar Conductor
@endsection

@section('metadata')
    <meta name="csrf-token" content="{{csrf_token()}}"/>    
@endsection

@section('contenido')
<style>
    table{
    table-layout: fixed;
    width: 250px;
}

    th, td {
    border: 1px ;
    word-wrap: break-word;
    text-align: left;
}
</style>
<div class="row">
    <div class="col-lg-12">

        <div class="box box-danger">
            <!-- box-tittle -->
                
                <div class="box-header with-border">
                    {{-- boton regresar --}}
                    <div class="col-lg-2">
                        <a href="{{ URL::previous() }}" >
                            <h4>
                                <i class="fa fa-arrow-left"></i> 
                            </h4>
                            
                        </a>
                    </div>
                    {{-- /boton regresar --}}
                    <div class="col-lg-8 text-center">
                        <h3 class="box-title"><strong>Editar Conductor</strong></h3>
                    </div>
                    <?php
                        $id=0; 
                        $estado=0;
                        $id_transportadora=0;
                        
                        $id_estado=0;
                        $tipo_documento=0;
                        $tipo_licencia=0;
                        
                    ?>
                    @foreach ($detalle as $item) 

                    {{-- boton eliminar --}}
                    <div class="col-lg-1">
                        <!-- Button trigger modal -->
                        <a data-toggle="modal" data-target="#exampleModalCenter">
                            <h4>
                                <i class="fa fa-trash"></i> 
                            </h4> 
                        </a>  
                    </div>
                    {{-- /boton eliminar --}}   
                </div>
            <!-- /.box-tittle -->
            <!-- box-body -->
                <div class="box-body">
                   <form id="formulario" >
                        <table class="table table-hover">
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


                           
                        
                        </table>
                        
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    
                    <a href="{{route("conductores")}}" class="btn btn-primary">Cancelar</a>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    
                    
                    
                    </form>
                    <?php
                    $id=$item->id; 
                    $id_transportadora=$item->id_transportadora;
                    $estado_transportadora=$item->id_estado;
                    $id_estado=$item->id_estado_conductor;

                    $tipo_documento=$item->tipo_documento;
                    $tipo_licencia=$item->tipo_licencia;
                    ?>
                    @endforeach
                </div>
                <!-- /.box-body -->

            <!-- box-footer -->
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                            
                    </div>
                </div>
            <!-- /.box-footer -->
           
        </div>       
    </div>
</div>  


@include('admin/transportadoras/includes/modalConfirmDelet')

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).on('ready',function(){
      //agregar transportadora al select
        $.ajax({
        type: "get",
        url: "{{route('conductores/transportadora')}}",
        data: "formdata",
        dataType: "json",
        success: function (data) {
            $('#id_transportadora').html('');
            $.each(data, function (indexInArray, valueOfElement) { 
                if (valueOfElement.id_estado!=2) {
                        $("#id_transportadora").append("<option value="+valueOfElement.id+">"+valueOfElement.razon_social+"</option>"); 
                /* console.log(valueOfElement.id_estado) */
                }
            }); 
       
       //seleccionar la transportadora
        
        $("#id_transportadora option[value="+{{$id_transportadora}}+"]").prop('selected', true); 
             
       
       //seleccionar la transportadora 
        }
        
        });
      //agregar transportadora al select fin

      //alerta de contrato con la transportadora
        if ({{$estado_transportadora}}!=1) {
            toastr.warning( 'La transportadora actual del conductor esta inactiva', 'Advertencia',{
                "positionClass": "toast-top-right"});
                $("#cerrarModal").trigger('click');
        } 
      //alerta de contrato con la transportadora fin  
      var tipo_licencia= '{{$tipo_licencia}}';
      var tipo_documento= '{{$tipo_documento}}';
        $("#id_estado_conductor option[value="+{{$id_estado}}+"]").prop('selected', true);
        $("#tipo_licencia option[value="+ tipo_licencia +"]").attr("selected",true);
        
        $("#tipo_documento option[value="+tipo_documento+"]").prop('selected', true);

      
    });              
    $('#formulario').on('submit', function(e){
        e.preventDefault();
        
        var url = "{{route('conductores/actualizar',$id)}}";
        var token = $("#token").val();
        
        $.ajax({                        
            type: "PUT",
            headers: {'X-CSRF-TOKEN':token},                
            url: url, 
            dataType: 'json',                   
            data: $("#formulario").serialize(),
            success: function(data)            
            {   if (data.success=='true') 
                {
                    console.log("Actualizado exitosamente");

                    toastr.success( 'Conductor Actualizado', 'Exito',{
                    "positionClass": "toast-top-right"});

                    setTimeout("location.href='{{route('conductores')}}'",2000);  
                }  
                            
            },
            error: function (data)
            {  
                console.log("Error al Actualizar"); 
                $("#list").val('');
                var messages = data.responseJSON.errors;
                $.each(messages, function(index, val) {
                toastr.error( val, 'Problema al Actualizar',{
                "positionClass": "toast-top-right",
                "extendedTimeOut": "6000"})   
                });
                
                /* console.log(data.responseJSON); */
                /* $("#error").html(data.responseJSON.errors.remitente); */  
            }
        }); 
                
    });
    $('#confirmar').on('click', function(){
        
        var url = "{{route('conductores/eliminar',$id)}}";
        var token = $("#token").val();
        
        $.ajax({                        
            type: "DELETE",
            headers: {'X-CSRF-TOKEN':token},                
            url: url, 
            dataType: 'json',                   
            success: function(data)            
            {   if (data.success=='true') 
                {   
                    console.log("Eliminado exitosamente");
                    toastr.success( 'Conductor Eliminado', 'Exito',{
                    "positionClass": "toast-top-right"});
                    $("#cerrarModal").trigger('click');
                    setTimeout("location.href='{{route('conductores')}}'",2000);  
                }
            },
            error: function (data)
            {  
                console.log("Error al Eliminar"); 
                

                    toastr.error( 'Problema al Eliminar',"Error", {
                    "positionClass": "toast-top-right",
                    "extendedTimeOut": "6000"}) 
               
                /* console.log(data); */
                /* $("#error").html(data.responseJSON.errors.remitente); */  
            }
        }); 
            
    });   
</script>

@endsection