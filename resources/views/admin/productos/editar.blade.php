@extends("theme.$theme.layout")
@section('titulo')
    Editar Producto
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
                        <h3 class="box-title"><strong>Editar Producto</strong> </h3>
                    </div>
                    <?php
                        $id=0; 
                        $area=0; 
                        $documento=0;
                        $estado=0;
                        $es_respuesta="No";
                        $requiere_respuesta="No";
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
                                    <strong>descripcion</strong>  
                                </th>
                                <td>
                                    <textarea name="descripcion" id="observacines" class="form-control" cols="10" rows="3">{{ $item->descripcion}}</textarea>
                                </td>
                                
                            </tr>
                            <?php
                                $id=$item->id; 
                            ?>
                        
                        </table>
                        
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    
                    <a href="{{route("productos")}}" class="btn btn-primary">Cancelar</a>
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


@include('admin/productos/includes/modalConfirmDelet')

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).on('ready',function(){

       
       });              
    $('#formulario').on('submit', function(e){
            e.preventDefault();
            
            var url = "{{route('productos/actualizar',$id)}}";
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

                        toastr.success( 'Producto Actualizado', 'Exito',{
                        "positionClass": "toast-top-right"});

                        setTimeout("location.href='{{route('productos')}}'",2000);  
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
        
        var url = "{{route('productos/eliminar',$id)}}";
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
                    toastr.success( 'Producto Eliminado', 'Exito',{
                    "positionClass": "toast-top-right"});
                    $("#cerrarModal").trigger('click');
                    setTimeout("location.href='{{route('productos')}}'",2000);  
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