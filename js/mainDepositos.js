$(llenarTabla());

//Para limpiar los formularios
function resetform() {
    $("form select").each(function() { this.selectedIndex = 0 });
    $("form input[type=text] , form textarea").each(function() { this.value = '' });
}

//para llenar la tabla
function llenarTabla() {
    $.ajax({
        url: "./php/llenarDepositos.php",
    })
    .done(function(respuesta) {
        $("#tabla").html(respuesta);
    });
};

//Para enviar a a base de datos
function enviar() {
    $('#enviar').on("submit", function(e) {
        e.preventDefault();
        var formulario = $(this).serialize(); //obtener los nombres de la data de texto
        $.ajax({
            "method": "POST",
            "url": "./php/enviarDeposito.php",
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
        "url": "./php/eliminarDeposito.php",
        "data": parametros
    }).done(function(info) {
        llenarTabla();
        resetform();
    });
}

//Para dibujar los datos acuales
function editar(id_producto) {
    var parametros = {
        "id": id_producto
    };
    $.ajax({
        "method": "POST",
        "url": "./php/modificarDeposito.php",
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
            "url": "./php/editarDeposito.php",
            "data": formulario1
        }).done(function(info) {
            llenarTabla();
            $("#editar").addClass("ocultar");
        });
    });
}

enviar();