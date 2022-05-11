<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idl = $_POST["id_l"];
    $sql='DELETE FROM carrito_lamp WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_l=:idl';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idl',$idl,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>