<?php
require_once "models/Candidato.php";
$tabla_candidatos = new Candidato();;
$candidatos = $tabla_candidatos->obtener_candidato();
