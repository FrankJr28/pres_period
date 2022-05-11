<?php
    include '../../conexion.php';
    
    session_start();
    
    $idP = $_POST["id_pres"];
    
    //$sql='DELETE FROM prestamo WHERE prestamo.id_pres=:idP';
    
    $sql='UPDATE prestamo SET fecha_fin=current_timestamp() WHERE id_pres=:idP';
    
    $gsent=$pdo->prepare($sql);
    
    $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);
    
    $estado=$gsent->execute();
    
    if($estado){
    
        echo "correcto";

        $sql='select id_l from pres_lamp where id_pres=:idP'; 

        $gsent=$pdo->prepare($sql);
    
        $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

        $gsent->execute();

        $lamparas = $gsent->fetchAll();

        foreach($lamparas as $l){

            $sql='UPDATE lamp SET disp_l=1 where id_l=:idL';

            $gsent=$pdo->prepare($sql);

            $gsent->bindParam(':idL',$l["id_l"],PDO::PARAM_INT);
    
            $gsent->execute();
        }
        /**/

        /*      Microfonos      */

        $sql='select id_m from pres_micro where id_pres=:idP'; 

        $gsent=$pdo->prepare($sql);
    
        $gsent->bindParam(':idP',$idP,PDO::PARAM_INT);

        $gsent->execute();

        $lamparas = $gsent->fetchAll();

        foreach($lamparas as $l){

            $sql='UPDATE microfono SET disp_m=1 where id_m=:idL';

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

            $sql='UPDATE camara SET disp_c=1 where id_c=:idL';

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

            $sql='UPDATE proy SET disp_p=1 where id_p=:idL';

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

            $sql='UPDATE flash SET disp_f=1 where id_f=:idL';

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

            $sql='UPDATE deslizador SET disp_d=1 where id_d=:idL';

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

            $sql='UPDATE camgopro SET disp_cgopro=1 where id_cgopro=:idL';

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

            $sql='UPDATE maletin SET disp_m=1 where id_m=:idL';

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

            $sql='UPDATE tripie SET disp_t=1 where id_t=:idL';

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

            $sql='UPDATE grabadora SET disp_g=1 where id_g=:idL';

            $gsent=$pdo->prepare($sql);

            $gsent->bindParam(':idL',$l["id_g"],PDO::PARAM_INT);
    
            $gsent->execute();
        }
    }
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>