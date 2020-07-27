<?php
    session_start();
    
	if(isset($_SESSION["Rol"]) <> 1){
        header("Location: index.php");
    }
?>