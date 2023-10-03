-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 12:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vid_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_tb`
--

CREATE TABLE `register_tb` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `repeat_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_tb`
--

INSERT INTO `register_tb` (`first_name`, `last_name`, `email`, `password`, `repeat_password`) VALUES
('shbskjsjl', 'jbsjskjb', 'kjsjskj@sins.com', 'password', 'jsksb'),
('sjksjnsk', 'skbjhskjksb', 'sjkbskjbbj@gmail.com', 'password', 'sjhbsjhbsjh'),
('j,lsnljnjlsnjnsjl', 'jknlsnnskl', 'jsjnsn@jnsjs.com', 'password', 'sjknksjnkjsjk'),
('jksjkbs', ' kbskjsbjks', 'skjnslnsjn@jsbjs.com', 'sjkskskjjn sjnkjnskj', 'nmbskbsbsk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
