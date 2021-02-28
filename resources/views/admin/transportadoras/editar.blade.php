@extends("theme.$theme.layout")
@section('titulo')
    Editar transportadora
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
                        <h3 class="box-title"><strong>Editar Transportadora</strong></h3>
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
                                    <strong>Razon social</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="razon_social" name="razon_social" class="form-control"  value="{{ $item->razon_social}}">
                                </td>
                            </tr>                            
                            <tr>
                                <th>
                                    <strong>Nit</strong>  
                                </th>
                                <td>
                                    <input  type="number" id="nit" name="nit" class="form-control"  value="{{ $item->nit}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Telefono</strong>  
                                </th>
                                <td>
                                    <input  type="number" id="telefono" name="telefono" class="form-control"  value="{{ $item->telefono}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Direccion</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="direccion" name="direccion" class="form-control"  value="{{ $item->direccion}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>E-mail</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="email" name="email" class="form-control"  value="{{ $item->email}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Estado</strong> 
                                </th>
                                <td>
                                    <select class="form-control " id="id_estado" name="id_estado" >
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </td>
                            </tr>

                            <?php
                                $id=$item->id; 
                                $estado=$item->id_estado;
                            ?>
                        
                        </table>
                        
                        
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    
                    <a href="{{route("transportadoras")}}" class="btn btn-primary">Cancelar</a>
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
        $("#id_estado option[value="+{{$estado}}+"]").prop('selected', true);
       
       });              
    $('#formulario').on('submit', function(e){
            e.preventDefault();
            
            var url = "{{route('transportadoras/actualizar',$id)}}";
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

                        toastr.success( 'Transportadora Actualizada', 'Exito',{
                        "positionClass": "toast-top-right"});

                        setTimeout("location.href='{{route('transportadoras')}}'",2000);  
                    }  
                             
                },
                error: function (data)
                {  
                    console.log("Error al Actualizar"); 
                    $("#list").empty();
                    var messages = data.responseJSON.errors;
                    
                        toastr.error( 'Problema al Actualizar',"error", {
                        "positionClass": "toast-top-right",
                        "extendedTimeOut": "6000"}); 
                    
                    /* console.log(data.responseJSON); */
                    /* $("#error").html(data.responseJSON.errors.remitente); */  
                }
            }); 
                
        });
    $('#confirmar').on('click', function(){
        
        var url = "{{route('transportadoras/eliminar',$id)}}";
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
                    toastr.success( 'Transportadora Eliminada', 'Exito',{
                    "positionClass": "toast-top-right"});
                    $("#cerrarModal").trigger('click');
                    setTimeout("location.href='{{route('transportadoras')}}'",2000);  
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