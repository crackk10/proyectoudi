<!-- campo placa y transportadora -->
    <div class="form-group">
        <label for="placa" class="col-lg-3 control-label requerido">Placa</label>
        <div class="col-lg-3">
        <input  type="text" id="placa" name="placa" class="form-control"  value="{{old('placa')}}" >
        </div>

    <!-- campo transportadora -->
        <label for="id_transportadora" class="col-lg-2 control-label requerido">Transportadora</label>
        <div class="col-lg-3">
            <select class="form-control " id="id_transportadora" name="id_transportadora" >
                <option value="" disabled selected>Seleccion...</option>
                
            </select>
        </div>
    <!-- /campo transportadora -->

    </div>
<!-- /campo placa y transportadora -->


<!-- campo Remolque y Capacidad -->
    <div class="form-group">
        <label for="remolque" class="col-lg-3 control-label requerido">Remolque</label>
        <div class="col-lg-3">
        <input  type="text" id="remolque" name="remolque" class="form-control"  value="{{old('remolque')}}" >
        </div>

        <label for="capacidad" class="col-lg-2 control-label requerido">Capacidad</label>
        <div class="col-lg-3">
        <input  type="number" id="capacidad" name="capacidad" class="form-control"  value="{{old('capacidad')}}" >
        </div>

    </div>
<!-- /campo Remolque y Capacidad -->


<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

