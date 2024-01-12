<?php
include_once "../Modelo/Campeon.php";
include_once "../Modelo/CampeonBD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["modificar"])) {
        // Modificar el campeón
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $rol = $_POST["rol"];
        $dificultad = $_POST["dificultad"];
        $descripcion = $_POST["descripcion"];

        $campeonModificado = new Campeon();
        $campeonModificado->setId($id);
        $campeonModificado->setNombre($nombre);
        $campeonModificado->setRol($rol);
        $campeonModificado->setDificultad($dificultad);
        $campeonModificado->setDescripcion($descripcion);

        if (CampeonBD::update($campeonModificado)) {
            echo "Campeón modificado correctamente.";
            echo "<br><a href='../Vista/mostrarTodo.php'><button>Ver Todos</button></a>";
        } else {
            echo "Error al modificar el campeón.";
        }
    } elseif (isset($_POST["eliminar"])) {
        // Eliminar el campeón
        $id = $_POST["id"];

        if (CampeonBD::delete($id)) {
            echo "Campeón eliminado correctamente.";
        } else {
            echo "Error al eliminar el campeón.";
        }
    }
}
?>
