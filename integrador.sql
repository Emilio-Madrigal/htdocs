-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 12:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integrador`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Reponer_stock` (IN `p_id_pro` INT, IN `p_cantidad_actual` INT)   BEGIN
    DECLARE cantidadMinima INT DEFAULT 10;

    IF p_cantidad_actual < cantidadMinima THEN
        INSERT INTO ordenes (fecha, id_pro, id_prov, fec_entr, id_alma)
        VALUES (CURDATE(), p_id_pro, (SELECT id_prov FROM producto WHERE id_pro = p_id_pro), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 1);
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `almacenista`
--

CREATE TABLE `almacenista` (
  `id_alma` smallint(6) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `id_inv` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `almacenista`
--

INSERT INTO `almacenista` (`id_alma`, `nombre`, `apellido`, `fec_nac`, `id_inv`) VALUES
(1, 'Javier', 'Enrique', '1990-05-15', 1),
(2, 'Gabriel', 'Marcelino', '1985-07-20', 1),
(3, 'Gustavo', 'Garc?a', '1992-03-10', 1),
(4, 'Pepe', 'Gonzales', '2009-10-24', 2),
(5, 'Federico', 'Arturo', '1999-06-20', 2),
(6, 'Angelina', 'Gomez', '1997-03-12', 2),
(7, 'Fito', 'Paez', '0000-00-00', 3),
(8, 'George', 'Orwell', '2008-06-20', 3),
(9, 'Vicente', 'Fernandez', '2001-03-12', 3),
(10, 'Diego', 'Rivera', '1990-12-08', 4),
(11, 'Frida', 'Kahlo', '1991-07-06', 4),
(12, 'Octavio', 'Paz', '1995-03-31', 4),
(13, 'Emiliano', 'Zapata', '1980-08-08', 5),
(14, 'Pancho', 'Villa', '1982-06-05', 5),
(15, 'Sor', 'Juana', '1984-11-12', 5),
(16, 'Benito', 'Juarez', '1975-03-21', 6),
(17, 'Josefa', 'Ortiz', '1983-04-19', 6),
(18, 'Miguel', 'Hidalgo', '1981-05-08', 6),
(19, 'Pedro', 'Infante', '1992-11-18', 7),
(20, 'Jorge', 'Negrete', '1990-12-01', 7),
(21, 'Lola', 'Beltran', '1994-08-07', 7),
(22, 'Vicente', 'Fernandez', '1980-02-17', 8),
(23, 'Chavela', 'Vargas', '1985-04-17', 8),
(24, 'Silvia', 'Pinal', '1989-10-12', 8),
(25, 'Guillermo', 'Del Toro', '1985-10-09', 9),
(26, 'Alfonso', 'Cuaron', '1986-11-28', 9),
(27, 'Alejandro', 'Inarritu', '1983-08-15', 9),
(28, 'Gael', 'Garcia', '1981-11-30', 10),
(29, 'Diego', 'Luna', '1982-05-29', 10),
(30, 'Salma', 'Hayek', '1984-09-02', 10),
(31, 'pruebaModificarA', 'ModifiA', '2024-11-28', 1),
(34, 'pruebaUser', 'userPrueba', '2024-11-29', 1),
(35, 'pruead', 'ada', '2024-11-29', 1),
(36, 'estoy', 'muerto', '2024-11-29', 1),
(37, 'prueba', 'again ', '2024-11-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id_inv` mediumint(9) NOT NULL,
  `id_alma` smallint(6) DEFAULT NULL,
  `nombre_inv` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id_inv`, `id_alma`, `nombre_inv`) VALUES
(1, 1, 'Inventario Seco'),
(2, 2, 'Inventario Refrigerados'),
(3, 3, 'Inventario Limpieza'),
(4, 4, 'Inventario Bebidas'),
(5, 5, 'Inventario Embutidos'),
(6, 6, 'Inventario Conservas'),
(7, 7, 'Inventario Vegetales'),
(8, 8, 'Inventario Alcoh?licos'),
(9, 9, 'Inventario Papel'),
(10, 10, 'Inventario Varios');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id_marca` smallint(6) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'La Moderna'),
(2, 'La Sierra'),
(3, 'Capullo'),
(4, 'Lala'),
(5, 'San Juan'),
(6, 'Ariel'),
(7, 'Zote'),
(8, 'Coca-Cola'),
(9, 'Bimbo'),
(10, 'McCormick'),
(12, 'prueba2');

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE `ordenes` (
  `id_nota` smallint(6) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `id_prov` smallint(6) DEFAULT NULL,
  `fec_entr` date DEFAULT NULL,
  `id_alma` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordenes`
--

INSERT INTO `ordenes` (`id_nota`, `fecha`, `id_pro`, `id_prov`, `fec_entr`, `id_alma`) VALUES
(2, '2024-11-28', 107, 5, '2024-12-05', 1),
(3, '2024-11-28', 103, 1, '2024-12-05', 1),
(4, '2024-11-29', 103, 1, '2024-11-29', 1),
(5, '2024-11-29', 106, 4, '2024-11-29', 1),
(6, '2024-11-29', 160, 1, '2024-12-06', 1),
(7, '2024-11-29', 103, 12, '2024-11-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_pro` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `caducidad` date DEFAULT NULL,
  `id_marca` smallint(6) DEFAULT NULL,
  `id_inv` mediumint(9) DEFAULT NULL,
  `id_prov` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_pro`, `nombre`, `cantidad`, `precio`, `caducidad`, `id_marca`, `id_inv`, `id_prov`) VALUES
(103, 'Arroz', 0, 18.50, '2025-12-31', 1, 1, 1),
(104, 'Leche', 0, 23.50, '2024-11-30', 4, 2, 2),
(105, 'Jabon', 0, 8.99, '2025-06-15', 7, 3, 3),
(106, 'Cerveza', 0, 45.00, '2024-12-31', 8, 4, 9),
(107, 'Pan', 0, 10.50, '2024-12-05', 9, 5, 5),
(108, 'Sardinas', 0, 22.00, '2025-07-20', 6, 6, 6),
(109, 'Tomate', 0, 15.00, '2024-11-20', 2, 7, 8),
(110, 'Refresco', 0, 20.00, '2025-01-10', 8, 4, 4),
(111, 'Papel Higienico', 0, 6.75, '2026-03-01', 7, 9, 10),
(112, 'Especias', 0, 35.00, '2025-08-05', 10, 10, 7),
(113, 'Aceite', 0, 30.00, '2025-11-30', 1, 1, 1),
(114, 'Lechuga', 0, 10.00, '2024-12-15', 2, 7, 8),
(115, 'Carne de Res', 0, 120.00, '2025-01-31', 1, 1, 7),
(116, 'Pescado', 0, 85.00, '2024-12-20', 6, 6, 6),
(117, 'Pollo', 0, 60.00, '2025-02-28', 1, 1, 7),
(118, 'Frijoles', 0, 25.50, '2025-05-15', 1, 1, 1),
(119, 'Galletas', 0, 12.00, '2024-12-10', 9, 5, 5),
(120, 'Manteca', 0, 13.00, '2025-03-01', 1, 1, 1),
(121, 'Pasta', 0, 18.00, '2025-11-10', 1, 1, 1),
(122, 'Cereal', 0, 28.00, '2025-02-01', 9, 1, 2),
(123, 'Cafe', 0, 40.00, '2025-06-15', 10, 1, 2),
(124, 'Chocolates', 0, 25.00, '2025-07-10', 9, 1, 5),
(125, 'Salsas', 0, 15.00, '2025-12-15', 10, 1, 4),
(126, 'Atun', 0, 18.00, '2025-09-20', 6, 6, 6),
(127, 'Harina', 0, 20.00, '2025-11-01', 1, 1, 1),
(128, 'Mantequilla', 0, 30.00, '2024-11-05', 4, 5, 2),
(129, 'Tomate Triturado', 0, 12.00, '2025-07-30', 6, 6, 6),
(130, 'Yogur', 0, 14.00, '2024-11-30', 4, 2, 2),
(131, 'Gaseosa', 0, 17.50, '2025-01-01', 8, 4, 9),
(132, 'Vinagre', 0, 10.00, '2025-05-15', 7, 4, 4),
(133, 'Pechuga de Pavo', 0, 55.00, '2024-12-01', 7, 5, 7),
(134, 'Chiles', 0, 5.50, '2025-04-15', 2, 7, 8),
(135, 'Acelga', 0, 8.00, '2025-03-10', 2, 7, 8),
(136, 'Jugo de Naranja', 0, 22.50, '2025-12-31', 8, 4, 4),
(137, 'Vino', 0, 120.00, '2025-12-10', 8, 4, 9),
(138, 'Whisky', 0, 350.00, '2025-11-30', 8, 4, 9),
(139, 'Cerveza Oscura', 0, 50.00, '2025-01-15', 8, 4, 9),
(140, 'Mayonesa', 0, 18.00, '2025-06-25', 7, 3, 5),
(141, 'Mostaza', 0, 13.00, '2025-05-01', 10, 3, 4),
(142, 'Salsich?n', 0, 40.00, '2025-04-10', 7, 5, 7),
(143, 'Pimienta', 0, 15.00, '2025-07-15', 10, 1, 4),
(144, 'Pechuga de Pollo', 0, 65.00, '2025-01-20', 7, 5, 7),
(145, 'Vainilla', 0, 40.00, '2025-09-01', 10, 1, 2),
(146, 'Cereal Integral', 0, 27.00, '2025-05-10', 9, 1, 2),
(147, 'Papas Fritas', 0, 12.00, '2025-08-01', 9, 10, 4),
(148, 'Chicles', 0, 3.50, '2025-12-15', 9, 10, 4),
(149, 'Lentes de Sol', 0, 150.00, '2025-12-31', 10, 10, 10),
(150, 'Papel de Cocina', 0, 5.99, '2025-07-10', 7, 9, 10),
(151, 'Miel', 0, 45.00, '2025-05-20', 10, 1, 7),
(152, 'Cereal de Avena', 0, 28.50, '2025-02-01', 9, 1, 2),
(153, 'Cloro', 0, 8.00, '2025-06-30', 7, 3, 3),
(154, 'Leche Condensada', 0, 20.00, '2025-04-01', 4, 2, 2),
(155, 'Chicles de Menta', 0, 4.00, '2025-10-01', 9, 10, 4),
(156, 'Aceite de Oliva', 0, 60.00, '2025-07-30', 1, 1, 1),
(157, 'Sal', 0, 5.00, '2025-09-30', 1, 1, 1),
(158, 'Frutas Mixtas', 0, 45.00, '2025-03-01', 2, 7, 8),
(166, 'leche', 0, 2.00, '2024-11-28', 2, 4, 2);

--
-- Triggers `producto`
--
DELIMITER $$
CREATE TRIGGER `post_eliminacion` AFTER DELETE ON `producto` FOR EACH ROW BEGIN
    
    INSERT INTO productos_eliminados (id_pro, nombre, fecha_eliminacion)
    VALUES (OLD.id_pro, OLD.nombre, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productos_eliminados`
--

CREATE TABLE `productos_eliminados` (
  `id_pro` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `caducidad` date DEFAULT NULL,
  `id_marca` smallint(6) DEFAULT NULL,
  `id_inv` mediumint(9) DEFAULT NULL,
  `id_prov` smallint(6) DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos_eliminados`
--

INSERT INTO `productos_eliminados` (`id_pro`, `nombre`, `precio`, `caducidad`, `id_marca`, `id_inv`, `id_prov`, `fecha_eliminacion`) VALUES
(104, 'Leche', 23.50, '2024-11-30', 4, 2, 2, '2024-11-28 10:23:37'),
(163, 'leche', 40.00, '2024-11-30', 2, 4, 2, '2024-11-28 10:08:37'),
(164, 'Emilio', NULL, NULL, NULL, NULL, NULL, '2024-11-28 09:20:26'),
(165, 'jamon2', NULL, NULL, NULL, NULL, NULL, '2024-11-27 17:08:20'),
(167, 'leche', 2.00, '2024-11-28', 2, 4, 2, '2024-11-28 10:31:18'),
(168, 'leche', 2.00, '2024-11-28', 2, 4, 2, '2024-11-28 10:31:52'),
(169, 'leche', 2.00, '2024-11-28', 2, 4, 2, '2024-11-28 10:32:36'),
(170, 'dadada', 2.00, '2024-11-28', 2, 4, 2, '2024-11-28 10:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` smallint(6) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `num_contacto` bigint(10) DEFAULT NULL,
  `Nombre_Emp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre`, `num_contacto`, `Nombre_Emp`) VALUES
(1, 'Proveedor Alimentos Basicos', 3312345678, 'Basicos MX'),
(2, 'Proveedor Lacteos', 3323456789, 'Lacteos S.A.'),
(3, 'Proveedor Higiene', 3334567890, 'Higiene Total'),
(4, 'Proveedor Bebidas', 3345678901, 'Refrescos MX'),
(5, 'Proveedor Panaderia', 3356789012, 'Panaderia Central'),
(6, 'Proveedor Conservas', 3367890123, 'Conservas y Mas'),
(7, 'Proveedor Embutidos', 3378901234, 'Carnes y Embutidos'),
(8, 'Proveedor Vegetales', 3389012345, 'Frescos del Campo'),
(9, 'Proveedor Bebidas Alcohilicas', 3390123456, 'Alcoholes y Vinos'),
(10, 'Proveedor Papeleria', 3301234567, 'Papeleria Express'),
(12, 'lechew', 3319049042, 'mapre inc');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `tipo` char(1) NOT NULL,
  `id_alma` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`user`, `pass`, `tipo`, `id_alma`) VALUES
('masterAdmi', '$2y$10$E6BxkyeQd2.3IFa.hw8wHuyicL9X5jZIksgpxvjblRjMCHrt09wS2', 'A', 'Emilio'),
('prueba', '$2y$10$rhlmL7l/t/kPgUgKe4bBp.Egjek6eRy1boxD8DrOKm32IxPN1BBOK', 'U', '37'),
('prueba2', '$2y$10$rqWTnKW/rZ6nMLIAlC.xE.3nOK9cjEYE2cI/btsn3IxaNpSX46F46', 'U', 'Gabriel'),
('respaldo', '$2y$10$O7CGsd21usCYbN29uIj4lOgpGemiQvtDOv.2GwWFuHt.HixdlF5qe', 'A', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vista_producto_con_proveedor`
-- (See below for the actual view)
--
CREATE TABLE `vista_producto_con_proveedor` (
`producto` varchar(30)
,`precio` decimal(10,2)
,`caducidad` date
,`proveedor` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `vista_producto_con_proveedor`
--
DROP TABLE IF EXISTS `vista_producto_con_proveedor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_producto_con_proveedor`  AS SELECT `producto`.`nombre` AS `producto`, `producto`.`precio` AS `precio`, `producto`.`caducidad` AS `caducidad`, (select `proveedor`.`nombre` from `proveedor` where `producto`.`id_prov` = `proveedor`.`id_prov`) AS `proveedor` FROM `producto` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacenista`
--
ALTER TABLE `almacenista`
  ADD PRIMARY KEY (`id_alma`),
  ADD KEY `almacenista_ibfk_1` (`id_inv`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_alma` (`id_alma`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `ordenes_ibfk_1` (`id_pro`),
  ADD KEY `ordenes_ibfk_2` (`id_prov`),
  ADD KEY `ordenes_ibfk_3` (`id_alma`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_inv` (`id_inv`),
  ADD KEY `id_prov` (`id_prov`);

--
-- Indexes for table `productos_eliminados`
--
ALTER TABLE `productos_eliminados`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacenista`
--
ALTER TABLE `almacenista`
  MODIFY `id_alma` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inv` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_nota` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `productos_eliminados`
--
ALTER TABLE `productos_eliminados`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `almacenista`
--
ALTER TABLE `almacenista`
  ADD CONSTRAINT `almacenista_ibfk_1` FOREIGN KEY (`id_inv`) REFERENCES `inventario` (`id_inv`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `inventario` (`id_inv`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`) ON DELETE SET NULL ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `limpiar tabla` ON SCHEDULE EVERY 3 MONTH STARTS '2024-11-18 14:38:39' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM productos_eliminados$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
