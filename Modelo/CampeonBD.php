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
                return null; 
            }
        }
        public static function update(Campeon $campeon): bool {
            try {
                include_once '../Conexion/conexion.php';
                $conexion = Conexion::obtenerConexion();
    
                $sql = "UPDATE campeon SET nombre = :nombre, rol = :rol, dificultad = :dificultad, descripcion = :descripcion WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
    
                $sentencia->bindValue(":nombre", $campeon->getNombre());
                $sentencia->bindValue(":rol", $campeon->getRol());
                $sentencia->bindValue(":dificultad", $campeon->getDificultad());
                $sentencia->bindValue(":descripcion", $campeon->getDescripcion());
                $sentencia->bindValue(":id", $campeon->getId());
    
                return $sentencia->execute();
            } catch (PDOException $e) {
                return false;
            }
        }

        public static function delete($id): bool {
            try {
                include_once '../Conexion/conexion.php';
                $conexion = Conexion::obtenerConexion();
    
                $sql = "DELETE FROM campeon WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindValue(":id", $id);
    
                return $sentencia->execute();
            } catch (PDOException $e) {
                return false;
            }
        }
    
        
    }

    
    
?>