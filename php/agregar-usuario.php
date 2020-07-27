<?php
    include_once 'PDO.php';

    //Leer rol
    $sql_leer_rol = 'SELECT * FROM roles';
    $gsent_rol = $pdo->prepare($sql_leer_rol);
    $gsent_rol->execute();
    $resultado_rol = $gsent_rol->fetchAll();

    $salida ="";

    $salida.='
    <select name="rol_id" class="field">';
        foreach ($resultado_rol as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>';

    echo $salida;
?>