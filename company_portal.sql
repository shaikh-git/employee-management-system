-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `performance` int(11) DEFAULT 0,
  `status` enum('active','inactive') DEFAULT 'active',
  `role` enum('employee','admin') DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone`, `salary`, `performance`, `status`, `role`) VALUES
(2, 'Bob Smith', 'bob.smith@example.com', '456 Oak Ave, Springfield', '555-5678-7000', 60000.00, 90, 'active', 'employee'),
(3, 'Carol Lee', 'carol.lee@example.com', '789 Pine Rd, Springfield', '555-8765', 52000.00, 78, 'active', 'employee'),
(4, 'David Brown', 'david.brown@example.com', '321 Elm St, Springfield', '555-4321', 58000.00, 82, 'active', 'employee'),
(5, 'Eva Green', 'eva.green@example.com', '654 Cedar Ln, Springfield', '555-2468', 61000.00, 88, 'active', 'employee'),
(6, 'Frank Wilson', 'frank.wilson@example.com', '987 Birch Blvd, Springfield', '555-1357', 57000.00, 80, 'active', 'employee'),
(7, 'Grace Kim', 'grace.kim@example.com', '246 Willow Way, Springfield', '555-9753', 59000.00, 84, 'active', 'employee'),
(8, 'Henry Davis', 'henry.davis@example.com', '135 Aspen Dr, Springfield', '555-8642', 56500.00, 81, 'active', 'employee'),
(9, 'Ivy Martinez', 'ivy.martinez@example.com', '864 Spruce Ct, Springfield', '555-7531', 60000.00, 87, 'active', 'employee'),
(10, 'Jack Thompson', 'jack.thompson@example.com', '579 Poplar St, Springfield', '555-1593', 58000.00, 83, 'active', 'employee'),
(11, 'Alice Johnson', 'alice.johnson2@example.com', '123 Maple St, Springfield', '555-1011', 55500.00, 86, 'active', 'employee'),
(12, 'Bob Smith', 'bob.smith2@example.com', '456 Oak Ave, Springfield', '555-1012', 60500.00, 91, 'active', 'employee'),
(13, 'Carol Lee', 'carol.lee2@example.com', '789 Pine Rd, Springfield', '555-1013', 52500.00, 79, 'active', 'employee'),
(14, 'David Brown', 'david.brown2@example.com', '321 Elm St, Springfield', '555-1014', 58500.00, 83, 'active', 'employee'),
(15, 'Eva Green', 'eva.green2@example.com', '654 Cedar Ln, Springfield', '555-1015', 61500.00, 89, 'active', 'employee'),
(16, 'Frank Wilson', 'frank.wilson2@example.com', '987 Birch Blvd, Springfield', '555-1016', 57500.00, 81, 'active', 'employee'),
(17, 'Grace Kim', 'grace.kim2@example.com', '246 Willow Way, Springfield', '555-1017', 59500.00, 85, 'active', 'employee'),
(18, 'Henry Davis', 'henry.davis2@example.com', '135 Aspen Dr, Springfield', '555-1018', 57000.00, 82, 'active', 'employee'),
(19, 'Ivy Martinez', 'ivy.martinez2@example.com', '864 Spruce Ct, Springfield', '555-1019', 60500.00, 88, 'active', 'employee'),
(20, 'Jack Thompson', 'jack.thompson2@example.com', '579 Poplar St, Springfield', '555-1020', 58500.00, 84, 'active', 'employee'),
(21, 'Alice Johnson', 'alice.johnson3@example.com', '123 Maple St, Springfield', '555-1021', 56000.00, 87, 'active', 'employee'),
(22, 'Bob Smith', 'bob.smith3@example.com', '456 Oak Ave, Springfield', '555-1022', 61000.00, 92, 'active', 'employee'),
(23, 'Carol Lee', 'carol.lee3@example.com', '789 Pine Rd, Springfield', '555-1023', 53000.00, 80, 'active', 'employee'),
(24, 'David Brown', 'david.brown3@example.com', '321 Elm St, Springfield', '555-1024', 59000.00, 84, 'active', 'employee'),
(25, 'Eva Green', 'eva.green3@example.com', '654 Cedar Ln, Springfield', '555-1025', 62000.00, 90, 'active', 'employee'),
(26, 'Frank Wilson', 'frank.wilson3@example.com', '987 Birch Blvd, Springfield', '555-1026', 58000.00, 82, 'active', 'employee'),
(27, 'Grace Kim', 'grace.kim3@example.com', '246 Willow Way, Springfield', '555-1027', 60000.00, 86, 'active', 'employee'),
(28, 'Henry Davis', 'henry.davis3@example.com', '135 Aspen Dr, Springfield', '555-1028', 57500.00, 83, 'active', 'employee'),
(29, 'Ivy Martinez', 'ivy.martinez3@example.com', '864 Spruce Ct, Springfield', '555-1029', 61000.00, 89, 'active', 'employee'),
(30, 'Jack Thompson', 'jack.thompson3@example.com', '579 Poplar St, Springfield', '555-1030', 59000.00, 85, 'active', 'employee'),
(31, 'Liam Johnson', 'liam.johnson@example.com', '101 Oak St, Springfield', '555-2001', 56000.00, 82, 'active', 'employee'),
(32, 'Emma Smith', 'emma.smith@example.com', '102 Pine Ave, Springfield', '555-2002', 59000.00, 88, 'active', 'employee'),
(33, 'Noah Williams', 'noah.williams@example.com', '103 Maple Rd, Springfield', '555-2003', 57000.00, 85, 'active', 'employee'),
(34, 'Olivia Brown', 'olivia.brown@example.com', '104 Cedar Ln, Springfield', '555-2004', 60000.00, 90, 'active', 'employee'),
(35, 'William Jones', 'william.jones@example.com', '105 Birch Blvd, Springfield', '555-2005', 58000.00, 84, 'active', 'employee'),
(36, 'Ava Garcia', 'ava.garcia@example.com', '106 Spruce Ct, Springfield', '555-2006', 61000.00, 87, 'active', 'employee'),
(37, 'James Miller', 'james.miller@example.com', '107 Elm St, Springfield', '555-2007', 56500.00, 81, 'active', 'employee'),
(38, 'Isabella Davis', 'isabella.davis@example.com', '108 Aspen Dr, Springfield', '555-2008', 59500.00, 86, 'active', 'employee'),
(39, 'Benjamin Martinez', 'benjamin.martinez@example.com', '109 Willow Way, Springfield', '555-2009', 58000.00, 83, 'active', 'employee'),
(40, 'Sophia Rodriguez', 'sophia.rodriguez@example.com', '110 Poplar St, Springfield', '555-2010', 60000.00, 88, 'active', 'employee'),
(41, 'Mason Hernandez', 'mason.hernandez@example.com', '111 Oak St, Springfield', '555-2011', 57000.00, 82, 'active', 'employee'),
(42, 'Mia Lopez', 'mia.lopez@example.com', '112 Pine Ave, Springfield', '555-2012', 59000.00, 85, 'active', 'employee'),
(43, 'Elijah Gonzalez', 'elijah.gonzalez@example.com', '113 Maple Rd, Springfield', '555-2013', 60000.00, 87, 'active', 'employee'),
(44, 'Charlotte Wilson', 'charlotte.wilson@example.com', '114 Cedar Ln, Springfield', '555-2014', 61000.00, 89, 'active', 'employee'),
(45, 'Logan Anderson', 'logan.anderson@example.com', '115 Birch Blvd, Springfield', '555-2015', 56500.00, 80, 'active', 'employee'),
(46, 'Amelia Thomas', 'amelia.thomas@example.com', '116 Spruce Ct, Springfield', '555-2016', 59500.00, 86, 'active', 'employee'),
(47, 'Alexander Taylor', 'alexander.taylor@example.com', '117 Elm St, Springfield', '555-2017', 58000.00, 83, 'active', 'employee'),
(48, 'Harper Moore', 'harper.moore@example.com', '118 Aspen Dr, Springfield', '555-2018', 60000.00, 88, 'active', 'employee'),
(49, 'Daniel Jackson', 'daniel.jackson@example.com', '119 Willow Way, Springfield', '555-2019', 57000.00, 82, 'active', 'employee'),
(50, 'Evelyn Martin', 'evelyn.martin@example.com', '120 Poplar St, Springfield', '555-2020', 59000.00, 85, 'active', 'employee'),
(51, 'Jacob Lee', 'jacob.lee@example.com', '121 Oak St, Springfield', '555-2021', 60000.00, 87, 'active', 'employee'),
(52, 'Abigail Perez', 'abigail.perez@example.com', '122 Pine Ave, Springfield', '555-2022', 61000.00, 89, 'active', 'employee'),
(53, 'Michael White', 'michael.white@example.com', '123 Maple Rd, Springfield', '555-2023', 56500.00, 81, 'active', 'employee'),
(54, 'Emily Harris', 'emily.harris@example.com', '124 Cedar Ln, Springfield', '555-2024', 59500.00, 86, 'active', 'employee'),
(55, 'Sebastian Clark', 'sebastian.clark@example.com', '125 Birch Blvd, Springfield', '555-2025', 58000.00, 84, 'active', 'employee'),
(56, 'Elizabeth Lewis', 'elizabeth.lewis@example.com', '126 Spruce Ct, Springfield', '555-2026', 60000.00, 88, 'active', 'employee'),
(57, 'Matthew Robinson', 'matthew.robinson@example.com', '127 Elm St, Springfield', '555-2027', 57000.00, 83, 'active', 'employee'),
(58, 'Avery Walker', 'avery.walker@example.com', '128 Aspen Dr, Springfield', '555-2028', 59000.00, 85, 'active', 'employee'),
(59, 'David Hall', 'david.hall@example.com', '129 Willow Way, Springfield', '555-2029', 60500.00, 87, 'active', 'employee'),
(60, 'Sofia Allen', 'sofia.allen@example.com', '130 Poplar St, Springfield', '555-2030', 61000.00, 88, 'active', 'employee'),
(61, 'Joseph Young', 'joseph.young@example.com', '131 Oak St, Springfield', '555-2031', 56500.00, 81, 'active', 'employee'),
(62, 'Ella King', 'ella.king@example.com', '132 Pine Ave, Springfield', '555-2032', 59500.00, 86, 'active', 'employee'),
(63, 'Samuel Wright', 'samuel.wright@example.com', '133 Maple Rd, Springfield', '555-2033', 58000.00, 83, 'active', 'employee'),
(64, 'Scarlett Scott', 'scarlett.scott@example.com', '134 Cedar Ln, Springfield', '555-2034', 60000.00, 88, 'active', 'employee'),
(65, 'David Green', 'david.green2@example.com', '135 Birch Blvd, Springfield', '555-2035', 57000.00, 82, 'active', 'employee'),
(66, 'Victoria Baker', 'victoria.baker@example.com', '136 Spruce Ct, Springfield', '555-2036', 59000.00, 85, 'active', 'employee'),
(67, 'Anthony Adams', 'anthony.adams@example.com', '137 Elm St, Springfield', '555-2037', 60000.00, 87, 'active', 'employee'),
(68, 'Aria Nelson', 'aria.nelson@example.com', '138 Aspen Dr, Springfield', '555-2038', 61000.00, 89, 'active', 'employee'),
(69, 'Andrew Carter', 'andrew.carter@example.com', '139 Willow Way, Springfield', '555-2039', 56500.00, 80, 'active', 'employee'),
(70, 'Lillian Mitchell', 'lillian.mitchell@example.com', '140 Poplar St, Springfield', '555-2040', 59500.00, 86, 'active', 'employee'),
(71, 'Joshua Perez', 'joshua.perez@example.com', '141 Oak St, Springfield', '555-2041', 58000.00, 83, 'active', 'employee'),
(72, 'Chloe Roberts', 'chloe.roberts@example.com', '142 Pine Ave, Springfield', '555-2042', 60000.00, 88, 'active', 'employee'),
(73, 'Christopher Turner', 'christopher.turner@example.com', '143 Maple Rd, Springfield', '555-2043', 57000.00, 82, 'active', 'employee'),
(74, 'Zoey Phillips', 'zoey.phillips@example.com', '144 Cedar Ln, Springfield', '555-2044', 59000.00, 85, 'active', 'employee'),
(75, 'Nathan Campbell', 'nathan.campbell@example.com', '145 Birch Blvd, Springfield', '555-2045', 60500.00, 87, 'active', 'employee'),
(76, 'Hannah Parker', 'hannah.parker@example.com', '146 Spruce Ct, Springfield', '555-2046', 61000.00, 88, 'active', 'employee'),
(77, 'Ryan Evans', 'ryan.evans@example.com', '147 Elm St, Springfield', '555-2047', 56500.00, 81, 'active', 'employee'),
(78, 'Addison Edwards', 'addison.edwards@example.com', '148 Aspen Dr, Springfield', '555-2048', 59500.00, 86, 'active', 'employee'),
(79, 'Brayden Collins', 'brayden.collins@example.com', '149 Willow Way, Springfield', '555-2049', 58000.00, 83, 'active', 'employee'),
(80, 'Layla Stewart', 'layla.stewart@example.com', '150 Poplar St, Springfield', '555-2050', 60000.00, 88, 'active', 'employee'),
(81, 'Employee 100', 'employee100@example.com', '200 Elm St, Springfield', '555-2090', 60000.00, 85, 'active', 'employee'),
(82, 'soyeb mallik', 'soyeb@gmail.com', 'bbsr', '8529637415', 9000.00, 0, 'active', 'employee'),
(83, 'soyeb akhtar', 'akhtar@123', 'nayagarh', '7418529630', 50000.00, 0, 'active', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `quantity`, `price`) VALUES
(1, 'Laptop Pro 15\"', 'Electronics', 25, 1200.00),
(2, 'Wireless Mouse', 'Electronics', 100, 25.50),
(3, 'Office Chair', 'Furniture', 50, 150.00),
(4, 'Standing Desk', 'Furniture', 20, 350.00),
(5, 'Water Bottle', 'Accessories', 200, 12.00),
(6, 'Backpack', 'Accessories', 80, 45.00),
(7, 'LED Monitor 27\"', 'Electronics', 30, 300.00),
(8, 'Notebook Pack', 'Stationery', 150, 15.00),
(9, 'Pen Set', 'Stationery', 200, 8.50),
(10, 'Desk Lamp', 'Furniture', 60, 35.00),
(11, 'Smartphone X', 'Electronics', 40, 950.00),
(12, 'Headphones', 'Electronics', 75, 80.00),
(13, 'Laptop Pro 15\"', 'Electronics', 25, 1200.00),
(14, 'Wireless Mouse', 'Electronics', 100, 25.50),
(15, 'Office Chair', 'Furniture', 50, 150.00),
(16, 'Standing Desk', 'Furniture', 20, 350.00),
(17, 'Water Bottle', 'Accessories', 200, 12.00),
(18, 'Backpack', 'Accessories', 80, 45.00),
(19, 'LED Monitor 27\"', 'Electronics', 30, 300.00),
(20, 'Notebook Pack', 'Stationery', 150, 15.00),
(21, 'Pen Set', 'Stationery', 200, 8.50),
(22, 'Desk Lamp', 'Furniture', 60, 35.00),
(23, 'Smartphone X', 'Electronics', 40, 950.00),
(24, 'Headphones', 'Electronics', 75, 80.00),
(25, 'Tablet S7', 'Electronics', 35, 650.00),
(26, 'Gaming Chair', 'Furniture', 25, 200.00),
(27, 'Keyboard Mechanical', 'Electronics', 80, 70.00),
(28, 'Smartwatch Z', 'Electronics', 50, 220.00),
(29, 'Printer Ink', 'Stationery', 120, 25.00),
(30, 'File Organizer', 'Stationery', 100, 18.00),
(31, 'Desk Organizer', 'Stationery', 90, 20.00),
(32, 'Camera DSLR', 'Electronics', 15, 1200.00),
(33, 'Tripod Stand', 'Electronics', 30, 55.00),
(34, 'External Hard Drive', 'Electronics', 60, 100.00),
(35, 'USB-C Cable', 'Electronics', 200, 10.00),
(36, 'Notebook A4', 'Stationery', 300, 5.00),
(37, 'Office Table', 'Furniture', 20, 250.00),
(38, 'Pen Drive 64GB', 'Electronics', 150, 15.00),
(39, 'Mouse Pad', 'Accessories', 120, 8.00),
(40, 'Monitor Stand', 'Furniture', 40, 35.00),
(41, 'Bluetooth Speaker', 'Electronics', 60, 45.00),
(42, 'Webcam HD', 'Electronics', 50, 70.00),
(43, 'Projector', 'Electronics', 10, 400.00),
(44, 'Whiteboard', 'Furniture', 25, 60.00),
(45, 'Sticky Notes', 'Stationery', 250, 3.00),
(46, 'Eraser Pack', 'Stationery', 200, 2.50),
(47, 'Pencil Set', 'Stationery', 180, 4.00),
(48, 'Scissor', 'Stationery', 120, 5.50),
(49, 'Calculator', 'Electronics', 40, 25.00),
(50, 'Router WiFi', 'Electronics', 30, 80.00),
(51, 'Laptop Stand', 'Electronics', 50, 35.00),
(52, 'Desk Clock', 'Furniture', 60, 20.00),
(53, 'Planner Book', 'Stationery', 100, 12.00),
(54, 'Headset Gaming', 'Electronics', 35, 60.00),
(55, 'Flashlight', 'Accessories', 70, 15.00),
(56, 'Wall Art', 'Furniture', 40, 45.00),
(57, 'Office Sofa', 'Furniture', 10, 500.00),
(58, 'Coffee Table', 'Furniture', 15, 120.00),
(59, 'Tablet Case', 'Accessories', 80, 18.00),
(60, 'Laptop Bag', 'Accessories', 60, 45.00),
(61, 'Smartphone Case', 'Accessories', 120, 12.00),
(62, 'Power Bank 10000mAh', 'Electronics', 90, 25.00),
(63, 'Cable Organizer', 'Accessories', 70, 8.00),
(64, 'Whiteboard Marker', 'Stationery', 200, 2.50),
(65, 'Highlighter Set', 'Stationery', 150, 6.00),
(66, 'Desk Fan', 'Furniture', 40, 30.00),
(67, 'Chair Mat', 'Furniture', 50, 40.00),
(68, 'LED Strip Light', 'Electronics', 60, 22.00),
(69, 'Wall Shelf', 'Furniture', 25, 55.00),
(70, 'Photo Frame', 'Furniture', 80, 15.00),
(71, 'Stapler', 'Stationery', 100, 7.50),
(72, 'Punching Machine', 'Stationery', 40, 12.00),
(73, 'Label Maker', 'Electronics', 30, 50.00),
(74, 'Ink Cartridge', 'Electronics', 70, 35.00),
(75, 'Desk Drawer', 'Furniture', 20, 90.00),
(76, 'Paper Cutter', 'Stationery', 50, 20.00),
(77, 'Keyboard Wireless', 'Electronics', 45, 60.00),
(78, 'Mouse Wireless', 'Electronics', 50, 30.00),
(79, 'Monitor 24\"', 'Electronics', 40, 200.00),
(80, 'Desk Organizer Multi', 'Furniture', 30, 40.00),
(81, 'Pen Holder', 'Stationery', 90, 10.00),
(82, 'Notebook Spiral', 'Stationery', 120, 6.00),
(83, 'Desk Lamp LED', 'Furniture', 50, 35.00),
(84, 'Router 4G', 'Electronics', 30, 70.00),
(85, 'Projector Screen', 'Electronics', 10, 80.00),
(86, 'Camera Lens', 'Electronics', 15, 350.00),
(87, 'Camera Bag', 'Accessories', 40, 50.00),
(88, 'Tablet Stylus', 'Electronics', 60, 25.00),
(89, 'Smartwatch Band', 'Accessories', 100, 15.00),
(90, 'Laptop Charger', 'Electronics', 70, 45.00),
(91, 'Phone Charger', 'Electronics', 120, 12.00),
(92, 'External SSD', 'Electronics', 40, 150.00),
(93, 'Mouse Pad XL', 'Accessories', 80, 10.00),
(94, 'Headphones Bluetooth', 'Electronics', 50, 60.00),
(95, 'Speaker Bluetooth', 'Electronics', 35, 55.00),
(96, 'Desk Pad', 'Accessories', 60, 18.00),
(97, 'Desk Organizer Acrylic', 'Furniture', 25, 40.00),
(98, 'File Cabinet', 'Furniture', 15, 120.00),
(99, 'Office Clock', 'Furniture', 30, 35.00),
(100, 'Whiteboard Eraser', 'Stationery', 150, 5.00),
(101, 'Binder Clips', 'Stationery', 200, 3.00),
(102, 'Staple Pins', 'Stationery', 180, 2.50),
(103, 'Pen Set Deluxe', 'Stationery', 100, 12.00),
(104, 'Office Couch', 'Furniture', 10, 600.00),
(105, 'Coffee Table Glass', 'Furniture', 12, 150.00),
(106, 'Desk Lamp Modern', 'Furniture', 40, 50.00),
(107, 'Laptop Cooling Pad', 'Electronics', 60, 25.00),
(108, 'Monitor Mount', 'Electronics', 30, 45.00),
(109, 'Cable Extension', 'Electronics', 100, 8.00),
(110, 'USB Hub', 'Electronics', 80, 20.00),
(111, 'Smartphone Holder', 'Accessories', 70, 15.00),
(112, 'Tablet Stand', 'Accessories', 50, 18.00),
(113, 'Printer Laser', 'Electronics', 25, 250.00),
(114, 'Scanner Flatbed', 'Electronics', 20, 300.00),
(115, 'Desk Organizer Wooden', 'Furniture', 20, 55.00),
(116, 'Bookshelf', 'Furniture', 15, 200.00),
(117, 'Office Plant', 'Accessories', 60, 25.00),
(118, 'Desk Clock Modern', 'Furniture', 40, 30.00),
(119, 'Pen Set Premium', 'Stationery', 80, 15.00),
(120, 'Notebook Leather', 'Stationery', 50, 20.00),
(121, 'Headset Wireless', 'Electronics', 30, 70.00),
(122, 'Keyboard RGB', 'Electronics', 25, 80.00),
(123, 'Mouse RGB', 'Electronics', 50, 35.00),
(124, 'Laptop Sleeve', 'Accessories', 40, 20.00),
(125, 'Smartphone Stand', 'Accessories', 60, 12.00),
(126, 'Desk Organizer Mini', 'Furniture', 30, 25.00),
(127, 'Chair Ergonomic', 'Furniture', 20, 180.00),
(128, 'LED Desk Lamp', 'Furniture', 35, 40.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
