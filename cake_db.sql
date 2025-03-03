-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbproducttest
DROP DATABASE IF EXISTS `dbproducttest`;
CREATE DATABASE IF NOT EXISTS `dbproducttest` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbproducttest`;

-- Dumping structure for table dbproducttest.auth_tokens
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbusers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbproducttest.auth_tokens: ~0 rows (approximately)

-- Dumping structure for table dbproducttest.tbcategory
DROP TABLE IF EXISTS `tbcategory`;
CREATE TABLE IF NOT EXISTS `tbcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbproducttest.tbcategory: ~2 rows (approximately)
INSERT INTO `tbcategory` (`id`, `name`, `description`, `created_at`, `modified_at`) VALUES
	(6, 'CapCake', 'The CapCake is a perfect blend of elegance and indulgence, offering a delightful twist on classic cupcakes.', '2025-03-02 15:20:54', '2025-03-02 15:20:54'),
	(7, 'Biscuit', 'Crisp, golden, and irresistibly delicious, the biscuit is a timeless treat enjoyed in various forms across the world.', '2025-03-02 15:21:55', '2025-03-02 15:21:55'),
	(8, 'Donut', 'Soft, fluffy, and irresistibly sweet, the donut is a classic treat enjoyed worldwide.', '2025-03-02 15:22:31', '2025-03-02 15:22:31'),
	(9, 'Butter', 'Rich, creamy, and irresistibly smooth, butter is a kitchen essential that enhances both sweet and savory dishes.', '2025-03-02 15:23:03', '2025-03-02 15:23:03');

-- Dumping structure for table dbproducttest.tbproducts
DROP TABLE IF EXISTS `tbproducts`;
CREATE TABLE IF NOT EXISTS `tbproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/no_image_available.png',
  `stock` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `tbproducts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbcategory` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbproducttest.tbproducts: ~15 rows (approximately)
INSERT INTO `tbproducts` (`id`, `name`, `description`, `price`, `image`, `stock`, `category_id`, `category_name`, `created_at`, `modified_at`) VALUES
	(9, 'Cookies and Cream', 'Cookies and Cream', 16.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/9_CookiesandCream.jpeg', 3, 6, 'CapCake', '2025-03-02 15:30:23', '2025-03-02 17:06:57'),
	(11, 'Vanilla Salted Caramel', 'Vanilla Salted Caramel', 10.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/10_caramelcake.jpg', 0, 6, 'CapCake', '2025-03-02 15:35:26', '2025-03-02 15:35:26'),
	(12, 'Chocolate Biscuit Cake', 'Chocolate Biscuit Cake', 5.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/12_chocolatebiscuitcake.jpg', 0, 7, 'Biscuit', '2025-03-02 15:43:27', '2025-03-02 15:43:27'),
	(13, 'Chocolate Donut', 'Chocolate Donut', 13.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/13_chocolatedonut.jpg', 0, 8, 'Donut', '2025-03-02 15:52:46', '2025-03-02 15:52:46'),
	(14, 'Doughnuts', 'Doughnuts', 12.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/14_doughnuts.jpg', 1, 8, 'Donut', '2025-03-02 15:53:20', '2025-03-02 15:53:20'),
	(15, 'Pink Donut', 'Pink Donut', 12.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/15_pinkdonut.jpg', 1, 8, 'Donut', '2025-03-02 15:54:27', '2025-03-02 15:54:27'),
	(16, 'Becky\'s Butter Cake', 'Becky\'s Butter Cake', 1.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/16_beckysbuttercake.jpg', 1, 9, 'Butter', '2025-03-02 16:21:25', '2025-03-02 16:21:25'),
	(18, 'Brown Butter Cake', 'Brown Butter Cake', 0.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/17_brownbuttercake_2.jpg', 0, 9, 'Butter', '2025-03-02 16:23:05', '2025-03-02 16:23:05'),
	(19, 'Butter Cake', 'Butter Cake', 12.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/19_buttercake_1.jpg', 0, 9, 'Butter', '2025-03-02 16:23:53', '2025-03-02 16:23:53'),
	(20, 'Butter Fruit And Nut Cake', 'Butter Fruit And Nut Cake', 1.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/20_butterfruitandnutcake_1.jpg', 0, 9, 'Butter', '2025-03-02 16:24:42', '2025-03-02 16:24:42'),
	(21, 'Chocolate Gooey Butter Cake', 'Chocolate Gooey Butter Cake', 1.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/21_chocolategooeybuttercake_1.jpg', 12, 9, 'Butter', '2025-03-02 16:25:27', '2025-03-02 16:25:27'),
	(22, 'Gooey Butte Cake', 'Gooey Butte Cake', 1.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/22_gooeybuttecake_1.jpg', 1, 9, 'Butter', '2025-03-02 16:25:59', '2025-03-02 16:25:59'),
	(23, 'Marble Butter Cake', 'Marble Butter Cake', 2.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/23_marblebuttercake_1.jpg', 0, 9, 'Butter', '2025-03-02 16:26:30', '2025-03-02 16:26:30'),
	(24, 'Ooey Gooey Cake', 'Ooey Gooey Cake', 2.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/24_ooeygooeycake_1.jpg', 0, 9, 'Butter', '2025-03-02 16:27:05', '2025-03-02 16:27:05'),
	(25, 'Vanilla Layer Cake Vicky Wasik', 'Vanilla Layer Cake Vicky Wasik', 1.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/25_vanillalayercakevickywasik_1.jpg', 0, 9, 'Butter', '2025-03-02 16:27:42', '2025-03-02 16:27:42'),
	(35, 'Product Test 1', 'abasdf', 15.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/35_CookiesandCream.jpeg', 15, 8, 'Donut', '2025-03-03 13:53:43', '2025-03-03 13:54:06'),
	(37, 'Product Test 2', 'description2', 18.00, 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/no_image_available.png', 0, 8, 'Donut', '2025-03-03 13:57:30', '2025-03-03 13:57:39');

-- Dumping structure for table dbproducttest.tbroles
DROP TABLE IF EXISTS `tbroles`;
CREATE TABLE IF NOT EXISTS `tbroles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbproducttest.tbroles: ~3 rows (approximately)
INSERT INTO `tbroles` (`id`, `name`) VALUES
	(2, 'admin'),
	(1, 'customer'),
	(3, 'manager');

-- Dumping structure for table dbproducttest.tbusers
DROP TABLE IF EXISTS `tbusers`;
CREATE TABLE IF NOT EXISTS `tbusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default',
  `lastname` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default',
  `age` tinyint NOT NULL DEFAULT '0',
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'male',
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/user_default_profile.png',
  `role_id` int NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `tbusers_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbroles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbproducttest.tbusers: ~8 rows (approximately)
INSERT INTO `tbusers` (`id`, `firstname`, `lastname`, `age`, `gender`, `username`, `email`, `password`, `image`, `role_id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'defualt', 'user', 0, 'male', 'pikoadmin', 'pikoadmin@gmail.com', '$2y$12$0MiOQnLPhILkf4WppGRHhuI84uFvzrxp84tiHQf9nHC0TGh0hyVo6', 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/user_default_profile.png', 2, 'admin', '2025-02-27 19:24:06', '2025-03-03 16:25:13'),
	(2, 'defualt', 'user', 0, 'male', 'piko', 'piko@gmail.com', '$2y$12$0MiOQnLPhILkf4WppGRHhuI84uFvzrxp84tiHQf9nHC0TGh0hyVo6', 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/user_default_profile.png', 1, 'customer', '2025-02-27 19:24:47', '2025-03-03 16:25:13'),
	(3, 'defualt', 'user', 0, 'male', 'pikomanager', 'pikomanager@gmail.com', '$2y$12$uCnOGDvCOei7tZaoU4vpJeVyUk7tXCTHvOzbJV5GUMGgjztvX2KA2', 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/user_default_profile.png', 3, 'manager', '2025-02-27 20:06:27', '2025-03-03 16:25:13'),
	(30, 'default1', 'user', 19, 'female', 'user20', 'user20@gmail.com', '$2y$10$CIm8q5IZz/APOFl2qC5pFOlFWs0CksnTtsgN8fOKX69/tPuH2.bHK', 'https://php-ankor-images.s3.ap-southeast-1.amazonaws.com/user_default_profile.png', 3, 'manager', '2025-03-03 20:54:59', '2025-03-03 20:54:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
