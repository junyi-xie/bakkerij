-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 12:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `product1` varchar(200) NOT NULL,
  `quantity1` int(11) NOT NULL,
  `product2` varchar(200) NOT NULL,
  `quantity2` int(11) NOT NULL,
  `product3` varchar(200) NOT NULL,
  `quantity3` int(11) NOT NULL,
  `totalprice` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `date`, `product1`, `quantity1`, `product2`, `quantity2`, `product3`, `quantity3`, `totalprice`) VALUES
(1, 'Yunyi', '6009569@mborijnland.nl', '2020-04-08', '-', 0, 'Medium Bread', 1, '-', 0, '7.49'),
(2, 'admin', 'admin@email.com', '2020-04-08', 'Small Bread', 3, '-', 0, 'Large Bread', 3, '44.94'),
(3, 'test', 'test@email.com', '2020-04-08', 'Small Bread', 2, 'Medium Bread', 4, 'Large Bread', 2, '59.92');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `desc`, `price`, `quantity`, `img`, `product_desc`) VALUES
(1, 'Small Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>\r\n', '4.99', 4, 'assets/img/bread.jpg', 'Een klein broodje, smaakt lekker en is goedkoop!'),
(2, 'Medium Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>', '7.49', 3, 'assets/img/bread.jpg', 'Middelmatig brood, de smaak is heerlijk en het is meest verkocht!'),
(3, 'Large Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>', '9.99', 10, 'assets/img/bread.jpg', 'Qua inhoud is deze het meest en het beste voor jouw centen!');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `opentime` varchar(255) NOT NULL,
  `closetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `opentime`, `closetime`) VALUES
(1, '10:15', '12:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
