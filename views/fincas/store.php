<?php

require_once('../../models/FincaModel.php');
$fincaModel = new FincaModel();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST['nombre'], $_POST['numHectareas'], $_POST['metrosCuadrados'], $_POST
    ['propietario'], $_POST['capataz'], $_POST['pais'], $_POST['departamento'], $_POST
    ['ciudad'], $_POST['siProduceLeche'], $_POST['siProduceCereales'], $_POST
    ['siProduceFrutas'], $_POST['siProduceVerduras'])) {
        
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
            'propietario_id' => $_POST['propietario_id']
        ];

        if ($fincaModel->addFinca($data)) {
            echo "Finca agregada exitosamente.";
        } else {
            echo "Error al agregar la finca.";
        }

        header('Location: index.php');
        exit;
    } else {
        echo "Error: Faltan datos del formulario.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
