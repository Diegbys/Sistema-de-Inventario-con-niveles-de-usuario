<?php
    include_once 'PDO.php';

    $id = $_POST['id'];
    $status = 2;

    $sql_eliminarConcepto = 'UPDATE  usuarios set status_id=? WHERE id=?';
    $sentencia_eliminarConcepto = $pdo->prepare($sql_eliminarConcepto);
    $sentencia_eliminarConcepto->execute(array($status,$id));

    $sentencia_eliminarConcepto = null;
?>