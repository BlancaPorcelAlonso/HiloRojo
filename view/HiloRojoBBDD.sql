drop database sql7824380;
CREATE DATABASE IF NOT EXISTS sql7824380;
use sql7824380;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    contrasena VARCHAR(255)
  
);

INSERT INTO usuarios (nombre, email, contrasena) VALUES
('Juan Pérez', 'juan.perez@example.com', 'hash123'),
('María López', 'maria.lopez@example.com', 'hash456'),
('Carlos García', 'carlos.garcia@example.com', 'hash789'),
('usuario', 'usuario@gmail.com', 'usuario1234'),
('empresa', 'empresa@gmail.com', 'empresa1234'),
('admin', 'admin@gmail.com', 'admin1234');

SELECT * FROM usuarios;