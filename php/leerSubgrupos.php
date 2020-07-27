<?php
    include_once 'PDO.php';
    session_start();

    $sql_leer_conceptos = 'SELECT * FROM subgrupos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();

    $sql_leer_conceptos2 = 'SELECT * FROM grupos';
    $gsent_conceptos2 = $pdo->prepare($sql_leer_conceptos2);
    $gsent_conceptos2->execute();
    $resultado_conceptos2 = $gsent_conceptos2->fetchAll();

    $salida = "";

    $salida.= "<thead>
    <tr>
        <th>Nombre</th>
        <th>Grupo</th>";
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
    $salida.= "<tr>
    <td>". $dato['nombre']."</td>
    <td>";
    foreach($resultado_conceptos2 as $dato2){
        if ($dato2['id'] == $dato['grupo_id']) {
            $salida.= $dato2['nombre'];
        }
    }
    $salida .="</td>";
    if ($_SESSION['Rol'] == 1) {
        $salida.="
        <td><a href='#' onclick='eliminar(".$dato['id'].")' style='color:black'><i class='fas fa-trash-alt'></i></a></td>
        <td><a href='#' onclick='editar(".$dato['id'].")' style='color:black'><i class='fas fa-pencil-alt'></i></a></td>";
    }
$salida.="
    </tr>";
    }

    $salida.= "/tbody>";

    echo $salida;
?>