-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 11:45 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com'),
(2, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'admin@admin.com');

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
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `desc`, `price`, `quantity`, `img`, `date_added`, `product_desc`) VALUES
(1, 'Small Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>\r\n', '4.99', 9, 'bread.jpg', '2020-02-20 23:59:57', 'Small Bread! Very cheap!'),
(2, 'Medium Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>', '7.49', 34, 'bread.jpg', '2020-02-20 23:59:58', 'Medium Bread! Also very cheap!'),
(3, 'Large Bread', '<p>LET OP! Kan <a href=\"https://www.voedingscentrum.nl/encyclopedie/allergenen.aspx\" target=\"_blank\">allergenen</a> bevatten!</p>\r\n<ul>\r\n<li>Kleinbrood (bijvoorbeeld bolletjes)</li>\r\n<li>Grootbrood (bijvoorbeeld hele broden)</li>\r\n<li>Koekjes</li>\r\n<li>Gebakjes</li>\r\n<li>Cakes</li>\r\n<li>Chocolade & bonbons</li>\r\n<li>Marsepein</li>\r\n<li>Stukswerk (bijvoorbeeld gevulde koeken)</li>\r\n</ul>', '9.99', 23, 'bread.jpg', '2020-02-20 23:59:59', 'Big Bread! Very cheap!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
