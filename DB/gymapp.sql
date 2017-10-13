-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 04:28 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `gym_details`
--

CREATE TABLE `gym_details` (
  `username` varchar(50) DEFAULT NULL,
  `gym_name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `contacts` text NOT NULL,
  `services` text,
  `time_table` text,
  `about` text,
  `admission_fee` double DEFAULT NULL,
  `monthly_fee` double DEFAULT NULL,
  `signup_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gym_details`
--

INSERT INTO `gym_details` (`username`, `gym_name`, `location`, `contacts`, `services`, `time_table`, `about`, `admission_fee`, `monthly_fee`, `signup_date`) VALUES
('nahid', 'body war', 'jatrabari\r\ndhaka', '00000', NULL, NULL, 'no 1 gym', 30, NULL, NULL),
('ovi', 'fitness zone+', 'narayangonj\r\nnitaygonj,banghabondhu raod', '01686087163\r\nemail: ovi@gmail.com', 'muscle building\r\nstrength increasing', '7am-11am\r\n4pm-11pm', 'no 1 gym in narayangonj', 20, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gym_gallery`
--

CREATE TABLE `gym_gallery` (
  `username` varchar(50) DEFAULT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gym_gallery`
--

INSERT INTO `gym_gallery` (`username`, `image_url`) VALUES
('ovi', 'uploads/oviprogramming_oop_wallpaper_red_by_hexeno.png'),
('nahid', 'uploads/nahidwindows_10_hero_4k-wallpaper-1366x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gym_posts`
--

CREATE TABLE `gym_posts` (
  `post_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `post` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gym_posts`
--

INSERT INTO `gym_posts` (`post_id`, `username`, `post`, `post_date`) VALUES
(5, 'ovi', 'this is test', '2017-08-14'),
(6, 'ovi', 'this is 18/17/8 today is off', '2017-08-18'),
(7, 'nahid', 'hello everyone today the gym is off.....', '2017-08-18'),
(8, 'ovi', 'the method is working...', '2017-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(10) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `usertype`) VALUES
('nahid', '12345678', 'normal'),
('ovi', '1234', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gym_details`
--
ALTER TABLE `gym_details`
  ADD UNIQUE KEY `gym_name` (`gym_name`),
  ADD KEY `fk_gym_det` (`username`);

--
-- Indexes for table `gym_gallery`
--
ALTER TABLE `gym_gallery`
  ADD KEY `fk_gym_gallery` (`username`);

--
-- Indexes for table `gym_posts`
--
ALTER TABLE `gym_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_gym_post` (`username`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gym_posts`
--
ALTER TABLE `gym_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gym_details`
--
ALTER TABLE `gym_details`
  ADD CONSTRAINT `fk_gym_det` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `gym_gallery`
--
ALTER TABLE `gym_gallery`
  ADD CONSTRAINT `fk_gym_gallery` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `gym_posts`
--
ALTER TABLE `gym_posts`
  ADD CONSTRAINT `fk_gym_post` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
