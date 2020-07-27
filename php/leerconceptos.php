<?php
    include_once 'PDO.php';
    session_start();

    //Leer conceptos
    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();

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

    $salida = "";

    $salida.= 
    "<thead>
        <tr>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Referencia</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Costo</th>
            <th>Ultimo costo</th>
            <th>Utilidad</th>
            <th>Grupo</th>
            <th>Subgrupo</th>
            <th>Marca</th>
            <th>Unidad</th>";
            if ($_SESSION['Rol'] == 1) {
                $salida.="
                <th></th>
                <th></th>";
            }
        $salida.="
        </tr>
    </thead>
    <tbody>";

    foreach($resultado_conceptos as $dato){
        foreach ($resultado_grupos as $var) {
            if ($var['id'] == $dato['grupo_id']) {
                $grupo = $var['nombre'];
            }
        }
        foreach ($resultado_subgrupos as $var) {
            if ($var['id'] == $dato['subgrupo_id']) {
                $subgrupo = $var['nombre'];
            }
        }
        foreach ($resultado_marcas as $var) {
            if ($var['id'] == $dato['marca_id']) {
                $marcas = $var['nombre'];
            }
        }
        foreach ($resultado_unidad as $var) {
            if ($var['id'] == $dato['unidad_id']) {
                $unidad = $var['nombre'];
            }
        }
        $salida.= 
        "<tr>
            <td>". $dato['sku']."</td>
            <td>". $dato['nombre']."</td>
            <td>". $dato['codigo']."</td>
            <td>". $dato['referencia']."</td>
            <td>". $dato['descripcion']."</td>
            <td>". $dato['precio']."$</td>
            <td>". $dato['costo']."$</td>
            <td>". $dato['ultimo_Costo']."$</td>
            <td>". $dato['utilidad']."$</td>
            <td>". $grupo."</td>
            <td>". $subgrupo."</td>
            <td>". $marcas."</td>
            <td>". $unidad."</td>";
            if ($_SESSION['Rol'] == 1) {
                $salida.="
                <td><a href='#' onclick='eliminarProducto(".$dato['id'].")' style='color:black'><i class='fas fa-trash-alt'></i></a></td>
                <td><a href='#' onclick='editarProducto(".$dato['id'].")' style='color:black'><i class='fas fa-pencil-alt'></i></a></td>";
            }
        $salida.="
        </tr>";
    }

    $salida.= 
    "</tbody>";

    echo $salida;
?>