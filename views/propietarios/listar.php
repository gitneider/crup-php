<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Propietarios</title>
</head>
<body>
    <h1>Listado de Propietarios</h1>
    
    <?php
    
    include('../../models/PropietarioModel.php');
    $propietarioModel = new PropietarioModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        
        $idEliminar = intval($_POST['delete']);

        if ($propietarioModel->deletePropietario($idEliminar)) {
            echo "Propietario eliminado exitosamente.";
        } else {
            echo "Error al eliminar el propietario.";
        }
    }

    $propietarios = $propietarioModel->getAllPropietarios();

    if ($propietarios === false) {
        echo "Error al obtener propietarios.";
        exit;
    }

    if (!empty($propietarios)) {
        echo '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Género</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>';
        foreach ($propietarios as $propietario) {
            echo '<tr>
                    <td>' . $propietario['Id'] . '</td>
                    <td>' . $propietario['clave'] . '</td>
                    <td>' . $propietario['nombre'] . '</td>
                    <td>' . $propietario['apellido'] . '</td>
                    <td>' . $propietario['fechaNacimiento'] . '</td>
                    <td>' . $propietario['email'] . '</td>
                    <td>' . $propietario['genero'] . '</td>
                    <td>' . $propietario['telefono'] . '</td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete" value="' . $propietario['Id'] . '">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No hay propietarios para mostrar.</p>';
    }
    ?>

    <br>

    <a href="add.php">Agregar Nuevo Propietario</a>
    <br>
    <a href="../../index.php">Volver Atrás</a>
</body>
</html>