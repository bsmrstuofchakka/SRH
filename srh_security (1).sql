-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2019 at 08:06 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srh_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_07_163341_create_profile_models_table', 1),
(4, '2019_12_09_222014_create_security_models_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_models`
--

DROP TABLE IF EXISTS `profile_models`;
CREATE TABLE IF NOT EXISTS `profile_models` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `roomno` text COLLATE utf8mb4_unicode_ci,
  `bedno` text COLLATE utf8mb4_unicode_ci,
  `department` text COLLATE utf8mb4_unicode_ci,
  `ses` text COLLATE utf8mb4_unicode_ci,
  `yearSem` text COLLATE utf8mb4_unicode_ci,
  `fname` text COLLATE utf8mb4_unicode_ci,
  `mname` text COLLATE utf8mb4_unicode_ci,
  `cnumber` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarcontact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `bcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_models_student_id_unique` (`student_id`),
  UNIQUE KEY `profile_models_bcode_unique` (`bcode`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_models`
--

INSERT INTO `profile_models` (`id`, `student_id`, `name`, `roomno`, `bedno`, `department`, `ses`, `yearSem`, `fname`, `mname`, `cnumber`, `email`, `guarcontact`, `blood_group`, `address`, `bcode`, `photo`, `created_at`, `updated_at`) VALUES
(1, '20151201047', 'Syed Pallab', '403', '2', 'IT', '2015-16', '4th/2nd', 'Abdul Khaled', 'Razia Khatun', '01929234567', 'pallab312@gmail.com', '01823987893', 'AB+', 'Khulna, Terokhada, Terokhada, Terokhada', 'jdkkkei83943jjf', '5df78f18ed4ba.jpg', '2019-12-16 14:05:13', '2019-12-16 14:23:27'),
(3, '20151201034', 'Md. Masum Rahman', '404', '5', 'CSE', '2015-16', '4th/2nd', 'Abdul Khaled', 'Nurali Khatun', '0123456780', 'masum312@gmail.com', '0134567890', 'AB-', 'Tuthpara, Piti-I-Mor,Khulna', '20151201034', '5df797484bba6.jpg', '2019-12-16 14:39:28', '2019-12-19 05:10:53'),
(4, '20151201010', 'S. M. Khalid Hasan', '305', '1', 'CSE', '2018-19', '2nd/ 2 semester', 'Abdul Khaled', 'Razia Khatun', '01978123892', 'khalid312@gmail.com', '01923456737', 'B+', 'Jashore, Manirampur, Kuada Bazar, Dhonar', '8941161008042', '5df8b8f8de099.jpg', '2019-12-17 11:16:09', '2019-12-17 12:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `security_models`
--

DROP TABLE IF EXISTS `security_models`;
CREATE TABLE IF NOT EXISTS `security_models` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcodeNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 for check in and 1 for check out',
  `currentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_models`
--

INSERT INTO `security_models` (`id`, `barcodeNumber`, `checkin_type`, `currentDate`) VALUES
(55, '20151201034', 'Check Out', '2019-12-19 05:08:23'),
(54, 'yjkhgfjkkhgykkl', 'Check Out', '2019-12-18 04:31:03'),
(53, '12345', 'Check In', '2019-12-18 04:13:10'),
(52, 'jfshkjlskjlkelskjes', 'Check Out', '2019-12-18 04:11:25'),
(51, '1234567890', 'Check In', '2019-12-18 04:10:42'),
(50, '8941161008042', 'Check In', '2019-12-17 12:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `userType`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '$2y$10$46Y2SPvnA.GIejLuevj5Q.x/oHV8.nAcv/pMNC6wWZ3Cjjq3iw9A2', 1, '2ZkAACdpc73bOdGSgr4pwCXlvGEgXQdW6pyB53xpwFXlvjK1zhGq7xPStuUL', '2019-12-31 18:00:00', '2019-12-31 18:00:00'),
(2, 'pallab47', 'pallab312@gmail.com', '$2y$10$GHA8SXWerkjQlSv5CpXSPuVBmhHiTvoMYG6GskjejGAjHPSkI8RP2', 0, 'jKuYZg8cUWjH2LUUePsP2jbQS9eboWSsYC3rq11El5uB7tFmS9V3hqUJob8S', '2019-12-16 13:24:59', '2019-12-16 13:24:59'),
(3, 'moshiur031', 'moshiur312@gmail.com', '$2y$10$90A8.2fs4N1n0Y0EchWKYeK.pnRiJ1wk62NKcHy8EJ4QWDvgCBKVS', 0, 'h9m4uI9qxk70LV6vytJQPjuUkhSvsM381zPLuQJFYXVWXKTm0HOBT9gRK4wU', '2019-12-16 13:26:19', '2019-12-16 13:26:19'),
(5, 'murad087', 'muradmd312@gmail.com', '$2y$10$LtYAamUU7e3wNZ5zUs.FBOy9W0hPOfvlBfuNKszdw14c2OwQJZdA2', 1, '87pB9ufVmolQEW9ivItisHmfJ2g502tDpV1aUhvWx4BoJ8JPX5txau2a2tQm', '2019-12-16 13:29:31', '2019-12-16 13:29:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
