<?php

include_once '../Modelo/UsuarioBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    $usuarioBD = UsuarioBD::Registro($nombre,$usuario,$pwd,$email);

    if ($usuarioBD) {
        echo "El usuario $usuario ha sido introducido en el sistema con la contraseña $pwd. Ahora puedes iniciar sesión.";
        echo '<form action="../Vista/formIniciaSesion.php" method="get">';
        echo '<input type="submit" value="Pulse aquí para ir a la pantalla de inicio de sesión">';
        echo '</form>';

        exit();
    } else {
        echo "No se ha podido realizar el registro";
    }
}
?>
