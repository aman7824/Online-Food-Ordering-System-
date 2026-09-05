-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(50, 'kato james kalemba', 'katojkalemba', 'b76308b526ec75c6a5474979b622116d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`, `created_at`) VALUES
(30, 'ice cream', 'Category_1752572522.jpg', 'Yes', 'Yes', '2025-07-21 08:53:20'),
(31, 'Rolex', 'food_category_6876227b80a6c.jpg', 'No', 'Yes', '2025-07-21 08:53:46'),
(32, 'Chip', 'food_category_6877e8f3815ec.jpg', 'No', 'Yes', '2025-07-21 08:53:50'),
(33, 'Burger', 'food_category_687aa018b91bb.png', 'No', 'No', '2025-07-21 08:51:13'),
(34, 'supper', 'food_category_687dfe574477b.jpg', 'Yes', 'Yes', '2025-07-21 08:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(12, 'burger', 'A burger is a type of sandwich consisting of one or more cooked patties (usually beef) placed inside a sliced bun or bread roll. Common toppings include lettuce, tomato, cheese, onions, pickles, sauces (like ketchup or mayo), and sometimes bacon or egg.', 100000.00, 'food_522.jpg', 27, 'Yes', 'Yes'),
(13, 'chapati', 'Chapati is a flatbread made from wheat flour, water, and sometimes a bit of salt and oil. It’s a staple food in East Africa, India, and other parts of South Asia.', 2000.00, 'food_648.jpg', 30, 'Yes', 'Yes'),
(14, 'chips and chicken', 'Chips and chicken is a popular fast food dish made of deep-fried potato chips (fries) served with fried or grilled chicken. It’s loved globally and hits hard in places like East Africa, the UK, the US, and beyond!', 999.00, 'food_720.jpg', 30, 'Yes', 'Yes'),
(15, 'matooke', 'matooke nice food', 10000.00, 'food_510.avif', 31, 'Yes', 'Yes'),
(16, 'ice cream', 'ice cream so nice', 12300.00, 'food_921.jpg', 30, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(10) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(11, 'chips and chicken', '999', 1.00, '999', '2025-07-18 20:47:23', 'order', 'ssentongo ', '0700510546', 'frankmate@gmail.com', 'Frank');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
