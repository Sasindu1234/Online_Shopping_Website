-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 08:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecloth`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(4) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cus_add` varchar(100) NOT NULL,
  `cus_gender` varchar(10) NOT NULL,
  `cus_fav` varchar(15) NOT NULL,
  `cus_regdate` date NOT NULL,
  `cus_type` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `username`, `email`, `password`, `cus_add`, `cus_gender`, `cus_fav`, `cus_regdate`, `cus_type`) VALUES
(2, 'Chami ', 'chami', 'chami.123@gmail', '1234', 'kandy', 'Female', 'Calvin klein', '2019-05-01', 1),
(3, 'Gayan', 'gayan', '', '12345', 'kandy', 'Male', 'PUMA', '2019-05-01', 2),
(6, 'Sasindu Jayathunga', 'Sasindu', 'saindu.rashmina@gmail.com', '12345', '88/A Udumulla padukka', 'Male', 'Calvin Klein', '2018-07-13', 1),
(7, 'shuihd', 'zc', 'saindu.rashmina@gmail.com', '14', '88/A', 'Male', 'PUMA', '2020-10-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

CREATE TABLE `deliver` (
  `del_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `Item_code` int(11) NOT NULL,
  `del_que` int(11) NOT NULL,
  `del_size` varchar(10) NOT NULL,
  `del_YN` varchar(10) NOT NULL,
  `del_adr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliver`
--

INSERT INTO `deliver` (`del_id`, `cus_id`, `Item_code`, `del_que`, `del_size`, `del_YN`, `del_adr`) VALUES
(16, 1, 3, 5, '', 'No', '88/A udumulla padukka'),
(17, 1, 4, 5, '', 'No', '88/A udumulla padukka'),
(18, 1, 3, 5, '', 'No', '88/A udumulla padukka'),
(19, 2, 3, 5, '', 'No', 'kandy'),
(22, 2, 3, 5, '', 'No', 'kandy'),
(23, 2, 3, 1, '', 'Yes', 'kandy'),
(24, 2, 2, 1, '', 'No', 'kandy'),
(25, 2, 1, 5, '', 'Yes', 'kandy'),
(26, 2, 23, 1, '', 'No', 'kandy'),
(27, 2, 2, 4, 'M', 'No', 'fghbb'),
(28, 2, 2, 4, 'M', 'No', 'fghbb'),
(29, 2, 2, 4, 'M', 'No', 'fghbb'),
(30, 2, 2, 4, 'M', 'No', 'fghbb'),
(31, 2, 2, 4, 'M', 'No', 'fghbb'),
(32, 2, 2, 4, 'M', 'No', 'fghbb'),
(33, 2, 2, 4, 'M', 'No', 'fghbb'),
(34, 2, 2, 4, 'M', 'No', 'kandy'),
(35, 2, 2, 4, 'M', 'No', 'kandy'),
(36, 2, 2, 1, 'M', 'No', 'kandy'),
(37, 2, 3, 1, 'M', 'No', 'kandy'),
(38, 2, 2, 1, 'L', 'No', 'kandy'),
(39, 2, 3, 1, 'M', 'No', 'kandy'),
(40, 2, 23, 1, 'XS', 'No', 'kandy'),
(41, 6, 2, 1, 'XS', 'No', '88/A Udumulla padukka'),
(42, 6, 3, 1, 'XS', 'No', '88/A Udumulla padukka'),
(43, 3, 3, 1, 'XS', 'No', 'kandy'),
(44, 3, 4, 1, 'XS', 'No', 'kandy'),
(45, 3, 3, 3, 'M', 'No', 'kandy'),
(46, 3, 2, 4, 'XS', 'No', 'kandy'),
(47, 3, 3, 4, 'L', 'No', 'kandy'),
(48, 2, 8, 4, 'L', 'No', 'kandy'),
(49, 2, 8, 1, 's', 'No', 'kandy'),
(50, 2, 10, 1, 's', 'No', 'kandy'),
(51, 2, 10, 3, 's', 'No', 'kandy'),
(52, 2, 18, 1, 's', 'No', 'kandy');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_code` int(5) NOT NULL,
  `Item_cate` varchar(100) NOT NULL,
  `Item_Brand` varchar(100) NOT NULL,
  `Item_des` varchar(100) NOT NULL,
  `Item_gen` varchar(10) NOT NULL,
  `Item_color` varchar(100) NOT NULL,
  `Item_price` float NOT NULL,
  `No_of_item` int(11) NOT NULL,
  `Item_rating` int(2) DEFAULT NULL,
  `Item_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_code`, `Item_cate`, `Item_Brand`, `Item_des`, `Item_gen`, `Item_color`, `Item_price`, `No_of_item`, `Item_rating`, `Item_pic`) VALUES
(1, 'Top Brands', 'Nike', 'Nike Shoes', 'Male', 'Black', 1500, 25, 4, './Upload/Top brand/Nike-1.jpg'),
(2, 'Top Brands', 'Nike', 'Nike Shoes', 'Male', 'White', 2500, 25, 3, './Upload/Top brand/Nike-2.jpg'),
(3, 'Top Brands', 'Rolex', 'Rolex Mens watches', 'Male', 'Black', 5000, 25, 4, './Upload/Top brand/Rolex-1.jpg'),
(4, 'Top Brands', 'Rolex', 'Rolex Mens watches', 'Male', 'Black', 6000, 25, 3, './Upload/Top brand/Rolex-2.jpg'),
(5, 'T-Shirts', 'POLO', 'Men T-Shirts', 'Male', 'Red', 500, 20, 3, './Upload/T-Shirts/T-Shirts-1.jpg'),
(6, 'T-Shirts', 'Calvin Klein', 'Men T-Shirts', 'Male', 'Navy-blue', 600, 20, 4, './Upload/T-Shirts/T-Shirts-2.jpg'),
(7, 'T-Shirts', 'PUMA', 'Men T-Shirts', 'Male', 'Black', 800, 20, 5, './Upload/T-Shirts/T-Shirts-3.jpg'),
(8, 'Offer', 'POLO', 'Men-Trousers', 'Male', 'Black', 900, 30, 4, './Upload/Trousers/Trousers-1.jpg'),
(9, 'Trousers', 'POLO', 'Men-Trousers', 'Male', 'Black', 1000, 30, 5, './Upload/Trousers/Trousers-2.jpg'),
(10, 'Trousers', 'Calvin Klein', 'Men-Trousers', 'Male', 'Blue', 1200, 30, 4, './Upload/Trousers/Trousers-3.jpg'),
(11, 'Trousers', 'PUMA', 'Men-Trousers', 'Male', 'Black', 1200, 30, 4, './Upload/Trousers/Trousers-4.jpg'),
(12, 'Shorts', 'POLO', 'Men-Shorts', 'Male', 'Black', 500, 40, 4, './Upload/Shorts/Shorts-1.jpg'),
(13, 'Shorts', 'PUMA', 'Men-Shorts', 'Male', 'Black', 400, 40, 4, './Upload/Shorts/Shorts-2.jpg'),
(14, 'Shorts', 'Calvin Klein', 'Men-Shorts', 'Male', 'Black', 500, 40, 5, './Upload/Shorts/Shorts-3.jpg'),
(15, 'Saree', 'Gocoop', 'Sarees', 'Female', 'green', 1500, 10, 4, './Upload/Saree/Saree-1.jpg'),
(16, 'Offer', 'Gocoop', 'Sarees', 'Female', '', 1800, 10, 4, './Upload/Saree/Saree-2.jpg'),
(17, 'Saree', 'Gocoop', 'Sarees', 'Female', '', 1600, 10, 5, './Upload/Saree/Saree-3.jpg'),
(18, 'Skirt', 'Gocoop', 'Skirt', 'Female', 'Red', 800, 10, 5, './Upload/Skirt/Skirt-1.jpg'),
(19, 'Skirts', 'Vero Moda', 'Skirt', 'Female', '', 1000, 10, 5, './Upload/Skirt/Skirt-2.jpg'),
(20, 'Skirts', 'Vero Moda', 'Skirt', 'Female', '', 1500, 10, 3, './Upload/Skirt/Skirt-3.jpg'),
(21, 'Denim', 'POLO', 'Women-Denim', 'Female', 'Blue', 1500, 30, 5, './Upload/Denim/denim-1.jpg'),
(22, 'Denim', 'Calvin Klein', 'Women-Denim', 'Female', 'Blue', 1000, 30, 4, './Upload/Denim/denim-2.jpg'),
(23, 'Offer', 'Calvin Klein', 'Women-Denim', 'Female', 'Navy Blue', 1600, 30, 3, './Upload/Denim/denim-3.jpg'),
(24, 'Denim', 'PUMA', 'Women-Denim', 'Female', 'Blue', 2000, 20, 4, './Upload/Denim/denim-4.jpg\r\n'),
(25, 'Saree', 'Gocoop', 'Sarees', 'Female', '', 1800, 12, 5, './Upload/Saree/Saree-4.jpg'),
(26, 'Saree', 'Gocoop', 'Sarees', 'Female', 'Cream', 1800, 12, 5, './Upload/Saree/Saree-5.jpg'),
(27, 'Saree', 'Gocoop', 'Sarees', 'Female', 'Light green', 1700, 12, 5, './Upload/Saree/Saree-6.jpg'),
(28, 'Skirts', 'Vero Moda', 'Skirts new fashion', 'Female', 'Brown', 1000, 12, 5, './Upload/Skirts/Skirts-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `Item_code` int(11) NOT NULL,
  `order_qun` int(11) NOT NULL,
  `order_delYN` varchar(10) NOT NULL,
  `del_add` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qustion`
--

CREATE TABLE `qustion` (
  `que_code` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `rating` int(2) NOT NULL,
  `que` varchar(500) NOT NULL,
  `answ` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qustion`
--

INSERT INTO `qustion` (`que_code`, `cus_id`, `cus_name`, `feedback`, `rating`, `que`, `answ`) VALUES
(12, 2, 'chami', 'I have always hated shopping for clothes in shops. I found Wearme.com about a month ago and was completely excited. I ordered a couple of frocks at first and loved the way they fit. This is a very convenient method to buy clothes for the ones who don', 5, 'How can I create a return request?', 'According to our return policy we only accept returns before 5 days from the day of purchase.\r\nYou can send an email to returnrequests@wearme.com from the email you have used to register to our site mentioning the order number and the reason for retu'),
(29, 6, 'sasindu', 'First I was a little nervous to order but after I received the product I was really satisfied. The clothing is true to size, fabrics are great and styles up to date and great prices. Glad I took the chance, now I\'m a happy customer.', 4, 'How are the orders placed will be delivered to me?', 'All orders placed on Wearme.com are dispatched through our own courier service or through other courier partners such as DHL, CityPack Etc.'),
(33, 6, 'sasindu', 'Good service', 5, '', ''),
(34, 2, 'chami', 'good', 3, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `deliver`
--
ALTER TABLE `deliver`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_code`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `qustion`
--
ALTER TABLE `qustion`
  ADD PRIMARY KEY (`que_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deliver`
--
ALTER TABLE `deliver`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `qustion`
--
ALTER TABLE `qustion`
  MODIFY `que_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
