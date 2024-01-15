<?php
include_once "../Modelo/Campeon.php";
include_once "../Modelo/CampeonBD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["modificar"])) {
        // Modificar el campeón
        $nombre = $_POST["nombre"];
        $rol = $_POST["rol"];
        $dificultad = $_POST["dificultad"];
        $descripcion = $_POST["descripcion"];

        $campeonModificado = new Campeon();
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
        // Obtener el nombre del campeón a eliminar
        $nombreCampeon = $_POST["nombre"];
    
        // Verificar si el nombre del campeón no está vacío
        if (!empty($nombreCampeon)) {
            // Intentar eliminar el campeón
            if (CampeonBD::delete($nombreCampeon)) {
                echo "<br>Campeón eliminado correctamente";
            } else {
                echo "<br>No se ha podido eliminar el campeón";
            }
        } else {
            echo "<br>Por favor, selecciona un campeón a eliminar";
        }
    }
}
?>
