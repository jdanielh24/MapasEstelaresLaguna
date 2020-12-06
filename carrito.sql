SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: carrito

-- Creacion de tabla carrito
CREATE TABLE carrito (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_producto int(11) NOT NULL,
  cantidad double NOT NULL,
  id_usuario int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


-- tabla productos
CREATE TABLE productos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(300) NOT NULL,
  descripcion text NOT NULL,
  precio double NOT NULL,
  imagen varchar(200) NOT NULL,
  inventario int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


-- tabla productos_venta
CREATE TABLE productos_venta (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_venta int(11) NOT NULL,
  id_producto int(11) NOT NULL,
  cantidad double NOT NULL,
  precio double NOT NULL,
  subtotal double NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


-- tabla usuario

CREATE TABLE usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  pass varchar(100) NOT NULL,
  nivel varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;


-- tabla `ventas`

CREATE TABLE ventas (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_usuario int(11) NOT NULL,
  total double NOT NULL,
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE envioss (
  id_envio int(11) NOT NULL AUTO_INCREMENT,
  direccion varchar(100) NOT NULL,
  ciudad varchar(50) NOT NULL,
  id_venta int(11) NOT NULL,
  PRIMARY KEY (id_envios)
) ENGINE=InnoDB;


-- Insertar registros en tabla `productos`
INSERT INTO productos (nombre, descripcion, precio, imagen, inventario) VALUES
('Mapa con silueta', 'Lleva tu mapa a otro nivel y dejanos dibujar una fotografía tuya de manera original. ', 350, 'diseño1.jpg', 30),
('Mapa clásico', 'Un mapa para los amantes de lo clásico. Deja que las estrellas hablen por ti.', 270, 'diseño2.jpg', 45),
('Mapa con fotografía', 'Acompaña tu mapa con una fotografía de fondo para darle un estilo original.', 300, 'diseño3.jpg', 20);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;