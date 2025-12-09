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
  `cantidad` int NOT NULL,
  `precioUnitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `fk_detalle_pedido` (`idPedido`),
  CONSTRAINT `fk_detalle_pedido` FOREIGN KEY (`idPedido`) REFERENCES `tbpedidos` (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepedidos`
--

LOCK TABLES `detallepedidos` WRITE;
/*!40000 ALTER TABLE `detallepedidos` DISABLE KEYS */;
INSERT INTO `detallepedidos` VALUES (1,2,5,1000.00,5000.00,650.00,5650.00),(2,2,6,2500.00,15000.00,1950.00,16950.00),(3,4,40,1850.00,74000.00,9620.00,83620.00);
/*!40000 ALTER TABLE `detallepedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcarrito`
--

DROP TABLE IF EXISTS `tbcarrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcarrito` (
  `idCarrito` int NOT NULL AUTO_INCREMENT,
  `idProducto` int NOT NULL,
  `idUsuario` int NOT NULL,
  `Fecha` datetime NOT NULL,
  `Cantidad` int NOT NULL,
  PRIMARY KEY (`idCarrito`),
  KEY `FK_CarritoProducto` (`idProducto`),
  KEY `FK_CarritoUsuario` (`idUsuario`),
  CONSTRAINT `FK_CarritoProducto` FOREIGN KEY (`idProducto`) REFERENCES `tbproductos` (`idProducto`),
  CONSTRAINT `FK_CarritoUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcarrito`
--

LOCK TABLES `tbcarrito` WRITE;
/*!40000 ALTER TABLE `tbcarrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcarrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcategorias`
--

DROP TABLE IF EXISTS `tbcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcategorias` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcategorias`
--

LOCK TABLES `tbcategorias` WRITE;
/*!40000 ALTER TABLE `tbcategorias` DISABLE KEYS */;
INSERT INTO `tbcategorias` VALUES (1,'Galletas'),(2,'Pasteles'),(3,'Brownies'),(4,'Trenzas');
/*!40000 ALTER TABLE `tbcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcontactos`
--

DROP TABLE IF EXISTS `tbcontactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcontactos` (
  `idContacto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `asunto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_contacto` datetime NOT NULL,
  `estado` enum('Pendiente','Respondido') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pendiente',
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcontactos`
--

LOCK TABLES `tbcontactos` WRITE;
/*!40000 ALTER TABLE `tbcontactos` DISABLE KEYS */;
INSERT INTO `tbcontactos` VALUES (1,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization','test','2025-11-15 13:02:25','Pendiente'),(2,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization','test','2025-11-15 13:02:52','Pendiente'),(3,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization','test','2025-11-15 13:06:07','Pendiente'),(4,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization','test','2025-11-15 13:08:23','Pendiente'),(5,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization2','test2','2025-11-15 13:08:51','Pendiente'),(6,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','cotization2','test2','2025-11-15 13:12:52','Pendiente'),(7,'FABRICIO MORA SALAZAR','fmorach122@gmail.com','83277533','otra cotizacion','test X','2025-11-15 13:17:05','Pendiente'),(8,'MARIA DEL SOCORRO SALAZAR GUTIERREZ','fmorach122@gmail.com','83277533','pedido','test X','2025-11-15 13:18:13','Pendiente'),(9,'Brandon','corellabrandon@gmail.com','88866348','Cotizar','Hola','2025-12-08 19:15:51','Pendiente');
/*!40000 ALTER TABLE `tbcontactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdetalle`
--

DROP TABLE IF EXISTS `tbdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbdetalle` (
  `idDetalle` int NOT NULL AUTO_INCREMENT,
  `idFactura` int NOT NULL,
  `idProducto` int NOT NULL,
  `Cantidad` int NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `SubTotal` decimal(10,2) NOT NULL,
  `Impuesto` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `FK_DetalleFactura` (`idFactura`),
  KEY `FK_DetalleProducto` (`idProducto`),
  CONSTRAINT `FK_DetalleFactura` FOREIGN KEY (`idFactura`) REFERENCES `tbfactura` (`idFactura`),
  CONSTRAINT `FK_DetalleProducto` FOREIGN KEY (`idProducto`) REFERENCES `tbproductos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdetalle`
--

LOCK TABLES `tbdetalle` WRITE;
/*!40000 ALTER TABLE `tbdetalle` DISABLE KEYS */;
INSERT INTO `tbdetalle` VALUES (1,2,5,1,1500.00,1500.00,195.00,1695.00),(2,2,6,1,17500.00,17500.00,2275.00,19775.00),(3,2,7,1,18000.00,18000.00,2340.00,20340.00),(4,3,6,9,17500.00,157500.00,20475.00,177975.00),(5,4,12,2,18000.00,36000.00,4680.00,40680.00),(6,5,7,1,18000.00,18000.00,2340.00,20340.00),(7,6,5,1,1500.00,1500.00,195.00,1695.00),(8,7,5,1,1500.00,1500.00,195.00,1695.00),(9,8,5,1,1500.00,1500.00,195.00,1695.00),(10,9,7,1,18000.00,18000.00,2340.00,20340.00),(11,10,7,1,18000.00,18000.00,2340.00,20340.00),(12,10,8,1,1000.00,1000.00,130.00,1130.00);
/*!40000 ALTER TABLE `tbdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tberror`
--

DROP TABLE IF EXISTS `tberror`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tberror` (
  `idError` int NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(8000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`idError`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tberror`
--

LOCK TABLES `tberror` WRITE;
/*!40000 ALTER TABLE `tberror` DISABLE KEYS */;
INSERT INTO `tberror` VALUES (1,'Cannot add or update a child row: a foreign key constraint fails (`proyectows`.`tbusuarios`, CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `tbrol` (`idRol`))','2025-10-18 09:27:09'),(2,'Duplicate entry \'corellabrandon@gmail.com\' for key \'correoElectronico\'','2025-10-18 12:25:26'),(3,'Duplicate entry \'corellabrandon@gmail.com\' for key \'correoElectronico\'','2025-10-18 12:26:22'),(4,'Incorrect number of arguments for PROCEDURE proyectows.ValidarCorreo; expected 1, got 2','2025-10-18 16:53:50'),(5,'PROCEDURE proyectows.ConsultarCategorias does not exist','2025-11-07 18:59:16'),(6,'PROCEDURE proyectows.ConsultarCategorias does not exist','2025-11-07 19:06:34'),(7,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 20:20:31'),(8,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:45:09'),(9,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:45:22'),(10,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:46:21'),(11,'Table \'proyectows.tbcategoria\' doesn\'t exist','2025-11-07 21:48:34'),(12,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:33:53'),(13,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:38:37'),(14,'Incorrect number of arguments for PROCEDURE proyectows.ActualizarProducto; expected 6, got 5','2025-11-07 22:40:53'),(15,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:10:40'),(16,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:11:29'),(17,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:12:09'),(18,'PROCEDURE proyectows.ConsultarUsuario does not exist','2025-11-08 08:12:27'),(19,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:15:25'),(20,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:17:05'),(21,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:17:46'),(22,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:18:32'),(23,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:18:41'),(24,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:20:16'),(25,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:26:04'),(26,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:37:03'),(27,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:49:08'),(28,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:49:42'),(29,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:50:19'),(30,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:50:35'),(31,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:51:16'),(32,'Unknown column \'U.correo\' in \'field list\'','2025-11-08 08:51:43'),(33,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:02:34'),(34,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:04:39'),(35,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:05:21'),(36,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:05:51'),(37,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:06:08'),(38,'PROCEDURE proyectows.ActualizarPerfil does not exist','2025-11-08 09:06:15'),(39,'Incorrect number of arguments for PROCEDURE proyectows.RegistrarProducto; expected 6, got 5','2025-11-14 19:33:48'),(40,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-14 19:55:11'),(41,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 19:56:13'),(42,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 19:59:57'),(43,'Incorrect integer value: \'../img/F_x4plus2955.png\' for column \'pCantidad\' at row 1','2025-11-14 20:00:50'),(44,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:12:24'),(45,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:14:19'),(46,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:15:39'),(47,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-14 21:15:42'),(48,'Incorrect integer value: \'\' for column \'pIdProducto\' at row 1','2025-11-14 21:15:47'),(49,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 12:46:22'),(50,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 12:47:09'),(51,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 12:51:36'),(52,'Table \'proyectows.contactos\' doesn\'t exist','2025-11-15 12:57:04'),(53,'Table \'proyectows.contactos\' doesn\'t exist','2025-11-15 12:59:03'),(54,'Table \'proyectows.contactos\' doesn\'t exist','2025-11-15 12:59:39'),(55,'Table \'proyectows.contactos\' doesn\'t exist','2025-11-15 12:59:57'),(56,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 13:02:39'),(57,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 13:03:40'),(58,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 13:08:29'),(59,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 13:10:24'),(60,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 13:16:45'),(61,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 16:46:41'),(62,'PROCEDURE proyectows.ConsultarProductosIndex does not exist','2025-11-15 16:47:33'),(63,'Incorrect number of arguments for PROCEDURE proyectows.RegistrarProducto; expected 5, got 6','2025-11-15 17:21:42'),(64,'Unknown column \'pIdCarrito\' in \'field list\'','2025-12-03 11:09:20'),(65,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:08:42'),(66,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:10:14'),(67,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:26:47'),(68,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:26:50'),(69,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:26:51'),(70,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:27:17'),(71,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:27:22'),(72,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:27:31'),(73,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:30:23'),(74,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-03 15:33:05'),(75,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-03 15:33:05'),(76,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-03 15:33:05'),(77,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:50:55'),(78,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:52:02'),(79,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:52:04'),(80,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 15:55:08'),(81,'Incorrect integer value: \'\' for column \'pIdUsuario\' at row 1','2025-12-03 16:02:39'),(82,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:39'),(83,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:39'),(84,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:39'),(85,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:44'),(86,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:51'),(87,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:51'),(88,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 08:36:51'),(89,'Incorrect integer value: \'\' for column \'pCantidad\' at row 1','2025-12-04 11:15:56'),(90,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 11:28:14'),(91,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 11:28:14'),(92,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 11:28:14'),(93,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 11:28:21'),(94,'Table \'proyectows.tbpedidos\' doesn\'t exist','2025-12-04 12:53:50'),(95,'Incorrect number of arguments for PROCEDURE proyectows.ConsultarDetalleCompras; expected 2, got 1','2025-12-04 13:08:04'),(96,'Incorrect number of arguments for PROCEDURE proyectows.ConsultarDetalleCompras; expected 2, got 1','2025-12-04 13:12:00'),(97,'Column \'idProducto\' in field list is ambiguous','2025-12-04 13:18:22'),(98,'Column \'idProducto\' in field list is ambiguous','2025-12-04 13:18:52'),(99,'Column \'idProducto\' in field list is ambiguous','2025-12-04 13:20:13'),(100,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1','2025-12-06 16:29:19'),(101,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1','2025-12-06 16:30:00'),(102,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1','2025-12-06 16:30:15'),(103,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1','2025-12-06 16:30:35'),(104,'You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near \'\' at line 1','2025-12-06 16:35:23'),(105,'Unknown column \'nombreCliente\' in \'field list\'','2025-12-06 17:16:20'),(106,'Unknown column \'nombreCliente\' in \'field list\'','2025-12-06 17:16:38'),(107,'Unknown column \'nombreCliente\' in \'field list\'','2025-12-06 17:16:56'),(108,'Unknown column \'nombreCliente\' in \'field list\'','2025-12-08 09:10:12'),(109,'Incorrect decimal value: \'\' for column \'pPrecioUnitario\' at row 1','2025-12-08 18:27:50'),(110,'Unknown column \'pIdPedido\' in \'field list\'','2025-12-08 18:28:14'),(111,'Unknown column \'pIdPedido\' in \'field list\'','2025-12-08 18:29:00'),(112,'Unknown column \'pIdPedido\' in \'field list\'','2025-12-08 18:29:40'),(113,'Unknown column \'pIdPedido\' in \'field list\'','2025-12-08 18:29:58'),(114,'Field \'subtotal\' doesn\'t have a default value','2025-12-08 18:31:23'),(115,'Field \'subtotal\' doesn\'t have a default value','2025-12-08 18:31:29'),(116,'Field \'subtotal\' doesn\'t have a default value','2025-12-08 18:32:30'),(117,'PROCEDURE proyectows.ConsultarCotizacionPorId does not exist','2025-12-08 18:44:58'),(118,'Unknown column \'idProducto\' in \'where clause\'','2025-12-08 19:54:01');
/*!40000 ALTER TABLE `tberror` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbfactura`
--

DROP TABLE IF EXISTS `tbfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbfactura` (
  `idFactura` int NOT NULL AUTO_INCREMENT,
  `Fecha` datetime NOT NULL,
  `idUsuario` int NOT NULL,
  `CantidadUnidades` int NOT NULL,
  `TotalUnidades` decimal(10,2) NOT NULL,
  `MedioPago` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_FacturaUsuario` (`idUsuario`),
  CONSTRAINT `FK_FacturaUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfactura`
--

LOCK TABLES `tbfactura` WRITE;
/*!40000 ALTER TABLE `tbfactura` DISABLE KEYS */;
INSERT INTO `tbfactura` VALUES (1,'2025-12-04 10:34:13',2,39,41810.00,'TARJETA'),(2,'2025-12-04 10:34:53',2,39,41810.00,'TARJETA'),(3,'2025-12-04 10:37:39',2,15,177975.00,'TARJETA'),(4,'2025-12-04 10:40:47',2,2,40680.00,'TARJETA'),(5,'2025-12-04 11:36:57',2,1,20340.00,'TARJETA'),(6,'2025-12-04 11:37:10',2,1,1695.00,'TARJETA'),(7,'2025-12-04 11:37:22',2,1,1695.00,'TARJETA'),(8,'2025-12-04 11:39:41',2,1,1695.00,'TARJETA'),(9,'2025-12-04 11:43:08',2,1,20340.00,'Simpe'),(10,'2025-12-06 14:54:35',7,2,21470.00,'especies');
/*!40000 ALTER TABLE `tbfactura` ENABLE KEYS */;
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
  `direccionEntrega` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechaDeseada` date NOT NULL,
  `descripcion` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'En Proceso',
  `fechaPedido` datetime NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_pedidos_usuario` (`idUsuario`),
  CONSTRAINT `fk_pedidos_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpedidos`
--

LOCK TABLES `tbpedidos` WRITE;
/*!40000 ALTER TABLE `tbpedidos` DISABLE KEYS */;
INSERT INTO `tbpedidos` VALUES (1,7,'heredia','0000-00-00','queque','En Proceso','2025-12-06 16:43:18'),(2,7,'Heredia','2025-12-19','c','En Proceso','2025-12-06 16:45:18'),(3,7,'xxx','2025-12-26','xxx','Completado','2025-12-06 16:46:27'),(4,2,'Alajuela','2025-12-25','40 Cupcakes de Chocolate','Completado','2025-12-08 19:07:13');
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
  `nombreProducto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `tbproductos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategorias` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproductos`
--

LOCK TABLES `tbproductos` WRITE;
/*!40000 ALTER TABLE `tbproductos` DISABLE KEYS */;
INSERT INTO `tbproductos` VALUES (5,1,'Galletas Blue Velvet','Galleta inspirada en David Lynch',1500.00,141,_binary '','../img/galletas-cookie-monster-4.jpg'),(6,2,'Pastel de Chocolate','Delicioso pastel de chocolate relleno de dulce de leche.',17500.00,0,_binary '','../img/tarta-de-chocolate-y-fresas-naturales.jpg'),(7,1,'Damn Cherry Pie','Pie de Frutos Rojos inspirado en la Red Room de Twin Peaks.',18000.00,11,_binary '','../img/6963cb6a4bd4be88bca0f176c46f2a42.jpg'),(8,2,'Brownie de Chocolate','Brownie Esponjoso de Chocolate',1000.00,1,_binary '','../img/brownie_casero_8374_600.jpg'),(9,2,'Pie de Limón','Pie de Limón al mejor estilo de Million Dolar Baby.',14000.00,6,_binary '','../img/lg_5f31d8c2f003a0716f670d8e.jpg'),(10,1,'Mullholand Drive','Galleta con un sabor intenso a Frutos.',1500.00,1,_binary '','../img/TasteBeforeBeauty_ButterSugarCookies-03147-720x720.jpg'),(11,2,'Pastel Resident Evil','Pastel de chocolate con relleno de jalea de frambuesas',15000.00,15,_binary '','../img/images.jpg'),(12,2,'Pastel Megadeth','Pastel de chocolate',18000.00,0,_binary '','../img/fb582c8cffb21a15d100d6d724ff02c4.jpg');
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
  `nombreRol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `cedula` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correoElectronico` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contrasenna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` bit(1) NOT NULL,
  `idRol` int NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `correoElectronico` (`correoElectronico`),
  KEY `FK_Usuario_Rol` (`idRol`),
  CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `tbrol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuarios`
--

LOCK TABLES `tbusuarios` WRITE;
/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` VALUES (2,'207960874','BRANDON JOSUE CORELLA SANCHEZ','corellabrandon@gmail.com','88866348','123',_binary '',2),(3,'204470866','FABIO GERARDO CORELLA DIAZ','fabio@gmail.com','85906846','123',_binary '',1),(6,'208660874','CASTRO SOSA KEILOR NATHAN','keilor@gmail.com','12345678','123',_binary '',2),(7,'113400041','FABRICIO MORA SALAZAR','pfmoras@gmail.com','83277533','123',_binary '',2);
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
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarEstadoPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarEstadoPedido`(
    IN p_idPedido INT,
    IN p_estado   VARCHAR(20)
)
BEGIN
    UPDATE tbpedidos
    SET estado = p_estado
    WHERE idPedido = p_idPedido;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPedido`(
	pIdPedido INT(11),
    pFechaDeseada date,
    pDireccion varchar(800),
    pDescripcion text
)
BEGIN
	UPDATE tbpedidos
	SET 
        fechaDeseada = pFechaDeseada,
        direccionEntrega = pDireccion,
        descripcion = pDescripcion
    WHERE idPedido = pIdPedido;
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCarritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCarritos`(pIdUsuario INT)
BEGIN
	SELECT idCarrito,
		   C.idProducto, 
           idUsuario, 
           Fecha, 
           C.Cantidad,
           P.nombreProducto,
           P.precio,
           (P.precio * C.cantidad) 'Subtotal',
           (P.precio * C.cantidad) * 0.13 'Impuesto',
           (P.precio * C.cantidad) * 1.13 'Total'
	FROM tbcarrito C
    INNER JOIN tbproductos P ON C.idProducto = P.idProducto
    WHERE idUsuario = pIdUsuario;
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
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCompras`(pIdUsuario INT)
BEGIN
	SELECT idFactura,
		   Fecha,  
           CantidadUnidades, 
           TotalUnidades,
           MedioPago
	FROM tbfactura F
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarContactosRecientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarContactosRecientes`()
BEGIN
    SELECT nombre,
           asunto,
           fecha_contacto,
           estado
    FROM tbcontactos
    ORDER BY fecha_contacto DESC
    LIMIT 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCotizacionPorId` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCotizacionPorId`(pIdPedido INT(11))
BEGIN
    SELECT 
        P.idPedido,
        U.nombre AS Cliente,
        U.correoElectronico AS Correo,
        U.telefono AS Telefono,
        P.fechaPedido AS FechaPedido,
        P.estado AS Estado,
        P.direccionEntrega AS DireccionEntrega,
        P.fechaDeseada AS FechaDeseada,
        P.descripcion AS Descripcion,
        D.cantidad AS Cantidad,
        D.precioUnitario AS PrecioUnitario,
        D.subtotal AS Subtotal,
        D.impuesto AS Impuesto,
        D.total AS Total
    FROM tbpedidos P
    INNER JOIN tbUsuarios U ON P.idUsuario = U.idUsuario
    LEFT JOIN detallepedidos D ON P.idPedido = D.idPedido
    WHERE P.idPedido = pIdPedido;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarDetalleCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetalleCompras`(
    pIdFactura INT
)
BEGIN
	SELECT idDetalle,
		   idFactura,
		   D.idProducto, 
           P.nombreProducto,
           D.Cantidad, 
           D.Precio,
           SubTotal,
           Impuesto,
           Total
	FROM tbdetalle D
    INNER JOIN tbproductos P ON D.idProducto = P.idProducto
    WHERE idFactura = pIdFactura;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPedidoPorId` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidoPorId`( pIdPedido INT(11))
BEGIN
    SELECT 
        P.idPedido,
        U.nombre AS Cliente,
        U.correoElectronico AS Correo,
        U.telefono AS Telefono,
        P.fechaPedido AS FechaPedido,
        P.estado AS Estado,
        P.direccionEntrega,
        P.fechaDeseada AS FechaDeseada,
        P.descripcion AS Descripcion
    FROM tbpedidos P
    INNER JOIN tbUsuarios U ON P.idUsuario = U.idUsuario
    WHERE P.idPedido = pIdPedido;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPedidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidos`()
BEGIN    
    SELECT 
        P.idPedido,
        U.nombre AS Cliente,
        U.correoElectronico AS Correo,
        U.telefono AS Telefono,
        P.fechaPedido AS FechaPedido,
        P.estado AS Estado,
        P.direccionEntrega,
        P.fechaDeseada AS FechaDeseada,
        P.descripcion AS Descripcion
    FROM tbpedidos P
    INNER JOIN tbUsuarios U ON P.idUsuario = U.idUsuario
    WHERE P.estado = 'En Proceso'
    ORDER BY P.fechaPedido DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPedidosAdmin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidosAdmin`()
BEGIN
    SELECT idPedido,
           nombreCliente,
           emailCliente,
           telefonoCliente,
           fechaPedido,
           fechaDeseada,
           estado,
           total
    FROM tbpedidos
    ORDER BY fechaPedido DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPedidosRecientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidosRecientes`()
BEGIN
    SELECT 
        P.idPedido,
        U.nombre AS Cliente,
        U.correoElectronico AS Correo,
        U.telefono AS Telefono,
        P.fechaPedido AS FechaPedido,
        P.estado AS Estado,
        P.direccionEntrega,
        P.fechaDeseada AS FechaDeseada,
        P.descripcion AS Descripcion
    FROM tbpedidos P
    INNER JOIN tbUsuarios U ON P.idUsuario = U.idUsuario
    WHERE P.estado = 'En Proceso'
    ORDER BY fechaPedido DESC
    LIMIT 10;
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosConStockBajo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosConStockBajo`()
BEGIN
    SELECT p.nombreProducto,
           c.nombreCategoria,
           p.cantidad
    FROM tbproductos p
    INNER JOIN tbcategorias c ON p.idCategoria = c.idCategoria
    WHERE p.cantidad <= 5
    ORDER BY p.cantidad ASC;
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
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
    AND estado = 1
    AND cantidad > 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarResumenCarritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarResumenCarritos`(pIdUsuario INT)
BEGIN
	SELECT COUNT(1) 'Cantidad',
           sum((P.precio * C.cantidad) * 1.13) 'Total'
	FROM tbcarrito C
    INNER JOIN tbproductos P ON C.idProducto = P.idProducto
    WHERE idUsuario = pIdUsuario;
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
/*!50003 DROP PROCEDURE IF EXISTS `ContarCategoriasTotal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarCategoriasTotal`()
BEGIN
    SELECT COUNT(*) AS totalCategorias
    FROM tbcategorias;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ContarPedidosCompletadosMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarPedidosCompletadosMes`()
BEGIN
    SELECT COUNT(*) AS pedidosCompletados
    FROM tbpedidos
    WHERE estado = 'Completado'
      AND MONTH(fechaPedido) = MONTH(CURDATE())
      AND YEAR(fechaPedido) = YEAR(CURDATE());
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ContarPedidosPendientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarPedidosPendientes`()
BEGIN
    SELECT COUNT(*) AS pedidosPendientes
    FROM tbpedidos
    WHERE estado = 'En Proceso';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ContarProductosActivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ContarProductosActivos`()
BEGIN
    SELECT COUNT(*) AS totalProductosActivos
    FROM tbproductos
    WHERE estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CotizarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CotizarPedido`( 
    pIdPedido INT(11), 
    pPrecioUnitario DECIMAL(10,2),
    pCantidad INT
)
BEGIN    
    DECLARE vSubtotal DECIMAL(10,2);
    DECLARE vImpuesto DECIMAL(10,2);
    DECLARE vTotal DECIMAL(10,2);
    
    SET vSubtotal = pPrecioUnitario * pCantidad;
    SET vImpuesto = vSubtotal * 0.13;
    SET vTotal = vSubtotal * 1.13;
    
    INSERT INTO detallepedidos(idPedido, precioUnitario, cantidad, subtotal, impuesto, total)
    VALUES (pIdPedido, pPrecioUnitario, pCantidad, vSubtotal, vImpuesto, vTotal);
                             
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
/*!50003 DROP PROCEDURE IF EXISTS `FinalizarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `FinalizarPedido`(
	pIdPedido INT(11)
)
BEGIN
	UPDATE tbpedidos 
	SET 
		estado = 'Completado'
    WHERE idPedido = pIdPedido;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GuardarContacto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarContacto`(
    IN pNombre VARCHAR(100),
    IN pEmail VARCHAR(100),
    IN pTelefono VARCHAR(20),
    IN pAsunto VARCHAR(200),
    IN pMensaje TEXT
)
BEGIN
    INSERT INTO tbcontactos (nombre, email, telefono, asunto, mensaje, fecha_contacto)
    VALUES (pNombre, pEmail, pTelefono, pAsunto, pMensaje, NOW());
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RealizarPagoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RealizarPagoCarrito`(
	pIdUsuario int(11),
    pMedioPago varchar(255)
)
BEGIN

	INSERT INTO tbfactura (Fecha,idUsuario,CantidadUnidades,TotalUnidades,MedioPago)
    SELECT NOW(), 
		   C.idUsuario,
           SUM(C.Cantidad),
           SUM(C.Cantidad * P.precio) * 1.13,
           pMedioPago
	FROM tbcarrito C
    INNER JOIN tbproductos P ON C.idProducto = P.idProducto
    WHERE idUsuario = pIdUsuario
    GROUP BY C.idUsuario;

	INSERT INTO tbdetalle (idFactura,idProducto,Cantidad,Precio,SubTotal,Impuesto,Total)
    SELECT LAST_INSERT_ID(),
           C.idProducto,
           C.Cantidad,
           P.precio,
           C.Cantidad * P.precio,
           (C.Cantidad * P.precio) * 0.13,
           (C.Cantidad * P.precio) * 1.13
           pMedioPago
	FROM tbcarrito C
    INNER JOIN tbproductos P ON C.idProducto = P.idProducto
    WHERE idUsuario = pIdUsuario;

	UPDATE tbproductos P
    INNER JOIN tbcarrito C on C.idProducto = P.idProducto
    SET P.Cantidad = P.Cantidad - C.Cantidad
    WHERE idUsuario = pIdUsuario;
    
	DELETE FROM tbcarrito
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCarrito`( 
    pIdProducto INT, 
    pIdUsuario INT,
    pCantidad INT
)
BEGIN

	DECLARE vIdCarrito INT;
    SELECT idCarrito INTO vIdCarrito
    FROM tbCarrito
    WHERE idUsuario = pIdUsuario
    AND idProducto = pIdProducto;
    
    IF vIdCarrito IS NOT NULL THEN
    
    UPDATE tbcarrito
	SET Fecha = now(),
		Cantidad = pCantidad
	WHERE idCarrito = vIdCarrito;
	
    ELSE 
    
    INSERT INTO tbcarrito(idProducto, idUsuario, Fecha, Cantidad)
	VALUES (pIdProducto, pIdUsuario, NOW(), pCantidad);
	
    END IF;
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
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarPedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarPedido`( 
    pidUsuario INT(11), 
    pDireccion TEXT,
    pFechaDeseada DATE,
    pDescripcion VARCHAR(800)
)
BEGIN    
    INSERT INTO tbpedidos(idUsuario, direccionEntrega, fechaDeseada, descripcion, estado, fechaPedido)
    VALUES (pidUsuario, pDireccion, pFechaDeseada, pDescripcion, 'En Proceso', NOW());
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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `RemoverProductoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoverProductoCarrito`( 
    pIdProducto INT, 
    pIdUsuario INT
)
BEGIN
    DELETE FROM tbcarrito
    WHERE idProducto = pIdProducto
    AND idUsuario = pIdUsuario;
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

-- Dump completed on 2025-12-08 19:55:58
