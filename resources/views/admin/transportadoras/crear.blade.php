@extends("theme.$theme.layout")
@section('titulo')
    Registro de transportadoras
@endsection

@section('metadata'){{-- estilos de plugin fileinput --}}
    <meta name="csrf-token" content="{{csrf_token()}}"/>    
@endsection

@section('scriptsPlugins')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('scripts')
     
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <!-- box-tittle -->
                <div class="box-header with-border">
                    <div class="col-lg-3">
                        @include('admin/transportadoras/includes/boton_regresar')
                    </div>
                    <h3 class="box-title"><strong>Registro de Transportadoras</strong></h3>  
                </div>
            <!-- /.box-tittle -->
            <!-- box-body -->
                <div class="box-body">
                <form class="form-horizontal"  id="formulario"  autocomplete="off" enctype="multipart/form-data">
                                        
                    @include('admin/transportadoras/includes/form')
                </div>
            <!-- /.box-body -->
            <!-- box-footer -->
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                            @include('includes.boton_form_crear')
                    </div>
                </div>
            <!-- /.box-footer -->
            </form>
        </div>       
    </div>
</div>   

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).on('ready',function(){
           
    });
    /* registro del formulario */
    $('#formulario').on('submit', function(e){
        e.preventDefault();
        var formulario = $('#formulario')[0];
        var formData = new FormData(formulario);
        var url = "{{route('transportadoras/guardar')}}"; 
        var token = $("#token").val();
       
        $.ajax({                        
            type: "post",
            headers: {'X-CSRF-TOKEN':token},                
            url: url,
            cache:false,
            contentType: false,
            processData: false, 
           /*  dataType: 'json',   */                 
            data: formData,
            success: function(data)            
            {   if (data.success=='true') 
                {
                    console.log("guardo exitosamente");
                    
                    toastr.success( 'Transportadora Agregada', 'Exito',{
                    "positionClass": "toast-top-right"})
                }  
                $("#cerrarModal").trigger('click')         
            },
            error: function (data)
            {  
                console.log("Error al guardar"); 
                $("#list").val('');
                var messages = data.responseJSON.errors;
                $.each(messages, function(index, val) {
                    toastr.error( val, 'Problema al Guardar',{
                    "positionClass": "toast-top-right",
                    "extendedTimeOut": "6000"})   
                });
                console.log(data.responseJSON.errors);
                /* $("#error").html(data.responseJSON.errors.remitente); */   
            }
        }); 
                
    });
    /* codigo de registro */  
</script>
@endsection