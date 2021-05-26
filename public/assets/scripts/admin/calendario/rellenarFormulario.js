function rellenarFormulario(url,idEvento) {
    $.ajax({
        type: "get",
        url: url,
        data: idEvento,
        dataType: "json",
        success: function (data) {
        
          $('#id').val(data[0].id);
          $('#comentario').val(data[0].comentario);
          $('#orden_entrada').val(data[0].orden_entrada);
          $('#origen').val(data[0].origen);
          $('#destino').val(data[0].destino);
          $("#id_estado option[value="+data[0].id_estado+"]").prop('selected', true);
          $("#id_vehiculo option[value="+data[0].id_vehiculo+"]").prop('selected', true);
          $("#id_conductor option[value="+data[0].id_conductor+"]").prop('selected', true);
          $("#tipo_movimiento option[value="+data[0].tipo_movimiento+"]").prop('selected', true);
          
          var fechadividida=data[0].fecha.split('.000000Z');//elimino una cadena de texto de la fecha
          var fechaStr=new String(fechadividida[0]);//convierto la matriz obtenida en un string
          $("#fecha").val(fechaStr);//agrego la fecha y hora al input
          var fechadivididaA=data[0].fecha_salida.split(' ');//elimino una cadena de texto de la fecha
          var hora =fechadivididaA[0];
          var minutos= fechadivididaA[1];
          var fechaStrA=new String(hora+"T"+minutos);//convierto la matriz obtenida en un string
          $("#fecha_salida").val(fechaStrA);//agrego la fecha y hora al input
        }
      }); 
    
}