<?php
    session_start();

    include_once 'leerdepositos.php';

    $idConceptoCargo = $_POST['id'];


    $salida = "";

    $salida.="<div class='right'>
    <h2>Realizar Ajuste</h2>
    <form method='POST' id='enviar' action='php/agregar-ajuste-inventario.php'>
    <select class='field' name='nombreDeposito'>";
        foreach($resultado_depositos as $dato){
            $salida.="<option>".$dato['nombre']."</option>";
        }
        $salida.=" </select>
        <input class='field' type='text' name='ajuste' placeholder='Ingrese el ajuste' required>
        <input name='idConcepto' value='".$idConceptoCargo."' style='display:none'>
        <button class='btn'>Guardar</button>
    </form>
    </div>";

    
    echo $salida;
?>