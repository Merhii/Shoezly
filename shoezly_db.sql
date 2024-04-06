-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2024 at 12:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS shoezly_db;
USE shoezly_db;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoezly_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `id` int(11) NOT NULL,
  `Brand_Name` varchar(50) NOT NULL,
  `img_URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`id`, `Brand_Name`, `img_URL`) VALUES
(1, 'ADIDAS', 'Adidas-logo.webp'),
(2, 'NIKE', 'swoosh-logo-black.jpeg'),
(3, 'HUSHPUPPIES', 'png-clipart-hush-puppies-logo-icons-logos-emojis-shop-logos-thumbnail-removebg-preview.png'),
(4, 'Puma', '6ccdc81387540fceb241474103f0af5f.w828.h828.png'),
(5, 'New Balance', 'new-balance.jpg'),
(6, 'Vans', 'png-clipart-vans-t-shirt-logo-shoe-brand-t-shirt-angle-text.png'),
(7, 'Skechers', 'Skechers-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`) VALUES
(1, 'Karim', 'Merhi', 'merhikarim@hotmail.com', '81138807', 'merhi123', 'user'),
(5, 'admin', 'admin', 'admin@shoezly.db.com', NULL, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `shoe_size` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `Brand` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `imageURL` text NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `shoe_size`, `description`, `Brand`, `price`, `category`, `imageURL`, `stock_quantity`, `gender`) VALUES
(26, 'NMD_R1 Flash Red', 36.50, 'ABC', 'ADIDAS', 140.00, 'CASUAL', 'NMD_R1.avif', 5, 'WOMEN'),
(27, 'Nike React Infinity Run Flyknit', 40.50, 'ABC', 'NIKE', 160.00, 'RUNNING', 'Nike React.webp', 3, 'MEN'),
(28, 'Nike React Miler', 39.50, 'ABC', 'NIKE', 130.00, 'RUNNING', 'Nike React Miler.jpg', 3, 'MEN'),
(29, 'Nike Air Zoom Pegasus 37', 37.00, 'ABC', 'NIKE', 120.00, 'RUNNING', 'Nike Air Zoom.jpg', 3, 'WOMEN'),
(30, 'Nike Joyride Run Flyknit', 36.50, 'ABC', 'NIKE', 180.00, 'RUNNING', 'Nike Joyride Run.jpg', 3, 'WOMEN'),
(31, 'Nike Mercurial Vapor 13 Elite FG', 35.00, 'ABC', 'NIKE', 250.00, 'FOOTBALL', 'Nike Mercurial.jpg', 3, 'WOMEN'),
(32, 'Nike Phantom Vision Elite Dynamic Fit FG', 37.00, 'ABC', 'NIKE', 150.00, 'FOOTBALL', 'Nike Phantom.jpeg', 3, 'WOMEN'),
(33, 'Nike Phantom Venom Academy FG', 37.50, 'ABC', 'NIKE', 80.00, 'FOOTBALL', 'Nike Phantom Venom.jpg', 3, 'WOMEN'),
(34, 'Nike Mercurial Vapor 13 Elite Tech Craft FG', 44.00, 'ABC', 'NIKE', 145.00, 'FOOTBALL', 'Nike Mercurial Vapor.jpg', 3, 'MEN'),
(35, 'Nike Mercurial Superfly 7 Pro MDS FG', 42.00, 'ABC', 'NIKE', 137.00, 'FOOTBALL', 'Nike Merurial Superfly.jpg', 3, 'MEN'),
(36, 'Nike Air Force 1', 30.00, 'ABC', 'NIKE', 90.00, 'CASUAL', 'Nike Air Force 1.jpg', 3, 'KIDS'),
(37, 'Nike Renew Run', 32.00, 'ABC', 'NIKE', 80.00, 'RUNNING', 'Nike Renew Run.jpg', 3, 'KIDS'),
(38, 'Bridgeport Advice', 43.00, 'ABC', 'HUSHPUPPIES', 30.00, 'FORMAL', 'Bridgeport Advice.jpeg', 4, 'MEN'),
(40, 'Fester', 46.00, 'ABC', 'HUSHPUPPIES', 70.00, 'FORMAL', 'Fester.webp', 6, 'MEN'),
(41, 'Pixel', 41.00, 'ABC', 'HUSHPUPPIES', 75.00, 'FORMAL', 'Pixel.jpeg', 7, 'MEN'),
(42, 'Austin', 45.00, 'ABC', 'HUSHPUPPIES', 75.00, 'FORMAL', 'Austin.webp', 2, 'MEN'),
(43, 'SS-HL-0135', 36.50, 'ABC', 'HUSHPUPPIES', 30.00, 'FORMAL', 'HighHeels.webp', 6, 'WOMEN'),
(44, 'SS-HL-0136', 39.00, 'ABC', 'HUSHPUPPIES', 50.00, 'FORMAL', 'Grey Heels.jpeg', 4, 'WOMEN'),
(45, 'SS-HL-0128', 39.00, 'ABC', 'HUSHPUPPIES', 35.00, 'FORMAL', 'low heels.webp', 3, 'WOMEN'),
(46, 'SS-MS-0075', 36.00, 'ABC', 'HUSHPUPPIES', 25.00, 'CASUAL', 'sandal.webp', 7, 'MEN'),
(47, 'SS-PM-0093', 40.00, 'ABC', 'HUSHPUPPIES', 30.00, 'CASUAL', 'black heels.webp', 3, 'WOMEN'),
(48, 'Nizza X Disney', 31.00, 'ABC', 'ADIDAS', 55.00, 'CASUAL', 'Nizza X Disney.avif', 6, 'KIDS'),
(49, 'X_PLR', 33.00, 'ABC', 'ADIDAS', 65.00, 'CASUAL', 'X_PLR.avif', 5, 'KIDS'),
(50, 'Stan Smith', 34.00, 'ABC', 'ADIDAS', 55.00, 'CASUAL', 'Stan Smith.avif', 3, 'KIDS'),
(51, 'NMD_R1', 31.50, 'ABC', 'ADIDAS', 120.00, 'RUNNING', 'NMD_R1_Blue.avif', 3, 'KIDS'),
(52, 'NMD_R1 Flash Red', 36.50, 'ABC', 'ADIDAS', 140.00, 'CASUAL', 'NMD_R1.avif', 5, 'WOMEN'),
(53, 'Pro Classic Sneakers', 45.00, 'ABC', 'Puma', 50.00, 'CASUAL', 'Pro Classic Sneakers.avif', 10, 'MEN'),
(54, 'Softride Enzo NXT', 44.00, 'ABC', 'Puma', 250.00, 'Running', 'Softride Enzo NXT.jpeg', 4, 'MEN'),
(57, 'Varion Indoor', 42.00, 'ABC', 'Puma', 205.00, 'Running', 'Varion Indoor.avif', 15, 'MEN'),
(58, '574 Core', 45.00, 'ABC', 'New Balance', 130.00, 'CASUAL', '574 Core.webp', 21, 'MEN'),
(59, 'FuelCell SuperComp Trainer', 42.00, 'ABC', 'New Balance', 250.00, 'Running', 'FuelCell SuperComp Trainer.webp', 7, 'MEN'),
(60, 'J.Crew 620', 36.00, 'ABC', 'New Balance', 100.00, 'CASUAL', 'J.Crew 620.webp', 22, 'WOMEN'),
(61, '574 Core Jr', 33.00, 'ABC', 'New Balance', 90.00, 'CASUAL', '574 Core Jr.webp', 10, 'KIDS'),
(62, '480 Sneakers Shoes', 32.00, 'ABC', 'New Balance', 60.00, 'Running', '480 Sneakers Shoes.jpg', 3, 'KIDS'),
(63, 'Vans #36', 40.00, 'ABC', 'Vans', 75.00, 'CASUAL', 'Vans36.webp', 7, 'MEN'),
(64, 'Classic Slip-On Checkerboard Shoe', 43.00, 'ABC', 'Vans', 60.00, 'CASUAL', 'Classic Slip-On Checkerboard Shoe.webp', 17, 'MEN'),
(65, 'Knu Skool Shoe', 43.00, 'ABC', 'Vans', 75.00, 'CASUAL', 'Knu Skool Shoe.webp', 7, 'MEN'),
(66, 'Skate Old Skool', 45.00, 'ABC', 'Vans', 80.00, 'CASUAL', 'Skate Old Skool.webp', 3, 'MEN'),
(67, 'Toddler Pastel Block Slip-On V', 32.00, 'ABC', 'Vans', 55.00, 'CASUAL', 'Vans Pastel.webp', 5, 'KIDS'),
(68, 'Uno - Night Shades', 40.00, 'ABC', 'Skechers', 85.00, 'CASUAL', 'Uno - Night Shades.jpg', 34, 'MEN'),
(69, 'Skechers Flutter Heart', 32.00, 'ABC', 'Skechers', 115.00, 'CASUAL', 'Skechers Flutter Heart.jpeg', 14, 'KIDS'),
(70, 'SLIP-INS RF: D\'LUX WALKER - ORFORD', 45.00, 'ABC', 'Skechers', 80.00, 'CASUAL', 'D\'LUX WALKER - ORFORD.jpg', 3, 'MEN'),
(71, 'Slip-ins: GO WALK 6', 37.00, 'ABC', 'Skechers', 120.00, 'CASUAL', '124569_GRY.jpg', 15, 'WOMEN'),
(72, 'Viper Court - Pickleball', 43.00, 'ABC', 'Skechers', 95.00, 'CASUAL', 'Viper Court - Pickleball.jpeg', 34, 'MEN'),
(73, 'White-Highes', 41.00, 'ABC', 'Skechers', 180.00, 'CASUAL', 'White-Highes.jpg', 12, 'MEN');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `shipment_status` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `estimated_delivery` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Testimonial`
--

CREATE TABLE `Testimonial` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `description_txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `Testimonial`
--
ALTER TABLE `Testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Testimonial`
--
ALTER TABLE `Testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
