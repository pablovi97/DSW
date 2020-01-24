<?php
$orden = $_POST['orden'];

$sitio = $_POST['sitio'];

if(recorrerArray($orden ,$sitio)){
    //header('location:elecciondestios.php?orden='. $orden .'&sitio='.$sitio);
    header('location:completado.html');    
    die();
}else{
    header('location:elecciondestios.php?fail=hubo_problemas');
    die();
}


function recorrerArray($orden , $sitio)
{
    include('archivo2.txt');
   
   // var_dump($array2);
    for ($i = 0; $i <= count($array2); $i++) {
        if( isset($array2[$i])){
        for ($j = 0; $j <= count($array2[$i]); $j++) {
            if ($array2[$i][1] == $orden) {
                 $array2[$i][3] = $sitio;
                 $array = var_export($array2 ,true);
                 file_put_contents("archivo2.txt",'<?php $array2='.$array.';?>');
                 
                return true;
            }
        }
    }
    }
    return false;
}
?>

