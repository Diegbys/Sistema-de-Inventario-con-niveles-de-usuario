<?php
//include_once 'definirRol.php';
session_start();

require ('./php/PDO.php');
include_once 'php/leerdepositos.php';

    //Leer conceptos
    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();



if ($_GET) {
     $idConceptoCargo = $_GET['id'];
}

if ($_POST) {
    //Variables a ingresar a cargo
    //Configurar la zona horaria
    date_default_timezone_set("America/Caracas");
    //Con esto establezco la fecha 
    $fechaCargo = date("Y"). date("m"). date("d");
    //De aquí traigo el id del usuario logeado en 'leerconceptos'
    $IdUsuarioCargo = $_SESSION['Rol'];
    //Aqui realizo el nombre del deposito y busco su id
    include_once 'agregarDeposito.php';
    $idDepositoCargo = $resultado_id_depositos['id'];
    $cantidadCargo = $_POST['cantidadCargo'];
    $idConceptoCargo = $_POST['idConcepto'];

    //Ver la existencia que había antes
        $sql_leer_existencia_movimiento = 'SELECT * FROM movimientos_deposito WHERE concepto_id=? and deposito_id=? and id = (SELECT MAX(id) from movimientos_deposito WHERE concepto_id=? and deposito_id=?)';
        $sentencia_leer_existencia_movimiento = $pdo->prepare($sql_leer_existencia_movimiento);
        $sentencia_leer_existencia_movimiento->execute(array($idConceptoCargo,$idDepositoCargo,$idConceptoCargo,$idDepositoCargo));
        $resultado_leer_existencia_movimiento = $sentencia_leer_existencia_movimiento->fetch();
        $existenciaAnterior = $resultado_leer_existencia_movimiento['existencia'];
        $sentencia_leer_existencia_movimiento = null;
        if ($existenciaAnterior == "") {
            $existenciaAnterior = 0;
        }
        if($existenciaAnterior >= $cantidadCargo){
            header('location: ajuste-mayor.html');
            die();
        }

    //Enviar a cargo en la base de datos
    $sql_agregar_cargo = 'INSERT INTO cargos(fecha_At,usuario_id,concepto_id,deposito_id,cantidad) VALUES (?,?,?,?,?)';
    $sentencia_agregar_cargo = $pdo->prepare($sql_agregar_cargo);
    $sentencia_agregar_cargo->execute(array($fechaCargo, $IdUsuarioCargo, $idConceptoCargo, $idDepositoCargo, $cantidadCargo));

    //Enviar a movimientodeposito
    $sql_agregar_movimiento_deposito = 'INSERT INTO movimientos_deposito(concepto_id,deposito_id,existencia) VALUES (?,?,?)';
    $sentencia_agregar_movimiento_deposito = $pdo->prepare($sql_agregar_movimiento_deposito);
    $sentencia_agregar_movimiento_deposito->execute(array($idConceptoCargo,$idDepositoCargo,$cantidadCargo));

  
    
  }


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cargos</title>
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
                <li><a href="ajuste-inventario.php"> <i class="fa fa-cogs" aria-hidden="true"></i>Ajustes</a></li>
                <?php echo ($_SESSION['Rol'] ==1) ? "<li><a href='usuarios.php'><i class='fa fa-users' aria-hidden='true'></i>Usuarios</a></li>":"" ?>
                <li><a href="buscador.php"><i class="fas fa-search"></i>Buscador</a></li>
                <li><a href="./php/cerrarSesion.php"><i class="fas fa-door-closed"></i>Cerrar</a></li>
            </ul>
        </div>
        <!--END SIDEBAR-->

        <main>

            <!--BEGIN TABLE-->
            <table class="content-table">
                <thead>

                    <tr>
                        <th scope="col">id</th>
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
                            <?php echo $dato['id']?>
                        </td>
                        <td>
                            <?php echo $dato['nombre']?>
                        </td>
                        <td>
                            <?php echo $dato['descripcion']?>
                        </td>
                        <td>
                            <?php echo $dato['precio']?>
                        </td>
                        <td><a href="cargos.php?id=<?php echo $dato['id'] ?>">Realizar Cargo</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!--END TABLE-->

            <?php if($_GET): ?>
            <div class="popup-inner1">
                <div class="right">
                    <h2>Generar cargo</h2>
                    <form action="cargos.php" method="POST">
                        <input type="text" class="field" name="cantidadCargo" placeholder="Cantidad">
                        <select class="field" name="nombreDeposito">
                         <?php foreach($resultado_depositos as $dato): ?>
                        <option><?php echo $dato['nombre'] ?></option>
                         <?php endforeach ?>
                    </select>
                        <input name="idConcepto" value="<?php echo $idConceptoCargo ?>" style="display:none">
                        <button class="btn" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
            <?php endif ?>
        </main>

        <!--BEGIN MODAL-->
        <div class="container-modal">
            <div class="popup" id="popup1">
                <div class="popup-inner">
                    <div class="left"></div>
                    <div class="right">
                        <h2>Realizar Cargo</h2>
                        <form method="POST">
                            <input type="text" class="field" name="nombre" placeholder="Nombre">
                            <input type="text" class="field" name="codigo" placeholder="Codigo">
                            <input type="text" class="field" name="referencia" placeholder="Referencia">
                            <textarea class="field area" name="descripcion" placeholder="Descripcion"></textarea>
                            <input type="text" class="field" name="precio" placeholder="Precio">
                            <input type="text" class="field" name="costo" placeholder="Costo">
                            <input type="text" class="field" name="grupo_id" placeholder="Grupo id">
                            <input type="text" class="field" name="subgrupo_id" placeholder="Subgrupo id">
                            <input type="text" class="field" name="marca_id" placeholder="Marca id">
                            <input type="text" class="field" name="unidad_id" placeholder="Unidad_id">
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