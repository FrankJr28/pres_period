<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idt = $_POST["id_g"];
    $sql='DELETE FROM carrito_grab WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_g=:idg';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idg',$idt,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;        
?>