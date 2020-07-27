<?php
    session_start();
    if($_SESSION['Rol'] == 1){
        header('location:../admin-visualizar.php');
    } else{
        header('location:../operador.php');
    }
?>