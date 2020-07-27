<?php
    include_once 'PDO.php';

    //Para modificar
    $idModificarConcepto = $_POST['id'];
    $sql_unico = 'SELECT * FROM subgrupos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($idModificarConcepto));
    $resultado_unico = $gsent_unico->fetch();

    //Leer grupos
    $sql_leer_grupos = 'SELECT * FROM grupos';
    $gsent_grupos = $pdo->prepare($sql_leer_grupos);
    $gsent_grupos->execute();
    $resultado_grupos = $gsent_grupos->fetchAll();

    $salida = "";

    $salida.="
    <h2>Editar Concepto</h2>
    <form method='POST' action='editarSubgrupo.php' id='modificar'>
        <input type='text' class='field' name='nombre' placeholder='Nombre' value='".$resultado_unico['nombre']."' required>
        <select name='grupo_id' class='field'>";
        foreach ($resultado_grupos as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $resultado_unico['grupo_id']) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
        $salida.="
        </select>
        <input name='idModificarConcepto' value='".$idModificarConcepto."' style='display:none'>
        <button class='btn' onclick = 'modificar()'>Editar</button>
    </form>";

    echo $salida;
?>