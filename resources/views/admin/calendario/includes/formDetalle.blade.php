<!-- campo proceso y producto -->
    <div class="form-group">
        <label for="id_proceso" class="col-lg-2 control-label ">Proceso</label>
        <div class="col-lg-4">
            <select class="form-control " id="id_proceso" name="id_proceso" >
                <option value="" disabled selected>Seleccion...</option>
            </select>
        </div>  
        <label for="id_producto" class="col-lg-2 control-label ">Producto</label>
        <div class="col-lg-4">
            <select class="form-control " id="id_producto" name="id_producto" >
                <option value="" disabled selected>Seleccion...</option>
            </select>
        </div>
    </div>
<!-- /campo proceso y producto-->

<!-- campo peso-->
    <div class="form-group">
        <label for="peso" class="col-lg-2 control-label requerido">peso</label>
        <div class="col-lg-4">
        <input  type="text" id="peso" name="peso" class="form-control"  value="{{old('peso')}}" >
        </div>
    </div>
<!-- /campo peso-->
<input type="hidden" name="id_calendario" id="id_calendario">
<input type="hidden" id="fecha"  name="fecha" value="<?php echo date('Y-m-d\TH:i') ?>" >
