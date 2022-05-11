<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    
    $sql='SELECT id_d, marca_d, modelo_d FROM deslizador WHERE disp_d=1';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();

        $sql="SELECT * FROM carrito_desl WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->execute();
        
        $resultadoDesl = $gsent->fetchAll();

        for ($i=count($resultadoDesl)-1; $i>=0; $i--) {
            
            for ($k=count($resultado)-1; $k>=0; $k--) {

                if($resultadoDesl[$i][1]==$resultado[$k][0]){

                    //echo $resultadoLam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                    
                    unset($resultado[$k]);
                    
                }

            }
        
        }

            echo '<select name="deslizador">';
            
            echo '<option value=0>No necesito</option>';
            
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_d"].'>'.$dato["marca_d"].' '.$dato["modelo_d"].'</option>';
            }
            echo '</select>';
        
    }

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;

?>