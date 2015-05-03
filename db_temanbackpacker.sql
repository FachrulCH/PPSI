-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2015 at 04:53 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_temanbackpacker`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

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
(36, 110, 3, '2', '2015-04-20 14:41:05', 'coba lagi aaah', 0),
(37, 110, 3, '2', '2015-04-20 22:10:28', 'duaaar', 0),
(38, 110, 3, '2', '2015-04-21 08:58:56', 'asoy', 0),
(39, 110, 3, '2', '2015-04-21 14:23:05', 'peningkatan', 0),
(42, 110, 3, '2', '2015-04-21 14:50:47', 'masih eror ternyata', 0),
(43, 110, 3, '2', '2015-04-21 14:54:47', 'avenger', 0),
(44, 110, 3, '2', '2015-04-21 14:55:16', '"tanya '' ku''tip" ', 0),
(45, 110, 3, '2', '2015-04-21 14:56:00', '', 0),
(46, 110, 3, '2', '2015-04-21 14:57:59', 'masa sih bro?', 0),
(47, 0, 3, '2', '2015-04-21 15:41:07', 'bs?', 0),
(48, 0, 3, '2', '2015-04-21 15:43:54', 'sadadasda', 0),
(49, 110, 3, '2', '2015-04-21 16:19:49', 'sadada', 0),
(50, 110, 3, '2', '2015-04-21 16:26:56', 'return baru', 0),
(51, 110, 3, '2', '2015-04-21 16:32:15', 'list', 0),
(52, 110, 3, '2', '2015-04-21 16:38:36', 'jebraw', 0),
(53, 110, 3, '2', '2015-04-21 16:40:03', 'mamam', 0),
(54, 110, 3, '2', '2015-04-21 16:41:18', 'andaiiii', 0),
(55, 110, 3, '2', '2015-04-21 16:41:49', 'sadada', 0),
(56, 110, 3, '2', '2015-04-21 16:49:26', 'Json mode', 0),
(57, 110, 3, '2', '2015-04-21 16:50:30', 'Json lagi', 0),
(58, 110, 3, '2', '2015-04-21 16:50:44', 'HOREEEEEEEEEE berhasil', 0),
(59, 110, 1, '2', '2015-04-21 16:51:52', 'Mantap kan', 0),
(60, 110, 1, '2', '2015-04-21 16:56:22', 'Setelah ini mau diedit', 0),
(61, 110, 1, '2', '2015-04-21 17:00:35', 'ut A String To A Specified Length With PHP\n\nThursday, April 17, 2008 - 09:54\n\nCutting a string to a specified length is accomplished with the substr() function. For example, the following string variable, which we will cut to a maximum of 30 char', 0),
(62, 110, 1, '2', '2015-04-21 17:31:10', 'new jquery ajax', 0),
(63, 110, 1, '2', '2015-04-21 17:31:52', 'masa sih', 0),
(64, 110, 1, '2', '2015-04-21 17:34:15', 'asoy', 0),
(65, 110, 1, '2', '2015-04-21 17:40:07', 'Chelsea', 0),
(66, 110, 1, '2', '2015-04-21 17:41:15', 'Hazard', 0),
(67, 110, 1, '2', '2015-04-21 17:42:52', 'ajax di pindahin ke luar', 0),
(68, 110, 1, '2', '2015-04-21 17:44:52', 'Cukup untuk hari ini yaaa', 0),
(69, 110, 2, '2', '2015-04-21 17:50:52', 'Oke Baiklah', 0),
(70, 110, 2, '2', '2015-04-22 22:30:25', 'cek brow', 0),
(71, 1104, 2, '2', '2015-04-25 05:21:51', 'ijin tanya gan', 0),
(72, 1129, 2, '2', '2015-04-25 11:33:14', 'tanya doonk', 0),
(73, 1129, 2, '2', '2015-04-25 11:33:21', 'fklsdjalfjlasjflas', 0),
(74, 1129, 2, '2', '2015-04-28 17:32:31', 'aseeek capcay', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

DROP TABLE IF EXISTS `tb_galeri`;
CREATE TABLE IF NOT EXISTS `tb_galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_trip_id` int(11) NOT NULL,
  `galeri_foto_id` varchar(50) NOT NULL,
  `galeri_foto_url` varchar(100) DEFAULT NULL,
  `galeri_foto_judul` varchar(100) DEFAULT NULL,
  `galeri_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`galeri_id`),
  KEY `galeri_id` (`galeri_id`),
  KEY `idx_galeri_trip` (`galeri_trip_id`),
  KEY `galeri_trip_id` (`galeri_trip_id`),
  KEY `galeri_trip_id_2` (`galeri_trip_id`),
  KEY `galeri_foto_id` (`galeri_foto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`galeri_id`, `galeri_trip_id`, `galeri_foto_id`, `galeri_foto_url`, `galeri_foto_judul`, `galeri_date`) VALUES
(5, 193, '', 'masjid-jawa-tengah.jpg', 'kitchen_adventurer_caramel', '2015-04-22 17:00:00'),
(6, 194, '', 'badak.jpg', 'kitchen_adventurer_donut', '2015-04-22 17:00:00'),
(7, 110, '', 'kitchen_adventurer_lemon.jpg', 'kitchen_adventurer_lemon', '2015-04-22 17:00:00'),
(9, 1100, '', 'bajak.jpg', 'asoy', NULL),
(10, 1129, '', 'anak-band.jpg', 'anak-band', '2015-04-28 17:08:01'),
(11, 1109, '', 'background-blur-1.jpg', 'background-blur', '2015-04-28 17:09:15'),
(12, 1108, '', 'dancer-on-the-stage.jpg', 'dancer-on-the-stage', '2015-04-28 17:10:00'),
(13, 1104, '', 'masjid-jawa-tengah.jpg', NULL, '2015-04-28 17:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_param`
--

DROP TABLE IF EXISTS `tb_param`;
CREATE TABLE IF NOT EXISTS `tb_param` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `param_parent` int(11) DEFAULT NULL,
  `param_key` int(11) NOT NULL,
  `param_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`param_id`),
  UNIQUE KEY `param_id` (`param_id`),
  KEY `idx_param` (`param_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tb_param`
--

INSERT INTO `tb_param` (`param_id`, `param_parent`, `param_key`, `param_name`) VALUES
(2, 0, 2, 'Wisata Kota'),
(3, 0, 2, 'Wisata Alam'),
(4, 0, 2, 'Wisata Kuliner'),
(5, 0, 2, 'Wisata Sejarah'),
(6, 0, 2, 'Backpacking'),
(7, 2, 3, 'Alul-alul'),
(8, 2, 3, 'Pasar'),
(9, 2, 3, 'Taman Kota'),
(10, 2, 3, 'Peninggalan Sejarah'),
(11, 2, 3, 'Landmark Kota'),
(12, 3, 3, 'Pantai'),
(13, 3, 3, 'Gunung'),
(14, 3, 3, 'Goa'),
(15, 3, 3, 'Air Terjun'),
(16, 3, 3, 'Danau'),
(17, 3, 3, 'Sungai'),
(18, 3, 3, 'Hutan'),
(19, 3, 3, 'Kawah'),
(20, 3, 3, 'Taman Nasional'),
(21, 3, 3, 'Waduk'),
(22, 3, 3, 'Rawa'),
(23, 3, 3, 'Mata Air');

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
(1, 'status_trip', '{"status_trip":[\n{"id":"1", "name":"Wisata Kota"}, \n{"id":"2", "name":"Wisata Alam"}, \n{"id":"3", "name":"Wisata Kuliner"},\n{"id":"4", "name":"Wisata Sejarah"},\n{"id":"5", "name":"Backpacking"}\n]}'),
(2, 'transportasi', '{"transportasi":[\r\n    {"id":"1", "name":"Mobil"}, \r\n    {"id":"2", "name":"Kereta"}, \r\n    {"id":"3", "name":"Sepeda"},\r\n    {"id":"4", "name":"Motor"},\r\n    {"id":"5", "name":"Kapal laut"},\r\n    {"id":"6", "name":"Pesawat"}\r\n]}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

DROP TABLE IF EXISTS `tb_pengalaman`;
CREATE TABLE IF NOT EXISTS `tb_pengalaman` (
  `pengalaman_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengalaman_user_id` int(11) DEFAULT NULL,
  `pengalaman_judul` varchar(150) DEFAULT NULL,
  `pengalaman_isi` text NOT NULL,
  `pengalaman_lokasi` varchar(100) NOT NULL,
  `pengalaman_lat` double NOT NULL,
  `pengalaman_lot` double NOT NULL,
  `pengalaman_date` date NOT NULL,
  `pengalaman_kategori` int(2) NOT NULL,
  `pengalaman_komen` int(1) NOT NULL DEFAULT '0' COMMENT '0=komentar || 1=disable komen',
  `pengalaman_stats` int(11) NOT NULL COMMENT 'jumlah viewer',
  PRIMARY KEY (`pengalaman_id`),
  KEY `FK_pengalaman_user` (`pengalaman_user_id`),
  KEY `Idx_pengalaman_id` (`pengalaman_id`),
  KEY `pengalaman_id` (`pengalaman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'sq_trip', 1, 171),
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
  `trip_tujuan_provinsi` varchar(250) NOT NULL,
  `trip_tujuan_kota` varchar(100) NOT NULL,
  `trip_tujuan_geolat` double DEFAULT NULL,
  `trip_tujuan_geolng` double DEFAULT NULL,
  `trip_kategori` char(2) DEFAULT NULL,
  `trip_quota` tinyint(4) DEFAULT NULL,
  `trip_date1` date DEFAULT NULL,
  `trip_date2` date DEFAULT NULL,
  `trip_info` text,
  `trip_transport` varchar(100) DEFAULT NULL,
  `trip_meeting_point` varchar(50) DEFAULT NULL,
  `trip_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trip_id`),
  KEY `FK_tb_trip_tb_user` (`trip_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trip`
--

INSERT INTO `tb_trip` (`trip_id`, `trip_user_id`, `trip_judul`, `trip_tujuan`, `trip_tujuan_provinsi`, `trip_tujuan_kota`, `trip_tujuan_geolat`, `trip_tujuan_geolng`, `trip_kategori`, `trip_quota`, `trip_date1`, `trip_date2`, `trip_info`, `trip_transport`, `trip_meeting_point`, `trip_created_date`) VALUES
(0, 1, 'ini judul', 'ini tujuan', '', '', 892349328, 984010, '9', 22, '2015-04-15', '2015-04-16', 'jalan jalan yook', '23', 'jkt', '2015-04-01 16:04:21'),
(110, 1, 'judulnya coy', 'Bekasi Selatan, Jawa Barat, Indonesia', '', '', -6.258244, 106.977183, '8', 11, '2015-04-17', '2015-04-19', 'Ini adalah trip info dari database<br/>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.\r\n', '3', 'Jakarta', '2015-04-02 16:04:21'),
(193, 2, 'judul trip', 'Bekasi, Jawa Barat, Indonesia', '', '', 0, 6, '12', 6, '0000-00-00', '0000-00-00', '', '2', 'di stasiiun kranji', '2015-04-03 16:04:21'),
(194, 2, 'Lorem ipsum', 'Ancol, Daerah Khusus Ibukota Jakarta, Indonesia', '', '', 0, 6, '15', 14, '2015-04-30', '2015-04-30', '', '2', 'stasiun', '2015-04-04 16:04:21'),
(195, 2, 'Ke tasik', 'Tasikmalaya, Jawa Barat, Indonesia', '', '', -7.333333, 108.2, '16', 12, '0000-00-00', '0000-00-00', '', '3', 'alun alun', '2015-04-23 16:04:21'),
(1100, 2, 'Judul', 'Kabupaten Bandung Barat, Jawa Barat, Indonesia', 'Jawa Barat', 'Kabupaten Bandung Barat', -6.865221, 107.491977, '11', 13, '2015-04-23', '2015-04-25', '', '3', 'meetingpoin', '2015-04-23 16:04:21'),
(1104, 2, 'Bambo Rafting Di Loksado', 'Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan, Indonesia', 'Kalimantan Selatan', 'Kabupaten Hulu Sungai Selatan', -2.721761, 115.200773, '17', 4, '2015-05-29', '2015-05-31', 'Bambo rafting adalah Sebuah alat tradisional arung jeram menggunakan bambu yang di satukan dengan tali di tengah2nya di sediakan tempat duduk untuk tiga orang, lama pengarungan bambo rafting di sungai amandit loksado sekitar 2,5 jam perjalanan dengan ditemani seorang joki handal, rasakan sensasi arung jeram menggunakan bambo rafting :)', '6', 'Jakarta', '2015-04-24 18:34:36'),
(1108, 2, 'Trip Seru, Murah, Penuh Pelajaran Dan Pengalaman K', 'Banten, Indonesia', 'Banten', '', -6.405817, 106.064018, '14', 11, '0000-00-00', '0000-00-00', '', '4', 'kampung rambutan', '2015-04-24 18:43:45'),
(1109, 2, 'Ujungkulon 07-09 Agustus 2015 Naek Kano Nginap Di ', '', '', '', 0, 0, '9', 3, '2015-06-19', '2015-06-30', 'Beberapa tempat yang akan kita kunjungi di UK:\r\na. Cidaon Grazing Ground (wildlife viewing)\r\nb. Karang Copong (sunset)\r\nc. Handeuleum Island\r\nd. Canoing (Habit of Rhino)\r\ne. Snorkeling at Peucang dan Citerjun', '5', 'Rambutan', '2015-04-24 18:47:51'),
(1129, 2, 'Jalan jalan meruya', 'Jalan Meruya Utara, Kebon Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta, Indonesia', 'Daerah Khusus Ibukota Jakarta', 'Kota Jakarta Barat', -6.197561, 106.765292, '7', 14, '0000-00-00', '0000-00-00', 'kajflkajsldfjlas\r\n\r\nsfsdfsdfsd\r\n\r\n\r\nsdfsdfsafdsaf\r\n\r\nd\r\nsdfsdfsdfsfsdfs\r\n', '1', '', '2015-04-25 11:32:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_trip_member`
--

INSERT INTO `tb_trip_member` (`member_trip_id`, `member_user_id`, `member_status`, `member_id`) VALUES
(110, 1, 'A', 1),
(110, 2, 'C', 2),
(193, 2, 'A', 3),
(194, 2, 'A', 4),
(195, 2, 'A', 5),
(1100, 2, 'A', 6),
(1104, 2, 'A', 7),
(1108, 2, 'A', 8),
(1109, 2, 'A', 9),
(1129, 2, 'A', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_lokasi` varchar(100) DEFAULT NULL,
  `user_gender` char(1) DEFAULT NULL COMMENT 'L: laki laki || P: perempuan',
  `user_ttl` date DEFAULT NULL,
  `user_foto` varchar(50) DEFAULT NULL,
  `user_bio` varchar(50) DEFAULT NULL,
  `user_sosmed` varchar(100) DEFAULT NULL,
  `user_reg_date` datetime DEFAULT NULL,
  `user_info` text,
  `user_geolat` double DEFAULT NULL,
  `user_geolng` double DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_exp` text,
  `user_privacy` int(11) NOT NULL DEFAULT '0' COMMENT '0=public || 1=member',
  `user_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0=aktif || 1=deleted',
  PRIMARY KEY (`user_id`),
  KEY `idx_email_paswd` (`user_email`,`user_password`),
  KEY `idx_user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_username`, `user_email`, `user_password`, `user_lokasi`, `user_gender`, `user_ttl`, `user_foto`, `user_bio`, `user_sosmed`, `user_reg_date`, `user_info`, `user_geolat`, `user_geolng`, `user_lastlogin`, `user_ip`, `user_exp`, `user_privacy`, `user_deleted`) VALUES
(1, 'FachrulCH', '', 'fachrul.fch@gmail.com', 'fachrul', 'Jakarta', 'L', '2015-04-06', '3.jpg', 'cover1.jpg', 'fachrulCH', '2015-04-06 03:07:29', 'Info si ALu', -6.2170638, 106.82639139999999, NULL, NULL, '', 0, 0),
(2, 'Karta', '', 'karta@email.com', 'karta', 'Bekasi', 'L', '2015-04-19', '4.jpg', 'cover2.jpg', 'twiterkarta', '2015-04-19 00:00:00', 'gw adalah anak bekasi', NULL, NULL, NULL, NULL, '', 0, 0),
(3, 'bahur', '', 'bahur@email.com', 'bahur', 'padang', 'L', '2015-04-19', '1.jpg', NULL, NULL, NULL, 'ini bahur', NULL, NULL, NULL, NULL, '', 0, 0),
(4, 'asoy geboy', 'asoygeboy', 'asoy@geboy.com', 'f9ab2a14de7f36ec1bf7ac3f66498dfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'haci kiwir', 'papatong', 'imel@imel.com', '74ee55083a714aa3791f8d594fea00c9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, 'Fachrul Choliluddin', 'alul', 'fachrul.fch@gmail.com', '9c50ce0a788d7bf35a39cc25ab8cba22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
(7, 'Karta Wijaya', 'karta', 'karta@imel.com', '25b3968e7434ac9cea4a57b40f7a4956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
(8, 'error', 'erorin', 'eror@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
(9, 'haiiish', 'hasiiih', 'hasi@imel.com', 'bf1d68ac3efaf911714436c9f2b36cdb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
(10, 'aselole joss', 'aselole', 'ase@gmail.com', 'aedd8ca1ae4ca83a06f9631a323756d1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_param_parent`
--
DROP VIEW IF EXISTS `v_param_parent`;
CREATE TABLE IF NOT EXISTS `v_param_parent` (
`param_id` int(11)
,`param_name` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_trip_list`
--
DROP VIEW IF EXISTS `v_trip_list`;
CREATE TABLE IF NOT EXISTS `v_trip_list` (
`trip_id` int(11)
,`trip_judul` varchar(50)
,`trip_tujuan_provinsi` varchar(250)
,`param_name` varchar(20)
,`trip_created_date` timestamp
,`trip_gambar` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `v_param_parent`
--
DROP TABLE IF EXISTS `v_param_parent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_param_parent` AS select `b`.`param_id` AS `param_id`,`a`.`param_name` AS `param_name` from (`tb_param` `a` join `tb_param` `b`) where (`a`.`param_id` = `b`.`param_parent`);

-- --------------------------------------------------------

--
-- Structure for view `v_trip_list`
--
DROP TABLE IF EXISTS `v_trip_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_trip_list` AS select `a`.`trip_id` AS `trip_id`,`a`.`trip_judul` AS `trip_judul`,`a`.`trip_tujuan_provinsi` AS `trip_tujuan_provinsi`,(select `b`.`param_name` from `v_param_parent` `b` where (`b`.`param_id` = `a`.`trip_kategori`)) AS `param_name`,`a`.`trip_created_date` AS `trip_created_date`,(select `c`.`galeri_foto_url` from `tb_galeri` `c` where (`c`.`galeri_trip_id` = `a`.`trip_id`) order by rand() limit 0,1) AS `trip_gambar` from `tb_trip` `a` order by `a`.`trip_created_date` desc;

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
-- Constraints for table `tb_trip`
--
ALTER TABLE `tb_trip`
  ADD CONSTRAINT `FK_tb_trip_tb_user` FOREIGN KEY (`trip_user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_trip_member`
--
ALTER TABLE `tb_trip_member`
  ADD CONSTRAINT `FK_tb_trip_member_tb_user` FOREIGN KEY (`member_user_id`) REFERENCES `tb_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
