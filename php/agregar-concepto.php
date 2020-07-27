<?php
    include_once 'PDO.php';

    //Leer grupos
    $sql_leer_grupos = 'SELECT * FROM grupos';
    $gsent_grupos = $pdo->prepare($sql_leer_grupos);
    $gsent_grupos->execute();
    $resultado_grupos = $gsent_grupos->fetchAll();

    //Leer subgrupos
    $sql_leer_subgrupos = 'SELECT * FROM subgrupos';
    $gsent_subgrupos = $pdo->prepare($sql_leer_subgrupos);
    $gsent_subgrupos->execute();
    $resultado_subgrupos = $gsent_subgrupos->fetchAll();

    //Leer marcas
    $sql_leer_marcas = 'SELECT * FROM marcas';
    $gsent_marcas = $pdo->prepare($sql_leer_marcas);
    $gsent_marcas->execute();
    $resultado_marcas = $gsent_marcas->fetchAll();

    //Leer unidad
    $sql_leer_unidad = 'SELECT * FROM unidad';
    $gsent_unidad = $pdo->prepare($sql_leer_unidad);
    $gsent_unidad->execute();
    $resultado_unidad = $gsent_unidad->fetchAll();

    $salida = '';

    $salida.='
    <input type="text" class="field" name="nombre" placeholder="Nombre" required>
    <input type="text" class="field" name="codigo" placeholder="Codigo" required>
    <input type="text" class="field" name="referencia" placeholder="Referencia" required>
    <textarea class="field area" name="descripcion" placeholder="Descripcion" required></textarea>
    <input type="text" class="field" name="costo" placeholder="Costo" required>
    <select name="grupo_id" class="field">';
        foreach ($resultado_grupos as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>
    <select name="subgrupo_id" class="field">';
        foreach ($resultado_subgrupos as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>
    <select name="marca_id" class="field">';
        foreach ($resultado_marcas as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>
    <select name="unidad_id" class="field">';
        foreach ($resultado_unidad as $var) {
            $salida.='
            <option value='.$var['id'].'>'.$var['nombre'].'</option>';
        }
    $salida.='
    </select>
    <button class="btn">Enviar</button>';
    echo $salida;
?>