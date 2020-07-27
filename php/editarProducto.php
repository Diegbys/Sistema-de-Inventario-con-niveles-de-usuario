<?php
    include_once 'PDO.php';

    $idModificarConcepto = $_POST['id'];
    $sql_unico = 'SELECT * FROM conceptos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($idModificarConcepto));
    $resultado_unico = $gsent_unico->fetch();

    //Leer grupos
    $idgrupo = $resultado_unico['grupo_id'];
    $sql_leer_grupos = 'SELECT * FROM grupos';
    $gsent_grupos = $pdo->prepare($sql_leer_grupos);
    $gsent_grupos->execute();
    $resultado_grupos = $gsent_grupos->fetchAll();

    //Leer subgrupos
    $idsubgrupo = $resultado_unico['subgrupo_id'];
    $sql_leer_subgrupos = 'SELECT * FROM subgrupos';
    $gsent_subgrupos = $pdo->prepare($sql_leer_subgrupos);
    $gsent_subgrupos->execute(array());
    $resultado_subgrupos = $gsent_subgrupos->fetchAll();

    //Leer marcas
    $idmarcas = $resultado_unico['marca_id'];
    $sql_leer_marcas = 'SELECT * FROM marcas';
    $gsent_marcas = $pdo->prepare($sql_leer_marcas);
    $gsent_marcas->execute();
    $resultado_marcas = $gsent_marcas->fetchAll();

    //Leer unidad
    $idunidad = $resultado_unico['unidad_id'];
    $sql_leer_unidad = 'SELECT * FROM unidad';
    $gsent_unidad = $pdo->prepare($sql_leer_unidad);
    $gsent_unidad->execute();
    $resultado_unidad = $gsent_unidad->fetchAll();

    $salida = "";

    $salida.="
    <h2>Editar Concepto</h2>
    <form method='POST' id='modificar'>
        <input type='text' class='field' name='nombre' placeholder='Nombre' value='".$resultado_unico['nombre']."'>
        <input type='text' class='field' name='codigo' placeholder='Codigo' value='".$resultado_unico['codigo']."'>
        <input type='text' class='field' name='referencia' placeholder='Referencia' value='".$resultado_unico['referencia']."'>
        <textarea class='field area' name='descripcion' placeholder='Descripcion'>".$resultado_unico['descripcion']."</textarea>
        <select name='grupo_id' class='field'>";
        foreach ($resultado_grupos as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $idgrupo) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select>
        <select name='subgrupo_id' class='field'>";
        foreach ($resultado_subgrupos as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $idsubgrupo) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select>
        <select name='marca_id' class='field'>";
        foreach ($resultado_marcas as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $idmarcas) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select>
        <select name='unidad_id' class='field'>";
        foreach ($resultado_unidad as $var) {
            $salida.="
            <option value=".$var['id'];
            if ($var['id'] == $idunidad) {
                $salida.=" selected>";
            } else {
                $salida.=">";
            }
            $salida.= $var['nombre']."</option>";
        }
    $salida.="
        </select>
        <input name='idModificarConcepto' value='".$idModificarConcepto."' style='display:none'>
        <button class='btn' onclick='modificarProducto()'>Editar</button>
    </form>";

    echo $salida;
?>