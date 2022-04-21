-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: dbsista
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `detail_penilaian`
--

DROP TABLE IF EXISTS `detail_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_penilaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `penilaian_id` int NOT NULL,
  `dosen_id` int NOT NULL,
  `seminar_id` int DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_penilaian_penilaian1_idx` (`penilaian_id`),
  KEY `fk_detail_penilaian_dosen1_idx` (`dosen_id`),
  CONSTRAINT `fk_detail_penilaian_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  CONSTRAINT `fk_detail_penilaian_penilaian1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_penilaian`
--

LOCK TABLES `detail_penilaian` WRITE;
/*!40000 ALTER TABLE `detail_penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nidn` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `is_active` enum('yes','not') NOT NULL DEFAULT 'not',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,'084020211','AMALIA RAHMAH, S.T, S.T, M.T','yes',NULL),(2,'084040200','BACHTIAR FIRDAUS, S.T, M.P','yes',NULL),(3,'084151108','KURNIAWAN DWI PRASETYO, S.T, M.T','yes',NULL),(4,'084201001','MUHAMMAD BINTANG, S.Kom','yes',NULL),(5,'084310911','NUGROHO DWI SAPUTRA, S.Kom, M.Ti','yes',NULL),(6,'084290607','REZA ALDIANSYAH, S.T, M.Ti','yes',NULL),(7,'084230787','RUSMANTO, M.M., Drs','yes',NULL),(8,'084260989','SAPTO WALUYO, S.Sos, M.Sc.','yes',NULL),(9,'0860696','SUHENDI, M.M.S.I, S.T','yes',NULL),(10,'084010195','WARSONO, S.Kom, M.Ti','yes',NULL),(11,'084241010','YEKTI WIRANI, S.T, M.Ti','yes',NULL),(12,'084080200','DEDY ACHMADI, S.T, M.T','yes',NULL),(13,'084071314','MISNA ASQIA, S.Kom, M.Kom','yes',NULL),(14,'084050315','NURUL JANAH, S.IIP, M.HUM','yes',NULL),(15,'084300500','EDI WIBOWO, S.E, M.M','yes',NULL),(16,'084131310','AHMAD RIO ADRIANSYAH, S.Si, M.Si','yes',NULL),(17,'084260511','APRIL RUSTIANTO, S.Kom, M.T','yes',NULL),(18,'084070998','HENRY SAPTONO, S.Si, M.Kom','yes',NULL),(19,'084111208','HILMY ABIDZAR TAWAKAL, S.T, M.Kom','yes',NULL),(20,'084211202','LUKMAN ROSYIDI, S.T, M.M., M.T','yes',NULL),(21,'084270601','REZA PRIMARDIANSYAH, S.T, M.Kom','yes',NULL),(22,'084240913','SALMAN EL FARISI, S.Kom, M.Kom','yes',NULL),(23,'084290398','SIGIT PUSPITO WIGATI JAROT,PhD','yes',NULL),(24,'084140495','SIROJUL MUNIR, S.Si, M.Kom','yes',NULL),(25,'084100915','TUBAGUS RIZKY DHARMAWAN, S.T, M.Sc.','yes',NULL),(26,'084260907','ZAKI IMADUDDIN, S.T, M.Kom','yes',NULL),(27,'084281214','ADITYA PUTRA, S.T, M.T','yes',NULL),(28,'084101104','NASRUL, S.Kom, M.Kom','yes',NULL),(29,'084200914','TIFANI NABARIAN, S.Kom, M.T.I','yes',NULL),(30,'084301213','PUDY PRIMA, S.T, M.Kom','yes',NULL),(31,'084240795','EFRIZAL ZAIDA, S.KOM, M.M, M.KOM','yes',NULL),(32,'0899902010','TEGUH RAHARJO, S.Kom, M.Kom','yes',NULL),(33,'084290906','ISHOM MUHAMMAD DREHEM,S.Kom, M.Kom','yes',NULL),(34,'084141310','IMAM HAROMAIN, S.Si, M.Kom','yes',NULL),(35,'1234','rafif','not','2021-07-03 15:07:55'),(36,'12345','rafif2','not','2021-07-03 15:08:00'),(37,'1234137','Raga','yes','2021-07-11 07:51:02');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_seminar`
--

DROP TABLE IF EXISTS `kategori_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_seminar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `is_active` enum('yes','not') NOT NULL DEFAULT 'not',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_seminar`
--

LOCK TABLES `kategori_seminar` WRITE;
/*!40000 ALTER TABLE `kategori_seminar` DISABLE KEYS */;
INSERT INTO `kategori_seminar` VALUES (1,'Seminar Proposal','not',NULL),(2,'Seminar Hasil','yes',NULL),(3,'Sidang Skripsi','yes',NULL),(4,'test2','not','2021-07-03 15:14:15');
/*!40000 ALTER TABLE `kategori_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penilaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `is_active` enum('yes','not') NOT NULL DEFAULT 'not',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian`
--

LOCK TABLES `penilaian` WRITE;
/*!40000 ALTER TABLE `penilaian` DISABLE KEYS */;
INSERT INTO `penilaian` VALUES (1,'Presentasi','pembukaan, intonasi, kesopanan, kerapihan pakaian','yes',NULL),(2,'Penguasaan Materi','cukup jelas','yes',NULL),(3,'Penulisan Dokumen','cukup jelas','yes',NULL),(4,'test','mencerahkan2','not','2021-07-03 15:02:36');
/*!40000 ALTER TABLE `penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta_seminar`
--

DROP TABLE IF EXISTS `peserta_seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peserta_seminar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `seminar_id` int NOT NULL,
  `kehadiran` smallint NOT NULL DEFAULT '0',
  `status` enum('pending','acc','reject') NOT NULL DEFAULT 'pending',
  `program` varchar(45) DEFAULT NULL,
  `prodi` enum('ti','si') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peserta_seminar_mahasiswa_seminar1_idx` (`seminar_id`),
  CONSTRAINT `fk_peserta_seminar_mahasiswa_seminar1` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_ta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta_seminar`
--

LOCK TABLES `peserta_seminar` WRITE;
/*!40000 ALTER TABLE `peserta_seminar` DISABLE KEYS */;
INSERT INTO `peserta_seminar` VALUES (1,'0110220261','Ariska Handayani',6,0,'pending','S1','ti','2021-07-11 07:09:09'),(2,'011181234','Raga Murtada',7,0,'acc','S1','ti','2021-07-11 07:37:21');
/*!40000 ALTER TABLE `peserta_seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar_ta`
--

DROP TABLE IF EXISTS `seminar_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seminar_ta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kategori_seminar_id` int NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(45) DEFAULT NULL,
  `prodi` enum('ti','si') DEFAULT NULL,
  `judul` text,
  `pembimbing_id` int NOT NULL,
  `penguji1_id` int DEFAULT NULL,
  `penguji2_id` int DEFAULT NULL,
  `nilai_pembimbing` double DEFAULT NULL,
  `nilai_penguji1` double DEFAULT NULL,
  `nilai_penguji2` double DEFAULT NULL,
  `lokasi` varchar(40) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mahasiswa_seminar_kategori_seminar_idx` (`kategori_seminar_id`),
  KEY `fk_mahasiswa_seminar_dosen1_idx` (`pembimbing_id`),
  CONSTRAINT `fk_mahasiswa_seminar_dosen1` FOREIGN KEY (`pembimbing_id`) REFERENCES `dosen` (`id`),
  CONSTRAINT `fk_mahasiswa_seminar_kategori_seminar` FOREIGN KEY (`kategori_seminar_id`) REFERENCES `kategori_seminar` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_ta`
--

LOCK TABLES `seminar_ta` WRITE;
/*!40000 ALTER TABLE `seminar_ta` DISABLE KEYS */;
INSERT INTO `seminar_ta` VALUES (6,2,'2021-07-12','13:00:00',2,'0110220260','Rafif Mulia Reswara','ti','Rancang Bangun Aplikasi Seminar',24,10,15,NULL,NULL,NULL,'google meet',NULL),(7,2,'2021-07-12','14:35:00',2,'0118128878','Ariska Handyani','ti','Rancang Bangun Aplikasi Android',24,3,8,10,8,7,'google meet',8.3333333333333);
/*!40000 ALTER TABLE `seminar_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `lvl` enum('admin','user') NOT NULL,
  `email` varchar(75) DEFAULT NULL,
  `status` enum('active','not') NOT NULL DEFAULT 'not',
  `is_verif` enum('yes','not') NOT NULL DEFAULT 'not',
  `avatar` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin@xyz.com','active','yes','assets/img/uploads/Screenshot_from_2021-07-06_21-16-10.png'),(2,'rafif','b92b52df66da4409b241dfbc244cd054','user','rafif@xyz.com','not','yes',NULL),(3,'ariska','37c923621d7655456942c1f8b613e6c6','user','ariska@xyz.com','active','yes',NULL),(4,'rafif2','3682e87fb7d3acef0cdf637fe3732923','user','rafif2@gmail.com','active','yes','assets/img/uploads/Screenshot_from_2021-07-06_21-16-101.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-21 17:17:03
