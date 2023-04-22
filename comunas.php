<?php
    require_once "models/Comuna.php";
    $comunas = [];
    if(isset($_GET['region'])) {
        $tabla_comunas = new Comuna();
        $comunas = $tabla_comunas->obtener_comunas_select($_GET['region']);
    }
    echo json_encode(['data' => $comunas]);