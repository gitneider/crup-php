<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propietario</title>
</head>
<body>
    <h1>Editar Propietario</h1>
    
    <form action="update.php" method="post">
       
        <input type="hidden" name="id" value="<?php 
        echo htmlspecialchars($propietario['Id']); ?>">

        <label for="clave">Clave:</label>
        <input type="text" name="clave" value="<?php 
        echo htmlspecialchars($propietario['clave']); ?>" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php 
        echo htmlspecialchars($propietario['nombre']); ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php 
        echo htmlspecialchars($propietario['apellido']); ?>" required>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento" value="<?php 
        echo htmlspecialchars($propietario['fechaNacimiento']); ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php 
        echo htmlspecialchars($propietario['email']); ?>">

        <label for="genero">Género:</label>
        <select name="genero">
            <option value="Masculino" <?php echo ($propietario['genero'] === 'Masculino') 
            ? 'selected' : ''; ?>>Masculino</option>
            <option value="Femenino" <?php echo ($propietario['genero'] === 'Femenino')
             ? 'selected' : ''; ?>>Femenino</option>
            <option value="Otro" <?php echo ($propietario['genero'] === 'Otro') 
            ? 'selected' : ''; ?>>Otro</option>
        </select>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($propietario['telefono']); ?>">

        <input type="submit" value="Actualizar Propietario">
    </form>

    <br>

    <a href="index.php">Volver al Listado de Propietarios</a>
</body>
</html>
