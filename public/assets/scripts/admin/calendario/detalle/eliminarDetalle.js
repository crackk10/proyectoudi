function dropDetalle() {
    var token = $("#token").val();
    var url=url;
    $.ajax({                        
        type: 'DELETE',
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
            
        }
    }); 
}