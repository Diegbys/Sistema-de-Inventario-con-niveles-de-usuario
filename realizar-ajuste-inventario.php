<?php
    include_once './php/leerdepositos.php';
    session_start();

    if ($_GET) {
        $idConceptoCargo = $_GET['id'];
    }

    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste Inventario</title>
    <link rel="stylesheet" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main>

        <!--BEGIN TABLEe-->
        <table class="content-table">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th scope="col">descripcion</th>
                    <th>precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado_conceptos as $dato): ?>
                <tr>
                    <td>
                        <?php echo $dato['nombre']?>
                    </td>
                    <td>
                        <?php echo $dato['descripcion']?>
                    </td>
                    <td>
                        <?php echo $dato['precio']?>
                    </td>
                    <td><a href="realizar-ajuste-inventario.php?id=<?php echo $dato['id'] ?>">Realizar Ajuste</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!--END TABLE-->

        <section class="contenedor1">
            <a href="ajuste-inventario.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Terminar
            </a>
        </section>

        <!--EDITAR CONCEPTO-->
        <?php if($_GET): ?>
            <div class="popup-inner1">
                <div class="right">
                    <h2>Realizar Ajuste</h2>
                    <form action="php/agregar-ajuste-inventario.php" method="POST">
                        <select class="field" name="nombreDeposito">
                            <?php foreach($resultado_depositos as $dato): ?>
                            <option><?php echo $dato['nombre'] ?></option>
                            <?php endforeach ?>
                            </select>
                        <input class="field" type="text" name="ajuste" placeholder="Ingrese el ajuste">
                        <input name="idConcepto" value="<?php echo $idConceptoCargo ?>" style="display:none">
                        <button class="btn">Enviar</button>
                    </form>
                </div>
            </div>
            <?php endif ?>
    </main>

    <script src="./js/jquery.js"></script>
    <script src="./js/ajuste-inventario.js"></script>
</body>

</html>