function agregarConductor(url) {
    $.ajax({
        type: "get",
        url: url,
        data: "formdata",
        dataType: "json",
        success: function (data) {
          $('#id_conductor').html('');//vacia el input
          $.each(data, function (indexInArray, valueOfElement) { 
            //si el conductor y la transportadora  no esta inactiva 
            if (valueOfElement.id_estado_conductor!=2 && valueOfElement.id_estado!=2) 
            {
              $("#id_conductor").append("<option value="+valueOfElement.id+">"+valueOfElement.nombre+" "+valueOfElement.apellido+" - "+valueOfElement.razon_social+"</option>"); 
            }
          });   
        }
      }); 
    
}