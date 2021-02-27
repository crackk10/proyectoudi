@extends("theme.$theme.layout")
@section('titulo')
Correspondencia de Entrada
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">

        <div class="box box-danger">
            <!-- box-tittle -->
                <div class="box-header with-border">
                    <div class="col-lg-12"> @include('admin/productos/includes/selectFiltro')</div>
                    
                </div>
            <!-- /.box-tittle -->  
            <!-- box-body -->
                <div class="box-body">
                    <div id="datos"></div>
                </div>
            <!-- /.box-body -->
            <!-- box-footer -->
                <div class="box-footer">
                    <div class="col-lg-6">
                    @auth
                        @if ( auth()->user()->tipo_usuario=="2")
                            <a class="btn btn-primary"href="{{route('productos.crear')}}">Nuevo Producto</a>   
                        @endif
                    @endauth
                    
                    </div>
                </div>
            <!-- /.box-footer -->  
        </div>       
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
    $(document).on('ready',function(){
        
           
    });
    $("#formulario").on('submit',function (e) {
        e.preventDefault();
       
    });
    /* buscar */
    $("#buscar").keyup(function (evento) {
        var url = "{{route('productos.listar')}}";
        $.ajax({
            type: "get",
            url: url,
            data: $("#formulario").serialize(),
            success: function(data) 
            {
                $('#datos').empty().html(data); 
            },
        });
    });
    /* cambio de area */
    $('#filtro').on('change',function(){   
        var url = "{{route('productos.listar')}}";                                 
        $.ajax({                        
                type: "get",                 
                url: url,                    
                data: $("#formulario").serialize(),
                success: function(data)            
                {
                    $('#datos').empty().html(data);           
                }
            });
    });
    /* paginacion */
    $(document).on("click",".pagination li a",function(e){
        e.preventDefault();   
        var url = $(this).attr("href");                                      
        $.ajax({                        
                type: "get",                 
                url: url,                    
                data: $("#formulario").serialize(),
                success: function(data)            
                {
                    $('#datos').empty().html(data);           
                }
            });
    });
    
          
</script> 
     
@endsection