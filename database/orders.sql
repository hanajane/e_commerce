-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` text,
  `del_date` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `first_name` text NOT NULL,
  `address` text NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `status`, `del_date`, `price`, `first_name`, `address`, `last_name`, `phone`, `zip`, `email`, `user_id`) VALUES
(1, '2021-01-01', 'paid', '2021-01-15', 33.5, 'Moast', 'San Diego', 'Alawi', 428520, 83662, 'example@hotmail.com', 1),
(2, '2021-01-01', 'paid', '2021-01-15', 33.5, 'Moast', 'San Diego', 'Alawi', 428520, 83662, 'example@hotmail.com', 1),
(3, '2021-01-06', 'on_hold', '2021-01-15', 23.45, 'Kate', 'San Diego', 'Neww', 428520, 83662, 'example@hotmail.com', 1),
(4, '2021-01-06', 'on_hold', '2021-01-15', 23.45, 'Jo', 'San Diego', 'Anderson', 428520, 83662, 'example@hotmail.com', 1),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
