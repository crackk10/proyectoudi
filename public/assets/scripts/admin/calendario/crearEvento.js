function crudEvento(formData,url,token,calendar,tipo) {
    $.ajax({                        
        type: tipo,
        headers: {'X-CSRF-TOKEN':token},          
        url: url,
        dataType: 'json',                   
        data: formData,
        success: function(data)            
        {   if (data.success=='true') 
            {
                console.log("Exito");
                toastr.success( 'Accion Realizada', 'Exito',{
                "positionClass": "toast-top-right"})
            }  
            $("#cerrarModal").trigger('click')
            calendar.refetchEvents();      
        },
        error: function (data)
        {  
            console.log("Error"); 
            $("#list").val('');
            var messages = data.responseJSON.errors;
            $.each(messages, function(index, val) {
                toastr.error( val, 'Problema',{
                "positionClass": "toast-top-right",
                "extendedTimeOut": "6000"})   
            });
            console.log(data.responseJSON.errors);
            /* $("#error").html(data.responseJSON.errors.remitente); */   
        }
    }); 
}