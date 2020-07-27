<?php
    include_once 'PDO.php';

    $salida ="";

    //Leer conceptos
    $sql = 'SELECT c.id, c.nombre, gr.nombre as grupo, sgr.nombre as subgrupo, m.nombre as marca FROM conceptos c 
    INNER JOIN grupos gr ON c.grupo_id = gr.id
    INNER JOIN subgrupos sgr ON c.subgrupo_id = sgr.id
    INNER JOIN marcas m ON c.marca_id = m.id';
    $gsent = $pdo->prepare($sql);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
    $columnas = $gsent->rowCount();
    $gsent = null;

    if(isset($_POST['consulta'])){
        $q = $_POST['consulta']; //para escapar cualquier valor extraño
        $sql = "SELECT c.id, c.nombre, gr.nombre as grupo, sgr.nombre as subgrupo, m.nombre as marca FROM conceptos c 
        INNER JOIN grupos gr ON c.grupo_id = gr.id
        INNER JOIN subgrupos sgr ON c.subgrupo_id = sgr.id
        INNER JOIN marcas m ON c.marca_id = m.id
        WHERE c.nombre LIKE '%".$q."%' OR gr.nombre LIKE '%".$q."%' 
        OR sgr.nombre LIKE '%".$q."%' OR m.nombre LIKE '%".$q."%'";

        $gsent = $pdo->prepare($sql);
        $gsent->execute(array($q, $q, $q, $q));
        $resultado = $gsent->fetchAll();
        $columnas = $gsent->rowCount();
    }

    if($columnas > 0){
        $salida.= " 
        <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Grupo</td>
                    <td>SubGrupo</td>
                    <td>Marca</td>
                </tr>
        </thead>
        <tbody>";

        foreach($resultado as $dato){
            $salida.= "
            <tr> 
                <td>".$dato['nombre']."</td>
                <td>".$dato['grupo']."</td>
                <td>".$dato['subgrupo']."</td>
                <td>".$dato['marca']."</td>
            </tr>";
        }

        $salida .="</tbody>";
    }else{
        $salida.= "<div class='noData'>No hay datos</div>";
    }
    echo $salida;

    $gsent = null;
?>