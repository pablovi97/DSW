<?php

if (isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == '::1')) {
    echo ("<h1>ZONA DEL PROFESOR</h1>");
    $correos =  $_POST['correos'];
    echo($correos);
    $arraydecorreos =explode(',', $correos);
    $estudiantes = $_POST['numalums'];
    $tamanoclave = 8;
    $caracteresclave = "aAbBcCdDeEfFmoOMnNpPyYlLsSqQrRtTgGhHiIjJkKuUvVxXzZwW0123456789";
    $arr = str_split($caracteresclave);
    $arrayClave = [];
    for ($i = 0; $i <= $estudiantes; $i++) {
        $clave = "";
        $correo = $arraydecorreos[$i];
        for ($j = 0; $j <= $tamanoclave; $j++) {
           $num = rand(0, sizeof($arr));
           //$num = rand(0 ,strlen($caracteresclave));
            $clave .= $arr[$num] ;
            //$clave .= $caracteresclave[$num];
        }
        //  echo ("</br>");
        // echo ($clave);
       //introducirenfichero($clave, $i ,$correo);
        $arrayClave[$i]= [$clave, $i, $correo ,$pos=-1];
    }
    $array = var_export($arrayClave ,true);
    file_put_contents("archivo2.txt",'<?php $array2='.$array.';?>');
    include("archivo2.txt");
    var_dump($array2);
    echo("</br>");
    echo("CLAVES CREADAS!");
} else {
    echo ("acceso denegado </br>");
}
/*
function introducirenfichero($clave, $num ,$correo)
{

    $file = fopen("archivo.txt", "a");


   fwrite($file, $clave . "-" .$correo. "-" .$num. PHP_EOL);
    mail($correo ,"clave de acceso para tu sitio!" ,$clave , "From:"."PabloViera");


   fclose($file);
}
*/