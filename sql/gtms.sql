-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `academic_year`, `created`, `modified`) VALUES
(1, 'First-year (Freshman)', '2024-04-23 20:24:26', '2024-04-23 12:24:26'),
(2, 'Second-year (Sophomore)', '2024-04-23 20:24:52', '2024-04-23 12:24:52'),
(3, 'Third-year (Junior)', '2024-04-23 20:25:18', '2024-04-23 12:25:18'),
(4, 'Fourth-year (Senior)', '2024-04-23 20:25:39', '2024-04-23 12:25:39'),
(5, 'Senior High School ', '2024-05-09 13:08:50', '2024-05-09 05:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Bachelor of Science in Computer Science', '2024-04-23 19:49:30', '2024-04-23 11:49:30'),
(2, 'Bachelor of Science in Information Technology', '2024-04-23 19:51:12', '2024-04-23 11:51:12'),
(3, 'Bachelor of Science in Computer Engineering', '2024-04-23 19:51:25', '2024-04-23 11:51:25'),
(4, 'Bachelor of Science in Information System', '2024-04-23 19:54:31', '2024-04-23 11:54:31'),
(5, 'STEM', '2024-04-23 19:54:31', '2024-04-23 11:54:31'),
(6, 'HUMMS', '2024-04-23 19:54:31', '2024-04-23 11:54:31'),
(7, 'TVL-ICT', '2024-04-23 19:54:31', '2024-04-23 11:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `garment_sizes`
--

CREATE TABLE `garment_sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `garment_type` varchar(50) NOT NULL,
  `garment_measure` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garment_sizes`
--

INSERT INTO `garment_sizes` (`id`, `size`, `gender`, `garment_type`, `garment_measure`, `created`) VALUES
(1, 'small', 'Male', 'Polo', 'Length: 27-28 inches Width: 40-42 inches Shoulder: 16-17 inches', '2024-05-13 21:50:50'),
(2, 'medium', 'Male', 'Polo', 'Length: 28-29 inches Width: 43-44 inches Shoulder: 18-19 inches', '2024-05-13 21:51:32'),
(3, 'large', 'Male', 'Polo', 'Length: 29-30 inches Width: 45-48 inches Shoulder: 20-22 inches', '2024-05-13 21:52:53'),
(4, 'small', 'Male', 'Pants', 'Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches', '2024-05-13 21:53:45'),
(5, 'medium', 'Male', 'Pants', 'Length: 40-42 inches Hips: 42-43 inches Waist - 32-34 inches', '2024-05-13 21:54:30'),
(6, 'large', 'Male', 'Pants', 'Length: 43-45 inches Hips: 43-45 inches Waist - 34-36 inches', '2024-05-13 21:55:02'),
(7, 'small', 'Female', 'Blouse', 'Length: 21-22 inches Chest: 35-36 inches Waist: 29-30 inches', '2024-05-13 21:56:11'),
(8, 'medium', 'Female', 'Blouse', 'Length: 22-23 inches Chest: 37-38 inches Waist: 31-32 inches', '2024-05-13 21:56:53'),
(9, 'large', 'Female', 'Blouse', 'Length: 23-24 inches Chest: 39-40 inches Waist: 33-34 inches', '2024-05-13 21:57:42'),
(10, 'small', 'Female', 'Skirt', 'Length: 17-18 inches Waist: 27-28 inches', '2024-05-13 21:58:07'),
(11, 'medium', 'Female', 'Skirt', 'Length: 19-21 inches Waist: 29-31 inches', '2024-05-13 21:58:24'),
(12, 'large', 'Female', 'Skirt', 'Length: 22-24 inches Waist: 31-34 inches', '2024-05-13 21:58:52'),
(13, 'small', 'Male', 'PE Polo Shirt', 'Width: 18-19 inches Length: 24-26 inches', '2024-05-13 21:59:50'),
(14, 'medium', 'Male', 'PE Polo Shirt', 'Width: 20-21 inches Length: 27-28 inches', '2024-05-13 22:00:10'),
(15, 'large', 'Male', 'PE Polo Shirt', 'Width: 22-24 inches Length: 30-31 inches', '2024-05-13 22:00:37'),
(16, 'small', 'Female', 'PE Polo Shirt', 'Width: 15-16 inches Length: 20-21 inches', '2024-05-13 22:01:23'),
(17, 'medium', 'Female', 'PE Polo Shirt', 'Width: 17-18 inches Length: 22-23 inches', '2024-05-13 22:02:15'),
(18, 'large', 'Female', 'PE Polo Shirt', 'Width: 19-20 inches Length: 23-24 inches', '2024-05-13 22:02:41'),
(19, 'small', 'Both', 'PE Pants', 'Length: 34 inches Waist: 19-34 inches', '2024-05-13 22:05:45'),
(20, 'medium', 'Both', 'PE Pants', 'Length: 35 inches Waist: 20-36 inches', '2024-05-13 22:06:12'),
(21, 'large', 'Both', 'PE Pants', 'Length: 35 inches Waist: 20-36 inches', '2024-05-13 22:06:23'),
(22, 'large', 'Both', 'PE Pants', 'Length: 36 inches Waist: 21-38 inches', '2024-05-13 22:07:08'),
(23, 'XL', 'Both', 'PE Pants', 'Length: 38 inches Waist: 23-40 inches', '2024-05-13 22:07:35'),
(24, '2XL', 'Both', 'PE Pants', 'Length: 40 inches Waist: 25-42 inches', '2024-05-13 22:08:06'),
(25, 'small', 'Male', 'SHS Polo', 'Length: 27-28 inches Width: 40-42 inches Shoulder: 16-17 inches', '2024-05-13 21:50:50'),
(26, 'medium', 'Male', 'SHS Polo', 'Length: 28-29 inches Width: 43-44 inches Shoulder: 18-19 inches', '2024-05-13 21:51:32'),
(27, 'large', 'Male', 'SHS Polo', 'Length: 29-30 inches Width: 45-48 inches Shoulder: 20-22 inches', '2024-05-13 21:52:53'),
(28, 'small', 'Male', 'SHS Pants', 'Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches', '2024-05-13 21:53:45'),
(29, 'medium', 'Male', 'SHS Pants', 'Length: 40-42 inches Hips: 42-43 inches Waist - 32-34 inches', '2024-05-13 21:54:30'),
(30, 'large', 'Male', 'SHS Pants', 'Length: 43-45 inches Hips: 43-45 inches Waist - 34-36 inches', '2024-05-13 21:55:02'),
(31, 'small', 'Female', 'SHS Blouse', 'Length: 21-22 inches Chest: 35-36 inches Waist: 29-30 inches', '2024-05-13 21:56:11'),
(32, 'medium', 'Female', 'SHS Blouse', 'Length: 22-23 inches Chest: 37-38 inches Waist: 31-32 inches', '2024-05-13 21:56:53'),
(33, 'large', 'Female', 'SHS Blouse', 'Length: 23-24 inches Chest: 39-40 inches Waist: 33-34 inches', '2024-05-13 21:57:42'),
(34, 'small', 'Female', 'SHS Skirt', 'Length: 17-18 inches Waist: 27-28 inches', '2024-05-13 21:58:07'),
(35, 'medium', 'Female', 'SHS Skirt', 'Length: 19-21 inches Waist: 29-31 inches', '2024-05-13 21:58:24'),
(36, 'large', 'Female', 'SHS Skirt', 'Length: 22-24 inches Waist: 31-34 inches', '2024-05-13 21:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(15) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `garment_type` varchar(50) NOT NULL,
  `garment_id` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `notes` varchar(555) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_no`, `student_id`, `amount`, `garment_type`, `garment_id`, `gender`, `notes`, `status`, `created`, `modified`) VALUES
(101, 'GTMS000600601', '90b094', '350.00', 'PE Pants', 'Not set', 'Male', '', 'Approved', '2024-05-19 23:41:07', '2024-05-19 15:41:07'),
(103, 'GTMS005900030', '38b189', '350.00', 'PE Pants', 'Not set', 'Male', '', 'Pending', '2024-05-19 23:57:25', '2024-05-19 15:57:25'),
(107, 'GTMS003900136', '38b189', '350.00', 'SHS Pants', 'Not set', 'Male', '', 'Pending', '2024-05-20 00:12:17', '2024-05-19 16:12:17'),
(108, 'GTMS002800202', '90b094', '300.00', 'Polo', 'Not set', 'Male', '', 'Pending', '2024-05-20 00:15:41', '2024-05-19 16:15:41'),
(117, 'GTMS002300448', '01b392', '350.00', 'PE Pants', '19', 'Female', '', 'Approved', '2024-05-20 00:35:29', '2024-05-19 16:35:29'),
(129, 'GTMS006800139', '38b166', '355.00', 'PE Polo Shirt', 'Not set', 'Female', '', 'Pending', '2024-05-20 00:58:26', '2024-05-19 16:58:26'),
(130, 'GTMS000000766', '38b166', '340.00', 'Blouse', '8', 'Female', '', 'Approved', '2024-05-20 00:59:42', '2024-05-19 16:59:42'),
(131, 'GTMS009100442', '38b189', '355.00', 'PE Polo Shirt', 'Not set', 'Male', '', 'Pending', '2024-05-20 01:00:19', '2024-05-19 17:00:19'),
(134, 'GTMS000000055', '90b094', '330.00', 'Pants', 'Not set', 'Male', '', 'Pending', '2024-05-20 01:01:33', '2024-05-19 17:01:33'),
(135, 'GTMS005600370', '01b392', '335.00', 'SHS Blouse', 'Not set', 'Female', '', 'Pending', '2024-05-20 02:06:54', '2024-05-19 18:06:54'),
(136, 'GTMS002400327', '01b392', '345.00', 'SHS Skirt', 'Not set', 'Female', '', 'Pending', '2024-05-20 02:07:03', '2024-05-19 18:07:03'),
(138, 'GTMS001600065', '94b639', '300.00', 'Polo', '2', 'Male', '', 'Approved', '2024-05-20 09:35:20', '2024-05-20 01:35:20'),
(139, 'GTMS004300997', '94b639', '350.00', 'Pants', '6', 'Male', '', 'Declined', '2024-05-20 09:35:23', '2024-05-20 01:35:23'),
(140, 'GTMS004500103', '94b639', '350.00', 'Pants', '5', 'Male', '', 'Updated', '2024-05-20 09:50:33', '2024-05-20 01:50:33'),
(141, 'GTMS007800277', '35b733', '300.00', 'Polo', '1', 'Male', '', 'Updated', '2024-05-22 08:56:19', '2024-05-22 00:56:19'),
(142, 'GTMS001600225', '35b733', '350.00', 'Pants', 'Not set', 'Male', '', 'Pending', '2024-05-22 08:56:21', '2024-05-22 00:56:21'),
(144, 'GTMS007600164', '35b733', '300.00', 'Polo', 'Not set', 'Male', '', 'Pending', '2024-05-23 15:38:32', '2024-05-23 07:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `student_id`, `order_id`, `payment_status`, `status`, `reference_no`, `created`, `modified`) VALUES
(1, '22b0959', '0120921', 'FULLY PAID', 'READY TO PICK-UP', 'GMTS09533307696', '2024-04-29 19:31:49', '2024-04-29 11:31:49'),
(2, '22b0959', '0120921', 'PARTIAL PAID', 'READY TO PICK-UP', 'GMTS09533307696', '2024-04-29 19:31:49', '2024-04-29 11:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `access_level` varchar(25) NOT NULL,
  `image_profile` varchar(255) NOT NULL,
  `profile_status` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `firstname`, `lastname`, `gender`, `email_address`, `password`, `contact_no`, `address`, `course`, `academic_year`, `access_level`, `image_profile`, `profile_status`, `created`, `modified`) VALUES
(2, '22b093', 'Admin', 'Steve', 'Male', 'admin_gtms@gmail.com', '$2y$10$fVjiVlbUg8IyLhRjvKRiA.z5JagJXWfMxLxdQYU4ZVvuYpcdu63xi', '', '', '', '', 'Admin', '', '', '2024-03-22 11:45:41', '2024-04-28 17:13:27'),
(42, '01b392', 'Alexandra', 'Halton', 'Female', 'alexhalton@gmail.com', '$2y$10$WzXsyeTxz.wFTPTPMOJ7Ru62ujscmxKylYi1HE1vJKYtwf29MQR.O', '950-321-6689', '353 Protacio Street Corner Zamora Street, Pasay city', '5', '5', 'Student', 'fc6c648f5f823123eec1aad26757898e0b62cd07-tumblr_m9a50wHVNq1qg02b1o1_500.jpg', 'Updated', '2024-05-19 14:49:35', '2024-05-19 22:54:30'),
(43, '38b189', 'Macken', 'Chiz', 'Male', 'mack@gmail.com', '$2y$10$kiR1Caq1lE6r0C9i1Blmk.EMXrHAREjVbdAuzMGr7YHFmF2J1R8cK', '952-212-1315', 'Makati City', '7', '5', 'Student', '75cb0edd6c79ede944da994ca86b74a1a9136ca2-istockphoto-1188980757-612x612.jpg', 'Updated', '2024-05-19 15:13:09', '2024-05-19 23:15:25'),
(44, '90b094', 'Kazuma', 'Satou', 'Male', 'kaz@gmail.com', '$2y$10$vi48xpE87dFGIIBejYlBZ.71ZpGq0.4imyGqQFad0DmaNs9sq6MF2', '923-124-1619', 'Buenavista, Marinduque', '2', '2', 'Student', '8191bfd1be4ed175648a9fe6bb1c569483caa9af-kaz-image-profile.jpg', 'Updated', '2024-05-19 15:17:28', '2024-05-19 23:19:36'),
(45, '38b166', 'Maria', 'Clara', 'Female', 'maria@gmail.com', '$2y$10$HMWQ8G.J9MhkylvTff1sJepO6Cbj6NTTYKRBkcYM9OIvZGaDHzBEO', '923-313-1583', 'Arboretum Road, U.P. Campus, Quezon City, 1101 Metro Manila', '3', '3', 'Student', '25d964a5983a658a93640782f4820410c828682c-New-character-Maria-Clara-hetalia-31095908-500-700.jpg', 'Updated', '2024-05-19 16:38:30', '2024-05-20 00:40:26'),
(46, '94b639', 'Albert', 'Strong', 'Male', 'albert@gmail.com', '$2y$10$C1zidHPClKNUFExhBp3BwOnIZVQvyWGqEfe1aID.//xRzefrHk04u', '123-133-9438', 'Boac, Marinduque', '1', '1', 'Student', '8191bfd1be4ed175648a9fe6bb1c569483caa9af-kaz-image-profile.jpg', 'Updated', '2024-05-20 01:33:02', '2024-05-20 09:34:16'),
(47, '35b733', 'Elon', 'Musk', 'Male', 'elon@gmail.com', '$2y$10$7mQlOBHonK0Bj9Y7rnlLYu9OrhNcU9C90eMZgbIQgT9aHKJ8SoeM.', '950-888-7742', '191 County 1248 Rd Linden, Texas(TX), 75563', '2', '2', 'Student', '384c4cbeff7e35b9aeda2aa307ca6e07d50d6d5a-elon-musk-profile.jpg', 'Updated', '2024-05-22 00:47:46', '2024-05-22 08:52:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garment_sizes`
--
ALTER TABLE `garment_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `garment_sizes`
--
ALTER TABLE `garment_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
