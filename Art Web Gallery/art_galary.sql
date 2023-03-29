-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 05:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_galary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'Maria', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ArtistID` int(200) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Contact_no` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`ArtistID`, `FullName`, `Contact_no`, `Address`, `Email`, `Username`, `password`) VALUES
(8, 'Anaya', '03067876543', 'Lahore', 'a@gmail.com', 'anaya', '123');

-- --------------------------------------------------------

--
-- Table structure for table `artist_payment`
--

CREATE TABLE `artist_payment` (
  `Payment_ID` int(200) NOT NULL,
  `artists_id` int(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist_payment`
--

INSERT INTO `artist_payment` (`Payment_ID`, `artists_id`, `amount`, `payment_method`, `account_no`, `date`) VALUES
(42, 8, '16000', 'Debit Card', '5555-33-44', '2021-07-26 12:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `artproduct`
--

CREATE TABLE `artproduct` (
  `Product_id` int(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Price` int(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `artist` int(200) NOT NULL,
  `stock_quantity` bigint(200) NOT NULL,
  `allocation` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artproduct`
--

INSERT INTO `artproduct` (`Product_id`, `Name`, `Type`, `Price`, `picture`, `artist`, `stock_quantity`, `allocation`) VALUES
(21, 'paint', 'paint', 16000, '2.jpg', 8, 199, 16),
(22, 'bangles', 'bangles', 16000, 'antique3.png', 8, 198, 16),
(23, 'fan', 'fan', 16000, 'antique3.jpg', 8, 198, 16);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `cart_product_id` int(100) NOT NULL,
  `cart_user_id` int(100) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(200) NOT NULL,
  `clientName` varchar(200) NOT NULL,
  `Contact_no` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `clientName`, `Contact_no`, `Address`, `Email`, `Username`, `password`) VALUES
(7, 'Anaya', '03067876543', 'Lahore', 'a@gmail.com', 'anaya', '123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(50) NOT NULL,
  `feedback_user` int(50) NOT NULL,
  `buyer_order` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedback_comment` text NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_user`, `buyer_order`, `title`, `feedback_comment`, `feedback_date`) VALUES
(3, 7, 46, 'good', 'good', '2021-07-26 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetail_id` int(200) NOT NULL,
  `orderDetail_OrderNo` int(200) NOT NULL,
  `orderDetail_Product` varchar(200) NOT NULL,
  `orderDetail_quentity` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetail_id`, `orderDetail_OrderNo`, `orderDetail_Product`, `orderDetail_quentity`) VALUES
(45, 38, '15', 1),
(46, 39, '15', 1),
(47, 40, '15', 1),
(48, 41, '15', 1),
(49, 42, '15', 1),
(50, 43, '15', 1),
(51, 44, '15', 1),
(52, 45, '15', 1),
(53, 46, '22', 1),
(54, 47, '22', 1),
(55, 48, '23', 1),
(56, 49, '23', 1),
(57, 50, '21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(200) NOT NULL,
  `order_user` int(200) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `order_contact` bigint(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user`, `delivery_address`, `order_contact`, `province`, `city`, `order_date`, `order_status`) VALUES
(49, 7, 'Lahore', 3078767876, 'Punjab', 'Lahore', '2021-08-26 19:54:16', 'Pending'),
(50, 7, 'Lahore', 3078767876, 'Punjab', 'Multan', '2021-08-27 05:32:31', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(200) NOT NULL,
  `clients_id` int(200) NOT NULL,
  `orders_id` int(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `products_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `clients_id`, `orders_id`, `amount`, `payment_method`, `date`, `products_id`) VALUES
(39, 7, 46, '16000', 'Cash On Delivery', '2021-07-26 13:09:35', 0),
(40, 7, 47, '16000', 'Cash On Delivery', '2021-08-26 19:39:12', 0),
(41, 7, 49, '16000', 'Debit Card', '2021-08-26 19:54:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spaceallocation`
--

CREATE TABLE `spaceallocation` (
  `spaceid` int(200) NOT NULL,
  `working` varchar(200) NOT NULL,
  `holidays` varchar(200) NOT NULL,
  `product_artist` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spaceallocation`
--

INSERT INTO `spaceallocation` (`spaceid`, `working`, `holidays`, `product_artist`, `status`) VALUES
(16, '2', '2', 8, 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artist_payment`
--
ALTER TABLE `artist_payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `artists_id` (`artists_id`);

--
-- Indexes for table `artproduct`
--
ALTER TABLE `artproduct`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `ArtistID` (`artist`),
  ADD KEY `allocation` (`allocation`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetail_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `clients_id` (`clients_id`),
  ADD KEY `order_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `spaceallocation`
--
ALTER TABLE `spaceallocation`
  ADD PRIMARY KEY (`spaceid`),
  ADD KEY `product_artist` (`product_artist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `ArtistID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artist_payment`
--
ALTER TABLE `artist_payment`
  MODIFY `Payment_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `artproduct`
--
ALTER TABLE `artproduct`
  MODIFY `Product_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetail_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `spaceallocation`
--
ALTER TABLE `spaceallocation`
  MODIFY `spaceid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
