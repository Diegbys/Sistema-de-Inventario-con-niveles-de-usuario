<?php
include_once 'PDO.php';

    //Variabels captadas por el metodo post
    $nombreConcepto = $_POST['nombre'];
    $rol = $_POST['rol_id'];
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];
    $status = 1;

        //VERIFICAR SI USUARIO EXISTE
        $sql = 'SELECT * FROM usuarios WHERE nombre = ?';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nombreConcepto));
        $resultado = $sentencia->fetch();

    //SI EXISTE USUARIO MATAMOS LA OPERACIÓN
    if ($resultado) {
        echo 'Existe ese usuario';
        die();
    } 
    
    //seguimos validando
    if ($contraseña2 == $contraseña) {
        //AGREGAR A LA BASE DE DATOS
        $sql_agregar_user = 'INSERT INTO usuarios(nombre,contraseña,rol_id,status_id) VALUES (?,?,?,?)';
        $sentencia_agregar_user = $pdo->prepare($sql_agregar_user);
        $sentencia_agregar_user->execute(array($nombreConcepto, $contraseña, $rol, $status));
        $sentencia_agregar = null;
    } else {
        header('location: error.html');
    }
?>