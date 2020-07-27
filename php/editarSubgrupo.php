<?php
include_once 'PDO.php';
    //Capturar todas las variables a modificar
    $idConcepto = $_POST['idModificarConcepto'];
    $nombreConcepto = $_POST['nombre'];
    $idGrupo = $_POST['grupo_id'];
 
    //sentencia a enviar
    $sql_editarConcepto = 'UPDATE  subgrupos set nombre=?, grupo_id=? WHERE id=?';
    $sentencia_editarConcepto = $pdo->prepare($sql_editarConcepto);
    $sentencia_editarConcepto->execute(array($nombreConcepto,$idGrupo,$idConcepto));

    $sentencia_editarConcepto = null;
?>