<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:login.php");
    }
    include '../../conexion.php';
    
    $sql='SELECT * FROM docente';
    
    $gsent=$pdo->prepare($sql);
    
    if($gsent->execute()){
        
        $resultado = $gsent->fetchAll();

        echo '<select name="docente">';
        
        echo '<option value=0>Sin docente</option>';
        
        foreach($resultado as $dato){
            echo '<option value='.$dato["id_doc"].'>'.$dato["nombre_doc"].' '.$dato["app_doc"].''.$dato["apm_doc"].'</option>';
        }
        echo '</select>';
        
    }

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;

?>