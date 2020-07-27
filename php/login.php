<?php
	if(!empty($_POST)){
		
		header("Content-Type: text/html;charset=utf-8");
		session_start();
		
		include_once 'PDO.php';
		
		$usuario_login = $_POST['nombre_usuario'];
		$contraseña_login = $_POST['contrasena_usuario'];
		
		//llamada a la base de datos
		$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
		$sentencia_login = $pdo->prepare($sql);
		$sentencia_login->execute(array($usuario_login));
		$resultado_login = $sentencia_login->fetch();
		
		if ($resultado_login) {
			if ($contraseña_login == $resultado_login['contraseña']) {
				if($resultado_login['status_id'] == 1){
					$_SESSION['ID'] = $resultado_login['id'];
					$_SESSION['Usuario'] = $resultado_login['nombre'];
					$_SESSION['Rol'] = $resultado_login['rol_id'];
					
					switch ($resultado_login['rol_id']) {
						case '1':
							header('location:../admin-visualizar.php');
							break;
						case '2':
							header('location:../operador.php');
							break;
					}
				} else{
					header('location:../index.php?ina=true');
					session_destroy();
				}
			} else{
				header('location:../index.php?invp=true');
				session_destroy();
			}
		} else {
			header('location:../index.php?invn=true');
			session_destroy();
		}
	}
?>