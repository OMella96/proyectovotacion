<?php
require_once "connection/Connection.php";
class Candidato
{
    public function obtener_candidato()
    {
        $db = new Connection();
        $query = "SELECT id, nombre FROM candidatos";
        $resultado = $db->query($query);
        $datos = [];
        if ($resultado->num_rows) {
            while ($row = $resultado->fetch_assoc()) {
                $datos[] = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                ];
            }
        }
        return $datos;
    }
}
