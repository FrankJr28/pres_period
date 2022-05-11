<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    
    $sql='SELECT id_c, modelo_c FROM camara WHERE disp_c=1';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();

        $sql="SELECT * FROM carrito_cam WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->execute();
        
        $resultadoCam = $gsent->fetchAll();

        for ($i=count($resultadoCam)-1; $i>=0; $i--) {
            
            for ($k=count($resultado)-1; $k>=0; $k--) {

                if($resultadoCam[$i][1]==$resultado[$k][0]){

                    //echo $resultadoCam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                    
                    unset($resultado[$k]);
                    
                }

            }
        
        }

        echo '<select name="camara">';
        
        echo '<option value=0>No necesito</option>';
        
        foreach($resultado as $dato){
            echo '<option value='.$dato["id_c"].'>'.$dato["modelo_c"].'</option>';
        }
        echo '</select>';

    }

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
    
?>