-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 08:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malilstuff`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `password`) VALUES
(1, 'aditadmin', 'aditiawardani6@gmail.com', '$2y$10$3ZT4Jp01WCbtCw.DZVpvvOu0Bauek7b1XAVQsfJjQOgXYS1r/R2uW'),
(2, 'aditadmin', 'aditiawardani6@gmail.com', '$2y$10$Hyj6abw78KcHhfwmh0gNgOEWO.qBGNCtBge.MY0cYZMPm26cNdhES');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendorname` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `promovalue` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `efficacy` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `productname`, `vendor_id`, `vendorname`, `stock`, `price`, `promovalue`, `description`, `efficacy`, `phone`, `dt`) VALUES
(4, '1545924983.jpg', 'Adit Product', 0, 'AW Cosmetic', 4, 15000, 5000, 'ffufgkhlj;l', 'Dry', 0, '0000-00-00 00:00:00'),
(5, '1545272264.jpg', 'Skin Foundation', 0, '', 3, 100000, 3000, '', '', 0, '0000-00-00 00:00:00'),
(8, '1545395241.jpg', 'Skin Foundation', 0, '', 3, 10000, 5000, '', '', 0, '0000-00-00 00:00:00'),
(9, '1545399670.jpg', 'Skin Foundation', 0, '', 5, 15000, 5000, '', '', 0, '0000-00-00 00:00:00'),
(14, '1545662613.jpg', 'Skin Foundation', 1, 'AW Cosmetic', 0, 100000, 3000, 'adasfsdgdfhnffgn', 'Normal', 0, '0000-00-00 00:00:00'),
(15, '1545673555.jpg', 'test dry', 1, 'AW Cosmetic', 4, 10000, 5000, 'test', 'Dry', 0, '0000-00-00 00:00:00'),
(16, '1545836965.jpg', 'Skincare A', 1, 'AW Cosmetic', 0, 125000, 5000, 'vsaufsfknsknfksdbakvjdsb mv sdncv AKJCBSLCBAKSVJXVKSDNV;SMV;LNSDVBASNCAVB', 'Oily', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `skin`
--

CREATE TABLE `skin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tone` varchar(50) NOT NULL,
  `undertone` varchar(50) NOT NULL,
  `concern_acne` varchar(50) DEFAULT NULL,
  `concern_acne_scars` varchar(50) DEFAULT NULL,
  `concern_black_white_heads` varchar(50) DEFAULT NULL,
  `concern_large_pores` varchar(50) DEFAULT NULL,
  `concern_dullness_skin` varchar(50) DEFAULT NULL,
  `concern_wrinkles` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skin`
--

INSERT INTO `skin` (`id`, `user_id`, `fullname`, `type`, `tone`, `undertone`, `concern_acne`, `concern_acne_scars`, `concern_black_white_heads`, `concern_large_pores`, `concern_dullness_skin`, `concern_wrinkles`, `dt`) VALUES
(1, 0, 'Aditia Warda', 'Oily', 'White', 'Cool', 'Acne', NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(8, 4, 'Aditia Wardani', 'Normal', 'Pale', 'Cool', 'Acne', NULL, NULL, NULL, NULL, NULL, '2018-12-25'),
(9, 4, 'Aditia Wardani', 'Oily', 'Tanned', 'Cool', NULL, 'Acne Scars', NULL, NULL, NULL, NULL, '2018-12-25'),
(10, 4, 'Aditia Wardani', 'Dry', 'White', 'Warm', NULL, NULL, NULL, NULL, NULL, 'Wrinkles', '2018-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `fullname` varchar(100) NOT NULL,
  `dt` datetime NOT NULL,
  `testi` varchar(500) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`fullname`, `dt`, `testi`, `id`) VALUES
('Aditia Warda', '2016-02-29 00:00:00', 'Terima kasih kepada AW Dealer yang telah membantu saya mencari mobil idaman keluarga saya.', 1),
('Aldi Yustiadi', '2016-02-29 00:00:00', 'Produknya sangat berkualitas, terima kasih AW Dealer.', 2),
('Aditia Warda', '2018-12-16 00:00:00', 'test', 3),
('Aditia Warda', '2018-12-16 00:00:00', 'Selamat malam\r\n', 4),
('Aditia Warda', '2018-12-16 21:40:34', 'tes lagi', 5),
('Aditia Warda', '2018-12-16 21:47:12', 'bismilah hirahmanirahim\r\n', 6),
('Aditia Warda', '2016-12-18 23:19:51', 'tes deh', 7),
('Aditia Warda', '0000-00-00 00:00:00', 'tes deh', 8),
('Aditia Warda', '2018-12-16 23:21:08', 'tes deh', 9),
('Aditia Warda', '2018-12-17 00:41:26', '', 10),
('Aditia Warda', '2018-12-17 00:50:17', 'test', 11),
('Aditia Warda', '2018-12-17 01:01:37', 'Udah ngantuk', 12),
('Aditia Warda', '2018-12-17 22:35:59', 'ngerjain paw bangsattttttttttttttt', 13),
('Arif', '2018-12-17 22:45:51', 'oy', 14),
('Aditia Warda', '2018-12-19 23:05:50', 'test', 15),
('Nazma Kamilatul', '2018-12-20 18:10:59', 'sayang', 16),
('Aditia Wardani', '2018-12-24 01:11:27', 'ah', 17),
('Aditia Wardani', '2018-12-27 17:28:37', 'bismilah hari ini saya presentasi paw semoga lancar dan mendapatkan nilai yang sesuai aamiin saya bersama arif krismun dan beye,', 18);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendorname` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `promovalue` int(50) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `fullname`, `vendor_id`, `vendorname`, `product_id`, `productname`, `price`, `promovalue`, `dt`) VALUES
(1, 4, 'Aditia Wardani', 1, 'AW Cosmetic', 15, 'test dry', 10000, 5000, '2018-12-27 00:59:53'),
(2, 4, 'Aditia Wardani', 1, 'AW Cosmetic', 14, 'Skin Foundation', 100000, 3000, '2018-12-27 01:02:04'),
(3, 4, 'Aditia Wardani', 1, 'AW Cosmetic', 14, 'Skin Foundation', 100000, 3000, '2018-12-27 01:02:43'),
(4, 4, 'Aditia Wardani', 0, 'AW Cosmetic', 4, 'Adit Product', 15000, 5000, '2018-12-28 00:40:54'),
(5, 4, 'Aditia Wardani', 0, 'AW Cosmetic', 4, 'Adit Product', 15000, 5000, '2018-12-28 00:41:09'),
(6, 4, 'Aditia Wardani', 1, 'AW Cosmetic', 15, 'test dry', 10000, 5000, '2018-12-28 00:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `image`, `gender`, `city`, `phone`) VALUES
(4, 'aditiawar', 'nazmakn@gmail.com', '$2y$10$4EItDcUZQ7/jvqygu45LPOpNwghK3ELCezC6sCEybwm6hXpRx7epu', 'Aditia Wardani', '1545561647.jpg', 'Male', 'Cianjur', 82115824679),
(8, 'nazmakn', 'nazmakn@gmail.com', '$2y$10$wXk/XML62M7XQ1aFTUqQn.s.atSrJq1UyyaQ4vmNe2xa/FRi1pTzO', 'Nazma Kamilatul N', '1545921588.jpg', 'Female', 'Bandung', 82115824679);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vendorname` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `username`, `email`, `password`, `vendorname`, `image`, `city`, `phone`) VALUES
(1, 'awcosmetic', 'nazmakn@gmail.com', '$2y$10$aze1P/n0gzfOUrSGe6TZg.B4Jre4TFMA11xlappy1C6ZDvlNlJfDy', 'AW Cosmetic', '1545922351.jpg', 'Bandung', 82115824679),
(3, 'aditiawar', 'aditiawardani6@gmail.com', '$2y$10$/U1M0BwmwFTIOl5fbaJLtuJdDLDxYj.zDcDGvrTAlLg9TgzhhWcNC', 'AR Cosmetic', '1545302665.jpg', 'Cianjur', 82115824679);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skin`
--
ALTER TABLE `skin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skin`
--
ALTER TABLE `skin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
