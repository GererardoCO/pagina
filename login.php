<?php
session_start(); // Iniciar la sesión

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// Crear la conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $input_username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Comparar la contraseña en texto plano
    if ($user && $input_password === $user['password']) {
        // Autenticación exitosa
        $_SESSION['username'] = $user['username'];
        $_SESSION['full_name'] = $user['full_name']; // Guarda el nombre completo en la sesión
        header("Location: welcome.php");
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
