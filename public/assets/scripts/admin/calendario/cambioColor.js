function colores () { 
    var color=$("#id_estado").val();
    if (color==3) {
        $("#color").val("#3498DB");
    }
    if (color==4) {
        $("#color").val("#1ABC9C");
    }
    if (color==5) {
        $("#color").val("#E74C3C");
    }
    console.log("cambiado");
}