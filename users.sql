-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 31, 2017 at 02:05 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sundb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `emailad` varchar(20) NOT NULL,
  `idcard` int(20) NOT NULL,
  `phonenum` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sirname` varchar(20) NOT NULL,
  `othernames` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_account` int(50) NOT NULL,
  `pass_status` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `emailad`, `idcard`, `phonenum`, `password`, `sirname`, `othernames`, `category`, `status`, `logs`, `bank_name`, `bank_account`, `pass_status`) VALUES
(1, 'admin', 'info.samsy@gmail.com', 343434343, 2143434545, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Mwangi', 'Samson Kingori', '4', 'active', 'Admin changed password', '', 0, 'secure'),
(2, 'smwangi', 'smwangi@gmail.com', 35453453, 4387857, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'mwangi', 'samson kingori', '1', 'active', 'Property owner profile edited', 'EQUITY', 3243254, 'secure'),
(3, 'samson', 'd@j.com', 1212121221, 2147483647, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'samson', 'jamamma sasasas', '2', 'active', 'user activated', '', 0, ''),
(4, 'administrator', 'sa@gghh.com', 22324324, 2147483647, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin', 'admin mwangi', '4', 'active', 'user activated', '', 0, ''),
(5, 'sam', 'ugt', 778575, 76868, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'gfghfghfgh', 'tftfgfghfg fight', '4', 'active', 'user activated', '', 0, ''),
(6, 'user', 'jgj@khjh.com', 2147483647, 2147483647, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'user', 'user user', '1', 'active', 'user activated', '', 0, ''),
(7, 'userx', 'samrahab7@gmail.com', 2147483647, 2147483647, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'ewewe wewewe', 'wewewcwewewew', '2', 'active', 'user activated', '', 0, 'secure'),
(8, 'userw', 'ggf@f.com', 2147483647, 2147483647, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'fdgfdfg', 'fghfgffgfg gfghfgfgh', '1', 'active', 'user activated', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
