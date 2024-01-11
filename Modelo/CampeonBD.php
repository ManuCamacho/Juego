<?php
include_once 'Campeon.php';

    class CampeonBD{

        public static function add(Campeon $c):bool{
            $result = false;

            // Establecemos conexion con la BBDD
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            //preparar la consulta SQL

            $sql = "INSERT INTO campeon (nombre,rol,dificultad,descripcion) VALUES (:nombre,:rol,:dificultad,:descripcion)";
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindValue(":nombre",$c->getNombre());
            $sentencia->bindValue(":rol",$c->getRol());
            $sentencia->bindValue(":dificultad",$c->getDificultad());
            $sentencia->bindValue(":descripcion",$c->getDescripcion());



            return $sentencia->execute();

          
        }
        
        public static function getAll(){
            // Establecemos conexion con la BBDD
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            //preparar la consulta
            $sql="SELECT * FROM campeon";
            $sentencia = $conexion-> prepare($sql);

            $sentencia->setFetchMode(PDO::FETCH_CLASS,"Campeon");
            $sentencia->execute();

            return $sentencia->fetchAll();
        }
        public static function getByRol($rol){
            // Establecemos la conexión con la base de datos
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
    
            $sql = "SELECT * FROM campeon WHERE rol = :rol";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);
            $sentencia->execute();
    
            $campeones = $sentencia->fetchAll(PDO::FETCH_CLASS, 'Campeon');
    
            return $campeones;
        }

        public static function getByNombre($nombre) {
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
        
            $sql = "SELECT * FROM campeon WHERE nombre = :nombre";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sentencia->execute();
        
            $fila = $sentencia->fetch(PDO::FETCH_ASSOC);
        
            if ($fila) {
                $campeon = new Campeon();
                $campeon->setNombre($fila['nombre']);
                $campeon->setRol($fila['rol']);
                $campeon->setDificultad($fila['dificultad']);
                $campeon->setDescripcion($fila['descripcion']);
                return $campeon;
            } else {
                return null; // Retorna null si no se encuentra el campeón con el nombre proporcionado
            }
        }
        
    }

    
    
?>