

<!-- campo nombre y precio-->
    <div class="form-group">
        <label for="nombre" class="col-lg-3 control-label requerido">Producto</label>
        <div class="col-lg-3">
        <input  type="text" id="nombre" name="nombre" class="form-control"  value="{{old('nombre')}}" >
        </div>

        <label for="valor" class="col-lg-2 control-label requerido">Precio</label>
        <div class="col-lg-3">
        <input  type="number" id="valor" name="valor" class="form-control"  value="{{old('valor')}}" >
        </div>
    </div>
<!-- /campo nombre y precio-->
<!-- campo descripcions -->
    <div class="form-group">
        <label for="descripcion" class="col-lg-3 control-label ">Descripcion</label>
        <div class="col-lg-8">
            <textarea name="descripcion" id="descripcion" class="form-control" cols="10" rows="3"  value="{{old('descripcion')}}"></textarea>
        </div>
    </div>    
<!-- /campo descripcions -->
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
