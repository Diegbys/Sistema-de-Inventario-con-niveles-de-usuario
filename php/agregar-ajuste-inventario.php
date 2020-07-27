<?php
    include_once 'leerdepositos.php';
    
    //Leer conceptos
    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();
    
    //Calcular el id encabezado del ajuste 
    $sql_leer_id_enc_ajuste_inventario = 'SELECT * FROM ajuste_enc_inventario WHERE id = (SELECT MAX(id) from ajuste_enc_inventario)';
    $sentencia_leer_id_enc_ajuste_inventario = $pdo->prepare($sql_leer_id_enc_ajuste_inventario);
    $sentencia_leer_id_enc_ajuste_inventario->execute(array());
    $resultado_leer_id_enc_ajuste_inventario = $sentencia_leer_id_enc_ajuste_inventario->fetch();
    $id_enc_ajuste_inventario = $resultado_leer_id_enc_ajuste_inventario['id'];

    if ($_POST) {
        //Aqui realizo el nombre del deposito y busco su id
        include_once 'agregarDeposito.php';
        //Esta la extraigo de "agregardeposito.php"
        $idDepositoAjusteInventario = $resultado_id_depositos['id'];
        //Lo envia el post
        $idConceptoAjusteInventario = $_POST['idConcepto'];
        //el ajuste
        $ajuste = $_POST['ajuste'];

        //Existencia que habia antes
        $sql_leer_existencia_movimiento = 'SELECT * FROM movimientos_deposito WHERE concepto_id=? and deposito_id=? and id = (SELECT MAX(id) from movimientos_deposito WHERE concepto_id=? and deposito_id=?)';
        $sentencia_leer_existencia_movimiento = $pdo->prepare($sql_leer_existencia_movimiento);
        $sentencia_leer_existencia_movimiento->execute(array($idConceptoAjusteInventario,$idDepositoAjusteInventario,$idConceptoAjusteInventario,$idDepositoAjusteInventario));
        $resultado_leer_existencia_movimiento = $sentencia_leer_existencia_movimiento->fetch();
        $existenciaAnterior = $resultado_leer_existencia_movimiento['existencia'];
        $sentencia_leer_existencia_movimiento = null;
        if ($existenciaAnterior == "") {
            $existenciaAnterior = 0;
        }
        if($ajuste >= $existenciaAnterior){
            header('location: ../ajuste-menor.html');
            die();
        }


        //Enviar a ajuste de inventario en la base de datos
        $sql_agregar_ajuste_det_inventario = 'INSERT INTO ajuste_det_inventario(ajuste_enc_inventario_id,concepto_id,deposito_id,existencia,ajuste) VALUES (?,?,?,?,?)';
        $sentencia_agregar_ajuste_det_inventario = $pdo->prepare($sql_agregar_ajuste_det_inventario);
        $sentencia_agregar_ajuste_det_inventario->execute(array($id_enc_ajuste_inventario, $idConceptoAjusteInventario,$idDepositoAjusteInventario,$existenciaAnterior,$ajuste));
        $sentencia_agregar_ajuste_det_inventario = null;

        //Enviar a movimientodeposito
        $sql_agregar_movimiento_deposito = 'INSERT INTO movimientos_deposito(concepto_id,deposito_id,existencia) VALUES (?,?,?)';
        $sentencia_agregar_movimiento_deposito = $pdo->prepare($sql_agregar_movimiento_deposito);
        $sentencia_agregar_movimiento_deposito->execute(array($idConceptoAjusteInventario,$idDepositoAjusteInventario,$ajuste));
        $sentencia_agregar_movimiento_deposito = null;
    
        
    }

    header('location: ../realizar-ajuste-inventario.php');
?>