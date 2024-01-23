-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cle2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext NOT NULL,
  `recap` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`id`, `user_id`, `text`, `recap`, `title`, `picture_link`) VALUES
(3, 0, 'test', 'test', 'test', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(5, 0, '4', '4', '4', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(6, 0, '4', '4', '4', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(8, 0, 'test', 'test', 'test', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(9, 0, 'u', 'u', 'u', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colour` varchar(255) NOT NULL,
  `picture_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`id`, `colour`, `picture_link`) VALUES
(1, 'geel', 'https://www.wibra.nl/wp-content/uploads/sites/3/2022/09/20780122-000-01.png');

-- --------------------------------------------------------

--
-- Table structure for table `customerblogposts`
--

CREATE TABLE `customerblogposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `recap` varchar(255) NOT NULL,
  `picture_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerblogposts`
--

INSERT INTO `customerblogposts` (`id`, `user_id`, `title`, `text`, `recap`, `picture_link`) VALUES
(2, 3, 'm', 'm', 'm', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(5, 3, 'r', 'r', 'r', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(6, 3, 'j', 'j', 'j', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(7, 5, 'r', 'r', 'r', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7'),
(8, 5, 'v', 'v', 'v', 'https://scontent-ams2-1.xx.fbcdn.net/v/t39.30808-6/409345347_10227508485590307_6962109571580602656_n.jpg?stp=dst-jpg_s280x280&_nc_cat=100&ccb=1-7&_nc_sid=c42490&_nc_ohc=VWMiuTFwKF4AX-826q2&_nc_ht=scontent-ams2-1.xx&oh=00_AfCKr3aVe5iO14Yo8Q0hlk7q7Z6UoLuK8O1Ssh7iZrQX1w&oe=65B3D5C7');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_infix` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `house_number` int(10) UNSIGNED NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `rope_length` int(11) NOT NULL,
  `colour_amount` int(10) UNSIGNED NOT NULL,
  `colour1` varchar(255) NOT NULL,
  `colour2` varchar(255) NOT NULL,
  `colour3` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `rope_amount` int(10) UNSIGNED NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_first_name`, `user_infix`, `user_last_name`, `city_name`, `street_name`, `house_number`, `postal_code`, `rope_length`, `colour_amount`, `colour1`, `colour2`, `colour3`, `comments`, `rope_amount`, `complete`) VALUES
(1, 1, 'mickey', 'van', 'veldhuizen', 'test', 'test', 4, 'test', 100, 2, 'geel, blauw', '', '', 'geen', 3, 1),
(2, 2, 'test', 'test', 'test', 'test', 'test', 1, 'test', 100, 1, 'rood', '', '', 'nee', 1, 0),
(3, 3, 'test 2', 'test 2', 'test 2', 'test 2', 'test 2', 6, 'test 2', 100, 2, 'roze', '', '', 'test', 3, 0),
(4, 0, 'h', 'h', 'h', 'h', 'h', 2, 'h', 100, 2, 'dwad', '', '', 'awdawd', 4, 0),
(5, 0, 'mickey', 'van', 'veldhuizen', 'test', 'test', 0, 'test', 150, 2, 'd', '', '', 'd', 0, 0),
(6, 0, 'd', 'd', 'd', 'd', 'd', 0, 'd', 100, 2, 'd', '', '', 'd', 0, 0),
(7, 3, 'mickey', 'van', 'veldhuizen', 'test', 'test', 0, 'test', 50, 2, 'd', '', '', 'd', 0, 0),
(8, 0, 'n', 'n', 'n', 'n', 'n', 0, 'n', 50, 3, '', '', '', 'd', 0, 0),
(9, 3, 'mickey', 'van', 'veldhuizen', 'test', 'test', 0, 'test', 20, 2, '', '', '', 'nee', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `infix` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `street_name` varchar(255) NOT NULL,
  `house_number` int(10) UNSIGNED NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `infix`, `last_name`, `email`, `password`, `isAdmin`, `street_name`, `house_number`, `postal_code`, `city_name`) VALUES
(3, 'mickey', 'van', 'veldhuizen', 'test@test.nl', '$2y$10$KH6x8uKR2vJKHc.wEoCm7ex3dwyidhrZ6MJQasFWYLuPknC.lKKke', 0, 'test', 0, 'test', 'test'),
(4, 'Admin', '', 'Admin', 'admin@gmail.com', '$2y$10$XLebMHddHyDxB6MvAgBKGOdPMCC1JlqkqQ9r6FWxX3sRLyj0ni/12', 1, 'admin', 0, 'admin', 'admin'),
(5, 'test', '', 'test', 'test2@test2.nl', '$2y$10$lnd38fvOU2AwHPoWoHwmU.oHfIvogZD9pzm/WCxsx.FecR5u2A9dS', 0, 'test', 6, 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerblogposts`
--
ALTER TABLE `customerblogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customerblogposts`
--
ALTER TABLE `customerblogposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
