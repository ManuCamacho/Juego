<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Principal</title>
</head>
<body>

    <h1>Formulario Principal</h1>

    <!-- Botón para Mostrar todos los campeones -->
    <form action="mostrarTodo.php" method="get">
        <button type="submit">Mostrar Todos los Campeones</button>
    </form>

    <!-- Botón para Mostrar por Rol -->
    <form action="mostrarrol.php" method="get">
        <button type="submit">Mostrar por Rol</button>
    </form>

    <!-- Botón para Insertar Campeon -->
    <form action="forminserta.php" method="get">
        <button type="submit">Insertar Campeon</button>
    </form>

    <!-- Botón para Buscar, Modificar y Eliminar Campeon -->
    <form action="formbuscar.php" method="get">
        <button type="submit">Buscar, Modificar y Eliminar Campeon</button>
    </form>

</body>
</html>
