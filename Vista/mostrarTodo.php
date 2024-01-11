<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Todos los Datos de CAMPEON</title>
</head>
<body>
    <h2>Mostrar Todos los Datos de CAMPEON</h2>

    <?php
    include_once "../Modelo/CampeonBD.php";
    
    $campeones = CampeonBD::getAll();

    if ($campeones) {
        echo "<table border='1'>";
        echo "<tr></th><th>Nombre</th><th>Rol</th><th>Dificultad</th><th>Descripción</th></tr>";
        foreach ($campeones as $campeon) {
            echo "<tr>";
            echo "<td>" . $campeon->getNombre() . "</td>";
            echo "<td>" . $campeon->getRol() . "</td>";
            echo "<td>" . $campeon->getDificultad() . "</td>";
            echo "<td>" . $campeon->getDescripcion() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay campeones en la tabla</p>";
    }
    ?>
</body>
</html>
