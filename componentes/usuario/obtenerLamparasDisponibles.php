<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    
    $sql='SELECT id_l, modelo_l FROM lamp WHERE disp_l=1';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();

        $sql="SELECT * FROM carrito_lamp WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->execute();
        
        $resultadoLam = $gsent->fetchAll();

        for ($i=count($resultadoLam)-1; $i>=0; $i--) {
            
            for ($k=count($resultado)-1; $k>=0; $k--) {

                if($resultadoLam[$i][1]==$resultado[$k][0]){

                    //echo $resultadoLam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                    
                    unset($resultado[$k]);
                    
                }

            }
        
        }

            echo '<select name="lampara">';
            
            echo '<option value=0>No necesito</option>';
            
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_l"].'>'.$dato["modelo_l"].'</option>';
            }
            echo '</select>';
        
    }

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;

?>