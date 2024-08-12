-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2024 at 08:09 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch5_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int NOT NULL AUTO_INCREMENT COMMENT 'admin',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `status` int NOT NULL COMMENT '0 = unblock , 1 = block',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `mobile`, `email`, `password`, `status`, `create_at`, `update_at`) VALUES
(9, '', '', 'krushna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-06-19 17:27:47', NULL),
(10, 'Altab Raj', '7894947464', 'altabraja4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-07-10 09:50:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `tittle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `tittle`, `description`, `image`, `create_at`, `update_at`) VALUES
(6, 'Banner', 'dev2', 'image1 - Copy_145146.jpg', '2024-06-25 18:37:29', NULL),
(5, 'Banner', 'dev', 'image0_307032.jpg', '2024-06-25 18:37:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `ct_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `u_id` int NOT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `status` int NOT NULL COMMENT 'o means not checkout, 1 means checkout',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ct_id`, `p_id`, `u_id`, `session_id`, `price`, `qty`, `status`, `create_at`, `update_at`) VALUES
(28, 45, 0, '9c07krgssp41p4sd1tf1qe7ped', '33.70', '1', 0, '2024-08-01 14:57:29', NULL),
(27, 44, 0, '9c07krgssp41p4sd1tf1qe7ped', '15.00', '1', 0, '2024-08-01 14:57:28', NULL),
(25, 44, 0, 'i75920meq7ptf2flq3f6q1kat9', '15.00', '5', 0, '2024-07-30 15:46:04', NULL),
(23, 43, 0, 'i75920meq7ptf2flq3f6q1kat9', '45.00', '2', 0, '2024-07-30 15:32:51', NULL),
(26, 43, 0, '9c07krgssp41p4sd1tf1qe7ped', '45.00', '2', 0, '2024-08-01 14:57:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

DROP TABLE IF EXISTS `order_data`;
CREATE TABLE IF NOT EXISTS `order_data` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL COMMENT '0 means not accept, 1 means accept, 2 means dispatch, 3 means order deliver, 4 means cancel',
  `delivery_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `od_id` int NOT NULL AUTO_INCREMENT,
  `u_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `state` int NOT NULL,
  `pincode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `pc_id` int NOT NULL,
  `psc_id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_marcket_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_saling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `size_available` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `color_avalable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `saku_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `product_long_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `status` int NOT NULL COMMENT '(0 means out of stockk, 1 means in stock)',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `pc_id`, `psc_id`, `slug`, `product_name`, `product_image`, `product_marcket_price`, `product_saling_price`, `size_available`, `color_avalable`, `stock`, `unit`, `saku_no`, `product_short_description`, `product_long_description`, `status`, `create_at`, `update_at`) VALUES
(43, 58, 29, 'onion-1-kg', 'Onion 1 kg', 'basic_419090.webp', '50', '45.00', '', '', '', '', '', '', 'The beauty of an Onion is that it can go just about anywhere. Cut it into thin slices to top off your favourite burger or hot dog, or chop it into little cubes to bring out the sweetness in curry dishes. Chopped Onions are perfect for fish dishes, quiche, stews, and chili. Onions can be roasted whole until tender and then chopped, or caramelized by slowly cooking them in butter for a delicious treat. They are also delicious when dipped in batter and deep-fried! So, go ahead, and buy Onion 1 kg online now!\r\nDisclaimer:\r\nDespite our attempts to provide you with the most accurate information possible, the actual packaging, ingredients and colour of the product may sometimes vary Please read the label, directions and warnings carefully before use\r\n\r\n', 0, '2024-07-25 15:27:25', NULL),
(44, 58, 29, 'sweet-corn', 'Sweet Corn ', 'sweetcorn_524676.webp', '20', '15.00', '', '', '', '', '', '', 'Also known as Maize, Sweet Corn is a cereal grain that originates from the Mexican region. Crisp, sweet, and delicious, sweet corn is a summer staple. It tastes amazing when grilled, where the rich charring and smoky flavour it gets is hard to beat. You can use corn in salads, baked goods, casseroles, and a variety of other recipes. Buy Sweet Corn 1 pc (Approx 250 g - 450 g) online now.', 0, '2024-07-25 15:30:21', NULL),
(45, 58, 29, 'bottle-gourd', 'Bottle Gourd', 'baigana_90490.webp', '40', '33.70', '', '', '', '', '', '', 'Bottle Gourd (Approx. 600 g - 900 g) is a vegetable native to India and is cultivated in other Asian countries. Due to its ability to grow almost anywhere, it is an important food source. Bottle gourd is used in the preparation of various curries in Indian cuisine. The bottle gourds are chopped into pieces and added to curries to savor along with hot rice or rotis. Bottle gourd is also prepared as a chutney to consume with rice, roti, or sometimes with dosas. So what are you waiting for? Go ahead and buy this product online today!\r\nDisclaimer:\r\nDespite our attempts to provide you with the most accurate information possible, the actual packaging, ingredients and colour of the product may sometimes vary. Please read the label, directions, and warnings carefully before use.', 0, '2024-07-25 15:32:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `pc_id` int NOT NULL AUTO_INCREMENT,
  `pc_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `pc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `pc_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_slug`, `pc_name`, `pc_image`, `description`, `create_at`, `update_at`) VALUES
(58, '', 'Fruts & Vegeatables', 'ayurveda-triphala-juice_426744.webp', '', '2024-07-25 15:21:53', NULL),
(59, '', 'Cooking Essentials	', '', '', '2024-07-25 15:42:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_extra_image`
--

DROP TABLE IF EXISTS `product_extra_image`;
CREATE TABLE IF NOT EXISTS `product_extra_image` (
  `pei_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pei_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `product_extra_image`
--

INSERT INTO `product_extra_image` (`pei_id`, `p_id`, `image`, `create_at`, `update_at`) VALUES
(15, 43, 'onion-5-kg-pack-product-images-o590002136-p590002136-0-202203141906_577404.webp', '2024-07-26 15:16:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

DROP TABLE IF EXISTS `product_subcategory`;
CREATE TABLE IF NOT EXISTS `product_subcategory` (
  `psc_id` int NOT NULL AUTO_INCREMENT,
  `pc_id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `psc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `psc_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`psc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`psc_id`, `pc_id`, `slug`, `psc_name`, `description`, `psc_image`, `create_at`, `update_at`) VALUES
(31, 59, '', 'Atta, Flours & Sooji', '', '', '2024-07-25 15:43:14', NULL),
(29, 58, '', 'Fresh Vegeatables', '', 'basic_877872.webp', '2024-07-25 15:25:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `mobile_no` bigint NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `status` int NOT NULL COMMENT '0 means blocked, 1 means unblock',
  `iamge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update-at` datetime DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `mobile_no`, `email`, `password`, `status`, `iamge`, `create_at`, `update-at`) VALUES
(1, 'Altab Raja', 0, '', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '2024-07-09 18:42:01', NULL),
(2, 'Altab Raja', 7894947464, 'altabraj4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '2024-07-09 18:42:41', NULL),
(3, 'Altab Raja', 7894947464, 'altabraja4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '2024-07-10 18:10:39', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
