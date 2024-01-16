<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>
 
</head>
<body>
  <h2>Registro de Usuario </h2> 
  <form method="post" action="../Controlador/procesar_registro.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="pwd" required>

    <input type="submit" value="Registrar">
  </form>

</body>
</html>