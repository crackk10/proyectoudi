

<!-- campo Razon social y Nit -->
    <div class="form-group">
        <label for="razon_social" class="col-lg-3 control-label requerido">Razon social</label>
        <div class="col-lg-3">
        <input  type="text" id="razon_social" name="razon_social" class="form-control"  value="{{old('razon_social')}}" >
        </div>

        <label for="nit" class="col-lg-2 control-label requerido">Nit</label>
        <div class="col-lg-3">
        <input  type="number" id="nit" name="nit" class="form-control"  value="{{old('nit')}}" >
        </div>

    </div>
<!-- /campo Razon social y Nit -->
<!-- campo Telefono y direccion -->
    <div class="form-group">
        <label for="telefono" class="col-lg-3 control-label requerido">Telefono</label>
        <div class="col-lg-3">
        <input  type="number" id="telefono" name="telefono" class="form-control"  value="{{old('telefono')}}" >
        </div>

        <label for="direccion" class="col-lg-2 control-label requerido">Direccion</label>
        <div class="col-lg-3">
        <input  type="text" id="direccion" name="direccion" class="form-control"  value="{{old('direccion')}}" >
        </div>

    </div>
<!-- /campo Telefono y direccion -->
<!-- campo E-mail y estado -->
    <div class="form-group">
        <label for="email" class="col-lg-3 control-label requerido">E-mail</label>
        <div class="col-lg-3">
        <input  type="email" id="email" name="email" class="form-control"  value="{{old('email')}}" >
        </div>

    <!-- campo estado -->
        <label for="id_estado" class="col-lg-2 control-label requerido">Estado</label>
        <div class="col-lg-3">
            <select class="form-control " id="id_estado" name="id_estado" >
                <option value="" disabled selected>Seleccion...</option>
                <option value="1">activo</option>
                <option value="2">inactivo</option>
            </select>
        </div>
    <!-- /campo estado -->

    </div>
<!-- /campo E-mail y estado -->
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">


