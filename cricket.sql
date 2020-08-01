-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 06:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `rand_salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `rand_salt`) VALUES
(1, 'sp', '111', 'suyash', 'painuly', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `city`, `image`) VALUES
(1, 'Mumbai Champs', 'Mumbai ', 'mi.jpg'),
(2, 'Chennai Superstars.', 'Chennai', 'Chennai_Smashers.png'),
(3, 'Chandigarh Lions.', 'Chandigarh', 'chandigrah.jpg'),
(4, 'Hyderabad Heroes', 'Hyderabad', 'hydrabad.png'),
(5, 'KKR', 'Kolkata', 'kkr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team_players`
--

CREATE TABLE `team_players` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(100) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `player_img` text DEFAULT NULL,
  `jersey_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_players`
--

INSERT INTO `team_players` (`player_id`, `player_name`, `team_id`, `player_img`, `jersey_num`) VALUES
(1, 'dhoni', 1, NULL, NULL),
(2, 'virat kohli', 1, NULL, NULL),
(3, 'Piyush Chawla', 1, NULL, NULL),
(4, 'Ishant Sharma', 1, NULL, NULL),
(5, 'Rohan Gavaskar', 1, NULL, NULL),
(6, 'Praveen Kumar', 1, NULL, NULL),
(7, 'Yusuf Pathan', 2, NULL, NULL),
(8, 'YPragyan Ojha', 2, NULL, NULL),
(9, 'Abhishek Nayar', 3, NULL, NULL),
(10, 'Sudeep Tyagi', 3, NULL, NULL),
(11, 'Ashok Dinda', 3, NULL, NULL),
(12, 'Pankaj Singh', 3, NULL, NULL),
(13, 'Rahul Sharma', 4, NULL, NULL),
(14, 'Stuart Binny', 4, NULL, NULL),
(15, 'Manish Pandey', 4, NULL, NULL),
(16, 'Rishi Dhawan', 4, NULL, NULL),
(17, 'Gyanendra Pandey', 2, NULL, NULL),
(18, 'Nikhil Chopra', 2, NULL, NULL),
(19, 'Vinod Kambli', 3, NULL, NULL),
(20, 'Gursharan Singh', 3, NULL, NULL),
(21, 'dhoni', 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_players`
--
ALTER TABLE `team_players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_players`
--
ALTER TABLE `team_players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_players`
--
ALTER TABLE `team_players`
  ADD CONSTRAINT `team_players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
