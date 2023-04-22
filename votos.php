<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST["nombre"];
    $alias = $_POST["alias"];
    $rut = $_POST["rut"];
    $email = $_POST["email"];
    $region = $_POST["region"];
    $comuna = $_POST["comuna"];
    $candidato = $_POST["candidato"];
    $como = implode(",", $_POST['entero']);

    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El campo Nombre es obligatorio.";
    } else if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
        $errores[] = "El campo Nombre solo puede contener letras y espacios.";
    }

    if (empty($alias)) {
        $errores[] = "El campo Alias es obligatorio.";
    } else if (!preg_match('/^[a-zA-Z0-9]+$/', $alias)) {
        $errores[] = "El campo Alias solo puede contener letras y números.";
    }

    if (empty($rut)) {
        $errores[] = "El campo RUT es obligatorio.";
    } else if (!preg_match('/^\d{1,2}\.\d{3}\.\d{3}-[0-9kK]$/', $rut)) {
        $errores[] = "El RUT ingresado no es válido.";
    }
  
    if (empty($email)) {
        $errores[] = "El campo Email es obligatorio.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email ingresado no es válido.";
    }
  
    if (empty($region)) {
        $errores[] = "Debe seleccionar una Región.";
    }
    if (empty($comuna)) {
        $errores[] = "Debe seleccionar una Comuna.";
    }
 
    if (empty($candidato)) {
        $errores[] = "Debe seleccionar un Candidato.";
    }
 
    if (count($_POST['entero']) < 2) {
        $errores[] = "Debe seleccionar al menos 2 opciones en 'Como se enteró de nosotros'.";
    }
   
    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        if (isset($_POST['votar'])) {

            $mysqli = new mysqli("localhost", "root", "", "proyectovotacion");
            $consulta = "SELECT * FROM `votos` WHERE `rut` = '$rut'";
            $resultado = mysqli_query($mysqli, $consulta);
            if (mysqli_num_rows($resultado) > 0) {
                echo "<script>alert('Usted ya ha votado'); window.history.go(-1);</script>";
            } else {

                $insertar = "INSERT INTO `votos`(`id`, `nombreyap`, `alias`, `rut`, `email`, `region`, `comuna`, `candidato`, `nosotros`) VALUES ('[value-1]','$nombre','$alias','$rut','$email','$region','$comuna','$candidato','$como')";
                $final = mysqli_query($mysqli, $insertar);
                if ($final) {
                    echo "<script>alert('Los Datos an sido registrados correctamente'); window.location.href = 'http://localhost/votacion/';</script>";
                }
            }
        }
    }
}
