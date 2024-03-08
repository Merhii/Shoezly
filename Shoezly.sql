-- Create the database
CREATE DATABASE IF NOT EXISTS shoezly_db;

-- Use the database
USE shoezly_db;

CREATE TABLE Customers (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  phone_number VARCHAR(255) UNIQUE,
  password VARCHAR(255) NOT NULL
);
CREATE TABLE Products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  stock_quantity INT NOT NULL
);
CREATE TABLE Orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  order_date DATETIME NOT NULL,
  order_status VARCHAR(255) NOT NULL,
  total_amount DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);
CREATE TABLE Payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT,
  amount DECIMAL(10, 2) NOT NULL,
  payment_type VARCHAR(255) NOT NULL,
  payment_status VARCHAR(255) NOT NULL,
  payment_date DATETIME NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

CREATE TABLE Order_Details (
  order_details_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES Orders(order_id),
  FOREIGN KEY (product_id) REFERENCES Products(product_id)
);
CREATE TABLE Shipments (
  shipment_id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  shipment_status VARCHAR(255) NOT NULL,
  tracking_number VARCHAR(255) UNIQUE NOT NULL,
  estimated_delivery DATE NOT NULL,
  FOREIGN KEY (order_id) REFERENCES Orders(order_id)
);
CREATE TABLE Admin (
  Admin_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  phone_number VARCHAR(255) UNIQUE,
  password VARCHAR(255) NOT NULL
);
