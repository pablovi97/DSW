<?php
//$clave . "-" .$correo. "-" .$num
$clave = $_POST['clave'];

$res = leerfichero($clave);
if($res != -1){
echo("acertado!");
header('location:elecciondestios.html');
die();
}else{
    header('location:index.php?fail=clave_mal_introducida');
    die();
}



function leerfichero($clave){
    $fp = fopen("archivo.txt", "r");
    $orden = 0;
    while (!feof($fp)){
        $linea = fgets($fp);
       $arr = explode('-' ,$linea);
     if($arr[0] == $clave){
          $orden = $arr[2];
          fclose($fp);
          return $orden;

      }
   
    
    }
    fclose($fp);
    return -1;


}

?>
