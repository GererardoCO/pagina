<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// Crear la conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa!";
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
    exit(); // Detener la ejecución si la conexión falla
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }



    // Preparar la consulta SQL
    $sql = "INSERT INTO users (full_name, username, email, password) VALUES (:full_name, :username, :email, :password)";
    $stmt = $conn->prepare($sql);

    // Asociar parámetros
    $stmt->bindValue(':full_name', $full_name);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    // Ejecutar la consulta
    try {
        $stmt->execute();
        // Redirigir a index.html después de un registro exitoso
        header("Location: index.html");
        exit(); // Asegurarse de que no se ejecute más código después de redirigir
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
?>
