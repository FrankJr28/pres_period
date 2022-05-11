<?php

session_start();
//echo $_POST["cod"];
if(!isset($_POST["id_pres"]) || (!isset($_SESSION["admin"])&&!isset($_SESSION["usuario"]))){
    header("location:admin.php");
}

$noArticulos = 1;

include 'conexion.php';
$sql = 'SELECT * FROM prestamo 
    LEFT JOIN pres_cam on pres_cam.id_pres=prestamo.id_pres 
    LEFT JOIN camara on camara.id_c=pres_cam.id_c 
    where prestamo.id_pres='.$_POST["id_pres"];

$gsent=$pdo->prepare($sql);

$gsent->execute();

$prestamo = $gsent->fetchAll();



$sql = 'SELECT * FROM prestamo 
    LEFT JOIN pres_micro on pres_micro.id_pres = prestamo.id_pres
    LEFT JOIN microfono on pres_micro.id_m = microfono.id_m
    where prestamo.id_pres='.$_POST["id_pres"];

$gsent=$pdo->prepare($sql);

$gsent->execute();

$prestamoMicro = $gsent->fetchAll();



$sql = 'SELECT * FROM prestamo 
    LEFT JOIN pres_lamp on pres_lamp.id_pres = prestamo.id_pres
    LEFT JOIN lamp on pres_lamp.id_l = lamp.id_l
    where prestamo.id_pres='.$_POST["id_pres"];

$gsent=$pdo->prepare($sql);

$gsent->execute();

$prestamoLamp = $gsent->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalles prestamo</title>
<link rel="icon" href="img/logo_udeg_color.ico" >

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid d-flex flex-column justify-content-between" style="height:100vh">
    <div>
        <div class="row d-flex flex-col flex-lg-row ">    
            <div class="col-4 col-xl-3"> 
                <a href="http://www.cusur.udg.mx/es/" style="padding-bottom:1rem; padding-top:1rem;"><img src="./img/ludgycus.png" class="img-fluid"></a>
            </div>
            <div class="col-8 col-sm-6 col-xl-7 m-auto bg-light">
                <div class="m-auto" style="text-align:center">
                    <h2>Laboratorio de periodismo</h2>
                </div>
            </div> 
            <div class="col-0 col-sm-2 col-xl-2 d-flex justify-content-center .logo"> 
                <a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="d-flex justify-content-center .logo" style="width:75%; height:75%; padding-bottom:1rem; padding-top:1rem;" ><img src="./img/logoLab.jpg" class="img-fluid logo"  ></a>
            </div>
        </div>

    <div class="collapse" id="navbarExternalCont">
        <div class="bg-light p-4">
            <div class="row">
                <a class="navbar-brand" style="color:black;" href="#">Hola <?php if(isset($_SESSION["admin"])){echo $_SESSION["admin"]['nombre_a'];}else{echo $_SESSION["usuario"]['nombre_u'];} ?></a>
            </div>
            <div class="row">
                <a class="navbar-brand active" style="color:black;" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExternalCont" aria-controls="navbarExternalCont" aria-expanded="false" aria-label="Toggle navigation" id="nvbtn">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                <a class="nav-link" href="#">Hola <?php if(isset($_SESSION["admin"])){echo $_SESSION["admin"]['nombre_a'];}else{echo $_SESSION["usuario"]['nombre_u'];} ?></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="logout.php">Cerrar Sesión</a>
                </li>
                
            </ul>
            </div>
        </div>
        </nav>
    </div>

    <h1>Datos del prestamo</h1>
    
    <div class="m-5">
        <p><b>Código: </b><?php echo ' '.$prestamo[0][0]; ?></p>
        <p><b>Fecha de inicio: </b><?php echo ' '.$prestamo[0]['fecha_pres']; ?></p>
        <p><b>Fecha fin: </b><?php echo ' '.$prestamo[0]['fecha_fin']; ?></p>
    </div>
    

    <h4>Articulos del prestamo</h4>
    <div class="m-2" >
        <?php if($prestamo[0]['id_c']!=NULL):?>

            <?php $noArticulos = 0; ?>

            <?php foreach($prestamo as $dato): ?>
                <div class="m-3 p-4" style="background: rgb(104, 147, 227); color:white; border-radius: .8rem;">
                
                    <h5>Cámara</h5>
                    
                    <p><b>Id: </b><?php echo $dato["id_c"]; ?></p>
                    
                    <p><b>Modelo: </b><?php echo $dato["modelo_c"]; ?></p>

                    <p><b>Baterias: </b><?php if($dato["baterias_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                
                    <p><b>Cable de audio: </b><?php if($dato["cabaud_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Cable de vídeo: </b><?php if($dato["cabvid_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Tapa: </b><?php if($dato["tapa_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Maleta: </b><?php if($dato["maleta_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>correa: </b><?php if($dato["baterias_c"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                
                </div>
            <?php endforeach?>

        <?php endif ?>

        
        
        <?php if($prestamoMicro[0]['id_m']!=NULL):?>
            
            <?php $noArticulos = 0; ?>

            <?php $id_ant = 0; ?>
            
            <?php foreach($prestamoMicro as $dato): ?>
        
                <?php if($dato['id_m']!=$id_ant): ?>

                    <div class="m-3 p-4" style="background: rgb(227, 192, 104); color:white; border-radius: .8rem;">
                    
                        <h5>Microfono</h5>
                        
                        <p><b>Id: </b><?php echo $dato["id_m"]; ?></p>
                        
                        <?php $id_ant = $dato["id_m"]; ?>

                        <p><b>Modelo: </b><?php echo $dato["modelo_m"]; ?></p>

                        <p><b>Baterias: </b><?php if($dato["baterias_m"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Esp: </b><?php if($dato["esp_m"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Estuche: </b><?php if($dato["estuche_m"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                
                <?php endif ?>

            <?php endforeach?>

        <?php endif ?>


        <?php if($prestamoLamp[0]['id_l']!=NULL):?>

            <?php $noArticulos = 0; ?>

            <?php foreach($prestamoLamp as $dato): ?>
                <div class="m-3 p-4" style="background: rgb(163, 227, 104); color:white; border-radius: .8rem;">
                
                    <h5>Lampara</h5>
                        
                    <p><b>Id: </b><?php echo $dato["id_l"]; ?></p>
                    
                    <?php $id_ant = $dato["id_l"]; ?>

                    <p><b>Modelo: </b><?php echo $dato["modelo_l"]; ?></p>

                    <p><b>Baterias: </b><?php if($dato["baterias_l"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                
                    <p><b>Tapa: </b><?php if($dato["tapa_l"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Estuche: </b><?php if($dato["estuche_l"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Correa: </b><?php if($dato["correa_l"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    <p><b>Cargador: </b><?php if($dato["carga_l"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                
                </div>
            <?php endforeach?>

        <?php endif ?>


        <?php if($noArticulos):?>

            <div class="text-center" style="color:gray;">

                <h5>No hay articulos en este préstamo</h5>

            </div>
            
        <?php endif ?>

        
    </div>

    
    <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
        Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
    </div>
</div>
<script src="js/admin.js" language="javascript" type="text/javascript"></script>
<link href="css/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet"> <!--load all styles -->
<link rel="stylesheet" href="estilos/responsive.css">  
</body>
</html>