<?php
    include_once 'PDO.php';
    session_start();

    $sql_leer_conceptos = 'SELECT * FROM marcas';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();

    $salida = "";

    $salida.= "<thead>
    <tr>
        <th>Nombre</th>";
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
    <td>". $dato['nombre']."</td>";
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