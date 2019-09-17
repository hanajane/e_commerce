-- phpMyAdmin SQL Dump


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `paypal_payment_id` text,
  `paypal_payer_id` text,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `paypal_payment_id`, `paypal_payer_id`, `date`, `amount`) VALUES
(1, 1, 'PAY-1E6885734N507310KLP6RBQY', 'EC-2SS27420SP270873W', '2021-01-11', 23.45),
(2, 2, 'PAY-1JD75323YF218540JLP6RCRA', 'EC-5781221988843235K', '2021-01-12', 23.45),
(3, 3, 'PAY-2UY60944JR9756722LP6RDRA', 'EC-7PN92522R13173437', '2021-01-11', 40.9),
(4, 4, 'PAY-3M28658195753810XLP6RFIA', 'EC-3DJ368210G032893N', '2021-01-27', 40.9),



--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
