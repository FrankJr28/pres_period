<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';

    $sql='SELECT id_m, modelo_m FROM microfono WHERE disp_m=1';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();
        
        $sql="SELECT * FROM carrito_micro WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->execute();
        
        $resultadoMic = $gsent->fetchAll();

        for ($i=count($resultadoMic)-1; $i>=0; $i--) {
            
            for ($k=count($resultado)-1; $k>=0; $k--) {

                if($resultadoMic[$i][1]==$resultado[$k][0]){

                    //echo $resultadoLam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                    
                    unset($resultado[$k]);
                    
                }

            }
        
        }

        echo '<select name="microfono">';
            
            echo '<option value=0>No necesito</option>';
            
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_m"].'>'.$dato["modelo_m"].'</option>';
            }
        echo '</select>';

    }

    /*if($gsent->rowCount()){
            echo '<select name="microfono">';
            echo '<option value=0>No necesito</option>';
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_m"].'>'.$dato["modelo_m"].'</option>';
            }
            echo '</select>';
        }
        else{
            echo "0";
        }*/
    
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>