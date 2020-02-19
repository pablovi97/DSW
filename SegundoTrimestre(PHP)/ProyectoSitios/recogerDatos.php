<?php

$pdo = new PDO('mysql:host=localhost;dbname=sitios;charset=utf8', 'root', '1q2w3e4r');

$resultado = $pdo->query("SELECT * FROM asientos");
//nos quedamos con un array con key: nombrecampo y value: valorcampo
$resultado->setFetchMode(PDO::FETCH_ASSOC);

$nuevoarray = [];

$sitiomejor = 1000;
while ($row = $resultado->fetch()) {

    foreach ($row as $key => $value) {

        echo ($key . ":" . $value);
        if ($key == "nombreSitio") {
            $sitio = explode(" ", $value);
            if ($sitio[1] < $sitiomejor) {
                $sitiomejor = $sitio[1];
                $value = $sitiomejor;
             
            }
        }
        array_push($nuevoarray, $key, $value);
    }
    echo ("</br>");
}
/*
while ($nuevoarray) {

    foreach ($nuevoarray as $key => $value) {

        echo ($key . ":" . $value);
    }
    echo ("</br>");
}
*/