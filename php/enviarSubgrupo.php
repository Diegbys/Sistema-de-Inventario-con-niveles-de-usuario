<?php
    include_once 'PDO.php';

    //Variabels captadas por el metodo post
    $nombreConcepto = $_POST['nombre'];
    $idGrupo = $_POST['grupo_id'];
    
    //Sentencia para introducir el nuevo concepto
    $sql_agregar_concepto = 'INSERT INTO subgrupos(nombre,grupo_id) VALUES (?,?)';
    $sentencia_agregar_concepto = $pdo->prepare($sql_agregar_concepto);
    $sentencia_agregar_concepto->execute(array($nombreConcepto, $idGrupo));
  
    $sentencia_agregar_concepto = null;
?>