-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.6.17 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.1.0.4938
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_temanbackpacker
DROP DATABASE IF EXISTS `db_temanbackpacker`;
CREATE DATABASE IF NOT EXISTS `db_temanbackpacker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_temanbackpacker`;


-- Dumping structure for table db_temanbackpacker.tb_chat
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
  KEY `FK_chat_user` (`chat_sender`),
  CONSTRAINT `FK_chat_trip` FOREIGN KEY (`chat_trip_id`) REFERENCES `tb_trip` (`trip_id`),
  CONSTRAINT `FK_chat_user` FOREIGN KEY (`chat_sender`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_chat: ~59 rows (approximately)
/*!40000 ALTER TABLE `tb_chat` DISABLE KEYS */;
REPLACE INTO `tb_chat` (`chat_id`, `chat_trip_id`, `chat_sender`, `chat_type`, `chat_date`, `chat_mesej`, `chat_deleted`) VALUES
	(1, 110, 1, '2', '2015-04-18 02:24:35', 'ini pertanyaan test', 0),
	(2, 110, 1, '2', '2015-04-18 02:26:06', 'ini pertanyaan by menu loch', 0),
	(3, 110, 1, '2', '2015-04-18 04:32:28', 'Coba input dari hape', 0),
	(4, 110, 1, '2', '2015-04-18 17:43:20', 'ini percobaan isi\nenter\nenter\nenter\nenter\nahir', 0),
	(5, 110, 1, '2', '2015-04-18 18:28:37', 'tambah baru ini', 0),
	(6, 110, 1, '2', '2015-04-18 18:31:16', 'keduax ini tambah baru lagi gan', 0),
	(7, 110, 1, '2', '2015-04-18 18:33:52', 'ketigax kalinya', 0),
	(8, 110, 1, '2', '2015-04-18 18:36:56', 'coba ke empat kalinya\n\nsfhkashfka\nsfjhaskfhaks\naskjfhakjshfka', 0),
	(9, 110, 1, '2', '2015-04-18 19:15:17', 'ga jadi di pindahin ajax nya', 0),
	(10, 110, 1, '2', '2015-04-19 17:00:26', 'perubahan ajax reload nya', 0),
	(11, 110, 1, '2', '2015-04-19 17:13:51', 'apakah ini akan tampil brojQuery21100897971021477133_1429438420066', 0),
	(12, 110, 1, '2', '2015-04-19 17:15:06', 'ini parse error deuh', 0),
	(13, 110, 1, '2', '2015-04-19 17:50:04', 'apakah jadi nih perubahan gw', 0),
	(14, 110, 1, '2', '2015-04-19 17:50:18', 'mantap gan', 0),
	(15, 110, 1, '2', '2015-04-19 18:06:34', 'ini karta coy', 0),
	(25, 110, 2, '2', '2015-04-19 21:55:02', 'Pujangga', 0),
	(26, 110, 3, '2', '2015-04-19 22:28:25', 'ini bahur', 0),
	(27, 110, 3, '2', '2015-04-19 22:38:21', 'asem', 0),
	(28, 110, 3, '2', '2015-04-19 22:38:22', 'asem', 0),
	(29, 110, 3, '2', '2015-04-19 22:39:21', 'tanya donk bro', 0),
	(30, 110, 3, '2', '2015-04-20 00:42:13', 'tes waktu', 0),
	(31, 110, 3, '2', '2015-04-20 00:43:31', 'cek lagi', 0),
	(32, 110, 3, '2', '2015-04-20 00:54:45', 'cek waktu', 0),
	(33, 110, 3, '2', '2015-04-20 01:05:04', 'tes waktu', 0),
	(34, 110, 3, '2', '2015-04-20 21:38:36', 'Rikson ini dia', 0),
	(35, 110, 3, '2', '2015-04-20 21:40:31', 'asoy geboy', 0),
	(36, 110, 3, '2', '2015-04-20 21:41:05', 'coba lagi aaah', 0),
	(37, 110, 3, '2', '2015-04-21 05:10:28', 'duaaar', 0),
	(38, 110, 3, '2', '2015-04-21 15:58:56', 'asoy', 0),
	(39, 110, 3, '2', '2015-04-21 21:23:05', 'peningkatan', 0),
	(42, 110, 3, '2', '2015-04-21 21:50:47', 'masih eror ternyata', 0),
	(43, 110, 3, '2', '2015-04-21 21:54:47', 'avenger', 0),
	(44, 110, 3, '2', '2015-04-21 21:55:16', '"tanya \' ku\'tip" ', 0),
	(45, 110, 3, '2', '2015-04-21 21:56:00', '', 0),
	(46, 110, 3, '2', '2015-04-21 21:57:59', 'masa sih bro?', 0),
	(47, 0, 3, '2', '2015-04-21 22:41:07', 'bs?', 0),
	(48, 0, 3, '2', '2015-04-21 22:43:54', 'sadadasda', 0),
	(49, 110, 3, '2', '2015-04-21 23:19:49', 'sadada', 0),
	(50, 110, 3, '2', '2015-04-21 23:26:56', 'return baru', 0),
	(51, 110, 3, '2', '2015-04-21 23:32:15', 'list', 0),
	(52, 110, 3, '2', '2015-04-21 23:38:36', 'jebraw', 0),
	(53, 110, 3, '2', '2015-04-21 23:40:03', 'mamam', 0),
	(54, 110, 3, '2', '2015-04-21 23:41:18', 'andaiiii', 0),
	(55, 110, 3, '2', '2015-04-21 23:41:49', 'sadada', 0),
	(56, 110, 3, '2', '2015-04-21 23:49:26', 'Json mode', 0),
	(57, 110, 3, '2', '2015-04-21 23:50:30', 'Json lagi', 0),
	(58, 110, 3, '2', '2015-04-21 23:50:44', 'HOREEEEEEEEEE berhasil', 0),
	(59, 110, 1, '2', '2015-04-21 23:51:52', 'Mantap kan', 0),
	(60, 110, 1, '2', '2015-04-21 23:56:22', 'Setelah ini mau diedit', 0),
	(61, 110, 1, '2', '2015-04-22 00:00:35', 'ut A String To A Specified Length With PHP\n\nThursday, April 17, 2008 - 09:54\n\nCutting a string to a specified length is accomplished with the substr() function. For example, the following string variable, which we will cut to a maximum of 30 char', 0),
	(62, 110, 1, '2', '2015-04-22 00:31:10', 'new jquery ajax', 0),
	(63, 110, 1, '2', '2015-04-22 00:31:52', 'masa sih', 0),
	(64, 110, 1, '2', '2015-04-22 00:34:15', 'asoy', 0),
	(65, 110, 1, '2', '2015-04-22 00:40:07', 'Chelsea', 0),
	(66, 110, 1, '2', '2015-04-22 00:41:15', 'Hazard', 0),
	(67, 110, 1, '2', '2015-04-22 00:42:52', 'ajax di pindahin ke luar', 0),
	(68, 110, 1, '2', '2015-04-22 00:44:52', 'Cukup untuk hari ini yaaa', 0),
	(69, 110, 2, '2', '2015-04-22 00:50:52', 'Oke Baiklah', 0),
	(70, 110, 2, '2', '2015-04-23 05:30:25', 'cek brow', 0),
	(71, 1104, 2, '2', '2015-04-25 12:21:51', 'ijin tanya gan', 0),
	(72, 1129, 2, '2', '2015-04-25 18:33:14', 'tanya doonk', 0),
	(73, 1129, 2, '2', '2015-04-25 18:33:21', 'fklsdjalfjlasjflas', 0),
	(74, 1129, 2, '2', '2015-04-29 00:32:31', 'aseeek capcay', 0);
/*!40000 ALTER TABLE `tb_chat` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_galeri
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_galeri: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_galeri` DISABLE KEYS */;
REPLACE INTO `tb_galeri` (`galeri_id`, `galeri_trip_id`, `galeri_foto_id`, `galeri_foto_url`, `galeri_foto_judul`, `galeri_date`) VALUES
	(5, 193, '', 'masjid-jawa-tengah.jpg', 'kitchen_adventurer_caramel', '2015-04-23 00:00:00'),
	(6, 194, '', 'badak.jpg', 'kitchen_adventurer_donut', '2015-04-23 00:00:00'),
	(7, 110, '', 'kitchen_adventurer_lemon.jpg', 'kitchen_adventurer_lemon', '2015-04-23 00:00:00'),
	(9, 1100, '', 'bajak.jpg', 'asoy', NULL),
	(10, 1129, '', 'anak-band.jpg', 'anak-band', '2015-04-29 00:08:01'),
	(11, 1109, '', 'background-blur-1.jpg', 'background-blur', '2015-04-29 00:09:15'),
	(12, 1108, '', 'dancer-on-the-stage.jpg', 'dancer-on-the-stage', '2015-04-29 00:10:00'),
	(13, 1104, '', 'masjid-jawa-tengah.jpg', NULL, '2015-04-29 00:10:27'),
	(14, 45, 'badak.jpg', 'badak.jpg', 'badak.jpg', '2015-05-09 02:31:19');
/*!40000 ALTER TABLE `tb_galeri` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_param
DROP TABLE IF EXISTS `tb_param`;
CREATE TABLE IF NOT EXISTS `tb_param` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `param_parent` int(11) DEFAULT NULL,
  `param_key` int(11) NOT NULL,
  `param_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`param_id`),
  UNIQUE KEY `param_id` (`param_id`),
  KEY `idx_param` (`param_key`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_param: ~22 rows (approximately)
/*!40000 ALTER TABLE `tb_param` DISABLE KEYS */;
REPLACE INTO `tb_param` (`param_id`, `param_parent`, `param_key`, `param_name`) VALUES
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
/*!40000 ALTER TABLE `tb_param` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_parameter
DROP TABLE IF EXISTS `tb_parameter`;
CREATE TABLE IF NOT EXISTS `tb_parameter` (
  `parameter_id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter_name` varchar(50) NOT NULL,
  `parameter_desc` text NOT NULL,
  PRIMARY KEY (`parameter_id`),
  KEY `parameter_name` (`parameter_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_parameter: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_parameter` DISABLE KEYS */;
REPLACE INTO `tb_parameter` (`parameter_id`, `parameter_name`, `parameter_desc`) VALUES
	(1, 'status_trip', '{"status_trip":[\n{"id":"1", "name":"Wisata Kota"}, \n{"id":"2", "name":"Wisata Alam"}, \n{"id":"3", "name":"Wisata Kuliner"},\n{"id":"4", "name":"Wisata Sejarah"},\n{"id":"5", "name":"Backpacking"}\n]}'),
	(2, 'transportasi', '{"transportasi":[\r\n    {"id":"1", "name":"Mobil"}, \r\n    {"id":"2", "name":"Kereta"}, \r\n    {"id":"3", "name":"Sepeda"},\r\n    {"id":"4", "name":"Motor"},\r\n    {"id":"5", "name":"Kapal laut"},\r\n    {"id":"6", "name":"Pesawat"}\r\n]}');
/*!40000 ALTER TABLE `tb_parameter` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_pengalaman
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
  `pengalaman_flag_komen` int(11) NOT NULL DEFAULT '0' COMMENT '0=disable| 1=bisa komentar',
  `pengalaman_stats` int(11) NOT NULL COMMENT 'jumlah viewer',
  `pengalaman_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengalaman_id`),
  KEY `FK_pengalaman_user` (`pengalaman_user_id`),
  KEY `Idx_pengalaman_id` (`pengalaman_id`),
  KEY `pengalaman_id` (`pengalaman_id`),
  CONSTRAINT `FK_pengalaman_user` FOREIGN KEY (`pengalaman_user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=438 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_pengalaman: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_pengalaman` DISABLE KEYS */;
REPLACE INTO `tb_pengalaman` (`pengalaman_id`, `pengalaman_user_id`, `pengalaman_judul`, `pengalaman_isi`, `pengalaman_lokasi`, `pengalaman_lat`, `pengalaman_lot`, `pengalaman_date`, `pengalaman_kategori`, `pengalaman_flag_komen`, `pengalaman_stats`, `pengalaman_created`) VALUES
	(45, 2, 'pertamax coy', 'iasjfhkjashfkalfalsfjklsjdf', '-6.23827,106.975573', -6.23827, 106.975573, '2015-05-01', 8, 1, 1, '2015-05-01 20:04:19'),
	(412, 1, 'Taman Impian Jaya Ancol', '<dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Pantai dan Taman</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Taman dan pantai merupakan wahana hiburan yang menawarkan kesegaran suasana pantai bagi semua kalangan dan usia. Pantai dan Taman memiliki 5 pantai (Pantai Festival, Indah, Elok, Ria dan Carnival Beach Club) dan Danau Impian, sepanjang kurang lebih 5Â km, dengan promenade sepanjang 4Â km.</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Dunia Fantasi ( Dufan )</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Dunia Fantasi yang dibuka untuk umum pada 29 Agustus 1986, dan popular dengan sebutanÂ <b>Dufan</b>, merupakan theme park pertama yang dikembangkan oleh Ancol. Dufan merupakan pusat hiburan outdoor terbesar di Indonesia yang memanjakan pengunjung dengan Fantasi Keliling Dunia, melalui berbagai content wahana permainan berteknologi tinggi, yang terbagi dalam 8 kawasan, yaitu: Indonesia, Jakarta, Asia, Eropa, Amerika, Yunani, Hikayat dan Balada Kera. Perseroan juga menjadikan Dufan sebagai salah satu pusat edutainment yang ada di Ancol yakni dengan dibukanya Fisika Dunia Fantasi (Fidufa) dan Pentas Prestasi. Dufan telah memiliki sertifikat ISO 9001:2008 sejak 2009.</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Atlantis Water Adventure ( Atlantis )</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Atlantis Water Adventure (AWA) merupakan theme park kedua yang dikembangkan oleh Ancol dan berdiri diatas lahan seluas 5 hektare. AWA merupakan hasil revitalisasi Taman Rekreasi Air Gelanggang Renang Ancol yang akan memberi pengunjung petualangan wisata air dengan 8 kolam utama, yaitu: Poseidon, Antila, Plaza Atlas, Aquarius, Octopus, Atlantean, dan Kiddy Pool.</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Gelanggang Samudra ( Samudra )</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Gelanggang Samudra Ancol ("Samudra") merupakan theme park ketiga yang dikembangkan oleh Ancol. Samudra merupakan edutainment theme park bernuansa konservasi alam yang memberikan pengalaman kepada pengunjung untuk mengenal lebih dekat dan menyayangi aneka satwa, antara lain lumba-lumba, paus putih, anjing laut, dan sinema 4D. Di Sinema 4D atau pertunjukan 4 dimensi, Anda harus mengantri untuk masuk ke dalam bangunan teater ini. Di dalam, petugas akan membagikan kacamata 3 dimensi. Setelah menunggu beberapa lama di depan pintu, penonton akan masuk ke dalam teater. Film yang disajikan berdurasi kurang lebih 15 menit. Dengan memakai kacamata 3 dimensi, Anda akan merasakan gambar ada di depan Anda dan seolah dapat disentuh, ditambah dengan kursi yang dapat bergoyang-goyang dan semburan air atau angin pada adegan tertentu sehingga Anda dapat mesakana suasana sesungguhnya. Ada 5 pilihan jadwal pada hari Senin sampai Sabtu dan 2 kali ekstra pertunjukan pada hari Minggu dan hari Libur. Tapi, Anda hanya dapat menontonnya satu kali karena untuk masuk ke dalam wahana ini harus menggunakan tiket yang terdapat pada tiket masuk.</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Sea World</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Sea World adalah underwater aquarium pertama dan satu-satunya di Indonesia, dengan area seluas 2 Ha (dikelola dengan format BOT).</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Putri Duyung Cottages</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Penginapan tepi pantai bergaya unik berbentuk cottages dengan 133 kamar ini memiliki berbagai fasilitas khusus, sepertiÂ : ruang serba guna, ruang rapat dan lokasi pesta pantai. Putri Duyung juga menawarkan fasilitas olahraga, seperti kolam renang, tenis meja, sepeda, lapangan tenis, serta lapanan voli pantai. Arsitektur artistik Putri Duyung Ancol kental dengan perpaduan gaya posmo dan romantisme Indonesia Timur, ditata selaras dengan lingkungan pantai untuk menciptakan suasana yang berselera dan eksotik.</p><dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;"><dt style="margin-bottom: 0.1em;">Padang Golf Ancol</dt></dl><p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;">Padang Golf bernuansa pantai di tengah-tengah kawasan wisata yang memiliki 18 hole dengan desain lapangan unik. Lokasinya strategis dan mudah dicapai dari seluruh penjuru Jakarta.</p>', 'Ancol, Pademangan, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta, Indonesia', -6.132975, 106.826687, '2015-04-02', 11, 1, 6, '2015-05-03 21:04:19'),
	(423, 1, 'Pengalaman ke tiga', 'haha cikiwir', 'Pangandaran, Cinere, Kota Depok, Jawa Barat 16514, Indonesia', -6.318115, 106.78166, '2015-05-09', 12, 1, 1, '2015-04-12 21:04:19'),
	(431, 1, 'Taman Mini Indonesia Indah', '<span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-headline\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" id=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Sejarah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Sejarah</span><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"-webkit-user-select:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-size:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" small;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" margin-left:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 1em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" vertical-align:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" baseline;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" line-height:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" display:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" inline-block;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" white-space:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" nowrap;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" unicode-bidi:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" -webkit-isolate;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-family:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sans-serif;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\"><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-bracket\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-right:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.25em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">[</span><a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/w/index.php?title=Taman_Mini_Indonesia_Indah&veaction=edit&vesection=1\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Sunting\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" bagian:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sejarah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-visualeditor\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">sunting</a><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-divider\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Â |Â </span><a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/w/index.php?title=Taman_Mini_Indonesia_Indah&action=editÂ§ion=1\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Sunting\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" bagian:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sejarah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">sunting sumber</a><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-bracket\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-left:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.25em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">]</span></span><p style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-top:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.5em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" margin-bottom:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" line-height:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 22.3999996185303px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-family:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sans-serif;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-size:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 14px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" white-space:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" normal;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Gagasan pembangunan suatu miniatur yang memuat kelengkapan Indonesia dengan segala isinya ini dicetuskan oleh Ibu Negara,Â <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/Siti_Hartinah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Siti\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" hartinah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Siti Hartinah</a>, yang lebih dikenal dengan sebutan Ibu Tien Soeharto. Gagasan ini tercetus pada suatu pertemuan di Jalan Cendana no. 8 Jakarta pada tanggalÂ <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/13_Maret\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"13\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" maret\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">13 Maret</a>Â <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/1970\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"1970\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">1970</a>. Melalui miniatur ini diharapkan dapat membangkitkan rasa bangga dan rasa cinta tanah air pada seluruh bangsa Indonesia.<a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/Taman_Mini_Indonesia_Indah#cite_note-TMIIweb-2\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">[2]</a>Â Maka dimulailah suatu proyek yang disebut Proyek Miniatur Indonesia \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Indonesia Indah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\", yang dilaksanakan olehÂ <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/w/index.php?title=Yayasan_Harapan_Kita&action=edit&redlink=1\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"new\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Yayasan\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" harapan=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" kita=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" (halaman=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" belum=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" tersedia)\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(165,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 88,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 88);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Yayasan Harapan Kita</a>.</p><p style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-top:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.5em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" margin-bottom:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" line-height:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 22.3999996185303px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-family:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sans-serif;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-size:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 14px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" white-space:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" normal;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">TMII mulai dibangun tahunÂ <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/1972\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"1972\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">1972</a>Â dan diresmikan pada tanggalÂ <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/20_April\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"20\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" april\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">20 April</a>Â <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/1975\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"1975\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">1975</a>. Berbagai aspek kekayaan alam dan budaya Indonesia sampai pemanfaatan teknologi modern diperagakan di areal seluas 150 hektare. Aslinya topografi TMII agak berbukit, tetapi ini sesuai dengan keinginan perancangnya. Tim perancang memanfaatkan ketinggian tanah yang tidak rata ini untuk menciptakan bentang alam dan lansekap yang kaya, menggambarkan berbagai jenis lingkungan hidup di Indonesia.<a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/Taman_Mini_Indonesia_Indah#cite_note-TMIIweb-2\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">[2]</a></p><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-headline\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" id=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Logo_dan_maskot\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Logo dan maskot</span><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"-webkit-user-select:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-size:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" small;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" margin-left:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 1em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" vertical-align:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" baseline;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" line-height:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" display:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" inline-block;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" white-space:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" nowrap;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" unicode-bidi:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" -webkit-isolate;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-family:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sans-serif;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\"><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-bracket\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-right:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.25em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">[</span><a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/w/index.php?title=Taman_Mini_Indonesia_Indah&veaction=edit&vesection=2\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Sunting\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" bagian:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" logo=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" dan=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" maskot\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-visualeditor\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">sunting</a><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-divider\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Â |Â </span><a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/w/index.php?title=Taman_Mini_Indonesia_Indah&action=editÂ§ion=2\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Sunting\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" bagian:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" logo=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" dan=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" maskot\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">sunting sumber</a><span class=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"mw-editsection-bracket\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-left:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.25em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 85);\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">]</span></span><p style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"margin-top:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0.5em;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" margin-bottom:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" line-height:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 22.3999996185303px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" color:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 37);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-family:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" sans-serif;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" font-size:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 14px;=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" white-space:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" normal;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">TMII memiliki logo yang pada intinya terdiri atas huruf TMII, Singkatan dari \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Taman Mini Indonesia Indah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\". Sedangkan maskotnya berupa tokoh wayangÂ <a href=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"http://id.wikipedia.org/wiki/Hanoman\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" title=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Hanoman\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" style=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"color:\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" rgb(11,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 0,=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" 128);=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" background-image:=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\" none;\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"=\\"\\\\\\"\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\\\\\\\\\\\\\\"\\\\\\"\\">Hanoman</a>Â yang dinamakan NITRA (Anjani Putra). Maskot Taman Mini \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"Indonesia Indah\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" ini diresmikan penggunaannya oleh Ibu Tien Soeharto, bertepatan dengan dwi windu usia TMII, pada tahun 1991.</p>', 'Jakarta Timur, DKI Jakarta, Indonesia', -6.302446, 106.895156, '2015-05-09', 11, 1, 35, '2015-03-12 21:04:19'),
	(433, 1, 'Wisata Kuliner Kota Tasikmalaya', '<p><span style="color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: small; line-height: 16.8999996185303px; text-align: justify; white-space: normal;">Kota Tasikmalaya terkenal sebagai kota tujuan wisata kuliner. Berbagai jenis jajanan tradisional dan modern dapat kita jumpai di berbagai sudut kota, mulai pagi sampai malam hari. Rasa makanan yang khas, menggugah selera siapapun yang datang untuk menikmatinya. Sajian kuliner yang tersedia diantaranya adalah kupat tahu, bubur ayam, bakso, soto, sajian makanan khas Tatar Sunda dalam konsep resto saung Sunda, aneka olahan minuman segar, rujak, asinan, dan lain sebagainya. Makanan khas Tasikmalaya adalah tutug oncom atau biasa di sebut TO. Makanan ini di sajikan dengan sambal goang, sayuran, lalaban, tahu, tempe, ayam goreng, ikan asin, dll. Kini TO tersedia dalam bentuk kemasan abon tutug oncom. Berikut ini, tabel sebagian tempat wisata kuliner :</span></p><p><span style="color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: small; line-height: 16.8999996185303px; text-align: justify; white-space: normal;"></span></p><p><span style="color: rgb(0, 0, 0); font-family: arial, helvetica, sans-serif; font-size: small; line-height: 16.8999996185303px; text-align: justify; white-space: normal;"></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 11.6999998092651px; line-height: 16.8999996185303px; text-align: justify; white-space: normal;">', 'Kota Tasikmalaya, Kota Tasikmalaya, Jawa Barat, Indonesia', -7.333333, 108.2, '2015-04-11', 8, 1, 0, '2015-01-12 21:04:19'),
	(434, 1, 'Kota Bogor', '<b style="color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;">Kota Bogor</b><span style="color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;">', 'Kota Bogor, Kota Bogor, Jawa Barat, Indonesia', -6.6, 106.8, '2015-04-04', 10, 0, 0, '2015-05-12 21:37:57'),
	(435, 1, 'Kabupaten Banyumas', '<p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;"><b>Kabupaten Banyumas</b>', 'Kabupaten Banyumas, Jawa Tengah, Indonesia', -7.483213, 109.140438, '2015-03-07', 19, 0, 0, '2015-05-12 21:39:54'),
	(436, 2, 'Kota Bekasi', '<b style="color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;">Kota Bekasi</b><span style="color: rgb(37, 37, 37); font-family: sans-serif; line-height: 22.3999996185303px; white-space: normal;">', 'Kota Bekasi, Kota Bekasi, Jawa Barat, Indonesia', -6.23827, 106.975573, '2015-04-18', 11, 1, 0, '2015-05-12 21:51:14'),
	(437, 2, 'Blu Plaza', '<p style="margin-top: 0.5em; margin-bottom: 0.5em; line-height: 22.3999996185303px; color: rgb(37, 37, 37); font-family: sans-serif; font-size: 14px; white-space: normal;"><b>', 'Bekasi Timur, Kota Bekasi, Jawa Barat, Indonesia', -6.236254, 107.024417, '2015-05-02', 8, 1, 0, '2015-05-12 21:53:45');
/*!40000 ALTER TABLE `tb_pengalaman` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_seq
DROP TABLE IF EXISTS `tb_seq`;
CREATE TABLE IF NOT EXISTS `tb_seq` (
  `seq_id` int(11) NOT NULL AUTO_INCREMENT,
  `seq_name` varchar(50) NOT NULL,
  `seq_prefix` int(11) NOT NULL,
  `seq_val` int(11) NOT NULL,
  PRIMARY KEY (`seq_id`),
  KEY `seq_name` (`seq_name`),
  KEY `seq_name_2` (`seq_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_seq: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_seq` DISABLE KEYS */;
REPLACE INTO `tb_seq` (`seq_id`, `seq_name`, `seq_prefix`, `seq_val`) VALUES
	(1, 'sq_trip', 1, 175),
	(2, 'seq_tanya', 2, 0),
	(3, 'seq_diskusi', 3, 0),
	(4, 'seq_exp', 4, 37);
/*!40000 ALTER TABLE `tb_seq` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_trip
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
  KEY `FK_tb_trip_tb_user` (`trip_user_id`),
  CONSTRAINT `FK_tb_trip_tb_user` FOREIGN KEY (`trip_user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_trip: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_trip` DISABLE KEYS */;
REPLACE INTO `tb_trip` (`trip_id`, `trip_user_id`, `trip_judul`, `trip_tujuan`, `trip_tujuan_provinsi`, `trip_tujuan_kota`, `trip_tujuan_geolat`, `trip_tujuan_geolng`, `trip_kategori`, `trip_quota`, `trip_date1`, `trip_date2`, `trip_info`, `trip_transport`, `trip_meeting_point`, `trip_created_date`) VALUES
	(0, 1, 'ini judul', 'ini tujuan', '', '', 892349328, 984010, '9', 22, '2015-04-15', '2015-04-16', 'jalan jalan yook', '23', 'jkt', '2015-04-01 23:04:21'),
	(110, 1, 'judulnya coy', 'Bekasi Selatan, Jawa Barat, Indonesia', '', '', -6.258244, 106.977183, '8', 11, '2015-04-17', '2015-04-19', 'Ini adalah trip info dari database<br/>\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.\r\n', '3', 'Jakarta', '2015-04-02 23:04:21'),
	(193, 2, 'judul trip', 'Bekasi, Jawa Barat, Indonesia', '', '', 0, 6, '12', 6, '0000-00-00', '0000-00-00', '', '2', 'di stasiiun kranji', '2015-04-03 23:04:21'),
	(194, 2, 'Lorem ipsum', 'Ancol, Daerah Khusus Ibukota Jakarta, Indonesia', '', '', 0, 6, '15', 14, '2015-04-30', '2015-04-30', '', '2', 'stasiun', '2015-04-04 23:04:21'),
	(195, 2, 'Ke tasik', 'Tasikmalaya, Jawa Barat, Indonesia', '', '', -7.333333, 108.2, '16', 12, '0000-00-00', '0000-00-00', '', '3', 'alun alun', '2015-04-23 23:04:21'),
	(1100, 2, 'Judul', 'Kabupaten Bandung Barat, Jawa Barat, Indonesia', 'Jawa Barat', 'Kabupaten Bandung Barat', -6.865221, 107.491977, '11', 13, '2015-04-23', '2015-04-25', '', '3', 'meetingpoin', '2015-04-23 23:04:21'),
	(1104, 2, 'Bambo Rafting Di Loksado', 'Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan, Indonesia', 'Kalimantan Selatan', 'Kabupaten Hulu Sungai Selatan', -2.721761, 115.200773, '17', 4, '2015-05-29', '2015-05-31', 'Bambo rafting adalah Sebuah alat tradisional arung jeram menggunakan bambu yang di satukan dengan tali di tengah2nya di sediakan tempat duduk untuk tiga orang, lama pengarungan bambo rafting di sungai amandit loksado sekitar 2,5 jam perjalanan dengan ditemani seorang joki handal, rasakan sensasi arung jeram menggunakan bambo rafting :)', '6', 'Jakarta', '2015-04-25 01:34:36'),
	(1108, 2, 'Trip Seru, Murah, Penuh Pelajaran Dan Pengalaman K', 'Banten, Indonesia', 'Banten', '', -6.405817, 106.064018, '14', 11, '0000-00-00', '0000-00-00', '', '4', 'kampung rambutan', '2015-04-25 01:43:45'),
	(1109, 2, 'Ujungkulon 07-09 Agustus 2015 Naek Kano Nginap Di ', '', '', '', 0, 0, '9', 3, '2015-06-19', '2015-06-30', 'Beberapa tempat yang akan kita kunjungi di UK:\r\na. Cidaon Grazing Ground (wildlife viewing)\r\nb. Karang Copong (sunset)\r\nc. Handeuleum Island\r\nd. Canoing (Habit of Rhino)\r\ne. Snorkeling at Peucang dan Citerjun', '5', 'Rambutan', '2015-04-25 01:47:51'),
	(1129, 2, 'Jalan jalan meruya', 'Jalan Meruya Utara, Kebon Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta, Indonesia', 'Daerah Khusus Ibukota Jakarta', 'Kota Jakarta Barat', -6.197561, 106.765292, '7', 14, '0000-00-00', '0000-00-00', 'kajflkajsldfjlas\r\n\r\nsfsdfsdfsd\r\n\r\n\r\nsdfsdfsafdsaf\r\n\r\nd\r\nsdfsdfsdfsfsdfs\r\n', '1', '', '2015-04-25 18:32:45');
/*!40000 ALTER TABLE `tb_trip` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_trip_member
DROP TABLE IF EXISTS `tb_trip_member`;
CREATE TABLE IF NOT EXISTS `tb_trip_member` (
  `member_trip_id` int(11) NOT NULL,
  `member_user_id` int(11) DEFAULT NULL,
  `member_status` char(1) DEFAULT NULL COMMENT 'A: host | B: ijin join | C: udah join |  D: cancel | E: kabur',
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`member_id`),
  KEY `FK_tb_trip_member_tb_user` (`member_user_id`),
  CONSTRAINT `FK_tb_trip_member_tb_user` FOREIGN KEY (`member_user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_trip_member: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_trip_member` DISABLE KEYS */;
REPLACE INTO `tb_trip_member` (`member_trip_id`, `member_user_id`, `member_status`, `member_id`) VALUES
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
/*!40000 ALTER TABLE `tb_trip_member` ENABLE KEYS */;


-- Dumping structure for table db_temanbackpacker.tb_user
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
  `user_reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_info` text,
  `user_geolat` double DEFAULT NULL,
  `user_geolng` double DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `user_exp` text,
  `user_privacy` int(11) NOT NULL DEFAULT '0' COMMENT '0=public || 1=member',
  `user_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0=aktif || 1=deleted',
  PRIMARY KEY (`user_id`),
  KEY `idx_email_paswd` (`user_email`,`user_password`),
  KEY `idx_user_name` (`user_name`,`user_password`),
  KEY `idx_search_username` (`user_username`),
  KEY `idx_search_email` (`user_email`,`user_password`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_temanbackpacker.tb_user: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`user_id`, `user_name`, `user_username`, `user_email`, `user_password`, `user_lokasi`, `user_gender`, `user_ttl`, `user_foto`, `user_bio`, `user_sosmed`, `user_reg_date`, `user_info`, `user_geolat`, `user_geolng`, `user_ip`, `user_exp`, `user_privacy`, `user_deleted`) VALUES
	(1, 'FachrulCH', 'Kurawal', 'fachrul.fch@gmail.com', '74ee55083a714aa3791f8d594fea00c9', 'Jakarta', 'P', '2015-04-06', '', 'Ini bio', 'fachrul.fch@gmail.com', '2015-04-06 03:07:29', 'Info si ALu', 0, 0, NULL, '', 0, 0),
	(2, 'Karta', 'Pendekar', 'karta@email.com', '63954d2707c13cf25472551ea783ae1f', 'Bekasi', 'L', '2015-04-19', '4.jpg', 'cover2.jpg', 'twiterkarta', '2015-04-19 00:00:00', 'gw adalah anak bekasi', NULL, NULL, NULL, '', 0, 0),
	(3, 'bahur', '', 'bahur@email.com', 'bahur', 'padang', 'L', '2015-04-19', '1.jpg', NULL, NULL, NULL, 'ini bahur', NULL, NULL, NULL, '', 0, 0),
	(4, 'asoy geboy', 'asoygeboy', 'asoy@geboy.com', 'f9ab2a14de7f36ec1bf7ac3f66498dfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
	(5, 'haci kiwir', 'papatong', 'imel@imel.com', '74ee55083a714aa3791f8d594fea00c9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
	(6, 'Fachrul Choliluddin', 'alul', 'fachrul.fch@gmail.come', '9c50ce0a788d7bf35a39cc25ab8cba22', 'Cikini, Daerah Khusus Ibukota Jakarta, Indonesia', 'L', '1991-11-01', NULL, 'aselole', '@twitter.com', NULL, NULL, -6.192515, 106.839962, '::1', 'ke gunung, pantai', 0, 0),
	(7, 'Karta Wijaya', 'karta', 'karta@imel.com', '25b3968e7434ac9cea4a57b40f7a4956', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
	(8, 'error', 'erorin', 'eror@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
	(9, 'haiiish', 'hasiiih', 'hasi@imel.com', 'bf1d68ac3efaf911714436c9f2b36cdb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0),
	(10, 'aselole joss', 'aselole', 'ase@gmail.com', 'aedd8ca1ae4ca83a06f9631a323756d1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '::1', NULL, 0, 0);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for view db_temanbackpacker.v_exp_list
DROP VIEW IF EXISTS `v_exp_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_exp_list` (
	`pengalaman_id` INT(11) NOT NULL,
	`pengalaman_user_id` INT(11) NULL,
	`pengalaman_judul` VARCHAR(150) NULL COLLATE 'latin1_swedish_ci',
	`pengalaman_lokasi` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`pengalaman_date` DATE NOT NULL,
	`pengalaman_kategori` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`foto` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`pengalaman_created` TIMESTAMP NULL,
	`username` VARCHAR(25) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view db_temanbackpacker.v_param_parent
DROP VIEW IF EXISTS `v_param_parent`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_param_parent` (
	`param_id` INT(11) NOT NULL,
	`param_name` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view db_temanbackpacker.v_trip_list
DROP VIEW IF EXISTS `v_trip_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `v_trip_list` (
	`trip_id` INT(11) NOT NULL,
	`trip_judul` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`trip_tujuan_provinsi` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`param_name` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`trip_created_date` TIMESTAMP NOT NULL,
	`trip_gambar` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


-- Dumping structure for view db_temanbackpacker.v_exp_list
DROP VIEW IF EXISTS `v_exp_list`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_exp_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_exp_list` AS SELECT a.pengalaman_id, a.pengalaman_user_id, a.pengalaman_judul, a.pengalaman_lokasi, a.pengalaman_date, 
(
SELECT b.param_name
FROM v_param_parent b
WHERE b.param_id = a.pengalaman_kategori) AS pengalaman_kategori, 
(
SELECT c.galeri_foto_url
FROM tb_galeri c
WHERE (c.galeri_trip_id = a.pengalaman_id)
ORDER BY RAND()
LIMIT 0,1) AS foto,
a.pengalaman_created,
(select u.user_username from tb_user u where u.user_id = a.pengalaman_user_id) as username
FROM tb_pengalaman a ;


-- Dumping structure for view db_temanbackpacker.v_param_parent
DROP VIEW IF EXISTS `v_param_parent`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_param_parent`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_param_parent` AS select b.param_id,a.param_name from tb_param a, tb_param b where a.param_id = b.param_parent ;


-- Dumping structure for view db_temanbackpacker.v_trip_list
DROP VIEW IF EXISTS `v_trip_list`;
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `v_trip_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `v_trip_list` AS select a.trip_id, a.trip_judul, a.trip_tujuan_provinsi, (SELECT b.param_name FROM v_param_parent b where b.param_id = a.trip_kategori) AS param_name, a.trip_created_date, (select c.galeri_foto_url from tb_galeri c where (c.galeri_trip_id = a.trip_id) order by rand() limit 0,1) AS trip_gambar from tb_trip a order by a.trip_created_date desc ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
