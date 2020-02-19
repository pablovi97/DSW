<?php

if (isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == '::1')) {
    //si accedes desde localhost  crea tantas claves como se han marcado 
    //anteriorimente y se guardan en el fichero archivo2.txt
    echo ("<h1>ZONA DEL PROFESOR</h1>");
    $correos =  $_POST['correos'];
    echo($correos);
    $arraydecorreos =explode(',', $correos);
    $estudiantes = $_POST['numalums'];
    $tamanoclave = 8;
    $caracteresclave = "aAbBcCdDeEfFmoOMnNpPyYlLsSqQrRtTgGhHiIjJkKuUvVxXzZwW0123456789";
    $arr = str_split($caracteresclave);
    $arrayClave = [];
    //Creamos las claves
    for ($i = 0; $i <= $estudiantes; $i++) {
        $clave = "";
        $correo = $arraydecorreos[$i];
        for ($j = 0; $j <= $tamanoclave; $j++) {
           $num = rand(0, sizeof($arr));
           
            $clave .= $arr[$num] ;
          
        }
    
        $arrayClave[$i]= [$clave, $i, $correo ,$pos=-1];
    }
    $array = var_export($arrayClave ,true);
    //guardamos en el fichero
    file_put_contents("archivo2.txt",'<?php $array2='.$array.';?>');
    include("archivo2.txt");
    var_dump($array2);
    echo("</br>");
    echo("CLAVES CREADAS!");
} else {
    echo ("acceso denegado </br>");
}
