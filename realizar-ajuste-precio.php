<?php
    include_once './php/leerdepositos.php';

    //Leer conceptos
    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();

    if ($_GET) {
        $idConceptoCargo = $_GET['id'];
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste Precio</title>
    <link rel="stylesheet" href="fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main>
        <!--BEGIN TABLE-->
        <table class="content-table">
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th>Precio</th>
                    <th>Ultimo Costo</th>
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
                    <td>
                        <?php echo $dato['ultimo_Costo']?>
                    </td>
                    <td><a href="realizar-ajuste-precio.php?id=<?php echo $dato['id'] ?>">Realizar Ajuste</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!--END TABLE-->

        <section class="contenedor1">
            <a href="ajuste-precio.php">
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
                <form action="php/agregar-ajuste-precio.php" method="POST">
                    <input class="field" type="text" name="nuevo_costo" placeholder="Ingrese el nuevo costo">
                    <input name="idConcepto" value="<?php echo $idConceptoCargo ?>" style="display:none">
                    <button class="btn">Enviar</button>
                </form>
            </div>
        </div>
        <?php endif ?>
    </main>
</body>

</html>