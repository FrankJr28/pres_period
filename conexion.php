<?php
    $link='mysql:host=localhost;dbname=pres_period';
    $user="root";
    $pass="";
    /*
        $base=new PDO("mysql:host=localhost; dbname=HelpDesk","root","");
        
    */
    try{
        $pdo = new PDO ($link,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conecta11d1o";
    }
    catch (PDOException $e){
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

?>