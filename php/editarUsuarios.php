<?php
    //Capturar todas las variables a modificar
    $idusuario = $_POST['idModificarUsuario'];
    $nombreusuario = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol_id'];
    $status = $_POST['status_id'];


    include_once 'PDO.php';
 
    //sentencia a enviar
    $sql_editarusuario = 'UPDATE  usuarios set nombre=?,contraseña=?,rol_id=?,status_id=? WHERE id=?';
    $sentencia_editarusuario = $pdo->prepare($sql_editarusuario);
    $sentencia_editarusuario->execute(array($nombreusuario,$contraseña,$rol,$status,$idusuario));

    $sentencia_editarusuario = null;