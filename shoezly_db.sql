-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28
-- Create the database
CREATE DATABASE IF NOT EXISTS shoezly_db;

-- Use the database
USE shoezly_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoezly_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 'Karim', 'Merhi', 'merhikarim@hotmail.com', '81138807', 'merhi123');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL
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
(26, 'NMD_R1 Flash Red', 36.50, 'ABC', 'ADIDAS', 140.00, 'CASUAL', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/90f85768e3894aeaab67aba0014a3379_9366/NMD_R1_Shoes_Red_FY9389_01_standard.jpg', 5, 'WOMEN'),
(27, 'Nike React Infinity Run Flyknit', 40.50, 'ABC', 'NIKE', 160.00, 'RUNNING', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-665455a5-45de-40fb-945f-c1852b82400d/react-infinity-run-flyknit-mens-running-shoe-zX42Nc.jpg', 3, 'MEN'),
(28, 'Nike React Miler', 39.50, 'ABC', 'NIKE', 130.00, 'RUNNING', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-5cc7de3b-2afc-49c2-a1e4-0508997d09e6/react-miler-mens-running-shoe-DgF6nr.jpg', 3, 'MEN'),
(29, 'Nike Air Zoom Pegasus 37', 37.00, 'ABC', 'NIKE', 120.00, 'RUNNING', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-33b0a0a5-c171-46cc-ad20-04a768703e47/air-zoom-pegasus-37-womens-running-shoe-Jl0bDf.jpg', 3, 'WOMEN'),
(30, 'Nike Joyride Run Flyknit', 36.50, 'ABC', 'NIKE', 180.00, 'RUNNING', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/99a7d3cb-e40c-4474-91c2-0f2e6d231fd2/joyride-run-flyknit-womens-running-shoe-HcfnJd.jpg', 3, 'WOMEN'),
(31, 'Nike Mercurial Vapor 13 Elite FG', 35.00, 'ABC', 'NIKE', 250.00, 'FOOTBALL', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/9dda6202-e2ff-4711-9a09-0fcb7d90c164/mercurial-vapor-13-elite-fg-firm-ground-soccer-cleat-14MsF2.jpg', 3, 'WOMEN'),
(32, 'Nike Phantom Vision Elite Dynamic Fit FG', 37.00, 'ABC', 'NIKE', 150.00, 'FOOTBALL', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/s1amp7uosrn0nqpsxeue/phantom-vision-elite-dynamic-fit-fg-firm-ground-soccer-cleat-19Kv1V.jpg', 3, 'WOMEN'),
(33, 'Nike Phantom Venom Academy FG', 37.50, 'ABC', 'NIKE', 80.00, 'FOOTBALL', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/whegph8z9ornhxklc8rp/phantom-venom-academy-fg-firm-ground-soccer-cleat-6JVNll.jpg', 3, 'WOMEN'),
(34, 'Nike Mercurial Vapor 13 Elite Tech Craft FG', 44.00, 'ABC', 'NIKE', 145.00, 'FOOTBALL', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/vhbwnkor8sxt8qtecgia/mercurial-vapor-13-elite-tech-craft-fg-firm-ground-soccer-cleat-l38JPj.jpg', 3, 'MEN'),
(35, 'Nike Mercurial Superfly 7 Pro MDS FG', 42.00, 'ABC', 'NIKE', 137.00, 'FOOTBALL', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-a52a8aec-22dc-4982-961b-75c5f4c72805/mercurial-superfly-7-pro-mds-fg-firm-ground-soccer-cleat-mhcpdN.jpg', 3, 'MEN'),
(36, 'Nike Air Force 1', 30.00, 'ABC', 'NIKE', 90.00, 'CASUAL', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/178b2a46-3ee4-492b-882e-f71efdd53a36/air-force-1-big-kids-shoe-2zqp8D.jpg', 3, 'KIDS'),
(37, 'Nike Renew Run', 32.00, 'ABC', 'NIKE', 80.00, 'RUNNING', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/i1-73e54c0b-11a6-478b-9f90-bd97fcde872d/renew-run-big-kids-running-shoe-5Bpz93.jpg', 3, 'KIDS'),
(38, 'Bridgeport Advice', 43.00, 'ABC', 'HUSHPUPPIES', 30.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/BRIDGPORT_ADVICE-BLACK_1_800x800.jpg?v=1576567903', 4, 'MEN'),
(39, 'Beck', 43.00, 'ABC', 'HUSHPUPPIES', 80.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/Beck-Black_800x800.jpg', 5, 'MEN'),
(40, 'Fester', 46.00, 'ABC', 'HUSHPUPPIES', 70.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/fester-Tan_800x800.jpg?v=1575537531', 6, 'MEN'),
(41, 'Pixel', 41.00, 'ABC', 'HUSHPUPPIES', 75.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/PIXEL-TAN_800x800.jpg?v=1577420506', 7, 'MEN'),
(42, 'Austin', 45.00, 'ABC', 'HUSHPUPPIES', 75.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/Austin-Coffee_800x800.jpg?v=1574772988', 2, 'MEN'),
(43, 'SS-HL-0135', 36.50, 'ABC', 'HUSHPUPPIES', 30.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009240000-11-SS-HL-0135-Black_800x800.jpg?v=1572264270', 6, 'WOMEN'),
(44, 'SS-HL-0136', 39.00, 'ABC', 'HUSHPUPPIES', 50.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009250000-779-SS-HL-0136-Coffee_800x800.jpg?v=1571900372', 4, 'WOMEN'),
(45, 'SS-HL-0128', 39.00, 'ABC', 'HUSHPUPPIES', 35.00, 'FORMAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/000300242-484-SS-HL-0128-Blue_800x800.jpg?v=1583235174', 3, 'WOMEN'),
(46, 'SS-MS-0075', 36.00, 'ABC', 'HUSHPUPPIES', 25.00, 'CASUAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/009170000-479-SS-MS-0075-Red_800x800.jpg?v=1570688687', 7, 'WOMEN'),
(47, 'SS-PM-0093', 40.00, 'ABC', 'HUSHPUPPIES', 30.00, 'CASUAL', 'https://cdn.shopify.com/s/files/1/0016/0074/9623/products/SS-PM-0093_1_800x800.jpg?v=1570601253', 3, 'WOMEN'),
(48, 'Nizza X Disney', 31.00, 'ABC', 'ADIDAS', 55.00, 'CASUAL', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/ef901c7aeac042578eceab9d0159196c_9366/Nizza_x_Disney_Sport_Goofy_Shoes_White_FW0651_01_standard.jpg', 6, 'KIDS'),
(49, 'X_PLR', 33.00, 'ABC', 'ADIDAS', 65.00, 'CASUAL', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/a36518227134495da766ab9d01772fa2_9366/X_PLR_Shoes_Red_FY9063_01_standard.jpg', 5, 'KIDS'),
(50, 'Stan Smith', 34.00, 'ABC', 'ADIDAS', 55.00, 'CASUAL', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/d0720712d81e42b1b30fa80800826447_9366/Stan_Smith_Shoes_White_M20607_M20607_01_standard.jpg', 3, 'KIDS'),
(51, 'NMD_R1', 31.50, 'ABC', 'ADIDAS', 120.00, 'RUNNING', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/99ca762cb9054caf82fbabc500fd146e_9366/NMD_R1_Shoes_Blue_FY9392_01_standard.jpg', 3, 'KIDS'),
(52, 'NMD_R1 Flash Red', 36.50, 'ABC', 'ADIDAS', 140.00, 'CASUAL', 'https://assets.adidas.com/images/h_320,f_auto,q_auto:sensitive,fl_lossy/90f85768e3894aeaab67aba0014a3379_9366/NMD_R1_Shoes_Red_FY9389_01_standard.jpg', 5, 'WOMEN'),
(53, 'Pro Classic Sneakers', 45.00, 'ABC', 'Puma', 50.00, 'CASUAL', 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/380190/01/sv01/fnd/PNA/fmt/png/CA-Pro-Classic-Sneakers', 10, 'MEN'),
(54, 'Softride Enzo NXT', 44.00, 'ABC', 'Puma', 250.00, 'Running', 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/195234/05/sv01/fnd/DFA/fmt/png/Softride-Enzo-NXT-Running-Shoes-Men', 4, 'MEN'),
(55, 'BETTER FOAM Adore', 36.00, 'ABC', 'Puma', 100.00, 'Running', 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/195234/05/sv01/fnd/DFA/fmt/png/Softride-Enzo-NXT-Running-Shoes-Men', 22, 'WOMEN'),
(56, 'Caven 2.0 Sneakers', 42.50, 'ABC', 'Puma', 160.00, 'CASUAL', 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/195234/05/sv01/fnd/DFA/fmt/png/Softride-Enzo-NXT-Running-Shoes-Men', 10, 'MEN'),
(57, 'Varion Indoor', 42.00, 'ABC', 'Puma', 205.00, 'Running', 'https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_2000,h_2000/global/106472/03/sv01/fnd/SEA/fmt/png/Varion-Indoor-Sports-Shoes', 15, 'MEN'),
(58, '574 Core', 45.00, 'ABC', 'New Balance', 130.00, 'CASUAL', 'https://nb.scene7.com/is/image/NB/wl574evw_nb_02_i?$pdpflexf2$&wid=440&hei=440', 21, 'MEN'),
(59, 'FuelCell SuperComp Trainer', 42.00, 'ABC', 'New Balance', 250.00, 'Running', 'https://nb.scene7.com/is/image/NB/mrcxlg3_nb_02_i?$pdpflexf2$&wid=440&hei=440', 7, 'MEN'),
(60, 'J.Crew 620', 36.00, 'ABC', 'New Balance', 100.00, 'CASUAL', 'https://www.jcrew.com/s7-img-facade/06690_EF0173', 22, 'WOMEN'),
(61, '574 Core Jr', 33.00, 'ABC', 'New Balance', 90.00, 'CASUAL', 'https://nb.scene7.com/is/image/NB/pc574evg_nb_02_i?$pdpflexf2$&wid=440&hei=440', 10, 'KIDS'),
(62, '480 Sneakers Shoes', 32.00, 'ABC', 'New Balance', 60.00, 'Running', 'https://www.footlocker.ph/media/catalog/product/cache/e81e4f913a1cad058ef66fea8e95c839/0/8/0803-NEWGSB480WHM12W006-1.jpg', 3, 'KIDS'),
(63, 'Vans #36', 40.00, 'ABC', 'Vans', 75.00, 'CASUAL', 'https://images.vans.com/is/image/VansEU/VN000D3HY28-HERO?$PDP-FULL-IMAGE-NEW$', 7, 'MEN'),
(64, 'Classic Slip-On Checkerboard Shoe', 43.00, 'ABC', 'Vans', 60.00, 'CASUAL', 'https://images.vans.com/is/image/Vans/VN000EYE_BWW_HERO?wid=800&hei=1004&fmt=jpeg&qlt=50&resMode=sharp2&op_usm=0.9,1.5,8,0', 17, 'MEN'),
(65, 'Knu Skool Shoe', 43.00, 'ABC', 'Vans', 75.00, 'CASUAL', 'https://images.vans.com/is/image/Vans/VN0009QC_6BT_HERO?wid=800&hei=1004&fmt=jpeg&qlt=50&resMode=sharp2&op_usm=0.9,1.5,8,0', 7, 'MEN'),
(66, 'Skate Old Skool', 45.00, 'ABC', 'Vans', 80.00, 'CASUAL', 'https://www.vans.com.au/media/catalog/product/v/n/vna5fcbb9m_blk_01.jpg?auto=webp&quality=85&format=pjpg&width=100%25&fit=cover', 3, 'MEN'),
(67, 'Toddler Pastel Block Slip-On V', 32.00, 'ABC', 'Vans', 55.00, 'CASUAL', 'https://boathousefootwear.com/cdn/shop/files/VAN-VN0A3488BS5-FLO-1_1000x.jpg?v=1692392625', 5, 'KIDS'),
(68, 'Uno - Night Shades', 40.00, 'ABC', 'Skechers', 85.00, 'CASUAL', 'https://www.skechers.com/dw/image/v2/BDCN_PRD/on/demandware.static/-/Sites-skechers-master/default/dw75c4509e/images/large/73667_PUR.jpg?sw=800', 34, 'MEN'),
(69, 'Skechers Flutter Heart', 32.00, 'ABC', 'Skechers', 115.00, 'CASUAL', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCKstAZzkn1M_KtSWxueOt7OHSERObGioHa4FXJj8BGw&s', 14, 'KIDS'),
(70, 'SLIP-INS RF: D\'LUX WALKER - ORFORD', 45.00, 'ABC', 'Skechers', 80.00, 'CASUAL', 'https://www.skechers.in/on/demandware.static/-/Sites-skechers_india/default/dwaf2495e2/images/large/196642884723-1.jpg', 3, 'MEN'),
(71, 'Slip-ins: GO WALK 6', 37.00, 'ABC', 'Skechers', 120.00, 'CASUAL', 'https://www.skechers.ch/dw/image/v2/BDCN_PRD/on/demandware.static/-/Sites-skechers-master/default/dw63526a5e/images/large/124569_GRY.jpg?sw=800', 15, 'WOMEN'),
(72, 'Viper Court - Pickleball', 43.00, 'ABC', 'Skechers', 95.00, 'CASUAL', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNg9m6trZh38TNATdrHoKMIk5DQPK-zr6fm64QRFbe4w&s', 34, 'MEN'),
(73, 'White-Highes', 41.00, 'ABC', 'Skechers', 180.00, 'CASUAL', 'https://www.skechers.com/dw/image/v2/BDCN_PRD/on/demandware.static/-/Sites-skechers-master/default/dwff80d42f/images/large/177190_WHT.jpg?sw=400', 12, 'MEN');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
