CREATE DATABASE  IF NOT EXISTS `librarian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `librarian`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: librarian
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `agen`
--

DROP TABLE IF EXISTS `agen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agen` (
  `id_agen` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kontak` decimal(15,0) NOT NULL,
  `tlp` decimal(15,0) NOT NULL,
  `faks` decimal(15,0) NOT NULL,
  `no_akun` decimal(50,0) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agen`
--

LOCK TABLES `agen` WRITE;
/*!40000 ALTER TABLE `agen` DISABLE KEYS */;
INSERT INTO `agen` VALUES (1,'sairan','depok',988888,8662662626,2121212,8889999,'2015-11-08 23:03:18','2015-11-08 23:03:18',1,1);
/*!40000 ALTER TABLE `agen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bahasa`
--

DROP TABLE IF EXISTS `bahasa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahasa` varchar(10) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bahasa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bahasa`
--

LOCK TABLES `bahasa` WRITE;
/*!40000 ALTER TABLE `bahasa` DISABLE KEYS */;
/*!40000 ALTER TABLE `bahasa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `id_pengarang` int(11) NOT NULL,
  `pernyataan` varchar(50) NOT NULL,
  `edisi` decimal(20,0) NOT NULL,
  `info_detail` varchar(50) NOT NULL,
  `id_eksemplar` int(11) NOT NULL,
  `id_tipekoleksi` int(11) NOT NULL,
  `isbn_issn` varchar(100) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `id_lokasibuku` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul_seri` text NOT NULL,
  `no_panggil` varchar(50) NOT NULL,
  `id_subjek` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `abstrak` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `nama_file` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `id_pengarang` (`id_pengarang`),
  KEY `id_eksemplar` (`id_eksemplar`),
  KEY `id_tipekoleksi` (`id_tipekoleksi`),
  KEY `id_penerbit` (`id_penerbit`),
  KEY `id_lokasi_buku` (`id_lokasibuku`),
  KEY `id_subjek` (`id_subjek`),
  KEY `id_bahasa` (`id_bahasa`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `fk_buku_1` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_2` FOREIGN KEY (`id_eksemplar`) REFERENCES `status_eksemplar` (`id_status_eksemplar`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_3` FOREIGN KEY (`id_tipekoleksi`) REFERENCES `tipekoleksi` (`id_tipekoleksi`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_4` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_5` FOREIGN KEY (`id_lokasibuku`) REFERENCES `lokasibuku` (`id_lokasibuku`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_6` FOREIGN KEY (`id_subjek`) REFERENCES `subjek` (`id_subjek`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_7` FOREIGN KEY (`id_bahasa`) REFERENCES `bahasa` (`id_bahasa`) ON UPDATE CASCADE,
  CONSTRAINT `fk_buku_8` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_page`
--

DROP TABLE IF EXISTS `contents_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `isi` longtext,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `halaman` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_page`
--

LOCK TABLES `contents_page` WRITE;
/*!40000 ALTER TABLE `contents_page` DISABLE KEYS */;
INSERT INTO `contents_page` VALUES (1,'Kontak','<section class=\"h-spacing-below\">\r\n<section class=\"h-spacing-below\">\r\n<p class=\"t-body\"><a href=\"http://themeforest.net/\">ThemeForest</a>&nbsp;is part of&nbsp;<a href=\"http://themeforest.net/community/market\">Envato Market</a>. At ThemeForest you can buy and sell HTML templates as well as themes for popular CMS products like WordPress, Joomla and Drupal. Items are priced on the complexity, quality and use of the file; the total price also includes a Buyer Fee. The site is home to a bustling community of web designers and developers and is the biggest marketplace of its kind.</p>\r\n</section>\r\n<section class=\"h-spacing-below\">\r\n<p class=\"t-body\">ThemeForest is more than a place to find great themes, it&rsquo;s a community! You can hear from authors, ask questions in&nbsp;<a href=\"https://forums.envato.com/\">the forums</a>, and comment on items. Contact fellow users and view their portfolios.&nbsp;<a href=\"http://marketblog.envato.com/\">Envato Market Blog</a>&nbsp;is a valuable resource for industry news, tips and tricks, and site updates.</p>\r\n<p class=\"t-body\">At ThemeForest we like to say that it is this community who really owns the site and we do our best to make sure they get the most out of it by providing not just great selling facilities but also interactivity, news, competitions and whatever else we can dream up!</p>\r\n<p class=\"t-body\">Plus ThemeForest is part of&nbsp;<a href=\"http://themeforest.net/community/market\">Envato Market</a>. Signing up to an account on ThemeForest will let you access the whole network</p>\r\n</section>\r\n</section>','2015-10-09 06:38:29','2015-10-09 06:56:03',1,1,'kontak'),(2,'Tentang Kami','<section class=\"h-spacing-below\">\r\n<p class=\"t-body\"><a href=\"http://themeforest.net/\">ThemeForest</a>&nbsp;is part of&nbsp;<a href=\"http://themeforest.net/community/market\">Envato Market</a>. At ThemeForest you can buy and sell HTML templates as well as themes for popular CMS products like WordPress, Joomla and Drupal. Items are priced on the complexity, quality and use of the file; the total price also includes a Buyer Fee. The site is home to a bustling community of web designers and developers and is the biggest marketplace of its kind.</p>\r\n</section>\r\n<section class=\"h-spacing-below\">\r\n<p class=\"t-body\">ThemeForest is more than a place to find great themes, it&rsquo;s a community! You can hear from authors, ask questions in&nbsp;<a href=\"https://forums.envato.com/\">the forums</a>, and comment on items. Contact fellow users and view their portfolios.&nbsp;<a href=\"http://marketblog.envato.com/\">Envato Market Blog</a>&nbsp;is a valuable resource for industry news, tips and tricks, and site updates.</p>\r\n<p class=\"t-body\">At ThemeForest we like to say that it is this community who really owns the site and we do our best to make sure they get the most out of it by providing not just great selling facilities but also interactivity, news, competitions and whatever else we can dream up!</p>\r\n<p class=\"t-body\">Plus ThemeForest is part of&nbsp;<a href=\"http://themeforest.net/community/market\">Envato Market</a>. Signing up to an account on ThemeForest will let you access the whole network</p>\r\n</section>','2015-10-09 06:38:48','2015-10-09 06:55:48',1,1,'tentang');
/*!40000 ALTER TABLE `contents_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_page_halaman`
--

DROP TABLE IF EXISTS `contents_page_halaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_page_halaman` (
  `halaman` varchar(100) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL,
  `parent_halaman` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `page_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`halaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_page_halaman`
--

LOCK TABLES `contents_page_halaman` WRITE;
/*!40000 ALTER TABLE `contents_page_halaman` DISABLE KEYS */;
INSERT INTO `contents_page_halaman` VALUES ('katalog','Daftar Buku','4',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,NULL,NULL),('kontak','Kontak','2',NULL,NULL,NULL,NULL,NULL,2,NULL),('tentang','Tentang Kami','2',NULL,NULL,NULL,NULL,NULL,1,'daftarbuku');
/*!40000 ALTER TABLE `contents_page_halaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_sponsor`
--

DROP TABLE IF EXISTS `contents_sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_sponsor` (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `is_aktif` smallint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_sponsor`
--

LOCK TABLES `contents_sponsor` WRITE;
/*!40000 ALTER TABLE `contents_sponsor` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents_sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_statistik_pengunjung`
--

DROP TABLE IF EXISTS `contents_statistik_pengunjung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_statistik_pengunjung` (
  `statistik_pengunjung_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`statistik_pengunjung_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_statistik_pengunjung`
--

LOCK TABLES `contents_statistik_pengunjung` WRITE;
/*!40000 ALTER TABLE `contents_statistik_pengunjung` DISABLE KEYS */;
INSERT INTO `contents_statistik_pengunjung` VALUES (36,'2015-09-22',1),(37,'2015-09-23',1),(38,'2015-09-29',2),(39,'2015-09-30',3),(40,'2015-10-01',1),(41,'2015-10-04',1),(42,'2015-10-05',1),(43,'2015-10-06',1),(44,'2015-10-07',1),(45,'2015-10-08',1),(46,'2015-10-09',1),(47,'2015-10-10',3),(48,'2015-10-16',1),(49,'2015-10-18',1),(50,'2015-10-25',1),(51,'2015-11-05',1),(52,'2015-11-08',1);
/*!40000 ALTER TABLE `contents_statistik_pengunjung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_template_contents`
--

DROP TABLE IF EXISTS `contents_template_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_template_contents` (
  `template_contents_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `isi` longtext,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`template_contents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_template_contents`
--

LOCK TABLES `contents_template_contents` WRITE;
/*!40000 ALTER TABLE `contents_template_contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents_template_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents_testimoni`
--

DROP TABLE IF EXISTS `contents_testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents_testimoni` (
  `testimoni_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `isi` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `is_approve` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`testimoni_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents_testimoni`
--

LOCK TABLES `contents_testimoni` WRITE;
/*!40000 ALTER TABLE `contents_testimoni` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents_testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kalaterbit`
--

DROP TABLE IF EXISTS `kalaterbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kalaterbit` (
  `id_kalaterbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `selang_waktu` time NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kalaterbit`),
  KEY `id_bahasa` (`id_bahasa`),
  KEY `id_satuan` (`id_satuan`),
  CONSTRAINT `fk_kalaterbit_1` FOREIGN KEY (`id_bahasa`) REFERENCES `bahasa` (`id_bahasa`) ON UPDATE CASCADE,
  CONSTRAINT `fk_kalaterbit_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kalaterbit`
--

LOCK TABLES `kalaterbit` WRITE;
/*!40000 ALTER TABLE `kalaterbit` DISABLE KEYS */;
/*!40000 ALTER TABLE `kalaterbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (2,'Agama','2015-10-10 07:05:38','2015-10-10 07:05:38',NULL,NULL),(3,'Hukum','2015-10-10 07:05:45','2015-10-10 07:05:50',NULL,NULL),(4,'Ekonomi','2015-10-10 07:10:16','2015-10-10 07:10:16',NULL,NULL),(5,'Novel','2015-10-10 07:10:23','2015-10-10 07:10:23',NULL,NULL),(6,'Komik','2015-10-10 07:10:34','2015-10-10 07:10:34',NULL,NULL),(7,'Sejarah','2015-10-10 07:10:39','2015-10-10 07:10:39',NULL,NULL),(8,'Teknik','2015-10-10 07:10:46','2015-10-10 07:10:46',NULL,NULL);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kepengarangan`
--

DROP TABLE IF EXISTS `kepengarangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kepengarangan` (
  `id_kepengarangan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kepengarangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kepengarangan`
--

LOCK TABLES `kepengarangan` WRITE;
/*!40000 ALTER TABLE `kepengarangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kepengarangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label`
--

DROP TABLE IF EXISTS `label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `label` (
  `id_label` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `lampiran_berkas` varchar(100) NOT NULL,
  `deskripsi_label` varchar(50) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label`
--

LOCK TABLES `label` WRITE;
/*!40000 ALTER TABLE `label` DISABLE KEYS */;
/*!40000 ALTER TABLE `label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lokasi` varchar(10) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasibuku`
--

DROP TABLE IF EXISTS `lokasibuku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasibuku` (
  `id_lokasibuku` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lokasibuku`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasibuku`
--

LOCK TABLES `lokasibuku` WRITE;
/*!40000 ALTER TABLE `lokasibuku` DISABLE KEYS */;
INSERT INTO `lokasibuku` VALUES (1,'rak 1','2015-09-27 23:36:02','2015-09-27 23:36:02',1,1),(2,'rak 2','2015-10-10 07:11:18','2015-10-10 07:11:18',NULL,NULL),(3,'rak 3','2015-10-10 07:11:23','2015-10-10 07:11:23',NULL,NULL),(4,'rak 4','2015-10-10 07:11:29','2015-10-10 07:11:29',NULL,NULL),(5,'rak 5','2015-10-10 07:11:33','2015-10-10 07:11:33',NULL,NULL),(6,'rak 6','2015-10-10 07:11:38','2015-10-10 07:11:38',NULL,NULL),(7,'rak 7','2015-10-10 07:11:43','2015-10-10 07:11:43',NULL,NULL);
/*!40000 ALTER TABLE `lokasibuku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `anggota_sejak` date NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `jenis_kelamin` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` decimal(6,0) NOT NULL,
  `alamat_surat` varchar(100) NOT NULL,
  `no_hp` decimal(15,0) NOT NULL,
  `no_identitas` varchar(45) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'arip','0000-00-00','0000-00-00','0000-00-00','0000-00-00','0000-00-00','ngwi',0,'',0,'123123','','arips4@gmail.com','','2015-10-03 15:29:56','2015-10-03 15:29:56',1,1);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerbit`
--

LOCK TABLES `penerbit` WRITE;
/*!40000 ALTER TABLE `penerbit` DISABLE KEYS */;
INSERT INTO `penerbit` VALUES (0,'kocul','2015-11-08 22:35:04','2015-11-08 22:35:04',1,1),(23,'wares','2015-11-07 21:34:35','2015-11-07 21:34:35',1,1),(34,'sutees','2015-11-08 17:48:30','2015-11-08 17:48:30',1,1);
/*!40000 ALTER TABLE `penerbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengarang`
--

DROP TABLE IF EXISTS `pengarang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tahun_lahir` int(11) NOT NULL,
  `id_kepengarangan` int(11) NOT NULL,
  `daftar_terkendali` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengarang`),
  KEY `id_jenis_kepengarangan` (`id_kepengarangan`),
  CONSTRAINT `fk_pengarang_1` FOREIGN KEY (`id_kepengarangan`) REFERENCES `kepengarangan` (`id_kepengarangan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengarang`
--

LOCK TABLES `pengarang` WRITE;
/*!40000 ALTER TABLE `pengarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengarang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (1,'petugas','l','2015-10-21','865432','Ngawi','a','ef7ad6c1faf1e46a706cd0615ada442bbc570b0e','2015-09-27 23:36:17','2015-10-04 10:44:38',1,NULL),(2,'admin','l','2015-11-12','98888','lanang','admin','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad','2015-11-06 21:33:52','2015-11-06 21:33:52',1,1);
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pinjam`
--

DROP TABLE IF EXISTS `pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jaminan` varchar(20) NOT NULL,
  `kode_jaminan` varchar(45) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`),
  KEY `fk_daftar_pinjam_1_idx` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pinjam`
--

LOCK TABLES `pinjam` WRITE;
/*!40000 ALTER TABLE `pinjam` DISABLE KEYS */;
/*!40000 ALTER TABLE `pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_action`
--

DROP TABLE IF EXISTS `public_sys_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_action` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL,
  `visible` varchar(1) DEFAULT '1',
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_action`
--

LOCK TABLES `public_sys_action` WRITE;
/*!40000 ALTER TABLE `public_sys_action` DISABLE KEYS */;
INSERT INTO `public_sys_action` VALUES (1,9,'add','2','1'),(2,9,'edit','2','1'),(3,9,'delete','2','1'),(4,15,'add','2','1'),(5,15,'edit','2','1'),(6,15,'delete','2','1'),(7,6,'add','2','1'),(8,6,'edit','2','1'),(9,6,'delete','2','1'),(10,7,'add','2','1'),(11,7,'edit','2','1'),(12,7,'delete','2','1'),(13,8,'add','2','1'),(14,8,'edit','2','1'),(15,8,'delete','2','1'),(16,12,'add','2','1'),(17,12,'edit','2','1'),(18,12,'delete','2','1'),(19,7,'import','2','1'),(20,8,'import','2','1'),(21,13,'add','2','1'),(22,13,'edit','2','1'),(23,13,'delete','2','1'),(24,13,'addsoal','2','1'),(25,13,'deletesoal','0','1'),(26,16,'ujian','0','1'),(27,18,'edit','2','1'),(28,13,'shownilai','0','1'),(32,27,'add','2','1'),(33,27,'edit','2','1'),(34,27,'delete','2','1'),(35,25,'add','2','1'),(36,25,'edit','2','1'),(37,25,'delete','2','1'),(38,28,'add','2','1'),(39,28,'edit','2','1'),(40,28,'delete','2','1'),(42,18,'index','0','1'),(43,7,'download_template','0','1'),(44,8,'download_template','0','1'),(45,21,'edit','0','1'),(46,21,'detail','0','1');
/*!40000 ALTER TABLE `public_sys_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_group`
--

DROP TABLE IF EXISTS `public_sys_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `visible` varchar(1) DEFAULT '1',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_group`
--

LOCK TABLES `public_sys_group` WRITE;
/*!40000 ALTER TABLE `public_sys_group` DISABLE KEYS */;
INSERT INTO `public_sys_group` VALUES (1,'Administrator','1'),(2,'Operator Absensi','1'),(3,'Guru','1'),(4,'Siswa','1');
/*!40000 ALTER TABLE `public_sys_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_group_action`
--

DROP TABLE IF EXISTS `public_sys_group_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_group_action` (
  `group_menu_id` int(11) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  KEY `action_fk` (`action_id`),
  KEY `group_menu_fk` (`group_menu_id`),
  CONSTRAINT `action_fk` FOREIGN KEY (`action_id`) REFERENCES `public_sys_action` (`action_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `group_menu_fk` FOREIGN KEY (`group_menu_id`) REFERENCES `public_sys_group_menu` (`group_menu_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_group_action`
--

LOCK TABLES `public_sys_group_action` WRITE;
/*!40000 ALTER TABLE `public_sys_group_action` DISABLE KEYS */;
INSERT INTO `public_sys_group_action` VALUES (733,34),(733,33),(733,32);
/*!40000 ALTER TABLE `public_sys_group_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_group_menu`
--

DROP TABLE IF EXISTS `public_sys_group_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_group_menu` (
  `group_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_menu_id`),
  KEY `group_fk` (`group_id`),
  KEY `menu_fk` (`menu_id`),
  CONSTRAINT `group_fk` FOREIGN KEY (`group_id`) REFERENCES `public_sys_group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `menu_fk` FOREIGN KEY (`menu_id`) REFERENCES `public_sys_menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=744 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_group_menu`
--

LOCK TABLES `public_sys_group_menu` WRITE;
/*!40000 ALTER TABLE `public_sys_group_menu` DISABLE KEYS */;
INSERT INTO `public_sys_group_menu` VALUES (728,2,2),(729,1,29),(730,1,2),(731,1,24),(732,1,26),(733,1,27),(734,3,2),(742,4,2),(743,4,23);
/*!40000 ALTER TABLE `public_sys_group_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_menu`
--

DROP TABLE IF EXISTS `public_sys_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `label` varchar(100) NOT NULL,
  `iconcls` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `visible` varchar(1) DEFAULT '1',
  `state` varchar(10) DEFAULT 'close',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `index2` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_menu`
--

LOCK TABLES `public_sys_menu` WRITE;
/*!40000 ALTER TABLE `public_sys_menu` DISABLE KEYS */;
INSERT INTO `public_sys_menu` VALUES (2,NULL,'Dashboard','dashboard','panelbackend/home','1','open',1),(6,11,'Kelas','institution','panelbackend/kelas','1','open',0),(7,11,'Siswa','reddit-square','panelbackend/siswa','1','open',0),(8,11,'Guru','mortar-board','panelbackend/guru','1','open',0),(9,14,'Matapelajaran','book','panelbackend/matapelajaran','1','open',0),(12,10,'Jenis Ujian','list-ol','panelbackend/jenis_ujian','1','open',1),(13,10,'Soal Ujian','pencil','panelbackend/ujian','1','open',2),(15,14,'Materi Pelajaran','file-text','panelbackend/materi','1','open',1),(16,10,'Mengerjakan Ujian','play','panelbackend/mengerjakan_ujian','1','open',3),(18,17,'Daftar Nilai','th-list','panelbackend/nilai','1','open',1),(19,17,'Grafik','bar-chart-o','panelbackend/grafiknilai','1','open',2),(21,20,'Absensi Bulanan','pencil','panelbackend/absensi','1','open',1),(22,20,'Grafik Absensi','bar-chart-o','panelbackend/grafikabsensi','0','open',2),(23,NULL,'Laporan-laporan','print','','0','open',6),(24,NULL,'Halaman-halaman','sitemap','panelbackend/page','1','open',7),(25,20,'Hari Libur','table','panelbackend/absensi_hari_libur','1','open',3),(26,NULL,'Pengaturan','gears','','1','closed',8),(27,26,'User','user','panelbackend/sys_user','1','open',1),(28,10,'Jadwal Ujian Remidi','pencil','panelbackend/remidi','1','open',3),(29,NULL,'Login As','','panelbackend/loginas','0','open',0),(30,30,'Penerbit','gears','panelbackend/penerbit','1','open',1),(32,33,'Penerbit','print','panelbackend/penerbit','1','open',0),(33,NULL,'Master File','sitemap','','1','closed',9),(34,33,'Agen','sitemap','panelbackend/agen','1','open',2),(35,33,'Pengarang','sitemap','panelbackend/pengarang','1','open',3),(36,33,'Subjek','sitemap','panelbackend/subjek','1','open',4),(37,33,'Lokasi','sitemap','panelbackend/lokasi','1','open',5),(38,33,'Tempat','sitemap','panelbackend/tempat','1','open',6),(39,33,'Status Eksemplar','sitemap','panelbackend/status_eksemplar','1','open',8),(40,33,'Tipe Koleksi','sitemap','panelbackend/tipekoleksi','1','open',9),(41,33,'Bahasa','sitemap','panelbackend/bahasa','1','open',10),(42,33,'Label','sitemap','panelbackend/label','1','open',11),(43,33,'Kala Terbit','sitemap','panelbackend/kalaterbit','1','open',12),(44,NULL,'Bibliography','book','','1','closed',2),(45,33,'Lokasi Buku','sitemap','panelbackend/lokasibuku','1','open',13),(46,33,'Kategory','sitemap','panelbackend/kategori','1','open',14),(47,44,'Buku','book','panelbackend/buku','1','open',1);
/*!40000 ALTER TABLE `public_sys_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_sys_user`
--

DROP TABLE IF EXISTS `public_sys_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `public_sys_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `last_ip` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` varchar(1) DEFAULT '1',
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `group_fk_1` (`group_id`),
  CONSTRAINT `group_fk_1` FOREIGN KEY (`group_id`) REFERENCES `public_sys_group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_sys_user`
--

LOCK TABLES `public_sys_user` WRITE;
/*!40000 ALTER TABLE `public_sys_user` DISABLE KEYS */;
INSERT INTO `public_sys_user` VALUES (1,'arip',1,'Solikul Arip','::1','2015-11-13 21:22:03','1','6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2'),(2,'admin',1,'Administrator','127.0.0.1','2015-11-06 21:47:12','1','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad'),(39,'admin2',1,'Administrator 2','127.0.0.1','2015-11-08 17:12:59','1','6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2'),(43,'a@a.com',4,'Solikul Arip','127.0.0.1','2015-11-08 14:44:01','1','59a8420fe333263e93834c8dda0e1559fb0c0890'),(44,'Amail_1@a.com',3,'nama1','127.0.0.1','2015-11-08 18:04:08','1','519327a63da5b5ab2bc7ee03590daaf96c1ee409'),(45,'Amail_12@a.com',3,'nama2','127.0.0.1','2015-11-08 13:46:27','1','3865d10ac65dfd106faf39442ddda2e88cd2dd95'),(46,'aaa',2,'bbbb','127.0.0.1','2015-11-08 15:11:41','1','67a74306b06d0c01624fe0d0249a570f4d093747');
/*!40000 ALTER TABLE `public_sys_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_eksemplar`
--

DROP TABLE IF EXISTS `status_eksemplar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_eksemplar` (
  `id_status_eksemplar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_status` varchar(10) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_status_eksemplar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_eksemplar`
--

LOCK TABLES `status_eksemplar` WRITE;
/*!40000 ALTER TABLE `status_eksemplar` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_eksemplar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjek`
--

DROP TABLE IF EXISTS `subjek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjek` (
  `id_subjek` int(11) NOT NULL AUTO_INCREMENT,
  `kode_klasifikasi` varchar(50) NOT NULL DEFAULT '0',
  `id_type_subjek` int(11) NOT NULL DEFAULT '0',
  `daftar_terkendali` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subjek`),
  KEY `id_type_subjek` (`id_type_subjek`),
  CONSTRAINT `fk_subjek_1` FOREIGN KEY (`id_type_subjek`) REFERENCES `type_subjek` (`id_type_subjek`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjek`
--

LOCK TABLES `subjek` WRITE;
/*!40000 ALTER TABLE `subjek` DISABLE KEYS */;
/*!40000 ALTER TABLE `subjek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempat`
--

DROP TABLE IF EXISTS `tempat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempat`
--

LOCK TABLES `tempat` WRITE;
/*!40000 ALTER TABLE `tempat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipekoleksi`
--

DROP TABLE IF EXISTS `tipekoleksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipekoleksi` (
  `id_tipekoleksi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipekoleksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipekoleksi`
--

LOCK TABLES `tipekoleksi` WRITE;
/*!40000 ALTER TABLE `tipekoleksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipekoleksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_subjek`
--

DROP TABLE IF EXISTS `type_subjek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_subjek` (
  `id_type_subjek` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_type_subjek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_subjek`
--

LOCK TABLES `type_subjek` WRITE;
/*!40000 ALTER TABLE `type_subjek` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_subjek` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-15  6:40:40
CREATE DATABASE  IF NOT EXISTS `librarian_upload` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `librarian_upload`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: librarian_upload
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `buku_file`
--

DROP TABLE IF EXISTS `buku_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_file` (
  `id_buku_file` int(11) NOT NULL AUTO_INCREMENT,
  `isi_file` longblob,
  `nama` varchar(100) DEFAULT NULL,
  `id_buku` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `content_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_buku_file`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_file`
--

LOCK TABLES `buku_file` WRITE;
/*!40000 ALTER TABLE `buku_file` DISABLE KEYS */;
INSERT INTO `buku_file` VALUES (1,'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','fikih sirah','1',NULL,NULL,NULL,NULL,'application/octet-stream'),(2,'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','riyadhusholihiin.jpg','2',NULL,NULL,NULL,NULL,'image/jpeg'),(3,'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','buas fisika.jpg','3',NULL,NULL,NULL,NULL,'image/jpeg'),(4,'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','phisics for shs.jpg','4',NULL,NULL,NULL,NULL,'image/jpeg'),(5,'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','pupul.jpg','5',NULL,NULL,NULL,NULL,'image/jpeg'),(6,'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','5316.jpg','6',NULL,NULL,NULL,NULL,'image/jpeg'),(7,'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','4918.jpg','7',NULL,NULL,NULL,NULL,'image/jpeg'),(8,'/9j/4AAQSkZJRgABAQAAAQABAAD//gA+Q1JFQVRPUjogZ2QtanBlZyB2MS4wICh1c2luZyBJSkcgSlBFRyB2NjIpLCBkZWZhdWx0IHF1YWxpdHkK/9sAQwAIBgYHBgUIBwcHCQkICgwUDQwLCwwZEhMPFB0aHx4dGhwcICQuJyAiLCMcHCg3KSwwMTQ0NB8nOT04MjwuMzQy/9sAQwEJCQkMCwwYDQ0YMiEcITIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIy/8AAEQgAsQBwAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A4S4u2it84YOV+UkD5jjgYznvVC8vvsk0qo/mTn5dxPCjAJwPqT+VTXhe2DyyyMTjII7k5GB6AAfXk881S0PSxr2srZyXkVoHSWRriUfIgSNnJOOg+X8K86KPsa8+UzKK3P8AhGboG3WRvKd4Z5ZUkQqYvKi85l9yYyhHTlsHGCaZa6ELq9SMTulrNaz3dvM0YLPHF5hOVDHaSIn4yecdjmr1OPngY1FX49Pikt7Wb7WsSzSyRs0qELHsCncduSRhh0BPXANX5fDMlqzNdzmKOKzW8nIQMQhmEI8vDbXyWVgdwBU5B6ZB80E7GDRW1p+hJezXH+kTCFLlLWIxW/mvJJJv2DaGwAdhzhieRgNziKx0cXcLbpzHcPbSXVugQMrrGHaQOQ2UOI2wNpzxnaDmjUOaBlUVftdMku7Ga4iYFoskxhSWZQMkjHoMk57Amlk06KOCST7T93yBymBmRCxzz/DjHQ59qLjvEz6vWl6scRhlTK7t6sDgqwHFXRoCNqd1Yi4kSSCITgPEuZIwm+QrtdlOEy6nOGUZyCQDVk0rZ4ei1cTqVku3tVi4DfKqsWxnOPnHQEDuRkZGONSKd0dF5NxBaRzybWjkJWH97GHlX+/t3biuQV3AbcgjrxWn4VBPi3RmIH/H/D1XB/1gGayNM8QibTrW2ewsnltWRJEFogNzBuBOZOqMPVcFs5JyuTpeFRNJ4w0hZBlI9Qt8Ej73zqc/hx+IPriptaSsdHM5Up8y6Oxx2rXJmuFi3bhCNu7HVu5qnFPLAxaGV42KshKMQSrAhh9CCQR3BpjMXYsxySck0lO1tDKT5ndk897dXOfPuZpcyPMd7lv3jY3Pz/Edq5PU4HpTGuJnmkmaWRpZMl3LEs2euT3z3qOimTZE8d5dQmMxXM0ZiyYyrkbM9cemaZHPNFLHJHK6SRnKMrEFec8HtzUdXdO0u61K7jgt4iS3zZbhQueST6VMpKKu9hqN3ZIiivbmGd5lnlDyZEjCRgXB6gkHJB71JdSGEFbdpYbe5VXaAy7uhON2AM9MjI6EfWu7HhKyeBPPD70KgBmyABjcPlwCDyQcA85PpRPoNg6O16WnuH5e4c4IPQf5Oa4HmNG+mp1wwVSSOChvb0WrWEVzP9mlcM1ush2Ow6Er0JqxOZltVgllLLGWwgk3KuepGDjnA6V0MegWBlDROPIkJZWychcD9Ov589qyNfs47eYXSS7vPJxGB/q8Acfh6cdq3jiIVJKKFLDSpQcpIx3nmeZ5mldpZCxdyxLMTnOT3zk5+tJ5snleV5jeXu3bM8Z9cetMorqOSyJbadra5jmXPynJA7juK7nwlO0vjLSFWXev9pQNkDohZSB/n3rga6/wGzp4o0SfDMralDE+O3zptP4Hj8aVtUXzNU5R8mchRRRTJCilAyQKtRWMslvJMI3ZU9BScktxxi5bFUZzkdq1tNN5Ckt8zzrAuHZ8ZDuDxnJ55PJ7ZPrgt0+1kmhllheO2miI2yM+36jJPBqW0t7qU3du9zE0s0QwPNMmfmDH7m7J+Xp/hWVSSd4m0KclaXfY6xNSuhcWy5juIJ1yky5AbAJIAxw3Q8nsR16U7q+A3wzXTRyxcSeQCQd3Iy2MDPA6ccc9RSRRRx6R5W5VURoRLH8oL88g8HPSsVmjmmuIZcuxI2vzuyehJ9Of5e5rzadKEpNpbHrvmjFLuaGq3MdvpKR4ldGmYspbG8HOeVwOv4cdKw9Tntp7W1aD5CFYGIfw/MTzz1xtH0H4U+7uoF05rQF3n8wMzY+XgY45rJrvoUrK/mediqt5cq7fcFFFFdJxBXWfD53XxdpW1lw2oW4IKk/8tB7jH61yddX8PnKeK9L2jLNqNqoH/bTn9M0LcT+F+j/I5SipLiFred4m6qcZ9ajoGPhiaaVY1xuY4Ga6doRBZpAfNkea2XEFsc45yWY/XAz9a5WlBwc8VlUp89tdjWlVVO+lxzuzHaWJA6ela+hWF+1wLq2KxBQRvc9QRjgd+ufSsiKMyyqg4LHGa7WO7jhRYYE3kZREXjoM/l0/OssTUlGPLFbnXgcPGrJ1JuyX5k9/KbexZ2kIKLksFyCcenbmqSWzGMrtO9QdhY7guenPUjnHPp0rOiupb/Uvs00hkj58zHCIB6D2PGT7Vq291DHZosOSEHyh3yWGcD+nbviuN05U426nr0a8Kk3LotPu/pHLXNo8MyoyHezFQQMgn/Palk0uYQebHNbzYUsyRSguoHUlev5dMHNaF06x2cpi2vLIxMjOMld3UqO3p681hZOa9CnJyVzwsRGMJ2EooorY5Qrr/h3b7vFWlTkkD7fAoAPX51P+FchXaeDYJI/FOgWiZDrqFvNOw52/vBhT7nAo6oLe7J+TOautPEEDyK5Zo32uu3GB2P8AL86oV0xMUTy29y6AyRqctgKT0P8AL/OK564hMEzITkdQfUdjUpmtWCWqIqKKKoyFVirBgcEd63tPS4e0nlEqI8oxG5PI5IIB7dv09KwBya2bW/8A7OgVIwWc/eBGAWP+HT8KxrRbj7u524GcY1G5uyHXdtFZKIraZvNkykyFd2BgHqB05H+RTkjuTbNPLK+NylWLKIwo4wcNx16AZGOOaWIXE9wJruCL7PJ83zOFxwMc5z6DH+RUMrXTTYZI42wJN78jnOT688dDxWaTat97N58sXzWaTvZbfM0b+CK/sjqFspjZhgpj74BxzjiucYYPTFbjzPObdJC7QsQsfy7Dx3wPYjpxj8azr+NjcO/Jy2Oaqj7vuszxcVNe0j8/8ynRRSgFiAAST0AroPPLVjarctI0jbY40LM2Cf8AP/1q7DwTCLLxHoaPyZNRgKjHOSy/ywaw7dIbWzFuZEM8jBSFIY5PqP0//XW34ahz430TDM8kepQMxB6BnX+ij8KlO8kbSjy0pd7MxbuHz7iFpkYncE2gHDAEZb2HLD8qoLpxksBOuQ+zfg/xYJB/TB/GtSItEgK6hG6Mcp5vJ+mc80qw3EUKPHIkqpgqp/u4I4IHPB9P8Km9jZwUndnM0VLcxCG4eMZwDxu6/wCfeoq0OPYkhIEgJAOOQD0zVq0Hn3heRtznJ6bjnnnHT/8AXVGpraQRTq5GQCCR61MlozajNKUU9rl65gXyN+cqCcFmGTz1z39x1GPerVrbwm2DyQk4wV+62Rzn5xgdPXpiq4kuLZ3K4ijdshj2yOg+uKZJffuHRNu2RvmBA4IIOf0/zzWDUpKyPSXsqcnKW/Z/1/XmaEE6yXhkKY2krHnH3fw757+9ZOpXHm3BVQAo9O59animnaQFSGYcbi3A98/jWa7FnJPUmnTp2lcyxWIvRUF1Y2tDT7BblGkk3bNwQBeuT1P4A5rPro7OCUIEQhFjUqGI+YsSCeO3b1x+GK2k7HBSjzS1KdhEYpIZViYyFTxnAY5YY56HgH8DXUeF7hR4x0bdEQzX9vhhtzgyKBkE59AeKx1WQKYkvoVbnkLljySTjPrntxUvh2ZF8c+HLeOTzsajbFpGYsSfNXp2A+lKOskXW9yjL0OYguZrdsxSFc9QOhq9Hrc6NkxoVJ5GTz+Z4rMoqmkzKM5R2ZrvcafeW5EzNFIuQhIJIHXHA6Z/SqrWtphQl8pZh3jIA+tUqKLDc77oujTgRkXtp/38prWM0atIoSWNeN8bBhVSpbeaSCXfGxVh6UagnFvY15JzeQBI0yNwyOnGP8f8ioAIJJjEETKqApGcYz3wM9/ao5ZmhkjuIQFWZckY4BzyB+I/WljYG8M28YZgAV42cgZ9On86xUOXbY9R4j2rTlrLrfsStbs7BrcJGsRwA/8AE3Xv9aqJbW7SYluljLMeNpOOvWpjcW8kwYKyhcsGL88DOMe5rOYlmLHqTmqgn1ObFSp6cv8AwOnoalqdOtd0pm82VcmMFCBnHHbrQ+tOo8u3jxGO7k7m9yRisqirsjl9q0rR0LM9/cXC7GcqnTaCcfrWn4M/5Hrw9/2Erb/0atYdbngz/kevD/8A2Erb/wBGrVx3RhVbcG32MOiiikWFFdronwr8Ua/4ebWLG1j2bgIoJnMckwO0703AKVw3UsOh/F4+D/jv/oBY/wC3uD/4uq5ZdjH29K9uZHD0V2F78LvGGm2kl3faZDa20eN8s19boi5OBkl8DkgVx9JprcuM4z+F3Jppg8cUaZ2xrjnuTyf8+1JA0YkBlG5R27E+9RVdhsWlEPXEgJz75/wFRJpLU6KUJ1Je4rv+kLcKFt90mzzGb5Aox8vr9OOPxqjU1zJ5k7nORnAPt2qGiKsgryUpuwUUUVRkFbngz/kevD//AGErb/0atYdbngz/AJHrw/8A9hK2/wDRq047oip8D9DDq1p14lhqEF3JZ214Im3eRcqxjc9twUgkZwcZwcc5GRVWikU1dWPaNO+P5stOt7VvCtuDEgTFtc+TGAOgVNh2jHbJr0DwF8Rl8Zm5E+mjTWj2eSrzl/PDb+Vyqg48tumfut0xXzl4c8NT+ILtA11a2FiJVimvbuVY44yQSAMkbmIBwo59cDmve9fS18OeFbWDTdKltITELVJ4SsV6UQl84DIVU4d2YtlcktGQWxvCUnqzysTRoxfLFasx/G41Lx74mg8OpqcWm6U0iCG3Zc3Vy+xmaQwttdVQZ4cqCBuXcSorjPHfwsh8G6Ncaq+seZG10sFnB9nJaQEZ+ds4UgB+gIO0dN2Bu+C9OeaS8l8M3GnJqMMXlXNy0Et1JBJNIVTEoOJHUKS0iKsYyThxypNN4l+IvjGbw7czab9m0O7e4ldrRxDPIrhAjjccj7yryCVznJoaTV3uOEpU5csXaK3/AK8zjvEfw8l8N+CtP16fURJc3MscUtl5JVrcvGZAGJOdwAGQVHX89TV/AOoeGvCLavd3wTyrS2mjhlt9haWZirw5L53RjnpyD0GK3w3ir4k61f8Ahm/bSvsuiX7zyz/Z3CSyLIyLGwD52lSwGMHCcknmq3ii88SeNLzWPDeq3mlLa+H0k1Ge6sIHZWKL9zJb7wDsMccqQScZqJQi1qjopYvEU5LllZ9fTSxg6h8L20vwPJ4iu9TmWRLSC5NsLI4zM21U8wuORxu4yMjg5Gat78Oxp/w7j8UXOrKk0scUkVn5GQ4kfCgSbsFtuWK4yMHPrXfRaV4u+KngtbuWfSdPtb29E5SJZg0uweUScuwA+X7oAyVByM5rPuY9f8Y6xqvgGzl0ez061lEt1cWUEqRbkCr5YVmIHz4+UBcshb1zXKuiM416m0pbPXyR59feDLm0svDJS5STUdeG6OyIVTErOFiJbcch92QSB0I7Gp/iB4Lj8DaxbacNSN9JNbidj9n8oKCzKB945+6a7TQ18Ua78StRurK20k3fhy3ezt18l1tk2FkRFUOCC3zkbiQOfQY5L4pXuoT+Mms9SkspJ9Ot47XfZxGONhjf0JPI3kHp06VLSSuaU6k5VFFvpdnF1ueDP+R68P8A/YStv/Rq1h1ueDP+R68P/wDYStv/AEatRHdHVU+B+hh1qaZHYeU7Toskx4DTSFIYQdqhiF+eQgsTtXptz84yBl0UDauj2D4VyW6ya54pvQHTSrcbbu4T5kU5JSFAQqHYGXqcbkAAG4NwHirxfqHinUJppi0Fo7q6WaOSilV2KzE8vJtwC7cnpwAANrVdWOifDDSvDEUUsVxqhOqXrMRhkLkRKO/Kxo/bovqa4SqlLSyOelSTm6j+Xoeh+CfidF4N0SPT00aa5dbp7ppRfeUHYpswVCHKgYOCTyM+mF8H/FI+E7WQDSTd3d1dtc311JcgNcZVgF+4SACQ3U87v71ed0UudlvD03e63PQPCXxQk8LJdM2kx3dzeXxu7uczbDMu07U+6cYc78/UY5zWTF4zI8NeI9Pnsml1DXbhJri+E+0AK4faIwuOpfuPve1ZY0dZNLguUuY0nlMYWGZ1jDhmmDOGYgBV8pQfd+o6EbSIU1Brf7dC8Auxbi4V0A2lmXfjdnGFB9MHkjIy7ysTyUlJu2v+R3nh/wCMjeHNNsbC00JTbW8EcMkZuuHZRIXkX5PlZ3dWOdwwuO+RR8IfFNvCdtKBpH228u7trm+upbja84KnCjCcYY7skt/FwN3HndFLnkP6tSaem53vhj4lv4fg1j7Ro1vf3OoXS3n2hpWQrKrb13YB3KHwwHy/xcnPHFX97NqWoXN9csGuLmV5pWAwCzEknHbk1XopOTasaRpQjJyS1YVueDP+R68P/wDYStv/AEatYdbngz/kevD/AP2Erb/0atEd0Op8D9DDrT0XRJ9bluI4JI4/IjWR2k3YCtIkeeATwZATx0B+hzKngu57aK5ihk2pcxiKYYB3KHVwOenzIp49PTNIcrtaF2bT9Xvr20jmikkurm2RrdGI3vEilUAHX7seFHVhtwDuGYJNIvo/P3W5HkW0V3L86/LFJs2N17+bHx1Geehwn9qXgTYJFCbpWCCNQqmRQrkDGBlVA46YGMU+41nUrua6muLyWWW7iWG4dzuaRFKEAk8nmNOevFBKUxU0TUXubW2W1bz7uHz4IiQGkT5iCATnJ2naOrcYB3DLX0m7icLMIYiwhI8ydFyJU3xnrwCvJPRcjdjNImq3kdv9nV08rdI4QxKQGkQI5HHGVAHHoPSpoPEOq21wZ47tvMKxLllVsGNQsbAEcOoGFYfMMnB5NAfvBlppE97pOo6hEUEeniNplbIJDttGOPX1qOLS72aVYkgbe0D3IVvlzEqF2YZ6japPrxTbbULu0tp7e3lMcc+PM2gbjhWXAbqAVdwQDghiDmp01u+inM0RgjcoIyUto1yo4xgLjBBII/iBwcjigVp62IJNPuYreOeRUSOWA3EZaVQXQSGPIGck7lbjrgE4wM1bfw3q0c15C9mwks7hLW4XcPkkcsFB56EqeenTnkZrz6pd3NjBZStG0EGRGPJQMoLMxG4DdjczHGcZNSya/qktzcXJu2Wa4nW4ldFCF5FDAMcAc4d8+u45zQP3yB9Nuo7aO4eNVilgNxGWkUF4xIYyQM5J3AjHXAJxgZp02kahb38ljLayLdRx+bJEfvIoTed3oQvJB5HQ88Up1e9Nlb2jPG0FvxGrQoTjcX2kkZZdzE7SSM9qSLVr6FESOchUjESgqDhfN83HI/v/ADf/AFqA98ZqGn3el3htL6B4LhUR2jcYZQyhhkdjhhx1HetLwZ/yPXh//sJW3/o1ayrq7nvHR7h97pGkSttAO1QFUcdcAAc9gK1fBn/I9eHv+wlbf+jVpx3QTv7N37H2FRRRXSz5YKKKKBBRRRQAUUUUAFFFFABRRRQAUh6iiihblR3P/9k=','85572.jpg','8',NULL,NULL,NULL,NULL,'image/jpeg'),(9,'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','88118.jpg','9',NULL,NULL,NULL,NULL,'image/jpeg'),(10,'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','86842.jpg','10',NULL,NULL,NULL,NULL,'image/jpeg'),(11,'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','80675.jpg','11',NULL,NULL,NULL,NULL,'image/jpeg'),(12,'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','75346.jpg','12',NULL,NULL,NULL,NULL,'image/jpeg'),(13,'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','74912.jpg','13',NULL,NULL,NULL,NULL,'image/jpeg'),(14,'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','72245.jpg','14',NULL,NULL,NULL,NULL,'image/jpeg');
/*!40000 ALTER TABLE `buku_file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-15  6:40:40
