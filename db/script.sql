-- CREACION DE LA BD
CREATE DATABASE barberia;

-- TABLA DE SERVICIOS
CREATE TABLE servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- TABLA DE USUARIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

-- TABLA DE CITAS
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_nombre VARCHAR (100) NOT NULL,
    fecha DATE DEFAULT NULL,
    hora TIME NOT NULL,
    servicio_id INT,
    usuario_id INT,
    estado ENUM('pendiente', 'completa', 'cancelada') NOT NULL,
    FOREIGN KEY (servicio_id) REFERENCES servicios(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

