<?php
include_once 'PDO.php';
    //Leer conceptos
    $sql_leer_conceptos = 'SELECT * FROM conceptos';
    $gsent_conceptos = $pdo->prepare($sql_leer_conceptos);
    $gsent_conceptos->execute();
    $resultado_conceptos = $gsent_conceptos->fetchAll();
    
    include_once 'leerdepositos.php';
    //Calcular el id encabezado del ajuste 
    $sql_leer_id_enc_ajuste_inventario = 'SELECT * FROM ajuste_enc_precio WHERE id = (SELECT MAX(id) from ajuste_enc_precio)';
    $sentencia_leer_id_enc_ajuste_inventario = $pdo->prepare($sql_leer_id_enc_ajuste_inventario);
    $sentencia_leer_id_enc_ajuste_inventario->execute(array());
    $resultado_leer_id_enc_ajuste_inventario = $sentencia_leer_id_enc_ajuste_inventario->fetch();
    $id_enc_ajuste_inventario = $resultado_leer_id_enc_ajuste_inventario['id'];

    if ($_POST) {
        $idConcepto = $_POST['idConcepto'];
        $nuevo_costo = $_POST['nuevo_costo'];

        //Leer conceptos
        $sql_leer_conceptos_precio = 'SELECT * FROM conceptos WHERE id = ?';
        $gsent_conceptos_precio = $pdo->prepare($sql_leer_conceptos_precio);
        $gsent_conceptos_precio->execute(array($idConcepto));
        $resultado_conceptos_precio = $gsent_conceptos_precio->fetch();
        $gsent_conceptos_precio = null;

        $precio = $resultado_conceptos_precio['precio'];
        $ultimo_costo = $resultado_conceptos_precio['ultimo_Costo'];
        $auxiliar = ($nuevo_costo*30)/100;
        $nuevo_precio = $auxiliar + $nuevo_costo;
        $aumento = $nuevo_precio - $precio;
        $utilidad = $nuevo_precio - $nuevo_costo;


        //Enviar a ajuste de precio en la base de datos
        $sql_agregar_ajuste_det_precio = 'INSERT INTO ajuste_det_precio(ajuste_enc_precio_id,concepto_id,precio,ultimo_costo,nuevo_costo,nuevo_precio,aumento) VALUES (?,?,?,?,?,?,?)';
        $sentencia_agregar_ajuste_det_precio = $pdo->prepare($sql_agregar_ajuste_det_precio);
        $sentencia_agregar_ajuste_det_precio->execute(array($id_enc_ajuste_inventario,$idConcepto,$precio,$ultimo_costo,$nuevo_costo,$nuevo_precio,$aumento));
        $sentencia_agregar_ajuste_det_inventario = null;

        //editar concepto
        $sql_editarConcepto = 'UPDATE  conceptos set precio=?, ultimo_Costo=?, utilidad=? WHERE id=?';
        $sentencia_editarConcepto = $pdo->prepare($sql_editarConcepto);
        $sentencia_editarConcepto->execute(array($nuevo_precio, $nuevo_costo,$utilidad, $idConcepto));
        
        $sentencia_editarConcepto = null;
        }

    header('location:../realizar-ajuste-precio.php');
?>