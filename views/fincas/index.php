<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Fincas</title>
</head>
<body>
    <h1>Listado de Fincas</h1>

    <?php
 
    include('../../models/FincaModel.php');
    $fincaModel = new FincaModel();

    $fincas = $fincaModel->getFincas();
    ?>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Número de Hectáreas</th>
            <th>Metros Cuadrados</th>
            <th>Propietario</th>
            <th>Capataz</th>
            <th>País</th>
            <th>Departamento</th>
            <th>Ciudad</th>
            <th>Producción de Leche</th>
            <th>Producción de Cereales</th>
            <th>Producción de Frutas</th>
            <th>Producción de Verduras</th>
            <th>Acciones</th>
          
        </tr>

        <?php foreach ($fincas as $finca): ?>
            <tr>
                <td><?php echo $finca['nombre']; ?></td>
                <td><?php echo $finca['numHectareas']; ?></td>
                <td><?php echo $finca['metrosCuadrados']; ?></td>
                <td><?php echo $finca['propietario']; ?></td>
                <td><?php echo $finca['capataz']; ?></td>
                <td><?php echo $finca['pais']; ?></td>
                <td><?php echo $finca['departamento']; ?></td>
                <td><?php echo $finca['ciudad']; ?></td>
                <td><?php echo $finca['siProduceLeche'] ? 'Sí' : 'No'; ?></td>
                <td><?php echo $finca['siProduceCereales'] ? 'Sí' : 'No'; ?></td>
                <td><?php echo $finca['siProduceFrutas'] ? 'Sí' : 'No'; ?></td>
                <td><?php echo $finca['siProduceVerduras'] ? 'Sí' : 'No'; ?></td>
                <td>
                    <a href="edit.php?nombre=<?php echo $finca['nombre']; ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <a href="add.php">Agregar Nueva Finca</a>
    <br>
    <a href="../../index.php">Volver Atrás</a>
</body>
</html>