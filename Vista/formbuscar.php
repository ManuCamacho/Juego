<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar, Modificar y Eliminar CAMPEON por Nombre</title>
</head>
<body>
    <h2>Buscar, Modificar y Eliminar CAMPEON por Nombre</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre del Campeon:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
        include_once "../Modelo/CampeonBD.php";

        $nombreBuscar = $_POST["nombre"];
        $campeonEncontrado = CampeonBD::getByNombre($nombreBuscar);

        if ($campeonEncontrado) {
            // Mostrar formulario con los datos y opciones de modificar o eliminar
            echo "<form action='../Controlador/controlaModificarEliminar.php' method='post'>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' id='nombre' name='nombre' value='{$campeonEncontrado->getNombre()}' required><br>";

            echo "<label for='rol'>Rol:</label>";
            echo "<input type='text' id='rol' name='rol' value='{$campeonEncontrado->getRol()}' required><br>";

            echo "<label for='dificultad'>Dificultad:</label>";
            echo "<input type='text' id='dificultad' name='dificultad' value='{$campeonEncontrado->getDificultad()}' required><br>";

            echo "<label for='descripcion'>Descripcion:</label>";
            echo "<textarea id='descripcion' name='descripcion' rows='4' cols='50' required>{$campeonEncontrado->getDescripcion()}</textarea><br>";

            echo "<input type='hidden' name='id' value='{$campeonEncontrado->getId()}'>";
            echo "<input type='submit' name='modificar' value='Modificar'>";
            echo "<input type='submit' name='eliminar' value='Eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'>";
            echo "</form>";
        } else {
            echo "<p>No se encontró ningún campeón con el nombre proporcionado.</p>";
        }
    }
    ?>
</body>
</html>
