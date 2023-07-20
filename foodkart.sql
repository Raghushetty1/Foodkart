-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 06:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pwd`) VALUES
('admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `iid` int(11) NOT NULL,
  `uid1` varchar(30) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `amt` bigint(20) NOT NULL,
  `odate` varchar(30) NOT NULL,
  `total` bigint(20) NOT NULL,
  `st` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(4) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `img` varchar(80) NOT NULL,
  `active` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cname`, `img`, `active`) VALUES
(1, 'breakfast', 'WhatsApp Image 2022-08-25 at 9.31.56 AM.jpeg', 1),
(2, 'lunch', 'WhatsApp Image 2022-08-25 at 9.32.26 AM.jpeg', 1),
(3, 'starter', 'istockphoto-1224330636-612x612.jpg', 1),
(4, 'Chinese', 'friedrice.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `frstname` varchar(20) NOT NULL,
  `lstname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`frstname`, `lstname`, `email`, `address`, `user`, `pwd`) VALUES
('dhanush', 'shetty', 'dhanushshetty9741@gmail.com', 'Thekkatte', 'dhanushshetty9741@gmail.com', '123456789'),
('raghu', 'shetty', 'shettymraghavendra38@gmail.com', 'neralakattee', 'shettymraghavendra38@gmail.com', '11223344'),
('Keerthik', 'kotyan', 'shettymraghavendra39@gmail.com', 'Thekkatte', 'shettymraghavendra39@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `user` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desg` varchar(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `salary` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`user`, `pwd`, `name`, `desg`, `age`, `address`, `salary`) VALUES
('dhanu', '123456789', 'dhanush', 'supplier', '23', 'kundapur', 12000),
('raghu ', '123456789 ', 'raghushetty ', 'cashier ', '21', 'kundapur ', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `cid` int(4) NOT NULL,
  `iid` bigint(30) NOT NULL,
  `iname` varchar(50) NOT NULL,
  `descrip` varchar(50) NOT NULL,
  `price` bigint(30) NOT NULL,
  `img` varchar(80) NOT NULL,
  `special` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`cid`, `iid`, `iname`, `descrip`, `price`, `img`, `special`) VALUES
(1, 11, 'Idli vada', 'Hot idly', 30, 'istockphoto-1172962583-170667a.jpg', 1),
(1, 12, 'Masaladosa', 'Crispy dosa', 40, 'WhatsApp Image 2022-08-25 at 9.32.07 AM.jpeg', 1),
(1, 13, 'Onion dosa', 'Tasty dosa with chatney', 40, 'WhatsApp Image 2022-08-25 at 9.33.06 AM.jpeg', 0),
(2, 21, 'South indian special', 'full meals', 80, 'WhatsApp Image 2022-08-25 at 9.31.51 AM - Copy.jpeg', 0),
(2, 22, 'North indian special', 'Tasty meal', 80, 'WhatsApp Image 2022-08-25 at 9.32.26 AM.jpeg', 0),
(3, 31, 'French fries', 'crispy', 60, 'istockphoto-1224330636-612x612.jpg', 0),
(3, 32, 'Samosa', 'Hot', 40, 'WhatsApp Image 2022-08-25 at 9.31.49 AM.jpeg', 0),
(4, 41, 'Noodles', 'Tasty', 50, 'WhatsApp Image 2022-08-25 at 9.20.32 AM.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `orderid` int(11) NOT NULL,
  `uid1` varchar(30) NOT NULL,
  `iid` int(11) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `amt` bigint(20) NOT NULL,
  `odate` varchar(30) NOT NULL,
  `total` bigint(20) NOT NULL,
  `st` varchar(30) NOT NULL,
  `grandtotal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`orderid`, `uid1`, `iid`, `iname`, `qty`, `amt`, `odate`, `total`, `st`, `grandtotal`) VALUES
(3, 'dhanushshetty9741@gmail.com', 11, 'Idli', 2, 50, '2022-08-25 11:53:36am', 100, 'Prepared', 100),
(5, 'shettymraghavendra38@gmail.com', 32, 'Samosa', 1, 40, '2022-08-30 11:53:14am', 40, 'Prepared', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
