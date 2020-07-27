<?php
include_once 'PDO.php';

    //Para modificar
    $idModificarConcepto = $_POST['id'];
    $sql_unico = 'SELECT * FROM grupos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($idModificarConcepto));
    $resultado_unico = $gsent_unico->fetch();

    $salida = "";

    $salida.="
    <h2>Editar Grupo</h2>
    <form method='POST' id='modificar'>
        <input type='text' class='field' name='nombre' placeholder='Nombre' value='".$resultado_unico['nombre']."'>
        <input name='idModificarConcepto' value='".$idModificarConcepto."' style='display:none'>
        <button class='btn' onclick = 'modificar()'>Enviar</button>
    </form>";

    echo $salida;
?>