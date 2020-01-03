
    <?php


    $pdo = new PDO('mysql:host=localhost;dbname=personas;charset=utf8', 'root', '1q2w3e4r');




    if (!empty($_POST['eliminar'])) {
        echo "entra en eliminar";
        echo "el id " . $_POST['clave'];
        $id = $_POST['clave'];

        $hayError = false;
        $pdo->beginTransaction();
        $sql = "DELETE FROM persona WHERE idPersona='$id'";


        if ($pdo->exec($sql) == 0)
            $hayError = true;

        if ($hayError) {
            echo "hay error";
            $pdo->rollback();
        } else {

            $pdo->commit();
        }
    } else {
        if (empty($_POST['clave'])) {
            echo "entra en insertar";
            $nombre = $_POST['nombre'];

            $apellidos = $_POST['apellidos'];

            $edad = intval($_POST['edad']);

            $peso = intval($_POST['peso']);
            $altura = intval($_POST['altura']);
            if ($_POST['sex'] == "hombre") {

                $sexo = "hombre";
                $imc = $peso / pow($altura, 2);
            } else {
                $sexo = "mujer";
                $imc = $peso / pow($altura, 2);
            }

            $hayError = false;
            $pdo->beginTransaction();
            $sql = "INSERT INTO persona ( nombre ,apellido ,edad ,peso ,altura ,imc ,sexo ) VALUES ('$nombre' ,'$apellidos' ,'$edad' ,'$peso' ,'$altura' ,'$imc' ,'$sexo')";


            if ($pdo->exec($sql) == 0)
                $hayError = true;

            if ($hayError) {
                echo "hay error";
                $pdo->rollback();
            } else {

                $pdo->commit();
            }
        } else {
            echo "entra en actualizar";
            $id = $_POST['clave'];
            $nombre = $_POST['nombre'];

            $apellidos = $_POST['apellidos'];

            $edad = intval($_POST['edad']);

            $peso = intval($_POST['peso']);
            $altura = intval($_POST['altura']);
            if ($_POST['sex'] == "hombre") {

                $sexo = "hombre";
                $imc = $peso / pow($altura, 2);
            } else {
                $sexo = "mujer";
                $imc = $peso / pow($altura, 2);
            }

            $hayError = false;
            $pdo->beginTransaction();
            $sql = "UPDATE persona SET  nombre='$nombre' ,apellido='$apellidos' ,edad='$edad' ,peso='$peso' ,altura='$altura' ,imc='$imc' ,sexo='$sexo'  WHERE idPersona=$id";


            if ($pdo->exec($sql) == 0)
                $hayError = true;

            if ($hayError) {
                echo "hay error";
                $pdo->rollback();
            } else {

                $pdo->commit();
            }
        }
    }



    unset($_POST['btn']);
    unset($_POST['clave']);
    header("Location: http://localhost/practicasPHP/IMC/index1.php");
    die();
    ?>




