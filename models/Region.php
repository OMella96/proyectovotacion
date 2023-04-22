<?php
    require_once "connection/Connection.php";

    class Region {

        public function obtener_region_select() {
            $db = new Connection();
            $query = "SELECT id, region FROM regiones";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'region' => $row['region'],
                    ];
                }
            }
            return $datos;
        }
    }