<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container bg-warning">

        <div class="display-3 text-center">IMC</div>

        <div class="row">




            <div class="col-4 bg-white mr-2 ml-5 py-5" id="lista">



                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=personas;charset=utf8', 'root', '1q2w3e4r');
                $resultado = $pdo->query("SELECT * FROM persona");
                //nos quedamos con un array con key: nombrecampo y value: valorcampo 
                $resultado->setFetchMode(PDO::FETCH_ASSOC);
                echo "<ul class='list-group'>";
                while ($row = $resultado->fetch()) {
                    echo "<li class='list-group-item list-group-item-action '  onclick = 'recogerElems(this)'>";
                    foreach ($row as $key => $value) {
                        echo "$value ";
                    }
                    echo "</li>";
                }
                echo "</ul>";
                ?>

            </div>

            <div class=" col-4 bg-white mx-5 py-5">
                <form action="php/index.php" method="POST">
                    <div>
                        <label for="clave">id:</label>
                        <input type="text" name="clave" id="clave" />
                    </div>
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" />
                    </div>
                    <div>
                        <label for="apellidos">Apellidos :</label>
                        <input type="text" name="apellidos" id="apellidos"></input>
                    </div>
                    <div>
                        <label for="edad">Edad :</label>
                        <input type="text" name="edad" id="edad"></input>
                    </div>
                    <div>
                        <label for="peso">Peso :</label>
                        <input type="text" name="peso" id="peso"></input>
                    </div>
                    <div>
                        <label for="altura">Altura :</label>
                        <input type="text" name="altura" id="altura"></input>
                    </div>
                    <div>
                        <label for="imc">imc :</label>
                        <input type="text" name="imc" id="imc"></input>
                    </div>
                    <div>
                        <label for="sex">sexo :</label>
                        <input type="radio" name="sex" id="hombre" value="hombre">Hombre</input>
                        <input type="radio" name="sex" id="mujer" value="mujer">Mujer</input>
                    </div>
                    <div>
                        <label for="eliminar">eliminar :</label>
                        <input type="checkbox" name="eliminar" id="eliminar" value="marcado">Eliminar</input>

                    </div>
                    <input type="submit" value="Enviar">

                </form>


            </div>
        </div>

        <div class="col-12 bg-waring py-5"></div>



    </div>


    <script>
        function recogerElems(elem) {
            let valor = elem.innerText;

            let valores = valor.split(" ");

            document.getElementById("clave").value = valores[0];
            document.getElementById("nombre").value = valores[1];
            document.getElementById("apellidos").value = valores[2];
            document.getElementById("edad").value = valores[3];
            document.getElementById("peso").value = valores[4];
            document.getElementById("altura").value = valores[5];
            document.getElementById("imc").value = valores[6];
           
            if (valores[7] == 'mujer') {
                document.getElementById('mujer').checked = true;
            }else{
                document.getElementById('hombre').checked = true;
            }


        }
    </script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>