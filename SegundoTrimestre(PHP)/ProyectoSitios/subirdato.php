<?php

leerarray();
header('location:recogerDatos.php');    
function leerarray()
{
    include('archivo2.txt');
  
   
    for ($i = 0; $i <= count($array2); $i++) {
        if( isset($array2[$i])){
       
            if ($array2[$i][3] != '-1') {
                
                introducirBasedeDatos($array2[$i][3], $array2[$i][1] );
            
            }
        
    }
    }

}

function introducirBasedeDatos($nombre , $nota ){
    $fecha= date("Y-m-d H:i:s");
    $pdo = new PDO('mysql:host=localhost;dbname=sitios;charset=utf8', 'root', '1q2w3e4r');
    $hayError = false;
    $pdo->beginTransaction();
    $sql = "INSERT INTO asientos ( nombreSitio ,nota ,fechaActual ) VALUES ('tierra $nombre' ,'$nota' ,'$fecha')";
    
    
    if ($pdo->exec($sql) == 0)
        $hayError = true;
    
    if ($hayError) {
        echo "hay error";
        $pdo->rollback();
    } else {
    
        $pdo->commit();
    }
    
}
?>