<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['clave'], $_POST['nombre'], $_POST['apellido'], $_POST['fechaNacimiento'], $_POST
    ['email'], $_POST['genero'], $_POST['telefono'])) {

        require_once '../../config/database.php';
        $db = new Database();

        $clave = htmlspecialchars($_POST['clave']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $fechaNacimiento = htmlspecialchars($_POST['fechaNacimiento']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? htmlspecialchars($_POST['email']) : '';
        $genero = htmlspecialchars($_POST['genero']);
        $telefono = htmlspecialchars($_POST['telefono']);

        $query = "INSERT INTO Propietarios (clave, nombre, apellido, fechaNacimiento, 
        email, genero, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->execute([$clave, $nombre, $apellido, $fechaNacimiento, $email, $genero, $telefono]);

        if ($stmt->rowCount() > 0) {
            echo "Propietario agregado exitosamente.";
        } else {
            echo "Error al agregar el propietario.";
        }
    } else {
        echo "Todos los campos del formulario son requeridos.";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['eliminar'])) {
    
    $claveEliminar = htmlspecialchars($_GET['eliminar']);

    require_once '../../config/database.php';
    $db = new Database();
    
   $query = "DELETE FROM Propietarios WHERE clave = ?";
   $stmt = $db->getConnection()->prepare($query);
   $stmt->execute([$claveEliminar]);

   if ($stmt->rowCount() > 0) {
       echo "Propietario eliminado exitosamente.";
   } else {
       echo "Error al eliminar el propietario o el propietario no existe.";
   }
} else {
   
   echo "Acceso no permitido.";
}
?>