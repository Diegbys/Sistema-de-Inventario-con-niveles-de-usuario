<?php
    include_once 'PDO.php';

    //Capturar todas las variables a modificar
    $idConcepto = $_POST['idModificarConcepto'];
    $nombreConcepto = $_POST['nombre'];
    
    //sentencia a enviar
    $sql_editarConcepto = 'UPDATE  grupos set nombre=? WHERE id=?';
    $sentencia_editarConcepto = $pdo->prepare($sql_editarConcepto);
    $sentencia_editarConcepto->execute(array($nombreConcepto,$idConcepto));

    $sentencia_editarConcepto = null;
?>