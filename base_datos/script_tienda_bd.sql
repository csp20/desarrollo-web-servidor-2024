/* base datos tienda */
CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE categorias (
    categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE producto (
    id_producto INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    precio DECIMAL(6,2),
    categoria VARCHAR(30),
    stock INT(3) DEFAULT 0,
    imagen VARCHAR(60),
    descripcion VARCHAR(255),
    FOREIGN KEY (categoria) REFERENCES categorias(categoria)
);
CREATE TABLE usuarios (
        usuario VARCHAR(50) NOT NULL,
        contraseña VARCHAR(50) NOT NULL
    );
