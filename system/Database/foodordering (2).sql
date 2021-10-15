-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 07:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `categoryname`) VALUES
(10, 'Fried Rice'),
(11, 'Rice Meal'),
(12, 'Appetizer'),
(13, 'Burger & Pasta'),
(14, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_date` date NOT NULL DEFAULT current_timestamp(),
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`e_id`, `e_name`, `e_date`, `cost`) VALUES
(4, 'dsad\'d\'d\'', '2021-10-15', 5),
(5, 'asda', '2021-10-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `sales` float NOT NULL,
  `date_invoice` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `sales`, `date_invoice`) VALUES
(1, 180, '2021-10-05 17:32:32'),
(2, 270, '2021-10-05 17:34:22'),
(3, 90, '2021-10-05 17:35:22'),
(4, 180, '2021-10-05 17:40:10'),
(5, 180, '2021-10-05 17:41:07'),
(6, 180, '2021-10-05 17:43:34'),
(7, 180, '2021-10-05 17:45:25'),
(8, 90, '2021-10-05 17:47:23'),
(9, 90, '2021-10-05 17:47:43'),
(10, 90, '2021-10-05 17:53:30'),
(11, 180, '2021-10-05 17:56:27'),
(12, 180, '2021-10-05 17:56:52'),
(13, 180, '2021-10-05 17:59:29'),
(14, 90, '2021-10-05 18:01:19'),
(15, 90, '2021-10-05 18:01:53'),
(16, 180, '2021-10-05 18:02:41'),
(17, 90, '2021-10-05 18:03:57'),
(18, 90, '2021-10-05 18:04:57'),
(19, 180, '2021-10-05 18:05:44'),
(20, 180, '2021-10-05 18:06:31'),
(21, 90, '2021-10-05 18:08:55'),
(22, 90, '2021-10-05 18:09:24'),
(23, 720, '2021-10-05 18:17:19'),
(24, 360, '2021-10-05 18:18:13'),
(25, 360, '2021-10-05 18:18:26'),
(26, 270, '2021-10-05 18:20:21'),
(27, 180, '2021-10-05 18:22:32'),
(28, 180, '2021-10-05 19:03:09'),
(29, 90, '2021-10-05 19:05:52'),
(30, 180, '2021-10-05 19:38:31'),
(31, 180, '2021-10-05 19:39:49'),
(32, 180, '2021-10-05 19:46:35'),
(33, 180, '2021-10-05 19:48:16'),
(34, 180, '2021-10-05 19:50:46'),
(35, 180, '2021-10-05 19:51:43'),
(36, 180, '2021-10-05 19:53:44'),
(37, 180, '2021-10-05 19:58:28'),
(38, 180, '2021-10-05 20:17:32'),
(39, 180, '2021-10-05 20:18:12'),
(40, 180, '2021-10-05 20:18:45'),
(41, 180, '2021-10-05 20:19:44'),
(42, 180, '2021-10-05 20:30:23'),
(43, 180, '2021-10-05 20:52:26'),
(44, 180, '2021-10-05 20:57:06'),
(45, 180, '2021-10-05 20:59:56'),
(46, 180, '2021-10-05 21:01:51'),
(47, 180, '2021-10-05 21:06:17'),
(48, 720, '2021-10-05 21:17:07'),
(49, 630, '2021-10-05 21:19:52'),
(50, 540, '2021-10-05 21:20:57'),
(51, 540, '2021-10-05 21:36:18'),
(52, 180, '2021-10-05 21:54:56'),
(53, 180, '2021-10-05 22:39:09'),
(54, 180, '2021-10-05 22:39:50'),
(55, 180, '2021-10-05 22:42:10'),
(56, 180, '2021-10-05 22:42:25'),
(57, 180, '2021-10-05 22:49:42'),
(58, 180, '2021-10-05 22:51:38'),
(59, 90, '2021-10-05 22:52:43'),
(60, 180, '2021-10-06 05:40:23'),
(61, 180, '2021-10-06 05:44:43'),
(62, 180, '2021-10-06 05:52:54'),
(63, 180, '2021-10-06 05:53:35'),
(64, 180, '2021-10-06 12:45:42'),
(65, 180, '2021-10-06 12:48:28'),
(66, 360, '2021-10-08 12:10:10'),
(67, 925, '2021-10-08 12:39:57'),
(68, 270, '2021-10-08 12:44:00'),
(69, 745, '2021-10-08 12:49:48'),
(70, 655, '2021-10-08 14:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `i_id` int(11) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`i_id`, `itemname`, `unit`, `stock`) VALUES
(5, 'Rice', 'kg', 0),
(6, 'chili', 'kg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_products`
--

CREATE TABLE `item_products` (
  `ip_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `productname`, `category`, `price`) VALUES
(2, 'NasiGoreng', 10, 90),
(3, 'Beef Goreng', 10, 90),
(4, 'Beef Fried Rice', 10, 90),
(5, 'Pork Fried Rice', 10, 90),
(6, 'Chorizo Fried Rice', 10, 90),
(7, 'Yang Chow Fried Rice', 10, 100),
(8, 'SeaFood Fried Rice', 10, 105),
(9, 'Pork Teriyaki', 11, 90),
(10, 'Pork Tonkatsu', 11, 90);

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `sales_product_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `sales_qtry` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`sales_product_id`, `p_id`, `sales_qtry`, `subTotal`, `invoice_id`) VALUES
(3, 2, 5, 450, 51),
(4, 3, 1, 90, 51),
(5, 2, 1, 90, 52),
(6, 3, 1, 90, 52),
(7, 2, 1, 90, 53),
(8, 3, 1, 90, 53),
(9, 2, 1, 90, 54),
(10, 3, 1, 90, 54),
(11, 2, 1, 90, 55),
(12, 3, 1, 90, 55),
(13, 3, 1, 90, 56),
(14, 2, 1, 90, 56),
(15, 2, 1, 90, 57),
(16, 3, 1, 90, 57),
(17, 2, 1, 90, 58),
(18, 3, 1, 90, 58),
(19, 2, 1, 90, 59),
(20, 2, 1, 90, 60),
(21, 3, 1, 90, 60),
(22, 2, 1, 90, 61),
(23, 3, 1, 90, 61),
(24, 2, 1, 90, 62),
(25, 3, 1, 90, 62),
(26, 2, 1, 90, 63),
(27, 3, 1, 90, 63),
(28, 2, 1, 90, 64),
(29, 3, 1, 90, 64),
(30, 2, 1, 90, 65),
(31, 3, 1, 90, 65),
(32, 2, 1, 90, 66),
(33, 3, 1, 90, 66),
(34, 4, 1, 90, 66),
(35, 5, 1, 90, 66),
(36, 8, 1, 105, 67),
(37, 6, 1, 90, 67),
(38, 7, 1, 100, 67),
(39, 4, 1, 90, 67),
(40, 2, 1, 90, 67),
(41, 3, 5, 450, 67),
(42, 2, 1, 90, 68),
(43, 3, 1, 90, 68),
(44, 4, 1, 90, 68),
(45, 2, 1, 90, 69),
(46, 4, 1, 90, 69),
(47, 3, 1, 90, 69),
(48, 4, 1, 90, 69),
(49, 5, 1, 90, 69),
(50, 6, 1, 90, 69),
(51, 7, 1, 100, 69),
(52, 8, 1, 105, 69),
(53, 2, 1, 90, 70),
(54, 3, 1, 90, 70),
(55, 4, 1, 90, 70),
(56, 5, 1, 90, 70),
(57, 6, 1, 90, 70),
(58, 7, 1, 100, 70),
(59, 8, 1, 105, 70);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`u_id`, `username`, `password`, `firstname`, `lastname`, `role`) VALUES
(1, 'Admin', '$2y$10$9Hsto9ZGKPYsV14tKRh0EOqBX4CA0L9RmiknJtWkJEkzqHv.zPj7S', 'kevin', 'Tantoo', 2),
(2, 'cashier', '$2y$10$9Hsto9ZGKPYsV14tKRh0EOqBX4CA0L9RmiknJtWkJEkzqHv.zPj7S', 'cashier', 'cashier', 0),
(3, 'ASD', '$2y$10$jck5dJVpuftAkrz.dlGio.96sbtb6dCq6EfV.J/ybmrrQ/ZsGx3Ga', 'casher2', 'ASD', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `item_products`
--
ALTER TABLE `item_products`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`sales_product_id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_products`
--
ALTER TABLE `item_products`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `sales_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
