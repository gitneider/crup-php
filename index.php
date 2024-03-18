<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganadería CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 10px;
        }

        a {
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #333;
            background-color: #0066cc;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0050aa;
        }
    </style>
</head>
<body>
    <h1>Menú Principal</h1>
    
    <ul>
        <li><a href="views/propietarios/listar.php">Listado de Propietarios</a></li>
        <li><a href="views/propietarios/add.php">Agregar Propietario</a></li>
        <li><a href="views/fincas/index.php">Listado de Fincas</a></li>
        <li><a href="views/fincas/add.php">Agregar Finca</a></li>
    </ul>
</body>
</html>