<?php
include('../../models/FincaModel.php');
$fincaModel = new FincaModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $nombre = htmlspecialchars($_POST['nombre']);
    $numHectareas = intval($_POST['numHectareas']);
    $metrosCuadrados = intval($_POST['metrosCuadrados']);
    $propietario = htmlspecialchars($_POST['propietario']);
    $capataz = htmlspecialchars($_POST['capataz']);
    $pais = htmlspecialchars($_POST['pais']);
    $departamento = htmlspecialchars($_POST['departamento']);
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $siProduceLeche = isset($_POST['siProduceLeche']) ? 1 : 0;
    $siProduceCereales = isset($_POST['siProduceCereales']) ? 1 : 0;
    $siProduceFrutas = isset($_POST['siProduceFrutas']) ? 1 : 0;
    $siProduceVerduras = isset($_POST['siProduceVerduras']) ? 1 : 0;
 
    $result = $fincaModel->updateFinca([
        'nombre' => $nombre,
        'numHectareas' => $numHectareas,
        'metrosCuadrados' => $metrosCuadrados,
        'propietario' => $propietario,
        'capataz' => $capataz,
        'pais' => $pais,
        'departamento' => $departamento,
        'ciudad' => $ciudad,
        'siProduceLeche' => $siProduceLeche,
        'siProduceCereales' => $siProduceCereales,
        'siProduceFrutas' => $siProduceFrutas,
        'siProduceVerduras' => $siProduceVerduras,
    ]);

    if ($result) {
        echo "<p>Finca actualizada exitosamente.</p>";
    } else {
        echo "<p>Error al actualizar la finca.</p>";
    }
} else {
    $nombre = htmlspecialchars($_GET['nombre']);
    $finca = $fincaModel->getFincaByNombre($nombre);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Finca</title>
</head>
<body>
    <h1>Editar Finca</h1>

    <form action="" method="post">
        <label for="nombre">Nombre de la Finca:</label>
        <input type="text" name="nombre" value="<?php echo isset($finca['nombre'])
         ? htmlspecialchars($finca['nombre']) : ''; ?>" required>

        <label for="numHectareas">Número de Hectáreas:</label>
        <input type="number" name="numHectareas" value="<?php echo isset($finca['numHectareas'])
         ? htmlspecialchars($finca['numHectareas']) : ''; ?>" required>

        <label for="metrosCuadrados">Metros Cuadrados:</label>
        <input type="number" name="metrosCuadrados" value="<?php echo isset($finca['metrosCuadrados'])
         ? htmlspecialchars($finca['metrosCuadrados']) : ''; ?>" required>

        <label for="propietario">Propietario:</label>
        <input type="text" name="propietario" value="<?php echo isset($finca['propietario']) 
        ? htmlspecialchars($finca['propietario']) : ''; ?>" required>

        <label for="capataz">Capataz:</label>
        <input type="text" name="capataz" value="<?php echo isset($finca['capataz']) 
        ? htmlspecialchars($finca['capataz']) : ''; ?>" required>

        <label for="pais">País:</label>
        <input type="text" name="pais" value="<?php echo isset($finca['pais'])
         ? htmlspecialchars($finca['pais']) : ''; ?>" required>

        <label for="departamento">Departamento:</label>
        <input type="text" name="departamento" value="<?php echo isset($finca['departamento']) 
        ? htmlspecialchars($finca['departamento']) : ''; ?>" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo isset($finca['ciudad']) 
        ? htmlspecialchars($finca['ciudad']) : ''; ?>" required>

        <label for="siProduceLeche">¿Produce Leche?</label>
        <input type="checkbox" name="siProduceLeche" <?php echo isset($finca
        ['siProduceLeche']) && $finca['siProduceLeche'] ? 'checked' : ''; ?>>

        <label for="siProduceCereales">¿Produce Cereales?</label>
        <input type="checkbox" name="siProduceCereales" <?php echo isset($finca
        ['siProduceCereales']) && $finca['siProduceCereales'] ? 'checked' : ''; ?>>

        <label for="siProduceFrutas">¿Produce Frutas?</label>
        <input type="checkbox" name="siProduceFrutas" <?php echo isset($finca
        ['siProduceFrutas']) && $finca['siProduceFrutas'] ? 'checked' : ''; ?>>

        <label for="siProduceVerduras">¿Produce Verduras?</label>
        <input type="checkbox" name="siProduceVerduras" <?php echo isset($finca
        ['siProduceVerduras']) && $finca['siProduceVerduras'] ? 'checked' : ''; ?>>

        <button type="submit" name="submit">Actualizar Finca</button>
    </form>

    <br>

    <a href="index.php">Volver al Listado de Fincas</a>
</body>
</html>