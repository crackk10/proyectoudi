function agregarPlacas(url) {
    $.ajax({
        type: "get",
        url: url,
        data: "formdata",
        dataType: "json",
        success: function (data) {
            $('#id_vehiculo').html('');//vacia el input
            $.each(data, function (indexInArray, valueOfElement) { 
                if (valueOfElement.id_estado!=2)//si la transportadora no esta inactiva 
                {
                  $("#id_vehiculo").append("<option value="+valueOfElement.id+">"+valueOfElement.placa+" - "+valueOfElement.razon_social+"</option>"); 
                }
            });   
        }
      });
}