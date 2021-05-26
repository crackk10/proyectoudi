@extends("theme.$theme.layout")
@section('titulo')
    Calendario
@endsection
@section('metadata'){{-- estilos de plugin fullcalendar --}}
  <meta charset='utf-8' />
  <meta name="csrf-token" content="{{csrf_token()}}"/>   
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="{{asset("assets/FullCalendar/lib/main.css")}}" rel='stylesheet' />   
  <script src="{{asset("assets/FullCalendar/lib/main.js")}}"></script> 
  <script src="{{asset("assets/FullCalendar/lib/locales-all.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/agregarVehiculo.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/agregarConductor.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/agregarProducto.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/agregarProceso.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/rellenarFormulario.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/agregarFormulario.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/crearEvento.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/cambioColor.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/detalle/crudDetalle.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/detalle/hola.js")}}"></script> 
  <script src="{{asset("assets/scripts/anexGrid/jquery.anexgrid.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/detalle/grillaDetalle.js")}}"></script> 
  <script src="{{asset("assets/scripts/admin/calendario/detalle/addFormDetalle.js")}}"></script> 
  
  
  <script>
  
    var idEventoGlobal,calendar;//variables para crud
    
    
    document.addEventListener('DOMContentLoaded', function() {
      
      var calendarEl = document.getElementById('calendar');
      calendar = new FullCalendar.Calendar(calendarEl, {
        fixedWeekCount:Boolean, default: false,
        height: 520,
        /* botones del header */
        headerToolbar:{
        left: 'today prev,next', 
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay', 
        },
        locales : 'es', //lenguaje del calendario
        events: "{{route('calendario.listar')}}",//ruta que llama los eventos y los pinta
        hiddenDays: [ 0 ], //dias ocultos en el calendario (domingo)
       /* Accion cuando se da click a un evento (asignar titulo y cuerpo) */
        eventClick:function(eventData,jsEvent,view){         
          
          idEventoGlobal=eventData.event._def.publicId;//id del evento para actualizar o eliminar
          $('#headerModalEvento').css('background-color', eventData.event.backgroundColor);
          $("#tituloEvento").html(eventData.event._def.title);
          $("#descripcionEvento").html(eventData.event._def.extendedProps.descripcion);
          var BtnEditar = $("#BtnEditar").html();//agrego el bonton de Editar a una variable
          $("#footerModal").html(BtnEditar);//con la variable lleno el footer(el boton Editar)
          $("#exampleModalCenter").modal();

         /* Evento para editar */
          $('#editar').click(function (e) {
            desicion = "editar";
            
            var urlVehiculos = "{{route('calendario/vehiculo')}}";
            var urlConductor = "{{route('calendario/conductor')}}";
            var urlEvento = "{{route('calendario/evento')}}";
            var idEvento = new Object();
            idEvento.idEvento  = eventData.event._def.publicId; /* objeto con id del evento */
          
            agregarPlacas(urlVehiculos);//agregar vehiculo al select
            agregarConductor(urlConductor);//agregar conductor al select
            rellenarFormulario(urlEvento,idEvento);
            $('#selectEstado').css('display', 'block');
            $('#origenDestino').css('display', 'block');
            $('#salida').css('display', 'block');
            var formulario = $("#formularioDiv").html();//agrego el formulario a una variable
            var BtnGuardar = $("#BtnGuardar").html();//agrego el bonton de guardar a una variable
            $("#descripcionEvento").html(formulario);//con la variable lleno el cuerpo(el formulario)
            $("#footerModal").html(BtnGuardar);//con la variable lleno el footer(el boton Guardar)
          });
        },
      });
      calendar.render();

     /* evento cuando se da click a un dia y hora */
      calendar.on('dateClick', function(info) {
        desicion ="registrar";
        var urlVehiculos = "{{route('calendario/vehiculo')}}";
        var urlConductor = "{{route('calendario/conductor')}}";  
        agregarPlacas(urlVehiculos);//agregar vehiculo al select
        agregarConductor(urlConductor);//agregar conductor al select
        AgregarFormulario(info.date,info.dateStr);//agregar formulario al modal
      });
     //Realizar el registro 
      $('#formulario').on('submit', function (e) {
        e.preventDefault();
        var formulario;
        //Crear evento
        if (desicion =="registrar") {
          tipo = "post";
          formulario = $('#formulario')[0];
          formData = $('#formulario').serialize();
          url = "{{route('calendario/guardar')}}"; 
          crudEvento(formData,url,token,calendar,tipo); 
        }
        //Modificar Evento
        if (desicion == "editar") {
          tipo = "PUT"
          colores();
          formulario = $('#formulario')[0];
          formData = $('#formulario').serialize();
          url =  "http://proyectoudi.test/calendario/"+idEventoGlobal;
          crudEvento(formData,url,token,calendar,tipo); 
        }
        //Crear Detalle
        if (desicion =="detalle") {
          token = $("#token").val();
          tipo = "post";
          formulario = $('#formulario')[0];
          formData = $('#formulario').serialize();
          url = "{{route('detalle/guardar')}}"; 
          crudDetalle(formData,url,token,tipo,idEventoGlobal); 
        }

        
      });
 
    });
    function PromptEliminar() {
      //Ingresamos un mensaje a mostrar
      var eliminacion = prompt("Escriba 'eliminar' para continuar");
      //Detectamos si el usuario ingreso un valor
      if (eliminacion == "eliminar"){
        tipo = "DELETE"
        url =  "http://proyectoudi.test/calendario/"+idEventoGlobal;
        token = $("#token").val();
        formData = idEventoGlobal;
        crudEvento(formData,url,token,calendar,tipo); 
        alert("eliminado");
      }
      //Detectamos si el usuario NO ingreso un valor
      else 
      {
        toastr.warning( 'No se ha eliminado',"Cancelado", {
                "positionClass": "toast-top-right",
                "extendedTimeOut": "6000"}) 
      }
    }


  
   
  </script> 
@endsection
@section('contenido')
<div class="row">
  <div class="col-lg-12">
      <div class="box box-danger">
          <!-- box-body -->
            <div class="box-body">
              <div id='calendar'></div>
            </div>
          <!-- /.box-body -->
          <!-- box-footer -->
            <div class="box-footer">
              
            </div>
          <!-- /.box-footer -->
          </form>
      </div>       
  </div>
</div> 

@include('admin/calendario/includes/modalConfirmRegistro')

<div id="formularioDiv" style="display:  none">
    @include('admin/calendario/includes/form')
</div>
<div id="formularioDetalleDiv" style="display:  none">
    @include('admin/calendario/includes/formDetalle')
    <div id="list" >
    </div>
</div>


<div  id="BtnGuardar" style="display:  none">
  @include('includes.boton_form_crear')
</div>

<div  id="BtnEditar" style="display:  none">
  @include('includes.boton_form_editar')
</div>

@endsection
