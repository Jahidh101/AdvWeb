-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 12:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user_types_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `username`, `password`, `name`, `phone`, `email`, `user_types_id`, `status`, `email_verified_at`, `verification_code`, `is_verified`) VALUES
(1, 'hasan12', '81dc9bdb52d04dc20036dbd8313ed055', 'Hasan md', '01798765432', 'jahidh101894@gmail.com', 1, 1, NULL, NULL, 1),
(2, 'alam22', '6074c6aa3488f3c2dddff2a7ca821aab', 'Joshim Alam', '01899887766', 'alam@gmail.com', 2, 1, NULL, NULL, 0),
(14, 'mmmmm', '202cb962ac59075b964b07152d234b70', 'ddd', NULL, 'shroudh101@gmail.com', 2, 1, NULL, '2049421adfd7bb2bcddd9b6575daa9cdb0be15af', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `username`, `login_time`) VALUES
(1, 'hasan12', '2022-03-02 22:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `all_users_user_types_fk` (`user_types_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_history_all_users_fk` (`username`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_users`
--
ALTER TABLE `all_users`
  ADD CONSTRAINT `all_users_user_types_fk` FOREIGN KEY (`user_types_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_all_users_fk` FOREIGN KEY (`username`) REFERENCES `all_users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
