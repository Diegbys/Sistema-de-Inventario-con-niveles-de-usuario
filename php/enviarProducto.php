<?php
    include_once 'PDO.php';

    //Variabels captadas por el metodo post
    $nombreConcepto = $_POST['nombre'];
    $codigoConcepto = $_POST['codigo'];
    $referenciaConcepto = $_POST['referencia'];
    $descripcionConcepto = $_POST['descripcion'];
    $costoConcepto = $_POST['costo'];
    $auxprecio = ($costoConcepto*30)/100;
    $precioConcepto = $costoConcepto + $auxprecio;
    $grupoidConcepto = $_POST['grupo_id'];
    $subgrupoidConcepto = $_POST['subgrupo_id'];
    $marcaidConcepto = $_POST['marca_id'];
    $unidadidConcepto = $_POST['unidad_id'];
    $skuConcepto = substr($nombreConcepto, 3). '/'. substr($referenciaConcepto, 3). '/'. substr($descripcionConcepto, 3);
    $utilidadConcepto = $precioConcepto - $costoConcepto;
    
    //Sentencia para introducir el nuevo concepto
    $sql_agregar_concepto = 'INSERT INTO conceptos(sku, nombre, codigo, referencia, descripcion, precio, costo, ultimo_Costo, utilidad, grupo_id, subgrupo_id, marca_id, unidad_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $sentencia_agregar_concepto = $pdo->prepare($sql_agregar_concepto);
    $sentencia_agregar_concepto->execute(array($skuConcepto, $nombreConcepto, $codigoConcepto, $referenciaConcepto, $descripcionConcepto, $precioConcepto, $costoConcepto, $costoConcepto,$utilidadConcepto, $grupoidConcepto, $subgrupoidConcepto, $marcaidConcepto, $unidadidConcepto));
  
    $sentencia_agregar_concepto = null;
?>