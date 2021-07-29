-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (99,'2021-07-11-073339','App\\Database\\Migrations\\AddTbRole','default','App',1627549848,1),(100,'2021-07-11-073345','App\\Database\\Migrations\\AddTbAdmin','default','App',1627549849,1),(101,'2021-07-11-073357','App\\Database\\Migrations\\AddTbHasil','default','App',1627549849,1),(102,'2021-07-11-073409','App\\Database\\Migrations\\AddTbKategori','default','App',1627549849,1),(103,'2021-07-11-073417','App\\Database\\Migrations\\AddTbMahasiswa','default','App',1627549849,1),(104,'2021-07-11-073423','App\\Database\\Migrations\\AddTbSoal','default','App',1627549849,1),(105,'2021-07-13-095623','App\\Database\\Migrations\\AddTbJenisSoal','default','App',1627549850,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` enum('mahasiswa','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'mahasiswa');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_admin_id_role_foreign` (`id_role`),
  CONSTRAINT `tb_admin_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,1,'admin','$2y$10$9ro0gwvmpKUiZ2xHf0GkOe4avJsKRtAT2U8Eq0E5Ofvo8QeBqO6QW');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_hasil`
--

DROP TABLE IF EXISTS `tb_hasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `jawaban` text NOT NULL,
  `verbal` varchar(255) NOT NULL,
  `kuantitatif` varchar(255) NOT NULL,
  `logika` varchar(255) NOT NULL,
  `skor` varchar(255) NOT NULL,
  `scp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_hasil_id_mahasiswa_foreign` (`id_mahasiswa`),
  CONSTRAINT `tb_hasil_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hasil`
--

LOCK TABLES `tb_hasil` WRITE;
/*!40000 ALTER TABLE `tb_hasil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_hasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenis_soal`
--

DROP TABLE IF EXISTS `tb_jenis_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jenis_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_soal` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenis_soal`
--

LOCK TABLES `tb_jenis_soal` WRITE;
/*!40000 ALTER TABLE `tb_jenis_soal` DISABLE KEYS */;
INSERT INTO `tb_jenis_soal` VALUES (1,'Sinonim'),(2,'Antonim'),(3,'Analogi'),(4,'Logika Aritmatika'),(5,'Matematika'),(6,'Logika Umum'),(7,'Logika Penalaran '),(8,'Gambar/ Spasial');
/*!40000 ALTER TABLE `tb_jenis_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` VALUES (1,'Verbal'),(2,'Kuantitatif'),(3,'Logika');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mahasiswa`
--

DROP TABLE IF EXISTS `tb_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_mahasiswa_id_role_foreign` (`id_role`),
  CONSTRAINT `tb_mahasiswa_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mahasiswa`
--

LOCK TABLES `tb_mahasiswa` WRITE;
/*!40000 ALTER TABLE `tb_mahasiswa` DISABLE KEYS */;
INSERT INTO `tb_mahasiswa` VALUES (1,2,1001,'udin','$2y$10$etqhUanbdpv3Bx8TJ0fBKuKKjV5TP246wkWHDu2S4CcfJUotL7gyW','bandung 10/12/2002','L','tataboga','udin@udin.com','0810298300129','https://i1.sndcdn.com/avatars-tm1zD1OYWhfcHeAw-kuMfAA-t240x240.jpg'),(2,2,1004,'cika','$2y$10$etqhUanbdpv3Bx8TJ0fBKuKKjV5TP246wkWHDu2S4CcfJUotL7gyW','bandung 10/12/2002','P','perikanan','udin@udin.com','0810298300129','https://static.wikia.nocookie.net/naruto/images/9/97/Hinata.png/revision/latest?cb=20170701162302&path-prefix=id');
/*!40000 ALTER TABLE `tb_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_soal`
--

DROP TABLE IF EXISTS `tb_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `paragraf` text NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('aktif','mati') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_soal_id_kategori_foreign` (`id_kategori`),
  KEY `tb_soal_id_jenis_foreign` (`id_jenis`),
  CONSTRAINT `tb_soal_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_soal` (`id`),
  CONSTRAINT `tb_soal_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_soal`
--

LOCK TABLES `tb_soal` WRITE;
/*!40000 ALTER TABLE `tb_soal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_soal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-29 16:12:24
