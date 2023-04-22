<?php
    require_once "connection/Connection.php";

    class Comuna {

        public function obtener_comunas_select($region_id) {
            $db = new Connection();
            $query = "SELECT id, comuna FROM comunas WHERE region_id = $region_id";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while ($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'comuna' => $row['comuna'],
                    ];
                }
            }
            return $datos;
        }

    }