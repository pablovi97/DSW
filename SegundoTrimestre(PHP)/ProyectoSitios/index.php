<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>


    </style>

</head>

<body>
    <?php
    if (isset($_SERVER['REMOTE_ADDR']) && ($_SERVER['REMOTE_ADDR'] == '::1')) {

    ?>

        <center>

            <form action="enviarclaves.php" method="post">
                <div class="form-group py-5">
                    <h1>Introduce los datos </h1>
                    <p>introduce un fichero.txt con los emails de los alumnos ordenados de mejor a peor nota ,con el siguiente formato:</p>
                    <div class="bg-secondary">
                        <p>alquien@example.com, otro@example.com ,...</p>

                    </div>
                    <textarea name="correos" id="" cols="30" rows="10"></textarea><br>
                    <input type="submit" class="btn btn-success" value="Enviar">



                </div>
            </form>


        </center>

    <?php
    } else {
    ?>
        <center>

        <div class="container">
            <div class="row">
                <div class="col-4">
          
                </div>
            <div class="form-group col-4 my-5 py-2  bg-info">
                <form action="clavesalumnos.php" method="post">
                    <label for="clave " class="display-4">Introduce tu clave :</label>
                    <input type="text" class="form-control" name="clave" id="" aria-describedby="helpId" placeholder="">
                    <input type="submit" class="btn btn-success" value="Enviar">

                </form>
   
                <label id="fail"></label>
            </div>
            <div class="col-4">
                <!---
                <p> echate una partida amigo!:</p>
                <iframe id="iframe-in-game" class="direct-field" 
                src="https://www.cooljuegos.com/embed/mortal-kombat-4/" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" width="640"
                 height="435" data-iframe-src="https://www.cooljuegos.com/embed/mortal-kombat-4/" allow="autoplay; fullscreen" allowfullscreen=""></iframe>-->
                </div>
            </div>
            </div>
        </center>


    <?php
    }

    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>