-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 03:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `favoritedesign`
--
CREATE DATABASE IF NOT EXISTS `favoritedesign` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `favoritedesign`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `clientName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `clientName`, `address`) VALUES
(11, 'Daniel', '789 earth street'),
(12, 'Jericho', '456 sun street'),
(13, 'Phil', '123 moon street');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `totalExpense` decimal(7,2) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `supplierName`, `totalExpense`, `details`, `user_id`) VALUES
(15, 'Rona', '1275.00', 'Spruce wood 2x4x2', 2),
(16, 'HomeDepot', '60.00', '3 hammer', 3),
(17, 'FedEx', '75.00', 'lamps', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

DROP TABLE IF EXISTS `payment_information`;
CREATE TABLE `payment_information` (
  `payment_id` int(11) NOT NULL,
  `paymentMethod` varchar(30) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `date` date DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`payment_id`, `paymentMethod`, `amount`, `date`, `project_id`, `user_id`) VALUES
(1, 'cash', '2000.00', '2023-04-27', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `job` enum('Service','Installation','Estimation') NOT NULL,
  `projectCost` decimal(7,2) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `done` enum('Done','Not Done') NOT NULL,
  `surfaceArea` int(3) NOT NULL,
  `lights` int(3) NOT NULL,
  `spots` int(3) NOT NULL,
  `vents` int(3) NOT NULL,
  `works` text DEFAULT NULL,
  `otherInformation` text DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `job`, `projectCost`, `startDate`, `endDate`, `done`, `surfaceArea`, `lights`, `spots`, `vents`, `works`, `otherInformation`, `client_id`) VALUES
(4, 'Service', '2400.00', '2023-04-27', NULL, 'Not Done', 78, 5, 6, 3, 'Electricity', 'Extra lamps', 13);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `project_id`, `distance`) VALUES
(1, 4, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `secretkey` varchar(72) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `secretkey`) VALUES
(2, 'Username', '$2y$10$GJS0SIBPWfFW3c/yJQu7k.Yqz1AEaVz2RvN2P1ELIRoxZRGujni1G', NULL),
(3, 'user1', '$2y$10$EF7AzFrt2Bo40f5r/ddtd.7cP40SPRBOaGnR7yDX4/6j8N932w/kK', NULL),
(6, 'user2', '$2y$10$aNoPglw.jRG5MCGOWRbWBe763CNjH2kwciziKKowY4vAZmudl5FHG', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `expense_to_user` (`user_id`);

--
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_to_project` (`project_id`),
  ADD KEY `payment_to_user` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_to_client` (`client_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD CONSTRAINT `payment_to_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `payment_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_to_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
