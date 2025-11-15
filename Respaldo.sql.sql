CREATE DATABASE  IF NOT EXISTS `proyectows` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `proyectows`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: proyectows
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detallepedidos`
--

DROP TABLE IF EXISTS `detallepedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detallepedidos` (
  `idDetalle` int NOT NULL AUTO_INCREMENT,
  `idPedido` int NOT NULL,
  `idProducto` int NOT NULL,
  `nombreProducto` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `precioUnitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `idPedido` (`idPedido`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `detallepedidos_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `tbpedidos` (`idPedido`) ON DELETE CASCADE,
  CONSTRAINT `detallepedidos_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tbproductos` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepedidos`
--

LOCK TABLES `detallepedidos` WRITE;
/*!40000 ALTER TABLE `detallepedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcategorias`
--

DROP TABLE IF EXISTS `tbcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcategorias` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategorias`
--

LOCK TABLES `tbcategorias` WRITE;
/*!40000 ALTER TABLE `tbcategorias` DISABLE KEYS */;
INSERT INTO `tbcategorias` VALUES (1,'Galletas'),(2,'Pasteles'),(3,'Brownies');
/*!40000 ALTER TABLE `tbcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tberror`
--

DROP TABLE IF EXISTS `tberror`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tberror` (
  `idError` int NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(8000) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`idError`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tberror`
--

LOCK TABLES `tberror` WRITE;
/*!40000 ALTER TABLE `tberror` DISABLE KEYS */;
INSERT INTO `tberror` VALUES (1,'Cannot add or update a child row: a foreign key constraint fails (`proyectows`.`tbusuarios`, CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `tbrol` (`idRol`))','2025-10-18 09:27:09'),(2,'Duplicate entry \'corellabrandon@gmail.com\' for key \'correoElectronico\'','2025-10-18 12:25:26'),(3,'Duplicate entry \'corellabrandon@gmail.com\' for key \'correoElectronico\'','2025-10-18 12:26:22'),(4,'Incorrect number of arguments for PROCEDURE proyectows.ValidarCorreo; expected 1, got 2','2025-10-18 16:53:50'),(5,'PROCEDURE proyectows.ConsultarCategorias does not exist','2025-11-07 18:59:16'),(6,'PROCEDURE proyectows.ConsultarCategorias does not exist','2025-11-07 19:06:34'),(7,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 20:20:31'),(8,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:45:09'),(9,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:45:22'),(10,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:46:21'),(11,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:48:34'),(12,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:33:53'),(13,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:38:37'),(14,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:40:53'),(15,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:10:40'),(16,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:11:29'),(17,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:12:09'),(18,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:12:27'),(19,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:15:25'),(20,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:17:05'),(21,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:17:46'),(22,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:18:32'),(23,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:18:41'),(24,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:20:16'),(25,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:26:04'),(26,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:37:03'),(27,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:49:08'),(28,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:49:42'),(29,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:50:19'),(30,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:50:35'),(31,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:51:16'),(32,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:51:43'),(33,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:02:34'),(34,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:04:39'),(35,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:05:21'),(36,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:05:51'),(37,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:06:08'),(38,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:06:15'),(39,'Incorrect number of arguments for PROCEDURE proyectows.RegistrarProducto; expected 6, got 5','2025-11-14 19:33:48'),(40,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-14 19:55:11'),(41,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 19:56:13'),(42,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 19:59:57'),(43,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 20:00:50'),(44,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:12:24'),(45,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:14:19'),(46,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:15:39'),(47,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-14 21:15:42'),(48,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:15:47');
/*!40000 ALTER TABLE `tberror` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpedidos`
--

DROP TABLE IF EXISTS `tbpedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbpedidos` (
  `idPedido` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nombreCliente` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `emailCliente` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `telefonoCliente` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `direccionEntrega` text COLLATE utf8mb4_general_ci NOT NULL,
  `fechaDeseada` date NOT NULL,
  `observaciones` text COLLATE utf8mb4_general_ci,
  `estado` enum('Solicitado','Aprobado','Listo','Entregado','Cancelado') COLLATE utf8mb4_general_ci DEFAULT 'Solicitado',
  `total` decimal(10,2) NOT NULL,
  `fechaPedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPedido`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `tbpedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpedidos`
--

LOCK TABLES `tbpedidos` WRITE;
/*!40000 ALTER TABLE `tbpedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproductos`
--

DROP TABLE IF EXISTS `tbproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproductos` (
  `idProducto` int NOT NULL AUTO_INCREMENT,
  `idCategoria` int DEFAULT NULL,
  `nombreProducto` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `tbproductos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategorias` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductos`
--

LOCK TABLES `tbproductos` WRITE;
/*!40000 ALTER TABLE `tbproductos` DISABLE KEYS */;
INSERT INTO `tbproductos` VALUES (5,1,'Galletas Blue Velvet','Galleta inspirada en David Lynch',1500.00,10,_binary '','../img/images.jpg'),(6,2,'Pastel de Chocolate','Delicioso pastel de chocolate relleno de dulce de leche.',17500.00,10,_binary '','../img/tarta-de-chocolate-y-fresas-naturales.jpg'),(7,1,'Damn Cherry Pie','Pie de Frutos Rojos inspirado en la Red Room de Twin Peaks.',18000.00,15,_binary '','../img/6963cb6a4bd4be88bca0f176c46f2a42.jpg'),(8,2,'Brownie de Chocolate','Brownie Esponjoso de Chocolate',1000.00,2,_binary '','../img/brownie_casero_8374_600.jpg'),(9,2,'Pie de Limón','Pie de Limón al mejor estilo de Million Dolar Baby.',14000.00,6,_binary '','../img/lg_5f31d8c2f003a0716f670d8e.jpg'),(10,1,'Mullholand Drive','Galleta con un sabor intenso a Frutos.',1500.00,1,_binary '\0','../img/images.jpg');
/*!40000 ALTER TABLE `tbproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbrol`
--

DROP TABLE IF EXISTS `tbrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbrol` (
  `idRol` int NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbrol`
--

LOCK TABLES `tbrol` WRITE;
/*!40000 ALTER TABLE `tbrol` DISABLE KEYS */;
INSERT INTO `tbrol` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `tbrol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `correoElectronico` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrasenna` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` bit(1) NOT NULL,
  `idRol` int NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correoElectronico` (`correoElectronico`),
  KEY `FK_Usuario_Rol` (`idRol`),
  CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `tbrol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (2,'207960874','BRANDON JOSUE CORELLA SANCHEZ','corellabrandon@gmail.com','88866348','123',_binary '',2),(3,'204470866','FABIO GERARDO CORELLA DIAZ','fabio@gmail.com','85100982','123',_binary '',1),(6,'208660874','CASTRO SOSA KEILOR NATHAN','keilor@gmail.com','12345678','123',_binary '',2);
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'proyectows'
--
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarCategoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCategoria`(
	pIdCategoria int(11),
    pNombreCategoria varchar(100)
)
BEGIN
	UPDATE tbCategorias 
	SET nombreCategoria = pNombreCategoria
    WHERE idCategoria = pIdCategoria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarContrasenna`(
    pIdUsuario VARCHAR(15),
    pContrasennaGenerada VARCHAR(255)
)
BEGIN
	UPDATE tbUsuarios
    SET contrasenna = pContrasennaGenerada
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPerfil`(
	pIdUsuario int (11),
    pCedula varchar (15),
    pNombre varchar(150),
    pCorreoElectronico varchar(150),
    pTelefono varchar(20)
)
BEGIN
	UPDATE tbUsuarios
	SET 
        cedula = pCedula,
        nombre = pNombre,
        correoElectronico = pCorreoElectronico,
        telefono = pTelefono
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarProducto`(
	pIdProducto int (11),
    pIdCategoria int(11),
    pNombreProducto varchar(100),
    pDescripcion text,
    pPrecio decimal(10,2),
    pCantidad int(11),
    pImagen varchar(255)
)
BEGIN
	UPDATE tbProductos 
	SET 
		idCategoria = pIdCategoria,
        nombreProducto = pNombreProducto,
        descripcion = pDescripcion,
        precio = pPrecio,
        cantidad = pCantidad,
        imagen = (CASE WHEN pImagen = '' THEN imagen ELSE pImagen END)
    WHERE idProducto = pIdProducto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambiarEstadoProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambiarEstadoProducto`(
	pIdProducto int(11)
)
BEGIN

	UPDATE 	tbproductos
	SET		estado = CASE WHEN Estado = 1 THEN 0 ELSE 1 END
    WHERE	idProducto = pIdProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCategoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCategoria`(
    pIdCategoria VARCHAR(100)
)
BEGIN
	SELECT 
		idCategoria,
        nombreCategoria
	FROM tbCategorias
    WHERE pIdCategoria = idCategoria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCategorias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCategorias`()
BEGIN
	SELECT 
		idCategoria,
        nombreCategoria
	FROM tbCategorias;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProducto`(
    IN pIdProducto INT(11)
)
BEGIN
    SELECT 
		p.idCategoria,
        c.nombreCategoria,
        p.nombreProducto,
        p.descripcion,
        p.precio,
        p.cantidad,
        p.imagen,
        p.idProducto
    FROM tbProductos p
    INNER JOIN tbCategorias c
        ON p.idCategoria = c.idCategoria
    WHERE p.idProducto = pIdProducto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductos`()
BEGIN
	SELECT p.idProducto,
		   c.nombreCategoria, 
           p.nombreProducto, 
           p.descripcion, 
           p.precio,
           p.cantidad,
           p.estado,
           CASE WHEN estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'estado',
           p.imagen
	FROM tbProductos p
    INNER JOIN tbCategorias c
    WHERE c.idCategoria = p.idCategoria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosIndex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosIndex`()
BEGIN
	SELECT p.idProducto,
		   c.nombreCategoria, 
           p.nombreProducto, 
           p.descripcion, 
           p.precio,
           p.cantidad,
           p.estado,
           CASE WHEN estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'estado',
           p.imagen
	FROM tbProductos p
    INNER JOIN tbCategorias c
    WHERE c.idCategoria = p.idCategoria
    AND estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuario`(
    pIdUsuario int(11)
)
BEGIN

	SELECT 	U.idUsuario,
			U.cedula,
			U.nombre,
			U.correoElectronico,
            U.telefono,
			U.contrasenna,
			U.estado,
			U.idRol,
            P.nombreRol 'NombrePerfil'
	FROM 	tbUsuarios U
    INNER 	JOIN tbRol P ON U.idRol = P.idRol
    WHERE 	idUsuario = pIdUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearUsuario`(
    pCedula VARCHAR(15),
    pNombre VARCHAR(150),
    pCorreoElectronico VARCHAR(150),
    pTelefono VARCHAR(20),
    pContrasenna VARCHAR(255)
)
BEGIN
    INSERT INTO tbUsuarios (cedula, nombre, correoElectronico, telefono, contrasenna, estado, idRol)
    VALUES (pCedula, pNombre, pCorreoElectronico, pTelefono, pContrasenna, 1, 2);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCategoria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCategoria`(
    pNombreCategoria VARCHAR(100)
)
BEGIN
	INSERT INTO tbCategorias(nombreCategoria)
    VALUES (pNombreCategoria);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarError` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarError`(
	pMensaje varchar(8000)
)
BEGIN

	INSERT INTO tberror (Mensaje,FechaHora)
	VALUES (pMensaje, NOW());

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarProducto`(
    pIdCategoria int(11),
    pNombreProducto VARCHAR(150),
    pDescripcion text,
    pPrecio decimal(10,2),
    pCantidad int(11),
    pImagen varchar(255)
)
BEGIN
DECLARE vProductoExistente INT;

    -- Verificar si ya existe un producto con el mismo nombre
    SELECT 	COUNT(*) INTO vProductoExistente
    FROM 	tbproductos
    WHERE 	nombreProducto = pNombreProducto;

    IF vProductoExistente > 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ya existe un producto con ese nombre.';
    ELSE
        	INSERT INTO tbProductos(idCategoria, nombreProducto, descripcion, precio, cantidad, estado, imagen)
			VALUES (pIdCategoria, pNombreProducto, pDescripcion, pPrecio, pCantidad, 1, pImagen);
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCorreo`(
    pCorreoElectronico VARCHAR(150)
)
BEGIN
    SELECT 
		idUsuario,
        cedula,
        nombre,
        correoElectronico,
        telefono,
        contrasenna,
        estado,
        idRol
	FROM tbUsuarios
    WHERE correoElectronico = pCorreoElectronico
		AND estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarUsuario`(
    pCorreoElectronico VARCHAR(150),
    pContrasenna VARCHAR(255)
)
BEGIN
    SELECT 
		u.idUsuario,
        u.cedula,
        u.nombre,
        u.correoElectronico,
        u.telefono,
        u.contrasenna,
        u.estado,
        u.idRol,
        r.nombreRol AS NombrePerfil
	FROM tbUsuarios u
    INNER JOIN tbrol r ON u.idRol = r.idRol
    WHERE u.correoElectronico = pCorreoElectronico
    AND u.contrasenna = pContrasenna
    AND estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-15 11:10:09
