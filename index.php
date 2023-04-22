<?php
require "region.php";
require "candidatos.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <title>Formulario De Votacion</title>
</head>

<body>

    <h1>Formulario de Votación</h1>

    <div id="form">
        <form class='formulario' action="votos.php" method="post">
            <label for="nombre">Nombre y Apellido:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="alias">Alias:</label>
            <input type="text" id="alias" name="alias" title="Debe contener letras y numeros, 6 o mas caracteres" required pattern="(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}"><br>

            <label for="rut">RUT:</label>
            <input type="text" id="rut" name="rut" title="Formato de Rut 11.111.111-1" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="">Region:</label>
            <select id="region" name="region">
                <option value="">Seleccionar Region</option>
                <?php
                foreach ($regiones as $region) {
                    echo '<option value="' . $region['id'] . '">' . $region['region'] . '</option>';
                } //end foreach
                ?>
            </select>

            <label for="">Comunas:</label>
            <select id="comuna" name="comuna">
                <option value="">Seleccionar Comuna</option>
            </select>

            <label for="candidato">Candidato:</label>
            <select id="candidato" name="candidato">
                <option value="">Seleccione un candidato</option>
                <?php
                foreach ($candidatos as $candidato) {
                    echo '<option value="' . $candidato['nombre'] . '">' . $candidato['nombre'] . '</option>';
                }
                ?>
            </select><br>

            <label for="entero">Cómo se enteró de nosotros:</label>
            <input type="checkbox" id="entero1" name="entero[]" value="Internet">Web
            <input type="checkbox" id="entero2" name="entero[]" value="Tv">TV
            <input type="checkbox" id="entero3" name="entero[]" value="Redes Sociales">Redes Sociales
            <input type="checkbox" id="entero4" name="entero[]" value="Amigo">Amigo <br>

            <input type="submit" name="votar" value="votar" onclick="return validarCheckboxes();">

        </form>
        <script src="script.js"></script>

</body>

</html>