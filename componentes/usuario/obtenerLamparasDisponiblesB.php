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
        //var_dump($resultado);
        //echo "fin var";
        //echo $resultado[0][1];
            echo '<select name="lampara">';
            echo '<option value=0>No necesito</option>';
            
            foreach($resultado as $dato){
                echo '<option value='.$dato["id_l"].'>'.$dato["modelo_l"].'</option>';
            }
            echo '</select>';
            //https://www.generacodice.com/es/articolo/951778/PHP-compare-two-dimension-array
            
            $sql="SELECT * FROM carrito_lamp WHERE codigo_u=". $_SESSION["usuario"]["codigo_u"];
            //SELECT * FROM carrito_lamp WHERE codigo_u=218887446 GROUP by id_l
            $gsent=$pdo->prepare($sql);
            $gsent->execute();
            $resultadoLam = $gsent->fetchAll();
            //echo implode(", ",$resultadoLam[0]);
            //echo $resultadoLam[0]["id_l"];
            //echo $resultado[0][0];
            //echo gettype($resultadoLam);
            var_dump($resultadoLam);
            echo "count: ".count($resultadoLam);
            echo "<br> other line----------------------------------------- <br>";
            var_dump($resultado);

            for ($i=count($resultadoLam)-1; $i>=0; $i--) {
            //for ($i = 0; $i<count($resultadoLam); $i++) {    
                echo $resultadoLam[$i][1] ."<br><br>";
                
                for ($k=count($resultado)-1; $k>=0; $k--) {
                    
                    echo $resultado[$k][0] ."<br>";

                    if($resultadoLam[$i][1]==$resultado[$k][0]){

                        echo $resultadoLam[$i][1]." es igual a " . $resultado[$k][0] . "<br>"; 
                        
                        unset($resultado[$k]);
                        //array_splice($resultado, , 3);
                        
                    }

                    //unset($flowers[1]);

                }
            
            }

            var_dump($resultado);

            //echo gettype($resultado);

            //var_dump($resultadoLam);
            //echo "<br";
            //echo "<br resultado 1";
            //echo implode(", ",$resultado[1]);
            //$dif=array_diff_assoc($resultado[0],$resultadoLam[0]);

            //var_dump($dif);

            //echo implode(", ",$resultado[1]);
            /*
            echo "<br><br> en el foreach";
            foreach($resultado as $k1 => $arrays) {
                foreach($arrays as $k2 => $val) {
                    echo $resultado[$k1][$k2] . "  ...  " . $resultadoLam[$k1][$k2];
                    
                }
            } */// end of foreach



        
    }

/*
    $b = array(
        array('cuenta' => 1000), 
        array('cuenta' => 2000)
       );
   
   $a = array(
       array('cuenta' => 1000),
       array('cuenta' => 2000),
       array('cuenta' => 3000)
   );
   
   print_r($a);
   print_r($b);
   
   $d = array_udiff($a, $b, function($x, $y) use ($a, $b){
   if($x[1] == $y[1]){
       return 0;
   }else{
       return -1;
   }
   });
   echo "<pre>";
   print_r($d);
    */
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>