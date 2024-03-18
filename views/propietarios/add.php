<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propietario</title>
</head>
<body>
    <h1>Agregar Propietario</h1>
    
    <form action="store.php" method="post">
     
        <label for="clave">Clave:</label>
        <input type="text" name="clave" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>

        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento">

        <label for="email">Email:</label>
        <input type="email" name="email">

        <label for="genero">Género:</label>
        <select name="genero">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono">

        <input type="submit" value="Agregar Propietario">
    </form>

    <br>

    <a href="../../index.php">Volver Atrás</a>
</body>
</html>