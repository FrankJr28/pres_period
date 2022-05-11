<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inciar Sesión</title>
    <link rel="icon" href="img/logo_udeg_color.ico" >
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid d-flex flex-column justify-content-between" style="height:100vh">
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
        <div class="row flex-grow-1 d-flex justify-content-center">

                <div class="col-12 col-sm-10 col-md-8 col-lg-6 d-flex">
                    
                    <div class="col-12 align-self-center  border bg-light">
                        

                        <div class="row"><h4>Iniciar Sesión</h4></div>
                        <form method="post" action="#" id="formlogin">
                        <div class="mb-3 ">
                            <label for="exampleFormControlInput1" class="form-label">Código</label>
                            <input type="number" class="form-control" id="cod" name="codigo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="contra">
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mb-3 jus">Iniciar Sesión</button>
                        </div>
                        </form>

                    </div>

                </div>
        </div>
        <div class="row d-flex justify-content-center bg-light" style="height: 80px;">
            Derechos reservados ©1997 - 2021. Universidad de Guadalajara. Sitio desarrollado por el&nbsp<a href="http://www.cusur.udg.mx/es/galeria_de_imagenes/laboratorio-de-periodismo" class="text-decoration-none" >&nbsp Laboratorio de Periodismo</a>
        </div>
    </div>
    <script src="js/login.js" language="javascript" type="text/javascript"></script>
    <link rel="stylesheet" href="estilos/responsive.css">  
</body>
</html>