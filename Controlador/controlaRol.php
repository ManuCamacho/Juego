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
