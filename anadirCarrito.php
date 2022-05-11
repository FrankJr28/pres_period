<?php

include 'conexion.php';

session_start();

$cam = $_POST["camara"];

$lamp = $_POST["lampara"];

$micro = $_POST["microfono"];

$proy = $_POST["proyector"];

$flash = $_POST["flash"];

$desl = $_POST["deslizador"];

$camGoPro = $_POST["cgopro"];

$male = $_POST["maletin"];

$tripie = $_POST["tripie"];

$grab = $_POST["grabadora"];

$otro = $_POST["otro"];

if($cam){
    
    $sql='INSERT INTO carrito_cam (codigo_u, id_c) VALUES (:usu, :cam)';
    
    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":cam",$cam,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($lamp){

    $sql='INSERT INTO carrito_lamp (codigo_u, id_l) VALUES (:usu, :lamp)';

    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":lamp",$lamp,PDO::PARAM_INT);

    if(!$gsent->execute()){

        header("location:usuario.php");
    
    }

}

if($micro){
    
    $sql='INSERT INTO carrito_micro (codigo_u, id_m) VALUES (:usu, :micro)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":micro",$micro,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($proy){
    
    $sql='INSERT INTO carrito_proy (codigo_u, id_p) VALUES (:usu, :proy)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":proy",$proy,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($flash){
    
    $sql='INSERT INTO carrito_flash (codigo_u, id_f) VALUES (:usu, :flash)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":flash",$flash,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($desl){
    
    $sql='INSERT INTO carrito_desl (codigo_u, id_d) VALUES (:usu, :desl)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":desl",$desl,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($camGoPro){
    
    $sql='INSERT INTO carrito_cgopro (codigo_u, id_cgopro) VALUES (:usu, :cgopro)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":cgopro",$camGoPro,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($male){
    
    $sql='INSERT INTO carrito_maletin (codigo_u, id_m) VALUES (:usu, :male)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":male",$male,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($tripie){
    
    $sql='INSERT INTO carrito_tripie (codigo_u, id_t) VALUES (:usu, :tripie)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":tripie",$tripie,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($grab){
    
    $sql='INSERT INTO carrito_grab (codigo_u, id_g) VALUES (:usu, :grab)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":grab",$grab,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

if($otro){

    $sql='INSERT INTO carrito_otro (codigo_u, otro) VALUES (:usu, :otro)';
    
    $pdo->prepare("");

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":otro",$otro,PDO::PARAM_STR);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

}

header("location:usuario.php");
$gsent->closeCursor();
$gsent=null;
$pdo=null;

?>