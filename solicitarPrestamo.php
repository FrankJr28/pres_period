<?php

include 'conexion.php';

session_start();

if(!isset($_SESSION["usuario"])){
    header("location:login.php");
}

//SELECT * FROM prestamo where fecha_fin IS NULL AND codigo_u='.$_SESSION["usuario"]["codigo_u"]


$sql='SELECT * FROM prestamo where fecha_fin IS NULL AND codigo_u='.$_SESSION["usuario"]["codigo_u"];
    
$gsent=$pdo->prepare($sql);

if(!$gsent->execute()){
    
    header("location:usuario.php");

}

$gsent->fetchAll();

$registros=$gsent->rowCount();

if($registros){
    //echo "hay ".$registros. "datos";
    header("location:usuario.php");
    
}


$doc = $_POST["docente"];

if($doc && $registros==0){
    
    $sql='INSERT INTO prestamo (codigo_u, id_doc) VALUES (:usu, :doc)';
    
    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(":usu",$_SESSION["usuario"]["codigo_u"],PDO::PARAM_INT);
    
    $gsent->bindParam(":doc",$doc,PDO::PARAM_INT);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

    //$sql="select top 1 * from prestamo where codigo_=219635753 order by id_pres desc limit 1" 

    $id_prestamo=$pdo->lastInsertId();

    /*              Cuantas lamparas            */

    $sql="select id_l from carrito_lamp where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $lamparas = $gsent->fetchAll();

    foreach ($lamparas as $dato) {
        
        $sql="insert into pres_lamp (id_pres,id_l) values (".$id_prestamo.",".$dato["id_l"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_lamp where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantas camaras            */

    $sql="select id_c from carrito_cam where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }

    $camaras = $gsent->fetchAll();


    foreach ($camaras as $dato) {
        
        $sql="insert into pres_cam (id_pres,id_c) values (".$id_prestamo.",".$dato["id_c"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_cam where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos microfonos            */

    $sql="select id_m from carrito_micro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $microfonos = $gsent->fetchAll();

    foreach ($microfonos as $dato) {
        
        $sql="insert into pres_micro (id_pres,id_m) values (".$id_prestamo.",".$dato["id_m"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_micro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos proyectores            */

    $sql="select id_p from carrito_proy where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $proyectores = $gsent->fetchAll();

    foreach ($proyectores as $dato) {
        
        $sql="insert into pres_proy (id_pres,id_p) values (".$id_prestamo.",".$dato["id_p"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_proy where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos flash            */

    $sql="select id_f from carrito_flash where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $flashes = $gsent->fetchAll();

    foreach ($flashes as $dato) {
        
        $sql="insert into pres_flash (id_pres,id_f) values (".$id_prestamo.",".$dato["id_f"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_flash where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos deslizadores            */

    $sql="select id_d from carrito_desl where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $deslizadores = $gsent->fetchAll();

    foreach ($deslizadores as $dato) {
        
        $sql="insert into pres_desl (id_pres,id_d) values (".$id_prestamo.",".$dato["id_d"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_desl where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantas GoPro            */

    $sql="select id_cgopro from carrito_cgopro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $lamparas = $gsent->fetchAll();

    foreach ($lamparas as $dato) {
        
        $sql="insert into pres_cgopro (id_pres,id_cgopro) values (".$id_prestamo.",".$dato["id_cgopro"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_cgopro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos maletines            */

    $sql="select id_m from carrito_maletin where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $lamparas = $gsent->fetchAll();

    foreach ($lamparas as $dato) {
        
        $sql="insert into pres_male (id_pres,id_m) values (".$id_prestamo.",".$dato["id_m"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_maletin where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantas grabadoras            */

    $sql="select id_g from carrito_grab where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $lamparas = $gsent->fetchAll();

    foreach ($lamparas as $dato) {
        
        $sql="insert into pres_g (id_pres,id_g) values (".$id_prestamo.",".$dato["id_g"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_grab where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos tripies            */

    $sql="select id_t from carrito_tripie where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $lamparas = $gsent->fetchAll();

    foreach ($lamparas as $dato) {
        
        $sql="insert into pres_tripie (id_pres,id_t) values (".$id_prestamo.",".$dato["id_t"].")";

        $gsent=$pdo->prepare($sql);

        $gsent->execute();

    }

    $sql="delete from carrito_tripie where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    /*              Cuantos otros            */

    $sql="select * from carrito_otro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    if(!$gsent->execute()){
        
        header("location:usuario.php");
    
    }


    $otros = $gsent->fetchAll();

    //var_dump($otros);
    /*
    foreach ($otros as $dato) {
        echo $dato["otro"];
    }
    */

    foreach ($otros as $dato) {
        
        $sql="insert into pres_otro (id_pres,otro_P) values (".$id_prestamo.",:otro)";

        $gsent=$pdo->prepare($sql);

        $gsent->bindParam(":otro",$dato["otro"],PDO::PARAM_STR);
        
        $gsent->execute();

    }

    $sql="delete from carrito_otro where codigo_u=".$_SESSION["usuario"]["codigo_u"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

}

header("location:usuario.php");
$gsent->closeCursor();
$gsent=null;
$pdo=null;

?>