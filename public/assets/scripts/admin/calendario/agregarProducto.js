function agregarProducto(url) {
    $.ajax({
        type: "get",
        url: url,
        data: "formdata",
        dataType: "json",
        success: function (data) {
          $('#id_producto').html('');//vacia el input
          $.each(data, function (indexInArray, valueOfElement) { 
            //si el conductor y la transportadora  no esta inactiva 
            if (valueOfElement.id_estado!=2) 
            {
              $("#id_producto").append("<option value="+valueOfElement.id+">"+valueOfElement.nombre_producto+"</option>"); 
            }
          });   
        }
      }); 
}