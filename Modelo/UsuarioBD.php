<?php
    include_once 'Usuario.php';
    class UsuarioBD{

        public static function UsuarioExiste($usuario) {
            // Establecemos conexión con la BBDD
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
        
            // Verificar si el nombre de usuario existe en la BBDD
            $sqlVerificar = "SELECT COUNT(*) FROM usuario WHERE usuario = :usuario";
            $sentenciaVerificar = $conexion->prepare($sqlVerificar);
            $sentenciaVerificar->execute(['usuario' => $usuario]);
        
            return $sentenciaVerificar->fetchColumn() > 0;
        }

        public static function Registro($nombre, $usuario, $pwd, $email) {
            if (self::UsuarioExiste($usuario)) {
                return false;
            }

            // Establecemos conexión con la BBDD
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();

            // Insertar nuevo usuario si no existe
            $sql = "INSERT INTO usuario(nombre, usuario, pwd, email) VALUES(:nombre, :usuario, :pwd, :email)";
            $sentencia = $conexion->prepare($sql);
            $result = $sentencia->execute([
                "nombre" => $nombre,
                "usuario" => $usuario,
                "pwd" => password_hash($pwd, PASSWORD_DEFAULT),
                "email" => $email
            ]);

            return $result; 
        }

        

        public static function InicioSesion($usuario){
            // Establecemos conexión con la BBDD
            include_once '../Conexion/conexion.php';
            $conexion = Conexion::obtenerConexion();
        
            $sql = "SELECT * FROM usuario WHERE usuario = ?";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute([$usuario]);
        
            $usuarioBD = $sentencia->fetch(); 
            
            return $usuarioBD; 
        }
        
    }
?>