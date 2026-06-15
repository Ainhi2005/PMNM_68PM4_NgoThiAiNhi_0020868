-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: 68pm34
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_sinhvien`
--

DROP TABLE IF EXISTS `tbl_sinhvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_sinhvien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sinhvien` varchar(255) NOT NULL,
  `giotinh` varchar(50) NOT NULL,
  `mssv` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sinhvien`
--

LOCK TABLES `tbl_sinhvien` WRITE;
/*!40000 ALTER TABLE `tbl_sinhvien` DISABLE KEYS */;
INSERT INTO `tbl_sinhvien` VALUES (1,'Nguyễn Thị Ái Nhi','Nữ','20050868'),(2,'Nguyễn Văn A','Nam','20050001'),(3,'Trần Thị B','Nữ','20050002'),(4,'Lê Văn C','Nam','20050003'),(5,'Phạm Thị D','Nữ','20050004'),(6,'Hoàng Văn E','Nam','20050005'),(7,'Đỗ Thị F','Nữ','20050006'),(8,'Vũ Văn G','Nam','20050007'),(9,'Bùi Thị H','Nam','20050008'),(11,'Trịnh Thị K','Nữ','20050010'),(12,'Phan Văn L','Nam','20050011'),(13,'Lý Thị M','Nữ','20050012'),(14,'Đặng Văn N','Nam','20050013'),(15,'Mai Thị O','Nữ','20050014'),(16,'Trần Văn P','Nam','20050015'),(17,'Nguyễn Thị Q','Nữ','20050016'),(18,'Lê Văn R','Nam','20050017'),(19,'Phạm Thị S','Nữ','20050018'),(20,'Hoàng Văn T','Nam','20050019'),(21,'Đỗ Thị U','Nữ','20050020'),(22,'Vũ Văn V','Nam','20050021'),(23,'Bùi Thị X','Nữ','20050022'),(24,'Nguyễn Gia Huy','68PM4','0020868'),(25,'Hà Ngọc Mai','Nữ','0017568'),(26,'nhi','nữ','0020858');
/*!40000 ALTER TABLE `tbl_sinhvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database '68pm34'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-12 13:03:58
