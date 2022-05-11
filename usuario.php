<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include 'conexion.php';
    
    $sql="SELECT * FROM carrito_cam WHERE codigo_u=".$_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    if($gsent->execute()){
    
        $resultadoCam = $gsent->fetchAll();
    
    }

    $sql="SELECT * FROM carrito_lamp WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoLam = $gsent->fetchAll();
    //var_dump($resultadoLam);

    /*                          Microfono                           */

    $sql="SELECT * FROM carrito_micro WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoMicro = $gsent->fetchAll();

    /*                          Proyector                            */

    $sql="SELECT * FROM carrito_proy WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoProy = $gsent->fetchAll();

    /*                          Flash                               */

    $sql="SELECT * FROM carrito_flash WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoFlash = $gsent->fetchAll();

    /*                          Deslizador                          */

    $sql="SELECT * FROM carrito_desl WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoDesl = $gsent->fetchAll();

    /*                          Camara Go Pro                       */

    $sql="SELECT * FROM carrito_cgopro WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoCamGoPro = $gsent->fetchAll();

    /*                          Maletin                             */

    $sql="SELECT * FROM carrito_maletin WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoMale = $gsent->fetchAll();

    /*                          Tripie                             */

    $sql="SELECT * FROM carrito_tripie WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoTripie = $gsent->fetchAll();

    /*                          Grabadora                             */

    $sql="SELECT * FROM carrito_grab WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoGrab = $gsent->fetchAll();
    
    /*                          Otro                             */

    $sql="SELECT * FROM carrito_otro WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultadoOtro = $gsent->fetchAll();

    /**/ 

    $sql="SELECT * FROM prestamo WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultado = $gsent->fetchAll();

    $sql='SELECT * FROM prestamo where fecha_fin IS NULL AND codigo_u='.$_SESSION["usuario"]["codigo_u"];
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $activos = $gsent->fetchAll();

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
    <prev><?php //var_dump($resultadoCam); ?></prev>
    <div class="container-fluid d-flex flex-column justify-content-between">
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
                        <a class="navbar-brand" style="color:black;" href="#">Hola <?php echo $_SESSION["usuario"]['nombre_u']; ?></a>
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
                        <a class="nav-link" href="#">Hola <?php echo $_SESSION["usuario"]['nombre_u']; ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="logout.php">Cerrar Sesión</a>
                        </li>
                        
                    </ul>
                    </div>
                </div>
            </nav>


        </div>

        <div class="container-fluis">
            <h3>Material a solicitar</h3>
            <div class="table-responsive mb-4"  style="min-height: 15rem">
                <table class="table table-striped table-hover">
                    <thead style="background-color:#69879A; color:#ffffff">
                        <tr>
                        <th scope="col">Articulo</th>
                        <th scope="col" >Id</th>
                        <th scope="col" class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="ttable-r">
                        <?php foreach($resultadoCam as $dato): ?>
                            <tr>
                                <td>Camara</td>
                                <td><?php echo $dato["id_c"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteCamara"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoLam as $dato): ?>
                            <tr>
                                <td>Lampara</td>
                                <td><?php echo $dato["id_l"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteLampara"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>
                        
                        
                        <?php foreach($resultadoMicro as $dato): ?>
                            <tr>
                                <td>Microfono</td>
                                <td><?php echo $dato["id_m"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteMicrofono"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoProy as $dato): ?>
                            <tr>
                                <td>Proyector</td>
                                <td><?php echo $dato["id_p"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteProy"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoFlash as $dato): ?>
                            <tr>
                                <td>Flash</td>
                                <td><?php echo $dato["id_f"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteFlash"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoDesl as $dato): ?>
                            <tr>
                                <td>Deslizador</td>
                                <td><?php echo $dato["id_d"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteDesl"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoCamGoPro as $dato): ?>
                            <tr>
                                <td>Camara Go Pro</td>
                                <td><?php echo $dato["id_cgopro"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteCamGoPro"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoMale as $dato): ?>
                            <tr>
                                <td>Maletin</td>
                                <td><?php echo $dato["id_m"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteMaletin"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoTripie as $dato): ?>
                            <tr>
                                <td>Tripie</td>
                                <td><?php echo $dato["id_t"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteTripie"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoGrab as $dato): ?>
                            <tr>
                                <td>Grabadora</td>
                                <td><?php echo $dato["id_g"]; ?></td>
                                <td class="text-center"><a href="#" class="deleteGrabadora"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        <?php foreach($resultadoOtro as $dato): ?>
                            <tr>
                                <td><?php echo $dato["otro"]; ?></td>
                                <td></td>
                                <td class="text-center"><a href="#" class="deleteOtro"><i class="fas fa-trash mx-1" style="color:red;"></i></a></td>
                            </tr>
                        <?php endforeach?>

                        </tbody>
                </table>
            </div>

        </div>
        
        <div class="modal" tabindex="-1" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Materiales</h5>
                        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">&times</button>
                    </div>
                    <form action="anadirCarrito.php" method="post">
                        
                        <div class="modal-body" id="modal-body">
                            <!---<p>Modal body text goes here.</p>-->
                            <div class="justify-content-start">
                            <h6>Camaras:</h6><div id="camaras-s"></div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <h6>Microfonos:</h6> <div id="microfonos-s"></div>
                        </div>
                        
                        <div class="modal-body">
                            <h6>Lamparas</h6> <div id="lamparas-s"></div>
                        </div>
                        
                        <div class="modal-body">
                            <h6>Proyectores</h6> <div id="proyectores-s"></div>
                        </div>
                        
                        <div class="modal-body">
                            <h6>Flash:</h6> <div id="flash-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Deslizadores:</h6> <div id="deslizadores-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Camara GoPro:</h6> <div id="camarasgopro-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Maletines:</h6> <div id="maletines-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Tripies:</h6> <div id="tripies-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Grabadoras:</h6> <div id="grabadoras-s"></div>
                        </div>

                        <div class="modal-body">
                            <h6>Otro:</h6><input type="text" name="otro">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="modalSolicitud">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Seleccione el docente que avala el préstamo</h5>
                        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">&times</button>
                    </div>
                    <form action="solicitarPrestamo.php" method="post">
                        <div class="modal-body" id="modal-body">
                            <!---<p>Modal body text goes here.</p>-->
                            <div class="justify-content-start">
                            <h6>Docente:</h6><div id="docente_select"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Solicitar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end align-content-top">
            
            <button class="btn btn-primary me-md-2 mr-3" type="button" data-toggle='modal' data-target="#modal" id="btnSeleccionar">Añadir material</button>
            
            <button class="btn btn-primary me-md-2" type="button" data-toggle='modal' data-target="#modalSolicitud" id="btnSolicitar">Solicitar Préstamo</button>
        
        </div>
        <hr>
        <!---->

        <h4>Prestamo activo</h4>

        <?php foreach($activos as $activo):?>
        

            <form method="post" id="form<?php echo ($activo['id_pres']); ?>" action="ver_prestamo.php">
                                
                <div style="cursor:pointer" class="checkTicket"><input type="hidden" name="id_pres" value=<?php echo ($activo['id_pres']); ?>><?php echo ($activo['id_pres']); ?></div>
            
            </form>


            <div>Fecha de inicio: <?php echo ($activo['fecha_pres']); ?> </div>

            <hr>

        <?php endforeach ?>

        <h4>Mis Prestamos Concluidos</h4>
        <div class="table-responsive mb-4"  style="min-height: 15rem">
            <table class="table table-striped table-hover" id="example">
                <thead style="background-color:#69879A; color:#ffffff">
                    <tr>
                    <th scope="col">N° prestamo</th>
                    <th scope="col" >Inició</th>
                    <th scope="col">Finalizó</th>
                    </tr>
                </thead>
                <tbody id="ttable-r">
                    <?php foreach($resultado as $dato): ?>
                        <tr>
                            
                            <td>

                                <form method="post" name="forma<?php echo ($dato['id_pres']); ?>" id="form<?php echo ($dato['id_pres']); ?>" action="ver_prestamo.php">
                                
                                    <div style="cursor:pointer" class="checkTicket"><input type="hidden" name="id_pres" value=<?php echo ($dato['id_pres']); ?>><?php echo ($dato['id_pres']); ?></div>
                                
                                </form>
                                
                            </td>

                            <td><?php echo date('Y-m-d', strtotime($dato["fecha_pres"])); ?></td>
                            
                            <td><?php echo date('Y-m-d', strtotime($dato["fecha_fin"])); ?></td>
                        
                        </tr>
                    <?php endforeach?>
                    </tbody>
            </table>
        </div>
                
        <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
            Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
        </div>
    </div>
    <script src="js/usuario.js" language="javascript" type="text/javascript"></script>
    
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