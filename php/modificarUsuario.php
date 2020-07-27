<?php
    include_once 'PDO.php';

    //Para modificar
    $idModificarUsuario = $_POST['id'];
    $sql_unico_Usuario = 'SELECT * FROM usuarios WHERE id=?';
    $gsent_unico_Usuario = $pdo->prepare($sql_unico_Usuario);
    $gsent_unico_Usuario->execute(array($idModificarUsuario));
    $resultado_unico_Usuario = $gsent_unico_Usuario->fetch();

    //Leer rol
    $sql_leer_rol = 'SELECT * FROM roles';
    $gsent_rol = $pdo->prepare($sql_leer_rol);
    $gsent_rol->execute();
    $resultado_rol = $gsent_rol->fetchAll();

    //Leer status
    $sql_leer_status = 'SELECT * FROM status';
    $gsent_status = $pdo->prepare($sql_leer_status);
    $gsent_status->execute();
    $resultado_status = $gsent_status->fetchAll();

    $salida = "";
    $salida.="
    <h2>Editar Usuario</h2>
    <form method='POST' id='modificar'>
        <input type='text' class='field' name='nombre' placeholder='Nombre' value='".$resultado_unico_Usuario['nombre']."' required>
        <select name='rol_id' class='field'>";
        foreach ($resultado_rol as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $resultado_unico_Usuario['rol_id']) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select>
        <select name='status_id' class='field'>";
        foreach ($resultado_status as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $resultado_unico_Usuario['status_id']) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select> 
        <input type='text' class='field' name='contraseña' placeholder='Ingrese la contraseña' required>
        <input name='idModificarUsuario' value='".$idModificarUsuario."' style='display:none'>
        <button class='btn' onclick = 'modificar()'>Enviar</button>
    </form>";

    echo $salida;
?>
