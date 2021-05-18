function AgregarFormulario(fechaData,fechaCorta) {
    var fechaHoy = new Date();
    if (fechaData>=fechaHoy) 
    {
      
      var formulario = $("#formularioDiv").html();//agrego el formulario a una variable
      var BtnGuardar = $("#BtnGuardar").html();//agrego el bonton de guardar a una variable
      $('#headerModalEvento').css('background-color', "white");
      $("#tituloEvento").html("Agregar Evento");
      $("#descripcionEvento").html(formulario);//con la variable lleno el cuerpo(el formulario)
      $("#footerModal").html(BtnGuardar);//con la variable lleno el footer(el boton Guardar)
      var fechadividida=fechaCorta.split('-05:00');//elimino una cadena de texto de la fecha
      var fechaStr=new String(fechadividida[0]);//convierto la matriz obtenida en un string
      /*  si el texto no tiene el formato de hora completo le añado hora cero */
      if (fechaStr.length<18) {
        fechaStr=fechaStr+"T00:00:00";
      }
      
      $("#fecha").val(fechaStr);//agrego la fecha y hora al input
      $('#selectEstado').css('display', 'none');//oculto el campo de estado
      $('#origenDestino').css('display', 'none');//oculto los campos origen y destino
      $('#salida').css('display', 'none');//oculto el campo fecha_salida
      $("#exampleModalCenter").modal(); 
    }
   
}