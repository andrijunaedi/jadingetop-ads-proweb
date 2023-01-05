-- MySQL dump 10.13  Distrib 8.0.30, for Linux (aarch64)
--
-- Host: localhost    Database: jadingetop_ads
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `billings`
--

DROP TABLE IF EXISTS `billings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `nominal` int NOT NULL,
  `status` enum('success','pending','cancel') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `billings_users_null_fk` (`user`),
  CONSTRAINT `billings_users_null_fk` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billings`
--

LOCK TABLES `billings` WRITE;
/*!40000 ALTER TABLE `billings` DISABLE KEYS */;
INSERT INTO `billings` VALUES (3,4,50000,'pending','2022-12-08 09:30:54','2022-12-08 09:30:52'),(4,4,100000000,'success','2022-12-08 09:31:18','2022-12-08 09:31:20'),(5,4,30000,'cancel','2022-12-08 09:31:32','2022-12-08 09:31:34');
/*!40000 ALTER TABLE `billings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devices_users_null_fk` (`user`),
  CONSTRAINT `devices_users_null_fk` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (1,2,'WarmingUP','CoWorkz Lt 4 - FIT','warmingup'),(2,2,'Koperasi GIAT','Depan Koperasi GIAT - FKB','koperasi-giat'),(3,2,'TULT Lobby','Lobby Depan - TULT','tult-lobby');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_balance`
--

DROP TABLE IF EXISTS `history_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_balance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `konten` int DEFAULT NULL,
  `device` int DEFAULT NULL,
  `type` enum('income','spending') NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `history_balance_devices_null_fk` (`device`),
  KEY `history_balance_konten_null_fk` (`konten`),
  KEY `history_balance_users_null_fk` (`user`),
  CONSTRAINT `history_balance_devices_null_fk` FOREIGN KEY (`device`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `history_balance_konten_null_fk` FOREIGN KEY (`konten`) REFERENCES `konten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `history_balance_users_null_fk` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_balance`
--

LOCK TABLES `history_balance` WRITE;
/*!40000 ALTER TABLE `history_balance` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konten`
--

DROP TABLE IF EXISTS `konten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `orientasi` enum('portrait','landscape') NOT NULL,
  `durasi` int NOT NULL,
  `user` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `konten_users_null_fk` (`user`),
  CONSTRAINT `konten_users_null_fk` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konten`
--

LOCK TABLES `konten` WRITE;
/*!40000 ALTER TABLE `konten` DISABLE KEYS */;
INSERT INTO `konten` VALUES (1,'Glico Haku - 1 Test','https://d1d8o7q9jg8pjk.cloudfront.net/p/lg_6302eeb4a78ef.jpg','https://d1d8o7q9jg8pjk.cloudfront.net/p/lg_6302eeb4a78ef.jpg','portrait',100,2),(2,'Promo Es.Teh','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','landscape',120,2),(7,'Promo Marjan x Hydro Coco','https://images.genpi.co/uploads/arsip/normal/2022/04/05/cek-promo-alfamidi-spesial-ramadan-harga-sirup-murah-banget-gsua.jpg','https://images.genpi.co/uploads/arsip/normal/2022/04/05/cek-promo-alfamidi-spesial-ramadan-harga-sirup-murah-banget-gsua.jpg','landscape',100,2),(22,'Test Promo - 1','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','portrait',100,2),(24,'Promo Marjan x Hydro Coco','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','portrait',100,2),(25,'Promo Marjan - Test 1','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','https://indopostnews.com/wp-content/uploads/2022/04/IMG-20220404-WA0001-800x445.jpg','landscape',100,2),(28,'Iphone 14 Pro with Dynamic Island','https://cdn.eraspace.com/pub/media/wysiwyg/teser-iphone-14/Rev/iPhone-14-pro---available---web-banner-mobile.jpg','https://cdn.eraspace.com/pub/media/wysiwyg/teser-iphone-14/Rev/iPhone-14-pro---available---web-banner-mobile.jpg','portrait',30,4);
/*!40000 ALTER TABLE `konten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konten_devices`
--

DROP TABLE IF EXISTS `konten_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konten_devices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `device` int DEFAULT NULL,
  `konten` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `konten_devices_devices_null_fk` (`device`),
  KEY `konten_devices_konten_null_fk` (`konten`),
  CONSTRAINT `konten_devices_devices_null_fk` FOREIGN KEY (`device`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `konten_devices_konten_null_fk` FOREIGN KEY (`konten`) REFERENCES `konten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konten_devices`
--

LOCK TABLES `konten_devices` WRITE;
/*!40000 ALTER TABLE `konten_devices` DISABLE KEYS */;
INSERT INTO `konten_devices` VALUES (1,1,1),(2,2,1),(3,1,2),(9,3,7),(24,1,22),(25,2,22),(26,3,22),(27,1,24),(28,2,24),(29,1,25),(30,2,25),(36,1,28),(37,3,28);
/*!40000 ALTER TABLE `konten_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('konsumen','mitra') NOT NULL,
  `balance` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@jadinge.top','admin@1234','konsumen',100000000),(4,'Andri','andri@kolabfit.com','51580bfda1202b1f1805b32020b1ab459db37374f056f700b6f2660e8ca706f2','konsumen',100000000),(5,'Mitra UMKM','mitra@kolabfit.com','3ba9234b922cbd8f01d6a7c322081d0fe9de8cd74d64a6877b5942f8df321c92','mitra',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-05  9:22:03
