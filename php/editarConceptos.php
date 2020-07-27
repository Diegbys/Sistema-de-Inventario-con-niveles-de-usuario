<?php
    //Capturar todas las variables a modificar
    $idConcepto = $_POST['idModificarConcepto'];
    $nombreConcepto = $_POST['nombre'];
    $codigoConcepto = $_POST['codigo'];
    $referenciaConcepto = $_POST['referencia'];
    $descripcionConcepto = $_POST['descripcion'];
    $grupoidConcepto = $_POST['grupo_id'];
    $subgrupoidConcepto = $_POST['subgrupo_id'];
    $marcaidConcepto = $_POST['marca_id'];
    $unidadidConcepto = $_POST['unidad_id'];
    $skuConcepto = substr($nombreConcepto, 3). '/'. substr($referenciaConcepto, 3). '/'. substr($descripcionConcepto, 3);;

    include_once 'PDO.php';
 
    //sentencia a enviar
    $sql_editarConcepto = 'UPDATE  conceptos set sku=?,nombre=?,codigo=?,referencia=?,descripcion=?,grupo_id=?,subgrupo_id=?,marca_id=?,unidad_id=? WHERE id=?';
    $sentencia_editarConcepto = $pdo->prepare($sql_editarConcepto);
    $sentencia_editarConcepto->execute(array($skuConcepto,$nombreConcepto,$codigoConcepto,$referenciaConcepto,$descripcionConcepto,$grupoidConcepto,$subgrupoidConcepto,$marcaidConcepto,$unidadidConcepto,$idConcepto));

    $sentencia_editarConcepto = null;
?>