-- Create the database
CREATE DATABASE IF NOT EXISTS shoezly_db;

-- Use the database
USE shoezly_db;

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) 
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) 
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) 
CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
)
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL
) 


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
)
