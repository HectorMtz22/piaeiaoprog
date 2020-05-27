-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2020 at 05:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamesandmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `detallesVenta`
--

CREATE TABLE `detallesVenta` (
  `idDetalles` int(5) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `idUsuario` int(5) NOT NULL,
  `cantVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `totalVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `detallesVenta`
--

INSERT INTO `detallesVenta` (`idDetalles`, `idProducto`, `idUsuario`, `cantVenta`, `fechaVenta`, `totalVenta`) VALUES
(1, 6, 2, '1', '20/05/20', 5900),
(3, 2, 2, '5', '20/05/20', 5000),
(4, 5, 6, '1', '20/05/20', 9000),
(5, 5, 1, '1', '20/04/20', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(5) NOT NULL,
  `nombreProducto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipoProducto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descProducto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precioProducto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `tipoProducto`, `descProducto`, `precioProducto`) VALUES
(1, 'Play Station 4', 'Consola', 'Play', 5900),
(2, 'Xbox One', 'Consola', 'Series Y', 6999),
(4, 'Play Station 3', 'Consola', 'Viejita', 2900),
(5, 'Nintendo NES', 'Consola', 'Tamaño regular', 3000),
(6, 'PC Minion', 'PC', 'Liquida amarilla', 39000),
(7, 'SEGA Master System II ', 'Consola', 'Version 2.0', 1990),
(8, 'Nintendo Switch', 'Consola', 'Normal', 6900),
(9, 'PC Master Race', 'PC', 'Contiene las nuevas tecnologias', 39000);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(5) NOT NULL,
  `nombreUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emailUsuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telUsuario` int(10) NOT NULL,
  `contraUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `emailUsuario`, `telUsuario`, `contraUsuario`, `isAdmin`) VALUES
(1, 'Héctor', 'admin@admin.com', 123456789, 'admin', 1),
(2, 'Enrique', 'enrique@gmail.com', 12345678, 'enrique', 0),
(3, 'Prueba1', 'prueba1@test.com', 812345789, 'prueba1', 0),
(4, 'Prueba2', 'prueba2@test.com', 81845687, 'prueba2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(5) NOT NULL,
  `idUsuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaVenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `totalVenta` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idVenta`, `idUsuario`, `fechaVenta`, `totalVenta`) VALUES
(1, '1', '20/05/20', 5900),
(2, '2', '30/04/202', 15000),
(3, '2', '20/05/20', 6900),
(5, '1', '25/05/20', 9000),
(6, '2', '20/05/20', 80000),
(7, '3', '20/05/20', 7800),
(8, '2', '20/05/20', 7500),
(9, '1', '10/05/20', 80000),
(10, '5', '20/05/20', 9000),
(11, '2', '20/04/20', 2050),
(12, '3', '20/05/20', 10500),
(13, '5', '20/05/20', 5000),
(14, '2', '20/05/20', 5952);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detallesVenta`
--
ALTER TABLE `detallesVenta`
  ADD PRIMARY KEY (`idDetalles`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detallesVenta`
--
ALTER TABLE `detallesVenta`
  MODIFY `idDetalles` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
