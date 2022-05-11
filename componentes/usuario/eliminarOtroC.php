<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idc = $_POST["id_otro"];
    $sql='DELETE FROM carrito_otro WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND otro=:idc';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idc',$idc,PDO::PARAM_STR);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>