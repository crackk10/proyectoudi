{{-- Transportadora y estado --}}
   <div class="form-group">
   <!-- campo transportadora -->
    <label for="id_transportadora" class="col-lg-3 control-label ">Transportadora</label>
    <div class="col-lg-3">
        <select class="form-control " id="id_transportadora" name="id_transportadora" >
            <option value="" disabled selected>Seleccion...</option>
            
        </select>
    </div>
   <!-- /campo transportadora -->
   <!-- campo estado conductor -->
    <label for="id_estado_conductor" class="col-lg-2 control-label ">Estado Conductor</label>
    <div class="col-lg-3">
        <select class="form-control " id="id_estado_conductor" name="id_estado_conductor" >
            <option value="" disabled selected>Seleccion...</option>
            <option value="1" >Activo</option>
            <option value="2" >Inactivo</option>   
        </select>
    </div>
   <!-- /campo estado conductor -->
   </div>
{{-- /Transportadora y estado --}}
<!-- campo nombre y apellido -->
   <div class="form-group">
   {{-- campo nombre --}}
    
    <label for="nombre" class="col-lg-3 control-label requerido">Nombres</label>
    <div class="col-lg-3">
    <input  type="text" id="nombre" name="nombre" class="form-control"  value="{{old('nombre')}}" >
    </div>
   {{-- campo nombre --}}
   {{-- campo apellido --}}
    <div class="form-group">
    <label for="apellido" class="col-lg-2 control-label requerido">Apellidos</label>
    <div class="col-lg-3">
    <input  type="text" id="apellido" name="apellido" class="form-control"  value="{{old('apellido')}}" >
    </div>
   {{-- campo apellido --}}


   </div>
<!-- /campo nombre y apellido -->


{{-- campo tipo_documento y documento --}}
   <div class="form-group">
    <label for="tipo_documento" class="col-lg-3 control-label ">Tipo de Documento</label>
    <div class="col-lg-3">
        <select class="form-control " id="tipo_documento" name="tipo_documento" >
            <option value="" disabled selected>Seleccion...</option>
            <option value="CC" >CC</option>
            <option value="CE" >CE</option>
            
        </select>
    </div>

    <label for="documento" class="col-lg-2 control-label requerido">Documento</label>
    <div class="col-lg-3">
    <input  type="number" id="documento" name="documento" class="form-control"  value="{{old('documento')}}" >
    </div>

   </div>
{{-- campo tipo_documento y documento --}}

<!-- campo Telefono y correo -->
    <div class="form-group">
        <label for="telefono" class="col-lg-3 control-label ">Telefono</label>
        <div class="col-lg-3">
        <input  type="number" id="telefono" name="telefono" class="form-control"  value="{{old('telefono')}}" >
        </div>

   <!-- campo Email -->
   <label for="email" class="col-lg-2 control-label ">E-mail</label>
   <div class="col-lg-3">
   <input  type="email" id="email" name="email" class="form-control"  value="{{old('email')}}" >
   </div>
  <!-- /campo Email -->

    </div>
<!-- /campo Telefono y correo -->

{{-- tipo de licencia --}}
<div class="form-group">
    <label for="tipo_licencia" class="col-lg-3 control-label ">Tipo de Licencia</label>
    <div class="col-lg-3">
        <select class="form-control " id="tipo_licencia" name="tipo_licencia" >
            <option value="" disabled selected>Seleccion...</option>
            <option value="B2" >B2</option>
            <option value="B3" >B3</option>
            <option value="C3" >C3</option>
            
        </select>
    </div>
</div>
{{-- /tipo de licencia --}}


<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

