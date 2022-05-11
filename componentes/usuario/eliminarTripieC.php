<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    $idt = $_POST["id_t"];
    $sql='DELETE FROM carrito_tripie WHERE codigo_u='.$_SESSION["usuario"]['codigo_u'].' AND id_t=:idt';
    $gsent=$pdo->prepare($sql);
    $gsent->bindParam(':idt',$idt,PDO::PARAM_INT);
    $estado=$gsent->execute();
    if($estado)
        echo "correcto";
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;        
?>