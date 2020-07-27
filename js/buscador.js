$(buscar_datos()); //el getready abreviado

function buscar_datos(consulta) {
    $.ajax({
            type: "POST",
            url: "./php/buscar.php",
            data: { consulta: consulta },
            dataType: "html"
        })
        .done(function(respuesta) {
            $("#tabla").html(respuesta);
        })
        .fail(function() {
            console.log("Error")
        })
}

$(document).on('keyup', '#caja_busqueda', function() {
    var valor = $(this).val(); //this hace referencia a la caja, al mismo objeto
    if (valor != "") {
        buscar_datos(valor);
    } else {
        buscar_datos();
    }
});