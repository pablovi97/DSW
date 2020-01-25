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
    .sitio {
      width: 100px;
      height: 100px;
      border: solid 1px black;
      background-color: blueviolet;
    }

    .sitio:hover {
      background-color: purple;
    }
  </style>

</head>

<body>

  <div class="container py-5">
    <h1 class="display-1">Elige tu sitio!</h1>

    <p class="resultado"></p>
    <?php


    $orden = $_GET['orden'];
    echo ("<p class='orden display-3' id='or'>" . $orden . "</p>")

    ?>
    <p id="info"></p>
    <p>los sitios rojos son los que estan cojidos!</p>
    <form action="gestionarorden.php" method="post">
      <p>Eres el puesto :<input type="text" name="orden" id="ord"></p>
      <p>Has seleccionado el sitio:<input type="text" name="sitio" id="siti"> </p>
      <input type="submit" class="btn btn-warning" id="enviar" value="Enviar">
    </form>


    <div class="row ">



      <div class="sitio col-2 " id="27">
        <p class="text-center display-3 ">27</p>
      </div>
      <div class="sitio col-2" id="20">
        <p class="text-center display-3 ">20</p>
      </div>
      <div class="sitio col-2 " id="19">
        <p class="text-center display-3 ">19</p>
      </div>
      <div class="sitio col-2" id="7">
        <p class="text-center display-3 ">7</p>
      </div>
      <div class="sitio col-2 " id="6">
        <p class="text-center display-3 ">6</p>
      </div>

    </div>


    <div class="row ">


      <div class="sitio col-2 " id="28">
        <p class="text-center display-3 ">28</p>
      </div>
      <div class="sitio col-2" id="21">
        <p class="text-center display-3 ">21</p>
      </div>
      <div class="sitio col-2 " id="18">
        <p class="text-center display-3 ">18</p>
      </div>
      <div class="sitio col-2" id="8">
        <p class="text-center display-3 ">8</p>
      </div>
      <div class="sitio col-2 " id="5">
        <p class="text-center display-3 ">5</p>
      </div>


    </div>


    <div class="row ">



      <div class="sitio col-2 " id="29">
        <p class="text-center display-3 ">29</p>
      </div>
      <div class="sitio col-2" id="22">
        <p class="text-center display-3 ">22</p>
      </div>
      <div class="sitio col-2 " id="17">
        <p class="text-center display-3 ">17</p>
      </div>
      <div class="sitio col-2" id="9">
        <p class="text-center display-3 ">9</p>
      </div>
      <div class="sitio col-2 " id="4">
        <p class="text-center display-3 ">4</p>
      </div>

    </div>


    <div class="row ">


      <div class="sitio col-2 " id="30">
        <p class="text-center display-3 ">30</p>
      </div>
      <div class="sitio col-2" id="29">
        <p class="text-center display-3 ">29</p>
      </div>
      <div class="sitio col-2 " id="15">
        <p class="text-center display-3 ">15</p>
      </div>
      <div class="sitio col-2" id="11">
        <p class="text-center display-3 ">11</p>
      </div>
      <div class="sitio col-2 " id="2">
        <p class="text-center display-3 ">2</p>
      </div>

    </div>


    <div class="row ">


      <div class=" col-2 "></div>
      <div class="sitio col-2" id="25">
        <p class="text-center display-3 ">25</p>
      </div>
      <div class="sitio col-2 " id="14">
        <p class="text-center display-3 ">14</p>
      </div>
      <div class="sitio col-2" id="12">
        <p class="text-center display-3 ">12</p>
      </div>
      <div class="sitio col-2 " id="1">
        <p class="text-center display-3 ">1</p>
      </div>

    </div>


    <div class="row ">



      <div class=" col-2 "></div>
      <div class="sitio col-2" id="26">
        <p class="text-center display-3 ">26</p>
      </div>
      <div class="sitio col-2 " id="13">
        <p class="text-center display-3 ">13</p>
      </div>
      <div class=" col-2"></div>
      <div class=" col-2 "></div>

    </div>


  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    var orden = document.getElementById('or').innerText;

    var sit = 0;
    $(".sitio").on('click', function() {


      var id = $(this).attr("id");
      document.getElementById("ord").value = orden;
      document.getElementById("siti").value = id;

      $(this).attr('disabled', true);
    });
    var para = obtenerValorParametro();
    console.log("param " + para);
    let gest = gestiones(para, orden);
  

    function obtenerValorParametro() {
      var sPaginaURL = window.location.search.substring(1);
      var sURLVariables = sPaginaURL.split('&');
      for (var i = 0; i < sURLVariables.length; i++) {
        var sParametro = sURLVariables[i].split('=');
        if (sParametro[0] == "param") {
          return sParametro[1];
        }
      }
      return null;
    }

    function gestiones(params, orde) {

      var param = params.split("-");

      if ((param[1] - orde) != -1) {
        document.getElementById("enviar").disabled = true;
        document.getElementById("info").innerText = "no puedes elegir ,tiene que elegir el " + (+param[1] + 1);
      }

      let ids = param[0].split(",");
      console.log(ids);
      for (let elem of ids) {
        //console.log(elem);
        let indice = document.getElementById(elem).style.backgroundColor = 'red';
        //indice.disabled = true;
        //indice.style.backgroundColor = 'red';

      }
      return ids;
    }
  </script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>