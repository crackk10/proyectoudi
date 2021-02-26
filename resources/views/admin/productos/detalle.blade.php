@extends("theme.$theme.layout")
@section('titulo')
    Detalles
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
            @foreach ($detalle as $item) 
           
                <!-- box-tittle -->
                    <div class="box-header with-border">
                        <div class="col-lg-2">
                            @include('admin/entradas/includes/boton_regresar')
                        </div>
                        <div class="col-lg-8 text-center">
                            <h3 class="box-title">Detalles de Correspondencia</h3>
                        </div>
                    @auth
                        @if ( auth()->user()->id_area=="5")
                           <div class="col-lg-1">                            
                                <a href="{{route('entrada/editar',$item->id)}}">
                                    <h4>
                                        <i class="fa fa-edit"></i> 
                                    </h4>
                                </a>
                            </div>   
                        @endif
                    @endauth
                    @auth
                        @if ( auth()->user()->id_area=="5")
                            <div class="col-lg-1">
                                <a   data-toggle="modal" data-target="#exampleModalCenter">
                                    <h4>
                                        <i class="fa fa-trash"></i> 
                                    </h4> 
                                </a> 
                            </div>  
                        @endif
                    @endauth            
                       
                        
                    </div>
                <!-- /.box-tittle -->
                <!-- box-body -->
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr class="col-sm">
                                <th>
                                    <strong>Codigo de Entrada</strong>
                                </th>
                                <td>{{ $item->codigo_entrada }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Area Encargada</strong> 
                                </th>
                                <td>{{ $item->area}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Remitente</strong>  
                                </th>
                                <td>{{ $item->remitente}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Tipo de Documento</strong>  
                                </th>
                                <td>{{ $item->documento}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Asunto</strong> 
                                </th>
                                <td>{{ $item->asunto}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Adjunto</strong>    
                                </th>
                                <td>
                                    
                                    @if ($item->adjunto!="")
                                       <a href="{{ route('descargar/entrada', $item->id) }}" class="btn btn-sm btn-primary">Descargar</a> 
                                    @endif
                                    
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Estado</strong> 
                                </th>
                                <td>{{ $item->nombre_Estado}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Observaciones</strong>  
                                </th>
                                <td>{{ $item->observaciones}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Fecha de Entrada</strong>   
                                </th>
                                <td>{{ $item->fecha_entrada}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Fecha Limite</strong>   
                                </th>
                                <td>{{ $item->fecha_limite}}</td>
                            </tr>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <?php $id=$item->id ?>
                        </table>
                    </div>
                <!-- /.box-body -->
            @endforeach
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
@include('admin/entradas/includes/modalConfirmDelet')

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).on('ready',function(){
    $('#confirmar').on('click', function(){
        var url = "{{route('entrada/eliminar',$id)}}";
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
                    toastr.success( 'Correspondencia Eliminada', 'Exito',{
                    "positionClass": "toast-top-right"});
                }
                $("#cerrarModal").trigger('click');
                setTimeout("location.href='{{route('entrada')}}'",2000);         
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
});    
</script>
@endsection