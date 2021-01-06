-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2018 a las 17:59:31
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u560125893_siste`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_usuario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `admin_password` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_usuario`, `admin_password`) VALUES
(1, 'Aleavellaneda1', '1234'),
(2, 'Ulises', 'javacomedos'),
(3, 'gabi', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `razon_social` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_fantasia` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuit` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rubro` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `responsable` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `socio` tinyint(1) DEFAULT NULL,
  `provincia` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `localidad` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_terminal` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_visa` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_mastercard` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_amex` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_nativa` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `participa_promociones` tinyint(1) DEFAULT NULL,
  `direccion` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero_socio` varchar(6) COLLATE latin1_spanish_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `razon_social`, `nombre_fantasia`, `cuit`, `telefono`, `celular`, `correo`, `rubro`, `responsable`, `socio`, `provincia`, `localidad`, `numero_terminal`, `numero_visa`, `numero_mastercard`, `numero_amex`, `numero_nativa`, `participa_promociones`, `direccion`, `usuario`, `password`, `numero_socio`, `logo`, `visible`) VALUES
(4, '', 'Tudex Networks', '', '543764631054', '', 'aleavellaneda1@gmail.com', '', '', 0, '', '', '', '', '', '', '', 0, '', 'Tudex', 'Networks', '', '', 0),
(5, 'Sony Tecnology', 'Sony', '20401084135', '3764631054', '3764631054', 'aleavellaneda1@gmail.com', 'Electricidad e Iluminacion', 'Avellaneda Alejandro', 0, 'Misiones', 'POSADAS', '', '', '', '', '', 0, 'CALLE 149 Y 166 - CASA 8 BÂ°36 VIV- ITAEMBE MINI', 'Sony', 'Sony', '', '../img/empresa35154.png', 1),
(6, 'Google', 'Google', '20401084138', '3764631054', '3764631054', 'aleavellaneda1@gmail.com', 'Hoteles, Resto, Bares', 'Avellaneda Alejandro', 0, 'Misiones', 'Posadas', '', '', '', '', '', 0, '149 Y 166 - CASA 8 M:25 - BARRIO : I. MINI', 'Google', 'Google', '', '../img/empresa42503.png', 1),
(7, 'AVELLANEDA ALEJANDRO NICOLAS', 'Fravega', '20401084135', '3764631054', '3764631054', 'aleavellaneda1@gmail.com', 'Electricidad e Iluminacion', 'Avellaneda Alejandro', 0, 'Buenos Aires-GBA', 'POSADAS', '', '', '', '', '', 0, 'CALLE 149 Y 166 - CASA 8 BÂ°36 VIV- ITAEMBE MINI', 'Fra', 'Fra', '', '../img/empresa48356.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_evento`
--

CREATE TABLE `empresa_evento` (
  `id_empresa_evento` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `peticion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresa_evento`
--

INSERT INTO `empresa_evento` (`id_empresa_evento`, `id_empresa`, `id_evento`, `estado`, `peticion`) VALUES
(21, 6, 9, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `descripcion`, `nombre`, `logo`, `visible`) VALUES
(9, 'Es una fiesta de descuentos y promociones donde los comerciantes por una vez y de manera excepcional hacen un descuento Ãºnico y extraordinario durante esos dÃ­as!', 'Reventon 2019', 'evento32741.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `nombre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuil` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `persona_usuario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `persona_password` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `descripcion` varchar(1024) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `cantidad_descuento` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen3` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen4` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen5` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rubro` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `visible`, `cantidad_descuento`, `imagen`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `rubro`, `usuario`) VALUES
(2, 'Lego Dimensions - LOTR Gimli Fun Pack', 'Â¡Construye un Gimli mÃ¡s fuerte que un buey y Ãºnete a Ã©l en un emocionante multiverso compuesto por tus personajes favoritos! ColÃ³calo en el LEGOÂ® Toy Pad y vele entrar en acciÃ³n en el juego, luego activa sus habilidades especiales Super Strength y Mini Access para resolver acertijos y dominar al enemigo.', '1500', 1, '20', '5-imagen-1313718.png', '5-imagen-2419125.png', '', '', '', 'Computacion y Telefonia', 5),
(3, 'Play Station', 'Â¿Alguna vez soÃ±aste con ser un superhÃ©roe? Conoce a Chris, un niÃ±o de 10 aÃ±os con mucha imaginaciÃ³n y creatividad que escapa de la realidad y vive fantÃ¡sticas aventuras como su alter ego: Â¡el asombroso Captain Spirit! Captain Spirit es una historia original ambientada en el universo de Life is Strange que contiene vÃ­nculos a la nueva historia y los personajes de Life is Strange 2.', '5000', 1, '10', '5-imagen-144170.png', '5-imagen-2644444.png', '', '', '', 'Computacion y Telefonia', 5),
(4, 'PlayStationÂ®4', 'Â¿Alguna vez soÃ±aste con ser un superhÃ©roe? Conoce a Chris, un niÃ±o de 10 aÃ±os con mucha imaginaciÃ³n y creatividad que escapa de la realidad y vive fantÃ¡sticas aventuras como su alter ego: Â¡el asombroso Captain Spirit! Captain Spirit es una historia original ambientada en el universo de Life is Strange que contiene vÃ­nculos a la nueva historia y los personajes de Life is Strange 2.', '7000', 1, '10', '5-imagen-1242951.png', '5-imagen-2313718.png', '', '', '', 'Computacion y Telefonia', 5),
(5, 'Google Pixel 2 Xl', 'Funciona todo super fluÃ­do, no tiene aplicaciones innecesarias, cÃ¡mara excelente, muy bien construÃ­do y ademÃ¡s es mÃ¡s lindo de lo que parece en las imÃ¡genes. Nunca mÃ¡s quiero usar otro android que no sea un pixel.', '4000', 1, '10', '6-imagen-1285851.png', '6-imagen-2285851.png', '', '', '', 'Computacion y Telefonia', 6),
(6, 'Google Chromecast 2 Gen ', 'Nuevo por fuera... y tambiÃ©n nuevo por dentro. Su forma redonda permite que Google haya introducido tres antenas distintas, lo que, segÃºn Google, hace que el rendimiento de su conexiÃ³n inalÃ¡mbrica sea mucho mejor. Dicho de otra forma: tendrÃ¡s menos problemas de conectividad, ya que captarÃ¡ mejor la seÃ±al de tu red casera.', '1600', 1, '10', '6-imagen-1174175.png', '6-imagen-260052.png', '6-imagen-3106805.png', '6-imagen-4120420.png', '', 'Computacion y Telefonia', 6),
(7, 'Tarjeta Google Play U$100 Usa ', 'DETALLES DEL PRODUCTO -Tarjeta digital.  -SÃ³lo para cuentas USA. -Permite adquirir cualquier contenido de Play Store como juegos, Apps, libros, mÃºsica, series y pelÃ­culas.', '4500', 1, '10', '6-imagen-1105125.png', '6-imagen-2105125.png', '', '', '', 'Computacion y Telefonia', 6),
(8, 'Motorola Moto G6 Plus Deep Indigo', 'CaracterÃ­sticas Marca Motorola Modelo G6 Memoria interna 64 GB LÃ­nea Moto Memoria RAM 4 GB CompaÃ±Ã­a telefÃ³nica Liberado Sistema operativo Android 8.0 Oreo TamaÃ±o de pantalla 5.9 in ResoluciÃ³n de la cÃ¡mara 5 Mpx ResoluciÃ³n de la cÃ¡mara frontal 8 Mpx Medidas 16 cm x 7.55 cm x 0.799 cm Peso 167 g Tipos de tarjeta de memoria microSD Card USB No Procesador Octa core 2.2 Ghz NÃºcleos del procesador Octa-Core Velocidad del procesador 2.2 GHz Capacidad de la baterÃ­a 3.2 Ah Tipo de pantalla IPS Origen Argentina', '1499', 1, '10', '7-imagen-1218078.png', '7-imagen-2167258.png', '7-imagen-3231412.png', '', '', 'Computacion y Telefonia', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `id_rubro` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rubro`
--

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `empresa_evento`
--
ALTER TABLE `empresa_evento`
  ADD PRIMARY KEY (`id_empresa_evento`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id_rubro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresa_evento`
--
ALTER TABLE `empresa_evento`
  MODIFY `id_empresa_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
