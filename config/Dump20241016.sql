-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: billigkjop
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (11,'81920-680','dsad',0,'dsdsa','Amapá','Brasil','sada');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `preco` float DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_usuario_FK` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Prato',45.99,NULL,1),(2,'Gabriel Mocellin',25,NULL,1),(3,'Gabriel Mocellin',25,NULL,1),(4,'Bariatrica',1500,NULL,1),(5,'GabrielMocel in',1000000,NULL,1),(6,'Ferrari',7000000,NULL,1),(7,'Bola de ping pong',12.32,NULL,1),(8,'Carteira',29.99,'Carteira de couro com 4 espaços para cartão',5),(9,'Carteira',22,'Branca',1),(10,'Botas',52,'Botas de Couro',40),(11,'Botas',52,'Botas de Couro',40),(12,'Meia',90,'Botas de Couro',40);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo` int NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Cliente'),(2,'Vendedor');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `id_tipo_usuario_FK` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `id_tipo_usuario_FK` (`id_tipo_usuario_FK`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario_FK`) REFERENCES `tipo_usuario` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (5,'guga@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$T2l2aDRXSjhFbWFwdW93bw$qviRQ+ZxAYx8RLI3PdeX65RDMNpWB/xPZhn7jI6ym5A','Gustavo','pasta/twitter.jpg',2),(6,'admintf@admin','$argon2id$v=19$m=65536,t=4,p=1$ZnM3QkIzVXZ3MEpndWFueg$lN3HNQHuvRKdPr/dKw71wExH+kRMlletWP8XJMlveEo','Gustavo','pasta/twitter.jpg',2),(7,'ana@ana.com','$argon2id$v=19$m=65536,t=4,p=1$blV1MXhzWi9EVjM1am9SLg$L3Jqtqucqe9SmlcapNB2p09WBBlUSXuW3vWnNW3mHgc','Ana','pasta/twitter.jpg',1),(8,'blue@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cjdIMnFFdW5sQ2JlMEE2Sw$kC/qA7jr4KRmRye/jG7Dzzpbv8EFdHztOXsMrEqJ14I','blue','pasta/twitter.jpg',1),(10,'Celenio@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YVM5VXRtc0JnL2dJRHg3dg$8aK4qkjDganviSJ2Wxg6DTNms2To48G8Nb/LwFlqouQ','Celeio','pasta/twitter.jpg',1),(16,'gb@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YkRXVVVmbGV5U1F0Q0hxZw$U/hXd7+/rPrVlSV9sw1lhuMUwjzmE7M2tddkInfh7O4','Gabriel Mocellin','pasta/twitter.jpg',1),(18,'Satoru@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dDNSQWVaRUFVL1FNdTF3cw$6tcU7oNWd3iPUb2JFpKsFwVn4LKO69hM767qW8FEaHc','Satoru Gojo','pasta/twitter.jpg',1),(21,'Alfonso@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cVRSRkpieFduV1NiNE9aMw$NcZVzjW8C3fLoHbBBBlxSZdcw97ILWvHHd5mT1NPjy8','Alfonso','pasta/twitter.jpg',1),(22,'diogo@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$WThaUjNzNURmdTR3YnNIdw$5+ckzEHN2p6gmwxPmwDD7PFHS051NtR7L7Ss6n5XMrc','Diogo','pasta/twitter.jpg',1),(23,'john@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$bEhGeEc1Rk5CcmdnTjE0Rg$JMmv5oLv3v2hrf8KCjitKoWs/8PsJGDMJHsN/q7dKso','John','pasta/twitter.jpg',1),(24,'juan@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dmgzaVlCNUpZbW1CNWoyOQ$bUdQAtHmCMK0YTclrMXu2VZFhJvlXSLRgbk4Yn12sG8','juan','pasta/twitter.jpg',1),(25,'caprioli@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Q0xVWVhSQU12bzZFRGlWQQ$ZYxR2hEZRZgLgTVg63WXHs6mZPkHCJsSPvt1iIh6iWA','vittorio','pasta/twitter.jpg',1),(26,'marciano@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$bWhwOGYuR1pTbkZUVXd6YQ$5NNa3YEr+Yc+0Fg8gLPmNz602ThrSKX4CfhSCqdawKo','Marciano','pasta/twitter.jpg',1),(31,'Robertolas@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$UFZ1Z2NPRmIuZ2l4S1VZVg$VFNJezNVLhailiNSPIZDdiMW669QUuD6ChBHqeiKnc4','Robertolas','pasta/twitter.jpg',1),(32,'Robertolasao@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$ZGdndnpGMEJuZDNlWmRSVQ$zHgaGblnya3Hv7TV6Qo5hCtzoOWgB+nzaWEzAROzOZo','Robertolasao','pasta/twitter.jpg',1),(35,'luquinhasgameplay@hotmail.com','$argon2id$v=19$m=65536,t=4,p=1$anMxS1ZoWTN5RlMxYXgwdw$RzzZ/4Lo7uxq1vDZGEFGulAd++0Z4v2+HF39IoTlSVo','luquinhas','pasta/twitter.jpg',1),(36,'jeffinho@hotmail.com','$argon2id$v=19$m=65536,t=4,p=1$SXM5ekEyeG1Yb21zaS45MQ$GRVv9DD+XynRKKxk5IGQ7bXpWuUm2fJRxxV1s+nh9c4','jeff','pasta/twitter.jpg',1),(40,'RockbellWendy@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$amZ5T2NqUEcxVXg5aGZVUg$8IPa444q3VuxuyAysp4ioPUxDLFbDn9sPpmstCazDsE','Wendy Rockbell','pasta/twitter.jpg',2),(42,'gb@gb.com','$argon2id$v=19$m=65536,t=4,p=1$b3FjTjFpSXd5SmUualdtQQ$cL7+rxI73dzPDzB8qC/EZRpiHjagQjcGNnBx+ecU5lI','Gabriel Mocellindo204','pasta/twitter.jpg',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_endereco`
--

DROP TABLE IF EXISTS `usuario_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_endereco` (
  `Id_endereco` int DEFAULT NULL,
  `Id_usuario` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `Id_endereco` (`Id_endereco`),
  KEY `Id_usuario` (`Id_usuario`),
  CONSTRAINT `usuario_endereco_ibfk_1` FOREIGN KEY (`Id_endereco`) REFERENCES `enderecos` (`id_endereco`),
  CONSTRAINT `usuario_endereco_ibfk_2` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_endereco`
--

LOCK TABLES `usuario_endereco` WRITE;
/*!40000 ALTER TABLE `usuario_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_endereco` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-16  9:53:03
