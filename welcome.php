<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: index.html"); // Redirigir a la página de inicio si no está autenticado
    exit();
}

$full_name = $_SESSION['full_name']; // Obtener el nombre completo desde la sesión
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style.css" />
    <style>
        /* Estilos básicos para el menú y el encabezado */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            display: flex;
            flex: 1;
            padding: 20px;
        }
        .menu {
            display: flex;
            justify-content: space-around;
            background-color: #f4f4f4;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .menu a {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .menu a:hover {
            background-color: #ddd;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #ff0000;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido <?php echo htmlspecialchars($full_name); ?></h1>
    </header>

    <div class="menu">
        <a href="#">Inicio</a>
        <a href="#">Videos</a>
        <a href="#">Solicitudes</a>
        <a href="#">Notificaciones</a>
        <a href="#">Foros</a>
        <a href="#">Peticiones</a>
        <a href="#">Noticias</a>
        <a href="#">Manifestaciones Virtuales</a>
        <a href="logout.php" class="logout-btn">Cerrar sesión</a>
    </div>

    <div class="container">
        <div class="content">
            <h1>Welcome</h1>
            <p>You have successfully logged in.</p>
        </div>
    </div>
</body>
</html>
