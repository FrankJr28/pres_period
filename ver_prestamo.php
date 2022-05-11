<?php
    session_start();
    //echo $_POST["cod"];
    if(!isset($_POST["id_pres"]) || (!isset($_SESSION["admin"])&&!isset($_SESSION["usuario"])&&!isset($_SESSION["docente"]))){
        header("location:admin.php");
    }

    $noArticulos = 1;

    include 'conexion.php';
    $sql = 'SELECT * FROM prestamo 
        LEFT JOIN pres_cam on pres_cam.id_pres=prestamo.id_pres 
        LEFT JOIN camara on camara.id_c=pres_cam.id_c
        LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u
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



    $sql = 'SELECT * FROM prestamo
    LEFT JOIN pres_proy on pres_proy.id_pres = prestamo.id_pres
    LEFT JOIN proy on pres_proy.id_p = proy.id_p
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoProy = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_flash on pres_flash.id_pres = prestamo.id_pres
    LEFT JOIN flash on pres_flash.id_f = flash.id_f
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoFlash = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_desl on pres_desl.id_pres = prestamo.id_pres
    LEFT JOIN deslizador on pres_desl.id_d = deslizador.id_d
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoDesl = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_cgopro on pres_cgopro.id_pres = prestamo.id_pres
    LEFT JOIN camgopro on pres_cgopro.id_cgopro = camgopro.id_cgopro
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoCgopro = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_male on pres_male.id_pres = prestamo.id_pres
    LEFT JOIN maletin on pres_male.id_m = maletin.id_m
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoMale = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_g on pres_g.id_pres = prestamo.id_pres
    LEFT JOIN grabadora on pres_g.id_g = grabadora.id_g
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoGrab = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_tripie on pres_tripie.id_pres = prestamo.id_pres
    LEFT JOIN tripie on pres_tripie.id_t = tripie.id_t
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoTripie = $gsent->fetchAll();



    $sql='SELECT * FROM prestamo
    LEFT JOIN pres_otro on pres_otro.id_pres = prestamo.id_pres
    WHERE prestamo.id_pres='.$_POST["id_pres"];

    $gsent=$pdo->prepare($sql);

    $gsent->execute();

    $prestamoOtro = $gsent->fetchAll();

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;

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
                    <a class="nav-link" href="#">Hola <?php if(isset($_SESSION["admin"])){echo $_SESSION["admin"]['nombre_a'];}else if(isset($_SESSION["usuario"])){echo $_SESSION["usuario"]['nombre_u'];}
                    else{echo $_SESSION["docente"]['nombre_doc'];} ?></a>
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
        
            <?php if(isset($_SESSION["admin"])): ?>
        
                <p><b>Código: </b><?php echo ' '.$prestamo[0]["codigo_u"]; ?></p>
        
                <p><b>Usuario: </b><?php echo ' '.$prestamo[0]["nombre_u"].' '.$prestamo[0]["app_usu"].' '. $prestamo[0]["apm_usu"]; ?></p>
            
            <?php endif ?>
        
            <p><b>Fecha de inicio: </b><?php echo ' '.$prestamo[0]['fecha_pres']; ?></p>
            <p><b>Fecha fin: </b><?php echo ' '.$prestamo[0]['fecha_fin']; ?></p>
        </div>
        

        <h4>Articulos del prestamo</h4>
        <div class="m-2" >
            <?php if($prestamo[0]['id_c']!=NULL):?>

                <?php $noArticulos = 0; ?>
                <!-- rgb(104, 147, 227) -->
                <?php foreach($prestamo as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(201, 89, 89); color:white; border-radius: .8rem;">
                    
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
                        <!-- rgb(227, 192, 104) -->
                        <div class="m-3 p-4" style="background: rgb(201, 139, 89); color:white; border-radius: .8rem;">
                        
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
                <!-- 163, 227, 104 -->
                <?php foreach($prestamoLamp as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(201, 194, 87); color:white; border-radius: .8rem;">
                    
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

                    
            <?php if($prestamoProy[0]['id_p']!=NULL):?>

                <?php $noArticulos = 0; ?>

                <?php foreach($prestamoProy as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(163,201,87); color:white; border-radius: .8rem;">
                    
                        <h5>Proyector</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_p"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_p"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_p"]; ?></p>

                        <p><b>Maleta: </b><?php if($dato["maleta_p"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Cable corriente: </b><?php if($dato["cable_Luz"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Cable VGA: </b><?php if($dato["cable_Vga"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                <?php endforeach?>

            <?php endif ?>

            

            <?php if($prestamoFlash[0]['id_f']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoFlash as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(87, 201,114); color:white; border-radius: .8rem;">
                    
                        <h5>Flash</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_f"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_f"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_f"]; ?></p>

                        <p><b>Estuche: </b><?php if($dato["estuche_f"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Difusor: </b><?php if($dato["difusor_f"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Zapata: </b><?php if($dato["zapata_f"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                <?php endforeach?>

            <?php endif ?>
            
            
            
            <?php if($prestamoDesl[0]['id_d']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoDesl as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(87,201,155); color:white; border-radius: .8rem;">
                    
                        <h5>Deslizador</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_d"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_d"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_d"]; ?></p>

                        <p><b>Maleta: </b><?php if($dato["maleta_d"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Protector Zapata: </b><?php if($dato["protector_zap"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                <?php endforeach?>

            <?php endif ?>

            

            <?php if($prestamoCgopro[0]['id_cgopro']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoCgopro as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(87,180,201); color:white; border-radius: .8rem;">
                    
                        <h5>Cámara Go Pro</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_cgopro"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_cgopro"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_cgopro"]; ?></p>

                        <p><b>Memoria: </b><?php if($dato["mem_cgopro"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Batería: </b><?php if($dato["bateria_cgopro"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Batería extra: </b><?php if($dato["bateria_extra_cgopro"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Cargador dual: </b><?php if($dato["cargador_dual_cgopro"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Cable USB: </b><?php if($dato["cable_usb"]){ echo "Sí"; }else{ echo "No"; }; ?></p>


                    </div>
                <?php endforeach?>

            <?php endif ?>


            <?php if($prestamoMale[0]['id_m']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoMale as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(87,136,201); color:white; border-radius: .8rem;">
                    
                        <h5>Maletín</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_m"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_m"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_m"]; ?></p>

                        <p><b>Protector para lluvia: </b><?php if($dato["protect_lluvia"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Correa para hombro: </b><?php if($dato["correa_hombro"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                <?php endforeach?>

            <?php endif ?>


            <?php if($prestamoGrab[0]['id_g']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoGrab as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(87, 87, 201); color:white; border-radius: .8rem;">
                    
                        <h5>Grabadora</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_g"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_g"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_g"]; ?></p>

                        <p><b>Baterías: </b><?php if($dato["baterias_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                        <p><b>Cable audio: </b><?php if($dato["cabaudvid_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Cable datos: </b><?php if($dato["cabdat_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Esponja: </b><?php if($dato["esponja_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Estuche: </b><?php if($dato["estuche_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Soporte de mano: </b><?php if($dato["sopmano_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                        <p><b>Cargador: </b><?php if($dato["carga_g"]){ echo "Sí"; }else{ echo "No"; }; ?></p>

                    </div>
                <?php endforeach?>

            <?php endif ?>


            <?php if($prestamoTripie[0]['id_t']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoTripie as $dato): ?>
                    <div class="m-3 p-4" style="background: rgb(138, 87, 201); color:white; border-radius: .8rem;">
                    
                        <h5>Tripie</h5>
                            
                        <p><b>Id: </b><?php echo $dato["id_t"]; ?></p>

                        <p><b>Marca: </b><?php echo $dato["marca_t"]; ?></p>

                        <p><b>Modelo: </b><?php echo $dato["modelo_t"]; ?></p>

                        <p><b>Maleta: </b><?php if($dato["maleta_t"]){ echo "Sí"; }else{ echo "No"; }; ?></p>
                    
                    </div>
                <?php endforeach?>

            <?php endif ?>


            <?php if($prestamoOtro[0]['otro_P']!=NULL):?>

            <?php $noArticulos = 0; ?>

                <?php foreach($prestamoOtro as $dato): ?>
                    <div class="m-3 p-4" style="background: gray; color:white; border-radius: .8rem;">
                    
                        <h5><?php echo $dato["otro_P"]; ?></h5>
                            
                    </div>
                <?php endforeach?>

            <?php endif ?>


            <?php if($noArticulos):?>
    
                <div class="text-center d-flex align-items-center justify-content-center" style="color:gray;border-style:dashed;border-color:gray;border-radius: .8rem; height:6rem;">
    
                    <h5>No hay articulos en este préstamo</h5>

                </div>
                
            <?php endif ?>

            
        </div>

        
        <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
            Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
        </div>
    </div>
    <link href="css/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link rel="stylesheet" href="estilos/responsive.css">  
</body>
</html>