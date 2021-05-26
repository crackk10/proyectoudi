{{-- Fecha --}}
   <div class="form-group">
     <label for="fecha" class="col-lg-3 control-label ">Llegada</label>
    <div class=" col-lg-8">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input  type="datetime-local" id="fecha" min="<?php echo date('Y-m-d\T00:00') ?>" name="fecha" class="form-control"  value="{{old('fecha')}}" >
        </div>
    </div>
   </div>
{{-- /Fecha --}}
{{-- Fecha_salida --}}
    <div id="salida"  style="visibility: visible">
        <div class="form-group">
            <label for="fecha_salida" class="col-lg-3 control-label ">Salida</label>
            <div class=" col-lg-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input  type="datetime-local" id="fecha_salida" min="<?php echo date('Y-m-d\T00:00') ?>" name="fecha_salida" class="form-control"  value="{{old('fecha_salida')}}" >
                </div>
            </div>
        </div>
    </div>
{{-- /Fecha_salida --}}
<!-- campo vehiculo -->
    <div class="form-group">  
        <label for="id_vehiculo" class="col-lg-3 control-label ">Vehiculo</label>
        <div class="col-lg-8">
            <select class="form-control " id="id_vehiculo" name="id_vehiculo" >
                <option value="" disabled selected>Seleccion...</option>
            </select>
        </div>
    </div>
<!-- /campo vehiculo-->
<!-- campo conductor -->
    <div class="form-group">  
        <label for="id_conductor" class="col-lg-3 control-label ">Conductor</label>
        <div class="col-lg-8">
            <select class="form-control " id="id_conductor" name="id_conductor" >
                <option value="" disabled selected>Seleccion...</option>
            </select>
        </div>
    </div>
<!-- /campo conductor-->
<!-- campo origen y destino-->
    <div id="origenDestino"  style="visibility: visible">
        <div class="form-group">
            <label for="origen" class="col-lg-3 control-label requerido">Origen</label>
            <div class="col-lg-3">
            <input  type="text" id="origen" name="origen" class="form-control"  value="{{old('origen')}}" >
            </div>

            <label for="destino" class="col-lg-2 control-label requerido">Destino</label>
            <div class="col-lg-3">
            <input  type="text" id="destino" name="destino" class="form-control"  value="{{old('destino')}}" >
            </div>

        </div>
    </div>
<!-- /campo origen y destino-->


<!-- campo comentario -->
    <div class="form-group">
        <label for="comentario" class="col-lg-3 control-label ">Comentario</label>
        <div class="col-lg-8">
            <textarea name="comentario" id="comentario" class="form-control" cols="10" rows="3"  value="{{old('comentario')}}"></textarea>
        </div>
    </div>    
<!-- /campo comentario -->
{{-- estado --}}
    <div id="selectEstado"  style="visibility: visible">
        <div class="form-group" >
            <label for="id_estado" class="col-lg-3 control-label " >Estado</label>
            <div class="col-lg-3">
                <select class="form-control " id="id_estado" name="id_estado" >
                    <option value="" disabled>Seleccion...</option>
                    <option value="3" selected >En espera</option>
                    <option value="4" >Realizado</option>
                    <option value="5" >Anulado</option>
                    
                </select>
            </div>
            <label for="tipo_movimiento" class="col-lg-2 control-label " >Movimiento de</label>
            <div class="col-lg-3">
                <select class="form-control " id="tipo_movimiento" name="tipo_movimiento" >
                    <option value="" disabled seleted>Seleccion...</option>
                    <option value="1" >Entrada</option>
                    <option value="2" >Salida</option>
                </select>
            </div>
        </div>
    </div>
{{-- /estado --}}
<input type="hidden" name="id_usuario" value="{{ auth()->user()->id}}" id="usuario">
<input type="hidden" name="color" value="#3498DB" id="color">
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<input type="hidden" name="id" value="" id="id">
<div id="btnRegistroEstados"  style="visibility: visible">
    <div class="form-group">
        <div class="col-lg-4"></div>
        <button id="estados" onclick="registroEstados(idEventoGlobal)" type="button" class="btn btn-info col-lg-6">Registrar Proceso</button>
    </div>  
</div>


