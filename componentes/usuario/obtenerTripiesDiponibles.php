<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    
    $sql='SELECT * FROM tripie WHERE disp_t=1';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();

        $sql="SELECT * FROM carrito_tripie WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->execute();
        
        $resultadoFlash = $gsent->fetchAll();

        for ($i=count($resultadoFlash)-1; $i>=0; $i--) {
            
            for ($k=count($resultado)-1; $k>=0; $k--) {

                if($resultadoFlash[$i][1]==$resultado[$k][0]){

                    //echo $resultadoLam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                    
                    unset($resultado[$k]);
                    
                }

            }
        
        }

            echo '<select name="tripie">';
            
            echo '<option value=0>No necesito</option>';
            
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_t"].'>'.$dato["marca_t"].' '.$dato["modelo_t"].'</option>';
            }
            echo '</select>';
        
    }
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;

?>