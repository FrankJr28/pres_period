<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idm = $_POST["id_m"];
    $sql='DELETE FROM carrito_maletin WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_m=:idc';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idc',$idm,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>