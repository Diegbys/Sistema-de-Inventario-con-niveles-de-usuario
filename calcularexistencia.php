<?php
    if ($_POST) {
        $idConceptoCargo = $_POST['idConcepto'];

        $sqlUsuario = 'SELECT * FROM usuarios WHERE nombre = ?';
        $sentenciaUsuario = $pdo->prepare($sqlUsuario);
        $sentenciaUsuario->execute(array($Usuario));
        $resultadoUsuario = $sentenciaUsuario->fetch();
    }
?>