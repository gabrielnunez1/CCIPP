CREATE TABLE admin (
  admin_id int(11) NOT NULL auto_increment,
  admin_usuario varchar(50),
  admin_password varchar(50),
   PRIMARY KEY (admin_id)
);

INSERT INTO `admin` (`admin_id`, `admin_usuario`, `admin_password`) VALUES
(1, 'Aleavellaneda1', '1234'),
(2, 'Ulises', 'javacomedos'),
(3, 'gabi', '1234');

CREATE TABLE empresas (
  id_empresa int(11) NOT NULL auto_increment,
  razon_social varchar(50),
  nombre_fantasia varchar(50),
  cuit varchar(15),
  telefono varchar(20),
  celular varchar(20),
  correo varchar(60),
  rubro varchar(60),
  responsable varchar(60),
  socio boolean,
  provincia varchar(30),
  localidad varchar(30),
  numero_terminal  varchar(100),
  numero_visa varchar(100),
  numero_mastercard varchar(100),
  numero_amex varchar(100),
  numero_nativa varchar(100),
  participa_promociones boolean,
  direccion varchar(60),
  usuario varchar(50)  ,
  password varchar(50)  ,
  numero_socio varchar(6),
  logo varchar (100),
  visible boolean,
  PRIMARY KEY (id_empresa)
);


CREATE TABLE eventos (
  id_evento int(11) NOT NULL auto_increment,
  descripcion varchar(255),
  nombre varchar(50),
  logo varchar(100),
  visible boolean,
  PRIMARY KEY (id_evento)
);


CREATE TABLE productos (
  id_producto int(11) NOT NULL auto_increment,
  nombre varchar(50),
  descripcion varchar(1024),
  precio decimal(10,0),
  estado boolean,
  cantidad_descuento varchar(50),
  imagen varchar(100),
  imagen2 varchar(100),
  imagen3 varchar(100),
  imagen4 varchar(100),
  imagen5 varchar(100),
  rubro varchar(50),
  PRIMARY KEY (id_producto)
);
ALTER TABLE `productos` CHANGE `estado` `visible` BOOLEAN NULL DEFAULT NULL;
ALTER TABLE `productos` ADD `usuario` INT NOT NULL AFTER `rubro`;

CREATE TABLE rubro (
    id_rubro int(11) NOT NULL auto_increment,
    descripcion varchar(255),
    PRIMARY KEY (id_rubro)
);
INSERT INTO `rubro` (`id_rubro`, `descripcion`) VALUES
(1, 'Autos y Motos'),
(2, 'Computacion y Telefonia'),
(3, 'Electricidad'),
(4, 'Electrodomésticos'),
(5, 'Equipamientos'),
(6, 'Estilista y Estéticas'),
(7, 'Farmacia y perfumerí­a'),
(8, 'Hogar, Muebles'),
(9, 'Hoteles, Resto, Bares'),
(10, 'Indumentaria'),
(11, 'Joyeria y relojeria'),
(12, 'Librerí­a, papelerí­a'),
(13, 'Ópticas'),
(14, 'Pintureria, Ferreteria'),
(25, 'Productos Regionales'),
(26, 'Servicios'),
(27, 'Supermercado'),
(28, 'Veterinarias');

CREATE TABLE empresa_evento (
    id_empresa_evento int(11) NOT NULL auto_increment,
    id_empresa int(11) NOT NULL,
    id_evento int(11) NOT NULL,
    estado boolean,
    peticion boolean,
    PRIMARY KEY (id_empresa_evento)
);




CREATE TABLE personas(
  id int(11) NOT NULL AUTO_INCREMENT,
  dni int(11),
  nombre varchar(20),
  apellido varchar(20),
  fecha date,
  direccion varchar(50),
  telefono varchar(20),
  correo varchar(50),
  cuil varchar(20),
  persona_usuario varchar(50)  ,
  persona_password varchar(50)  ,
  PRIMARY KEY (id)
);
