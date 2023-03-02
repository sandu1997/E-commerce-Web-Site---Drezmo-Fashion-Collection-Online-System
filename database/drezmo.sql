-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2021 at 06:43 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drezmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_user_id` int NOT NULL,
  `cart_product_id` varchar(20) NOT NULL,
  `cart_product_size` varchar(15) NOT NULL,
  `cart_quentity` int NOT NULL,
  `cart_total_price` double NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `cart_user_id` (`cart_user_id`),
  KEY `cart_product_id` (`cart_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_product_id` varchar(20) NOT NULL,
  `feedback_user_id` int NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feedback_comment` varchar(200) NOT NULL,
  `feedback_ratings` int NOT NULL,
  PRIMARY KEY (`feedback_product_id`,`feedback_user_id`),
  KEY `feedback_ibfk_2` (`feedback_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `notifi_id` int NOT NULL AUTO_INCREMENT,
  `notifi_cust_id` int NOT NULL,
  `notifi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notifi_notice` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'You Have New Order',
  `notifi_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'new',
  PRIMARY KEY (`notifi_id`),
  KEY `notification_ibfk_1` (`notifi_cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notifi_id`, `notifi_cust_id`, `notifi_date`, `notifi_notice`, `notifi_status`) VALUES
(35, 104, '2021-07-02 09:57:10', 'You Have New Order', 'new'),
(36, 104, '2021-07-02 10:06:15', 'You Have New Order', 'new'),
(37, 104, '2021-07-02 11:15:40', 'You Have New Order', 'new'),
(38, 104, '2021-07-02 11:44:19', 'You Have New Order', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_user_id` int NOT NULL,
  `order_shipping_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_shipping_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_shipping_contact` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_product_id` varchar(20) NOT NULL,
  `order_product_size` varchar(10) NOT NULL,
  `order_quentity` int NOT NULL,
  `order_total_price` double NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`order_id`),
  KEY `order_user_id` (`order_user_id`),
  KEY `order_product_id` (`order_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_shipping_name`, `order_shipping_address`, `order_shipping_contact`, `order_product_id`, `order_product_size`, `order_quentity`, `order_total_price`, `order_date`, `order_status`) VALUES
(59, 104, 'pragith lakshan', '342, main road, kaluthara, , ', 'afdasfas@afsdf.com, 1242323253', '01', 'small', 24, 4800, '2021-07-02 09:57:09', 'canceled'),
(60, 104, 'pragith lakshan', '342, main road, kaluthara, , ', 'afdasfas@afsdf.com, 1242323253', '01', 'medium', 5, 1000, '2021-07-02 10:06:15', 'canceled'),
(61, 104, 'pragith lakshn', '342, main road, kaluthara, , ', 'afdasfas@afsdf.com, 1242323253', '01', 'extralarge', 3, 600, '2021-07-02 11:15:40', 'received'),
(62, 104, 'dasdsad dasdasda', 'sfsdfsdf, main road, kaluthara, sdfdsf, asdad', 'afdasfasdsfsdf, 12dfd', '01', 'small', 3, 600, '2021-07-02 11:44:19', 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_color` varchar(10) NOT NULL,
  `product_regular_price` double NOT NULL,
  `product_sale_price` double NOT NULL,
  `product_description` varchar(800) NOT NULL,
  `product_introduction` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_image` varchar(500) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_category`, `product_color`, `product_regular_price`, `product_sale_price`, `product_description`, `product_introduction`, `product_image`) VALUES
('01', 'sudu', 'jezza', 'ladies', 'white', 400, 200, 'adfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffff', 'adfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffffadfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffffadfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffff', 'product-6.jpg'),
('02', 'adad', 'jezza', 'teenagers', 'red', 565.5, 343, 'rtertertert ertertwrterterte wrtwrtertret', 'rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret', 'product-9.jpg'),
('20', 'sudu', 'jezza', 'ladies', 'white', 400, 200, 'adfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffff', 'adfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffffadfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffffadfsad fsdfsadfdsfd sffddfddddddd dddddddddddddddd dddddddf ffff fffffff fffff', 'product-6.jpg'),
('21', 'adad', 'jezza', 'teenagers', 'red', 565.5, 343, 'rtertertert ertertwrterterte wrtwrtertret', 'rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret rtertertert ertertwrterterte wrtwrtertret', 'product-9.jpg'),
('22', 'gauma', 'avirate', 'kids', 'blue', 3200, 200, 'adinawnm edapan redda ', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'product-2.jpg'),
('23', 'gauma 2', 'avirate', 'kids', 'red', 5300, 500, 'dfhertertertertret', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'man-3.jpg'),
('24', 'white shoes', 'buddhibatiks', 'teenagers', 'yellow', 2400, 700, 'rtsdtertertegdfgsdfgsf', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'product-3.jpg'),
('25', 'white shoes', 'aditi', 'ladies', 'kaha pata', 4300, 600, 'tyertertwertgdfgdfgdfg', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'product-4.jpg'),
('26', 'gaha', 'kellyfelder', 'teenagers', 'white', 400, 200, 'fdsadfsdfsdfadfsdfsdf', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'women-2.jpg'),
('38', 'gauma', 'avirate', 'kids', 'blue', 3200, 200, 'adinawnm edapan redda ', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'product-2.jpg'),
('39', 'gauma 2', 'avirate', 'kids', 'red', 5300, 500, 'dfhertertertertret', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'man-3.jpg'),
('40', 'white shoes', 'buddhibatiks', 'teenagers', 'yellow', 2400, 700, 'rtsdtertertegdfgsdfgsf', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'product-3.jpg'),
('42', 'gaha', 'kellyfelder', 'teenagers', 'white', 400, 200, 'fdsadfsdfsdfadfsdfsdf', 'adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda adinawnm edapan redda ', 'women-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_product_id` varchar(20) NOT NULL,
  `stock_product_qty_small` int NOT NULL DEFAULT '0',
  `stock_product_qty_medium` int NOT NULL DEFAULT '0',
  `stock_product_qty_large` int NOT NULL DEFAULT '0',
  `stock_product_qty_extralarge` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_product_id`, `stock_product_qty_small`, `stock_product_qty_medium`, `stock_product_qty_large`, `stock_product_qty_extralarge`) VALUES
('01', 34, 0, 100, 97),
('02', 17, 19, 20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_nic` char(10) NOT NULL,
  `user_country` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_address_no` varchar(5) NOT NULL,
  `user_address_street` varchar(30) NOT NULL,
  `user_address_town` varchar(30) NOT NULL,
  `user_tp` char(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_verification_link` varchar(300) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_nic` (`user_nic`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `user_first_name`, `user_last_name`, `user_name`, `user_password`, `user_nic`, `user_country`, `user_address_no`, `user_address_street`, `user_address_town`, `user_tp`, `user_email`, `user_verification_link`) VALUES
(71, 'admin', 'rohitha', 'lakashan', 'admin', 'admin', '343423343', 'sri lanka', 'p333,', 'Nalanda watta', 'Matale', '0715408875', 'la3xp@hotmail.com', ''),
(103, 'staff', 'rodd', 'lakashan', 'staff', 'staff', '3434233d', 'sri lanka', 'p333,', 'Nalanda watta', 'Matale', '0715', 'la3xp@hotdl.com', ''),
(104, 'customer', 'pragith', 'lakshn', 'pragith', '123', '1234', '', '342', 'main road', 'kaluthara', '1242323253', 'afdasfas@afsdf.com', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`feedback_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`feedback_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`notifi_cust_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`stock_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
