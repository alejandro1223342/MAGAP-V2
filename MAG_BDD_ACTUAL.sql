-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: magist17j
-- ------------------------------------------------------
-- Server version	8.0.35

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
INSERT INTO `catalogo` VALUES (1,'IDENTIFICACION','ASDASDASD',0,1),(3,'PASAPORTE','',1,1),(4,'PROVINCIA',NULL,0,1),(5,'CANTON',NULL,0,1),(6,'PARROQUIA',NULL,0,1),(7,'SECTOR',NULL,0,1),(8,'IMBABURA','',4,1),(9,'IBARRA','',5,1),(10,'EL SAGRARIO','',6,1),(11,'LA FLORESTA','',7,1),(12,'LAS PALMAS','',7,1),(13,'DOCUMENTOS',NULL,0,1),(14,'COPIA DE CEDULA','',13,1),(15,'ESTADOS',NULL,0,1),(16,'APROBADO','',-1,1),(17,'PLANIMETRICO','',13,1),(18,'APROBADO','',15,1),(19,'PROCESO',NULL,0,1),(20,'CATASTROS','',19,1),(21,'ADJUDICACION DE TIERRAS','',13,1),(22,'INSPECCION','',19,1),(23,'PROVIDENCIA','',19,1),(24,'PERFECCIONAMIENTO DE PROVIDENCIA','',19,1),(25,'CEDULA','',1,1),(26,'SUBIDO','',15,1),(27,'LOS CEIBOS','this is',7,1),(28,'NO APROBADO','ssss',15,1),(29,'IDENTIFICACION','ssss',-1,1),(30,'Alejandro','ssss',7,0),(31,'VENTANILLA',NULL,19,1),(32,'DOCUMENTO INSPECCION',NULL,0,1),(33,'INFORME TECNICO DE INSPECCION',NULL,32,1),(34,'PLAN RURAL',NULL,32,1),(35,'INFORME RURAL',NULL,32,1),(36,'FINALIZADO',NULL,15,1),(37,'ANTONIO ANTE',NULL,5,1),(38,'COTACACHI',NULL,5,1),(39,'OTAVALO',NULL,5,1),(40,'PIMAMPIRO',NULL,5,1),(41,'URCUQUI',NULL,5,1),(42,'EL SAGRARIO','',9,1),(43,'SAN FRANCISCO','',9,1),(44,'CARANQUI','',9,1),(45,'ALPACHACA','',9,1),(46,'PRIORATO','',9,1),(47,'AMBUQUI','',9,1),(48,'ANGO-CHAGUA','',9,1),(49,'CAROLINA','',9,1),(50,'LA ESPERANZA','',9,1),(51,'LITA','',9,1),(52,'SALINAS','',9,1),(53,'SAN ANTONIO','',9,1),(54,'URCUQUI','',41,1),(55,'CAHUASQUI','',41,1),(56,'SAN BLAS','',41,1),(57,'TUMBABIRO','',41,1),(58,'PABLO ARENAS','',41,1),(59,'BUENOS AIRES','',41,1),(60,'EL JORDAN','',39,1),(61,'GONZALES SUAREZ','',39,1),(62,'EUGENIO ESPEJO','',39,1),(63,'SAN JUAN DE ILUMÁN','',39,1),(64,'MIGUEL EGAS CABEZAS','',39,1),(65,'SAN PEDRO DE PATAQUI','',39,1),(66,'SAN JOSE DE QUICHINCHE','',39,1),(67,'SAN PABLO','',39,1),(68,'SAN RAFAEL','',39,1),(69,'SELVA ALEGRE','',39,1),(70,'SAN FRANCISCO','',38,1),(71,'EL SAGRARIO','',38,1),(72,'IMANTAG','',38,1),(73,'QUIROGA','',38,1),(74,'APUELA','',38,1),(75,'GARCIA MORENO','',38,1),(76,'PEÑAHERRERA','',38,1),(77,'CUELLAJE','',38,1),(78,'VACAS GALINDO','',38,1),(79,'ATUNTAQUI','',37,1),(80,'ANDRADE MARIN','',37,1),(81,'SAN ROQUE','',37,1),(82,'CHALTURA','',37,1),(83,'NATABUELA','',37,1),(84,'IMBAYA','',37,1),(85,'PIMAMPIRO','',40,1),(86,'MARIANO ACOSTA','',40,1),(87,'SAN FRANCISCO DE SIGSIPAMBA','',40,1),(88,'CHUGA','',40,1),(89,'DOCUMENTO CATASTROS',NULL,0,1),(90,'CHECKLIST',NULL,89,1);
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
  `doc_descripcion` varchar(200) DEFAULT NULL,
  `doc_url` varchar(200) NOT NULL,
  `doc_fechareg` varchar(100) NOT NULL,
  `doc_estado` int DEFAULT '0',
  `doc_temporal` int DEFAULT '26',
  PRIMARY KEY (`doc_id`),
  KEY `documento_catalogo_tipodoc_idx` (`cat_id_tipodoc`),
  CONSTRAINT `documento_catalogo_tipodoc` FOREIGN KEY (`cat_id_tipodoc`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (117,14,'COPIA DE CEDULA-1001399490','','https://drive.google.com/file/d/1SwBC2MjFUi9CNZV_4LJQVOnU15ubGA5X/preview','2024-03-11 02:00:27',36,36),(118,17,'PLANIMETRICO-1001399490','','https://drive.google.com/file/d/1G6aHUqMZot0LrTfYBha1HH1CSaYtPN6c/preview','2024-03-11 02:00:37',36,36),(119,21,'ADJUDICACION DE TIERRAS-1001399490','','https://drive.google.com/file/d/1JGqCSBfTZSslYVYnoiBwwkH3Cw0bw0hk/preview','2024-03-11 02:00:46',36,36),(120,14,'COPIA DE CEDULA-1001399490','','https://drive.google.com/file/d/1xpY5TEuQGNiUflwJXYGusa_i34r4h6i9/preview','2024-03-13 14:05:55',0,26),(121,17,'PLANIMETRICO-1001399490','','https://drive.google.com/file/d/1yhlYjH6jzQjfDdWFXL18tdzRvJOWzbnW/preview','2024-03-13 22:36:17',0,26),(122,21,'ADJUDICACION DE TIERRAS-1001399490','','https://drive.google.com/file/d/13IDWfj6sfuFDxkrvlIz4uNPp9SKrbSdK/preview','2024-03-13 14:13:33',0,26),(123,90,'CHECKLIST-1001399490',NULL,'https://drive.google.com/file/d/1nZJA0EQMw6jgjzw5VOq7h7lS7VIYC6hn/preview','2024-03-13 19:01:56',0,26),(124,33,'INFORME TECNICO DE INSPECCION-1001399490','','https://drive.google.com/file/d/1-lZvIUJbk0ptA3x9pqRtO8jgPNu9-UUH/preview','2024-03-14 00:39:38',0,26),(125,34,'PLAN RURAL-1001399490','','https://drive.google.com/file/d/1WQd7_AQc30wYqFv11XlfiUCjsOew1z_f/preview','2024-03-13 23:33:55',0,26),(126,35,'INFORME RURAL-1001399490','','https://drive.google.com/file/d/1s1wS98TaY2QNlRArbmLRiQM1UlUrv1r7/preview','2024-03-13 23:34:11',0,26),(127,14,'COPIA DE CEDULA-1002501466','','https://drive.google.com/file/d/1-oezC7zuj_9jyTNM63h6aCWPcq7hc-wX/preview','2024-03-14 01:03:52',0,26),(128,17,'PLANIMETRICO-1002501466','','https://drive.google.com/file/d/1jMHOY2mCZPBisOa6ong1M9L6o3PnjgAV/preview','2024-03-14 01:04:08',0,26),(129,21,'ADJUDICACION DE TIERRAS-1002501466','','https://drive.google.com/file/d/1vrCwNkVpoVroAnf6o6x8zzPsECJiktCJ/preview','2024-03-14 01:04:23',0,26),(130,90,'CHECKLIST-1002501466',NULL,'https://drive.google.com/file/d/17eJtJ4Wsqo0d9QOmoICm-Uh2BWNtbVp7/preview','2024-03-14 01:06:24',0,26),(131,33,'INFORME TECNICO DE INSPECCION-1002501466','','https://drive.google.com/file/d/13_WWYtqgRa45Chwg2rPu_VepqHYAx_b_/preview','2024-03-14 01:07:19',0,26),(132,34,'PLAN RURAL-1002501466','','https://drive.google.com/file/d/1jv4i7QiCiN6xPHkoIrQqecLUWwcrdpFb/preview','2024-03-14 01:07:30',0,26),(133,35,'INFORME RURAL-1002501466','','https://drive.google.com/file/d/1bixaHArqJAiYzUotDbIhcVwj2zLFU955/preview','2024-03-14 01:07:45',0,26),(134,14,'COPIA DE CEDULA-1005233679','','https://drive.google.com/file/d/1lsvbHjOJj51JNasE8foypkv-XRL1lmRn/preview','2024-03-14 01:28:47',0,26),(135,17,'PLANIMETRICO-1005233679','','https://drive.google.com/file/d/1Jl61zYRyJrLNr2mOrJtoSkppW69KMNdn/preview','2024-03-14 01:27:13',0,26),(136,21,'ADJUDICACION DE TIERRAS-1005233679','','https://drive.google.com/file/d/1taNMLujhSG0D-Ga9yLUuWg2EDUVQZ-NQ/preview','2024-03-14 01:32:36',0,26),(137,90,'CHECKLIST-1005233679',NULL,'https://drive.google.com/file/d/1uEXUsfEtL4EPKWYbYqXmVMdM_ZwQkFJb/preview','2024-03-14 01:33:34',0,26),(138,33,'INFORME TECNICO DE INSPECCION-1005233679','','https://drive.google.com/file/d/1yadmbpvjMYwwVsjxqeijFR_k9bz1BLmb/preview','2024-03-14 01:36:40',0,26),(139,34,'PLAN RURAL-1005233679','','https://drive.google.com/file/d/1nJxdoVx5mBI14eO2VXJidebm0BxG3y6E/preview','2024-03-14 01:36:51',0,26),(140,35,'INFORME RURAL-1005233679','','https://drive.google.com/file/d/1U7UZpyTUa-pFc9ITLqCpx_zYFojkurpj/preview','2024-03-14 01:37:03',0,26);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspeccion_documento`
--

DROP TABLE IF EXISTS `inspeccion_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inspeccion_documento` (
  `ins_id` int NOT NULL,
  `cat_id_tipo` int NOT NULL,
  `ins_dato1` varchar(45) NOT NULL,
  `ins_dato2` varchar(45) NOT NULL,
  `ins_dato3` varchar(45) NOT NULL,
  `ins_observaciones` varchar(45) NOT NULL,
  `ins_fechareg` varchar(45) NOT NULL,
  `cat_id_estructura` int NOT NULL,
  `pro_id` int NOT NULL,
  PRIMARY KEY (`ins_id`),
  KEY `fk_inspeccion_catalogo1_idx` (`cat_id_tipo`),
  KEY `fk_inspeccion_catalogo2_idx` (`cat_id_estructura`),
  KEY `proceso_inspeccion_documento_idx` (`pro_id`),
  CONSTRAINT `fk_inspeccion_catalogo1` FOREIGN KEY (`cat_id_tipo`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inspeccion_catalogo2` FOREIGN KEY (`cat_id_estructura`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_inspeccion_documento` FOREIGN KEY (`pro_id`) REFERENCES `proceso` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspeccion_documento`
--

LOCK TABLES `inspeccion_documento` WRITE;
/*!40000 ALTER TABLE `inspeccion_documento` DISABLE KEYS */;
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
INSERT INTO `permisos` VALUES (1,'Escritorio'),(2,'Inspección'),(3,'Providencia'),(4,'Perfeccionamiento Providencia'),(5,'Acceso'),(6,'Reportes'),(7,'Custodios'),(8,'Ventanilla'),(9,'Catastros');
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
  `pro_observacion` varchar(200) DEFAULT NULL,
  `pro_fecha` datetime NOT NULL,
  `pro_fechafin` datetime DEFAULT NULL,
  `pro_trasabilidad` int DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_proceso_catalogo1_idx` (`cat_id_proceso`),
  KEY `fk_proceso_catalogo1_idx1` (`cat_id_estado`),
  KEY `proceso_usuario_idx` (`usu_id`),
  KEY `pro_observacion_idx` (`pro_observacion`),
  CONSTRAINT `fk_proceso_catalogo1` FOREIGN KEY (`cat_id_estado`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_catalogo` FOREIGN KEY (`cat_id_proceso`) REFERENCES `catalogo` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `proceso_usuario` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso`
--

LOCK TABLES `proceso` WRITE;
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
INSERT INTO `proceso` VALUES (16,2,1,18,20,'','2024-03-11 01:56:37',NULL,0),(17,3,1,18,22,'Registrado','2024-03-11 01:56:37','2024-03-11 02:00:50',16),(18,4,1,18,23,'','2024-03-11 01:56:37','2024-03-11 02:01:36',17),(19,5,1,18,24,'','2024-03-11 01:56:37','2024-03-11 02:12:46',18),(21,6,1,18,36,'','2024-03-11 01:56:37','2024-03-12 11:29:00',19),(22,2,2,18,20,'','2024-03-13 13:39:49',NULL,0),(24,3,2,18,20,'Registrado','2024-03-13 13:39:49','2024-03-13 14:15:21',22),(25,3,2,18,22,'Catastro sube Checklist','2024-03-13 13:39:49','2024-03-13 22:12:34',24),(26,4,2,18,22,'','2024-03-13 13:39:49','2024-03-13 22:38:28',25),(27,4,2,18,22,'','2024-03-13 13:39:49','2024-03-14 00:32:58',26),(28,3,2,18,23,'Registrado','2024-03-13 13:39:49','2024-03-14 00:42:40',27),(29,2,3,18,20,'','2024-03-14 01:03:06',NULL,0),(30,3,3,18,20,'Registrado','2024-03-14 01:03:06','2024-03-14 01:04:27',29),(31,3,3,18,22,'Catastro sube Checklist','2024-03-14 01:03:06','2024-03-14 01:06:27',30),(32,4,3,18,22,'','2024-03-14 01:03:06','2024-03-14 01:06:58',31),(33,3,3,18,23,'Registrado','2024-03-14 01:03:06','2024-03-14 01:09:13',32),(34,2,4,18,20,'','2024-03-14 01:18:24',NULL,0),(35,3,4,18,20,'Registrado','2024-03-14 01:18:24','2024-03-14 01:32:45',34),(36,3,4,18,22,'Catastro sube Checklist','2024-03-14 01:18:24','2024-03-14 01:35:26',35),(37,4,4,18,22,'','2024-03-14 01:18:24','2024-03-14 01:36:21',36),(38,3,4,18,23,'Registrado','2024-03-14 01:18:24','2024-03-14 01:45:33',37);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitante`
--

LOCK TABLES `solicitante` WRITE;
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
INSERT INTO `solicitante` VALUES (1,25,'1002501466','jlnarvaez@gmail.com','JOSE LUIS NARVAEZ QUINTEROS','0991451230','LUIS FERNANDO VILLAMAR 472 Y MANUEL ESPAÑA',8,9,42,27,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','2024-02-20 10:15:42',1),(2,25,'1005233679','anderson@mail.com','Anderson Fernando Muñoz Puetate','0969281031','Del Gorrio 6-36 y Zumba',8,9,45,12,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','2024-02-25 11:43:34',1),(3,3,'1001399490','fernando@mail.com','Luis Fernando Muñoz Santillan','0997863514','Del Gorrion 6-46 y Zumba',8,9,45,11,'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','2024-02-25 11:47:25',1);
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramite_solicitante`
--

DROP TABLE IF EXISTS `tramite_solicitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tramite_solicitante` (
  `tra_iden` int NOT NULL AUTO_INCREMENT,
  `tra_id` int NOT NULL,
  `sol_id` int NOT NULL,
  `doc_id` int NOT NULL,
  `trasol_fecha` datetime NOT NULL,
  `tra_pro` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`tra_iden`),
  KEY `tramite_solicitante_documentos_idx` (`doc_id`),
  KEY `tramite_solicitante_solicitante_idx` (`sol_id`),
  CONSTRAINT `tramite_solicitante_documentos` FOREIGN KEY (`doc_id`) REFERENCES `documentos` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tramite_solicitante_solicitante` FOREIGN KEY (`sol_id`) REFERENCES `solicitante` (`sol_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite_solicitante`
--

LOCK TABLES `tramite_solicitante` WRITE;
/*!40000 ALTER TABLE `tramite_solicitante` DISABLE KEYS */;
INSERT INTO `tramite_solicitante` VALUES (150,1,3,117,'2024-03-11 01:55:18',1),(151,1,3,118,'2024-03-11 01:55:42',1),(152,1,3,119,'2024-03-11 01:55:53',1),(153,2,3,120,'2024-03-13 13:38:26',2),(154,2,3,121,'2024-03-13 13:38:45',2),(155,2,3,122,'2024-03-13 13:39:00',2),(156,2,3,123,'2024-03-13 19:01:56',2),(157,2,3,124,'2024-03-13 23:17:57',2),(158,2,3,125,'2024-03-13 23:33:55',2),(159,2,3,126,'2024-03-13 23:34:11',2),(160,3,1,127,'2024-03-14 01:02:04',1),(161,3,1,128,'2024-03-14 01:02:15',1),(162,3,1,129,'2024-03-14 01:02:26',1),(163,3,1,130,'2024-03-14 01:06:24',1),(164,3,1,131,'2024-03-14 01:07:19',1),(165,3,1,132,'2024-03-14 01:07:30',1),(166,3,1,133,'2024-03-14 01:07:45',1),(167,4,2,134,'2024-03-14 01:17:28',1),(168,4,2,135,'2024-03-14 01:17:40',1),(169,4,2,136,'2024-03-14 01:17:51',1),(170,4,2,137,'2024-03-14 01:33:34',1),(171,4,2,138,'2024-03-14 01:36:40',1),(172,4,2,139,'2024-03-14 01:36:51',1),(173,4,2,140,'2024-03-14 01:37:03',1);
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
  `usu_nombre` varchar(100) NOT NULL,
  `usu_cedula` varchar(10) NOT NULL,
  `usu_telefono` varchar(10) DEFAULT NULL,
  `usu_correo` varchar(100) DEFAULT NULL,
  `usu_cargo` varchar(100) DEFAULT NULL,
  `usu_login` varchar(100) NOT NULL,
  `usu_clave` varchar(200) NOT NULL,
  `usu_condicion` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ADMINISTRADOR DEL SISTEMA','-1','782541239','yosdado@gmail.com','Administrador','admin','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(2,'ALEJANDRO JAVIER MUÑOZ PUETATE','1050518594','0989650479','alejomuoss@gmail.com','VENTANILLA','AMP123','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(3,'ANDERSON FERNANDO MUÑOZ PUETATE','1005233679','1234567891','andersonf@gmail.com','CATASTRO','123','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(4,'Usuario Inspección','8731789321','0989650479','inspeccion@gmail.com','Inspección','inspeccion','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(5,'Usuario Providencia','1005236784','0989650471','providencia@gmail.com','Providencia','providencia','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(6,'Usuario Perfeccionamiento Providencia','1005235421','0989650471','perfeccionamiento@gmail.com','Perfeccionamiento Providencia','perfeccionamiento','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',1),(7,'','','','','','','',1),(8,'','','','','','','',1),(9,'','','','','','','',1),(10,'','','','','','','',1),(11,'','','','','','','',1),(12,'','','','','','','',1),(13,'','','','','','','',1),(14,'','','','','','','',1),(15,'','','','','','','',1),(16,'','','','','','','',1),(17,'','','','','','','',1),(18,'','','','','','','',1),(19,'','','','','','','',1),(20,'','','','','','','',1),(21,'','','','','','','',1),(22,'','','','','','','',1),(23,'','','','','','','',1),(24,'','','','','','','',1),(25,'','','','','','','',1),(26,'','','','','','','',1),(27,'','','','','','','',1),(28,'','','','','','','',1),(29,'','','','','','','',1),(30,'','','','','','','',1),(31,'','','','','','','',1),(32,'','','','','','','',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permiso`
--

LOCK TABLES `usuario_permiso` WRITE;
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
INSERT INTO `usuario_permiso` VALUES (1,1,1),(10,2,1),(12,3,1),(14,4,1),(16,5,1),(18,6,1),(2,1,2),(15,4,2),(3,1,3),(17,5,3),(4,1,4),(19,6,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(11,2,8),(9,1,9),(13,3,9);
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'magist17j'
--

--
-- Dumping routines for database 'magist17j'
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_catalgo`(in op varchar(100),in id int, in nombre varchar(100),in descr varchar(100),in padre int)
BEGIN

declare sig int;

 
if op='list' then
SELECT c.cat_id,c.cat_nombre,c.cat_descripcion,
( SELECT cat_nombre FROM catalogo p WHERE p.cat_id = c.cat_padre) AS padre, cat_estado
FROM catalogo c; 
   
elseif op='spa' then
	SELECT cat_id, cat_nombre
FROM catalogo
WHERE cat_padre = padre
    AND cat_id IN (18, 28) ;
    
elseif op='spa2' then
	SELECT cat_id, cat_nombre
	FROM catalogo
	WHERE cat_padre = padre and cat_estado = 1;    
    
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_catastro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_catastro`(in op varchar(100), in id int, in usuario int,
in tramite int, in estado int, in observacion varchar(200))
BEGIN
DECLARE ultimo_proceso_id INT;

IF op = 'list' THEN
SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_temporal = 0
    AND proceso.cat_id_proceso = 20
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );
    
ELSEIF op = 'catIns' THEN
SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_temporal = 0
    AND proceso.cat_id_proceso = 22
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );
    
ELSEIF op = 'listCheck' THEN
SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_estado = 0
    AND proceso.cat_id_proceso = 20
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );       

elseif op='mos' then

	select tra_id, sol_nombre, doc_url, sol_identificacion 
    from tramite_solicitante,documentos, solicitante 
	where tramite_solicitante.sol_id=solicitante.sol_id 
    and tramite_solicitante.doc_id=documentos.doc_id 
    and tra_id=id;
    
elseif op='listedi' then

SELECT ts.tra_iden, ts.tra_pro, d.doc_id, d.doc_nombre, d.doc_fechareg, d.doc_url 
FROM tramite_solicitante ts
JOIN solicitante s ON ts.sol_id = s.sol_id 
JOIN documentos d ON ts.doc_id = d.doc_id 
WHERE s.sol_identificacion = tramite
AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);

elseif op='listCatIns' then

SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url
FROM tramite_solicitante ts
JOIN solicitante s ON ts.sol_id = s.sol_id
JOIN documentos d ON ts.doc_id = d.doc_id
WHERE s.sol_identificacion = tramite
    AND d.cat_id_tipodoc IN (
        SELECT cat_id 
        FROM catalogo 
        WHERE cat_nombre IN ('INFORME TECNICO DE INSPECCION', 'PLAN RURAL', 'INFORME RURAL')
    )
    AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_documentosol`(
    in op varchar(100),
    in id int,
    in tipodoc int,
    in nombre varchar(100),
    in url varchar(100)
)
BEGIN
    declare sig int;
    declare cat_id_doc int;

    if op='list' then
        SELECT
            COALESCE(NULLIF(documentos.doc_estado, ''), documentos.doc_temporal) AS doc_tabla,
            documentos.doc_id, 
            documentos.doc_fechareg, 
            documentos.doc_url, 
            (
                SELECT cat_nombre 
                FROM catalogo 
                WHERE cat_id = 
                    CASE 
                        WHEN documentos.doc_estado IS NOT NULL AND documentos.doc_estado != '' THEN documentos.doc_estado
                        ELSE documentos.doc_temporal
                    END
            ) as doc_estado,
            documentos.doc_descripcion, 
            COALESCE(
                (
                    SELECT cat_nombre 
                    FROM catalogo
                    INNER JOIN proceso ON catalogo.cat_id = proceso.cat_id_proceso
                    INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
                    WHERE tramite_solicitante.doc_id = documentos.doc_id
                    ORDER BY proceso.cat_id_proceso DESC LIMIT 1
                ),
                (
                    SELECT cat_nombre 
                    FROM catalogo 
                    WHERE cat_id = 31 LIMIT 1
                )
            ) as doc_gestor,
            tramite_solicitante.tra_pro
        FROM documentos
        JOIN tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
        JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
        LEFT JOIN proceso ON tramite_solicitante.tra_id = proceso.tra_id  
        WHERE solicitante.sol_identificacion = id
        and documentos.doc_nombre = nombre;
        
    elseif op = 'listGestor' then
    SELECT DISTINCT
            COALESCE(NULLIF(documentos.doc_estado, ''), documentos.doc_temporal) AS doc_tabla,
            documentos.doc_id, 
            documentos.doc_fechareg, 
            documentos.doc_url, 
            (
                SELECT cat_nombre 
                FROM catalogo 
                WHERE cat_id = 
                    CASE 
                        WHEN documentos.doc_estado IS NOT NULL AND documentos.doc_estado != '' THEN documentos.doc_estado
                        ELSE documentos.doc_temporal
                    END
            ) as doc_estado,
            documentos.doc_descripcion, 
            COALESCE(
                (
                    SELECT cat_nombre 
                    FROM catalogo
                    INNER JOIN proceso ON catalogo.cat_id = proceso.cat_id_proceso
                    INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
                    WHERE tramite_solicitante.doc_id = documentos.doc_id
                    ORDER BY proceso.cat_id_proceso DESC LIMIT 1
                ),
                (
                    SELECT cat_nombre 
                    FROM catalogo 
                    WHERE cat_id = 31 LIMIT 1
                )
            ) as doc_gestor,
            tramite_solicitante.tra_pro
        FROM documentos
        JOIN tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
        JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
        LEFT JOIN proceso ON tramite_solicitante.tra_id = proceso.tra_id  
        WHERE solicitante.sol_identificacion = id
        and documentos.doc_nombre = nombre;

    elseif op='ing' then
        INSERT INTO `documentos`
        (`cat_id_tipodoc`,`doc_nombre`,`doc_url`,`doc_fechareg`)
        VALUES
        (tipodoc,nombre,url,now());

        SELECT LAST_INSERT_ID() AS insertedId;

    elseif op='ingGestor' then
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
        SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url
        FROM documentos d
        INNER JOIN tramite_solicitante ts ON d.doc_id = ts.doc_id
        INNER JOIN solicitante s ON ts.sol_id = s.sol_id
        WHERE s.sol_identificacion = nombre and doc_estado=26;

    elseif op = 'notify' then
        SELECT DISTINCT
    documentos.doc_id, 
    documentos.doc_fechareg, 
    documentos.doc_url, 
    (
        SELECT cat_nombre 
        FROM catalogo 
        WHERE cat_id = 
            CASE 
                WHEN documentos.doc_estado IS NOT NULL AND documentos.doc_estado != '' THEN documentos.doc_estado
                ELSE documentos.doc_temporal
            END
    ) AS doc_estado,
    documentos.doc_descripcion, 
    CASE 
        WHEN proceso.cat_id_proceso IS NULL THEN (SELECT cat_nombre FROM catalogo WHERE cat_id = 31)
        ELSE (SELECT cat_nombre FROM catalogo WHERE documentos.doc_estado = catalogo.cat_id)
    END AS doc_gestor,
    SUBSTRING_INDEX(documentos.doc_nombre, '-', 1) AS doc_nombre
FROM 
    documentos
JOIN 
    tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
JOIN 
    solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
LEFT JOIN 
    proceso ON tramite_solicitante.tra_id = proceso.tra_id 
WHERE 
    solicitante.sol_identificacion = id
    AND documentos.cat_id_tipodoc IN (14, 17, 21);

    elseif op = 'prosol' then 
        SELECT MAX(ts.tra_pro) as tra_pro
        FROM tramite_solicitante ts
        WHERE ts.sol_id = id;

    elseif op = 'compDoc' then
        SELECT COUNT(*) AS count_id
        FROM documentos doc
        JOIN tramite_solicitante tra_sol ON doc.doc_id = tra_sol.doc_id
        WHERE doc.doc_nombre = nombre
        AND tra_sol.tra_pro = id;

    elseif op = 'profin' then
        SELECT s.sol_nombre, ts.tra_pro, MAX(p.pro_fechafin) as pro_fechafin
        FROM solicitante s
        INNER JOIN tramite_solicitante ts on ts.sol_id = s.sol_id
        INNER JOIN proceso p on p.tra_id = ts.tra_id
        WHERE s.sol_identificacion = id
        GROUP BY s.sol_nombre, ts.tra_pro;
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
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
            elseif op= 2 then
    DELETE FROM usuario_permiso WHERE usu_id = usuario;
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertausuario`(in op int, in nombres varchar(100),in cedula varchar(10), in telefono varchar(10),in correo varchar(100), in cargo varchar(100), 
in login varchar(100), in clave varchar(200))
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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inspeccion`(
    IN op VARCHAR(100),
    IN id INT,
    IN usuario INT,
    IN tramite INT,
    IN estado INT,
    IN observacion VARCHAR(200)
)
BEGIN
    DECLARE ultimo_proceso_id INT;

    IF op = 'list' THEN
SELECT
    solicitante.sol_identificacion AS s_ident,
    solicitante.sol_identificacion,
    solicitante.sol_nombre,
    solicitante.sol_telefono,
    proceso.cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = solicitante.cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = solicitante.cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = solicitante.cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = solicitante.cat_id_sector), 2))
        ),
        ', ',
        COALESCE(solicitante.sol_direccion, '')
    ) AS sol_direccion,
    documentos.doc_estado
FROM
    proceso
INNER JOIN
    tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN
    solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN
    documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE
    documentos.doc_estado = 0
    AND proceso.cat_id_proceso = 22
    AND proceso.pro_id = (
        SELECT
            MAX(p2.pro_id)
        FROM
            proceso AS p2
        WHERE
            p2.tra_id = proceso.tra_id
    )
    AND documentos.cat_id_tipodoc = 17;
    
    ELSEIF op = 'listInspCat' THEN
SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_temporal = 0
    AND proceso.cat_id_proceso = 22
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );
    
    elseif op = 'listGestor' then
    SELECT DISTINCT
            COALESCE(NULLIF(documentos.doc_estado, ''), documentos.doc_temporal) AS doc_tabla,
            documentos.doc_id, 
            documentos.doc_fechareg, 
            documentos.doc_url, 
            (
                SELECT cat_nombre 
                FROM catalogo 
                WHERE cat_id = 
                    CASE 
                        WHEN documentos.doc_estado IS NOT NULL AND documentos.doc_estado != '' THEN documentos.doc_estado
                        ELSE documentos.doc_temporal
                    END
            ) as doc_estado,
            documentos.doc_descripcion, 
            COALESCE(
                (
                    SELECT cat_nombre 
                    FROM catalogo
                    INNER JOIN proceso ON catalogo.cat_id = 20
                    INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
                    WHERE tramite_solicitante.doc_id = documentos.doc_id
                    ORDER BY proceso.cat_id_proceso DESC LIMIT 1
                ),
                (
                    SELECT cat_nombre 
                    FROM catalogo 
                    WHERE cat_id = 31 LIMIT 1
                )
            ) as doc_gestor,
            tramite_solicitante.tra_pro
        FROM documentos
        JOIN tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
        JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
        LEFT JOIN proceso ON tramite_solicitante.tra_id = proceso.tra_id  
        WHERE solicitante.sol_identificacion = id
        and documentos.doc_nombre = observacion;

    elseif op = 'mos' THEN

        SELECT tra_id, sol_nombre, doc_url, sol_identificacion
        FROM tramite_solicitante, documentos, solicitante
        WHERE tramite_solicitante.sol_id = solicitante.sol_id
            AND tramite_solicitante.doc_id = documentos.doc_id
            AND tra_id = id;

    elseif op = 'listedi' THEN

        SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url
        FROM tramite_solicitante ts
        JOIN solicitante s ON ts.sol_id = s.sol_id
        JOIN documentos d ON ts.doc_id = d.doc_id
        WHERE s.sol_identificacion = tramite
			AND d.cat_id_tipodoc = (SELECT cat_id FROM catalogo WHERE cat_nombre = 'PLANIMETRICO')
            AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);
    END IF;

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
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_logeo`(in op varchar(100),in usuario varchar(50), in clave varchar(100))
BEGIN
    if op='usu' then
SELECT usu_id,usu_cedula,usu_nombre,usu_correo,usu_telefono,usu_cargo,usu_login,usu_clave,usu_condicion 
FROM usuario 
WHERE usu_login=usuario AND usu_clave=clave AND usu_condicion='1';
elseif op='sol' then
SELECT 
    sol.sol_id,
    sol.cat_id_identificacion,
    sol.sol_identificacion,
    sol.sol_nombre,
    sol.sol_telefono,
    sol.sol_direccion,
    sol.cat_id_provincia,
    sol.cat_id_canton,
    sol.cat_id_parroquia,
    sol.cat_id_sector,
    sol.sol_clave,
    sol.sol_fechareg,
    sol.sol_estado,
    COALESCE((SELECT MAX(tra_pro) + 1 FROM tramite_solicitante WHERE sol_id = sol.sol_id), 1) as tra_pro
FROM 
    solicitante sol
WHERE 
    sol.sol_identificacion = usuario 
    AND sol.sol_clave = clave 
    AND sol.sol_estado = 1;
end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_perfeccionamiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_perfeccionamiento`(
    IN op VARCHAR(100),
    IN id INT,
    IN usuario INT,
    IN tramite INT,
    IN estado INT,
    IN observacion VARCHAR(200)
)
BEGIN
    DECLARE ultimo_proceso_id INT;

    IF op = 'list' THEN
        SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_estado = 0
    AND proceso.cat_id_proceso = 24
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );

    elseif op = 'mos' THEN

        SELECT tra_id, sol_nombre, doc_url, sol_identificacion
        FROM tramite_solicitante, documentos, solicitante
        WHERE tramite_solicitante.sol_id = solicitante.sol_id
            AND tramite_solicitante.doc_id = documentos.doc_id
            AND tra_id = id;

    elseif op = 'listedi' THEN

        SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url
        FROM tramite_solicitante ts
        JOIN solicitante s ON ts.sol_id = s.sol_id
        JOIN documentos d ON ts.doc_id = d.doc_id
        WHERE s.sol_identificacion = tramite
            AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);
    END IF;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procesos`(
    IN op VARCHAR(20),
    IN id INT,
    IN usuario INT,
    IN tramite INT,
    IN estado INT,
    IN observacion VARCHAR(200)
)
BEGIN
    DECLARE ultimo_proceso_id INT;
    DECLARE fecha_ini DATETIME;
    DECLARE cat_id_estado INT;
    DECLARE pro_observacion VARCHAR(200);
    DECLARE tramite_actual INT;
    DECLARE cat_id_actual INT;
    DECLARE ultimo_cat_proceso INT;

    IF op = 'list' THEN
        SELECT pro_id, sol_nombre, sol_telefono, sol_direccion
        FROM proceso
        INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
        INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
        WHERE cat_id_proceso = 20 AND pro_estado = 18;
        
    ELSEIF op = 'listafin' THEN
        SELECT
            ts.tra_pro,
            s.sol_nombre,
            ts.tra_pro AS tra_profin,
            MAX(p.pro_fecha) AS pro_fechafin
        FROM 
            tramite_solicitante ts
        INNER JOIN solicitante s ON s.sol_id = ts.sol_id
        INNER JOIN proceso p ON p.tra_id = ts.tra_id
        INNER JOIN documentos d ON d.doc_id = ts.doc_id
        WHERE 
            d.doc_temporal = 36
            AND s.sol_id = id 
        GROUP BY
            ts.tra_pro, s.sol_nombre;   
 
    ELSEIF op = 'mos' THEN
        SELECT pro_id, proceso.tra_id, sol_nombre
        FROM proceso
        INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
        INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id WHERE pro_id = 1;
        
    ELSEIF op = 'ven' THEN
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        -- Insertar en la tabla proceso
        INSERT INTO `proceso` (`usu_id`, `tra_id`, `cat_id_estado`, `cat_id_proceso`, `pro_observacion`, `pro_fecha`, `pro_trasabilidad`)
        VALUES (usuario, tramite_actual, 18, 20, '', NOW(), 0);

        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_estado = 26, doc_temporal = 0
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);    

    ELSEIF op = 'cat' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'CATASTROS';
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite_actual;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite_actual AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario, tramite_actual, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 26, doc_estado = 0
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);
        
    ELSEIF op = 'catCheck' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'INSPECCION';
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario,tramite, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 0, doc_estado = 26
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);
        
   ELSEIF op = 'catIns' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'PROVIDENCIA';
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite_actual;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite_actual AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario, tramite_actual, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 26, doc_estado = 0
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);     
        
    ELSEIF op = 'insp' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'INSPECCION';
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite_actual;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite_actual AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario, tramite_actual, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 0, doc_estado = 26
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);
        
    ELSEIF op = 'inspCatastro' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'PROVIDENCIA';
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario,tramite, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 26, doc_estado = 0
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);    
        
    ELSEIF op = 'prov' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'PERFECCIONAMIENTO DE PROVIDENCIA';
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite_actual;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite_actual AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario, tramite_actual, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 26, doc_estado = 0
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);
        
	ELSEIF op = 'perfp' THEN
        SELECT cat_id INTO cat_id_actual FROM catalogo WHERE cat_nombre = 'FINALIZADO';
        SELECT tra_id INTO tramite_actual FROM tramite_solicitante WHERE tra_iden = tramite LIMIT 1;
        SELECT MAX(cat_id_proceso) INTO ultimo_cat_proceso FROM proceso WHERE tra_id = tramite_actual;
        SELECT MAX(pro_id) INTO ultimo_proceso_id FROM proceso WHERE tra_id = tramite_actual AND cat_id_proceso = ultimo_cat_proceso;
        SELECT pro_fecha INTO fecha_ini FROM proceso WHERE pro_id = ultimo_proceso_id;
        
        -- Insertar un nuevo registro
        INSERT INTO proceso (usu_id, tra_id, cat_id_estado, cat_id_proceso, pro_observacion, pro_fecha, pro_fechafin, pro_trasabilidad)
        VALUES (usuario, tramite_actual, 18, cat_id_actual, observacion, fecha_ini, NOW(), ultimo_proceso_id);
        
        -- Actualizar el doc_estado a para todos los doc_id asociados al tra_id
        UPDATE documentos
        SET doc_temporal = 36, doc_estado = 36
        WHERE doc_id IN (SELECT t1.doc_id FROM tramite_solicitante t1 WHERE t1.tra_id = tramite_actual);

    ELSEIF op = 'docVen' THEN
        -- Actualizar el registro en documentos
        UPDATE documentos
        SET doc_descripcion = observacion, doc_temporal = estado
        WHERE doc_id = (SELECT doc_id FROM tramite_solicitante WHERE tra_iden = tramite);
        
        -- Obtener los valores actualizados
        SELECT doc_temporal, doc_descripcion INTO cat_id_estado, pro_observacion
        FROM documentos
        WHERE doc_id = (SELECT doc_id FROM tramite_solicitante WHERE tra_iden = tramite);

        -- Devolver los datos actualizados como un JSON
        SELECT JSON_OBJECT('cat_id_estado', cat_id_estado, 'pro_observacion', pro_observacion);
        
    ELSEIF op = 'doc' THEN
        -- Actualizar el registro en documentos
        UPDATE documentos
        SET doc_descripcion = observacion, doc_estado = estado, doc_temporal = 0
        WHERE doc_id = (SELECT doc_id FROM tramite_solicitante WHERE tra_iden = tramite);
        
        -- Obtener los valores actualizados
        SELECT doc_estado, doc_descripcion INTO cat_id_estado, pro_observacion
        FROM documentos
        WHERE doc_id = (SELECT doc_id FROM tramite_solicitante WHERE tra_iden = tramite);

        -- Devolver los datos actualizados como un JSON
        SELECT JSON_OBJECT('cat_id_estado', cat_id_estado, 'pro_observacion', pro_observacion);

    ELSEIF op = 'ins' THEN
        INSERT INTO `proceso`
        (`usu_id`, `tra_id`, `cat_id_estado`, `cat_id_proceso`, `pro_observacion`, `pro_fecha`, `pro_trasabilidad`)
        VALUES
        (usuario, tramite, estado, 22, observacion, NOW(), LAST_INSERT_ID());

    ELSEIF op = 'prov' THEN
    
        INSERT INTO `proceso`
        (`usu_id`, `tra_id`, `cat_id_estado`, `cat_id_proceso`, `pro_observacion`, `pro_fecha`, `pro_trasabilidad`)
        VALUES
        (usuario, tramite, estado, 23, observacion, NOW(), LAST_INSERT_ID());

    ELSEIF op = 'profin' THEN
        SELECT DISTINCT
            documentos.doc_nombre,
            documentos.doc_fechareg, 
            documentos.doc_url, 
            COALESCE(catalogo.cat_nombre, catalogo_temporal.cat_nombre) AS doc_estado,
            tramite_solicitante.tra_pro
        FROM documentos
        JOIN tramite_solicitante ON documentos.doc_id = tramite_solicitante.doc_id
        JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id
        LEFT JOIN catalogo ON documentos.doc_estado = catalogo.cat_id
        LEFT JOIN catalogo catalogo_temporal ON documentos.doc_temporal = catalogo_temporal.cat_id
        WHERE solicitante.sol_identificacion = observacion
            AND (documentos.doc_temporal = 36 OR documentos.doc_estado = 36)
            AND tramite_solicitante.tra_pro = tramite;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_providencia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_providencia`(
    IN op VARCHAR(100),
    IN id INT,
    IN usuario INT,
    IN tramite INT,
    IN estado INT,
    IN observacion VARCHAR(200)
)
BEGIN
    DECLARE ultimo_proceso_id INT;

    IF op = 'list' THEN
       SELECT DISTINCT
    solicitante.sol_identificacion AS s_ident,
    sol_identificacion,
    sol_nombre,
    sol_telefono,
    cat_id_proceso,
    CONCAT(
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_canton), 2))
        ),
        ', ',
        CONCAT(
            UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 1, 1)),
            LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = cat_id_sector), 2))
        ),
        ', ',
        COALESCE(sol_direccion, '')
    ) AS sol_direccion
FROM proceso
INNER JOIN tramite_solicitante ON proceso.tra_id = tramite_solicitante.tra_id
INNER JOIN solicitante ON tramite_solicitante.sol_id = solicitante.sol_id 
INNER JOIN documentos ON tramite_solicitante.doc_id = documentos.doc_id  
WHERE documentos.doc_estado = 0
    AND proceso.cat_id_proceso = 23
    AND proceso.pro_id = (
        SELECT MAX(p2.pro_id)
        FROM proceso AS p2
        WHERE p2.tra_id = proceso.tra_id
    );

    elseif op = 'mos' THEN

        SELECT tra_id, sol_nombre, doc_url, sol_identificacion
        FROM tramite_solicitante, documentos, solicitante
        WHERE tramite_solicitante.sol_id = solicitante.sol_id
            AND tramite_solicitante.doc_id = documentos.doc_id
            AND tra_id = id;

    elseif op = 'listedi' THEN

        SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url
        FROM tramite_solicitante ts
        JOIN solicitante s ON ts.sol_id = s.sol_id
        JOIN documentos d ON ts.doc_id = d.doc_id
        WHERE s.sol_identificacion = tramite
            AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);
    END IF;

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

elseif op = 'id' then 
SELECT sol_id FROM solicitante WHERE sol_identificacion  = numiden;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tramites`(IN op VARCHAR(45), IN solicitante INT, IN documento INT)
BEGIN
    DECLARE tra_id_val INT;
    DECLARE tra_pro_val INT;
    DECLARE doc_estado_val INT;
    DECLARE doc_temporal_val INT;
    DECLARE next_tra_id INT;

    -- Obtener tra_id existente y tra_pro actual para el sol_id dado
    SELECT tra_id, tra_pro INTO tra_id_val, tra_pro_val
    FROM tramite_solicitante
    WHERE sol_id = solicitante
    ORDER BY tra_id DESC
    LIMIT 1;

    -- Obtener el mínimo doc_estado para el sol_id dado
    SELECT MIN(doc_estado), min(doc_temporal)
    INTO doc_estado_val, doc_temporal_val
    FROM documentos d
    INNER JOIN tramite_solicitante ts ON ts.doc_id = d.doc_id
    WHERE ts.sol_id = solicitante
     ORDER BY ts.tra_id
    LIMIT 1;

    -- Si no hay tra_id para ese sol_id, asignar el máximo tra_id + 1
    IF tra_id_val IS NULL THEN
        SELECT COALESCE(MAX(tra_id), 0) + 1 INTO tra_id_val
        FROM tramite_solicitante;
    END IF;

    -- Si no hay tra_pro_val, asignar el valor inicial
    IF tra_pro_val IS NULL THEN
        SET tra_pro_val = 1;
    END IF;

    IF op = 'ing' THEN
        -- Verificar si hay cambio de proceso
        IF doc_estado_val = 36 or doc_temporal_val = 36 THEN
            -- Verificar si tra_pro_val ya se incrementó en un proceso anterior
                SET tra_pro_val = tra_pro_val + 1;
        END IF;

        -- Obtener el nuevo valor de tra_id (max + 1) solo si hay un cambio de proceso
        IF doc_estado_val = 36  OR tra_id_val IS NULL THEN
            SELECT COALESCE(MAX(tra_id), 0) + 1 INTO next_tra_id
            FROM tramite_solicitante;
        ELSE
            SET next_tra_id = tra_id_val;
        END IF;

        INSERT INTO tramite_solicitante (tra_id, sol_id, doc_id, trasol_fecha, tra_pro)
        VALUES (next_tra_id, solicitante, documento, NOW(), tra_pro_val);
		-- Actualizar las variables de tra_id y tra_pro solo si hubo un cambio de proceso
		IF doc_estado_val = 36 OR doc_temporal_val = 36 THEN
			SET tra_id_val = next_tra_id;
			SET tra_pro_val = tra_pro_val + 1;
			END IF;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_tramite_actual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tramite_actual`(
    IN p_sol_id INT, identificacion VARCHAR(15)
)
BEGIN
    DECLARE max_tra_pro INT;
    DECLARE max_tra_id INT;
    DECLARE doc_count INT;

   -- Obtener el valor máximo actual de tra_pro y el tra_id correspondiente
SELECT MAX(ts.tra_pro) AS max_tra_pro, MAX(ts.tra_id) AS max_tra_id
INTO max_tra_pro, max_tra_id
FROM tramite_solicitante ts
WHERE ts.sol_id = p_sol_id;

 -- Si no se encontraron registros con sol_id, intenta buscar con sol_identificacion
    IF max_tra_pro IS NULL THEN
        SELECT MAX(ts.tra_pro) AS max_tra_pro, MAX(ts.tra_id) AS max_tra_id
        INTO max_tra_pro, max_tra_id
        FROM tramite_solicitante ts
        JOIN solicitante s ON ts.sol_id = s.sol_id
        WHERE s.sol_identificacion = identificacion;
    END IF;

-- Verificar cuántos documentos existen con doc_estado o doc_temporal igual a 36
SELECT COUNT(*)
INTO doc_count
FROM documentos d
JOIN tramite_solicitante ts ON d.doc_id = ts.doc_id
WHERE (d.doc_estado = 36 OR d.doc_temporal = 36) AND ts.tra_id = max_tra_id;

-- Incrementar tra_pro en 1 solo si hay un documento con 36 y max_tra_id es 36
IF doc_count > 0 THEN
    SET max_tra_pro = max_tra_pro + 1;
END IF;

-- Devolver el valor ajustado de tra_pro
SELECT max_tra_pro AS tra_pro, max_tra_id as tra_id;

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
SELECT DISTINCT
    s.sol_identificacion as s_ident,
    s.sol_identificacion,
    s.sol_nombre,
    s.sol_telefono, 
    CONCAT(
        CONCAT(UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_canton), 1, 1)), LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_canton), 2))),
        ', ',
        CONCAT(UPPER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_sector), 1, 1)), LOWER(SUBSTRING((SELECT cat_nombre FROM catalogo WHERE cat_id = s.cat_id_sector), 2))),
        ', ',
        COALESCE(s.sol_direccion, '')
    ) AS sol_direccion
FROM tramite_solicitante t1
LEFT JOIN tramite_solicitante t2 ON t1.sol_id = t2.sol_id AND t1.tra_id < t2.tra_id
LEFT JOIN tramite_solicitante t3 ON t1.sol_id = t3.sol_id AND t1.tra_id < t3.tra_id AND t2.tra_id < t3.tra_id
LEFT JOIN documentos d ON d.doc_id = t1.doc_id
LEFT JOIN solicitante s ON s.sol_id = t1.sol_id
LEFT JOIN proceso p ON p.tra_id = t1.tra_id
WHERE t2.tra_id IS NULL 
    AND t3.tra_id IS NULL 
    AND (d.doc_estado IS NULL OR d.doc_estado = 0)
    AND p.tra_id IS NULL;
    
elseif op='listedi' then

SELECT ts.tra_iden, d.doc_nombre, d.doc_fechareg, d.doc_url 
FROM tramite_solicitante ts
JOIN solicitante s ON ts.sol_id = s.sol_id 
JOIN documentos d ON ts.doc_id = d.doc_id 
WHERE s.sol_identificacion = tramite
AND (d.doc_estado <> 36 OR d.doc_temporal <> 36);
    
elseif op='mos' then
	select tra_id, sol_nombre, doc_url, sol_identificacion 
    from tramite_solicitante,documentos, solicitante 
	where tramite_solicitante.sol_id=solicitante.sol_id 
    and tramite_solicitante.doc_id=documentos.doc_id 
    and tra_id=id
    and d.doc_estado = 26;

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

-- Dump completed on 2024-03-14  1:56:05
