-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 03:54 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_c09`
--

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `Cons_Id` int(4) NOT NULL,
  `Cons_Nama` varchar(50) NOT NULL,
  `Cons_Balanced` int(10) NOT NULL,
  `Cons_Location` varchar(20) NOT NULL,
  `usr_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`Cons_Id`, `Cons_Nama`, `Cons_Balanced`, `Cons_Location`, `usr_id`) VALUES
(26, 'admin', 0, 'Jalan Kaliurang', 'admin'),
(27, 'TRI PRASTIYATI', 5000, 'Jalan Kaliurang', 'cons1'),
(28, 'RIADY AUGUSTON', 15000, 'Pogung', 'cons2'),
(29, 'RAIHAN AKBARI', 70000, 'Swakarya', 'cons3'),
(31, 'Ardo Edo', 80000, 'Muntilan', 'cons4');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `Driver_Id` int(4) NOT NULL,
  `Driver_name` varchar(50) NOT NULL,
  `Driver_Nopol` varchar(11) NOT NULL,
  `Driver_Balanced` int(7) NOT NULL,
  `Driver_Location` varchar(25) NOT NULL,
  `Driver_od` char(1) NOT NULL DEFAULT '0',
  `Kolom 7` int(11) DEFAULT NULL,
  `usr_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`Driver_Id`, `Driver_name`, `Driver_Nopol`, `Driver_Balanced`, `Driver_Location`, `Driver_od`, `Kolom 7`, `usr_id`) VALUES
(13, 'Ariecson Altobeli', 'AB 6969 EA', 65000, 'Klitren', '0', NULL, 'driver1'),
(14, 'Desmond', 'H 3747 LA', 20000, 'Jalan Kaliurang', '0', NULL, 'driver2'),
(15, 'Febryan Nugraha', 'L 3090 KA', 33650, 'Gejayan', '0', NULL, 'driver3'),
(16, 'Yedija', 'AD 6969 AE', 90000, 'Wirobrajan', '0', NULL, 'driver4');

-- --------------------------------------------------------

--
-- Table structure for table `food_and_drink`
--

CREATE TABLE `food_and_drink` (
  `FodDr_Id` int(4) NOT NULL,
  `FoDr_Name` varchar(30) NOT NULL,
  `FoDr_Price` int(5) NOT NULL,
  `FoDr_Stock` int(2) NOT NULL,
  `Restaurant_Id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_and_drink`
--

INSERT INTO `food_and_drink` (`FodDr_Id`, `FoDr_Name`, `FoDr_Price`, `FoDr_Stock`, `Restaurant_Id`) VALUES
(4, 'DADA ORIGINAL', 15000, 10, 2),
(5, 'GUDEG KOYOR', 20000, 10, 1),
(6, 'GUDEG KRECEK', 25000, 15, 1),
(7, 'DADA CRISPY', 11000, 20, 2),
(14, 'Tempe goreng rebus', 1000, 50, 4),
(15, 'lele goreang', 5000, -142341, 3),
(17, 'Ayam Goreng Dada', 15000, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `log_consumer`
--

CREATE TABLE `log_consumer` (
  `log_id` int(11) NOT NULL,
  `Cons_id` int(4) NOT NULL,
  `Cons_nama_lama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Cons_nama_Baru` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Cons_Balanced_lama` int(10) NOT NULL,
  `Cons_Balanced_baru` int(10) NOT NULL,
  `Cons_Location_lama` varchar(20) CHARACTER SET latin1 NOT NULL,
  `Cons_Location_baru` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_consumer`
--

INSERT INTO `log_consumer` (`log_id`, `Cons_id`, `Cons_nama_lama`, `Cons_nama_Baru`, `Cons_Balanced_lama`, `Cons_Balanced_baru`, `Cons_Location_lama`, `Cons_Location_baru`) VALUES
(4, 13, 'Yukeno Kira', 'Yukeno Kira', 1000, 1000, '123456', '123456'),
(5, 14, 'Odading', 'Odading', 2000, 2000, '654321', '654321'),
(6, 15, 'Yukeno Kira', 'Yukeno Kira', 1000, 1000, '123456', '123456'),
(7, 16, 'Odading', 'Odading', 2000, 2000, '654321', '654321'),
(8, 13, 'Yukeno Kira', 'Yukeno Kiras', 1000, 100034, '123456', '123456543'),
(9, 14, 'Odading', 'Odadings mangoleh', 2000, 2000532, '654321', '999823'),
(10, 17, 'ARIECSON ALTOBELI', 'ARIECSON ALTOBELI', 210000, 210000, '2.107 1.994', '2.107 1.994'),
(11, 18, 'ARIECSON ALTOBELI', 'ARIECSON ALTOBELI', 210000, 210000, '2.107 1.994', '2.107 1.994'),
(12, 19, 'DESMOND CRISTANEL PONGLILING', 'DESMOND CRISTANEL PONGLILING', 240000, 240000, '2.412 1.999', '2.412 1.999'),
(13, 20, 'FEBRYAN NUGRAHA MARBUN', 'FEBRYAN NUGRAHA MARBUN', 150000, 150000, '1.502 1.999', '1.502 1.999'),
(14, 21, 'RIDWAN ARBA PAMUNGKAS', 'RIDWAN ARBA PAMUNGKAS', 100000, 100000, '1.006 2.002', '1.006 2.002'),
(15, 21, 'RIDWAN ARBA PAMUNGKAS', 'RIDWAN ARBA ALIBABA', 100000, 692832, '1.006 2.002', '6.969 6.534212'),
(16, 7, 'Mardonius Riel', 'Mardonius Riel', 250000, 250000, '-7.76632 110.38255', '-7.76632 110.38255'),
(17, 9, 'Nately Lyyneheym', 'Nately Lyyneheym', 300000, 300000, '-7.76632 600.23254', '-7.76632 600.23254'),
(18, 22, 'richard', 'richard', 1000, 1000, '11111 222', '11111 222');

-- --------------------------------------------------------

--
-- Table structure for table `orderlistdetailed`
--

CREATE TABLE `orderlistdetailed` (
  `Ord_qty` int(4) NOT NULL DEFAULT 0,
  `Ord_TotalBayar` int(6) NOT NULL,
  `Ord_PaymentMethod` enum('OVO','CASH','','') NOT NULL,
  `Ship_nota` varchar(50) NOT NULL DEFAULT '',
  `FodDr_Id` int(11) DEFAULT NULL,
  `Ord_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlistdetailed`
--

INSERT INTO `orderlistdetailed` (`Ord_qty`, `Ord_TotalBayar`, `Ord_PaymentMethod`, `Ship_nota`, `FodDr_Id`, `Ord_id`) VALUES
(2, 5000, 'OVO', '290720013719', 15, 1),
(5, 15000, 'OVO', '290720034753', 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_Id` int(4) NOT NULL,
  `Restaurant_Name` varchar(50) NOT NULL,
  `Retaurant_Location` varchar(20) NOT NULL,
  `Restaurant_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_Id`, `Restaurant_Name`, `Retaurant_Location`, `Restaurant_ongkir`) VALUES
(1, 'Hj Ahmad', '-7.76632 110.48055', 5000),
(2, 'McDonald\'s Jakal', '-7.76632 110.68055', 10000),
(3, 'Cak Wawan', 'Jln Agro 999999 2222', 5000),
(4, 'Warung Santai', 'Jln Agro 99999988 22', 7500),
(5, 'KFC', 'Sudirman', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Ship_Id` int(4) NOT NULL,
  `Cons_Id` int(4) NOT NULL,
  `Restaurant_Id` int(4) NOT NULL,
  `Driver_Id` int(11) NOT NULL,
  `usr_id` varchar(50) NOT NULL,
  `Ship_nota` varchar(50) NOT NULL,
  `Ship_tgl` date NOT NULL,
  `Ship_ok` char(1) NOT NULL DEFAULT '0',
  `Ship_done` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`Ship_Id`, `Cons_Id`, `Restaurant_Id`, `Driver_Id`, `usr_id`, `Ship_nota`, `Ship_tgl`, `Ship_ok`, `Ship_done`) VALUES
(1, 28, 3, 14, 'cons2', '280720013718', '2020-12-07', '1', '1'),
(2, 29, 3, 15, 'cons3', '290720013719', '2020-12-07', '1', '1'),
(4, 29, 5, 15, 'cons3', '290720034753', '2020-12-07', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usr`
--

CREATE TABLE `usr` (
  `usr_id` varchar(50) NOT NULL,
  `usr_pa` varchar(50) NOT NULL,
  `usr_member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr`
--

INSERT INTO `usr` (`usr_id`, `usr_pa`, `usr_member`) VALUES
('vato', 'vato', 'consumer'),
('ado', 'ado', 'driver'),
('admin', 'admin', 'admin'),
('richard', '1234', 'consumer'),
('lusi', '1234', 'consumer'),
('aaa', '1234', 'driver'),
('riel', 'riel', 'consumer'),
('driver1', 'driver1', 'driver'),
('driver2', 'driver2', 'driver'),
('driver3', 'driver3', 'driver'),
('cons1', 'cons1', 'consumer'),
('cons2', 'cons2', 'consumer'),
('cons3', 'cons3', 'consumer'),
('driver4', 'driver4', 'driver'),
('', '', 'consumer'),
('cons4', 'cons4', 'consumer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`Cons_Id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`Driver_Id`);

--
-- Indexes for table `food_and_drink`
--
ALTER TABLE `food_and_drink`
  ADD PRIMARY KEY (`FodDr_Id`),
  ADD KEY `Restaurant_Id` (`Restaurant_Id`,`FoDr_Name`);

--
-- Indexes for table `log_consumer`
--
ALTER TABLE `log_consumer`
  ADD KEY `Index 1` (`log_id`);

--
-- Indexes for table `orderlistdetailed`
--
ALTER TABLE `orderlistdetailed`
  ADD KEY `Index 1` (`Ord_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_Id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Ship_Id`);

--
-- Indexes for table `usr`
--
ALTER TABLE `usr`
  ADD KEY `Index 1` (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `Cons_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `Driver_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `food_and_drink`
--
ALTER TABLE `food_and_drink`
  MODIFY `FodDr_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log_consumer`
--
ALTER TABLE `log_consumer`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderlistdetailed`
--
ALTER TABLE `orderlistdetailed`
  MODIFY `Ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `Ship_Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_and_drink`
--
ALTER TABLE `food_and_drink`
  ADD CONSTRAINT `FKRESTAURANTTOFOODDRINK` FOREIGN KEY (`Restaurant_Id`) REFERENCES `restaurant` (`Restaurant_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
