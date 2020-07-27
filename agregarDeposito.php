<?php
    include_once 'php/PDO.php';
    $nombreDeposito = $_POST['nombreDeposito'];

    //Leer id del deposito
    $sql_leer_id_depositos = 'SELECT * FROM depositos WHERE nombre = ?';
    $sentencia_leer_id_depositos = $pdo->prepare($sql_leer_id_depositos);
    $sentencia_leer_id_depositos->execute(array($nombreDeposito));
    $resultado_id_depositos = $sentencia_leer_id_depositos->fetch();
?>