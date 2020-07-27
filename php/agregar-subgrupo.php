<?php
    include_once 'PDO.php';

    //Leer grupos
    $sql_leer_grupos = 'SELECT * FROM grupos';
    $gsent_grupos = $pdo->prepare($sql_leer_grupos);
    $gsent_grupos->execute();
    $resultado_grupos = $gsent_grupos->fetchAll();

    $salida = '';

    $salida.='
    <input type="text" class="field" name="nombre" placeholder="Nombre" required>
    <select name="grupo_id" class="field">';
        foreach ($resultado_grupos as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>';
    echo $salida;
?>