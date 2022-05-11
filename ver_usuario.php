<?php
    session_start();
    //echo $_POST["cod"];
    if(!isset($_POST["cod"])){
        header("location:admin.php");
    }
    if(!isset($_SESSION["admin"])){
        header("location:login.php");
    }
    include 'conexion.php';
    $sql='select * from usuario where usuario.codigo_u='.$_POST["cod"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $usu = $gsent->fetchAll();
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
    <title>Solicitudes</title>
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
                    <a class="navbar-brand" style="color:black;" href="#">Hola <?php echo $_SESSION["admin"]['nombre_a']; ?></a>
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
                <a class="nav-link" href="#">Hola <?php echo $_SESSION["admin"]['nombre_a']; ?></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="logout.php">Cerrar Sesión</a>
                </li>
                
            </ul>
            </div>
        </div>
        </nav>
        </div>
        <div class="m-5">
            <h1>Datos del usuario</h1>
            <p><b>Código: </b><?php echo ' '.$usu[0]['codigo_u']; ?></p>
            <p><b>Nombre: </b><?php echo ' '.$usu[0]['nombre_u']; ?></p>
            <p><b>Apellido paterno: </b><?php echo ' '.$usu[0]['app_usu']; ?></p>
            <p><b>Apellido materno: </b><?php echo ' '.$usu[0]['apm_usu']; ?></p>
            <p><b>Tipo usuario: </b><?php echo ' '.$usu[0]['tipo_u']; ?></p>
            <p><b>Télefono: </b><?php echo ' '.$usu[0]['tel_u']; ?></p>
            <p><b>Carrera: </b><?php echo ' '.$usu[0]['carrera_u']; ?></p>
            <p><b>Sector: </b><?php echo ' '.$usu[0]['sector']; ?></p>
        </div>    
        <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
            Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
        </div>
    </div>
    <script src="js/admin.js" language="javascript" type="text/javascript"></script>
    <link href="css/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet"> <!--load all styles -->
</body>
</html>