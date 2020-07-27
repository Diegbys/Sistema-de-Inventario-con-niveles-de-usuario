<?php
    include_once 'PDO.php';

    $sub = $_POST['grupo_id'];
    $sql_unico = 'SELECT * FROM subgrupos WHERE grupo_id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($sub));
    $resultado_unico = $gsent_unico->fetch();

        foreach ($resultado_unico as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $idsubgrupo) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }

    echo $salida;
?>