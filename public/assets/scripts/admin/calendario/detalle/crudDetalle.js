function crudDetalle(formData,url,token,tipo,idEvento) {
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
            var grid=Grilla(idEvento);
            grid.refrescar()   
        },
        error: function (data)
        {  
            console.log("Error al eliminar"); 
        }
    }); 
}