-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 05:09 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Raymond'),
(2, 'Ralph Lauren'),
(3, 'Cats Eye');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(5, 1, '::1', 5, 1),
(8, 1, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Man'),
(2, 'Woman'),
(3, 'Kid');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 1, 1, '43X79654ML216233D', 'Completed'),
(2, 2, 2, 5, '43X79654ML216233D', 'Completed'),
(3, 2, 3, 2, '43X79654ML216233D', 'Completed'),
(4, 2, 11, 1, '0PW782022R887212K', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_views`) VALUES
(1, 1, 1, 'Mens Formal Shirt - 1', 150, 'Mens Formal Shirt - 1', 'man-raymond-casual-shirts-1.jpg', '0', 73),
(2, 1, 1, 'Mens Formal Shirt - 2', 150, 'Mens Formal Shirt - 1', 'man-raymond-casual-shirts-2.jpg', '0', 21),
(3, 1, 1, 'Mens Formal Shirt - 1', 150, 'Mens Formal Shirt - 1', 'man-raymond-casual-shirts-3.jpg', '0', 3),
(4, 1, 1, 'Mens Formal Shirt - 4', 170, 'Mens Formal Shirt - 4', 'man-raymond-casual-shirts-4.jpg', '0', 3),
(5, 1, 1, 'Mens Formal Shirt - 5', 140, 'Mens Formal Shirt - 5', 'man-raymond-casual-shirts-5.jpg', '0', 3),
(6, 1, 1, 'Mens Formal Shirt - 6', 180, 'Mens Formal Shirt - 6', 'man-raymond-casual-shirts-6.jpg', '0', 17),
(7, 1, 1, 'Mens Formal Shirt - 7', 200, 'Mens Formal Shirt - 7', 'man-raymond-casual-shirts-7.jpg', '0', 3),
(8, 1, 2, 'Man Tshirt - 1', 70, 'Man Tshirt - 1', 'man-tshirt-1.jpg', '0', 10),
(9, 1, 1, 'Man Tshirt - 2', 65, 'Man Tshirt - 2', 'man-tshirt-2.jpg', '0', 15),
(10, 1, 1, 'Man Tshirt - 3', 60, 'Man Tshirt - 3', 'man-tshirt-3.jpg', '0', 3),
(11, 2, 1, 'Raymond Casual Shirts - 1', 150, 'Raymond Casual Shirts - 1', 'woman-raymond-casual-shirts-1.jpg', '0', 3),
(12, 2, 1, 'Raymond Casual Shirts - 2', 160, 'Raymond Casual Shirts - 2', 'woman-raymond-casual-shirts-2.jpg', '0', 3),
(13, 2, 1, 'Raymond Casual Shirts - 3', 200, 'Raymond Casual Shirts - 3', 'woman-raymond-casual-shirts-3.jpg', '0', 20),
(14, 2, 1, 'Raymond Casual Shirts - 4', 200, 'Raymond Casual Shirts - 4', 'woman-raymond-casual-shirts-4.jpg', '0', 11),
(15, 2, 1, 'Raymond Casual Shirts - 5', 170, 'Raymond Casual Shirts - 5', 'woman-raymond-casual-shirts-5.jpg', '0', 3),
(16, 2, 1, 'Raymond Casual Shirts - 6', 150, 'Raymond Casual Shirts - 6', 'woman-raymond-casual-shirts-6.jpg', '0', 3),
(17, 2, 1, 'Raymond Casual Shirts - 7', 165, 'Raymond Casual Shirts - 7', 'woman-raymond-casual-shirts-7.jpg', '0', 3),
(18, 2, 2, 'Tops - 1', 50, 'Tops - 1', 'woman-Ralph Lauren-tops-1.jpg', '0', 3),
(19, 2, 2, 'Tops - 2', 50, 'Tops - 2', 'woman-Ralph Lauren-tops-2.jpg', '0', 15),
(20, 2, 2, 'Tops - 3', 70, 'Tops - 3', 'woman-Ralph Lauren-tops-3.jpg', '0', 10),
(21, 2, 2, 'Tops - 4', 60, 'Tops - 4', 'woman-Ralph Lauren-tops-4.jpg', '0', 3),
(22, 2, 2, 'Tops - 5', 50, 'Tops - 5', 'woman-Ralph Lauren-tops-5.jpg', '0', 3),
(23, 2, 2, 'Tops - 6', 70, 'Tops - 6', 'woman-Ralph Lauren-tops-6.jpg', '0', 17),
(24, 4, 3, 'Tops - 7', 50, 'Tops - 7', 'woman-Ralph Lauren-tops-7.jpg', '0', 3),
(26, 0, 0, '', 0, '', '', '', 3),
(27, 0, 0, '', 0, '', '', '', 3),
(28, 0, 0, '', 0, '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`, `user_role`) VALUES
(1, 'aushraful', 'alam', 'a@gmail.com', 'e9bc0e13a8a16cbb07b175d92a113126', '1110000000', 'abc', 'def', 'admin'),
(2, 'bcd', 'efg', 'b@gmail.com', 'b89fe8513d2ea5e484fa4e74f84efaa1', '1000000000', 'abc', 'def', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
