CREATE DATABASE IF NOT EXISTS sql7822561;
use sql7822561;

CREATE TABLE if not exists usuarios (
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre, email, contrasena) VALUES
('Juan Pérez', 'juan.perez@example.com', 'hash123'),
('María López', 'maria.lopez@example.com', 'hash456'),
('Carlos García', 'carlos.garcia@example.com', 'hash789');

select * from usuarios;