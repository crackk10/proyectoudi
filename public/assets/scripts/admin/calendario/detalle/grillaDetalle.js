function Grilla(idEvento) {     
    var formData    
    var data = {
    class: 'table-striped table-bordered table-condensed',
    columnas: [
        
        { leyenda: 'Fecha', style: 'width:200px;', columna: 'fecha', ordenable: true, class: 'text-center' },
        { leyenda: 'Proceso', class: '', ordenable: true, columna: 'nombre', filtro: true, class: 'text-center' },
        { leyenda: 'Producto', style: 'width:200px;', ordenable: true, filtro: true, columna: 'nombre_producto', class: 'text-center' },
        { leyenda: 'Peso', style: 'width:200px;', ordenable: true, columna: 'peso', class: 'text-center' },
        { leyenda: '', style: 'width:40px;', class: 'text-center'},
       
    ],
    modelo: [

        { propiedad: 'fecha', class: 'text-right', class: 'text-center' },
        { propiedad: 'nombre', class: 'text-center' },
        { propiedad: 'nombre_producto', class: 'text-center' },
        { propiedad: 'peso', class: 'text-center' },
        { formato: function(tr, obj, celda){
            formData=obj.id;
            urlDetalle=new String("http://proyectoudi.test/detalle/"+formData);
            token = $("#token").val();
            tipoEnvio = "DELETE";
            idDetalle=idEvento;
            return anexGrid_boton({
                class: 'btn-danger',
                contenido: '<i class="glyphicon glyphicon-remove"></i>',
                attr: [
                'onclick="crudDetalle(formData, urlDetalle, token, tipoEnvio,idDetalle);"'
                ]
            });
        }}
    ],
    url: "http://proyectoudi.test/detalle/"+idEvento,
    type: 'get',
    parametros:{id:idEvento},
    columna: 'id',
    columna_orden: 'DESC'
    };
    var grid = $("#list").anexGrid(data);
    return grid;
    
    
}