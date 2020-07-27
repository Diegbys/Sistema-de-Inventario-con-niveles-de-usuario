$(llenarTabla());

//Para limpiar los formularios
function resetform() {
    $("form select").each(function() { this.selectedIndex = 0 });
    $("form input[type=text] , form textarea").each(function() { this.value = '' });
}

//para llenar la tabla
function llenarTabla(consulta) {
    $.ajax({
            url: "./php/leerUsuarios.php",
            type: "POST",
            data: { consulta: consulta },
            dataType: "html"
        })
        .done(function(respuesta) {
            $("#tabla").html(respuesta);

        });
};

//Para enviar a a base de datos
function enviarProducto() {
    $('#enviar').on("submit", function(e) {
        e.preventDefault();
        var formulario = $(this).serialize(); //obtener los nombres de la data de texto
        $.ajax({
            "method": "POST",
            "url": "./php/enviarUsuario.php",
            "data": formulario
        }).done(function(info) {
            llenarTabla();
            resetform();
        });
    });
}

//Para eliminar
function eliminar(id_producto) {
    var parametros = {
        "id": id_producto
    };
    $.ajax({
        "method": "POST",
        "url": "./php/Eliminarusuario.php",
        "data": parametros
    }).done(function(info) {
        llenarTabla();
    });
}

//Para dibujar los datos acuales
function editar(id_producto) {
    var parametros = {
        "id": id_producto
    };
    $.ajax({
        "method": "POST",
        "url": "./php/modificarUsuario.php",
        "data": parametros
    }).done(function(respuesta) {
        $("#editar").html(respuesta);
        $("#editar").removeClass("ocultar");
    });
}

//Para modificar
function modificar() {
    $('#modificar').on("submit", function(e) {
        e.preventDefault();
        var formulario1 = $(this).serialize(); //obtener los nombres de la data de texto
        $.ajax({
            "method": "POST",
            "url": "./php/editarUsuarios.php",
            "data": formulario1
        }).done(function(info) {
            llenarTabla();
            $("#editar").addClass("ocultar");
        });
    });
}

$(document).on('keyup', '#caja_busqueda', function() {
    var valor = $(this).val(); //this hace referencia a la caja, al mismo objeto
    if (valor != "") {
        llenarTabla(valor);
    } else {
        llenarTabla();
    }
});

enviarProducto();