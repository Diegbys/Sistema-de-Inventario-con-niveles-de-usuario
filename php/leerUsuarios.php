<?php
    include_once 'PDO.php';

    $salida ="";

    //Leer conceptos
    $sql = 'SELECT * FROM usuarios';
    $gsent = $pdo->prepare($sql);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
    $columnas = $gsent->rowCount();
    $gsent = null;

    //Leer rol
    $sql_leer_rol = 'SELECT * FROM roles';
    $gsent_rol = $pdo->prepare($sql_leer_rol);
    $gsent_rol->execute();
    $resultado_rol = $gsent_rol->fetchAll();

    //Leer status
    $sql_leer_status = 'SELECT * FROM status';
    $gsent_status = $pdo->prepare($sql_leer_status);
    $gsent_status->execute();
    $resultado_status = $gsent_status->fetchAll();

    if(isset($_POST['consulta'])){
        $q = $_POST['consulta']; //para escapar cualquier valor extraño
        $sql = "SELECT * FROM usuarios 
        WHERE nombre LIKE '%".$q."%'";
        $gsent = $pdo->prepare($sql);
        $gsent->execute(array($q, $q, $q, $q));
        $resultado = $gsent->fetchAll();
        $columnas = $gsent->rowCount();
    }

    if($columnas > 0){
        $salida.= "
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>";
        foreach($resultado as $dato){
            foreach ($resultado_rol as $var) {
                if ($var['id'] == $dato['rol_id']) {
                    $rol = $var['nombre'];
                }
            }
            foreach ($resultado_status as $var) {
                if ($var['id'] == $dato['status_id']) {
                    $status = $var['nombre'];
                }
            }
            $salida.= "
            <tr> 
                <td>".$dato['nombre']."</td>
                <td>".$rol."</td>
                <td>".$status."</td>
                <td><a href='#' onclick='eliminar(".$dato['id'].")' style='color:black'><i class='fas fa-trash-alt'></i></a></td>
                <td><a href='#' onclick='editar(".$dato['id'].")' style='color:black'><i class='fas fa-pencil-alt'></i></a></td>
            </tr>";
        }
        $salida .="</tbody>";
    }else{
        $salida.= "<div class='noData'>No hay datos</div>";
    }
    echo $salida;

    $gsent = null;
?>