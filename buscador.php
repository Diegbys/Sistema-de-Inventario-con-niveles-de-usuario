<?php
    require './php/comp-admin.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
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
            <li><a href="./php/visualizarPage.php"><i class="fas fa-qrcode"></i>Visualizar</a></li>
            <li><a href="cargos.php"><i class="fas fa-link"></i>Cargos</a></li>
            <li>
                <a href="ajuste-inventario.php"> <i class="fa fa-cogs" aria-hidden="true"></i>Ajustes</a>
            </li>
            <?php echo ($_SESSION['Rol'] ==1) ? "<li><a href='usuarios.php'><i class='fa fa-users' aria-hidden='true'></i>Usuarios</a></li>":"" ?>
            <li><a href="#"><i class="fas fa-search"></i>Buscador</a></li>
            <li><a href="./php/cerrarSesion.php"><i class="fas fa-door-closed"></i>Cerrar</a></li>
        </ul>
    </div>
    <!--END SIDEBAR-->

    <main>
        <!--BEGIN BUSCADOR -->
        <div class="main_buscador">
            <input class="main_buscador_txt"  type="text" name="box" id="caja_busqueda" placeholder="Buscar...">
            <a href="#" class="btn_buscar"><i class="fa fa-search"></i></a>
        </div>
        <!--END BUSCADOR-->

        <!--BEGIN TABLE-->
        <table class="content-table" id="tabla" style="margin: 150px auto"></table>
        <!--END TABLE-->
    </main>


    <script src="./js/jquery.js"></script>
    <script src="./js/buscador.js"></script>
</body>

</html>