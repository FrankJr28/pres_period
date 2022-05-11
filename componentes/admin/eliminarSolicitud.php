<?php
    include '../../conexion.php';
    session_start();
    $idP = $_POST["id_pres"];
    $sql='DELETE FROM prestamo WHERE prestamo.id_pres=:idP';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado){
        echo "correcto";
    }
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>