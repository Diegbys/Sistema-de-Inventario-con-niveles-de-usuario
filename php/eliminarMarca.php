<?php
    include_once 'PDO.php';

    $id = $_POST['id'];

    $sql_eliminarConcepto = 'DELETE FROM marcas WHERE id=?';
    $sentencia_eliminarConcepto = $pdo->prepare($sql_eliminarConcepto);
    $sentencia_eliminarConcepto->execute(array($id));

    $sentencia_eliminarConcepto = null;
?>