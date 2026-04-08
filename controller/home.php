<?php
session_start();

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
    header("Location: formulario_crear_usuario.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Bienvenida, <?php echo htmlspecialchars($_SESSION["nombre"]); ?></h1>
    <p>Tu usuario es: <?php echo htmlspecialchars($_SESSION["user"]); ?></p>

    <form action="accio.php" method="post">
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
</body>
</html>