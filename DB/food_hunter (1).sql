-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 12:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_hunter`
--
CREATE DATABASE IF NOT EXISTS `food_hunter` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `food_hunter`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `admin_picture` varchar(111) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_picture`) VALUES
(60, 'The Manager', 'rashu.web@gmail.com', '107030ca685076c0ed5e054e2c3ed940', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(7) NOT NULL,
  `user_email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `food_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_email`, `food_name`, `quantity`, `price`) VALUES
(20, '44', 'Pizza,Burger', '0', 0),
(21, '44', 'Pizza,Burger', '0', 0),
(22, '44', 'Pizza,Burger,Mutton', '0', 0),
(23, '44', 'Pizza,Burger,Mutton', '0', 0),
(24, 'rashu@gmail.com', 'Pizza,Burger', '0', 0),
(25, 'rashu@gmail.com', 'Pizza,Burger', '0', 0),
(26, 'rashu@gmail.com', 'Pizza,Burger,Mutton', '0', 0),
(27, 'rashu@gmail.com', 'Pizza,Burger,Mutton', '0', 0),
(28, 'rashu@gmail.com', 'Pizza,Burger,Mutton', '0', 0),
(29, 'rashunath0@gmail.com', 'Pizza,Burger', '0', 0),
(30, 'rashunath0@gmail.com', 'meat', '0', 0),
(31, 'rashunath0@gmail.com', 'meat-beef', '1', 280),
(32, 'rashunath0@gmail.com', 'meat-beef', '1-2', 280),
(33, 'rashunath0@gmail.com', '', '', 0),
(34, 'rashunath0@gmail.com', 'meat-beef-rice', '1-2-1', 320),
(35, 'rashunath0@gmail.com', 'meat-beef-rice', '1-2-1', 320),
(36, 'rashunath0@gmail.com', 'meat-beef-rice', '1-2-1', 280),
(37, 'rashunath0@gmail.com', 'meat-beef-rice', '1-1-1', 80),
(38, 'rashunath0@gmail.com', 'meat-beef', '2-1', 260);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `item_ingredients` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_picture` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `soft_deleted` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_ingredients`, `item_price`, `item_picture`, `rating`, `soft_deleted`) VALUES
(13, 'meat', 'meats', 80, '1488403795food_meats_curry.jpg', 0, 'No'),
(14, 'beef', 'beef', 100, '1488560515food6.jpg', 0, 'No'),
(15, 'rice', 'rice', 40, '1488649235food_rice.jpg', 0, 'No'),
(16, 'vegetables', 'potato, coli flower', 50, '', 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `user_email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `food_name` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `payment` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `delivered` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `user_email`, `food_name`, `quantity`, `price`, `payment`, `delivered`) VALUES
(4, 'rashu@gmail.com', 'Pizza,Burger,Pizza,Burger', '0', 0, '', 'No'),
(5, 'rashu@gmail.com', 'Pizza,Burger,Pizza,Burger', '0', 0, '', 'No'),
(6, 'rashunath0@gmail.com', 'meat-beef-', '1-2-', 280, 'hand', 'No'),
(7, 'rashunath0@gmail.com', 'Pizza,Burger-meat-', '1-1-', 280, 'hand', 'No'),
(8, 'rashunath0@gmail.com', 'meat-beef', '1-2', 500, 'bkash', 'No'),
(9, 'rashunath0@gmail.com', 'beef', '2', 500, 'hand', 'Yes'),
(10, 'rashunath0@gmail.com', 'meat-beef-', '2-1-', 260, 'hand', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `order_time`
--

CREATE TABLE `order_time` (
  `id` int(11) NOT NULL,
  `lunch_start` time NOT NULL,
  `dinner_start` time NOT NULL,
  `lunch_ending` time NOT NULL,
  `dinner_ending` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_time`
--

INSERT INTO `order_time` (`id`, `lunch_start`, `dinner_start`, `lunch_ending`, `dinner_ending`) VALUES
(1, '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `bkash_number` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `bkash_pin` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `soft_deleted` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `profile_picture` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ProfilePic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile_number`, `gender`, `address`, `email_verified`, `soft_deleted`, `profile_picture`) VALUES
(3, 'rashu', 'rashu@gmail.com', '7fd006a860c6a8d3eea004e7df4974fa', '11111111111', 'Male', 'chittagong', '0', 'No', 'ProfilePic.png'),
(4, 'rahim', 'rahim@gmail.com', '7fd006a860c6a8d3eea004e7df4974fa', '11111111111', 'Male', 'chittagong', '0', 'No', 'ProfilePic.png'),
(5, 'fdf', 'r@yahoo.com', '514f1b439f404f86f77090fa9edc96ce', '11111111111', 'Male', 'fff', '0', 'No', 'ProfilePic.png'),
(6, 'rrr', 'rrr', '44f437ced647ec3f40fa0841041871cd', '11111111111', 'Male', 'rrr', '0', 'No', 'ProfilePic.png'),
(7, 'rashu', 'rashu@hotmail.com', '7fd006a860c6a8d3eea004e7df4974fa', '11111111111', 'Male', 'chittagong', '0', 'No', 'ProfilePic.png'),
(9, 'rashu', 'rashu.web@gmail.com', 'rashuweb', '00000000000', 'Male', 'dfdsf434 ergergt', '6c65e260c9a', 'No', 'ProfilePic.png'),
(11, 'rashu4', 'rashunath0@gmail.com', '4567', '25836542565', 'Female', ';l,okl,.', 'Yes', 'No', 'rashu.png'),
(12, 'rjek', 'rashu@admin.com', '12345', '01852404635', 'Male', 'Chittagong', 'Yes', 'No', 'ProfilePic.png'),
(13, '', '', '', '', '', '', '', 'No', 'ProfilePic.png'),
(14, 'jamil', 'jamil@yahoo.com', '12345', '01852404635', 'Female', 'Dhaka', 'Yes', 'No', 'ProfilePic.png'),
(15, 'rajesh', 'rajesh@email.com', '12345', '01852404635', 'Female', 'chittagong', 'Yes', 'No', 'ProfilePic.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_time`
--
ALTER TABLE `order_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_time`
--
ALTER TABLE `order_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
