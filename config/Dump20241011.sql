CREATE DATABASE  IF NOT EXISTS `billigkjop`
USE `billigkjop`;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE `enderecos` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  UNIQUE KEY `cep` (`cep`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
INSERT INTO `enderecos` VALUES (1,'68904-386','teste',12,'Macapá','Amapá','Brasil');
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `preco` float DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_usuario_FK` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
INSERT INTO `produtos` VALUES (1,'Prato',45.99,NULL,1),(2,'Gabriel Mocellin',25,NULL,1),(3,'Gabriel Mocellin',25,NULL,1),(4,'Bariatrica',1500,NULL,1),(5,'GabrielMocel in',1000000,NULL,1),(6,'Ferrari',7000000,NULL,1),(7,'Bola de ping pong',12.32,NULL,1),(8,'Carteira',29.99,'Carteira de couro com 4 espaços para cartão',5);
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo` int NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
INSERT INTO `tipo_usuario` VALUES (1,'Cliente'),(2,'Vendedor');
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
INSERT INTO `usuario` VALUES (5,'guga@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$T2l2aDRXSjhFbWFwdW93bw$qviRQ+ZxAYx8RLI3PdeX65RDMNpWB/xPZhn7jI6ym5A','Gustavo','pasta/twitter.jpg',2),(6,'admintf@admin','$argon2id$v=19$m=65536,t=4,p=1$ZnM3QkIzVXZ3MEpndWFueg$lN3HNQHuvRKdPr/dKw71wExH+kRMlletWP8XJMlveEo','Gustavo','pasta/twitter.jpg',1),(7,'ana@ana.com','$argon2id$v=19$m=65536,t=4,p=1$blV1MXhzWi9EVjM1am9SLg$L3Jqtqucqe9SmlcapNB2p09WBBlUSXuW3vWnNW3mHgc','Ana','pasta/twitter.jpg',1),(8,'blue@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cjdIMnFFdW5sQ2JlMEE2Sw$kC/qA7jr4KRmRye/jG7Dzzpbv8EFdHztOXsMrEqJ14I','blue','pasta/twitter.jpg',1),(10,'Celenio@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YVM5VXRtc0JnL2dJRHg3dg$8aK4qkjDganviSJ2Wxg6DTNms2To48G8Nb/LwFlqouQ','Celeio','pasta/twitter.jpg',1),(16,'gb@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YkRXVVVmbGV5U1F0Q0hxZw$U/hXd7+/rPrVlSV9sw1lhuMUwjzmE7M2tddkInfh7O4','Gabriel Mocellin','pasta/twitter.jpg',1),(17,'Satoru@jjk.com','$argon2id$v=19$m=65536,t=4,p=1$dVhGMmJJWW1vVUFBRy84Zg$VUooV0gpp270EGJA0oXIiyW51xQ95zrHgt9a49NVEyk','Gojo','pasta/twitter.jpg',1),(18,'Satoru@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dDNSQWVaRUFVL1FNdTF3cw$6tcU7oNWd3iPUb2JFpKsFwVn4LKO69hM767qW8FEaHc','Satoru Gojo','pasta/twitter.jpg',1),(19,'jose@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$LzhZZDRncm5xTjNIekdzbA$qEQ/9sX80dQ39IUCY9IpG5GB89TrAokI8QnLTcSs8LI','jose','pasta/twitter.jpg',1),(21,'Alfonso@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cVRSRkpieFduV1NiNE9aMw$NcZVzjW8C3fLoHbBBBlxSZdcw97ILWvHHd5mT1NPjy8','Alfonso','pasta/twitter.jpg',1),(22,'diogo@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$WThaUjNzNURmdTR3YnNIdw$5+ckzEHN2p6gmwxPmwDD7PFHS051NtR7L7Ss6n5XMrc','Diogo','pasta/twitter.jpg',1),(23,'john@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$bEhGeEc1Rk5CcmdnTjE0Rg$JMmv5oLv3v2hrf8KCjitKoWs/8PsJGDMJHsN/q7dKso','John','pasta/twitter.jpg',1),(24,'juan@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dmgzaVlCNUpZbW1CNWoyOQ$bUdQAtHmCMK0YTclrMXu2VZFhJvlXSLRgbk4Yn12sG8','juan','pasta/twitter.jpg',1),(25,'caprioli@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Q0xVWVhSQU12bzZFRGlWQQ$ZYxR2hEZRZgLgTVg63WXHs6mZPkHCJsSPvt1iIh6iWA','vittorio','pasta/twitter.jpg',1),(26,'marciano@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$bWhwOGYuR1pTbkZUVXd6YQ$5NNa3YEr+Yc+0Fg8gLPmNz602ThrSKX4CfhSCqdawKo','Marciano','pasta/twitter.jpg',1),(29,'Marcelao@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$RHVJVHF5VmlYUzdkZlV2Zw$Zkcjv0vIzMSZakSR+5nGwo94zy8TSKeMZOsfG/4ONSU','Marcelo','pasta/twitter.jpg',1),(30,'Roberto@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$bmhPeDdvRmNVdE9SVFJlcw$tQQ1A23FEw8ajmZPeMfM2HKEwg1ino9eLsmxPAA014s','Roberto','pasta/twitter.jpg',1),(31,'Robertolas@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$UFZ1Z2NPRmIuZ2l4S1VZVg$VFNJezNVLhailiNSPIZDdiMW669QUuD6ChBHqeiKnc4','Robertolas','pasta/twitter.jpg',1),(32,'Robertolasao@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$ZGdndnpGMEJuZDNlWmRSVQ$zHgaGblnya3Hv7TV6Qo5hCtzoOWgB+nzaWEzAROzOZo','Robertolasao','pasta/twitter.jpg',1),(34,'Jorginho@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$blJDaGkyWjR1Vm5mYmtZaA$8G7G5F4+/kKkDySXHu2ley1LXfLRHGMxsUoAPL7z8JI','Jorge','pasta/twitter.jpg',1),(35,'luquinhasgameplay@hotmail.com','$argon2id$v=19$m=65536,t=4,p=1$anMxS1ZoWTN5RlMxYXgwdw$RzzZ/4Lo7uxq1vDZGEFGulAd++0Z4v2+HF39IoTlSVo','Lucas','pasta/twitter.jpg',1),(36,'jeffinho@hotmail.com','$argon2id$v=19$m=65536,t=4,p=1$SXM5ekEyeG1Yb21zaS45MQ$GRVv9DD+XynRKKxk5IGQ7bXpWuUm2fJRxxV1s+nh9c4','jeff','pasta/twitter.jpg',1);
UNLOCK TABLES;

--
-- Table structure for table `usuario_endereco`
--

DROP TABLE IF EXISTS `usuario_endereco`;

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

--
-- Dumping data for table `usuario_endereco`
--

LOCK TABLES `usuario_endereco` WRITE;
UNLOCK TABLES;

-- Dump completed on 2024-10-11  8:29:51
