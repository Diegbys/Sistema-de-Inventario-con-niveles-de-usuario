<?php
    include_once './php/PDO.php';
    session_start();

    if ($_POST) {
        //guarda los datos para enviar
        date_default_timezone_set("America/Caracas");
        $fechaAjuste_enc_Inventario = date("Y"). date("m"). date("d");
        $observaciom_ajuste_enc_inventario = $_POST['observacion'];

        //Enviar a ajuste encabezado de inventario en la base de datos
        $sql_agregar_ajuste_enc_inventario = 'INSERT INTO ajuste_enc_inventario(fecha_At,observacion) VALUES (?,?)';
        $sentencia_agregar_ajuste_enc_inventario = $pdo->prepare($sql_agregar_ajuste_enc_inventario);
        $sentencia_agregar_ajuste_enc_inventario->execute(array($fechaAjuste_enc_Inventario,$observaciom_ajuste_enc_inventario));
        $sentencia_agregar_ajuste_enc_inventario = null;

        header('location: realizar-ajuste-inventario.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste Inventario</title>
    <link rel="stylesheet" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!--BEGIN SIDEBAR-->
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
        <div class="sidebar">
            <header>Bienvenido! </br>
                <?php echo ($_SESSION['Rol']==1) ? "Administrador":"Operador"; ?>
                <?php echo $_SESSION['Usuario'] ?>
            </header>
            <ul>
                <li><a href="./php/VisualizarPage.php"><i class="fas fa-qrcode"></i>Visualizar</a></li>
                <li><a href="cargos.php"><i class="fas fa-link"></i>Cargos</a></li>
                <li><a href="#"> <i class="fa fa-cogs" aria-hidden="true"></i>Ajustes</a></li>
                <?php echo ($_SESSION['Rol'] ==1) ? "<li><a href='usuarios.php'><i class='fa fa-users' aria-hidden='true'></i>Usuarios</a></li>":"" ?>
                <li><a href="buscador.php"><i class="fas fa-search"></i>Buscador</a></li>
                <li><a href="./php/cerrarSesion.php"><i class="fas fa-door-closed"></i>Cerrar</a></li>
            </ul>
        </div>
        <!--END SIDEBAR-->

    <main>
        <!--BEGIN NAVBAR-->
        <ul class="navbar navbar-ajustes">
            <li>
                <a href="#">
                    <div class="icon">
                         <i class="fa fa-shopping-cart"></i>
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="name"><span data-text="Inventario">Inventario</span></div>
                </a>
            </li>
            <li>
                <a href="ajuste-precio.php">
                    <div class="icon">
                            <i class="fa fa-tag"></i>
                            <i class="fa fa-tag"></i>
                    </div>
                    <div class="name"><span data-text="Precio">Precio</span></div>
                </a>
            </li>
        </ul>
        <!--END NAVBAR-->

        <section class="contenedor1 contenedor2">
            <a href="#popup1" style="z-index: 1">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Realizar Ajuste de Inventario
            </a>
        </section>

        <!--EDITAR CONCEPTO-->

    </main>

    <!--BEGIN MODAL-->
    <div class="container-modal">
        <div class="popup" id="popup1">
            <div class="popup-inner">
                <div class="left"></div>
                <div class="right">
                    <h2>Realizar Ajuste Inventario</h2>
                    <form method="POST" action="ajuste-inventario.php">
                        <textarea class="field area-ajuste field-ajuste" name="observacion" placeholder="Observacion" required></textarea>
                        <button class="btn">Enviar</button>
                    </form>
                </div>
                <a href="#habilidades" class="popup-close">X</a>
            </div>
        </div>
    </div>
    <!--END MODAL-->
</body>

</html>