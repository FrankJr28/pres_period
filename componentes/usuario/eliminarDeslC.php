<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idl = $_POST["id_d"];
    $sql='DELETE FROM carrito_desl WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_d=:idl';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idl',$idl,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>