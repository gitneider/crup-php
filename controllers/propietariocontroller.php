<?php

include('../../models/PropietarioModel.php');

$propietarioModel = new PropietarioModel();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
   
    $propietarios = $propietarioModel->getAllPropietarios();

    if ($propietarios === false) {
        echo "Error al obtener propietarios.";
        exit;
    }

    include('../../views/propietarios/listar.php');
}

elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['clave'], $_POST['nombre'], $_POST['apellido'], $_POST['fechaNacimiento'], $_POST['email'], $_POST['genero'], $_POST['telefono'])) {
    
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];

    $result = $propietarioModel->addPropietario($clave, $nombre, $apellido, $fechaNacimiento, $email, $genero, $telefono);

    if ($result === false) {
        echo "Error al agregar propietario.";
        exit;
    }

  
    header('Location: listar.php');
}

elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['delete']) && is_numeric($_GET['delete'])) {

    $idToDelete = $_GET['delete'];

    $result = $propietarioModel->deletePropietario($idToDelete);

    if ($result === false) {
        echo "Error al eliminar propietario.";
        exit;
    }

    header('Location: listar.php');
}

else {
    echo "Acceso no permitido.";
}
?>
