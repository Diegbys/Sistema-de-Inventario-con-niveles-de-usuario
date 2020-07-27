<?php
    require ('./php/comp-admin.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
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
            <li><a href="#"><i class="fas fa-qrcode"></i>Visualizar</a></li>
            <li><a href="cargos.php"><i class="fas fa-link"></i>Cargos</a></li>
            <li><a href="ajuste-inventario.php"> <i class="fa fa-cogs" aria-hidden="true"></i>Ajustes</a></li>
            <?php echo ($_SESSION['Rol'] ==1) ? "<li><a href='usuarios.php'><i class='fa fa-users' aria-hidden='true'></i>Usuarios</a></li>":"" ?>
            <li><a href="buscador.php"><i class="fas fa-search"></i>Buscador</a></li>
            <li><a href="./php/cerrarSesion.php"><i class="fas fa-door-closed"></i>Cerrar</a></li>
        </ul>
    </div>
    <!--END SIDEBAR-->

    <main>
        <!--BEGIN NAVBAR-->
        <ul class="navbar">
            <li>
                <a href="admin-visualizar.php">
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="name"><span data-text="Conceptos">Conceptos</span></div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="name"><span data-text="Marcas">Marcas</span></div>
                </a>
            </li>
            <li>
                <a href="grupos.php">
                    <div class="icon">
                            <i class="fa fa-layer-group"></i>
                            <i class="fa fa-layer-group"></i>
                    </div>
                    <div class="name"><span data-text="Grupos">Grupos</span></div>
                </a>
            </li>
            <li>
                <a href="subgrupos.php">
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="name"><span data-text="Subgrupos">Subgrupos</span></div>
                </a>
            </li>
            <li>
                <a href="depositos.php">
                    <div class="icon">
                            <i class="fa fa-warehouse"></i>
                            <i class="fa fa-warehouse"></i>
                    </div>
                    <div class="name"><span data-text="Depositos">Depositos</span></div>
                </a>
            </li>
        </ul>
        <!--END NAVBAR-->

        <!--BEGIN TABLE-->
        <table class="content-table" style="margin: 100px auto;" id="tabla"></table>
        <!--END TABLE-->

        <section class="contenedor1">
            <a href="#popup1">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Agregar Marca
            </a>
        </section>

        <!--EDITAR CONCEPTO-->
        <div class="right ocultar" style="background-color: white;" id="editar"></div>
    </main>

    <!--BEGIN MODAL-->
    <!--AGREGAR USUARIO -->
    <div class="container-modal">
        <div class="popup" id="popup1">
            <div class="popup-inner">
                <div class="left"></div>
                <div class="right">
                    <h2>Agregar Marca</h2>
                    <form method="POST" id="enviar">
                        <input type="text" class="field" name="nombre" placeholder="Nombre" required>
                        <button class="btn">Enviar</button>
                    </form>
                </div>
                <a href="#" class="popup-close">X</a>
            </div>
        </div>
    </div>
    <!--END MODAL-->


    <script src="./js/jquery.js"></script>
    <script src="./js/mainMarcas.js"></script>
</body>

</html>