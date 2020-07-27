<?php
    include_once 'PDO.php';

    $sql_leer_depositos = 'SELECT * FROM depositos';
    $sentencia_leer_depositos = $pdo->prepare($sql_leer_depositos);
    $sentencia_leer_depositos->execute();
    $resultado_depositos = $sentencia_leer_depositos->fetchAll();
?>