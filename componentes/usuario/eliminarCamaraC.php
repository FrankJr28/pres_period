<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idc = $_POST["id_c"];
    $sql='DELETE FROM carrito_cam WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_c=:idc';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idc',$idc,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>