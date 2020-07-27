<?php
    include_once 'PDO.php';

    //Para modificar
    $idModificarConcepto = $_POST['id'];
    $sql_unico = 'SELECT * FROM depositos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($idModificarConcepto));
    $resultado_unico = $gsent_unico->fetch();

    $salida = "";

    $salida.="
    <h2>Editar Deposito</h2>
    <form method='GET' action='editarDeposito.php' id='modificar'>
        <input type='text' class='field' name='nombre' placeholder='Nombre' value='".$resultado_unico['nombre']."' required>
        <input name='idModificarConcepto' value='".$idModificarConcepto."' style='display:none'>
        <button class='btn' onclick = 'modificar()'>Editar</button>
    </form>";
    
    echo $salida;
?>