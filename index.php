<?php
    session_start();

    switch (isset($_SESSION['Rol'])) {
        case '1':
            header('location:./admin-visualizar.php');
            break;
        case '2':
            header('location:./operador.php');
            break;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale.0">
    <title>login</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonds.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
</head>

<body>
    <form action="./php/login.php" method="POST" id="form">
        <h1>Registro</h1>
        <div class="grupo">
            <input type="text" name="nombre_usuario" required><span class="barra"></span>
            <label for="">Nombre</label>
        </div>
        <div class="grupo">
            <input type="password" name="contrasena_usuario" required><span class="barra"></span>
            <label for="">Password</label>
        </div>
        <?php
            if(isset($_GET["invn"]) || isset($_GET["ina"]) || isset($_GET['invp'])){
                echo '<div class="grupo">';
                if (isset($_GET["invn"]) && $_GET["invn"] == 'true') {
                    echo "<section style='text-align: center; color:red'>El usuario no existe</section>";
                } elseif (isset($_GET["invp"]) && $_GET["invp"] == 'true') {
                    echo "<section style='text-align: center; color:red'>Clave invalida</section>";
                } elseif(isset($_GET["ina"]) && $_GET["ina"] == 'true'){
                    echo "<section style='text-align: center; color:red'>Usuario inactivo</section>";
                }
                echo '</div>';
            }
        ?>
        <button class="btn btn-info " data-toggle="modal" data-target="#micentana" type="submit">Ingresar</button>
    </form>
</body>
</html>