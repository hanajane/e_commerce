-- phpMyAdmin SQL Dump


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

-- CREATE TABLE `products` (
-- `id` int(11) NOT NULL,
-- `name` varchar(50) NOT NULL,
-- `description` text NOT NULL,
-- `price` float NOT NULL,
-- `type` int(11) NOT NULL,
-- `image` text NOT NULL
--  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `type`, `image`) VALUES
(1, 'White shirt', 'wome shirt', 23.45, 0, 'shirt1.jpg'),
(2, 'Black shirt', 'men shirt', 33.5, 0, 'shirt2.jpg'),
(3, 'Blue shirt', 'men shirt', 33.5, 0, 'shirt3.jpg'),
(4, 'Yellow shirt', 'women shirt', 33.5, 0, 'shirt4.jpg'),
(5, 'Pink shirt', 'women shirt', 33.5, 0, 'shirt5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
