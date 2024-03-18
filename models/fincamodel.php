<?php

require_once(__DIR__ . '/../config/database.php');

class FincaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getFincas() {
        $query = "SELECT * FROM Fincas";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFinca($data) {
        $query = "INSERT INTO Fincas (nombre, numHectareas, metrosCuadrados, propietario, 
        capataz, pais, departamento, ciudad, siProduceLeche, siProduceCereales, 
        siProduceFrutas, siProduceVerduras, 
        propietario_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);

        $stmt->bindParam(1, $data['nombre']);
        $stmt->bindParam(2, $data['numHectareas']);
        $stmt->bindParam(3, $data['metrosCuadrados']);
        $stmt->bindParam(4, $data['propietario']);
        $stmt->bindParam(5, $data['capataz']);
        $stmt->bindParam(6, $data['pais']);
        $stmt->bindParam(7, $data['departamento']);
        $stmt->bindParam(8, $data['ciudad']);
        $stmt->bindParam(9, $data['siProduceLeche']);
        $stmt->bindParam(10, $data['siProduceCereales']);
        $stmt->bindParam(11, $data['siProduceFrutas']);
        $stmt->bindParam(12, $data['siProduceVerduras']);
        $stmt->bindParam(13, $data['propietario_id']);

        return $stmt->execute();
    }

    public function getFincaByNombre($nombre) {
        $query = "SELECT * FROM Fincas WHERE nombre = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateFinca($data) {
        $query = "UPDATE Fincas SET numHectareas = :numHectareas, metrosCuadrados = :metrosCuadrados, 
        propietario = :propietario, capataz = :capataz, pais = :pais, departamento = :departamento, 
        ciudad = :ciudad, siProduceLeche = :siProduceLeche, siProduceCereales = :siProduceCereales, 
        siProduceFrutas = :siProduceFrutas, 
        siProduceVerduras = :siProduceVerduras WHERE nombre = :nombre";
        $stmt = $this->db->getConnection()->prepare($query);
    
        if (!$stmt) {
            return false; // Error handling for prepared statement creation
        }
    
        $stmt->bindParam(":numHectareas", $data['numHectareas'], PDO::PARAM_INT);
        $stmt->bindParam(":metrosCuadrados", $data['metrosCuadrados'], PDO::PARAM_INT);
        $stmt->bindParam(":propietario", $data['propietario'], PDO::PARAM_STR);
        $stmt->bindParam(":capataz", $data['capataz'], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $data['pais'], PDO::PARAM_STR);
        $stmt->bindParam(":departamento", $data['departamento'], PDO::PARAM_STR);
        $stmt->bindParam(":ciudad", $data['ciudad'], PDO::PARAM_STR);
        $stmt->bindParam(":siProduceLeche", $data['siProduceLeche'], PDO::PARAM_INT);
        $stmt->bindParam(":siProduceCereales", $data['siProduceCereales'], PDO::PARAM_INT);
        $stmt->bindParam(":siProduceFrutas", $data['siProduceFrutas'], PDO::PARAM_INT);
        $stmt->bindParam(":siProduceVerduras", $data['siProduceVerduras'], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
    
        $success = $stmt->execute();
        return $success;
    }
    
    public function deleteFinca($nombre) {
        $query = "DELETE FROM Fincas WHERE nombre = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(1, $nombre);
        return $stmt->execute();
    }

}

?>
