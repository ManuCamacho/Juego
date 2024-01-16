<?php
include_once '../Modelo/UsuarioBD.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["usuario"];
        $pwd = $_POST["pwd"];

        $usuarioBD = UsuarioBD::InicioSesion($usuario,$pwd);
        if($usuarioBD && password_verify($pwd,$usuarioBD['pwd'])){
            echo "USUARIO CORRECTAMENTE LOGUEADO.";
    
            echo '<form action="../Vista/formPrincipal.php" method="get">';
            echo '<input type="submit" value="Pulse aquí para ir a la pantalla Principal del Juego">';
            echo '</form>';
        exit();

        }else{
            echo "Fallo al iniciar sesión";
        }

    }

?>