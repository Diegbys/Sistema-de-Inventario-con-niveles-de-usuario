function generar(id_producto) {
    var parametros = {
        "id": id_producto
    };
    $.ajax({
        "method": "POST",
        "url": "./php/generar-ajuste-inventario.php",
        "data": parametros
    }).done(function(respuesta) {
        $("#editar").html(respuesta);
        $("#editar").removeClass("ocultar");
    });
}