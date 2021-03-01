@extends("theme.$theme.layout")
@section('titulo')
    Editar Vehiculo
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
                        <h3 class="box-title"><strong>Editar Vehiculo</strong></h3>
                    </div>
                    <?php
                        $id=0; 
                        $estado=0;
                        
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
                   <form id="formulario">
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
                                    <strong>Placa</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="placa" name="placa" class="form-control"  value="{{ $item->placa}}">
                                </td>
                            </tr>                            
                            <tr>
                                <th>
                                    <strong>Remolque</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="remolque" name="remolque" class="form-control"  value="{{ $item->remolque}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Capacidad</strong>  
                                </th>
                                <td>
                                    <input  type="number" id="capacidad" name="capacidad" class="form-control"  value="{{ $item->capacidad}}">
                                </td>
                            </tr>
                        


                            <?php
                                $id=$item->id; 
                                $id_transportadora=$item->id_transportadora;
                                $estado_transportadora=$item->id_estado;
                            ?>
                        
                        </table>
                        
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    
                    <a href="{{route("vehiculos")}}" class="btn btn-primary">Cancelar</a>
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                    
                    
                    
                    </form>
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
        url: "{{route('vehiculos/transportadora')}}",
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
            toastr.warning( 'La transportadora actual del vehiculo esta inactiva', 'Advertencia',{
                "positionClass": "toast-top-right"});
                $("#cerrarModal").trigger('click');
        } 
      //alerta de contrato con la transportadora fin     
    
    });              
    $('#formulario').on('submit', function(e){
        e.preventDefault();
        
        var url = "{{route('vehiculos/actualizar',$id)}}";
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

                    toastr.success( 'Vehiculo Actualizado', 'Exito',{
                    "positionClass": "toast-top-right"});

                    setTimeout("location.href='{{route('vehiculos')}}'",2000);  
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
        
        var url = "{{route('vehiculos/eliminar',$id)}}";
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
                    toastr.success( 'Vehiculo Eliminado', 'Exito',{
                    "positionClass": "toast-top-right"});
                    $("#cerrarModal").trigger('click');
                    setTimeout("location.href='{{route('vehiculos')}}'",2000);  
                }
            },
            error: function (data)
            {  
                console.log("Error al Eliminar"); 
                

                    toastr.error( 'Problema al Eliminar',"Error", {
                    "positionClass": "toast-top-right",
                    "extendedTimeOut": "6000"}) 
               
                /* console.log(data.responseJSON); */
                /* $("#error").html(data.responseJSON.errors.remitente); */  
            }
        }); 
            
    });   
</script>

@endsection