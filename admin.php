<?php
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location:login.php");
    }
    include 'conexion.php';
$sql='SELECT prestamo.*, usuario.codigo_u, usuario.nombre_u from prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE fecha_fin is NOT NULL';
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
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
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

</head>
<body>
    <div class="container-fluid d-flex flex-column justify-content-between" style="min-height:100vh">
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

        <h4>Solicitudes pendientes</h4>
        <div class="table-responsive mb-4" style="min-height: 15rem">
            <table class="table table-striped table-hover">
                <thead style="background-color:#69879A; color:#ffffff">
                    <tr>
                    <th scope="col">N° prestamo</th>
                    <th scope="col">Código</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Aval</th>
                    <th scope="col" >fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col" >Acciones</th>
                    </tr>
                </thead>
                <tbody id="ttable">
                    <tr>
                        <th scope="row">1</th>
                        <td>216985325</td>
                        <td>José Manuel</td>
                        <td>2021-11-10</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle mx-1" style="color:green;"></i></a>
                            <a href="#" class="edit"><i class="fas fa-times-circle mx-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>205698324</td>
                        <td>Luis Diego</td>
                        <td>2021-11-16</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle mx-1" style="color:green;"></i></a>
                            <a href="#" class="edit"><i class="fas fa-times-circle mx-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <form method="post" name="forma" action="ver_usuario.php">
                                <div style="cursor:pointer" onclick="enviar()"><input >219856663</div>
                            </form>
                        </td>
                        <td>Melina</td>
                        <td>2021-11-07</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle m-1" style="color:green;"></i></a>

                            

                            <a href="#" class="edit"><i class="fas fa-times-circle m-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!----->
        <h4>Prestamos Activos</h4>
        <div class="table-responsive mb-4"  style="min-height: 15rem">
            <table class="table table-striped table-hover">
                <thead style="background-color:#69879A; color:#ffffff">
                    <tr>
                    <th scope="col">N° prestamo</th>
                    <th scope="col">Código</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col" >fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col" >Acciones</th>
                    </tr>
                </thead>
                <tbody id="ttable-a">
                    <tr>
                        <th scope="row">1</th>
                        <td>216985325</td>
                        <td>José Manuel</td>
                        <td>2021-11-10</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle mx-1" style="color:green;"></i></a>
                            <a href="#" class="edit"><i class="fas fa-times-circle mx-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>205698324</td>
                        <td>Luis Diego</td>
                        <td>2021-11-16</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle mx-1" style="color:green;"></i></a>
                            <a href="#" class="edit"><i class="fas fa-times-circle mx-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>
                            <form method="post" name="forma" action="ver_usuario.php">
                                <div style="cursor:pointer" onclick="enviar()"><input >219856663</div>
                            </form>
                        </td>
                        <td>Melina</td>
                        <td>2021-11-07</td>
                        <td class="d-flex justify-content-center">
                            <a href="#" class="edit"><i class="fas fa-check-circle m-1" style="color:green;"></i></a>
                            <a href="#" class="edit"><i class="fas fa-times-circle m-1" style="color:red;"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!----->
        <h4>Prestamos Realizados</h4>
        <div class="table-responsive mb-4"  style="height: min-content;">
            <table class="table table-striped table-hover" id="example" >
                <thead style="background-color:#69879A; color:#ffffff">
                    <tr>
                    <th scope="col">N° prestamo</th>
                    <th scope="col">Código</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col" >Inició</th>
                    <th scope="col">Finalizó</th>
                    </tr>
                </thead>
                <tbody id="ttable-r">
                    <?php foreach($resultado as $dato): ?>
                        <tr>
                            <td>
                                <form method="post" name="forma<?php echo ($dato['id_pres']); ?>" id="form<?php echo ($dato['id_pres']); ?>" action="ver_prestamo.php">
                                    <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="id_pres" value=<?php echo ($dato['id_pres']); ?>><?php echo ($dato['id_pres']); ?></div>
                                </form>
                                
                            </td>

                            <td>
                                <form method="post" name="forma<?php echo ($dato['codigo_u']); ?>" id="form<?php echo ($dato['codigo_u']); ?>" action="ver_usuario.php">
                                    <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="cod" value=<?php echo ($dato['codigo_u']); ?>><?php echo ($dato['codigo_u']); ?></div>
                                </form>
                                
                            </td>
                            <td><?php echo ($dato["nombre_u"]); ?></td>
                            <td><?php echo date('Y-m-d', strtotime($dato["fecha_pres"])); ?></td>
                            <td><?php echo date('Y-m-d', strtotime($dato["fecha_fin"])); ?></td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
            </table>
        </div>
        <!----->
        
        <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
            Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
        </div>
    </div>
    <script src="js/admin.js" language="javascript" type="text/javascript"></script>
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    <link href="css/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link rel="stylesheet" href="estilos/responsive.css">  
</body>
</html>