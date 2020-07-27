$(llenarTabla());

//Para limpiar los formularios
function resetform() {
    $("form select").each(function() {
        this.selectedIndex = 0;
    });
    $("form input[type=text] , form textarea").each(function() {
        this.value = "";
    });
}

//para llenar la tabla
function llenarTabla() {
    $.ajax({
        url: "./php/leerconceptos.php"
    }).done(function(respuesta) {
        $("#tabla").html(respuesta);
    });
}

//Para dibujar los datos acuales
function editarProducto(id_producto) {
    var parametros = {
        id: id_producto
    };
    $.ajax({
        method: "POST",
        url: "./php/editarProducto.php",
        data: parametros
    }).done(function(respuesta) {
        $("#editar").html(respuesta);
        $("#editar").removeClass("ocultar");
    });
}

//Para modificar
function modificarProducto() {
    $("#modificar").on("submit", function(e) {
        e.preventDefault();
        var formulario = $(this).serialize(); //obtener los nombres de la data de texto
        $.ajax({
            method: "POST",
            url: "./php/editarConceptos.php",
            data: formulario
        }).done(function(info) {
            llenarTabla();
            $("#editar").addClass("ocultar");
        });
    });
}

//Para enviar a a base de datos
function enviarProducto() {
    $("#enviarProducto").on("submit", function(e) {
        e.preventDefault();
        var formulario = $(this).serialize(); //obtener los nombres de la data de texto
        $.ajax({
            method: "POST",
            url: "./php/enviarProducto.php",
            data: formulario
        }).done(function(info) {
            llenarTabla();
            resetform();
        });
    });
}

//Para eliminar
function eliminarProducto(id_producto) {
    var parametros = {
        id: id_producto
    };
    $.ajax({
        method: "POST",
        url: "./php/EliminarConcepto.php",
        data: parametros
    }).done(function(info) {
        llenarTabla();
    });
}

enviarProducto();