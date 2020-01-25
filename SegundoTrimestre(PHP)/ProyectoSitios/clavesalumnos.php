<?php
//$clave . "-" .$correo. "-" .$num
$clave = $_POST['clave'];

$res = leerarray($clave);

//echo($res);

if ($res != -1) {
    //echo ("acertado!");
    if($res == 0){
        header('location:elecciondestios.php?orden=' . $res);

        die();
    }else{
        $params = localizar_sitios();
        header('location:elecciondestios.php?orden='. $res .'&param='.$params);
        die();
    }
  
} else {
    header('location:index.php');
    die();
}


function leerarray($clave)
{
    include('archivo2.txt');
    $orden = 0;
   // var_dump($array2);
    for ($i = 0; $i <= count($array2); $i++) {
        if( isset($array2[$i])){
        for ($j = 0; $j <= count($array2[$i]); $j++) {
            if ($array2[$i][0] == $clave) {
                $orden = $array2[$i][1];

                return $orden;
            }
        }
    }
    }
    return -1;
}

function localizar_sitios(){
    include('archivo2.txt');
$sitios_cojidos = "";
$ultimapos = 0;
$temp = 0;
    for ($i = 0; $i <= count($array2); $i++) {
        if( isset($array2[$i])){
        for ($j = 0; $j <= count($array2[$i]); $j++) {
            if ($array2[$i][3] != -1) {
               
                if($temp != $array2[$i][3]){
                    $temp = $array2[$i][3];
                    $sitios_cojidos.= $array2[$i][3] .",";
                }
             

                if($array2[$i][1]> $ultimapos ){
                    $ultimapos = $array2[$i][1] ;
                }
              
            }
        }
    }
    }
    return $sitios_cojidos.'-'.$ultimapos;


}