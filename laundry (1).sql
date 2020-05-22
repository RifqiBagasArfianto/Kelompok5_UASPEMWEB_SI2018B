-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 04:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@kanglaundry.id', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `rekening` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `rekening`) VALUES
(1, 'BNI', 322296071),
(2, 'BCA', 872983473),
(4, 'BTN', 464654),
(5, 'BRI', 456456458);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(255) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name`) VALUES
(1, 'Laundry Kering'),
(2, 'Laundry Basah'),
(3, 'Laundry Kilat'),
(4, 'Laundry Cepat'),
(6, 'Laudry Murah');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `lu` varchar(256) NOT NULL,
  `ls` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `lu`, `ls`) VALUES
(1, 'Sleman - Yogyakarta', '-7.747030', '110.362760'),
(4, 'Rungkut - Surabaya', '-7.3171711', '112.803172557024'),
(5, 'Wonocolo - Surabaya', '-7.3251026', '112.738067125733');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `weight` int(255) NOT NULL,
  `address` varchar(256) NOT NULL,
  `rek` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `buyer` varchar(256) NOT NULL,
  `service` int(255) NOT NULL,
  `accept` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `email`, `weight`, `address`, `rek`, `price`, `buyer`, `service`, `accept`) VALUES
(2, 'Ahmad Ismail', 'qolbu.dzikru30@mailsac.com', 11, '125 Conch Street', 322296071, 550000, '37', 1, 0),
(3, 'Ahmad Ismail', 'qolbu.dzikru30@mailsac.com', 55, '125 Conch Street', 464654, 165000, '39', 17, 0),
(4, 'Ahmad Ismail', 'qolbu.dzikru30@mailsac.com', 10, '125 Conch Street', 322296071, 500000, '40', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(256) NOT NULL,
  `price` int(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `facility` text NOT NULL,
  `photo` varchar(256) NOT NULL,
  `seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `location`, `price`, `discount`, `facility`, `photo`, `seller`) VALUES
(1, 'Laundry Gans', 'Landry Gans, Laundry yang berdomisili di Yogyakarta dengan sederet fasilitas dan layanan yang cukup memuaskan', 'Rungkut - Surabaya|-7.3171711|112.803172557024', 50000, 50, 'Laundry Kering|Laundry Basah|Laundry Kilat|Laundry Cepat', 'Balai-Kota-Surabaya-3-e1586318525394.jpg', 37),
(17, 'Laundry nganu', 'jhjkhkhjk', 'Sleman - Yogyakarta|-7.747030|110.362760', 3000, 12, 'Laundry Kering|Laundry Kilat|Laundry Cepat', '3e58df42e00c450058c24d17f66351d6.jpg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `id` int(11) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proof`
--

INSERT INTO `proof` (`id`, `photo`, `order_id`) VALUES
(3, 'gn_monogram.jpg', 2),
(4, '180616-200.png', 3),
(5, 'images.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `role` enum('user','vendor') NOT NULL,
  `active` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `email`, `phone`, `role`, `active`) VALUES
(37, 'alan123', '123456', 'qolbu.dzikru30@gmail.com', '5567567', 'vendor', 1),
(39, 'alan123', '123456', 'qolbu.dzikru30@gmail.com', '5567567', 'vendor', 1),
(40, 'test123', '111111', 'test@gmail.com', '-', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
