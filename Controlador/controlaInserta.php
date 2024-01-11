<?php
    include_once "../Modelo/CampeonBD.php";

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        //Obtener los datos del formulario
        $nombre= $_POST["nombre"];
        $rol= $_POST["rol"];
        $dificultad= $_POST["dificultad"];
        $descripcion= $_POST["descripcion"];

        $newCampeon = new Campeon();
        $newCampeon->setNombre($nombre);
        $newCampeon->setRol($rol);
        $newCampeon->setDificultad($dificultad);
        $newCampeon->setDescripcion($descripcion);

        if(CampeonBD::add($newCampeon)){
            echo "<br> Registro insertado correctamente";
        }else{
            echo "<br> No se ha podido insertar";
        }
    }
?>