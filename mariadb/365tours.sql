-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.4.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for 365tours
CREATE DATABASE IF NOT EXISTS `365tours` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */;
USE `365tours`;

-- Dumping structure for table 365tours.acceso
CREATE TABLE IF NOT EXISTS `acceso` (
  `correo` varchar(64) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `privilegio` int(11) NOT NULL DEFAULT 0,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table 365tours.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula_rif` int(11) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `primer_nombre` text NOT NULL,
  `segundo_nombre` text NOT NULL,
  `primer_apellido` text NOT NULL,
  `segundo_apellido` text NOT NULL,
  `codigo_area` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `estado` text NOT NULL,
  `parroquia` varchar(64) NOT NULL,
  `residencia` varchar(64) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cedula_rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table 365tours.destino
CREATE TABLE IF NOT EXISTS `destino` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `estado` text NOT NULL,
  `descripcion` varchar(1024) NOT NULL,
  `url` varchar(64) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table 365tours.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  `cliente_cedula_rif` int(11) NOT NULL,
  `paquete_codigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `cliente_cedula_rif` (`cliente_cedula_rif`),
  KEY `paquete_codigo` (`paquete_codigo`),
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`paquete_codigo`) REFERENCES `paquete` (`codigo`),
  CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`cliente_cedula_rif`) REFERENCES `cliente` (`cedula_rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Data exporting was unselected.

-- Dumping structure for table 365tours.paquete
CREATE TABLE IF NOT EXISTS `paquete` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dia_salida` int(11) NOT NULL,
  `mes_salida` int(11) NOT NULL,
  `ano_salida` int(11) NOT NULL,
  `dia_retorno` int(11) NOT NULL,
  `mes_retorno` int(11) NOT NULL,
  `ano_retorno` int(11) NOT NULL,
  `hora_salida` int(11) NOT NULL,
  `hora_retorno` int(11) NOT NULL,
  `minutos_salida` int(11) NOT NULL,
  `minutos_retorno` int(11) NOT NULL,
  `precio_persona` float NOT NULL,
  `transporte` text NOT NULL,
  `comidas` text NOT NULL,
  `fotografias` tinyint(1) NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT 1,
  `destino_codigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `destino_codigo` (`destino_codigo`),
  CONSTRAINT `paquete_ibfk_1` FOREIGN KEY (`destino_codigo`) REFERENCES `destino` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
