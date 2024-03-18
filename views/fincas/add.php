<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Finca</title>
</head>
<body>
    <h1>Agregar Finca</h1>

    <?php
    require_once(__DIR__ . '/../../models/FincaModel.php');
    $fincaModel = new FincaModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'nombre' => $_POST['nombre'],
            'numHectareas' => $_POST['numHectareas'],
            'metrosCuadrados' => $_POST['metrosCuadrados'],
            'propietario' => $_POST['propietario'],
            'capataz' => $_POST['capataz'],
            'pais' => $_POST['pais'],
            'departamento' => $_POST['departamento'],
            'ciudad' => $_POST['ciudad'],
            'siProduceLeche' => isset($_POST['siProduceLeche']) ? 1 : 0,
            'siProduceCereales' => isset($_POST['siProduceCereales']) ? 1 : 0,
            'siProduceFrutas' => isset($_POST['siProduceFrutas']) ? 1 : 0,
            'siProduceVerduras' => isset($_POST['siProduceVerduras']) ? 1 : 0,
            'propietario_id' => $_POST['propietario_id'],
        ];

        $result = $fincaModel->addFinca($data);

        if ($result === false) {
            echo "Error al agregar la finca.";
        } else {
            echo "Finca agregada exitosamente.";
        }
    }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre de la Finca:</label>
        <input type="text" name="nombre" required>

        <label for="numHectareas">Número de Hectáreas:</label>
        <input type="number" name="numHectareas" required>

        <label for="metrosCuadrados">Metros Cuadrados:</label>
        <input type="number" name="metrosCuadrados" required>

        <label for="propietario">Propietario:</label>
        <input type="text" name="propietario" required>

        <label for="capataz">Capataz:</label>
        <input type="text" name="capataz" required>

        <label for="pais">País:</label>
        <input type="text" name="pais" required>

        <label for="departamento">Departamento:</label>
        <input type="text" name="departamento" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" required>

        <label for="siProduceLeche">¿Produce Leche?</label>
        <input type="checkbox" name="siProduceLeche">

        <label for="siProduceCereales">¿Produce Cereales?</label>
        <input type="checkbox" name="siProduceCereales">

        <label for="siProduceFrutas">¿Produce Frutas?</label>
        <input type="checkbox" name="siProduceFrutas">

        <label for="siProduceVerduras">¿Produce Verduras?</label>
        <input type="checkbox" name="siProduceVerduras">

        <label for="propietario_id">ID del Propietario:</label>
        <input type="number" name="propietario_id" required>

        <button type="submit" name="submit">Agregar Finca</button>
    </form>
    <br>
    <a href="index.php">Volver al Listado de Fincas</a>
    <br>
    <a href="../../index.php">Volver Atrás</a>
</body>
</html>