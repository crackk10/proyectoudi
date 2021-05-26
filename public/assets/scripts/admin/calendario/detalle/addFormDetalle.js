function registroEstados(id){
    
    var formulario = $("#formularioDetalleDiv").html();//agrego el formulario a una variable
    var BtnGuardar = $("#BtnGuardar").html();//agrego el bonton de guardar a una variable
    $('#headerModalEvento').css('background-color', "white");
    $("#tituloEvento").html("Proceso");
    $("#descripcionEvento").html(formulario);//con la variable lleno el cuerpo(el formulario)
    $("#footerModal").html(BtnGuardar);//con la variable lleno el footer(el boton Guardar) 
    $("#id_calendario").val(id);// asigno el id del calendario al formulario
    var urlProducto = "http://proyectoudi.test/calendario/producto";
    var urlProceso = "http://proyectoudi.test/calendario/proceso"; 
    agregarProducto(urlProducto);
    agregarProceso(urlProceso);
    desicion="detalle";

    formData = idEventoGlobal;
    Grilla(formData);
    
    
}
 