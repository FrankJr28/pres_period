<?php
    
    include '../../conexion.php';
    
    session_start();

    $material = 1;
    
    $idP = $_POST["id_pres"];

    /*      Lamparas        */

    $sql='select disp_l from lamp left join pres_lamp on pres_lamp.id_l = lamp.id_l where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoLamparas = $gsent->fetchAll();

    foreach($edoLamparas as $lamp){
        if(!$lamp["disp_l"]){
            $material=0; 
        }

    }

    /*      Microfono      */
    $sql='select disp_m from microfono left join pres_micro on pres_micro.id_m = microfono.id_m where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoMicrofonos = $gsent->fetchAll();

    foreach($edoMicrofonos as $lamp){
        if(!$lamp["disp_m"]){
            $material=0; 
        }
    }

    /*      Camaras     */
    $sql='select disp_c from camara left join pres_cam on pres_cam.id_c = camara.id_c where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoMicrofonos = $gsent->fetchAll();

    foreach($edoMicrofonos as $lamp){
        if(!$lamp["disp_c"]){
            $material=0; 
        }
    }

    /*      Proyectores     */
    $sql='select disp_p from proy left join pres_proy on pres_proy.id_p = proy.id_p where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoProyectores = $gsent->fetchAll();

    foreach($edoProyectores as $lamp){
        if(!$lamp["disp_p"]){
            $material=0; 
        }
    }

    /*      Flashes     */
    $sql='select disp_f from flash left join pres_flash on pres_flash.id_f = flash.id_f where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoFlashes = $gsent->fetchAll();

    foreach($edoFlashes as $art){
        if(!$art["disp_f"]){
            $material=0; 
        }
    }

    /*      Deslizadores     */
    $sql='select disp_d from deslizador left join pres_desl on pres_desl.id_d = deslizador.id_d where id_pres=:idP';

    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $gsent->execute();

    $edoDeslizador = $gsent->fetchAll();

    foreach($edoDeslizador as $art){
        if(!$art["disp_d"]){
            $material=0; 
        }
    }

    /*      Camara  Go Pro     */
    $sql='select disp_cgopro from camgopro left join pres_cgopro on pres_cgopro.id_cgopro = camgopro.id_cgopro where id_pres=:idP';

    $gsent=$pdo->prepare($sql);

    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

    $gsent->execute();

    $edoCamGoPro = $gsent->fetchAll();

    foreach($edoCamGoPro as $art){
        if(!$art["disp_cgopro"]){
            $material=0; 
        }
    }

    /*      Maletines     */
    $sql='select disp_m from maletin left join pres_male on pres_male.id_m = maletin.id_m where id_pres=:idP';

    $gsent=$pdo->prepare($sql);

    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

    $gsent->execute();

    $edoMaletin = $gsent->fetchAll();

    foreach($edoMaletin as $art){
        if(!$art["disp_m"]){
            $material=0; 
        }
    }      
    
    /*      Tripies     */
    $sql='select disp_t from tripie left join pres_tripie on pres_tripie.id_t = tripie.id_t where id_pres=:idP';

    $gsent=$pdo->prepare($sql);

    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

    $gsent->execute();

    $edoMaletin = $gsent->fetchAll();

    foreach($edoMaletin as $art){
        if(!$art["disp_t"]){
            $material=0; 
        }
    }  

    /*      Grabadoras     */
    $sql='select disp_g from grabadora left join pres_g on pres_g.id_g = grabadora.id_g where id_pres=:idP';

    $gsent=$pdo->prepare($sql);

    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

    $gsent->execute();

    $edoMaletin = $gsent->fetchAll();

    foreach($edoMaletin as $art){
        if(!$art["disp_g"]){
            $material=0; 
        }
    }  

    //$sql='DELETE FROM prestamo WHERE prestamo.id_pres=:idP';
    if($material){
        $sql='UPDATE prestamo SET prestamo.estado=1 WHERE id_pres=:idP';
        
        $gsent=$pdo->prepare($sql);
        
        $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
        
        $estado=$gsent->execute();

        if($estado){
        
            echo "correcto";

            /*      Lamparas        */

            $sql='select id_l from pres_lamp where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE lamp SET disp_l=0 where id_l=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_l"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Microfonos      */

            $sql='select id_m from pres_micro where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE microfono SET disp_m=0 where id_m=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_m"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Camaras      */

            $sql='select id_c from pres_cam where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE camara SET disp_c=0 where id_c=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_c"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Proyectores      */

            $sql='select id_p from pres_proy where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE proy SET disp_p=0 where id_p=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_p"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Flashes      */

            $sql='select id_f from pres_flash where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE flash SET disp_f=0 where id_f=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_f"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Deslizadores      */

            $sql='select id_d from pres_desl where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE deslizador SET disp_d=0 where id_d=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_d"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Camara Go Pro      */

            $sql='select id_cgopro from pres_cgopro where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE camgopro SET disp_cgopro=0 where id_cgopro=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_cgopro"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Maletines      */

            $sql='select id_m from pres_male where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE maletin SET disp_m=0 where id_m=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_m"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Tripie      */

            $sql='select id_t from pres_tripie where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $lamparas = $gsent->fetchAll();

            foreach($lamparas as $l){

                $sql='UPDATE tripie SET disp_t=0 where id_t=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_t"],PDO::PARAM_INT);
        
                $gsent->execute();
            }

            /*      Grabadoras      */

            $sql='select id_g from pres_g where id_pres=:idP'; 

            $gsent=$pdo->prepare($sql);
        
            $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

            $gsent->execute();

            $grabadoras = $gsent->fetchAll();

            foreach($grabadoras as $l){

                $sql='UPDATE grabadora SET disp_g=0 where id_g=:idL';

                $gsent=$pdo->prepare($sql);

                $gsent->bindParam(':idL',$l["id_g"],PDO::PARAM_INT);
        
                $gsent->execute();
            }
        }
    }

    else{
        echo "ocupado";
    }

    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>