-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Apr 2015 pada 13.29
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airlouisdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `business`
--

CREATE TABLE IF NOT EXISTS `business` (
`business_id` int(11) NOT NULL,
  `business_owner_id` int(11) NOT NULL,
  `business_name` varchar(60) NOT NULL,
  `business_logo` varchar(250) NOT NULL,
  `business_category` varchar(60) NOT NULL,
  `business_description` text NOT NULL,
  `business_address` text NOT NULL,
  `business_telephone` varchar(20) NOT NULL,
  `business_handphone` varchar(20) NOT NULL,
  `business_fax` varchar(20) NOT NULL,
  `business_email` varchar(60) NOT NULL,
  `business_facebook` varchar(60) NOT NULL,
  `business_twitter` varchar(60) NOT NULL,
  `business_web` varchar(60) NOT NULL,
  `business_types_of_investments` varchar(60) NOT NULL,
  `business_slot_investments` varchar(60) NOT NULL,
  `business_value_investments` varchar(60) NOT NULL,
  `business_production_plan` text NOT NULL,
  `business_marketing_plan` text NOT NULL,
  `business_financial_plan` text NOT NULL,
  `business_development_plan` text NOT NULL,
  `business_user_array` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `business`
--

INSERT INTO `business` (`business_id`, `business_owner_id`, `business_name`, `business_logo`, `business_category`, `business_description`, `business_address`, `business_telephone`, `business_handphone`, `business_fax`, `business_email`, `business_facebook`, `business_twitter`, `business_web`, `business_types_of_investments`, `business_slot_investments`, `business_value_investments`, `business_production_plan`, `business_marketing_plan`, `business_financial_plan`, `business_development_plan`, `business_user_array`) VALUES
(3, 19, 'Bara Food Court', 'http://localhost/CI/airlouis/uploads/dwiap11s/Bara Food Court/business_picture/Bara Food Court_photo.png', 'Food/Drink', 'Bla bla bla bla', 'Dramaga Bogor', '', '', '', '', '', '', '', 'profit sharing', '3', '10000000', 'bla bla bla', 'bla bla bla', 'bla bla bla', 'bla bla bla', NULL),
(4, 19, 'Kedai Kopi', 'http://localhost/CI/airlouis/uploads/dwiap11s/Kedai Kopi/business_picture/Kedai Kopi_photo.png', 'Food/Drink', 'Bla bla bla', 'Bogor', '', '', '', '', '', '', '', 'profit sharing', '2', '6000000', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', NULL),
(5, 21, 'Lanbow', 'http://localhost/CI/airlouis/uploads/weaver/Lanbow/business_picture/Lanbow_photo.png', 'Fashion', 'Bla bla bla', 'Bogor', '', '', '', '', '', '', '', 'profit sharing', '4', '7000000', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', NULL),
(6, 19, 'Kerupuk', 'http://localhost/CI/airlouis/uploads/dwiap11s/Kerupuk/business_picture/Kerupuk_photo.jpg', 'Food/Drink', 'Bla bla bla', 'Bogor', '', '', '', '', '', '', '', 'profit sharing', '2', '3000000', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', 'Bla bla bla', NULL),
(7, 19, 'SotoKu', 'http://localhost/CI/airlouis/uploads/dwiap11s/SotoKu/business_picture/SotoKu_photo.jpg', 'Food/Drink', 'SotoKu merupakan usaha turun temurun  sejak 1950. Usaha ini telah memiliki cabang diseluruh kawasan Bogor. Usaha ini dikelola oleh keluarga Kim Jong Un selama setengah abad ini. Kami berencana untuk membuka cabang hingga seluruh Jawa Barat.', 'Jalan Babakan Raya, Dramaga, Kab. Bogor', '081293161768', '081293161768', '081293161768', 'dwiagungprastya@gmail.com', 'facebook.com/dwiagungprastya', 'twitter.com/dap1006', 'prastyablog.blogspot.com', 'profit sharing', '10', '50000000', 'Bla bla bla bla', 'Bla bla bla bla', 'Bla bla bla bla', 'Bla bla bla bla', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `investrequest`
--

CREATE TABLE IF NOT EXISTS `investrequest` (
`id` int(11) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `business_to` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `investrequest`
--

INSERT INTO `investrequest` (`id`, `user_from`, `business_to`) VALUES
(1, '19', '5'),
(2, '23', '5'),
(5, '21', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_phone_number` varchar(20) DEFAULT NULL,
  `user_alternative_email` varchar(60) DEFAULT NULL,
  `user_investation_array` text,
  `user_code` varchar(255) DEFAULT NULL,
  `user_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_activated` enum('0','1') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_picture`, `user_email`, `user_password`, `user_phone_number`, `user_alternative_email`, `user_investation_array`, `user_code`, `user_date_created`, `user_date_modified`, `user_activated`) VALUES
(19, 'dwiap11s', 'http://localhost/CI/airlouis/uploads/default/newuser.png', 'dwiagungprastya@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '081293161769', '', '', 'c86f0cbd7f011c7f7ecd4000f615a81a', '2015-04-18 15:14:49', '2015-04-24 07:07:36', '0'),
(21, 'chen', 'http://localhost/CI/airlouis/uploads/default/newuser.png', 'dwiagungprastya@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '081293161768', '', '', 'e347855f9bb3061e5db193d747fecaf2', '2015-04-18 15:19:02', '2015-04-20 08:27:38', '0'),
(22, 'mirana', 'http://localhost/CI/airlouis/uploads/default/newuser.png', 'dwiagungprastya@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '081293161768', '', '', 'e1647ba528d46bafa2fad8b21ec37bdc', '2015-04-18 15:21:43', '2015-04-18 16:00:45', '0'),
(23, 'lina', 'http://localhost/CI/airlouis/uploads/default/newuser.png', 'dwiagungprastya@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '081293161768', '', '', 'aac41c597f2e567a2c81f4636cf7c4b7', '2015-04-18 17:28:41', '2015-04-18 17:28:41', '0'),
(24, 'enigma', 'http://localhost/CI/airlouis/uploads/default/newuser.png', 'dwiagungprastya@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '081293161768', '', '', 'f6c5ffb3bd58d01ecd045247f6821d6e', '2015-04-24 07:10:17', '2015-04-24 10:36:09', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
 ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `investrequest`
--
ALTER TABLE `investrequest`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `investrequest`
--
ALTER TABLE `investrequest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
