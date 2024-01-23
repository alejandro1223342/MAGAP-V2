-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: mag_ist17j2
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalogo` (
  `cat_id` int NOT NULL,
  `cat_nombre` varchar(45) DEFAULT NULL,
  `cat_descripcion` varchar(45) DEFAULT NULL,
  `cat_padre` int DEFAULT NULL,
  `cat_estado` int DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` VALUES (1,'IDENTIFICACION','',0,1),(4,'PROVINCIA',NULL,0,1),(5,'CANTON',NULL,0,1),(6,'PARROQUIA',NULL,0,1),(7,'SECTOR',NULL,0,1),(13,'DOCUMENTOS',NULL,0,1),(15,'ESTADOS',NULL,0,1),(19,'PROCESO',NULL,0,1),(20,'CEDULA','',1,1),(21,'PASAPORTE','',1,1),(22,'COPIA DE CEDULA','',13,1),(23,'LEVANTAMIENTO PLANIMETRICO','',13,1),(24,'CERTIFICADO DE NO AFECCION','',13,1),(25,'DECLARACION JURAMENTADA','',13,1),(26,'SOLICITUD DE TIERRAS','',13,1),(27,'IMBABURA','',4,1),(28,'SAN MIGUEL DE IBARRA','',5,1),(29,'EL SAGRARIO','',6,1),(30,'RESIDENCIAL','',7,1),(31,'CATASTROS','',19,1),(32,'INSPECCION','',19,1),(33,'PROVIDENCIA','',19,1),(34,'PERFECCIONAMIENTO DE PROVIDENCIA','',19,1),(35,'INFORME TECNICO DE INSPECCION',NULL,13,1),(36,'ESTRUCTURA INFORME TECNICO',NULL,0,1),(37,'CONSTRUCCIONES',NULL,36,1),(38,'INFRAESTRUCTURA AGROPECUARIA','',36,1),(39,'ESTADO DE TENENCIA',NULL,36,1);
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `cat_id_tipodoc` int NOT NULL,
  `doc_nombre` varchar(100) DEFAULT NULL,
  `doc_url` varchar(200) NOT NULL,
  `doc_fechareg` varchar(100) NOT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `documento_catalogo_tipodoc_idx` (`cat_id_tipodoc`),
  CONSTRAINT `documento_catalogo_tipodoc` FOREIGN KEY (`cat_id_tipodoc`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (168,22,'COPIA DE CEDULA-1050518594','https://drive.google.com/file/d/15obpZwXbhjmzjH11yPBGcWEX0vYOCT7m/preview','2024-01-14 02:40:29'),(169,23,'LEVANTAMIENTO PLANIMETRICO-1050518594','https://drive.google.com/file/d/1iOFqzD4Er6ESb7p_b1zFZoUv7MN-dMcq/preview','2024-01-14 02:40:48'),(170,24,'CERTIFICADO DE NO AFECCION-1050518594','https://drive.google.com/file/d/17oij-115j6a3_fmimCiM2iuPdSjmi5GC/preview','2024-01-14 02:41:08'),(171,25,'DECLARACION JURAMENTADA-1050518594','https://drive.google.com/file/d/1iG9gPAaMPXLj8W7wm_GnHdw1As7MckMW/preview','2024-01-14 02:41:26'),(172,26,'SOLICITUD DE TIERRAS-1050518594','https://drive.google.com/file/d/1NDPgc7xHOCXD5xlY_cMKqdkb5tlS1RXQ/preview','2024-01-14 02:41:50');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspeccion_documento`
--

DROP TABLE IF EXISTS `inspeccion_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inspeccion_documento` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `pro_id` int NOT NULL,
  `cat_id_tipodoc` int NOT NULL,
  `cat_id_estructura` varchar(45) NOT NULL,
  `cat_id_1` int DEFAULT NULL,
  `cat_id_2` int DEFAULT NULL,
  `cat_id_3` int DEFAULT NULL,
  `ins_dato1` varchar(45) DEFAULT NULL,
  `ins_dato2` varchar(45) DEFAULT NULL,
  `ins_dato3` varchar(45) DEFAULT NULL,
  `ins_observaciones` varchar(45) DEFAULT NULL,
  `ins_fechareg` varchar(45) NOT NULL,
  PRIMARY KEY (`ins_id`),
  KEY `fk_inspeccion_catalogo1_idx` (`cat_id_tipodoc`),
  KEY `fk_inspeccion_catalogo2_idx` (`cat_id_1`),
  KEY `proceso_inspeccion_documento_idx` (`pro_id`),
  CONSTRAINT `fk_inspeccion_catalogo1` FOREIGN KEY (`cat_id_tipodoc`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inspeccion_catalogo2` FOREIGN KEY (`cat_id_1`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_inspeccion_documento` FOREIGN KEY (`pro_id`) REFERENCES `proceso` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspeccion_documento`
--

LOCK TABLES `inspeccion_documento` WRITE;
/*!40000 ALTER TABLE `inspeccion_documento` DISABLE KEYS */;
INSERT INTO `inspeccion_documento` VALUES (50,137,35,'38',1,1,NULL,'100','100','',NULL,'2024-01-17 16:38:32'),(76,137,35,'39',6,13,100000,'4',NULL,NULL,'pppp','2024-01-21 03:40:49');
/*!40000 ALTER TABLE `inspeccion_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `per_id` int NOT NULL,
  `per_nombre` text,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Escritorio'),(2,'Coordinadores'),(3,'Horario Docente'),(4,'Reportes'),(5,'Acceso'),(6,'Reportes'),(7,'Custodios'),(8,'Ventanilla'),(9,'Catastros'),(10,'Inspeccion');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso`
--

DROP TABLE IF EXISTS `proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proceso` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `usu_id` int NOT NULL,
  `tra_id` int NOT NULL,
  `cat_id_estado` int NOT NULL,
  `cat_id_proceso` int NOT NULL,
  `pro_observacion` varchar(45) DEFAULT NULL,
  `pro_fecha` datetime NOT NULL,
  `pro_fechafin` varchar(45) DEFAULT NULL,
  `pro_trasabilidad` int DEFAULT NULL,
  `pro_estado` int DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_proceso_catalogo1_idx` (`cat_id_proceso`),
  KEY `fk_proceso_catalogo1_idx1` (`cat_id_estado`),
  KEY `proceso_usuario_idx` (`usu_id`),
  KEY `proceso_tramite_idx` (`tra_id`),
  CONSTRAINT `fk_proceso_catalogo1` FOREIGN KEY (`cat_id_estado`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_catalogo` FOREIGN KEY (`cat_id_proceso`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_tramite` FOREIGN KEY (`tra_id`) REFERENCES `tramite_solicitante` (`tra_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_usuario` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso`
--

LOCK TABLES `proceso` WRITE;
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
INSERT INTO `proceso` VALUES (131,1,179,28,31,'','2024-01-14 02:51:20',NULL,0,0),(133,1,180,28,31,'','2024-01-14 02:51:28',NULL,0,0),(134,1,181,28,31,'','2024-01-14 02:51:30',NULL,0,0),(135,1,182,28,31,'','2024-01-14 02:51:31',NULL,0,0),(136,1,183,28,31,'','2024-01-14 02:51:33',NULL,0,0),(137,1,180,28,32,'','2024-01-14 02:51:28',NULL,133,0),(138,1,180,28,32,'','2024-01-14 02:51:28',NULL,133,0);
/*!40000 ALTER TABLE `proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitante`
--

DROP TABLE IF EXISTS `solicitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitante` (
  `sol_id` int NOT NULL AUTO_INCREMENT,
  `cat_id_identificacion` int NOT NULL,
  `sol_identificacion` varchar(45) NOT NULL,
  `sol_correo` varchar(45) NOT NULL,
  `sol_nombre` varchar(45) NOT NULL,
  `sol_telefono` varchar(10) NOT NULL,
  `sol_direccion` varchar(100) NOT NULL,
  `cat_id_provincia` int NOT NULL,
  `cat_id_canton` int NOT NULL,
  `cat_id_parroquia` int NOT NULL,
  `cat_id_sector` int NOT NULL,
  `sol_clave` varchar(200) NOT NULL,
  `sol_fechareg` datetime NOT NULL,
  `sol_estado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`sol_id`),
  UNIQUE KEY `sol_identificacion_UNIQUE` (`sol_identificacion`),
  KEY `solicitante_catalogo_canton_idx` (`cat_id_canton`),
  KEY `solicitante_catalogo_identificacion_idx` (`cat_id_identificacion`),
  KEY `solicitante_catalogo_parroquia_idx` (`cat_id_parroquia`),
  KEY `solicitante_catalogo_provincia_idx` (`cat_id_provincia`),
  KEY `solicitante_catalogo_sector_idx` (`cat_id_sector`),
  CONSTRAINT `solicitante_catalogo_canton` FOREIGN KEY (`cat_id_canton`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitante_catalogo_identificacion` FOREIGN KEY (`cat_id_identificacion`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitante_catalogo_parroquia` FOREIGN KEY (`cat_id_parroquia`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitante_catalogo_provincia` FOREIGN KEY (`cat_id_provincia`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitante_catalogo_sector` FOREIGN KEY (`cat_id_sector`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitante`
--

LOCK TABLES `solicitante` WRITE;
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
INSERT INTO `solicitante` VALUES (47,20,'1050518594','alejomuoss@gmail.com','ALEJANDRO JAVIER MUÑOZ PUETATE','0989650479','Venezuela 4-73 y Uruguay',27,28,29,30,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','2024-01-14 02:39:53',1);
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramite_solicitante`
--

DROP TABLE IF EXISTS `tramite_solicitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tramite_solicitante` (
  `tra_id` int NOT NULL AUTO_INCREMENT,
  `sol_id` int NOT NULL,
  `doc_id` int NOT NULL,
  `trasol_fecha` datetime NOT NULL,
  PRIMARY KEY (`tra_id`),
  KEY `tramite_solicitante_documentos_idx` (`doc_id`),
  KEY `tramite_solicitante_solicitante_idx` (`sol_id`),
  CONSTRAINT `tramite_solicitante_documentos` FOREIGN KEY (`doc_id`) REFERENCES `documentos` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tramite_solicitante_solicitante` FOREIGN KEY (`sol_id`) REFERENCES `solicitante` (`sol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite_solicitante`
--

LOCK TABLES `tramite_solicitante` WRITE;
/*!40000 ALTER TABLE `tramite_solicitante` DISABLE KEYS */;
INSERT INTO `tramite_solicitante` VALUES (179,47,168,'2024-01-14 02:40:29'),(180,47,169,'2024-01-14 02:40:48'),(181,47,170,'2024-01-14 02:41:09'),(182,47,171,'2024-01-14 02:41:26'),(183,47,172,'2024-01-14 02:41:50');
/*!40000 ALTER TABLE `tramite_solicitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(45) NOT NULL,
  `usu_cedula` varchar(45) NOT NULL,
  `usu_telefono` varchar(45) DEFAULT NULL,
  `usu_correo` varchar(45) DEFAULT NULL,
  `usu_cargo` varchar(45) DEFAULT NULL,
  `usu_login` varchar(45) NOT NULL,
  `usu_clave` varchar(200) NOT NULL,
  `usu_condicion` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ADMINISTRADOR DEL SISTEMA','-1','782541239','yosdado@gmail.com','Administrador','admin','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(11,'ALEJANDRO JAVIER MUÑOZ PUETATE','1050518594','0989650479','alejomuoss@gmail.com','Ventanilla Unica','MALEJO','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(12,'Anderson Fernando Muñoz Puetate','1005233679','0969281031','andersonfer20@gmail.com','Ventanilla Unica','AMP15','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_permiso` (
  `usupe_id` int NOT NULL AUTO_INCREMENT,
  `usu_id` int NOT NULL,
  `per_id` int NOT NULL,
  PRIMARY KEY (`usupe_id`,`usu_id`,`per_id`),
  KEY `fk_usuario_permiso_permiso1_idx` (`per_id`),
  KEY `usuario_permiso_usuario_idx` (`usu_id`),
  CONSTRAINT `usuario_permiso_permiso` FOREIGN KEY (`per_id`) REFERENCES `permisos` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_permiso_usuario` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permiso`
--

LOCK TABLES `usuario_permiso` WRITE;
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` VALUES (1,1,1),(47,1,1),(55,1,1),(64,11,1),(66,12,1),(73,12,1),(2,1,2),(48,1,2),(56,1,2),(67,12,2),(74,12,2),(3,1,3),(49,1,3),(57,1,3),(68,12,3),(75,12,3),(4,1,4),(50,1,4),(58,1,4),(69,12,4),(76,12,4),(5,1,5),(51,1,5),(59,1,5),(70,12,5),(77,12,5),(6,1,6),(52,1,6),(60,1,6),(71,12,6),(78,12,6),(7,1,7),(53,1,7),(61,1,7),(54,1,8),(62,1,8),(65,11,8),(72,12,8),(79,12,8),(63,1,9),(64,1,10);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mag_ist17j2'
--

--
-- Dumping routines for database 'mag_ist17j2'
--
/*!50003 DROP PROCEDURE IF EXISTS `RUDOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RUDOS`(IN DD VARCHAR(45))
BEGIN
INSERT INTO new_table (DETALLE) VALUE (DD);
Select @@Identity as id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actdes_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actdes_usuario`(IN usuario int, IN op int)
BEGIN
    IF (op = 0) THEN 
    update usuario set usu_condicion = 0 where usu_id = usuario;
    
    ElSEIF (op = 1) THEN
    update usuario set usu_condicion = 1 where usuario;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_catalgo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_catalgo`(in op varchar(100),in id int, in nombre varchar(100),in descr varchar(100),in padre int)
BEGIN

declare sig int;

 
if op='list' then
SELECT c.cat_id,c.cat_nombre,c.cat_descripcion,
( SELECT cat_nombre FROM catalogo p WHERE p.cat_id = c.cat_padre) AS padre, cat_estado
FROM catalogo c; 
   
elseif op='spa' then
	select * from catalogo where cat_padre=padre and  cat_estado=1;
    
elseif op='ing' then

select max(cat_id) into sig from catalogo; 
set sig=sig+1;

INSERT INTO `catalogo`(`cat_id`,`cat_nombre`,`cat_descripcion`,`cat_padre`,`cat_estado`)
VALUES
(sig,nombre,descr,padre,1);

elseif op='act' then
        UPDATE `catalogo` SET `cat_estado` = '1' WHERE (`cat_id` = id);
elseif op='des' then
        UPDATE `catalogo` SET `cat_estado` = '0' WHERE (`cat_id` = id);
elseif op='mod' then

UPDATE `catalogo` SET `cat_nombre` = nombre, `cat_descripcion` = descr, `cat_padre` = padre WHERE (`cat_id` = id);

elseif op='edit' then
	select * from catalogo where cat_id=id;
	
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_documentosol` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_documentosol`(in op varchar(100),in id int,in tipodoc int,in nombre varchar(100),
in url varchar(100))
BEGIN

declare sig int;
if op='list' then
SELECT documentos.doc_id, cat_nombre, doc_fechareg, doc_url 
FROM documentos
JOIN catalogo ON documentos.cat_id_tipodoc = catalogo.cat_id
JOIN tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
WHERE solicitante.sol_identificacion = id;

elseif op='ing' then

INSERT INTO `documentos`
(`cat_id_tipodoc`,`doc_nombre`,`doc_url`,`doc_fechareg`)
VALUES
(tipodoc,nombre,url,now());

SELECT LAST_INSERT_ID() AS insertedId;

elseif op='edit' then

UPDATE documentos
SET doc_url = url, doc_fechareg = now()
WHERE doc_nombre = nombre AND doc_id = id;

elseif op='listedi' then

SELECT ts.tra_id, d.doc_nombre, d.doc_fechareg, d.doc_url
FROM documentos d
INNER JOIN tramite_solicitante ts ON d.doc_id = ts.doc_id
INNER JOIN solicitante s ON ts.sol_id = s.sol_id
WHERE s.sol_identificacion = nombre;

elseif op = 'compDoc' then
SELECT COUNT(*) AS count_id FROM documentos WHERE doc_nombre = nombre;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertapermisos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertapermisos`(IN op INT, IN usuario INT, IN permiso INT)
BEGIN
    DECLARE sig INT;

    IF op = 1 THEN
        SELECT IFNULL(MAX(usupe_id), 0) + 1 INTO sig FROM usuario_permiso;

        INSERT INTO usuario_permiso
            (usupe_id, usu_id, per_id)
        VALUES
            (sig, usuario, permiso);
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertausuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertausuario`(in op int, in nombres varchar(100),in cedula varchar(10), in telefono varchar(10),in correo varchar(100), in cargo varchar(25), 
in login varchar(10), in clave varchar(200))
BEGIN

if op=0 then


INSERT INTO `usuario`(`usu_nombre`,`usu_cedula`,`usu_telefono`,`usu_correo`,`usu_cargo`,`usu_login`,`usu_clave`,
`usu_condicion`)
VALUES
(nombres,cedula,telefono,correo,cargo,login,clave,'1');
-- Select @@Identity;

SELECT LAST_INSERT_ID() AS insertedId;


end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_inspeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inspeccion`(
    in op varchar(10),
    in proceso_id int,
    in inspeccion int,
    in proceso int,
    in dato1 varchar(100),
    in dato2 varchar(100),
    in dato3 varchar(100),
    in catalogo_1 int,
    in catalogo_2 int,
    in catalogo_3 int,
    in observaciones varchar(200)
)
BEGIN
    /* LISTAR SOLICITANTES */
    if op = 'list' then
        select pro_id, sol_identificacion, sol_nombre, sol_telefono, sol_direccion 
        from proceso, tramite_solicitante, solicitante, catalogo
        where proceso.tra_id = tramite_solicitante.tra_id 
            and tramite_solicitante.sol_id = solicitante.sol_id 
            and proceso.cat_id_proceso = catalogo.cat_id 
            and cat_id_proceso = 32;
    /* FIN LISTAR SOLICITANTES */

    /* LISTAR CONSTRUCCIONES */
    elseif op = 'list_const' then
         select ins_id,proceso.pro_id,
            (SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_1) as construccion,
            (SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_2) as materiales,
            (SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_3) as estado,
            ins_dato1, ins_dato2, ins_dato3 
        from inspeccion_documento, proceso 
        where inspeccion_documento.pro_id = proceso.pro_id and cat_id_estructura=37 and proceso.pro_id=proceso_id;
	/* FIN LISTAR CONSTRUCCIONES */

	/*LISTAR INFRAESTRUCTURAS AGROPECUARIAS*/
    elseif op='list_agro' then
    
     select ins_id,
            (SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_1) as concepto,
            ins_dato1 AS unidad_medida, ins_dato2 as cantidad, 
		(SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_2) as estado

        from inspeccion_documento, proceso 
        where inspeccion_documento.pro_id = proceso.pro_id and cat_id_estructura=38 ;
    /*FIN LISTAR INFRAESTRUCTURA AGROPECUARIA*/
            
    /* Insertar Información */

    /* Insertar construcciones */
    elseif op = 'ins_const' then
        INSERT INTO inspeccion_documento (
            `pro_id`, `cat_id_tipodoc`, `cat_id_estructura`, `ins_dato1`, `ins_dato2`, `ins_dato3`, 
            `cat_id_1`, `cat_id_2`, `cat_id_3`, `ins_fechareg`
        ) 
        VALUES (
            proceso, '35', '37', catalogo_1, catalogo_2, catalogo_3, 
            dato1, dato2, dato3, NOW()
        );
        
        /*Insertar estado de tenencia*/
        elseif op='ins_ten' then
        
        INSERT INTO inspeccion_documento (`pro_id`, `cat_id_tipodoc`, 
        `cat_id_estructura`, `cat_id_1`, `cat_id_2`, `cat_id_3`, `ins_dato1`, 
        `ins_observaciones`, `ins_fechareg`) 
        VALUES (proceso, '35', '39', catalogo_1, catalogo_2, catalogo_3, dato1, observaciones, now());

        
        /*FIN*/
    /* FIN */

    /* Eliminar informacion de las tablas */
    /* Eliminar construcciones */
    elseif op = 'elim_const' then
DELETE FROM inspeccion_documento WHERE (`ins_id` = inspeccion);
    /* Fin eliminar construcciones */
    /* Fin */

    /* MOSTRAR SOLICITANTES */
    elseif op = 'mos' then
        SELECT 
            pro_id,
            (SELECT cat_nombre FROM catalogo WHERE cat_id = solicitante.cat_id_provincia) as provincia,
            (SELECT cat_nombre FROM catalogo where cat_id = solicitante.cat_id_canton) as canton,
            (SELECT cat_nombre FROM catalogo where cat_id = solicitante.cat_id_parroquia) as parroquia,
            (SELECT cat_nombre FROM catalogo where cat_id = solicitante.cat_id_sector) as sector
        FROM 
            proceso,
            tramite_solicitante,
            solicitante,
            catalogo
        WHERE 
            proceso.tra_id = tramite_solicitante.tra_id 
            AND tramite_solicitante.sol_id = solicitante.sol_id 
            AND proceso.cat_id_proceso = catalogo.cat_id 
            AND pro_id = proceso_id;
    /* FIN MOSTRAR SOLICITANTES */
    
    /*MOSRAR ESTADO DE TENENCIA*/
    elseif op='mos_ten' then
    select ins_id,
(SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_1) as forma_tenencia,
(SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_2) as historia_tenencia,
(SELECT cat_nombre FROM catalogo WHERE cat_id = inspeccion_documento.cat_id_3) as obtencion_predio,
ins_dato1 as tiempo_posesion,ins_observaciones as observaciones
 from inspeccion_documento,proceso
where inspeccion_documento.pro_id=proceso.pro_id and cat_id_estructura=39 and proceso.pro_id=proceso_id;
    /*FIN MOSTRAR*/
    
    /*ACTUALIZAR DATOS*/
    elseif op='edit_ten' then
   UPDATE inspeccion_documento
SET
  `cat_id_1` = catalogo_1,
  `cat_id_2` = catalogo_2,
  `cat_id_3` = catalogo_3,
  `ins_dato1` = dato1,
  `ins_observaciones` = observaciones,
  `ins_fechareg` = NOW()
WHERE `ins_id` = inspeccion;

    /*FIN*/
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_logeo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_logeo`(in op varchar(100),in usuario varchar(50), in clave varchar(100))
BEGIN

if op='usu' then
SELECT usu_id,usu_cedula,usu_nombre,usu_correo,usu_telefono,usu_cargo,usu_login,usu_clave,usu_condicion 
FROM usuario 
WHERE usu_login=usuario AND usu_clave=clave AND usu_condicion='1';
elseif op='sol' then
SELECT `sol_id`,`cat_id_identificacion`,`sol_identificacion`,`sol_nombre`,`sol_telefono`,
    `sol_direccion`,`cat_id_provincia`,`cat_id_canton`,`cat_id_parroquia`,`cat_id_sector`,
    `sol_clave`,`sol_fechareg`,`sol_estado`
FROM `solicitante` where sol_identificacion=usuario and sol_clave=clave and sol_estado=1;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_permisos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permisos`(in usuario varchar(10))
BEGIN
SELECT * FROM usuario_permiso WHERE usu_id=usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_procesos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procesos`(in op varchar(20),in id int,in usuario int,
in tramite int, in estado int, in observacion varchar(200))
BEGIN
DECLARE ultimo_proceso_id INT;

if op='list' then
SELECT pro_id, sol_nombre, sol_telefono, sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
where cat_id_proceso= 20 and pro_estado=1;

elseif op='mos' then

SELECT pro_id,proceso.tra_id,sol_nombre
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id where pro_id=1;

elseif op='cat' then

 SELECT MAX(`pro_id`) INTO ultimo_proceso_id
    FROM `proceso`;
    
     IF ultimo_proceso_id IS NOT NULL THEN
        UPDATE `proceso`
        SET `pro_estado` = 0
        WHERE `pro_id` = ultimo_proceso_id;
    END IF;

INSERT INTO `proceso`
(`usu_id`,`tra_id`,`cat_id_estado`,`cat_id_proceso`,`pro_observacion`,`pro_fecha`,`pro_trasabilidad`,`pro_estado`)
VALUES
(usuario,tramite,estado,21,observacion,NOW(),last_insert_id(),1);

elseif op='ins' then

INSERT INTO `proceso`
(`usu_id`,`tra_id`,`cat_id_estado`,`cat_id_proceso`,`pro_observacion`,`pro_fecha`,`pro_trasabilidad`)
VALUES
(usuario,tramite,estado,22,observacion,NOW(),last_insert_id());

elseif op='prov' then

INSERT INTO `proceso`
(`usu_id`,`tra_id`,`cat_id_estado`,`cat_id_proceso`,`pro_observacion`,`pro_fecha`,`pro_trasabilidad`)
VALUES
(usuario,tramite,estado,23,observacion,NOW(),last_insert_id());

ELSEIF op='ven' THEN
    SELECT MAX(`pro_id`) INTO ultimo_proceso_id FROM `proceso`;

    IF ultimo_proceso_id IS NOT NULL THEN
        UPDATE `proceso`
        SET `pro_estado` = 0
        WHERE `pro_id` = ultimo_proceso_id;
    END IF;

    INSERT INTO `proceso`
    (`usu_id`,`tra_id`,`cat_id_estado`,`cat_id_proceso`,`pro_observacion`,`pro_fecha`,`pro_trasabilidad`,`pro_estado`)
    VALUES
    (usuario,tramite,estado,21,observacion,NOW(),last_insert_id(),1);

end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_solicitante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_solicitante`(in op varchar (10),in tipoiden int,in numiden varchar(10),
in correo varchar(45),in nombre varchar (100),in telefono varchar(10),in direccion varchar(100),in provincia varchar(10),
in canton int,in parroquia int, in sector int,in clave varchar(200) )
BEGIN

if op = 'ing' then

INSERT INTO `solicitante`(`cat_id_identificacion`,`sol_identificacion`,`sol_correo`,
`sol_nombre`,`sol_telefono`,`sol_direccion`,`cat_id_provincia`,`cat_id_canton`,
`cat_id_parroquia`,`cat_id_sector`,`sol_clave`,`sol_fechareg`,`sol_estado`)
VALUES
(tipoiden,numiden,correo,nombre,telefono,direccion,provincia,canton,parroquia,sector,clave,NOW(),1);

end if;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_tramites` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tramites`(in op varchar(45), in solicitante int, in documento int)
BEGIN

if op='ing' then
INSERT INTO `tramite_solicitante`
(`sol_id`,`doc_id`,`trasol_fecha`)
VALUES
(solicitante,documento,now());

end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios`(in op int,in usuario int)
BEGIN
if op=0 then
SELECT * FROM usuario;

elseif op=1 then

SELECT * FROM usuario where usu_id=usuario;

end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ventanilla` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ventanilla`(in op varchar(100), in id int, in usuario int,
in tramite int, in estado int, in observacion varchar(200))
BEGIN
DECLARE ultimo_proceso_id INT;

if op='list' then
SELECT s.sol_identificacion as s_ident, s.sol_identificacion,s.sol_nombre, s.sol_telefono, 
    CONCAT(
    CONCAT(UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_canton), 1, 1)), LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_canton), 2))),
    ', ',
    CONCAT(UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_sector), 1, 1)), LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_sector), 2))),
    ', ',
    COALESCE(s.sol_direccion, '')
) AS sol_direccion
FROM tramite_solicitante t1
LEFT JOIN tramite_solicitante t2
    ON t1.sol_id = t2.sol_id AND t1.tra_id < t2.tra_id
LEFT JOIN tramite_solicitante t3
    ON t1.sol_id = t3.sol_id AND t1.tra_id < t3.tra_id AND t2.tra_id < t3.tra_id
LEFT JOIN documentos d ON d.doc_id = t1.doc_id
LEFT JOIN solicitante s ON s.sol_id = t1.sol_id
WHERE t2.tra_id IS NULL AND t3.tra_id IS NULL;


/*SELECT t1.tra_id, s.sol_nombre, s.sol_telefono, s.sol_direccion
FROM tramite_solicitante t1
LEFT JOIN tramite_solicitante t2
    ON t1.sol_id = t2.sol_id AND t1.tra_id < t2.tra_id
LEFT JOIN documentos d ON d.doc_id = t1.doc_id
LEFT JOIN solicitante s ON s.sol_id = t1.sol_id
WHERE t2.tra_id IS NULL;*/

elseif op='mos' then

-- select * from tramite_solicitante where tra_id=id;
select tra_id, sol_nombre, doc_url, sol_identificacion from tramite_solicitante,documentos, solicitante 
where tramite_solicitante.sol_id=solicitante.sol_id and tramite_solicitante.doc_id=documentos.doc_id and tra_id=id;

elseif op='ing' then 
 
 SELECT MAX(`pro_id`) INTO ultimo_proceso_id
    FROM `proceso`;
    
     IF ultimo_proceso_id IS NOT NULL THEN
        UPDATE `proceso`
        SET `pro_estado` = 0
        WHERE `pro_id` = ultimo_proceso_id;
    END IF;


INSERT INTO `proceso`


(`usu_id`,`tra_id`,`cat_id_estado`,`cat_id_proceso`,`pro_observacion`,`pro_fecha`,`pro_trasabilidad`,`pro_estado`)
VALUES
(usuario,tramite,estado,20,observacion,NOW(),0,1);

end if;


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

-- Dump completed on 2024-01-22 21:23:33
