<?php
class PropietarioModel {
    private $db;

    public function __construct() {

        include('../../config/database.php');
        $this->db = new Database();
    }

    public function getAllPropietarios() {
       
        $query = "SELECT * FROM Propietarios";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();

       
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPropietarioById($id) {
      
        $query = "SELECT * FROM Propietarios WHERE Id = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPropietario($clave, $nombre, $apellido, $fechaNacimiento, 
    $email, $genero, $telefono) {
       
        $query = "INSERT INTO Propietarios (clave, nombre, apellido, fechaNacimiento, 
        email, genero, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);

        $stmt->bindParam(1, $clave);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $apellido);
        $stmt->bindParam(4, $fechaNacimiento);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $genero);
        $stmt->bindParam(7, $telefono);

        return $stmt->execute();
    }

    public function updatePropietario($id, $clave, $nombre, $apellido, $fechaNacimiento, 
    $email, $genero, $telefono) {
       
        $query = "UPDATE Propietarios SET clave=?, nombre=?, apellido=?, fechaNacimiento=?, 
        email=?, genero=?, telefono=? WHERE Id=?";
        $stmt = $this->db->getConnection()->prepare($query);

        $stmt->bindParam(1, $clave);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $apellido);
        $stmt->bindParam(4, $fechaNacimiento);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $genero);
        $stmt->bindParam(7, $telefono);
        $stmt->bindParam(8, $id);

        return $stmt->execute();
    }

    public function deletePropietario($id) {
        try {
            
            if (!is_numeric($id) || $id <= 0) {
                throw new Exception('ID de propietario no válido.');
            }
     
            $query = "DELETE FROM Propietarios WHERE Id = ?";
            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bindParam(1, $id);
    
            $stmt->execute();
         
            if ($stmt->rowCount() > 0) {
                return true; 
            } else {
                return false;
            }
        } catch (Exception $e) {
            
            error_log('Error al eliminar propietario: ' . $e->getMessage());
            return false;
        }
    }    
}
?>