-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS user_registration;

-- Seleccionar la base de datos
USE user_registration;

-- Crear la tabla de usuarios
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Ejemplo de inserción de un usuario
INSERT INTO users (full_name, username, email, password) 
VALUES ('John Doe', 'johndoe', 'johndoe@example.com', 'hashed_password_here');
