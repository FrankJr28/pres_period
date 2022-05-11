<?php
    try{
        include '../../conexion.php';
        //$pdo->prepare('');
        $sql="SELECT codigo_u, nombre_u FROM usuario WHERE codigo_u=:cod AND contra_ui=:contra";
        $resultado=$pdo->prepare($sql);
        $code=$_POST["codigo"];
        $pass=$_POST["contra"];
        $resultado->bindParam(':cod',$code,PDO::PARAM_INT);
        $resultado->bindParam(':contra',$pass,PDO::PARAM_STR);
        
        $resultado->execute();
        $ar=$resultado->fetchAll();
        $numeroRegistros=$resultado->rowCount();
        
        if($numeroRegistros!=0){
            session_start();
            $_SESSION["usuario"]=$ar[0];
            echo "u";
        }
        else{
            //$pdo->prepare('');
            $sql="SELECT nombre_a FROM admin WHERE id_a=:cod AND contra_a=:contra";
            
            $resultado=$pdo->prepare($sql);
            
            $resultado->bindParam(':cod',$code,PDO::PARAM_INT);
            
            $resultado->bindParam(':contra',$pass,PDO::PARAM_STR);
            
            $resultado->execute();
            
            $ar=$resultado->fetchAll();
            
            $numeroRegistros=$resultado->rowCount();
            
            if($numeroRegistros!=0){
                session_start();
                $_SESSION["admin"]=$ar[0];
                echo "a";
            }
            else{

                $sql="SELECT id_doc, nombre_doc FROM docente WHERE id_doc=:cod AND contra_doc=:contra";
            
                $resultado=$pdo->prepare($sql);
                
                $resultado->bindParam(':cod',$code,PDO::PARAM_INT);
                
                $resultado->bindParam(':contra',$pass,PDO::PARAM_STR);
                
                $resultado->execute();
                
                $ar=$resultado->fetchAll();
                
                $numeroRegistros=$resultado->rowCount();
                
                if($numeroRegistros!=0){
                    
                    session_start();
                    
                    $_SESSION["docente"]=$ar[0];
                    
                    echo "d";

                }

                else{

                    echo "fallido";

                }
                
            }
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
    $resultado->closeCursor();
    $resultado=null;
    $pdo=null;
?>