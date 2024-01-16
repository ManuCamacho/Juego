<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Inicio de Sesion</title>
 
</head>
<body>
  <h2>INICIO DE SESION </h2> 
  <form method="post" action="../Controlador/iniciar_sesion.php">
  <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="pwd" required>

    <input type="submit" value="Iniciar Sesion">
  </form>

</body>
</html>