<div class="form-group">
    <div class=" col-lg-4">
        <h3 class="box-title"><strong>Lista de Productos</strong> </h3>  
    </div>
    <form id="formulario" method="get" autocomplete="off">
            <div class="form-group col-lg-4">
                <label for="filtro" class="control-label col-lg-3">Filtro</label>
                <div class="col-lg-9">
                    <select name="filtro" id="filtro" class="form-control">
                        <option value="0">Sin filtro</option>
                        <option value="nombre">Nombre del producto</option>
                        <option value="id">codigo del producto</option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-4">
                <label for="buscar" class="control-label col-lg-3">Buscar</label>
                <div class="col-lg-9">
                    <input type="text" value="" name="buscar" id="buscar" class="form-control">
                </div>
            </div>
            
    </form>
</div>

