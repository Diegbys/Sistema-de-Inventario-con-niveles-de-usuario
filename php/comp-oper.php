<?php
    session_start();
    
	if(isset($_SESSION["Rol"]) <> 2){
        header("Location: index.php");
    }
?>