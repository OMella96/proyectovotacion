<?php
    require_once "models/Region.php";
    $tabla_estado = new Region();
    $regiones = $tabla_estado->obtener_region_select();