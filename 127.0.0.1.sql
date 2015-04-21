-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2015 at 08:34 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_temanbackpacker`
--
DROP DATABASE `db_temanbackpacker`;
CREATE DATABASE `db_temanbackpacker` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_temanbackpacker`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

DROP TABLE IF EXISTS `tb_chat`;
CREATE TABLE IF NOT EXISTS `tb_chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id chat',
  `chat_trip_id` int(11) NOT NULL,
  `chat_sender` int(11) NOT NULL,
  `chat_type` char(1) DEFAULT NULL COMMENT '2: tanya | 3: diskusi',
  `chat_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `chat_mesej` text,
  `chat_deleted` int(11) NOT NULL COMMENT '0: aktif | 1: deleted',
  PRIMARY KEY (`chat_id`),
  KEY `FK_chat_trip` (`chat_trip_id`),
  KEY `FK_chat_user` (`chat_sender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`chat_id`, `chat_trip_id`, `chat_sender`, `chat_type`, `chat_date`, `chat_mesej`, `chat_deleted`) VALUES
(1, 110, 1, '2', '2015-04-17 19:24:35', 'ini pertanyaan test', 0),
(2, 110, 1, '2', '2015-04-17 19:26:06', 'ini pertanyaan by menu loch', 0),
(3, 110, 1, '2', '2015-04-17 21:32:28', 'Coba input dari hape', 0),
(4, 110, 1, '2', '2015-04-18 10:43:20', 'ini percobaan isi\nenter\nenter\nenter\nenter\nahir', 0),
(5, 110, 1, '2', '2015-04-18 11:28:37', 'tambah baru ini', 0),
(6, 110, 1, '2', '2015-04-18 11:31:16', 'keduax ini tambah baru lagi gan', 0),
(7, 110, 1, '2', '2015-04-18 11:33:52', 'ketigax kalinya', 0),
(8, 110, 1, '2', '2015-04-18 11:36:56', 'coba ke empat kalinya\n\nsfhkashfka\nsfjhaskfhaks\naskjfhakjshfka', 0),
(9, 110, 1, '2', '2015-04-18 12:15:17', 'ga jadi di pindahin ajax nya', 0),
(10, 110, 1, '2', '2015-04-19 10:00:26', 'perubahan ajax reload nya', 0),
(11, 110, 1, '2', '2015-04-19 10:13:51', 'apakah ini akan tampil brojQuery21100897971021477133_1429438420066', 0),
(12, 110, 1, '2', '2015-04-19 10:15:06', 'ini parse error deuh', 0),
(13, 110, 1, '2', '2015-04-19 10:50:04', 'apakah jadi nih perubahan gw', 0),
(14, 110, 1, '2', '2015-04-19 10:50:18', 'mantap gan', 0),
(15, 110, 1, '2', '2015-04-19 11:06:34', 'ini karta coy', 0),
(25, 110, 2, '2', '2015-04-19 14:55:02', 'Pujangga', 0),
(26, 110, 3, '2', '2015-04-19 15:28:25', 'ini bahur', 0),
(27, 110, 3, '2', '2015-04-19 15:38:21', 'asem', 0),
(28, 110, 3, '2', '2015-04-19 15:38:22', 'asem', 0),
(29, 110, 3, '2', '2015-04-19 15:39:21', 'tanya donk bro', 0),
(30, 110, 3, '2', '2015-04-19 17:42:13', 'tes waktu', 0),
(31, 110, 3, '2', '2015-04-19 17:43:31', 'cek lagi', 0),
(32, 110, 3, '2', '2015-04-19 17:54:45', 'cek waktu', 0),
(33, 110, 3, '2', '2015-04-19 18:05:04', 'tes waktu', 0),
(34, 110, 3, '2', '2015-04-20 14:38:36', 'Rikson ini dia', 0),
(35, 110, 3, '2', '2015-04-20 14:40:31', 'asoy geboy', 0),
(36, 110, 3, '2', '2015-04-20 14:41:05', 'coba lagi aaah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_parameter`
--

DROP TABLE IF EXISTS `tb_parameter`;
CREATE TABLE IF NOT EXISTS `tb_parameter` (
  `parameter_id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter_name` varchar(50) NOT NULL,
  `parameter_desc` text NOT NULL,
  PRIMARY KEY (`parameter_id`),
  KEY `parameter_name` (`parameter_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_parameter`
--

INSERT INTO `tb_parameter` (`parameter_id`, `parameter_name`, `parameter_desc`) VALUES
(1, 'status_trip', '{"status_trip":[\r\n{"id":"1", "name":"Wisata Kota"}, \r\n{"id":"2", "name":"Wisata Alam"}, \r\n{"id":"3", "name":"Wisata Kuliner"},\r\n{"id":"4", "name":"Wisata Sejarah"},\r\n{"id":"5", "name":"Backpacking"}\r\n]}'),
(2, 'transportasi', '{"transportasi":[\r\n    {"id":"1", "name":"Mobil"}, \r\n    {"id":"2", "name":"Kereta"}, \r\n    {"id":"3", "name":"Sepeda"},\r\n    {"id":"4", "name":"Motor"},\r\n    {"id":"5", "name":"Kapal laut"},\r\n    {"id":"6", "name":"Pesawat"}\r\n]}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

DROP TABLE IF EXISTS `tb_pengalaman`;
CREATE TABLE IF NOT EXISTS `tb_pengalaman` (
  `pengalaman_id` int(11) DEFAULT NULL,
  `pengalaman_user_id` int(11) DEFAULT NULL,
  `pengalaman_judul` varchar(150) DEFAULT NULL,
  `pengalaman_detail` varchar(150) DEFAULT NULL,
  `pengalaman_galeri` tinyint(4) DEFAULT NULL,
  `pengalaman_status` char(1) DEFAULT NULL,
  KEY `FK_pengalaman_user` (`pengalaman_user_id`),
  KEY `Idx_pengalaman_id` (`pengalaman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman_komentar`
--

DROP TABLE IF EXISTS `tb_pengalaman_komentar`;
CREATE TABLE IF NOT EXISTS `tb_pengalaman_komentar` (
  `koment_pengalaman_id` int(11) DEFAULT NULL,
  `koment_user_id` int(11) DEFAULT NULL,
  `koment_date` int(11) DEFAULT NULL,
  `koment_isi` int(11) DEFAULT NULL,
  KEY `FK_pengalaman_id` (`koment_pengalaman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_seq`
--

DROP TABLE IF EXISTS `tb_seq`;
CREATE TABLE IF NOT EXISTS `tb_seq` (
  `seq_id` int(11) NOT NULL AUTO_INCREMENT,
  `seq_name` varchar(50) NOT NULL,
  `seq_prefix` int(11) NOT NULL,
  `seq_val` int(11) NOT NULL,
  PRIMARY KEY (`seq_id`),
  KEY `seq_name` (`seq_name`),
  KEY `seq_name_2` (`seq_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_seq`
--

INSERT INTO `tb_seq` (`seq_id`, `seq_name`, `seq_prefix`, `seq_val`) VALUES
(1, 'sq_trip', 1, 42),
(2, 'seq_tanya', 2, 0),
(3, 'seq_diskusi', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_trip`
--

DROP TABLE IF EXISTS `tb_trip`;
CREATE TABLE IF NOT EXISTS `tb_trip` (
  `trip_id` int(11) NOT NULL,
  `trip_user_id` int(11) NOT NULL,
  `trip_judul` varchar(50) DEFAULT NULL,
  `trip_tujuan` varchar(100) DEFAULT NULL,
  `trip_tujuan_geolat` double DEFAULT NULL,
  `trip_tujuan_geolng` double DEFAULT NULL,
  `trip_kategori` varchar(100) DEFAULT NULL,
  `trip_quota` tinyint(4) DEFAULT NULL,
  `trip_date1` date DEFAULT NULL,
  `trip_date2` date DEFAULT NULL,
  `trip_info` text,
  `trip_transport` varchar(100) DEFAULT NULL,
  `trip_meeting_point` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`trip_id`),
  KEY `FK_tb_trip_tb_user` (`trip_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trip`
--

INSERT INTO `tb_trip` (`trip_id`, `trip_user_id`, `trip_judul`, `trip_tujuan`, `trip_tujuan_geolat`, `trip_tujuan_geolng`, `trip_kategori`, `trip_quota`, `trip_date1`, `trip_date2`, `trip_info`, `trip_transport`, `trip_meeting_point`) VALUES
(0, 1, 'ini judul', 'ini tujuan', 892349328, 984010, 'kategori', 22, '2015-04-15', '2015-04-16', 'jalan jalan yook', '23', 'jkt'),
(110, 1, 'judulnya coy', 'Bekasi Selatan, Jawa Barat, Indonesia', -6.258244, 106.977183, '2', 11, '2015-04-17', '2015-04-19', 'Ini adalah trip info dari database<br/>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.\r\n', '3', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trip_galeri`
--

DROP TABLE IF EXISTS `tb_trip_galeri`;
CREATE TABLE IF NOT EXISTS `tb_trip_galeri` (
  `galeri_trip_id` int(11) NOT NULL,
  `galeri_foto_url` varchar(100) DEFAULT NULL,
  `galeri_foto_judul` varchar(100) DEFAULT NULL,
  `galeri_date` int(11) DEFAULT NULL,
  KEY `FK_tb_trip_galeri_tb_trip` (`galeri_trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trip_member`
--

DROP TABLE IF EXISTS `tb_trip_member`;
CREATE TABLE IF NOT EXISTS `tb_trip_member` (
  `member_trip_id` int(11) NOT NULL,
  `member_user_id` int(11) DEFAULT NULL,
  `member_status` char(1) DEFAULT NULL COMMENT 'A: host | B: ijin join | C: udah join |  D: cancel | E: kabur',
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`member_id`),
  KEY `FK_tb_trip_member_tb_user` (`member_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_trip_member`
--

INSERT INTO `tb_trip_member` (`member_trip_id`, `member_user_id`, `member_status`, `member_id`) VALUES
(110, 1, 'A', 1),
(110, 2, 'C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_lokasi` varchar(100) DEFAULT NULL,
  `user_gender` char(1) DEFAULT NULL COMMENT 'L: laki laki || P: perempuan',
  `user_ttl` date DEFAULT NULL,
  `user_foto` varchar(50) DEFAULT NULL,
  `user_cover` varchar(50) DEFAULT NULL,
  `user_fb` varchar(50) DEFAULT NULL,
  `user_twitter` varchar(50) DEFAULT NULL,
  `user_reg_date` datetime DEFAULT NULL,
  `user_info` text,
  `user_geolat` double DEFAULT NULL,
  `user_geolng` double DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `idx_email_paswd` (`user_email`,`user_password`),
  KEY `idx_user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_lokasi`, `user_gender`, `user_ttl`, `user_foto`, `user_cover`, `user_fb`, `user_twitter`, `user_reg_date`, `user_info`, `user_geolat`, `user_geolng`, `user_lastlogin`, `user_ip`) VALUES
(1, 'FachrulCH', 'fachrul.fch@gmail.com', 'fachrul', 'Jakarta', 'L', '2015-04-06', '3.jpg', 'cover1.jpg', 'fachrul.fch', 'fachrulCH', '2015-04-06 03:07:29', 'Info si ALu', -6.2170638, 106.82639139999999, NULL, NULL),
(2, 'Karta', 'karta@email.com', 'karta', 'Bekasi', 'L', '2015-04-19', '4.jpg', 'cover2.jpg', 'fbkarta', 'twiterkarta', '2015-04-19 00:00:00', 'gw adalah anak bekasi', NULL, NULL, NULL, NULL),
(3, 'bahur', 'bahur@email.com', 'bahur', 'padang', 'L', '2015-04-19', '1.jpg', NULL, NULL, NULL, NULL, 'ini bahur', NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `FK_chat_trip` FOREIGN KEY (`chat_trip_id`) REFERENCES `tb_trip` (`trip_id`),
  ADD CONSTRAINT `FK_chat_user` FOREIGN KEY (`chat_sender`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
  ADD CONSTRAINT `FK_pengalaman_user` FOREIGN KEY (`pengalaman_user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_pengalaman_komentar`
--
ALTER TABLE `tb_pengalaman_komentar`
  ADD CONSTRAINT `FK_pengalaman_id` FOREIGN KEY (`koment_pengalaman_id`) REFERENCES `tb_pengalaman` (`pengalaman_id`);

--
-- Constraints for table `tb_trip`
--
ALTER TABLE `tb_trip`
  ADD CONSTRAINT `FK_tb_trip_tb_user` FOREIGN KEY (`trip_user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_trip_galeri`
--
ALTER TABLE `tb_trip_galeri`
  ADD CONSTRAINT `FK_tb_trip_galeri_tb_trip` FOREIGN KEY (`galeri_trip_id`) REFERENCES `tb_trip` (`trip_id`);

--
-- Constraints for table `tb_trip_member`
--
ALTER TABLE `tb_trip_member`
  ADD CONSTRAINT `FK_tb_trip_member_tb_user` FOREIGN KEY (`member_user_id`) REFERENCES `tb_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
