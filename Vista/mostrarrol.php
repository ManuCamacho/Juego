<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Campeones por Rol</title>
</head>
<body>
    <h2>Mostrar Campeones por Rol</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="rol">Selecciona un Rol:</label>
        <select id="rol" name="rol">
            <option value="mago">Mago</option>
            <option value="luchador">Luchador</option>
            <option value="apoyo">Apoyo</option>
            <option value="asesion">Asesino</option>
            <option value="tirador">Tirador</option>
            <option value="tanque">Tanque</option>            
        </select>
        <br><br>
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mostrar"])) {
        include_once "../Modelo/CampeonBD.php";

        $rol = $_POST["rol"]; // Obtener el rol seleccionado

        $campeonesPorRol = CampeonBD::getByRol($rol);

        // Mostrar los datos de los campeones obtenidos por un rol específico
        if ($campeonesPorRol) {
            echo "<table border='1'>";
        echo "<tr></th><th>Nombre</th><th>Rol</th><th>Dificultad</th><th>Descripción</th></tr>";
        foreach ($campeonesPorRol as $campeon) {
            echo "<tr>";
            echo "<td>" . $campeon->getNombre() . "</td>";
            echo "<td>" . $campeon->getRol() . "</td>";
            echo "<td>" . $campeon->getDificultad() . "</td>";
            echo "<td>" . $campeon->getDescripcion() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
            
        } else {
            echo "<p>No hay campeones con el rol seleccionado</p>";
        }
    }
    ?>
</body>
</html>
