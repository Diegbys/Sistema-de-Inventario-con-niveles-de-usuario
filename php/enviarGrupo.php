<?php
    include_once 'PDO.php';

    //Variabels captadas por el metodo post
    $nombreConcepto = $_POST['nombre'];
    
    //Sentencia para introducir el nuevo concepto
    $sql_agregar_concepto = 'INSERT INTO grupos(nombre) VALUES (?)';
    $sentencia_agregar_concepto = $pdo->prepare($sql_agregar_concepto);
    $sentencia_agregar_concepto->execute(array($nombreConcepto));
  
    $sentencia_agregar_concepto = null;
?>