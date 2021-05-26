<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    {{-- scripts --}}
    <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="{{asset("assets/FullCalendar/lib/main.css")}}" rel='stylesheet' />   
    <script src="{{asset("assets/FullCalendar/lib/main.js")}}"></script> 
    <script src="{{asset("assets/FullCalendar/lib/locales-all.js")}}"></script>
    <script src="{{asset("assets/scripts/anexGrid/jquery.anexgrid.js")}}"></script> 
    <script src="{{asset("assets/scripts/admin/calendario/detalle/grillaDetalleCorta.js")}}"></script>  
    
    <script>
    
    var idEventoGlobal,calendar;//variables para crud  
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      calendar = new FullCalendar.Calendar(calendarEl, {
        initialView:"timeGridDay",
        slotMinTime:"08:00:00",
        slotMaxTime:"18:00:00",
        height: 580,
        /* botones del header */
        headerToolbar:{
        left: '', 
        center: 'title',
        right: '', 
        },
        locales : 'es', //lenguaje del calendario
        events: "{{route('calendario.detallado')}}",//ruta que llama los eventos y los pinta
        hiddenDays: [ 0 ], //dias ocultos en el calendario (domingo)
        /* Accion cuando se da click a un evento (asignar titulo y cuerpo) */
        eventClick:function(eventData,jsEvent,view){
          idEventoGlobal=eventData.event._def.publicId;//id del evento para actualizar o eliminar
          $('#headerModalEvento').css('background-color', eventData.event.backgroundColor);
          $("#tituloEvento").html(eventData.event._def.title);
          $("#descripcionEvento").html(eventData.event._def.extendedProps.descripcion);
          var BtnEditar = $("#BtnEditar").html();//agrego el bonton de Editar a una variable
          $("#footerModal").html(BtnEditar);//con la variable lleno el footer(el boton Editar)
          $("#btn_modal").trigger("click");
          Grilla(idEventoGlobal);
        },
      });
      calendar.render();
    });
    setInterval('calendar.refetchEvents();',180000);
  
    </script> 

    <title>Trasportes</title>
  </head>
  <body>
    <div class="container-fluid row justify-content-center">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand">Trasportes</a>
              <div class="d-flex">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a  class="navbar-brand" href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a class="navbar-brand" href="{{ route('login') }}">Iniciar Sesión</a>
                    @endauth
                </div>
                @endif
              </div>
            </div>
          </nav>
          <div id='calendar' class="col-lg-11"></div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
    @include('admin/calendario/includes/modal')
    <div  id="BtnEditar" style="display:  none">
      @include('includes.boton_form_editar')
    </div>
    
  </body>
</html>