-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2025 at 10:11 PM
-- Server version: 10.6.22-MariaDB
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appwebdemo_carallies`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `status` enum('available','booked') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `vendor_id`, `time_slot`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '2025-04-25 23:40:00.000000\n', 'booked', '2025-02-26 15:55:47', '2025-04-23 17:14:27'),
(2, 4, '2025-04-25 23:40:00.000000\n', 'booked', '2025-02-26 15:55:47', '2025-04-24 20:50:17'),
(3, 5, '2025-04-25 23:40:00.000000\n', 'available', '2025-02-26 15:56:13', '2025-04-23 17:04:12'),
(4, 6, '2025-04-25 23:40:00.000000\n', 'booked', '2025-03-03 13:13:29', '2025-05-07 21:34:20'),
(5, 5, '2025-04-25 23:40:00.000000\n', 'available', '2025-03-03 13:13:29', '2025-03-03 15:54:15'),
(6, 5, '2025-04-25 23:40:00.000000\n', 'available', '2025-03-03 13:13:29', '2025-03-17 15:21:26'),
(7, 4, '2025-05-19 18:43:00.000000', 'available', '2025-05-07 18:43:35', '2025-05-07 18:43:35'),
(8, 4, '2025-05-19 18:47:00.000000', 'available', '2025-05-07 18:52:13', '2025-05-07 18:52:13'),
(9, 4, '2025-05-19 18:52:00.000000', 'available', '2025-05-07 18:52:13', '2025-05-07 18:52:13'),
(10, 4, '2025-05-20 18:53:00.000000', 'booked', '2025-05-07 18:53:24', '2025-05-07 21:33:29'),
(11, 4, '2025-05-18 18:53:00.000000', 'available', '2025-05-07 18:53:24', '2025-05-07 18:53:24'),
(12, 4, '2025-05-27 18:53:00.000000', 'booked', '2025-05-07 18:53:24', '2025-05-22 23:31:39'),
(13, 5, '2025-03-02 10:00:00.000000', 'available', '2025-05-07 20:48:37', '2025-05-07 20:48:37'),
(14, 5, '2025-03-02 11:00:00.000000', 'available', '2025-05-07 20:48:37', '2025-05-07 20:48:37'),
(15, 5, '2025-03-02 12:00:00.000000', 'available', '2025-05-07 20:48:37', '2025-05-07 20:48:37'),
(16, 5, '2025-05-20 00:00:00.000000', 'booked', '2025-05-07 21:07:05', '2025-05-21 22:01:49'),
(17, 5, '2025-03-02 11:00:00.000000', 'available', '2025-05-07 21:07:05', '2025-05-07 21:07:05'),
(18, 5, '2025-03-02 12:00:00.000000', 'available', '2025-05-07 21:07:05', '2025-05-07 21:07:05'),
(19, 5, '2025-05-20 00:00:00.000000', 'available', '2025-05-07 21:07:09', '2025-05-07 21:07:09'),
(20, 5, '2025-03-02 11:00:00.000000', 'available', '2025-05-07 21:07:09', '2025-05-07 21:07:09'),
(21, 5, '2025-03-02 12:00:00.000000', 'available', '2025-05-07 21:07:09', '2025-05-07 21:07:09'),
(22, 4, '2025-05-12 23:49:00.000000', 'available', '2025-05-12 23:49:44', '2025-05-12 23:49:44'),
(23, 43, '2025-05-13 00:11:00.000000', 'available', '2025-05-13 00:11:59', '2025-05-13 00:11:59'),
(24, 43, '2025-05-13 10:11:00.000000', 'booked', '2025-05-13 00:11:59', '2025-05-13 18:35:38'),
(25, 43, '2025-05-13 13:30:00.000000', 'booked', '2025-05-13 00:11:59', '2025-05-13 18:32:23'),
(26, 43, '2025-05-12 08:11:00.000000', 'available', '2025-05-13 00:11:59', '2025-05-13 00:11:59'),
(27, 4, '2025-05-16 21:25:00.000000', 'available', '2025-05-16 21:25:27', '2025-05-16 21:25:27'),
(28, 4, '2025-05-21 10:16:00.000000', 'booked', '2025-05-19 19:16:48', '2025-05-20 19:13:51'),
(29, 4, '2025-05-20 18:09:00.000000', 'booked', '2025-05-20 18:09:54', '2025-05-20 19:07:02'),
(30, 4, '2025-05-21 18:09:00.000000', 'booked', '2025-05-20 18:09:54', '2025-05-21 18:07:50'),
(31, 4, '2025-05-20 12:09:00.000000', 'available', '2025-05-20 18:09:54', '2025-05-20 18:09:54'),
(32, 4, '2025-05-21 18:39:00.000000', 'booked', '2025-05-20 18:39:13', '2025-05-20 19:08:55'),
(33, 4, '2025-05-22 18:39:00.000000', 'booked', '2025-05-20 18:39:13', '2025-05-20 19:12:37'),
(34, 4, '2025-05-21 18:39:00.000000', 'booked', '2025-05-20 18:39:13', '2025-05-21 18:14:25'),
(35, 4, '2025-05-20 18:39:00.000000', 'available', '2025-05-20 18:39:13', '2025-05-20 18:39:13'),
(36, 4, '2025-05-27 00:46:00.000000', 'booked', '2025-05-21 00:47:00', '2025-05-24 00:07:15'),
(37, 4, '2025-05-28 00:46:00.000000', 'booked', '2025-05-21 00:47:00', '2025-05-21 18:31:31'),
(38, 4, '2025-05-29 00:46:00.000000', 'available', '2025-05-21 00:47:00', '2025-05-21 00:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `availability_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_slot` time NOT NULL,
  `note` text DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vendor_id`, `service_id`, `availability_id`, `date`, `time_slot`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 49, 4, 2, 1, '2025-03-19', '23:40:00', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'completed', '2025-03-19 14:55:18', '2025-04-03 12:25:25'),
(2, 49, 4, 5, 2, '2025-03-19', '23:40:00', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'completed', '2025-03-19 14:55:42', '2025-05-14 23:30:16'),
(3, 64, 4, 5, 1, '2025-04-17', '23:40:00', 'gggggggggggggggggg', 'completed', '2025-04-16 12:36:25', '2025-05-14 23:25:56'),
(4, 64, 4, 5, 1, '2025-04-17', '23:40:00', 'dededededede', 'completed', '2025-04-16 12:50:36', '2025-05-15 23:19:08'),
(5, 64, 4, 2, 1, '2025-04-17', '23:40:00', 'uuuuuuuuuuuuuuuuuuuuuu', 'completed', '2025-04-16 13:32:09', '2025-05-16 18:07:07'),
(6, 64, 4, 2, 2, '2025-04-17', '23:40:00', 'tttttttttt', 'completed', '2025-04-16 13:55:45', '2025-05-16 22:20:18'),
(7, 64, 4, 2, 1, '2025-04-17', '23:40:00', 'bnfghktui;ptyuio', 'completed', '2025-04-16 13:57:56', '2025-05-19 19:12:57'),
(8, 64, 4, 2, 2, '2025-04-17', '23:40:00', 'ssssssssssssssssssssssssssssssssssss', 'completed', '2025-04-16 13:59:11', '2025-05-16 17:07:30'),
(9, 64, 4, 2, 1, '2025-04-17', '23:40:00', 'fsdfsdfsdfsdfsdfsdfsdfsdf', 'completed', '2025-04-16 14:01:06', '2025-05-20 20:28:37'),
(10, 64, 6, 6, 4, '2025-04-17', '23:40:00', 'xdddddddddddddddddddd', 'confirmed', '2025-04-16 15:51:06', '2025-04-16 15:51:06'),
(11, 64, 6, 8, 4, '2025-04-24', '23:40:00', 'ddddd', 'confirmed', '2025-04-23 17:02:47', '2025-04-23 17:02:47'),
(12, 64, 5, 2, 3, '2025-04-24', '23:40:00', NULL, 'confirmed', '2025-04-23 17:04:12', '2025-04-23 17:04:12'),
(13, 70, 4, 2, 1, '2025-04-24', '23:40:00', NULL, 'completed', '2025-04-23 17:14:27', '2025-05-20 20:29:53'),
(14, 64, 4, 2, 2, '2025-04-25', '23:40:00', 'testing', 'completed', '2025-04-24 20:50:17', '2025-05-22 00:02:27'),
(15, 64, 4, 2, 10, '2025-05-07', '18:53:00', 'dddfxxxxd', 'completed', '2025-05-07 21:33:29', '2025-05-21 00:39:17'),
(16, 49, 6, 5, 4, '2025-05-07', '23:40:00', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'confirmed', '2025-05-07 21:34:20', '2025-05-07 21:34:20'),
(22, 49, 43, 5, 25, '2025-05-13', '13:30:00', 'aaaaaaaaaaaaaaaaaaaaaaaa', 'confirmed', '2025-05-13 18:32:23', '2025-05-13 18:32:23'),
(23, 64, 43, 5, 24, '2025-05-13', '10:11:00', 'gxyyddhffhf', 'confirmed', '2025-05-13 18:35:38', '2025-05-13 18:35:38'),
(24, 64, 4, 4, 29, '2025-05-20', '18:09:00', 'dsddfzserfdserrrttg', 'completed', '2025-05-20 19:07:02', '2025-05-22 22:32:13'),
(25, 64, 4, 4, 32, '2025-05-20', '18:39:00', 'hgffhjhfddd', 'confirmed', '2025-05-20 19:08:55', '2025-05-20 19:08:55'),
(26, 64, 4, 4, 33, '2025-05-20', '18:39:00', 'hvuuf8f88fuf', 'completed', '2025-05-20 19:12:37', '2025-05-20 20:30:17'),
(27, 64, 4, 4, 28, '2025-05-20', '10:16:00', 'dyxxhcc9hchcuc', 'confirmed', '2025-05-20 19:13:51', '2025-05-20 19:13:51'),
(28, 64, 4, 4, 30, '2025-05-21', '18:09:00', 'rgghffyehfhfyfdfff', 'confirmed', '2025-05-21 18:07:50', '2025-05-21 18:07:50'),
(29, 64, 4, 4, 34, '2025-05-21', '18:39:00', 'fucycycycycyyc', 'confirmed', '2025-05-21 18:14:25', '2025-05-21 18:14:25'),
(30, 64, 4, 33, 37, '2025-05-21', '00:46:00', 'ddffffffffgtyyh', 'confirmed', '2025-05-21 18:31:31', '2025-05-21 18:31:31'),
(31, 88, 5, 10, 16, '2025-05-21', '00:00:00', '3fghhhbhb', 'confirmed', '2025-05-21 22:01:48', '2025-05-21 22:01:48'),
(32, 64, 4, 26, 12, '2025-05-22', '18:53:00', 'hahshshsv', 'confirmed', '2025-05-22 23:31:39', '2025-05-22 23:31:39'),
(33, 64, 4, 26, 36, '2025-05-24', '00:46:00', 'gecscwcwfqfwg', 'completed', '2025-05-24 00:07:15', '2025-05-24 00:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(138, 13, 13, 1, '2025-05-15 21:41:38', '2025-05-15 21:41:38'),
(139, 13, 14, 1, '2025-05-15 21:41:48', '2025-05-15 21:41:48'),
(140, 13, 9, 1, '2025-05-15 21:42:02', '2025-05-15 21:42:02'),
(141, 13, 25, 1, '2025-05-15 21:42:15', '2025-05-15 21:42:15'),
(142, 13, 31, 1, '2025-05-16 17:58:10', '2025-05-16 17:58:10'),
(163, 49, 28, 2, '2025-05-17 00:24:56', '2025-05-17 00:24:56'),
(164, 49, 30, 2, '2025-05-17 00:24:58', '2025-05-17 00:24:58'),
(165, 49, 31, 2, '2025-05-17 00:25:00', '2025-05-17 00:25:00'),
(229, 13, 21, 17, '2025-05-22 18:34:37', '2025-05-22 18:47:30'),
(233, 90, 2, 5, '2025-05-23 23:12:50', '2025-05-23 23:15:52'),
(234, 90, 25, 1, '2025-05-23 23:32:26', '2025-05-23 23:32:26'),
(235, 90, 6, 1, '2025-05-23 23:37:07', '2025-05-23 23:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Car Accessories', 'Car Accessories', 'read.jpg', 1, '2025-02-21 17:06:38', '2025-02-21 17:06:38'),
(3, 'Performance Parts\n', 'Performance Parts\n', 'read.jpg', 1, '2025-02-21 17:06:38', '2025-02-21 17:06:38'),
(4, 'Aorner Parts', 'Aorner Parts', 'read.jpg', 1, '2025-02-21 17:06:38', '2025-02-21 17:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `seen`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:42:00', '2025-03-27 16:09:31'),
(2, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:42:39', '2025-03-27 16:09:31'),
(3, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:42:47', '2025-03-27 16:09:31'),
(4, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:44:09', '2025-03-27 16:09:31'),
(5, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:47:22', '2025-03-27 16:09:31'),
(6, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:48:33', '2025-03-27 16:09:31'),
(7, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:48:50', '2025-03-27 16:09:31'),
(8, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:50:08', '2025-03-27 16:09:31'),
(9, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:52:16', '2025-03-27 16:09:31'),
(10, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:57:05', '2025-03-27 16:09:31'),
(11, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:57:22', '2025-03-27 16:09:31'),
(12, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:58:11', '2025-03-27 16:09:31'),
(13, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:59:31', '2025-03-27 16:09:31'),
(14, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 15:59:46', '2025-03-27 16:09:31'),
(15, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:00:00', '2025-03-27 16:09:31'),
(16, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:02:08', '2025-03-27 16:09:31'),
(17, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:09:42', '2025-03-27 16:11:43'),
(18, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:12:12', '2025-03-27 16:12:17'),
(19, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:13:04', '2025-03-27 16:13:09'),
(20, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:13:45', '2025-03-27 16:13:50'),
(21, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:14:09', '2025-03-27 16:14:13'),
(22, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:14:55', '2025-03-27 16:16:47'),
(23, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:15:14', '2025-03-27 16:16:47'),
(24, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:15:56', '2025-03-27 16:16:47'),
(25, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:16:11', '2025-03-27 16:16:47'),
(26, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:16:41', '2025-03-27 16:16:47'),
(27, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:16:52', '2025-03-27 16:17:46'),
(28, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:17:05', '2025-03-27 16:17:46'),
(29, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:17:11', '2025-03-27 16:17:46'),
(30, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:17:34', '2025-03-27 16:17:46'),
(31, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:18:55', '2025-03-27 16:22:33'),
(32, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:19:16', '2025-03-27 16:22:33'),
(33, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:20:11', '2025-03-27 16:22:33'),
(34, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:21:05', '2025-03-27 16:22:33'),
(35, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:21:19', '2025-03-27 16:22:33'),
(36, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:21:39', '2025-03-27 16:22:33'),
(37, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:22:17', '2025-03-27 16:22:33'),
(38, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:22:39', '2025-03-27 16:22:46'),
(39, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:23:51', '2025-03-27 16:25:53'),
(40, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:24:10', '2025-03-27 16:25:53'),
(41, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:24:49', '2025-03-27 16:25:53'),
(42, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:25:13', '2025-03-27 16:25:53'),
(43, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:25:37', '2025-03-27 16:25:53'),
(44, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-27 16:26:32', '2025-03-27 16:26:47'),
(45, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 12:59:34', '2025-03-28 13:00:31'),
(46, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 12:59:51', '2025-03-28 13:00:31'),
(47, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:00:37', '2025-03-28 13:00:44'),
(48, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:02:39', '2025-03-28 13:02:47'),
(49, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:03:15', '2025-03-28 13:03:26'),
(50, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:35', '2025-03-28 13:25:26'),
(51, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:45', '2025-03-28 13:25:26'),
(52, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:47', '2025-03-28 13:25:26'),
(53, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:49', '2025-03-28 13:25:26'),
(54, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:51', '2025-03-28 13:25:26'),
(55, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:12:52', '2025-03-28 13:25:26'),
(56, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:19:27', '2025-03-28 13:25:26'),
(57, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:21:57', '2025-03-28 13:25:26'),
(58, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:25:05', '2025-03-28 13:25:26'),
(59, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:33:40', '2025-03-28 13:46:44'),
(60, 1, 'John Doe', 'john.doe@example.com', '+1234567890', 'This is a dummy message for testing purposes.', '2025-03-28 13:46:49', '2025-03-28 13:48:34'),
(61, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-03-28 13:53:51', '2025-03-28 13:54:26'),
(62, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-03-28 14:11:21', '2025-03-28 14:18:43'),
(63, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-03-28 14:36:14', '2025-03-28 14:45:32'),
(64, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-04-03 13:47:52', '2025-04-03 13:48:02'),
(65, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-04-03 13:48:10', '2025-04-03 13:48:20'),
(66, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue sdgreth grh ertuj rgh etj fdh  trjuegfrh je', '2025-04-03 14:44:48', '2025-04-03 14:46:03'),
(67, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:01:40', '2025-04-03 16:02:11'),
(68, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:02:21', '2025-04-03 16:02:30'),
(69, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:03:20', '2025-04-03 16:06:53'),
(70, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:03:28', '2025-04-03 16:06:53'),
(71, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:04:05', '2025-04-03 16:06:53'),
(72, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:04:10', '2025-04-03 16:06:53'),
(73, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:06:41', '2025-04-03 16:06:53'),
(74, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 16:06:50', '2025-04-03 16:06:53'),
(75, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 17:02:09', '2025-04-03 17:02:20'),
(76, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 17:46:30', '2025-04-03 18:16:32'),
(77, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-03 18:16:27', '2025-04-03 18:16:32'),
(78, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:37:46', '2025-04-04 16:38:41'),
(79, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:37:56', '2025-04-04 16:38:41'),
(80, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:38:14', '2025-04-04 16:38:41'),
(81, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:38:57', '2025-04-04 16:47:34'),
(82, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:39:40', '2025-04-04 16:47:34'),
(83, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:42:45', '2025-04-04 16:47:34'),
(84, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:44:09', '2025-04-04 16:47:34'),
(85, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:44:49', '2025-04-04 16:47:34'),
(86, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:45:37', '2025-04-04 16:47:34'),
(87, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:46:15', '2025-04-04 16:47:34'),
(88, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:46:29', '2025-04-04 16:47:34'),
(89, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:46:44', '2025-04-04 16:47:34'),
(90, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:47:07', '2025-04-04 16:47:34'),
(91, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:48:28', '2025-04-04 16:49:26'),
(92, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 16:49:09', '2025-04-04 16:49:26'),
(93, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 17:20:52', '2025-04-04 17:20:58'),
(94, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 17:21:02', '2025-04-04 17:23:35'),
(95, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 17:21:08', '2025-04-04 17:23:35'),
(96, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 17:21:16', '2025-04-04 17:23:35'),
(97, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-04-04 17:23:29', '2025-04-04 17:23:35'),
(98, 1, 'About Us', 'admin@gmail.com', '+923001234567', 'ssssssssssssssssssssssss', '2025-04-08 12:42:35', '2025-04-08 12:43:43'),
(99, 1, 'About Us', 'admin@gmail.com', '+923001234567', 'ssssssssssssssssssssssss', '2025-04-08 12:42:38', '2025-04-08 12:43:43'),
(100, 1, 'About Us', 'admin@gmail.com', '+923001234567', 'sssssssss', '2025-04-08 12:43:32', '2025-04-08 12:43:43'),
(101, 1, 'About Us', 'AutoGaragePro@gmail.com', '+923001234567', 'sa', '2025-04-08 12:43:51', '2025-04-08 12:45:37'),
(102, 1, 'Chirs AutoGaraje', 'info@example.com', '+923001234567', 'ss', '2025-04-08 12:45:27', '2025-04-08 12:45:37'),
(103, 1, 'Caryn Branch', 'zugapus@mailinator.com', '+1 (687) 141-9308', 'Et in ut in itaque q', '2025-04-08 12:46:29', '2025-04-09 10:36:58'),
(104, 1, 'Melissa Walsh', 'raburiw@mailinator.com', '+1 (564) 822-3311', 'Elit consequat Sed', '2025-04-11 11:27:07', '2025-04-14 16:59:48'),
(105, 1, 'Rama Slater', 'wycerelapo@mailinator.com', '+1 (506) 939-8836', 'Fugit reprehenderit', '2025-04-11 14:23:37', '2025-04-14 16:59:48'),
(106, 1, 'Finn Palmer', 'setixipina@mailinator.com', '+1 (886) 126-2145fdgsefdssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'Rerum molestias aute', '2025-04-21 18:28:41', '2025-04-22 11:28:34'),
(107, 1, 'Faizan', 'abc@gmail.com', '21323232', 'Im Facing Issue Great Effords', '2025-05-05 23:29:32', '2025-05-08 22:51:19'),
(108, 1, 'Developer', 'user@gmail.com', NULL, 'shdhdhdhdjdjdjdjdjis', '2025-05-05 23:52:06', '2025-05-14 15:47:55'),
(109, 0, 'flutter', 'jsja@gmail.com', NULL, 'bvssn', '2025-05-15 18:17:30', '2025-05-15 18:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL,
  `item_1` varchar(255) DEFAULT NULL,
  `description_1` text DEFAULT NULL,
  `item_2` varchar(255) DEFAULT NULL,
  `description_2` text DEFAULT NULL,
  `item_3` varchar(255) DEFAULT NULL,
  `description_3` text DEFAULT NULL,
  `item_4` varchar(255) DEFAULT NULL,
  `description_4` text DEFAULT NULL,
  `item_5` varchar(255) DEFAULT NULL,
  `description_5` text DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `video` varchar(255) DEFAULT NULL,
  `count_1` int(11) DEFAULT NULL,
  `count_2` int(11) DEFAULT NULL,
  `count_3` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `description`, `page_name`, `sub_name`, `item_1`, `description_1`, `item_2`, `description_2`, `item_3`, `description_3`, `item_4`, `description_4`, `item_5`, `description_5`, `images`, `video`, `count_1`, `count_2`, `count_3`, `created_at`, `updated_at`) VALUES
(1, 'Terms Of Use App', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 400; line-height: 24px; font-size: 24px; color: rgb(0, 0, 0); padding: 0px; font-family: DauphinPlain;\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-03 18:24:26'),
(2, 'Privacy Policy Users', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 24px; padding: 0px;\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-08 15:12:01'),
(3, 'Privacy Policy Vendors', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 400; line-height: 24px; font-size: 24px; color: rgb(0, 0, 0); padding: 0px; font-family: DauphinPlain;\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-03 18:24:18'),
(4, 'Terms & Condition Users', '<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><br></h2></div><br><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-03 18:24:09'),
(5, 'Terms & Condition Vendors', '<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><br style=\"margin: 0px; padding: 0px; clear: both; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div><div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p></div>', 'App', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-03 18:22:54'),
(6, 'Why Choose Us', NULL, 'About', NULL, 'All Kind Brand', 'Lorem ipsum dolor sit ame it, consectetur adipisicing elit, sed do eiusmod te mp or incididunt ut labore.', 'Brake Fluid Exchange', 'Lorem ipsum dolor sit ame it, consectetur adipisicing elit, sed do eiusmod te mp or incididunt ut labore.', 'Maintenance Package', 'Lorem ipsum dolor sit ame it, consectetur adipisicing elit, sed do eiusmod te mp or incididunt ut labore.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-07 16:20:44'),
(7, 'About Us', NULL, 'Home', NULL, 'Lorem Ipsum Dolor Sit Amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 'Anytime Get Your Service', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim</p>', 'Hardcore Repair Service', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim', 'Hardcore Repair Service', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim', '25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim', '[\"67f42f43a040c.jpg\", \"67f42f43a0894.jpg\"]', NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-07 16:11:05'),
(9, 'skills', NULL, 'About us', NULL, 'We Have A Skillest Team Ever', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'Car Repair', '', 'Car Rental Service', '', 'Car Cleaning & Parts', '', '', '', NULL, 'https://www.youtube.com/watch?v=YGvey3J1GOw', 100, 25, 29, '2025-02-24 21:35:16', '2025-04-07 16:11:05'),
(10, 'Stores', NULL, 'Home', NULL, 'Lorem Ipsum Dolor Sit Amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>', 'Anytime Get Your Service', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim</p>', '', '', '', '', '', '', '[\"67f45ff929e7d.jpg\", \"67f45ff92a298.jpg\"]', NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-07 18:30:01'),
(11, 'Return Policy', '<div class=\"row\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Verdana, sans-serif;\"><div class=\"col-sm-10\" data-spm-anchor-id=\"a2a0e.12026498.1651736270.i0.57dd20baStrCxQ\" style=\"margin: 0px; padding-top: 0px; padding-bottom: 0px; min-height: 1px; float: left; width: 635px;\"><h3 style=\"padding: 0px; font-family: inherit; line-height: 1.1; color: inherit; margin-right: 0px !important; margin-bottom: 18px !important; margin-left: 0px !important; font-size: 19px !important;\">Free &amp; Easy Returns Policy</h3><ol class=\"custom-counter\" style=\"margin: 20px 0px 0px; padding-top: 0px; padding-bottom: 0px; list-style-type: none; padding-right: 0px !important; padding-left: 0px !important;\"><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">If your product is damaged, defective, incorrect or incomplete at the time of delivery, please raise a return request on Daraz app or website.<br><span style=\"font-weight: 700;\">Return request must be raised within 14 days for all items from the date of delivery.</span><br><span style=\"font-weight: 700;\">All Daraz Mall items are 100% Authentic by Trusted Brands and are covered under&nbsp;<a href=\"https://pages.daraz.pk/wow/gcp/daraz/channel/pk/mall/mall\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(245, 114, 36) !important;\">2x Money Back Guarantee</a>.</span><br><span style=\"font-weight: 700;\">Note:&nbsp;</span>Groceries and Digital Goods are excluded from 2x Money Back Guarantee.</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">For electronic appliances &amp; mobile phones related issues after usage or after the return policy period, please check if the product is covered under seller warranty or brand warranty.<br>For purchases under&nbsp;<a href=\"https://www.daraz.pk/wow/gcp/daraz/channel/pk/darazmall/feels-like-new\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(245, 114, 36) !important;\">Daraz Like New</a>, your product is covered under&nbsp;<a href=\"https://pages.daraz.pk/wow/i/pk/seo/daraz-like-new-warranty?spm=a2a0e.12026498.1651736270.18.2887400a00f8JY&amp;hybrid=1\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(245, 114, 36) !important;\">3-Months Warranty</a>&nbsp;(for phones) and&nbsp;<a href=\"https://pages.daraz.pk/wow/gcp/daraz/channel/pk/darazmall/darazlikenewarrantylaptopsandtablets\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(245, 114, 36) !important;\">6-Months Warranty</a>&nbsp;(for laptops and tablets). Refer to Daraz Like New Warranty Policy and Warranty Policy for complete Terms and Conditions.</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">For selected categories, we accept a change of mind. Please refer to the section below on Return Policy per Category for more information.</li></ol></div></div><div class=\"row\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Verdana, sans-serif;\"><div class=\"col-sm-12\" style=\"margin: 0px; padding-top: 0px; padding-bottom: 0px; min-height: 1px; float: left; width: 762px;\"><h3 style=\"padding: 0px; font-family: inherit; line-height: 1.1; color: inherit; margin: 18px 0px !important; font-size: 19px !important;\">Valid reasons to return an item</h3><ol class=\"custom-counter\" style=\"margin: 20px 0px 0px; padding-top: 0px; padding-bottom: 0px; list-style-type: none; padding-right: 0px !important; padding-left: 0px !important;\"><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">Delivered product is damaged (i.e. physically destroyed or broken) / defective (e.g. unable to switch on)</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">Delivered product is incomplete (i.e. has missing items and/or accessories).</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">Delivered product is incorrect (i.e. wrong product/size/colour, fake item, or expired)</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">Delivered product is does not match product description or picture (i.e product not as advertised)</li><li style=\"margin-top: 0px; margin-right: 0px; margin-left: 42px; padding: 0px; counter-increment: step-counter 1; margin-bottom: 25px !important; list-style: none !important;\">Delivered product does not fit. (i.e. size is unsuitable)</li></ol></div></div>', 'Stores', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '2025-02-24 21:35:16', '2025-04-21 12:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `office_phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `long` decimal(10,7) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `email`, `office_email`, `phone`, `office_phone`, `address`, `location`, `lat`, `long`, `facebook`, `instagram`, `linkedin`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'info@example.com', 'office@example.com', '+923001234567', '+922112345678', '123 Street, Karachi, Pakistan', 'Karachi, Pakistan', NULL, NULL, 'https://facebook.com/example', 'https://instagram.com/example', 'https://linkedin.com/in/example', 'https://twitter.com/example', '2025-04-08 17:12:16', '2025-04-08 15:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `title`, `description`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Debitis sed repudian', 'Eaque voluptatem, do.d', '1744214452.png', NULL, 1, '2025-02-19 13:11:35', '2025-04-09 11:00:52'),
(6, 'Voluptate aperiam ve', 'Laborum aut rerum ex.dd', '1744214338.png', NULL, 1, '2025-02-19 13:12:15', '2025-04-09 10:58:58'),
(7, 'Excepteur quo aute n', '<b>Tenetur tenetur mole.b</b>', '1744214164.png', NULL, 1, '2025-02-19 13:12:27', '2025-04-09 10:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_18_171205_add_gender_address_about_me_fcm_token_to_users_table', 2),
(6, '2025_02_18_172500_create_permission_tables', 3),
(7, '2025_02_18_174050_create_home_banners_table', 4),
(8, '2025_02_19_183642_create_vendors_table', 5),
(9, '2025_02_19_200753_add_lat_long_location_to_users_table', 6),
(10, '2025_02_21_163536_create_categories_table', 7),
(11, '2025_02_21_163634_create_products_table', 8),
(12, '2025_02_21_163729_create_product_images_table', 9),
(13, '2025_02_21_163938_create_product_images_table', 10),
(14, '2025_02_21_170305_create_categories_table', 11),
(15, '2025_02_21_170425_create_products_table', 12),
(16, '2025_02_21_170612_create_product_images_table', 13),
(17, '2025_02_24_154022_create_carts_table', 14),
(18, '2025_02_24_154211_create_carts_table', 15),
(19, '2025_02_24_163844_create_shippings_table', 16),
(20, '2025_02_24_164011_create_shippings_table', 17),
(21, '2025_02_24_171123_create_orders_table', 18),
(22, '2025_02_24_171134_create_order_items_table', 18),
(23, '2025_02_24_174233_add_fields_to_orders_table', 19),
(24, '2025_02_24_181931_add_vendor_id_to_orders_table', 20),
(25, '2025_02_24_195744_create_payments_table', 21),
(26, '2025_02_26_204103_create_availabilities_table', 22),
(27, '2025_02_26_204331_create_availabilities_table', 23),
(28, '2025_02_26_210159_create_services_table', 24),
(29, '2025_02_28_205405_create_product_reviews_table', 25),
(30, '2025_02_28_205406_create_vendor_reviews_table', 25),
(31, '2025_03_03_192743_create_bookings_table', 26),
(32, '2025_03_03_193610_add_booking_id_to_payments_table', 27),
(33, '2025_03_04_173059_add_service_id_to_bookings_table', 28),
(34, '2025_03_17_174123_add_stripe_account_id_to_vendors_table', 29),
(35, '2025_03_27_202854_create_contacts_table', 30),
(36, '2025_03_27_205353_add_seen_to_contacts_table', 31),
(37, '2025_04_03_215747_add_new_fields_to_contents_table', 32),
(38, '2025_04_08_170457_create_generals_table', 33),
(39, '2014_10_12_100000_create_password_resets_table', 34),
(40, '2025_04_10_232707_create_wishlists_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(2, 'App\\Models\\User', 53),
(2, 'App\\Models\\User', 54),
(2, 'App\\Models\\User', 56),
(2, 'App\\Models\\User', 57),
(2, 'App\\Models\\User', 58),
(2, 'App\\Models\\User', 66),
(2, 'App\\Models\\User', 67),
(2, 'App\\Models\\User', 68),
(2, 'App\\Models\\User', 69),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 78),
(2, 'App\\Models\\User', 80),
(2, 'App\\Models\\User', 81),
(2, 'App\\Models\\User', 82),
(2, 'App\\Models\\User', 83),
(2, 'App\\Models\\User', 85),
(2, 'App\\Models\\User', 86),
(2, 'App\\Models\\User', 87),
(2, 'App\\Models\\User', 89),
(3, 'App\\Models\\User', 49),
(3, 'App\\Models\\User', 64),
(3, 'App\\Models\\User', 70),
(3, 'App\\Models\\User', 71),
(3, 'App\\Models\\User', 72),
(3, 'App\\Models\\User', 73),
(3, 'App\\Models\\User', 74),
(3, 'App\\Models\\User', 77),
(3, 'App\\Models\\User', 79),
(3, 'App\\Models\\User', 84),
(3, 'App\\Models\\User', 88),
(3, 'App\\Models\\User', 90);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `notifyBy` varchar(255) NOT NULL,
  `seen` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `notifyBy`, `seen`, `created_at`, `updated_at`) VALUES
(2, 49, 'Your order #13 is now \'delivered\'.', '..', 0, '2025-03-27 14:46:52', '2025-03-27 14:46:52'),
(3, 49, 'Your order #17 is now \'ready to deliver\'.', '..', 0, '2025-04-21 18:00:47', '2025-04-21 18:00:47'),
(4, 64, 'Your order #17 is now \'ready to deliver\'.', '..', 0, '2025-04-21 18:00:47', '2025-04-21 18:00:47'),
(5, 64, 'Your order #17 is now \'ready to deliver\'.', '..', 0, '2025-04-21 18:00:47', '2025-04-21 18:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `dispute_reason` varchar(255) DEFAULT NULL,
  `dispute_detail` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `name`, `email`, `phone`, `country`, `state`, `city`, `zip`, `address`, `company_name`, `company_address`, `order_notes`, `user_id`, `vendor_id`, `subtotal`, `shipping_cost`, `grand_total`, `dispute_reason`, `dispute_detail`, `status`, `created_at`, `updated_at`) VALUES
(5, 'CAOI-000005', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 480.00, 40.00, 520.00, 'Other', 'fgggtttg', 'dispute', '2025-03-12 16:41:14', '2025-05-06 23:13:24'),
(6, 'CAOI-000006', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 5, 130.00, 47.00, 177.00, NULL, NULL, 'completed', '2025-03-12 16:41:14', '2025-03-12 17:49:00'),
(7, 'CAOI-000007', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 6, 262.00, 40.00, 302.00, NULL, NULL, 'completed', '2025-03-12 16:41:14', '2025-03-12 17:50:16'),
(8, 'CAOI-000008', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 5, 240.00, 20.00, 260.00, NULL, NULL, 'completed', '2025-03-12 17:21:17', '2025-05-06 16:27:57'),
(9, 'CAOI-000009', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 7, 84.00, 40.00, 124.00, NULL, NULL, 'in-progress', '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(10, 'CAOI-000010', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 7, 84.00, 40.00, 124.00, NULL, NULL, 'in-progress', '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(11, 'CAOI-000011', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 5, 240.00, 20.00, 260.00, NULL, NULL, 'in-progress', '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(12, 'CAOI-000012', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 1616.00, 909.00, 2525.00, NULL, NULL, 'completed', '2025-03-17 17:01:14', '2025-05-19 22:30:16'),
(13, 'CAOI-000013', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 960.00, 60.00, 1020.00, NULL, NULL, 'delivered', '2025-03-17 17:04:05', '2025-03-27 14:46:52'),
(14, 'CAOI-000014', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 5, 214.00, 87.00, 301.00, NULL, NULL, 'in-progress', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(15, 'CAOI-000015', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 6, 346.00, 80.00, 426.00, NULL, NULL, 'in-progress', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(16, 'CAOI-000016', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 7, 168.00, 80.00, 248.00, NULL, NULL, 'in-progress', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(17, 'CAOI-000017', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 126.00, 60.00, 186.00, NULL, NULL, 'completed', '2025-04-07 17:43:52', '2025-05-19 22:32:23'),
(18, 'CAOI-000018', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 240.00, 20.00, 260.00, NULL, NULL, 'packing', '2025-04-07 17:43:52', '2025-05-19 22:28:08'),
(19, 'CAOI-000019', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 49, 4, 1704.00, 1131.00, 2835.00, NULL, NULL, 'ready to deliver', '2025-04-07 17:43:52', '2025-05-06 22:30:34'),
(21, 'CAOI-000020', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', 'fdg', NULL, 'sdfsdf', 'fdg', 64, 4, 120.00, 20.00, 140.00, NULL, NULL, 'ready to deliver', '2025-04-17 12:58:43', '2025-05-06 22:32:43'),
(22, 'CAOI-000022', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', 'fdg', NULL, 'sdfsdf', 'fdg', 64, 5, 21.00, 10.00, 31.00, 'asasa', 'asasas', 'dispute', '2025-04-17 12:58:43', '2025-05-06 23:07:43'),
(23, 'CAOI-000023', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', 'fdg', NULL, 'sdfsdf', 'fdg', 64, 7, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(24, 'CAOI-000024', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', 'fdg', NULL, 'sdfsdf', 'fdg', 64, 6, 21.00, 15.00, 36.00, NULL, NULL, 'in-progress', '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(25, 'CAOI-000025', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', '123 Street, Karachi, Pakistan', NULL, NULL, NULL, 64, 4, 240.00, 20.00, 260.00, 'Late Delivery', 'hahsbzhzhshshsushsueeue', 'dispute', '2025-04-17 13:31:16', '2025-05-20 20:53:10'),
(26, 'CAOI-000026', 'Developer', 'developercoder51@gmail.com', '+923001234567', 'US', 'Quam laudantium nis', 'Exercitation est aut', '71841', '123 Street, Karachi, Pakistan', NULL, NULL, NULL, 64, 5, 206.00, 10.00, 216.00, NULL, NULL, 'in-progress', '2025-04-17 13:31:16', '2025-04-17 13:31:16'),
(27, 'CAOI-000027', 'Developer', 'developercoder51@gmail.com', '3214259876', 'United Kingdom (UK)', 'Califonia', 'KU', '71841', 'fbbbbbbbb', 's', 's', 's', 64, 4, 44.00, 20.00, 64.00, NULL, NULL, 'completed', '2025-04-22 11:38:46', '2025-05-06 18:23:37'),
(28, 'CAOI-000028', 'Developer', 'developercoder51@gmail.com', '3214259876', 'United Kingdom (UK)', 'Califonia', 'KU', '71841', 'fbbbbbbbb', 's', 's', 's', 64, 4, 44.00, 20.00, 64.00, NULL, NULL, 'completed', '2025-04-22 11:39:49', '2025-05-06 18:22:43'),
(29, 'CAOI-000029', 'Developer', 'developercoder51@gmail.com', '3214259876', 'Australia', 'Califonia', 'KU', '71841', 'fbbbbbbbb', 'ss', 'ss', 'wwww', 64, 4, 120.00, 20.00, 140.00, NULL, NULL, 'completed', '2025-04-22 22:37:15', '2025-05-06 18:22:30'),
(30, 'CAOI-000030', 'Developer', 'developercoder51@gmail.com', '3214259876', 'Australia', 'Califonia', 'KU', '71841', 'fbbbbbbbb', NULL, NULL, NULL, 64, 4, 120.00, 20.00, 140.00, NULL, NULL, 'completed', '2025-04-23 17:03:39', '2025-05-06 18:21:28'),
(31, 'CAOI-000031', 'test', 'johnsmith30397@gmail.com', '123', 'Saudi Arabia', 'abc', 'ddea', '12312', 'nq21424 n', NULL, NULL, 'abc', 70, 4, 120.00, 20.00, 140.00, NULL, NULL, 'packing', '2025-04-23 17:12:24', '2025-05-06 22:37:33'),
(32, 'CAOI-000032', 'Developer', 'developercoder51@gmail.com', '3214259876', 'United Kingdom (UK)', 'Califonia', 'KU', '71841', 'fbbbbbbbb', NULL, 'ss', NULL, 64, 4, 480.00, 20.00, 500.00, NULL, NULL, 'ready to deliver', '2025-04-24 03:47:49', '2025-05-20 20:42:42'),
(33, 'CAOI-000033', 'Developer', 'developercoder51@gmail.com', '3214259876', 'Canada', 'Califonia', 'KU', '71841', 'fbbbbbbbb', NULL, NULL, NULL, 64, 6, 63.00, 15.00, 78.00, NULL, NULL, 'in-progress', '2025-04-24 20:53:23', '2025-04-24 20:53:23'),
(34, 'CAOI-000034', 'Developer', 'developercoder51@gmail.com', '3214259876', 'China', 'Califonia', 'KU', '71841', 'fbbbbbbbb', NULL, 'ASDF', NULL, 64, 4, 360.00, 20.00, 380.00, NULL, NULL, 'completed', '2025-04-30 22:12:35', '2025-05-06 18:32:30'),
(35, 'CAOI-000035', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', NULL, 49, 6, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-12 22:26:41', '2025-05-12 22:26:41'),
(36, 'CAOI-000036', 'pryo bytes', 'testing@gmail.com', '0976654444', 'UK', 'worcrstor', 'california', '12345', 'house# 37C', 'backtik', 'usa', 'call before reaching hom', 64, 4, 4372.00, 47.00, 4419.00, NULL, NULL, 'completed', '2025-05-12 22:36:48', '2025-05-24 00:04:26'),
(37, 'CAOI-000037', 'pryo bytes', 'testing@gmail.com', '0976654444', 'UK', 'worcrstor', 'california', '12345', 'house# 37C', 'backtik', 'usa', 'call before reaching hom', 64, 24, 66.00, 222.00, 288.00, NULL, NULL, 'in-progress', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(38, 'CAOI-000038', 'pryo bytes', 'testing@gmail.com', '0976654444', 'UK', 'worcrstor', 'california', '12345', 'house# 37C', 'backtik', 'usa', 'call before reaching hom', 64, 23, 7901.00, 969.00, 8870.00, NULL, NULL, 'in-progress', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(39, 'CAOI-000039', 'pryo bytes', 'testing@gmail.com', '0976654444', 'UK', 'worcrstor', 'california', '12345', 'house# 37C', 'backtik', 'usa', 'call before reaching hom', 64, 5, 383.00, 80.00, 463.00, NULL, NULL, 'in-progress', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(40, 'CAOI-000040', 'pryo bytes', 'testing@gmail.com', '0976654444', 'UK', 'worcrstor', 'california', '12345', 'house# 37C', 'backtik', 'usa', 'call before reaching hom', 64, 6, 168.00, 100.00, 268.00, NULL, NULL, 'in-progress', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(41, 'CAOI-000041', 'Testing garage', 'testuser@gmaul.com', '0987679088', 'UK', 'bzbzbsdb', 'sgstgsjjshsb', '12345', 'house 57', 'google', 'pohshshs', 'dhhshsus', 64, 5, 42.00, 40.00, 82.00, NULL, NULL, 'in-progress', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(42, 'CAOI-000042', 'Testing garage', 'testuser@gmaul.com', '0987679088', 'UK', 'bzbzbsdb', 'sgstgsjjshsb', '12345', 'house 57', 'google', 'pohshshs', 'dhhshsus', 64, 23, 261.00, 40.00, 301.00, NULL, NULL, 'in-progress', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(43, 'CAOI-000043', 'Testing garage', 'testuser@gmaul.com', '0987679088', 'UK', 'bzbzbsdb', 'sgstgsjjshsb', '12345', 'house 57', 'google', 'pohshshs', 'dhhshsus', 64, 6, 42.00, 20.00, 62.00, NULL, NULL, 'in-progress', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(44, 'CAOI-000044', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 4, 96.00, 30.00, 126.00, NULL, NULL, 'in-progress', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(45, 'CAOI-000045', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 5, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(46, 'CAOI-000046', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 23, 204.00, 40.00, 244.00, NULL, NULL, 'in-progress', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(47, 'CAOI-000047', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 6, 147.00, 40.00, 187.00, NULL, NULL, 'in-progress', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(48, 'CAOI-000048', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 23, 229.00, 288.00, 517.00, NULL, NULL, 'in-progress', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(49, 'CAOI-000049', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 6, 42.00, 40.00, 82.00, NULL, NULL, 'in-progress', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(50, 'CAOI-000050', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 4, 48.00, 30.00, 78.00, NULL, NULL, 'in-progress', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(51, 'CAOI-000051', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 5, 131.00, 40.00, 171.00, NULL, NULL, 'in-progress', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(52, 'CAOI-000052', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 31, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(53, 'CAOI-000053', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 4, 48.00, 30.00, 78.00, NULL, NULL, 'in-progress', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(54, 'CAOI-000054', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 31, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(55, 'CAOI-000055', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 5, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(56, 'CAOI-000056', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 6, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(57, 'CAOI-000057', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 23, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(58, 'CAOI-000058', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 23, 141.00, 40.00, 181.00, NULL, NULL, 'in-progress', '2025-05-15 21:17:33', '2025-05-15 21:17:33'),
(59, 'CAOI-000059', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 5, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(60, 'CAOI-000060', 'customer', 'customer@gmail.com', '1234567890', 'USA', 'California', 'Los Angeles', '90001', 'abcccc', 'John\'s Company', '123 Business St, Suite 500', 'Please leave the package at the door.', 64, 23, 88.00, 248.00, 336.00, NULL, NULL, 'in-progress', '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(61, 'CAOI-000061', 'hshshshsh hshzhzzhj', 'developer@gmail.com', 'jdhdbehed', 'USA', 'jfjfhdhddhrhrrh', 'hbhrhfjdjfrnrb', 'hrhdhdhd', 'xbxhxhsbsbg', 'yshshshshshshsgs', NULL, 'hbdrheysshsewg', 64, 31, 21.00, 20.00, 41.00, NULL, NULL, 'in-progress', '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(62, 'CAOI-000062', 'hshshshsh hshzhzzhj', 'developer@gmail.com', 'jdhdbehed', 'USA', 'jfjfhdhddhrhrrh', 'hbhrhfjdjfrnrb', 'hrhdhdhd', 'xbxhxhsbsbg', 'yshshshshshshsgs', NULL, 'hbdrheysshsewg', 64, 5, 110.00, 20.00, 130.00, NULL, NULL, 'in-progress', '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(63, 'CAOI-000063', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 49, 24, 112.00, 30.00, 142.00, NULL, NULL, 'in-progress', '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(64, 'CAOI-000064', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 49, 43, 1200.00, 15.00, 1215.00, NULL, NULL, 'in-progress', '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(65, 'CAOI-000065', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 49, 24, 132.00, 30.00, 162.00, NULL, NULL, 'in-progress', '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(66, 'CAOI-000066', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 49, 43, 1800.00, 15.00, 1815.00, NULL, NULL, 'in-progress', '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(67, 'CAOI-000067', 'hdhddhhdhdxh dhdhdbdvdhdsh', 'garage@gmail.com', '123566333', 'USA', 'hzhsgsydudu', 'dshsyydxy', 'yshshshdhd', 'hshxhshhsshvdd', 'hzbshshhshshw', 'xhshhshshshs', 'hhshdbshsjdhzyd', 64, 23, 120.00, 30.00, 150.00, NULL, NULL, 'in-progress', '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(68, 'CAOI-000068', 'hdhddhhdhdxh dhdhdbdvdhdsh', 'garage@gmail.com', '123566333', 'USA', 'hzhsgsydudu', 'dshsyydxy', 'yshshshdhd', 'hshxhshhsshvdd', 'hzbshshhshshw', 'xhshhshshshs', 'hhshdbshsjdhzyd', 64, 6, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(69, 'CAOI-000069', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 64, 23, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(70, 'CAOI-000070', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 64, 5, 42.00, 10.00, 52.00, NULL, NULL, 'in-progress', '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(71, 'CAOI-000071', 'user name', 'john@example.com', '096515515177', 'USA', 'hxbsbshshe', 'hdhd', '12345', 'dushshwywushshzv', 'jsjsbsbsb', 'bsbshshshshshshdhdsh', 'jfjrjeheehrhrhehfh', 64, 24, 100.00, 30.00, 130.00, NULL, NULL, 'in-progress', '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(72, 'CAOI-000072', 'user name', 'john@example.com', '096515515177', 'USA', 'hxbsbshshe', 'hdhd', '12345', 'dushshwywushshzv', 'jsjsbsbsb', 'bsbshshshshshshdhdsh', 'jfjrjeheehrhrhehfh', 64, 43, 600.00, 15.00, 615.00, NULL, NULL, 'in-progress', '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(73, 'CAOI-000073', 'john smoth', 'johnsmith@gmail.com', '1234567', 'UK', 'hdhdhxhdhdhdudydh', 'hshdhdhdhdhdhdyd', '12345', 'hshdhdhehdhshehdhdhdhdhdhdhshshsbhssbdbdbbdbddb d', '12347', 'posidjdhdhdjwjsjdjd', 'deliberately ASAP', 64, 4, 48.00, 20.00, 68.00, NULL, NULL, 'in-progress', '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(74, 'CAOI-000074', 'john smoth', 'johnsmith@gmail.com', '1234567', 'UK', 'hdhdhxhdhdhdudydh', 'hshdhdhdhdhdhdyd', '12345', 'hshdhdhehdhshehdhdhdhdhdhdhshshsbhssbdbdbbdbddb d', '12347', 'posidjdhdhdjwjsjdjd', 'deliberately ASAP', 64, 23, 141.00, 30.00, 171.00, NULL, NULL, 'in-progress', '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(75, 'CAOI-000075', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 64, 24, 100.00, 30.00, 130.00, NULL, NULL, 'in-progress', '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(76, 'CAOI-000076', 'John Doe', 'john@example.com', '03123456789', 'Pakistan', 'Sindh', 'Karachi', '74200', 'Plot 10, Main Road, DHA', 'CarAllies Inc', 'Industrial Area, Karachi', 'Please deliver during working hours', 64, 43, 600.00, 15.00, 615.00, NULL, NULL, 'in-progress', '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(77, 'CAOI-000077', 'john smoth', 'testuser@gmail.com', '34649949484841', 'USA', 'jdhdhdhehehe', 'dhhddhhddhhe', '464646464', 'dhdhdhdhdhdhhe', 'hshshshshshd', 'djehhehehehe', 'shzhhshshshshsjs', 64, 4, 48.00, 20.00, 68.00, NULL, NULL, 'in-progress', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(78, 'CAOI-000078', 'john smoth', 'testuser@gmail.com', '34649949484841', 'USA', 'jdhdhdhehehe', 'dhhddhhddhhe', '464646464', 'dhdhdhdhdhdhhe', 'hshshshshshd', 'djehhehehehe', 'shzhhshshshshsjs', 64, 23, 162.00, 30.00, 192.00, NULL, NULL, 'in-progress', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(79, 'CAOI-000079', 'john smoth', 'testuser@gmail.com', '34649949484841', 'USA', 'jdhdhdhehehe', 'dhhddhhddhhe', '464646464', 'dhdhdhdhdhdhhe', 'hshshshshshd', 'djehhehehehe', 'shzhhshshshshsjs', 64, 5, 21.00, 10.00, 31.00, NULL, NULL, 'in-progress', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(80, 'CAOI-000080', 'gjcfucy fugufufufu9c', 'user@gmail.com', '43766494649', 'USA', 'hshshshshshssh', 'hshshshshshssh', '3754548494', 'shhshshsbshsbs', 'sggshshsbsbs', 'shshshsbsbbs', 'syshshsbshqjbxhshd', 64, 5, 110.00, 10.00, 120.00, NULL, NULL, 'in-progress', '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(81, 'CAOI-000081', 'gjcfucy fugufufufu9c', 'user@gmail.com', '43766494649', 'USA', 'hshshshshshssh', 'hshshshshshssh', '3754548494', 'shhshshsbshsbs', 'sggshshsbsbs', 'shshshsbsbbs', 'syshshsbshqjbxhshd', 64, 6, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(82, 'CAOI-000082', 'hdbshzhsh shshdhdh', 'test@gmaul.com', '464646468448', 'USA', 'hdhddhhddjdhh', 'hshdhdhdhdh', '9895656191', 'shshhdbdbdbdbddh', 'hsgsgsgshsh', 'hshzhshshshshs', 'hshshdhdjjdjd', 64, 6, 63.00, 30.00, 93.00, NULL, NULL, 'in-progress', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(83, 'CAOI-000083', 'hdbshzhsh shshdhdh', 'test@gmaul.com', '464646468448', 'USA', 'hdhddhhddjdhh', 'hshdhdhdhdh', '9895656191', 'shshhdbdbdbdbddh', 'hsgsgsgshsh', 'hshzhshshshshs', 'hshshdhdjjdjd', 64, 31, 42.00, 0.00, 42.00, NULL, NULL, 'in-progress', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(84, 'CAOI-000084', 'hdbshzhsh shshdhdh', 'test@gmaul.com', '464646468448', 'USA', 'hdhddhhddjdhh', 'hshdhdhdhdh', '9895656191', 'shshhdbdbdbdbddh', 'hsgsgsgshsh', 'hshzhshshshshs', 'hshshdhdjjdjd', 64, 5, 63.00, 10.00, 73.00, NULL, NULL, 'in-progress', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(85, 'CAOI-000085', 'hsbzhs bzhzhdhdhx', 'test@gmail.com', '34245484048', 'USA', 'hxhxbzhdhd', 'hshshshsgsh', '68649494', 'shhshshshshshs', 'shgsgshshsshhs', 'hshshsuwhehs', 'hshshshshsydy', 64, 5, 315.00, 10.00, 325.00, NULL, NULL, 'in-progress', '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(86, 'CAOI-000086', 'hsbzhs bzhzhdhdhx', 'test@gmail.com', '34245484048', 'USA', 'hxhxbzhdhd', 'hshshshsgsh', '68649494', 'shhshshshshshs', 'shgsgshshsshhs', 'hshshsuwhehs', 'hshshshshsydy', 64, 4, 336.00, 20.00, 356.00, NULL, NULL, 'in-progress', '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(87, 'CAOI-000087', 'hdhdhdhddh jdjxhdhdh', 'test@gmail.com', '6767646446', 'USA', 'hshxhshs', 'sgshdhhd', '12345', 'hsgsgsgsgs', 'sgsggsgsgs', 'hshsgsgshsg', 'hsehhshshdhshs', 64, 5, 241.00, 10.00, 251.00, NULL, NULL, 'in-progress', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(88, 'CAOI-000088', 'hdhdhdhddh jdjxhdhdh', 'test@gmail.com', '6767646446', 'USA', 'hshxhshs', 'sgshdhhd', '12345', 'hsgsgsgsgs', 'sgsggsgsgs', 'hshsgsgshsg', 'hsehhshshdhshs', 64, 4, 48.00, 20.00, 68.00, NULL, NULL, 'in-progress', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(89, 'CAOI-000089', 'hdhdhdhddh jdjxhdhdh', 'test@gmail.com', '6767646446', 'USA', 'hshxhshs', 'sgshdhhd', '12345', 'hsgsgsgsgs', 'sgsggsgsgs', 'hshsgsgshsg', 'hsehhshshdhshs', 64, 23, 109.00, 30.00, 139.00, NULL, NULL, 'in-progress', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(90, 'CAOI-000090', 'hdhdhdhddh jdjxhdhdh', 'test@gmail.com', '6767646446', 'USA', 'hshxhshs', 'sgshdhhd', '12345', 'hsgsgsgsgs', 'sgsggsgsgs', 'hshsgsgshsg', 'hsehhshshdhshs', 64, 6, 42.00, 30.00, 72.00, NULL, NULL, 'in-progress', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(91, 'CAOI-000091', 'hdhdhdhddh jdjxhdhdh', 'test@gmail.com', '6767646446', 'USA', 'hshxhshs', 'sgshdhhd', '12345', 'hsgsgsgsgs', 'sgsggsgsgs', 'hshsgsgshsg', 'hsehhshshdhshs', 64, 31, 21.00, 0.00, 21.00, NULL, NULL, 'in-progress', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(92, 'CAOI-000092', 'shshdhdhhsgs shshdhdhdeh', 'test@gmail.com', '644664454848', 'USA', 'shhsgsgshshsgsg', 'hshshehshsge', '1234562', 'zgzbshsbsvshsvvssv', 'shshhwhsgdgdgsgsb', 'shshhshsgsgsgsvssgsvgd', 'hshshshevsgev', 64, 23, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(93, 'CAOI-000093', 'shshdhdhhsgs shshdhdhdeh', 'test@gmail.com', '644664454848', 'USA', 'shhsgsgshshsgsg', 'hshshehshsge', '1234562', 'zgzbshsbsvshsvvssv', 'shshhwhsgdgdgsgsb', 'shshhshsgsgsgsvssgsvgd', 'hshshshevsgev', 64, 4, 48.00, 20.00, 68.00, NULL, NULL, 'in-progress', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(94, 'CAOI-000094', 'shshdhdhhsgs shshdhdhdeh', 'test@gmail.com', '644664454848', 'USA', 'shhsgsgshshsgsg', 'hshshehshsge', '1234562', 'zgzbshsbsvshsvvssv', 'shshhwhsgdgdgsgsb', 'shshhshsgsgsgsvssgsvgd', 'hshshshevsgev', 64, 5, 21.00, 10.00, 31.00, NULL, NULL, 'in-progress', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(95, 'CAOI-000095', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 43, 300.00, 15.00, 315.00, NULL, NULL, 'in-progress', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(96, 'CAOI-000096', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 6, 42.00, 30.00, 72.00, NULL, NULL, 'in-progress', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(97, 'CAOI-000097', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 31, 21.00, 0.00, 21.00, NULL, NULL, 'in-progress', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(98, 'CAOI-000098', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 4, 168.00, 20.00, 188.00, NULL, NULL, 'delivered', '2025-05-23 23:43:58', '2025-05-23 23:50:34'),
(99, 'CAOI-000099', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 23, 21.00, 30.00, 51.00, NULL, NULL, 'in-progress', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(100, 'CAOI-000100', 'gxsbdbs dhdhdbd', 'test@gmail.com', '342454848484', 'USA', 'vbvgg', 'ggvgggfff', '12345', 'ggfff', 'gsgsbsbsbsbsb', 'hzshhstsahhs', 'hdhshdbsbsbs', 64, 5, 21.00, 10.00, 31.00, NULL, NULL, 'in-progress', '2025-05-23 23:43:58', '2025-05-23 23:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(6, 5, 2, 2, 120.00, '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(9, 6, 8, 2, 21.00, '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(10, 7, 11, 2, 110.00, '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(11, 7, 13, 2, 21.00, '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(12, 8, 24, 2, 120.00, '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(13, 9, 22, 2, 21.00, '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(14, 9, 21, 2, 21.00, '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(15, 10, 21, 2, 21.00, '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(16, 10, 22, 2, 21.00, '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(17, 11, 24, 2, 120.00, '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(18, 12, 25, 2, 88.00, '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(19, 12, 26, 2, 720.00, '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(20, 13, 2, 2, 120.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(22, 13, 6, 2, 120.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(24, 14, 8, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(25, 14, 9, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(26, 14, 10, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(27, 15, 11, 2, 110.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(28, 15, 13, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(29, 15, 14, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(30, 15, 15, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(31, 16, 16, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(32, 16, 17, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(33, 16, 19, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(34, 16, 20, 2, 21.00, '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(35, 17, 20, 2, 21.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(36, 17, 21, 2, 21.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(37, 17, 22, 2, 21.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(38, 18, 24, 2, 120.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(39, 19, 25, 2, 88.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(40, 19, 26, 2, 720.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(41, 19, 28, 4, 22.00, '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(46, 21, 2, 1, 120.00, '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(47, 22, 8, 1, 21.00, '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(48, 23, 21, 1, 21.00, '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(49, 24, 14, 1, 21.00, '2025-04-17 12:58:43', '2025-04-17 12:58:43'),
(50, 25, 2, 1, 120.00, '2025-04-17 13:31:16', '2025-04-17 13:31:16'),
(53, 26, 8, 1, 21.00, '2025-04-17 13:31:16', '2025-04-17 13:31:16'),
(54, 26, 9, 1, 21.00, '2025-04-17 13:31:16', '2025-04-17 13:31:16'),
(55, 26, 24, 1, 120.00, '2025-04-17 13:31:16', '2025-04-17 13:31:16'),
(58, 29, 2, 1, 120.00, '2025-04-22 22:37:15', '2025-04-22 22:37:15'),
(59, 30, 2, 1, 120.00, '2025-04-23 17:03:39', '2025-04-23 17:03:39'),
(60, 31, 2, 1, 120.00, '2025-04-23 17:12:24', '2025-04-23 17:12:24'),
(61, 32, 2, 4, 120.00, '2025-04-24 03:47:49', '2025-04-24 03:47:49'),
(62, 33, 13, 3, 21.00, '2025-04-24 20:53:23', '2025-04-24 20:53:23'),
(63, 34, 2, 3, 120.00, '2025-04-30 22:12:35', '2025-04-30 22:12:35'),
(64, 35, 13, 1, 21.00, '2025-05-12 22:26:41', '2025-05-12 22:26:41'),
(65, 36, 2, 28, 120.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(67, 37, 28, 3, 22.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(68, 38, 26, 9, 720.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(69, 38, 25, 5, 88.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(70, 38, 24, 7, 120.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(71, 38, 24, 1, 120.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(72, 38, 22, 1, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(73, 39, 11, 1, 110.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(74, 39, 9, 3, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(75, 39, 8, 6, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(76, 39, 8, 4, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(77, 40, 15, 1, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(78, 40, 14, 1, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(79, 40, 16, 1, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(80, 40, 13, 4, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(81, 40, 13, 1, 21.00, '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(82, 41, 8, 1, 21.00, '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(83, 41, 9, 1, 21.00, '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(84, 42, 24, 2, 120.00, '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(85, 42, 22, 1, 21.00, '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(86, 43, 14, 2, 21.00, '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(87, 44, 2, 2, 48.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(88, 45, 8, 1, 21.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(89, 46, 24, 1, 120.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(90, 46, 22, 4, 21.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(91, 47, 13, 2, 21.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(92, 47, 14, 5, 21.00, '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(93, 48, 24, 1, 120.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(94, 48, 22, 1, 21.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(95, 48, 25, 1, 88.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(96, 49, 14, 1, 21.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(97, 49, 13, 1, 21.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(98, 50, 2, 1, 48.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(99, 51, 11, 1, 110.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(100, 51, 9, 1, 21.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(101, 52, 21, 1, 21.00, '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(102, 53, 2, 1, 48.00, '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(103, 54, 21, 1, 21.00, '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(104, 55, 9, 1, 21.00, '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(105, 56, 14, 1, 21.00, '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(106, 57, 22, 1, 21.00, '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(107, 58, 24, 1, 120.00, '2025-05-15 21:17:33', '2025-05-15 21:17:33'),
(108, 58, 22, 1, 21.00, '2025-05-15 21:17:33', '2025-05-15 21:17:33'),
(109, 59, 9, 1, 21.00, '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(110, 60, 25, 1, 88.00, '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(111, 61, 21, 1, 21.00, '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(112, 62, 11, 1, 110.00, '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(113, 63, 31, 4, 28.00, '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(114, 64, 30, 4, 300.00, '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(115, 65, 28, 6, 22.00, '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(116, 66, 30, 6, 300.00, '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(117, 67, 24, 1, 120.00, '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(118, 68, 13, 1, 21.00, '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(119, 69, 22, 1, 21.00, '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(120, 70, 8, 1, 21.00, '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(121, 70, 9, 1, 21.00, '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(122, 71, 31, 2, 28.00, '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(123, 71, 28, 2, 22.00, '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(124, 72, 30, 2, 300.00, '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(125, 73, 2, 1, 48.00, '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(126, 74, 24, 1, 120.00, '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(127, 74, 22, 1, 21.00, '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(128, 75, 28, 2, 22.00, '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(129, 75, 31, 2, 28.00, '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(130, 76, 30, 2, 300.00, '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(131, 77, 2, 1, 48.00, '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(132, 78, 24, 1, 120.00, '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(133, 78, 22, 2, 21.00, '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(134, 79, 9, 1, 21.00, '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(135, 80, 11, 1, 110.00, '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(136, 81, 14, 1, 21.00, '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(137, 82, 14, 1, 21.00, '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(138, 82, 13, 2, 21.00, '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(139, 83, 21, 2, 21.00, '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(140, 84, 9, 3, 21.00, '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(141, 85, 8, 11, 21.00, '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(142, 85, 9, 4, 21.00, '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(143, 86, 2, 7, 48.00, '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(144, 87, 11, 2, 110.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(145, 87, 9, 1, 21.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(146, 88, 2, 1, 48.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(147, 89, 22, 1, 21.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(148, 89, 25, 1, 88.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(149, 90, 13, 1, 21.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(150, 90, 14, 1, 21.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(151, 91, 21, 1, 21.00, '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(152, 92, 22, 1, 21.00, '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(153, 93, 2, 1, 48.00, '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(154, 94, 9, 1, 21.00, '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(155, 95, 30, 1, 300.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(156, 96, 14, 1, 21.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(157, 96, 13, 1, 21.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(158, 97, 21, 1, 21.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(159, 98, 2, 1, 48.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(160, 98, 6, 1, 120.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(161, 99, 22, 1, 21.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(162, 100, 9, 1, 21.00, '2025-05-23 23:43:58', '2025-05-23 23:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `vendor_pay_status` enum('paid','pending') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `vendor_id`, `booking_id`, `amount`, `status`, `payment_method`, `transaction_id`, `vendor_pay_status`, `paid_at`, `created_at`, `updated_at`) VALUES
(41, 49, 7, 4, NULL, 250.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'paid', '2025-03-07 14:24:54', '2025-03-07 14:24:54', '2025-04-22 13:14:19'),
(42, 49, 8, 5, NULL, 220.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-07 14:24:54', '2025-03-07 14:24:54', '2025-03-07 14:24:54'),
(43, 49, 9, 6, NULL, 240.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-07 14:24:54', '2025-03-07 14:24:54', '2025-03-07 14:24:54'),
(48, 49, 5, 4, NULL, 520.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'paid', '2025-03-12 16:41:14', '2025-03-12 16:41:14', '2025-04-22 13:26:19'),
(49, 49, 6, 5, NULL, 177.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-12 16:41:14', '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(50, 49, 7, 6, NULL, 302.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-12 16:41:14', '2025-03-12 16:41:14', '2025-03-12 16:41:14'),
(51, 49, 8, 5, NULL, 260.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-12 17:21:17', '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(52, 49, 9, 7, NULL, 124.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-12 17:21:17', '2025-03-12 17:21:17', '2025-03-12 17:21:17'),
(54, 49, 10, 7, NULL, 124.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:01:14', '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(55, 49, 11, 5, NULL, 260.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:01:14', '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(56, 49, 12, 4, NULL, 2525.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:01:14', '2025-03-17 17:01:14', '2025-03-17 17:01:14'),
(57, 49, 13, 4, NULL, 1020.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:04:05', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(58, 49, 14, 5, NULL, 301.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:04:05', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(59, 49, 15, 6, NULL, 426.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:04:05', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(60, 49, 16, 7, NULL, 248.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-03-17 17:04:05', '2025-03-17 17:04:05', '2025-03-17 17:04:05'),
(65, 49, NULL, 4, 1, 120.00, 'completed', NULL, 'aaaaaaaaaaaaaaaaaaaa', 'paid', '2025-03-19 14:55:18', '2025-03-19 14:55:18', '2025-04-22 14:49:38'),
(66, 49, NULL, 6, 2, 120.00, 'completed', NULL, 'aaaaaaaaaaaaaaaaaaaa', 'pending', '2025-03-19 14:55:42', '2025-03-19 14:55:42', '2025-03-19 14:55:42'),
(67, 49, 17, 7, NULL, 186.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-04-07 17:43:52', '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(68, 49, 18, 5, NULL, 260.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-04-07 17:43:52', '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(69, 49, 19, 4, NULL, 2835.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-04-07 17:43:52', '2025-04-07 17:43:52', '2025-04-07 17:43:52'),
(71, 64, NULL, 4, 5, 120.00, 'completed', NULL, 'cs_test_a1JvBi3j1mNqzybqNsKlfYbskg8P8kFxMQ1nhlf0qv9Y1EWlOdiVZu0HWU', 'pending', '2025-04-16 13:32:09', '2025-04-16 13:32:09', '2025-04-16 13:32:09'),
(72, 64, NULL, 4, 6, 120.00, 'completed', NULL, 'cs_test_a19NVsMRCEwWVAH2NqcXT2ROzuvHcQwe5xBT7J6r012GKeiCwzmpZk5XDj', 'pending', '2025-04-16 13:55:45', '2025-04-16 13:55:45', '2025-04-16 13:55:45'),
(73, 64, NULL, 4, 7, 120.00, 'completed', NULL, 'cs_test_a1DJiQkc12Uxuo1a0FROrekUUSfxsOOzIWRlIhuF6G5M0LlQ2kJDAezluB', 'pending', '2025-04-16 13:57:56', '2025-04-16 13:57:56', '2025-04-16 13:57:56'),
(74, 64, NULL, 4, 8, 120.00, 'completed', NULL, 'cs_test_a1AQaixEUXyiD4nMGvVJEZ9QFrw6dKmSdmZKtv5vjEJgSRDYD9UwqSH52n', 'pending', '2025-04-16 13:59:11', '2025-04-16 13:59:11', '2025-04-16 13:59:11'),
(75, 64, NULL, 4, 9, 120.00, 'completed', NULL, 'cs_test_a197TLPoVgeNb6lNswnJasWtzQRcOU8UWBfwRySkTciVn95z3qPaCq3uiV', 'pending', '2025-04-16 14:01:06', '2025-04-16 14:01:06', '2025-04-16 14:01:06'),
(76, 64, NULL, 6, 10, 182.00, 'completed', NULL, 'cs_test_a1CauPDMZBI2KruMo5z8BJU3LugLrUzDrmvk8x9yaHugeGYZeH7S4cFK1B', 'pending', '2025-04-16 15:51:06', '2025-04-16 15:51:06', '2025-04-16 15:51:06'),
(77, 64, 28, 4, NULL, 64.00, 'paid', 'online', 'pi_3RGjqJEVpIhD4Irw0mzJmvDw', 'pending', '2025-04-22 11:39:49', '2025-04-22 11:39:49', '2025-04-22 11:39:49'),
(78, 64, 29, 4, NULL, 140.00, 'paid', 'online', 'pi_3RGpREEVpIhD4Irw1C1bbLyh', 'pending', '2025-04-22 22:37:15', '2025-04-22 22:37:15', '2025-04-22 22:37:15'),
(79, 64, NULL, 6, 11, 182.00, 'completed', NULL, 'cs_test_a1sagBTNBI8joo6TgxKB11jaFY8WEPogMzw6ELnkEHKLK3rLen80Rez0LR', 'pending', '2025-04-23 17:02:47', '2025-04-23 17:02:47', '2025-04-23 17:02:47'),
(80, 64, 30, 4, NULL, 140.00, 'paid', 'online', 'pi_3RH6hwEVpIhD4Irw0kNgjiMx', 'pending', '2025-04-23 17:03:39', '2025-04-23 17:03:39', '2025-04-23 17:03:39'),
(81, 64, NULL, 5, 12, 120.00, 'completed', NULL, 'cs_test_a1m4RTRWPnkYpDrQINXme0BGwCFQ2ucgKfl6hftKRmjjlVodKinXFqu7MV', 'pending', '2025-04-23 17:04:12', '2025-04-23 17:04:12', '2025-04-23 17:04:12'),
(82, 70, 31, 4, NULL, 140.00, 'paid', 'online', 'pi_3RH6qPEVpIhD4Irw1H8cblb2', 'pending', '2025-04-23 17:12:24', '2025-04-23 17:12:24', '2025-04-23 17:12:24'),
(83, 70, NULL, 4, 13, 787.00, 'completed', NULL, 'cs_test_a1QRpFTNnWSRhPqVzkywIQaSaGXF4AmODQ6C2UaREaoZ25gW1S3L3oC9Hl', 'pending', '2025-04-23 17:14:27', '2025-04-23 17:14:27', '2025-04-23 17:14:27'),
(84, 64, 32, 4, NULL, 500.00, 'paid', 'online', 'pi_3RHGlJEVpIhD4Irw0gYZ7oBs', 'pending', '2025-04-24 03:47:49', '2025-04-24 03:47:49', '2025-04-24 03:47:49'),
(85, 64, NULL, 4, 14, 787.00, 'completed', NULL, 'cs_test_a135CppwUkE0GhMEucI0fr2ORRsUxGMsWiKiJzv3pApYAgKGPxnCmVaH8P', 'pending', '2025-04-24 20:50:17', '2025-04-24 20:50:17', '2025-04-24 20:50:17'),
(86, 64, 33, 6, NULL, 78.00, 'paid', 'online', 'pi_3RHWloEVpIhD4Irw0KeUvAWU', 'pending', '2025-04-24 20:53:23', '2025-04-24 20:53:23', '2025-04-24 20:53:23'),
(87, 64, 34, 4, NULL, 380.00, 'paid', 'online', 'pi_3RJirkEVpIhD4Irw1xAhOqSQ', 'pending', '2025-04-30 22:12:35', '2025-04-30 22:12:35', '2025-04-30 22:12:35'),
(88, 64, NULL, 4, 15, 20.00, 'completed', NULL, 'pi_3RMFaTEVpIhD4Irw1NAKVFcV', 'pending', '2025-05-07 21:33:29', '2025-05-07 21:33:29', '2025-05-07 21:33:29'),
(89, 49, NULL, 6, 16, 120.00, 'completed', NULL, 'aaaaaaaaaaaaaaaaaaaa', 'pending', '2025-05-07 21:34:20', '2025-05-07 21:34:20', '2025-05-07 21:34:20'),
(90, 49, 35, 6, NULL, 41.00, 'paid', 'online', 'asdgsdfbskdlfghghjgfk', 'pending', '2025-05-12 22:26:41', '2025-05-12 22:26:41', '2025-05-12 22:26:41'),
(91, 64, 36, 4, NULL, 4419.00, 'paid', 'online', 'txn_1747089407416', 'pending', '2025-05-12 22:36:48', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(92, 64, 37, 24, NULL, 288.00, 'paid', 'online', 'txn_1747089407416', 'pending', '2025-05-12 22:36:48', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(93, 64, 38, 23, NULL, 8870.00, 'paid', 'online', 'txn_1747089407416', 'pending', '2025-05-12 22:36:48', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(94, 64, 39, 5, NULL, 463.00, 'paid', 'online', 'txn_1747089407416', 'pending', '2025-05-12 22:36:48', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(95, 64, 40, 6, NULL, 268.00, 'paid', 'online', 'txn_1747089407416', 'pending', '2025-05-12 22:36:48', '2025-05-12 22:36:48', '2025-05-12 22:36:48'),
(96, 64, 41, 5, NULL, 82.00, 'paid', 'online', 'txn_1747091534602', 'pending', '2025-05-12 23:15:09', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(97, 64, 42, 23, NULL, 301.00, 'paid', 'online', 'txn_1747091534602', 'pending', '2025-05-12 23:15:09', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(98, 64, 43, 6, NULL, 62.00, 'paid', 'online', 'txn_1747091534602', 'pending', '2025-05-12 23:15:09', '2025-05-12 23:15:09', '2025-05-12 23:15:09'),
(99, 49, NULL, 43, 22, 200.00, 'completed', NULL, 'pi_3RONa0EVpIhD4Irw0Mkc2u4k', 'pending', '2025-05-13 18:32:23', '2025-05-13 18:32:23', '2025-05-13 18:32:23'),
(100, 64, NULL, 43, 23, 200.00, 'completed', NULL, 'pi_3RONfdEVpIhD4Irw1mzWE3xB', 'pending', '2025-05-13 18:35:38', '2025-05-13 18:35:38', '2025-05-13 18:35:38'),
(101, 64, 44, 4, NULL, 126.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:09:41', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(102, 64, 45, 5, NULL, 41.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:09:41', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(103, 64, 46, 23, NULL, 244.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:09:41', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(104, 64, 47, 6, NULL, 187.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:09:41', '2025-05-15 21:09:41', '2025-05-15 21:09:41'),
(105, 64, 48, 23, NULL, 517.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:15:06', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(106, 64, 49, 6, NULL, 82.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:15:06', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(107, 64, 50, 4, NULL, 78.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:15:06', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(108, 64, 51, 5, NULL, 171.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:15:06', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(109, 64, 52, 31, NULL, 41.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:15:06', '2025-05-15 21:15:06', '2025-05-15 21:15:06'),
(110, 64, 53, 4, NULL, 78.00, 'paid', 'online', NULL, 'pending', '2025-05-15 21:16:13', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(111, 64, 54, 31, NULL, 41.00, 'paid', 'online', NULL, 'pending', '2025-05-15 21:16:13', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(112, 64, 55, 5, NULL, 41.00, 'paid', 'online', NULL, 'pending', '2025-05-15 21:16:13', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(113, 64, 56, 6, NULL, 41.00, 'paid', 'online', NULL, 'pending', '2025-05-15 21:16:13', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(114, 64, 57, 23, NULL, 41.00, 'paid', 'online', NULL, 'pending', '2025-05-15 21:16:13', '2025-05-15 21:16:13', '2025-05-15 21:16:13'),
(115, 64, 58, 23, NULL, 181.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:17:33', '2025-05-15 21:17:33', '2025-05-15 21:17:33'),
(116, 64, 59, 5, NULL, 41.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:18:05', '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(117, 64, 60, 23, NULL, 336.00, 'paid', 'online', 'asdgsdfbskdlfggfk', 'pending', '2025-05-15 21:18:05', '2025-05-15 21:18:05', '2025-05-15 21:18:05'),
(118, 64, 61, 31, NULL, 41.00, 'paid', 'online', 'txn_1747344076928', 'pending', '2025-05-15 21:21:38', '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(119, 64, 62, 5, NULL, 130.00, 'paid', 'online', 'txn_1747344076928', 'pending', '2025-05-15 21:21:38', '2025-05-15 21:21:38', '2025-05-15 21:21:38'),
(120, 49, 63, 24, NULL, 142.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:05:34', '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(121, 49, 64, 43, NULL, 1215.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:05:34', '2025-05-17 00:05:34', '2025-05-17 00:05:34'),
(122, 49, 65, 24, NULL, 162.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:15:38', '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(123, 49, 66, 43, NULL, 1815.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:15:38', '2025-05-17 00:15:38', '2025-05-17 00:15:38'),
(124, 64, 67, 23, NULL, 150.00, 'paid', 'online', 'txn_1747441248822', 'pending', '2025-05-17 00:21:31', '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(125, 64, 68, 6, NULL, 51.00, 'paid', 'online', 'txn_1747441248822', 'pending', '2025-05-17 00:21:31', '2025-05-17 00:21:31', '2025-05-17 00:21:31'),
(126, 64, 69, 23, NULL, 51.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:24:25', '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(127, 64, 70, 5, NULL, 52.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-17 00:24:25', '2025-05-17 00:24:25', '2025-05-17 00:24:25'),
(128, 64, 71, 24, NULL, 130.00, 'paid', 'online', 'txn_1747441714569', 'pending', '2025-05-17 00:29:03', '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(129, 64, 72, 43, NULL, 615.00, 'paid', 'online', 'txn_1747441714569', 'pending', '2025-05-17 00:29:03', '2025-05-17 00:29:03', '2025-05-17 00:29:03'),
(130, 64, 73, 4, NULL, 68.00, 'paid', 'online', 'txn_1747691776361', 'pending', '2025-05-19 21:56:39', '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(131, 64, 74, 23, NULL, 171.00, 'paid', 'online', 'txn_1747691776361', 'pending', '2025-05-19 21:56:39', '2025-05-19 21:56:39', '2025-05-19 21:56:39'),
(132, 64, 75, 24, NULL, 130.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-20 17:25:05', '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(133, 64, 76, 43, NULL, 615.00, 'paid', 'online', 'TXN123456', 'pending', '2025-05-20 17:25:05', '2025-05-20 17:25:05', '2025-05-20 17:25:05'),
(134, 64, NULL, 4, 24, 88.00, 'completed', NULL, 'pi_3RQvOxEVpIhD4Irw0EXK6nyu', 'pending', '2025-05-20 19:07:02', '2025-05-20 19:07:02', '2025-05-20 19:07:02'),
(135, 64, NULL, 4, 25, 88.00, 'completed', NULL, 'pi_3RQvWYEVpIhD4Irw1jCfFYU1', 'pending', '2025-05-20 19:08:55', '2025-05-20 19:08:55', '2025-05-20 19:08:55'),
(136, 64, NULL, 4, 26, 88.00, 'completed', NULL, 'pi_3RQvaKEVpIhD4Irw1jSZX74e', 'pending', '2025-05-20 19:12:37', '2025-05-20 19:12:37', '2025-05-20 19:12:37'),
(137, 64, NULL, 4, 27, 88.00, 'completed', NULL, 'pi_3RQvbWEVpIhD4Irw1nF0YrDk', 'pending', '2025-05-20 19:13:51', '2025-05-20 19:13:51', '2025-05-20 19:13:51'),
(138, 64, 77, 4, NULL, 68.00, 'paid', 'online', 'txn_1747779898585', 'pending', '2025-05-20 22:25:25', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(139, 64, 78, 23, NULL, 192.00, 'paid', 'online', 'txn_1747779898585', 'pending', '2025-05-20 22:25:25', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(140, 64, 79, 5, NULL, 31.00, 'paid', 'online', 'txn_1747779898585', 'pending', '2025-05-20 22:25:25', '2025-05-20 22:25:25', '2025-05-20 22:25:25'),
(141, 64, 80, 5, NULL, 120.00, 'paid', 'online', 'txn_1747784872316', 'pending', '2025-05-20 23:48:14', '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(142, 64, 81, 6, NULL, 51.00, 'paid', 'online', 'txn_1747784872316', 'pending', '2025-05-20 23:48:14', '2025-05-20 23:48:14', '2025-05-20 23:48:14'),
(143, 64, 82, 6, NULL, 93.00, 'paid', 'online', 'txn_1747788589493', 'pending', '2025-05-21 00:50:18', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(144, 64, 83, 31, NULL, 42.00, 'paid', 'online', 'txn_1747788589493', 'pending', '2025-05-21 00:50:18', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(145, 64, 84, 5, NULL, 73.00, 'paid', 'online', 'txn_1747788589493', 'pending', '2025-05-21 00:50:18', '2025-05-21 00:50:18', '2025-05-21 00:50:18'),
(146, 64, NULL, 4, 28, 80.00, 'completed', NULL, 'pi_3RRH34EVpIhD4Irw1wCgKEDZ', 'pending', '2025-05-21 18:07:50', '2025-05-21 18:07:50', '2025-05-21 18:07:50'),
(147, 64, NULL, 4, 29, 88.00, 'completed', NULL, 'pi_3RRH9REVpIhD4Irw0cVg2PzH', 'pending', '2025-05-21 18:14:25', '2025-05-21 18:14:25', '2025-05-21 18:14:25'),
(148, 64, NULL, 4, 30, 80.00, 'completed', NULL, 'pi_3RRHQ2EVpIhD4Irw1DneUMmF', 'pending', '2025-05-21 18:31:31', '2025-05-21 18:31:31', '2025-05-21 18:31:31'),
(149, 64, 85, 5, NULL, 325.00, 'paid', 'online', 'txn_1747859150895', 'pending', '2025-05-21 20:26:12', '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(150, 64, 86, 4, NULL, 356.00, 'paid', 'online', 'txn_1747859150895', 'pending', '2025-05-21 20:26:12', '2025-05-21 20:26:12', '2025-05-21 20:26:12'),
(151, 64, 87, 5, NULL, 251.00, 'paid', 'online', 'txn_1747860730109', 'pending', '2025-05-21 20:52:27', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(152, 64, 88, 4, NULL, 68.00, 'paid', 'online', 'txn_1747860730109', 'pending', '2025-05-21 20:52:27', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(153, 64, 89, 23, NULL, 139.00, 'paid', 'online', 'txn_1747860730109', 'pending', '2025-05-21 20:52:27', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(154, 64, 90, 6, NULL, 72.00, 'paid', 'online', 'txn_1747860730109', 'pending', '2025-05-21 20:52:27', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(155, 64, 91, 31, NULL, 21.00, 'paid', 'online', 'txn_1747860730109', 'pending', '2025-05-21 20:52:27', '2025-05-21 20:52:27', '2025-05-21 20:52:27'),
(156, 64, 92, 23, NULL, 51.00, 'paid', 'online', 'txn_1747862387733', 'pending', '2025-05-21 21:20:10', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(157, 64, 93, 4, NULL, 68.00, 'paid', 'online', 'txn_1747862387733', 'pending', '2025-05-21 21:20:10', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(158, 64, 94, 5, NULL, 31.00, 'paid', 'online', 'txn_1747862387733', 'pending', '2025-05-21 21:20:10', '2025-05-21 21:20:10', '2025-05-21 21:20:10'),
(159, 88, NULL, 5, 31, 120.00, 'completed', NULL, 'pi_3RRKhbEVpIhD4Irw1HTJPkg6', 'pending', '2025-05-21 22:01:48', '2025-05-21 22:01:48', '2025-05-21 22:01:48'),
(160, 64, NULL, 4, 32, 1000.00, 'completed', NULL, 'pi_3RRia6EVpIhD4Irw1aSBS4TL', 'pending', '2025-05-22 23:31:39', '2025-05-22 23:31:39', '2025-05-22 23:31:39'),
(161, 64, 95, 43, NULL, 315.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(162, 64, 96, 6, NULL, 72.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(163, 64, 97, 31, NULL, 21.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(164, 64, 98, 4, NULL, 188.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(165, 64, 99, 23, NULL, 51.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(166, 64, 100, 5, NULL, 31.00, 'paid', 'online', 'txn_1748043821595', 'pending', '2025-05-23 23:43:58', '2025-05-23 23:43:58', '2025-05-23 23:43:58'),
(167, 64, NULL, 4, 33, 1000.00, 'completed', NULL, 'pi_3RS5c8EVpIhD4Irw1UeC3CEL', 'pending', '2025-05-24 00:07:15', '2025-05-24 00:07:15', '2025-05-24 00:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `details`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'banner-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:21:54', '2025-03-19 17:21:54'),
(2, 'user-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:22:13', '2025-03-19 17:22:13'),
(3, 'roles-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:22:22', '2025-03-19 17:22:22'),
(4, 'permission-managment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:22:40', '2025-03-19 17:22:40'),
(5, 'product-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:22:56', '2025-03-19 17:22:56'),
(6, 'services-managment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:23:59', '2025-03-19 17:23:59'),
(7, 'requested-vendor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:24:42', '2025-03-19 17:24:42'),
(8, 'blocked-vendors', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:24:56', '2025-03-19 17:24:56'),
(9, 'order-managment', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:08', '2025-03-19 17:25:08'),
(10, 'booking-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:20', '2025-03-19 17:25:20'),
(11, 'vendor-reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32'),
(12, 'inquiries-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32'),
(13, 'notifications', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32'),
(14, 'content-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32'),
(15, 'general-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32'),
(16, 'payment-management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'web', '2025-03-19 17:25:32', '2025-03-19 17:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 17, 'auth_token', '4eacbaeaf8a4e262bf27fae62c6cc2097a0f8fc8253ad74bfa75271712647533', '[\"*\"]', '2025-02-26 13:10:30', NULL, '2025-02-26 12:35:32', '2025-02-26 13:10:30'),
(2, 'App\\Models\\User', 13, 'auth_token', '2f9e488a38d1c0bc2cbbac74df8c2869c509029ef5588235e208979a95d666fc', '[\"*\"]', '2025-02-26 13:29:24', NULL, '2025-02-26 13:19:48', '2025-02-26 13:29:24'),
(3, 'App\\Models\\User', 18, 'auth_token', '2a5af371940e3966b4361fafa2d83f2ff9b86b9e890e12a651349c81c876c6f8', '[\"*\"]', '2025-02-26 13:47:14', NULL, '2025-02-26 13:28:20', '2025-02-26 13:47:14'),
(4, 'App\\Models\\User', 17, 'auth_token', '4a01c0ee2a6d7a9c01d7b00968dd785b921e1c36331041ca2e6c2fed4fbe3267', '[\"*\"]', '2025-02-26 13:37:54', NULL, '2025-02-26 13:30:10', '2025-02-26 13:37:54'),
(5, 'App\\Models\\User', 13, 'auth_token', '6c70694fbd65fe4d0d4b3f05f3ae1492b34ce7d6838e8bc120c0e74943026c5d', '[\"*\"]', '2025-05-19 22:54:49', NULL, '2025-02-26 13:38:08', '2025-05-19 22:54:49'),
(6, 'App\\Models\\User', 17, 'auth_token', '00bc14a9a2728bdba2be09682be17e63bf64d2239288edead69582e5b2fcc005', '[\"*\"]', '2025-02-26 14:10:29', NULL, '2025-02-26 13:46:38', '2025-02-26 14:10:29'),
(7, 'App\\Models\\User', 13, 'auth_token', 'e56efe15a94644bef42fb9432d37f33603d2725ad88cb39b7bf6dbe14797dfa4', '[\"*\"]', '2025-02-26 13:48:52', NULL, '2025-02-26 13:48:25', '2025-02-26 13:48:52'),
(8, 'App\\Models\\User', 14, 'auth_token', 'f103e287a8d202088c44a1cde8628703a37bd6249b391377b7263e9e8fab97c3', '[\"*\"]', '2025-05-14 17:46:46', NULL, '2025-02-26 13:50:24', '2025-05-14 17:46:46'),
(9, 'App\\Models\\User', 14, 'auth_token', '5fe71f908de35ba71da56012e1323b924ce7790dfb6bc11b150a5280de6f0450', '[\"*\"]', NULL, NULL, '2025-02-26 15:48:44', '2025-02-26 15:48:44'),
(10, 'App\\Models\\User', 14, 'auth_token', '692cc918dbd1c198127c30aa83b50b7ab257406058e2eed7f4ef8f8c185635aa', '[\"*\"]', '2025-05-13 23:16:36', NULL, '2025-02-27 13:24:41', '2025-05-13 23:16:36'),
(11, 'App\\Models\\User', 17, 'auth_token', 'c52bf023577ac5bcd95f42dc3e812a43c586e2205270aeb10428c04b3570050d', '[\"*\"]', NULL, NULL, '2025-02-28 12:09:11', '2025-02-28 12:09:11'),
(12, 'App\\Models\\User', 14, 'auth_token', 'b78ec35b60bd618913f989bcf7831d2dd92ff117c54aea5d11b65fdaa5ae51fc', '[\"*\"]', '2025-05-08 16:49:10', NULL, '2025-02-28 12:18:31', '2025-05-08 16:49:10'),
(13, 'App\\Models\\User', 14, 'auth_token', '675d1808522aa1d7d1961ed750ea5ae157a3ca839b6182a993eb221969a4f02a', '[\"*\"]', NULL, NULL, '2025-02-28 13:26:04', '2025-02-28 13:26:04'),
(14, 'App\\Models\\User', 17, 'auth_token', '8d1da8f9a25117a4a436dd16f253a2f5fc2296785826bd11257aff684ca14df3', '[\"*\"]', '2025-02-28 16:53:03', NULL, '2025-02-28 13:26:06', '2025-02-28 16:53:03'),
(15, 'App\\Models\\User', 17, 'auth_token', '738484d7a70f167a9994c9536373d3efe764f677bbf651843b1f55f048e08faf', '[\"*\"]', '2025-02-28 16:08:51', NULL, '2025-02-28 15:42:18', '2025-02-28 16:08:51'),
(16, 'App\\Models\\User', 17, 'auth_token', 'e2137c8bf11ef00d9746fa74ae5e8f1e4a0493329106b49aed77f869dd80e540', '[\"*\"]', '2025-03-03 13:13:57', NULL, '2025-02-28 16:09:11', '2025-03-03 13:13:57'),
(17, 'App\\Models\\User', 17, 'auth_token', 'd0b9f846323f72f1f1a2f9b42796f4bafadec9a9c3e1d721846745d7474c375a', '[\"*\"]', NULL, NULL, '2025-03-03 11:14:01', '2025-03-03 11:14:01'),
(18, 'App\\Models\\User', 14, 'auth_token', '061c2e362881d193d79d3875ea62c833c1e0cb653b8ea2dc841951c642f661c4', '[\"*\"]', '2025-05-07 21:07:09', NULL, '2025-03-03 13:12:47', '2025-05-07 21:07:09'),
(19, 'App\\Models\\User', 14, 'auth_token', 'dfdc481657ecc65bf7e35dfc40f36a9412b0717571593b1f56aeb4464cfeb70d', '[\"*\"]', NULL, NULL, '2025-03-03 13:19:13', '2025-03-03 13:19:13'),
(20, 'App\\Models\\User', 17, 'auth_token', '35b3b272d8e7deaf57f770061e154cf9c4aad9fac3cf551758692dc3ba4ae19f', '[\"*\"]', '2025-03-04 13:05:50', NULL, '2025-03-03 13:20:26', '2025-03-04 13:05:50'),
(21, 'App\\Models\\User', 17, 'auth_token', '08d5c94415c78e769356175e026a7b1ac8e1c4de93a1b9a4449e5cffb337fac9', '[\"*\"]', '2025-03-04 13:26:28', NULL, '2025-03-04 12:21:39', '2025-03-04 13:26:28'),
(22, 'App\\Models\\User', 14, 'auth_token', 'dec510afbfc72a2c0cbb0024b8790ee215927f5d22a7fc19e2357011433a10c4', '[\"*\"]', '2025-03-04 13:32:37', NULL, '2025-03-04 13:13:29', '2025-03-04 13:32:37'),
(23, 'App\\Models\\User', 49, 'auth_token', 'be7225ca432cedab823c730951d71417e9b5d71c8168ad027f4465c50647ca01', '[\"*\"]', '2025-03-07 14:28:07', NULL, '2025-03-07 12:06:54', '2025-03-07 14:28:07'),
(24, 'App\\Models\\User', 14, 'auth_token', '2dda85158a4538c18adf069e8ae14aa294ac4cc0ddfa6b2d3c64378dfd50b03e', '[\"*\"]', '2025-05-07 00:08:42', NULL, '2025-03-07 14:00:40', '2025-05-07 00:08:42'),
(25, 'App\\Models\\User', 49, 'auth_token', '7c419d6a5d97919b13a606fb733f0d50baa8294cacaac01a0eb01fe51207c073', '[\"*\"]', '2025-05-12 21:15:54', NULL, '2025-03-07 14:09:31', '2025-05-12 21:15:54'),
(26, 'App\\Models\\User', 49, 'auth_token', 'a7d103d41cec71a3acd09bad2de7d12df141d4d6cf7259e0245a6cbbaa5a606a', '[\"*\"]', '2025-03-12 17:21:17', NULL, '2025-03-12 16:33:40', '2025-03-12 17:21:17'),
(27, 'App\\Models\\User', 13, 'auth_token', '8bb841cd71ae709b71a4bde8866defa54ea0e6885ef301c6cde4b740000c0a4f', '[\"*\"]', '2025-03-12 17:18:14', NULL, '2025-03-12 17:02:01', '2025-03-12 17:18:14'),
(28, 'App\\Models\\User', 14, 'auth_token', '862aac0fb5c4cd279645199076f34288cea79b0bfe58061cd6af320021ff09e6', '[\"*\"]', '2025-05-19 22:55:16', NULL, '2025-03-12 17:19:57', '2025-05-19 22:55:16'),
(29, 'App\\Models\\User', 15, 'auth_token', 'b7a2cad6bbd13145133d1ed4b6f3e35a6039d6c296fee1a28241260831fbc457', '[\"*\"]', '2025-03-12 17:22:52', NULL, '2025-03-12 17:21:51', '2025-03-12 17:22:52'),
(30, 'App\\Models\\User', 15, 'auth_token', 'bae2d89468c5ee6fcd27882939cb7ddedcb14c5ba8470e8c9f83e6da5ea00467', '[\"*\"]', '2025-03-17 15:21:26', NULL, '2025-03-17 15:20:15', '2025-03-17 15:21:26'),
(31, 'App\\Models\\User', 49, 'auth_token', 'fd9cadbe2753df43061886fb35a3a0e77a08b2ccbb8197c00f5e8b8c8973a105', '[\"*\"]', '2025-03-17 17:04:05', NULL, '2025-03-17 17:00:21', '2025-03-17 17:04:05'),
(32, 'App\\Models\\User', 49, 'auth_token', 'e1097be96476d5d974628513a30e3d853e66341eef0d90730f0b8aa252b601e2', '[\"*\"]', '2025-05-20 22:08:39', NULL, '2025-03-18 16:57:45', '2025-05-20 22:08:39'),
(33, 'App\\Models\\User', 49, 'auth_token', '72cc56882cb953f1ceb60da36df9d81b75841e896f20f0869b4668cd8ff85ac7', '[\"*\"]', '2025-05-19 18:45:31', NULL, '2025-03-19 14:49:06', '2025-05-19 18:45:31'),
(34, 'App\\Models\\User', 49, 'auth_token', '1ddeda0bfa9e65b6f4e23b697c8a15de92e6c6d0d74952c81a250b667feb4ef2', '[\"*\"]', '2025-05-20 21:47:47', NULL, '2025-03-19 16:56:44', '2025-05-20 21:47:47'),
(35, 'App\\Models\\User', 49, 'auth_token', 'cb62dd973542e36bb14c0dcb3a1d9382895fb7e9f4d42ac1810c1d60c1dc495c', '[\"*\"]', NULL, NULL, '2025-03-27 15:40:56', '2025-03-27 15:40:56'),
(36, 'App\\Models\\User', 49, 'auth_token', 'f8af05294c47bc53f01ab2a793463f2fbf9e3e7c050fbdd1d9761151dfbf65b1', '[\"*\"]', '2025-03-28 12:59:34', NULL, '2025-03-27 15:41:07', '2025-03-28 12:59:34'),
(37, 'App\\Models\\User', 49, 'auth_token', '592e3cc19b63a71e9b26672372d2aa8607e664e6043da751bde33895589a11d4', '[\"*\"]', '2025-03-28 14:36:14', NULL, '2025-03-28 12:59:44', '2025-03-28 14:36:14'),
(38, 'App\\Models\\User', 49, 'auth_token', '0312f6074e7c8c470eb75eb926b39e41b841977a74b24337e59cfb8a9619733b', '[\"*\"]', '2025-04-03 18:16:27', NULL, '2025-04-03 13:47:40', '2025-04-03 18:16:27'),
(39, 'App\\Models\\User', 49, 'auth_token', 'a639af2c44121cc21d326d7bc70717a6ebf8469b77eda7b00ab8e7adea0144a0', '[\"*\"]', '2025-05-07 21:00:57', NULL, '2025-04-04 16:37:36', '2025-05-07 21:00:57'),
(40, 'App\\Models\\User', 49, 'auth_token', 'c5d5fca2f31eadcfd499d58699a45c6ca5fa5d4df48df4b2daf2eed03314b253', '[\"*\"]', NULL, NULL, '2025-04-07 13:00:49', '2025-04-07 13:00:49'),
(41, 'App\\Models\\User', 49, 'auth_token', 'e6454adabc8a1025e327f810b5668a9169578895e3eaeb8634ebc48a5defda3a', '[\"*\"]', '2025-05-13 22:27:15', NULL, '2025-04-07 17:42:48', '2025-05-13 22:27:15'),
(42, 'App\\Models\\User', 49, 'auth_token', 'dccfe86845e8ec489558a989191ce3bb2cae2f1a5a4063f197460e0e5b5e88d6', '[\"*\"]', NULL, NULL, '2025-04-24 16:36:36', '2025-04-24 16:36:36'),
(43, 'App\\Models\\User', 49, 'auth_token', '5d2adfc61ff331cc8bfd38cee2c6f04c913d444c9291c7c9751dd4569746b994', '[\"*\"]', NULL, NULL, '2025-04-24 16:38:11', '2025-04-24 16:38:11'),
(44, 'App\\Models\\User', 49, 'auth_token', '003a2149c343f3f87273b4e3eaa39a20aad0d8d582da4123b321b6a445a23a7e', '[\"*\"]', NULL, NULL, '2025-04-24 16:38:35', '2025-04-24 16:38:35'),
(45, 'App\\Models\\User', 49, 'auth_token', 'fa4cf761fe07ee0c54c8b7f5916a0cd9fa89883919b636ba8ef57b47d05da728', '[\"*\"]', '2025-04-24 20:09:08', NULL, '2025-04-24 16:39:58', '2025-04-24 20:09:08'),
(46, 'App\\Models\\User', 49, 'auth_token', '198f48b4f57edda68659b4aa00357f998ab26766d4959113164b09831cd9ceb8', '[\"*\"]', '2025-04-24 21:05:50', NULL, '2025-04-24 20:09:07', '2025-04-24 21:05:50'),
(47, 'App\\Models\\User', 73, 'auth_token', '7a2374a402e026355af228ae06f0818fd6152dda4a184cf7140c76b0309978ab', '[\"*\"]', '2025-04-24 21:20:41', NULL, '2025-04-24 21:20:39', '2025-04-24 21:20:41'),
(48, 'App\\Models\\User', 49, 'auth_token', 'c03ed94ad0716d6f1efdd83aca7ee2d0562c2181548dc6ff7438b8471d076442', '[\"*\"]', '2025-04-24 21:33:15', NULL, '2025-04-24 21:33:13', '2025-04-24 21:33:15'),
(49, 'App\\Models\\User', 49, 'auth_token', 'f2bd766e7df9ad534629461a4e958131031049cb2ad4530a4f54f4e7aa718ad2', '[\"*\"]', '2025-04-24 22:46:51', NULL, '2025-04-24 22:00:15', '2025-04-24 22:46:51'),
(50, 'App\\Models\\User', 49, 'auth_token', '96311203680c9d40987f1423a5a02e8830867ecc07073cb690a916020d546ed4', '[\"*\"]', '2025-04-24 22:50:57', NULL, '2025-04-24 22:06:26', '2025-04-24 22:50:57'),
(51, 'App\\Models\\User', 13, 'auth_token', '8143be446e3593d48463c98ebfa93cc4de432147e3b14e8575bfc4568fcd1e5c', '[\"*\"]', NULL, NULL, '2025-04-24 22:50:55', '2025-04-24 22:50:55'),
(52, 'App\\Models\\User', 13, 'auth_token', 'd5e61057829076a4f684390e79806d600f7f206863753bf3d999327992af5fa9', '[\"*\"]', NULL, NULL, '2025-04-24 22:54:56', '2025-04-24 22:54:56'),
(53, 'App\\Models\\User', 13, 'auth_token', 'f062c75062c5dd60e0e11e27b132e127b0184e66f1f6982635deea1438ae46a9', '[\"*\"]', NULL, NULL, '2025-04-24 22:57:39', '2025-04-24 22:57:39'),
(54, 'App\\Models\\User', 13, 'auth_token', '2fa851692d734f26744a36c8a615336f6fc187bf7708efadfbb428356cdeef1f', '[\"*\"]', NULL, NULL, '2025-04-24 22:57:59', '2025-04-24 22:57:59'),
(55, 'App\\Models\\User', 49, 'auth_token', 'cb9139ee5809eccaaccc7ee3587d9ae60d94d3b65433c2a7a52389c80f77db92', '[\"*\"]', '2025-04-24 23:27:07', NULL, '2025-04-24 23:21:00', '2025-04-24 23:27:07'),
(56, 'App\\Models\\User', 49, 'auth_token', '6ffe1da1a65f53b096f409e9aa1c95a2cf149dcb0ef07e8e54ab6f87f2c26231', '[\"*\"]', '2025-04-30 22:46:01', NULL, '2025-04-24 23:25:52', '2025-04-30 22:46:01'),
(57, 'App\\Models\\User', 64, 'auth_token', '30556efb9b4001bb283dab3b4f8aee549e85a6e42d8aa146a1250ec2c43d1b6d', '[\"*\"]', NULL, NULL, '2025-04-30 22:45:29', '2025-04-30 22:45:29'),
(58, 'App\\Models\\User', 64, 'auth_token', 'd44a1169996201951c2e2f30201f7b4738a639a1080a81b241c675d77fa457af', '[\"*\"]', '2025-04-30 22:49:55', NULL, '2025-04-30 22:46:00', '2025-04-30 22:49:55'),
(59, 'App\\Models\\User', 64, 'auth_token', '2194b4a98df6a6e0b0947d4c2b0bd73ca6f3ef74316ea48b957ff4db0c7c291a', '[\"*\"]', '2025-04-30 22:51:10', NULL, '2025-04-30 22:49:53', '2025-04-30 22:51:10'),
(60, 'App\\Models\\User', 64, 'auth_token', '0cf9ba4aeb93fd0a5e63083be2ea24205dd2dcb2e659484c3763e0ab027db7f9', '[\"*\"]', '2025-04-30 23:12:53', NULL, '2025-04-30 22:51:08', '2025-04-30 23:12:53'),
(61, 'App\\Models\\User', 64, 'auth_token', '1f948b6dc4e3b786ca2f0fcc13c95c4088aa0bfb76b782a57a53adfae464453c', '[\"*\"]', '2025-04-30 23:16:34', NULL, '2025-04-30 23:12:51', '2025-04-30 23:16:34'),
(62, 'App\\Models\\User', 64, 'auth_token', 'efddc53384ff49f14937e9a8630f26971e443c211ccc8eea4fcffce7a5bf082e', '[\"*\"]', NULL, NULL, '2025-04-30 23:15:54', '2025-04-30 23:15:54'),
(63, 'App\\Models\\User', 64, 'auth_token', 'fa2534450e005ff2c9c95ef4320357156146ffa620effeec126adc5de480fc3b', '[\"*\"]', NULL, NULL, '2025-04-30 23:16:32', '2025-04-30 23:16:32'),
(64, 'App\\Models\\User', 64, 'auth_token', '24750accadd71787f8d67fafe43e800883834fc9781582a0f99769ddee3a3d3b', '[\"*\"]', '2025-05-06 18:16:11', NULL, '2025-04-30 23:34:50', '2025-05-06 18:16:11'),
(65, 'App\\Models\\User', 64, 'auth_token', '5d8210b951bd9e11b9159d011c820b0c5462a68d80ac81c87143fd9059f767c4', '[\"*\"]', '2025-05-07 23:56:53', NULL, '2025-05-05 17:07:16', '2025-05-07 23:56:53'),
(66, 'App\\Models\\User', 64, 'auth_token', '564794f6e08f7f661c4bd8cb944c7a49da56dbf19404baab2a98569b12804990', '[\"*\"]', '2025-05-13 22:39:51', NULL, '2025-05-05 19:23:21', '2025-05-13 22:39:51'),
(67, 'App\\Models\\User', 64, 'auth_token', 'c67cd1997eca5a033f801dfcfc4106963d4704981c89fdf5e5dac1eceeee7ab6', '[\"*\"]', '2025-05-06 22:24:27', NULL, '2025-05-06 18:16:09', '2025-05-06 22:24:27'),
(68, 'App\\Models\\User', 13, 'auth_token', 'be6a852becd29d06955715567b57efe6712cc2b5c89913b8ee8c9d6bf64f7db7', '[\"*\"]', '2025-05-06 18:32:30', NULL, '2025-05-06 18:19:47', '2025-05-06 18:32:30'),
(69, 'App\\Models\\User', 13, 'auth_token', 'edcd1947832dcd803adada9e9a5c2717be2975dfd4d32b86932cd772f3e5c9ef', '[\"*\"]', '2025-05-06 21:39:25', NULL, '2025-05-06 21:39:08', '2025-05-06 21:39:25'),
(70, 'App\\Models\\User', 13, 'auth_token', 'c52771ec6fe13ce8208b974b1ba9ed773e755626e45a490c9317ddd934a8c7ba', '[\"*\"]', '2025-05-06 23:15:00', NULL, '2025-05-06 22:25:34', '2025-05-06 23:15:00'),
(71, 'App\\Models\\User', 64, 'auth_token', 'cb1e45b84e8b18efd87c1222d9e95d01b355ada7fc06b4025da1ac4e782097bd', '[\"*\"]', '2025-05-06 23:31:20', NULL, '2025-05-06 23:31:18', '2025-05-06 23:31:20'),
(72, 'App\\Models\\User', 13, 'auth_token', '583640e4510c21608e3867153ba380223cc7aef3e0257b90b555047830e078af', '[\"*\"]', '2025-05-07 20:43:57', NULL, '2025-05-06 23:33:10', '2025-05-07 20:43:57'),
(73, 'App\\Models\\User', 64, 'auth_token', 'a42856f62c68525b01e638724a24eddc567c414d2014903dc12c1a1ce075b032', '[\"*\"]', '2025-05-07 20:49:35', NULL, '2025-05-07 19:04:28', '2025-05-07 20:49:35'),
(74, 'App\\Models\\User', 64, 'auth_token', '18dc488e570c6e610f3d36ec071ee0079c7cbb582e1610b866a5fe835b0e1ba2', '[\"*\"]', '2025-05-08 16:39:08', NULL, '2025-05-07 20:45:51', '2025-05-08 16:39:08'),
(75, 'App\\Models\\User', 64, 'auth_token', 'bfeb3aa7fba9ddeecc62344906c19296ad850e715227a2c3eac4b93ef7dbf939', '[\"*\"]', '2025-05-07 21:01:59', NULL, '2025-05-07 20:50:02', '2025-05-07 21:01:59'),
(76, 'App\\Models\\User', 13, 'auth_token', '8dbb8045211c2f8e876f7d4dbd51dc424cc098a1d86935c99296a4cc3f7c1632', '[\"*\"]', NULL, NULL, '2025-05-07 20:56:43', '2025-05-07 20:56:43'),
(77, 'App\\Models\\User', 64, 'auth_token', '21048796aa4cf4be98d16702588eb6fb7e4c953d4453c39110336a2ee69a3126', '[\"*\"]', '2025-05-08 16:45:10', NULL, '2025-05-08 16:40:23', '2025-05-08 16:45:10'),
(78, 'App\\Models\\User', 13, 'auth_token', '3921230d4a6d3c516bbecb84129a7f00d70296548a43365e0112d83de76ae087', '[\"*\"]', '2025-05-08 16:52:16', NULL, '2025-05-08 16:52:14', '2025-05-08 16:52:16'),
(79, 'App\\Models\\User', 64, 'auth_token', '6f6e1ec68d25251412e3af208306781866feb659579ce103384233337330d690', '[\"*\"]', '2025-05-08 18:29:27', NULL, '2025-05-08 17:15:24', '2025-05-08 18:29:27'),
(80, 'App\\Models\\User', 13, 'auth_token', '2d44ae5e214768ec7b4078c1f3bc14e62650cc2f8c4089e41e9111c5be60d949', '[\"*\"]', '2025-05-08 17:27:04', NULL, '2025-05-08 17:26:45', '2025-05-08 17:27:04'),
(81, 'App\\Models\\User', 64, 'auth_token', '19001a1e79d4deb00c25a2841833d6c6731d47636929b8a7a0b6dba3fad80ad6', '[\"*\"]', '2025-05-08 17:33:49', NULL, '2025-05-08 17:32:38', '2025-05-08 17:33:49'),
(82, 'App\\Models\\User', 13, 'auth_token', 'b7fa13934037f1d9e1a34754a45563ce5d1d391835c6af3b93ca2e786de9f96f', '[\"*\"]', '2025-05-08 17:35:39', NULL, '2025-05-08 17:34:28', '2025-05-08 17:35:39'),
(83, 'App\\Models\\User', 13, 'auth_token', 'aee867d100d1fe7885a9b9a182c5ddc33a92e5e393c6f35b5658f5925812a086', '[\"*\"]', NULL, NULL, '2025-05-08 17:39:51', '2025-05-08 17:39:51'),
(84, 'App\\Models\\User', 64, 'auth_token', 'ab35ec8ac4b836bb78cabdfc4a3d6e272c761cb5fa84cbc778f4b1434450baef', '[\"*\"]', NULL, NULL, '2025-05-08 17:40:30', '2025-05-08 17:40:30'),
(85, 'App\\Models\\User', 13, 'auth_token', '4e52ea19d8ab7df029ffdd90e943b213a7a8c3a15a1f4665c31a4bd525c721c0', '[\"*\"]', NULL, NULL, '2025-05-08 17:40:54', '2025-05-08 17:40:54'),
(86, 'App\\Models\\User', 13, 'auth_token', '4858e17a5844675bf18d31d740863bb23ff1523f720c26d6d4ea32131019ebd1', '[\"*\"]', '2025-05-08 17:56:47', NULL, '2025-05-08 17:41:22', '2025-05-08 17:56:47'),
(87, 'App\\Models\\User', 64, 'auth_token', '699746a87a4ba4fd0c1e32c99e62191a6d0403520c51171b9f36c3d7160f7a8d', '[\"*\"]', '2025-05-08 17:58:24', NULL, '2025-05-08 17:57:31', '2025-05-08 17:58:24'),
(88, 'App\\Models\\User', 13, 'auth_token', '51dcd192ac40d224e3ce0536730866065946a32229ae1cc350bca1709f2ec402', '[\"*\"]', '2025-05-08 18:52:37', NULL, '2025-05-08 18:25:10', '2025-05-08 18:52:37'),
(89, 'App\\Models\\User', 13, 'auth_token', 'e17e8c442610fac4118cf8112a29713523c674bfb277fbf3a87090129a00a43d', '[\"*\"]', '2025-05-08 18:30:21', NULL, '2025-05-08 18:30:17', '2025-05-08 18:30:21'),
(90, 'App\\Models\\User', 13, 'auth_token', '864c0dbdeadbf5ebd4d6bfb2f5882a447d32fef1a5f7e42d37158fa13776e622', '[\"*\"]', '2025-05-08 20:01:38', NULL, '2025-05-08 18:31:00', '2025-05-08 20:01:38'),
(91, 'App\\Models\\User', 13, 'auth_token', '32a469309e0b84acc2545f070f2159feb9e374f95fd3f7f4f894be9c7861b405', '[\"*\"]', '2025-05-09 19:07:11', NULL, '2025-05-08 19:59:55', '2025-05-09 19:07:11'),
(92, 'App\\Models\\User', 13, 'auth_token', '0a4361fbe91249a403f4a6f8fca1f81ba32ea49d16c456c4d487be6c82ad7a03', '[\"*\"]', '2025-05-08 23:48:21', NULL, '2025-05-08 20:03:07', '2025-05-08 23:48:21'),
(93, 'App\\Models\\User', 13, 'auth_token', '19275f021ada1f271085cc0dea467c0628c0db1adb1f097ca17a91ed9c86f040', '[\"*\"]', '2025-05-12 20:36:07', NULL, '2025-05-08 21:23:04', '2025-05-12 20:36:07'),
(94, 'App\\Models\\User', 13, 'auth_token', '29a9f60e9367ed2096526d83acad1d30617bc01a4bd9952f66d17883e4dd4375', '[\"*\"]', '2025-05-09 22:34:14', NULL, '2025-05-08 21:35:51', '2025-05-09 22:34:14'),
(95, 'App\\Models\\User', 64, 'auth_token', 'ebc5c87e078f582caaa7321eae5592453ff6f044c4115afe3a1757103c4cdd01', '[\"*\"]', '2025-05-09 17:52:39', NULL, '2025-05-08 23:48:19', '2025-05-09 17:52:39'),
(96, 'App\\Models\\User', 13, 'auth_token', '34e233b07c4894746cd71fcb5432dbe88eaf2dde1e1ca9e11e663b35a9bbf512', '[\"*\"]', '2025-05-09 21:02:27', NULL, '2025-05-09 17:53:21', '2025-05-09 21:02:27'),
(97, 'App\\Models\\User', 13, 'auth_token', 'a15d0dfb18b9a1326b53f10e072c6e8923a1456767492bc9d98e88539276c166', '[\"*\"]', '2025-05-14 21:05:33', NULL, '2025-05-09 20:18:07', '2025-05-14 21:05:33'),
(98, 'App\\Models\\User', 64, 'auth_token', '1a93ad4b74810f4e0e49048887ad39169b5858037218b63cdb480bfdcf0b8050', '[\"*\"]', '2025-05-09 20:53:56', NULL, '2025-05-09 20:53:21', '2025-05-09 20:53:56'),
(99, 'App\\Models\\User', 64, 'auth_token', '7248cdb5a17ec619eb1a51bbd5cd84d565d1f5394c2d2e26b43f6108214403de', '[\"*\"]', '2025-05-13 00:10:23', NULL, '2025-05-09 21:02:25', '2025-05-13 00:10:23'),
(100, 'App\\Models\\User', 64, 'auth_token', 'da1c271da5f2109bec153bb7e86f47d97e178045e72b35f58b4bf001b93a5176', '[\"*\"]', '2025-05-09 23:21:04', NULL, '2025-05-09 22:24:44', '2025-05-09 23:21:04'),
(101, 'App\\Models\\User', 84, 'auth_token', '102b30dc16c9409a1670988bf0ad3bbde4b403593dded1cf867b99c6b591d00a', '[\"*\"]', NULL, NULL, '2025-05-12 16:04:37', '2025-05-12 16:04:37'),
(102, 'App\\Models\\User', 13, 'auth_token', 'ca8fe8273d1c6a07c6aec3694fb82b53fe883abe76c21055b12b821323805272', '[\"*\"]', NULL, NULL, '2025-05-12 17:11:08', '2025-05-12 17:11:08'),
(103, 'App\\Models\\User', 84, 'auth_token', '016a72911d31cab89c822c8ec1900e89601c8d4ed0751b448b195c794fb59476', '[\"*\"]', NULL, NULL, '2025-05-12 17:26:28', '2025-05-12 17:26:28'),
(104, 'App\\Models\\User', 84, 'auth_token', '3c988df20a7a1dee861e9962fb4bd1577594d0c1aba0a236e35303d718422840', '[\"*\"]', NULL, NULL, '2025-05-12 17:28:41', '2025-05-12 17:28:41'),
(105, 'App\\Models\\User', 13, 'auth_token', 'b83030d7d6507a8cd28f3f76467a18c76aca29bff40897d6b82cf4cae3522d47', '[\"*\"]', NULL, NULL, '2025-05-12 17:28:52', '2025-05-12 17:28:52'),
(106, 'App\\Models\\User', 84, 'auth_token', '5993249a4a460dd83884132f9f9534cc796036a24f5cd2f79cb071cbafcd225e', '[\"*\"]', NULL, NULL, '2025-05-12 17:29:21', '2025-05-12 17:29:21'),
(107, 'App\\Models\\User', 86, 'auth_token', 'a553908f07b3ab31df95b89a238295b98ffdf3b2d814ca327fb8b31b44ba3e6a', '[\"*\"]', NULL, NULL, '2025-05-12 17:41:20', '2025-05-12 17:41:20'),
(108, 'App\\Models\\User', 64, 'auth_token', '1ea1e89488a6f9ec3858b0869668ef6ea7aa93566fb620df299d780a79be7ee6', '[\"*\"]', '2025-05-12 18:46:43', NULL, '2025-05-12 18:41:36', '2025-05-12 18:46:43'),
(109, 'App\\Models\\User', 87, 'auth_token', 'f3a3b89f1d17f0f830ac4a951633d3c57d768aaeed05ab0346a1ffb3808fdd4f', '[\"*\"]', '2025-05-12 18:55:37', NULL, '2025-05-12 18:52:37', '2025-05-12 18:55:37'),
(110, 'App\\Models\\User', 87, 'auth_token', 'e023e6cf9806cf6b75076a5ae54583391b7992cac9dd8128b95c3f01695e8bff', '[\"*\"]', NULL, NULL, '2025-05-12 18:53:22', '2025-05-12 18:53:22'),
(111, 'App\\Models\\User', 87, 'auth_token', '50a8ce793c81f4c0b03a08a52eba15d1d564c4fde5588ca0b52f0983443b8acc', '[\"*\"]', '2025-05-12 20:08:15', NULL, '2025-05-12 19:07:33', '2025-05-12 20:08:15'),
(112, 'App\\Models\\User', 87, 'auth_token', 'a6d4fc2fff736d9e1bc6f36e5e78cb7393aed19581d241daa8500d608d8e2b21', '[\"*\"]', '2025-05-12 20:11:20', NULL, '2025-05-12 20:09:23', '2025-05-12 20:11:20'),
(113, 'App\\Models\\User', 87, 'auth_token', 'd5cf883d8590f2cedcc14ae55dd69afd067cccc88063bbf6b30130ba3087e728', '[\"*\"]', '2025-05-12 20:13:03', NULL, '2025-05-12 20:13:01', '2025-05-12 20:13:03'),
(114, 'App\\Models\\User', 87, 'auth_token', '82041d391ab079a4dcf5c4be7be1b72a6ac5f5b8dba2a55c1ecc128665ea8a19', '[\"*\"]', NULL, NULL, '2025-05-12 20:15:25', '2025-05-12 20:15:25'),
(115, 'App\\Models\\User', 87, 'auth_token', 'f97b85afcd3e315c3a1a713522b67c79385079a042c3f9dea1bb5d0340824733', '[\"*\"]', NULL, NULL, '2025-05-12 20:19:00', '2025-05-12 20:19:00'),
(116, 'App\\Models\\User', 87, 'auth_token', 'ee67f47066f39412558c8ff4d34420c4db5d81d178eabc5d44c795b9dd11106a', '[\"*\"]', '2025-05-12 20:24:30', NULL, '2025-05-12 20:23:47', '2025-05-12 20:24:30'),
(117, 'App\\Models\\User', 87, 'auth_token', '301ae57ef42c8ff851bc9bac9eb20ba7f210b1a1af657d73a1656360da83fd9d', '[\"*\"]', NULL, NULL, '2025-05-12 20:25:09', '2025-05-12 20:25:09'),
(118, 'App\\Models\\User', 87, 'auth_token', '57ef221979b2baaf29d95fcf6f022cbba19ba1c8631932e4612f309785d70d10', '[\"*\"]', '2025-05-12 20:28:30', NULL, '2025-05-12 20:27:26', '2025-05-12 20:28:30'),
(119, 'App\\Models\\User', 87, 'auth_token', 'ca75ea3179b2a2f09c66ed0ae305a819f9785a673f37058b18beaed298f36a93', '[\"*\"]', '2025-05-12 20:37:44', NULL, '2025-05-12 20:33:07', '2025-05-12 20:37:44'),
(120, 'App\\Models\\User', 87, 'auth_token', '8b57c385507e7c8cff1326490051a7942bdcbeb0f973ed57ec29180fd267940b', '[\"*\"]', NULL, NULL, '2025-05-12 20:34:53', '2025-05-12 20:34:53'),
(121, 'App\\Models\\User', 87, 'auth_token', '87a3d854c1b09d801d0886fee6847ea2aef1d199aa05ece94dbb69cef864bd2f', '[\"*\"]', '2025-05-12 20:38:47', NULL, '2025-05-12 20:35:16', '2025-05-12 20:38:47'),
(122, 'App\\Models\\User', 87, 'auth_token', 'd382bf9b4fe7ece769d975d3a94bf58f3a4394e3fa14fbd581ae4547968dafbd', '[\"*\"]', NULL, NULL, '2025-05-12 20:39:04', '2025-05-12 20:39:04'),
(123, 'App\\Models\\User', 87, 'auth_token', '798d720ae92e9ccdfa9a741afc866d356f7cc3c6d66ddbc296c020a0361f0cd4', '[\"*\"]', '2025-05-12 20:47:32', NULL, '2025-05-12 20:39:26', '2025-05-12 20:47:32'),
(124, 'App\\Models\\User', 87, 'auth_token', '8749d459b7e904eb16857ba91af92ed42166695943a51836367a39de768eeaa4', '[\"*\"]', '2025-05-12 20:50:20', NULL, '2025-05-12 20:50:18', '2025-05-12 20:50:20'),
(125, 'App\\Models\\User', 87, 'auth_token', '8477dcec45d62187f616aae8faeaee4ad95ead8488451d2b759d40510a2f2053', '[\"*\"]', NULL, NULL, '2025-05-12 20:51:50', '2025-05-12 20:51:50'),
(126, 'App\\Models\\User', 87, 'auth_token', 'd177be58b9296c527ec6adaf9c2faac472a2a1026977a9238752f8444dcb1fcf', '[\"*\"]', '2025-05-12 20:53:16', NULL, '2025-05-12 20:53:14', '2025-05-12 20:53:16'),
(127, 'App\\Models\\User', 87, 'auth_token', '6ace35da70ad4249765a573904b2ceb35ea8da03dc87f289e7bc44cbd2b3a10d', '[\"*\"]', '2025-05-12 20:58:02', NULL, '2025-05-12 20:58:00', '2025-05-12 20:58:02'),
(128, 'App\\Models\\User', 87, 'auth_token', 'b32fc06510d88267792fb574d45397b4054ad06ff44e82496f7240e5736a4d58', '[\"*\"]', '2025-05-12 21:04:54', NULL, '2025-05-12 21:04:52', '2025-05-12 21:04:54'),
(129, 'App\\Models\\User', 64, 'auth_token', 'c499dc23ca839031d2c1a37575788080147acc85115b80130bcc828bdd37e30d', '[\"*\"]', '2025-05-12 21:08:11', NULL, '2025-05-12 21:05:48', '2025-05-12 21:08:11'),
(130, 'App\\Models\\User', 64, 'auth_token', 'c9935cdb6551ce3ef4d9d99a1ccc9202dc9c26646d367ecb95a7d7a81cfcca1f', '[\"*\"]', '2025-05-12 21:48:47', NULL, '2025-05-12 21:09:39', '2025-05-12 21:48:47'),
(131, 'App\\Models\\User', 64, 'auth_token', '057635af456701c2b95f8153eac290ed2930461f6c60496f082464966ecbf2d6', '[\"*\"]', '2025-05-20 18:43:56', NULL, '2025-05-12 21:15:25', '2025-05-20 18:43:56'),
(132, 'App\\Models\\User', 64, 'auth_token', 'a424bea6d783091f98fd95944f0566b9a361dbae7298b036ede11a91e5f85f14', '[\"*\"]', '2025-05-12 23:50:11', NULL, '2025-05-12 21:51:11', '2025-05-12 23:50:11'),
(133, 'App\\Models\\User', 13, 'auth_token', '92141d5837d312858bc7f76e3b295afccf546c9e45160bb278e40f72cadc5440', '[\"*\"]', '2025-05-12 23:49:44', NULL, '2025-05-12 23:49:29', '2025-05-12 23:49:44'),
(134, 'App\\Models\\User', 64, 'auth_token', 'ed5bee21d78516c7971ecc048a1ad30a257076c941c59772a49b282a8cccbd27', '[\"*\"]', '2025-05-12 23:51:38', NULL, '2025-05-12 23:50:09', '2025-05-12 23:51:38'),
(135, 'App\\Models\\User', 87, 'auth_token', 'eb4326ffddf2a2502afdc908077a22eacdc56b86671eafecb83ad99fe98893b7', '[\"*\"]', '2025-05-13 00:12:29', NULL, '2025-05-12 23:52:36', '2025-05-13 00:12:29'),
(136, 'App\\Models\\User', 64, 'auth_token', '232b694ed02038c0d8a06df78de334244837c623241c1bfaed41152ab2f079c0', '[\"*\"]', '2025-05-12 23:54:38', NULL, '2025-05-12 23:54:02', '2025-05-12 23:54:38'),
(137, 'App\\Models\\User', 87, 'auth_token', 'a76fa066d1f4d81b82efe78d66482edc2c3e45ce22d1acfbcc40d4a7e0e824aa', '[\"*\"]', '2025-05-12 23:58:44', NULL, '2025-05-12 23:55:19', '2025-05-12 23:58:44'),
(138, 'App\\Models\\User', 64, 'auth_token', '135698d92cebda30ce0ca71fa82c2e353722b967c7b57fc22e44e9a76271e69e', '[\"*\"]', '2025-05-13 00:08:36', NULL, '2025-05-12 23:59:29', '2025-05-13 00:08:36'),
(139, 'App\\Models\\User', 64, 'auth_token', 'ee8883dab0385c0bb12b6032060c65abf2377d8d0a1edd1e1372f3eacf58d903', '[\"*\"]', NULL, NULL, '2025-05-13 00:11:00', '2025-05-13 00:11:00'),
(140, 'App\\Models\\User', 87, 'auth_token', '8cf105b10e455bfe6ccde9106b636fc81d774015fed9c5703fb9005979946742', '[\"*\"]', '2025-05-13 00:11:59', NULL, '2025-05-13 00:11:36', '2025-05-13 00:11:59'),
(141, 'App\\Models\\User', 64, 'auth_token', '3a1a6f8c5f06dd7b6306715d68aea46a9acbbb61522487e3e6c3af5847d89201', '[\"*\"]', '2025-05-13 23:41:44', NULL, '2025-05-13 00:12:27', '2025-05-13 23:41:44'),
(142, 'App\\Models\\User', 64, 'auth_token', '85408249b06a26cde36deb65d5074fd916ac8fdd449b55101a1bbec3d31ce69d', '[\"*\"]', '2025-05-21 19:01:06', NULL, '2025-05-13 19:14:10', '2025-05-21 19:01:06'),
(143, 'App\\Models\\User', 87, 'auth_token', '9022b8cd54444672b226c56203d0b2d88bcc77dfd16908dd67d18c23b859df3a', '[\"*\"]', '2025-05-14 00:01:23', NULL, '2025-05-13 23:42:58', '2025-05-14 00:01:23'),
(144, 'App\\Models\\User', 87, 'auth_token', 'c1f63ea40076292989e6ddef0499995f1256bf71b65604bf6e206312ec4c221c', '[\"*\"]', '2025-05-14 00:28:05', NULL, '2025-05-14 00:02:06', '2025-05-14 00:28:05'),
(145, 'App\\Models\\User', 64, 'auth_token', 'bb86a7f90042ca92e6bbccbc8416edd836114dfb1d1f42c77d30833f3cf4181e', '[\"*\"]', '2025-05-14 00:28:49', NULL, '2025-05-14 00:28:03', '2025-05-14 00:28:49'),
(146, 'App\\Models\\User', 13, 'auth_token', 'efac211425edcfe3d9d034a6e1d4dacf7a67a78a6310910b59e5bb6a9bc217ef', '[\"*\"]', '2025-05-14 17:15:08', NULL, '2025-05-14 00:29:53', '2025-05-14 17:15:08'),
(147, 'App\\Models\\User', 13, 'auth_token', '71b8399308f61d952671fe44dd678f4a7aedb337c799f4c3a56969d0ee578cbc', '[\"*\"]', '2025-05-20 00:44:55', NULL, '2025-05-14 00:30:17', '2025-05-20 00:44:55'),
(148, 'App\\Models\\User', 13, 'auth_token', 'ac17b1b04ded10cc3b8c90c1f5dc73f6da55ffa840f4f7ab51f9fa45a34c9d8f', '[\"*\"]', '2025-05-14 23:32:55', NULL, '2025-05-14 17:16:20', '2025-05-14 23:32:55'),
(149, 'App\\Models\\User', 13, 'auth_token', '01b03106236d2dbab911ee907bea075a4b1fbbdf62f7904321894a8a2a42ecee', '[\"*\"]', '2025-05-21 19:30:13', NULL, '2025-05-14 17:22:07', '2025-05-21 19:30:13'),
(150, 'App\\Models\\User', 13, 'auth_token', 'fb4b3b6b2f520ec2e478580a83e8acd86f1405574686a2f362bbf66e68cc52b7', '[\"*\"]', '2025-05-14 17:59:01', NULL, '2025-05-14 17:30:12', '2025-05-14 17:59:01'),
(151, 'App\\Models\\User', 13, 'auth_token', '39efa0ab8c9334e737faf3afbc8191f7fc1ff5dacaa7cc7b3b0c7f4a13f712f6', '[\"*\"]', '2025-05-14 21:28:09', NULL, '2025-05-14 21:24:19', '2025-05-14 21:28:09'),
(152, 'App\\Models\\User', 64, 'auth_token', '05dd8bd219dad55ff6325e961e21f2ca10612eae4d8481d43aa2db7980beb4a3', '[\"*\"]', '2025-05-15 17:37:03', NULL, '2025-05-15 17:30:38', '2025-05-15 17:37:03'),
(153, 'App\\Models\\User', 64, 'auth_token', 'e1629c32aa879148fd124bc5de630b32b92328bef235d923246532e6ce0b3731', '[\"*\"]', NULL, NULL, '2025-05-15 17:43:03', '2025-05-15 17:43:03'),
(154, 'App\\Models\\User', 64, 'auth_token', '5ec33abd3bb833a552d6e70474e01db534001357eca2c67df3a1b6951034f182', '[\"*\"]', '2025-05-15 17:49:09', NULL, '2025-05-15 17:48:42', '2025-05-15 17:49:09'),
(155, 'App\\Models\\User', 64, 'auth_token', '2ae6fcb3e0eaa88dc34682e45a3b8c5b8b94333b3d1425da218445ab8c291716', '[\"*\"]', '2025-05-15 18:16:49', NULL, '2025-05-15 17:53:04', '2025-05-15 18:16:49'),
(156, 'App\\Models\\User', 64, 'auth_token', '0369d0e55340352a3b7c5b7590e763adfc4a82ae68e45fa32ccc5edb98d9317c', '[\"*\"]', '2025-05-15 18:16:42', NULL, '2025-05-15 17:56:11', '2025-05-15 18:16:42'),
(157, 'App\\Models\\User', 64, 'auth_token', '156fc3fc8552dae14fa35bef7c18c0702409da883d6a77b10c9d758d7b64b654', '[\"*\"]', '2025-05-15 19:23:23', NULL, '2025-05-15 18:16:47', '2025-05-15 19:23:23'),
(158, 'App\\Models\\User', 13, 'auth_token', '1a3b9ed6ef1532ff988304879b5ee1a8ebb1a8915f13b2a021f6b485e59490f0', '[\"*\"]', NULL, NULL, '2025-05-15 19:09:43', '2025-05-15 19:09:43'),
(159, 'App\\Models\\User', 64, 'auth_token', '1623fd6a80e38d86b7179469e88bfa943cf1b1d2221a97e5a7598ec4c158f940', '[\"*\"]', '2025-05-15 19:20:47', NULL, '2025-05-15 19:20:45', '2025-05-15 19:20:47'),
(160, 'App\\Models\\User', 64, 'auth_token', '3e5accca5fdacc987e1656984de0d89db072423dc597626aafaf3876db2f01de', '[\"*\"]', '2025-05-15 19:23:21', NULL, '2025-05-15 19:23:19', '2025-05-15 19:23:21'),
(161, 'App\\Models\\User', 13, 'auth_token', '71028fba35413dd4d99ab6b1d6609da3429f3823f3cddd138f515e88f3bd061f', '[\"*\"]', '2025-05-15 19:28:50', NULL, '2025-05-15 19:27:37', '2025-05-15 19:28:50'),
(162, 'App\\Models\\User', 13, 'auth_token', 'cbcf131c596fa2d203916b149bc31c188eb77b4354485da3010b299060f67672', '[\"*\"]', '2025-05-15 20:49:44', NULL, '2025-05-15 20:49:41', '2025-05-15 20:49:44'),
(163, 'App\\Models\\User', 13, 'auth_token', '4706d2fad2d18da1ef598475da6e877bfa57f72c4323fe4b6db057afcc3d446f', '[\"*\"]', '2025-05-15 21:12:02', NULL, '2025-05-15 20:51:52', '2025-05-15 21:12:02'),
(164, 'App\\Models\\User', 64, 'auth_token', 'df0fd8de1c9d0535ddb303d14f7ac9d0c03a572c4ffb03c0587f6549a410687e', '[\"*\"]', '2025-05-17 00:13:53', NULL, '2025-05-15 21:08:51', '2025-05-17 00:13:53'),
(165, 'App\\Models\\User', 64, 'auth_token', 'caffdf44a811bed0198f97aceb31f791ca81d2de17f2f0ce1ddb933ee4750bbe', '[\"*\"]', '2025-05-15 21:18:05', NULL, '2025-05-15 21:09:01', '2025-05-15 21:18:05'),
(166, 'App\\Models\\User', 64, 'auth_token', '11e2af520f4a157556c5a9adba12ab01e82486c9e310c5d00f6e551c3188ea55', '[\"*\"]', '2025-05-15 21:12:28', NULL, '2025-05-15 21:12:01', '2025-05-15 21:12:28'),
(167, 'App\\Models\\User', 64, 'auth_token', 'effa6f28db54794beaf7e0b74291daeb2e4dde97c9602b351e23fe5067f60e22', '[\"*\"]', '2025-05-15 21:15:37', NULL, '2025-05-15 21:13:13', '2025-05-15 21:15:37'),
(168, 'App\\Models\\User', 64, 'auth_token', 'e68486f9244b31aaf7820e0289e3890dcef5c3c63aba40335b730ccfe79808c9', '[\"*\"]', '2025-05-15 21:28:21', NULL, '2025-05-15 21:17:03', '2025-05-15 21:28:21'),
(169, 'App\\Models\\User', 13, 'auth_token', 'f2ea6d2fcdc900de92f521c0d6f1f2f865ae514f81efef1a0887e53aeb4bed08', '[\"*\"]', '2025-05-15 21:44:22', NULL, '2025-05-15 21:40:54', '2025-05-15 21:44:22'),
(170, 'App\\Models\\User', 64, 'auth_token', '726fb392162b7e4597597c882fce72dd889f97c324e959435b0804d33da321aa', '[\"*\"]', '2025-05-15 21:41:28', NULL, '2025-05-15 21:41:26', '2025-05-15 21:41:28'),
(171, 'App\\Models\\User', 13, 'auth_token', 'd3a5771051b8a8d9c048dbca13f5262ddbac099b2e2d0a4a832c11119e55661f', '[\"*\"]', NULL, NULL, '2025-05-15 21:41:39', '2025-05-15 21:41:39'),
(172, 'App\\Models\\User', 64, 'auth_token', '3aec9ab2579214d43493e7084efdeebd246ff3dd94dcd34e136c37776a4222f7', '[\"*\"]', '2025-05-15 21:43:42', NULL, '2025-05-15 21:43:41', '2025-05-15 21:43:42'),
(173, 'App\\Models\\User', 64, 'auth_token', '792478e40d3da6092fe08403bdfd3a943e1132e16ab86c9b68b584fb63ba2f1d', '[\"*\"]', '2025-05-15 21:55:21', NULL, '2025-05-15 21:44:21', '2025-05-15 21:55:21'),
(174, 'App\\Models\\User', 64, 'auth_token', '28d6e2821761f9f0fa438b76590d2b0bc376cd0b57676d2e5c3821f3a15fc1d8', '[\"*\"]', '2025-05-15 22:04:09', NULL, '2025-05-15 21:57:04', '2025-05-15 22:04:09'),
(175, 'App\\Models\\User', 13, 'auth_token', '17593d6f1b104b66426b026eba37ea0c77f1e3683c363fb528d1530f2a6a811c', '[\"*\"]', '2025-05-15 22:15:07', NULL, '2025-05-15 22:15:05', '2025-05-15 22:15:07'),
(176, 'App\\Models\\User', 13, 'auth_token', '258b11146251f8b5c2dea097482445ad9ac0e663041a3990837f017ccb9afa8b', '[\"*\"]', '2025-05-16 18:19:10', NULL, '2025-05-15 22:17:26', '2025-05-16 18:19:10'),
(177, 'App\\Models\\User', 64, 'auth_token', '98ca35dd4ea657c352ee4063efe33ec2a18b0ee2ade90e2e3c5ceed0e2b57e4d', '[\"*\"]', '2025-05-16 18:06:34', NULL, '2025-05-16 18:04:13', '2025-05-16 18:06:34'),
(178, 'App\\Models\\User', 13, 'auth_token', 'f38180abfbbbd3d15de05f71f177685b3ca1c2047073808dfd188f897da7224a', '[\"*\"]', '2025-05-16 18:07:09', NULL, '2025-05-16 18:06:54', '2025-05-16 18:07:09'),
(179, 'App\\Models\\User', 64, 'auth_token', '1c53dc95415ad0f1c2f7e721fa686dd147f9ac052619e6c3b81f80b0e65e7283', '[\"*\"]', '2025-05-16 18:36:40', NULL, '2025-05-16 18:19:08', '2025-05-16 18:36:40'),
(180, 'App\\Models\\User', 64, 'auth_token', 'be1e29e73921adbc9125ba37e7003bf7561327ce0135f494db2126b4c26b5ff0', '[\"*\"]', '2025-05-16 20:13:50', NULL, '2025-05-16 20:12:38', '2025-05-16 20:13:50'),
(181, 'App\\Models\\User', 88, 'auth_token', 'f88c409d61b53ff03fceb3d4e1b94b4b1614537ab46083430077a50d9111fd2d', '[\"*\"]', '2025-05-16 21:22:53', NULL, '2025-05-16 20:35:01', '2025-05-16 21:22:53'),
(182, 'App\\Models\\User', 64, 'auth_token', '02c8597dc2a0e63ee16750c4128c130db602a6d1e8afc844a82e70ff3dcc9950', '[\"*\"]', '2025-05-16 22:58:48', NULL, '2025-05-16 20:42:40', '2025-05-16 22:58:48'),
(183, 'App\\Models\\User', 13, 'auth_token', '8cae120b95beeb41367fd58c3179294bd0e5ad860892ba934a8d1c20800f6745', '[\"*\"]', NULL, NULL, '2025-05-16 20:51:20', '2025-05-16 20:51:20'),
(184, 'App\\Models\\User', 64, 'auth_token', 'fba657acd6b48e6c7d6293d1aebcdac126eddbcf868dab7ed645654ca54be6d0', '[\"*\"]', NULL, NULL, '2025-05-16 21:12:54', '2025-05-16 21:12:54'),
(185, 'App\\Models\\User', 13, 'auth_token', 'ed66963af41d5a8b7439edde7178eac45f139881d07cce046ff5b09a15c39fd7', '[\"*\"]', NULL, NULL, '2025-05-16 21:13:13', '2025-05-16 21:13:13'),
(186, 'App\\Models\\User', 88, 'auth_token', '1aad53c82132ef63e32a184b519f8dc8425df4ea98a0d94054071bb68e68e3be', '[\"*\"]', '2025-05-16 21:21:01', NULL, '2025-05-16 21:20:59', '2025-05-16 21:21:01'),
(187, 'App\\Models\\User', 64, 'auth_token', '8947a4fc1b142392e79d623dbf6647f6bab37b19b235f47c347b33ee53f523c3', '[\"*\"]', '2025-05-16 21:21:47', NULL, '2025-05-16 21:21:45', '2025-05-16 21:21:47'),
(188, 'App\\Models\\User', 13, 'auth_token', 'a0685aeec5e06a75ea113772fab223750c493dcb7f738f607a9b2b5e0e826c88', '[\"*\"]', NULL, NULL, '2025-05-16 21:22:05', '2025-05-16 21:22:05'),
(189, 'App\\Models\\User', 64, 'auth_token', '13af11c310c11442572d3a41c77b2142624754f840e1c59a1d1a6028981bf482', '[\"*\"]', '2025-05-21 17:47:55', NULL, '2025-05-16 21:22:34', '2025-05-21 17:47:55'),
(190, 'App\\Models\\User', 64, 'auth_token', 'dfbeb61e901015b0be5480aa8b36c935606bc116a9ec0ea8ba9e3565994e9dda', '[\"*\"]', '2025-05-16 21:22:53', NULL, '2025-05-16 21:22:51', '2025-05-16 21:22:53'),
(191, 'App\\Models\\User', 13, 'auth_token', '67a96c93c0329c6ccbabd65aa864c1293845f273f26615f989b939724ee8e48b', '[\"*\"]', '2025-05-16 21:26:19', NULL, '2025-05-16 21:23:47', '2025-05-16 21:26:19'),
(192, 'App\\Models\\User', 88, 'auth_token', '931801ce41c2d38598e7f2fe77524696aa26d1ae0543ab29391e44f4c26edf53', '[\"*\"]', '2025-05-16 21:26:20', NULL, '2025-05-16 21:25:58', '2025-05-16 21:26:20'),
(193, 'App\\Models\\User', 13, 'auth_token', 'c07de384b15b5adb8c5a4ad51f30f527a18a7b6fddb937dd07dea84d2b045812', '[\"*\"]', '2025-05-16 23:25:54', NULL, '2025-05-16 21:27:44', '2025-05-16 23:25:54'),
(194, 'App\\Models\\User', 13, 'auth_token', 'd0d19d57666de32236d2646755f23e83309780a23f9dc6f46c9ce2a9d9317df3', '[\"*\"]', '2025-05-16 21:57:16', NULL, '2025-05-16 21:51:54', '2025-05-16 21:57:16'),
(195, 'App\\Models\\User', 64, 'auth_token', '91bf0ec2efc332e8225e1e3b13c507dee4113439fff78042460b43aad4d0b9bc', '[\"*\"]', '2025-05-16 23:30:29', NULL, '2025-05-16 23:25:52', '2025-05-16 23:30:29'),
(196, 'App\\Models\\User', 13, 'auth_token', 'ff718d7e75e21b6a9f31cf5365b431751c354a6fc2d6a5ba4b1a60811968abc8', '[\"*\"]', '2025-05-16 23:40:29', NULL, '2025-05-16 23:31:05', '2025-05-16 23:40:29'),
(197, 'App\\Models\\User', 49, 'auth_token', '3acece7d593f16cdbcae86f26a108de862d7009e7c0e9a2273727d23ad926124', '[\"*\"]', '2025-05-19 20:59:22', NULL, '2025-05-16 23:33:45', '2025-05-19 20:59:22'),
(198, 'App\\Models\\User', 13, 'auth_token', '924c06e6211c1322bcfb7035ffcfed6fd7ad97b80dec11bbefc9a3831d3c59b5', '[\"*\"]', NULL, NULL, '2025-05-16 23:38:03', '2025-05-16 23:38:03'),
(199, 'App\\Models\\User', 64, 'auth_token', '7647f04d8d6894a1911c4474bfee320a55ef9fe1727fe22aaf13eae27e5de7fa', '[\"*\"]', '2025-05-19 18:33:27', NULL, '2025-05-16 23:40:27', '2025-05-19 18:33:27'),
(200, 'App\\Models\\User', 64, 'auth_token', 'a50bdb446602db1b63b85860a7f0873c5d483d6c7f5785a5c000fb05f34192b6', '[\"*\"]', '2025-05-19 22:56:11', NULL, '2025-05-16 23:50:30', '2025-05-19 22:56:11'),
(201, 'App\\Models\\User', 13, 'auth_token', '30e30df32ea6168f3d15555bcf667a5f6c816418178b9665a1c6cc4fdac90a99', '[\"*\"]', '2025-05-16 23:52:27', NULL, '2025-05-16 23:52:15', '2025-05-16 23:52:27'),
(202, 'App\\Models\\User', 64, 'auth_token', 'd52a3a395de4e9b3486fe7ea09f84057c2a4610a3e8240951805c7b3afc4a04c', '[\"*\"]', '2025-05-19 20:59:11', NULL, '2025-05-17 00:09:58', '2025-05-19 20:59:11'),
(203, 'App\\Models\\User', 64, 'auth_token', '34a39c9f75deb6d30caaa5cf1fe2ff29d3ff6805c0d1edff9ada8653e04657fd', '[\"*\"]', '2025-05-19 20:58:24', NULL, '2025-05-17 00:23:00', '2025-05-19 20:58:24'),
(204, 'App\\Models\\User', 13, 'auth_token', '4d4e37cf4e8c6532dc63ce51fab6f773e1c42daa2effcc86a56c7c813f105382', '[\"*\"]', '2025-05-19 19:16:48', NULL, '2025-05-19 18:34:20', '2025-05-19 19:16:48'),
(205, 'App\\Models\\User', 64, 'auth_token', 'dee0a30cb3d8b67558f1a296a1ec0d24a9b4a692f1248b92d225a771bfc19ef0', '[\"*\"]', '2025-05-21 00:01:03', NULL, '2025-05-19 18:44:04', '2025-05-21 00:01:03'),
(206, 'App\\Models\\User', 64, 'auth_token', '42152a742cc9cd10672f6bb7deba08eb2e529fdfb51e0c766e6be65223920f96', '[\"*\"]', '2025-05-19 22:26:49', NULL, '2025-05-19 20:26:10', '2025-05-19 22:26:49'),
(207, 'App\\Models\\User', 64, 'auth_token', '36bbaed9392ca1179321e8d47c782af5e9f54b17b06008ec1bb352921640502d', '[\"*\"]', '2025-05-19 20:58:19', NULL, '2025-05-19 20:56:32', '2025-05-19 20:58:19'),
(208, 'App\\Models\\User', 64, 'auth_token', '5763c0cce0fe79021af9a27851bec16b18ab2c440873da2c3d12af2b447ce37b', '[\"*\"]', '2025-05-19 21:11:01', NULL, '2025-05-19 20:59:34', '2025-05-19 21:11:01'),
(209, 'App\\Models\\User', 13, 'auth_token', '010fb1c51c014c50842976f302f38833aeb83a5948c32bc896e31567ce715774', '[\"*\"]', '2025-05-20 18:10:56', NULL, '2025-05-19 22:27:49', '2025-05-20 18:10:56'),
(210, 'App\\Models\\User', 13, 'auth_token', '4269cd54068e592ecc49095a83beb2984752412597330c02287ebca4634603a7', '[\"*\"]', '2025-05-19 22:56:03', NULL, '2025-05-19 22:55:49', '2025-05-19 22:56:03'),
(211, 'App\\Models\\User', 64, 'auth_token', 'b05fb5bca665b36aa135c2ec4a9e0be6f008e7fcc802611a7b26b47edefb9ad8', '[\"*\"]', '2025-05-20 17:29:29', NULL, '2025-05-20 17:24:16', '2025-05-20 17:29:29'),
(212, 'App\\Models\\User', 64, 'auth_token', '82effb58e873b0df40227cf14113b344b865eefdc8235c86600e54ac99e6f9b6', '[\"*\"]', '2025-05-20 18:15:08', NULL, '2025-05-20 18:10:54', '2025-05-20 18:15:08'),
(213, 'App\\Models\\User', 13, 'auth_token', 'a7fb742ed51c4b6fac6ead3e3fc3b0a25aaf6f3087424f69191e3d467fee77bb', '[\"*\"]', NULL, NULL, '2025-05-20 18:16:50', '2025-05-20 18:16:50'),
(214, 'App\\Models\\User', 13, 'auth_token', '027f7633f8609e337d3f8c74771d7f18f12713997f31e7a3feb8133202fe8d9d', '[\"*\"]', '2025-05-20 18:37:56', NULL, '2025-05-20 18:37:54', '2025-05-20 18:37:56'),
(215, 'App\\Models\\User', 13, 'auth_token', '6c70ed7cdac29095b013ad8bcbcc66a69edd75b905d4c673f010ba1943798311', '[\"*\"]', '2025-05-20 18:39:38', NULL, '2025-05-20 18:38:44', '2025-05-20 18:39:38'),
(216, 'App\\Models\\User', 64, 'auth_token', 'd77631c4c9edaf5399c2cd48e952513d74e550b862dae5b8dc2fd1e2c9c1fc04', '[\"*\"]', '2025-05-20 19:13:51', NULL, '2025-05-20 18:39:37', '2025-05-20 19:13:51'),
(217, 'App\\Models\\User', 64, 'auth_token', '0cc303565a3c9e72a7c93329bec6720478a94eefa6361dad15d846346e9ca372', '[\"*\"]', NULL, NULL, '2025-05-20 18:41:14', '2025-05-20 18:41:14'),
(218, 'App\\Models\\User', 13, 'auth_token', '1b1c326539fb496b3d69bec9642174fcf7b83a9590af0391231d091d5964553d', '[\"*\"]', NULL, NULL, '2025-05-20 18:43:01', '2025-05-20 18:43:01'),
(219, 'App\\Models\\User', 13, 'auth_token', '33f1a9f55c2b1de9de24100f183532d92a905d56c2d28e9089c08331a73f68cf', '[\"*\"]', '2025-05-20 20:49:47', NULL, '2025-05-20 20:28:23', '2025-05-20 20:49:47'),
(220, 'App\\Models\\User', 64, 'auth_token', 'f47cc6d7e794a2adcf425ca08649ebe1ebcff4ea815440bbd1cd75d3bcd765ba', '[\"*\"]', '2025-05-20 20:53:10', NULL, '2025-05-20 20:49:45', '2025-05-20 20:53:10'),
(221, 'App\\Models\\User', 13, 'auth_token', '1ea55656eed2afeb7f15bb1ce33438b1be15b3e4196d15cedc06f9032c052171', '[\"*\"]', '2025-05-20 22:20:20', NULL, '2025-05-20 20:55:55', '2025-05-20 22:20:20'),
(222, 'App\\Models\\User', 64, 'auth_token', '114250bf263547740bf167bd55f4bc354491b3ce2e65b555fb6584417bde731a', '[\"*\"]', '2025-05-20 22:20:11', NULL, '2025-05-20 21:31:16', '2025-05-20 22:20:11'),
(223, 'App\\Models\\User', 64, 'auth_token', '68b50d0292a8581b1544f966e6b79df4b1eb67c617ff262a9d88008101d427d0', '[\"*\"]', '2025-05-20 22:08:43', NULL, '2025-05-20 22:04:22', '2025-05-20 22:08:43'),
(224, 'App\\Models\\User', 64, 'auth_token', 'ca386fdc2ae86998f7e6f3dc469a6548facc1e6d77d9c8d7b8eb8b100d05ebbb', '[\"*\"]', '2025-05-20 22:35:05', NULL, '2025-05-20 22:20:18', '2025-05-20 22:35:05'),
(225, 'App\\Models\\User', 64, 'auth_token', '37bb48b41c47733de6916e66d46d28d93d85894ae3bcd473bee5ded7e0a8314d', '[\"*\"]', '2025-05-20 22:35:38', NULL, '2025-05-20 22:35:03', '2025-05-20 22:35:38'),
(226, 'App\\Models\\User', 13, 'auth_token', '90d2bad1bf065e7f7f6739ece24813b56a1ea319220992b3a8e86f98b795fdc6', '[\"*\"]', '2025-05-20 22:46:27', NULL, '2025-05-20 22:42:17', '2025-05-20 22:46:27'),
(227, 'App\\Models\\User', 64, 'auth_token', 'bd1a3732ca622361a4884edbe6a2ec5864b2bf1d0c42130879ff10c82e00bb23', '[\"*\"]', '2025-05-20 23:58:53', NULL, '2025-05-20 23:41:55', '2025-05-20 23:58:53'),
(228, 'App\\Models\\User', 13, 'auth_token', 'e4363b1bfbe99f4e5f036bca51520ae0b0d04489303d344fac44cf76eca001a9', '[\"*\"]', '2025-05-21 00:47:28', NULL, '2025-05-21 00:00:05', '2025-05-21 00:47:28'),
(229, 'App\\Models\\User', 64, 'auth_token', '09a2ae9c65a84e1a4c1aae33eb41e2ddd9b68e7dcd2ec150e5dae2a9764da604', '[\"*\"]', '2025-05-21 16:45:17', NULL, '2025-05-21 00:47:26', '2025-05-21 16:45:17'),
(230, 'App\\Models\\User', 64, 'auth_token', '58031b3580b56dfd961dcc37e973799fabe3380ff9ac8ab42943678df0f59a3c', '[\"*\"]', '2025-05-21 18:33:35', NULL, '2025-05-21 16:45:04', '2025-05-21 18:33:35'),
(231, 'App\\Models\\User', 64, 'auth_token', '3328859fb42f2ebfc8bc2384982d08f4b71c205f1539df71bbbd6b8612240509', '[\"*\"]', '2025-05-21 17:55:26', NULL, '2025-05-21 17:52:16', '2025-05-21 17:55:26'),
(232, 'App\\Models\\User', 64, 'auth_token', 'faaf69d59fb4e86989a9d6c9c073a0043e3b5b4888773bdf0ef34294a56b1ac5', '[\"*\"]', '2025-05-21 19:07:55', NULL, '2025-05-21 18:46:08', '2025-05-21 19:07:55'),
(233, 'App\\Models\\User', 13, 'auth_token', 'dae567c7ac7b45f6a5a809ca9a52bc9671bd704965b1ca8190e9293c7e44ac94', '[\"*\"]', '2025-05-21 20:24:26', NULL, '2025-05-21 19:17:12', '2025-05-21 20:24:26'),
(234, 'App\\Models\\User', 64, 'auth_token', '09adb4f8603e704034b4d0ee5f0abe93d29dbdcafa2c4ef93aec4fe9406b3628', '[\"*\"]', '2025-05-21 20:26:14', NULL, '2025-05-21 20:24:24', '2025-05-21 20:26:14'),
(235, 'App\\Models\\User', 64, 'auth_token', '9c1a30782bf5960be46e57b6d8d3a432afa9804db79f08309c39ec1218340129', '[\"*\"]', '2025-05-21 22:00:50', NULL, '2025-05-21 20:28:08', '2025-05-21 22:00:50'),
(236, 'App\\Models\\User', 88, 'auth_token', '0220762bd3c227e8dc7479e0f60f477b70f0705ed5c008871c6269048b978e88', '[\"*\"]', '2025-05-21 22:36:04', NULL, '2025-05-21 22:00:06', '2025-05-21 22:36:04'),
(237, 'App\\Models\\User', 13, 'auth_token', 'f44bb297f314036970082a8a96e6e8d72e6bc1f14636639701616a2e5b969983', '[\"*\"]', '2025-05-22 00:09:57', NULL, '2025-05-21 22:36:46', '2025-05-22 00:09:57'),
(238, 'App\\Models\\User', 13, 'auth_token', 'e13a2e51096c1aa0f6d9f5ceeef80646d795334720a5034fcb56bdcc0fb03ef0', '[\"*\"]', '2025-05-22 00:21:25', NULL, '2025-05-21 23:25:18', '2025-05-22 00:21:25'),
(239, 'App\\Models\\User', 13, 'auth_token', 'be0557dd9eb397fbc7174fb1a858b971538fe341695a0d22348c45d20a3f424b', '[\"*\"]', '2025-05-22 00:24:47', NULL, '2025-05-22 00:21:33', '2025-05-22 00:24:47'),
(240, 'App\\Models\\User', 13, 'auth_token', 'e0a64c3acc1fbb096e83947e8ef5f7acb2399139d4d9b9901c7efba9ad7eca8f', '[\"*\"]', '2025-05-22 18:59:53', NULL, '2025-05-22 18:31:44', '2025-05-22 18:59:53'),
(241, 'App\\Models\\User', 64, 'auth_token', 'b3851c7ed24176ff97415c42980f0a9dbd9f860cb8f441e32e53da507e55ccc5', '[\"*\"]', '2025-05-22 22:31:16', NULL, '2025-05-22 19:12:52', '2025-05-22 22:31:16'),
(242, 'App\\Models\\User', 13, 'auth_token', '0706f06e334c124785f9b5c0943a6b2856624db96f90230ede6a694e7e0b3593', '[\"*\"]', '2025-05-22 22:39:00', NULL, '2025-05-22 22:31:54', '2025-05-22 22:39:00'),
(243, 'App\\Models\\User', 64, 'auth_token', '6d9bc8c265fe0d1ffa8083c3f58974a773bab42cb72ff8f362ec2a0bf36f19dd', '[\"*\"]', '2025-05-22 23:32:59', NULL, '2025-05-22 22:38:59', '2025-05-22 23:32:59'),
(244, 'App\\Models\\User', 64, 'auth_token', '078432daa122ed4ea48431e56e0392d519e6a656c00f744f7e0f05a9d17c3ee5', '[\"*\"]', '2025-05-26 17:59:17', NULL, '2025-05-22 22:42:40', '2025-05-26 17:59:17'),
(245, 'App\\Models\\User', 64, 'auth_token', '2cc07ed7d1663297b18947d5a5c41ac1c82408d0d08263f907bf83a9a913bf7c', '[\"*\"]', '2025-05-22 23:31:39', NULL, '2025-05-22 23:29:47', '2025-05-22 23:31:39'),
(246, 'App\\Models\\User', 64, 'auth_token', '4905c0cccaa6d86695888a57938dd06b1153eb4ca3e2a1ba1194b0db5d33b57c', '[\"*\"]', '2025-05-23 19:46:48', NULL, '2025-05-23 18:35:27', '2025-05-23 19:46:48'),
(247, 'App\\Models\\User', 13, 'auth_token', '7695d8c91c193d7e48f5f87f8f0e9e499c32d45729cea872965055d21c16c66b', '[\"*\"]', '2025-05-23 19:53:45', NULL, '2025-05-23 19:47:35', '2025-05-23 19:53:45'),
(248, 'App\\Models\\User', 90, 'auth_token', '3b4aac53e3299c646d3d8141a5a29c832675c0b126b27fb269772afc15c49312', '[\"*\"]', '2025-05-23 23:38:22', NULL, '2025-05-23 23:12:01', '2025-05-23 23:38:22'),
(249, 'App\\Models\\User', 13, 'auth_token', '84c00b3e3fa001e2d9b8560996d3087d4bffbd024b42df32bd4361005b993b16', '[\"*\"]', '2025-05-23 23:42:38', NULL, '2025-05-23 23:33:09', '2025-05-23 23:42:38'),
(250, 'App\\Models\\User', 13, 'auth_token', 'b7b8822e2837bb9c39a97e43590ace764956129a8df72ddbefa37a5ca9c256ee', '[\"*\"]', '2025-05-23 23:39:35', NULL, '2025-05-23 23:39:34', '2025-05-23 23:39:35'),
(251, 'App\\Models\\User', 13, 'auth_token', '957e80fe9ff4bceaa19e17d393bc66c3587b1e4e6bc5fe3ca789627ba6a752f5', '[\"*\"]', '2025-05-24 00:13:17', NULL, '2025-05-23 23:41:46', '2025-05-24 00:13:17'),
(252, 'App\\Models\\User', 64, 'auth_token', 'e74dd5fa4fff23fefad8e6a3e6148c08561f636018f5b0c0add061ff268ddec3', '[\"*\"]', '2025-05-24 00:07:15', NULL, '2025-05-23 23:42:36', '2025-05-24 00:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_price` decimal(11,0) DEFAULT NULL,
  `estimated_time` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `vendor_id`, `shipping_price`, `estimated_time`, `name`, `slug`, `price`, `qty`, `sku`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 30, '3 to 5', 'new edit', 'new edit', 48.00, 28, 'abcs', 1, 'dddaaaaaaaaaaaaaaaaaaaaaaa', '2025-02-21 17:07:01', '2025-05-23 23:43:58'),
(6, 3, 4, 20, '12', 'SpeedX All-Season Tires', 'SpeedX All-Season Tires', 120.00, 17, 'sdfd', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-21 17:07:01', '2025-05-23 23:43:58'),
(8, 1, 5, 20, '22', 'CarCare Deluxe Cleaning Kit', 'CarCare Deluxe Cleaning Kit', 21.00, -6, 'CAOI-000008', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:07:54', '2025-05-21 20:26:12'),
(9, 1, 5, 20, '33', 'MaxCharge Car Battery', 'MaxCharge Car Battery', 21.00, 1, 'SKU---000009', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:08:16', '2025-05-23 23:43:58'),
(10, 1, 5, 20, '33', 'RoadMaster Roof Rack', 'RoadMaster Roof Rack', 21.00, 20, 'SKU---000010', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:10:14', '2025-04-07 18:07:49'),
(11, 1, 5, 20, '23', 'DriveSmart GPS Navigator', 'DriveSmart GPS Navigator', 110.00, 6, 'SKU---000011', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:12:14', '2025-05-21 20:52:27'),
(13, 1, 6, 20, '33', 'HydroShield Windshi', 'HydroShield Windshi', 21.00, 2, 'SKU---000012', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:16:48', '2025-05-23 23:43:58'),
(14, 1, 6, 20, '22', 'PowerDrive Car Jump Starter', 'PowerDrive Car Jump Starter', 21.00, 6, 'SKU---000014', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:17:48', '2025-05-23 23:43:58'),
(15, 1, 6, 20, '12', 'TrackPro Vehicle Tracker', 'TrackPro Vehicle Tracker', 21.00, 19, 'SKU---000015', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:23', '2025-05-12 22:36:48'),
(16, 1, 6, 20, '12', 'ComfortZone Car Seat', 'ComfortZone Car Seat', 21.00, 19, 'SKU---000016', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:26', '2025-05-12 22:36:48'),
(17, 1, 7, 20, '12', 'SonicBoom Car Subwoofer', 'SonicBoom Car Subwoofer', 21.00, 20, 'SKU---000017', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:29', '2025-03-17 17:04:05'),
(19, 1, 7, 20, '12', 'AirFlow Car Air Purifier', 'AirFlow Car Air Purifier', 21.00, 20, 'SKU---000018', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:34', '2025-03-17 17:04:05'),
(20, 1, 7, 20, '12', 'QuickFix Tire Repair Kit', 'QuickFix Tire Repair Kit', 21.00, 18, 'SKU---000020', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:36', '2025-04-07 17:43:52'),
(21, 1, 31, 20, '12', 'FuelSaver Performance Chip', 'FuelSaver Performance Chip', 21.00, 9, 'SKU---000021', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', '2025-02-26 17:26:40', '2025-05-23 23:43:58'),
(22, 1, 23, 20, '12', 'ChromeGuard Car Mirror', 'ChromeGuard Car Mirror', 21.00, 0, 'SKU---000022', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley&nbsp;', '2025-02-26 17:26:42', '2025-05-23 23:43:58'),
(24, 1, 23, 20, '12', 'Car Had', 'Car Had', 120.00, 0, 'SKU---000023', 1, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2025-03-07 14:05:32', '2025-05-20 22:25:25'),
(25, 3, 23, 248, '12', 'Adrian Burris', 'Adrian Burris', 88.00, 700, 'SKU---000025', 1, 'Modi sint doloribus .aa', '2025-03-10 17:31:29', '2025-05-21 20:52:27'),
(26, 1, 23, 661, '12', 'Nero Moore', 'Nero Moore', 720.00, 741, 'SKU---000026', 1, 'Labore commodo quis .ss', '2025-03-10 17:31:59', '2025-05-12 22:36:48'),
(28, 1, 24, 222, '34', 'abc', 'abc', 22.00, 205, 'SKU---000027', 1, '<p>qwwww</p>', '2025-03-11 13:59:03', '2025-05-20 17:25:05'),
(30, 1, 43, 36, '2 to 3', 'Dashboards Sedan', 'Dashboards Sedan', 300.00, 23, 'SKU---000030', 1, 'jshsgdgdywygsgsgsvshshshshdhdhzbnss', '2025-05-13 23:44:11', '2025-05-23 23:43:58'),
(31, 3, 24, 25, '20 to 30', 'Final Product', 'Final Product', 28.00, 27, 'SKU---000031', 1, '12ushdgsgshs', '2025-05-15 23:45:03', '2025-05-20 17:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_primary`, `created_at`, `updated_at`) VALUES
(69, 28, '1741725036_i.webp', 1, '2025-03-11 15:30:36', '2025-03-11 15:41:39'),
(75, 20, '1741725434_i (31).webp', 1, '2025-03-11 15:37:14', '2025-03-11 15:37:14'),
(76, 20, '1741725434_i (34).webp', 0, '2025-03-11 15:37:14', '2025-03-11 15:37:14'),
(77, 20, '1741725434_i (35).webp', 0, '2025-03-11 15:37:14', '2025-03-11 15:37:14'),
(78, 20, '1741725434_i.webp', 0, '2025-03-11 15:37:14', '2025-03-11 15:37:14'),
(79, 19, '1741725459_i (29).webp', 1, '2025-03-11 15:37:39', '2025-03-11 15:37:39'),
(80, 19, '1741725459_i (30).webp', 0, '2025-03-11 15:37:39', '2025-03-11 15:37:39'),
(81, 19, '1741725459_i (31).webp', 0, '2025-03-11 15:37:39', '2025-03-11 15:37:39'),
(82, 17, '1741725485_i (19).webp', 1, '2025-03-11 15:38:05', '2025-03-11 15:38:05'),
(83, 17, '1741725485_i (23).webp', 0, '2025-03-11 15:38:05', '2025-03-11 15:38:05'),
(84, 17, '1741725485_i (24).webp', 0, '2025-03-11 15:38:05', '2025-03-11 15:38:05'),
(88, 21, '1741725532_i (28).webp', 1, '2025-03-11 15:38:52', '2025-03-11 15:38:52'),
(89, 21, '1741725532_i (32).webp', 0, '2025-03-11 15:38:52', '2025-03-11 15:38:52'),
(90, 21, '1741725532_i (35).webp', 0, '2025-03-11 15:38:52', '2025-03-11 15:38:52'),
(98, 9, '1744067305_admin.png', 1, '2025-04-07 18:08:25', '2025-04-21 17:45:56'),
(101, 28, '1744668227_i (2).webp', 1, '2025-04-14 17:03:47', '2025-04-14 17:03:47'),
(102, 28, '1744668227_i (3).webp', 0, '2025-04-14 17:03:47', '2025-04-14 17:03:47'),
(103, 28, '1744668227_i (6).webp', 0, '2025-04-14 17:03:47', '2025-04-14 17:03:47'),
(104, 28, '1744668227_i (7).webp', 0, '2025-04-14 17:03:47', '2025-04-14 17:03:47'),
(108, 6, '1745274586_07.png', 1, '2025-04-21 17:29:46', '2025-04-21 17:29:46'),
(109, 6, '1745274586_10.png', 0, '2025-04-21 17:29:46', '2025-04-21 17:29:46'),
(110, 6, '1745274586_12.png', 0, '2025-04-21 17:29:46', '2025-04-21 17:29:46'),
(111, 6, '1745274586_14.png', 0, '2025-04-21 17:29:46', '2025-04-21 17:29:46'),
(118, 16, '1745274996_13.png', 1, '2025-04-21 17:36:36', '2025-04-21 17:36:36'),
(119, 16, '1745274996_14.png', 0, '2025-04-21 17:36:36', '2025-04-21 17:36:36'),
(120, 16, '1745274996_17.png', 0, '2025-04-21 17:36:36', '2025-04-21 17:36:36'),
(121, 15, '1745275019_18.png', 1, '2025-04-21 17:36:59', '2025-04-21 17:36:59'),
(122, 15, '1745275019_21.png', 0, '2025-04-21 17:36:59', '2025-04-21 17:36:59'),
(123, 15, '1745275019_22.png', 0, '2025-04-21 17:36:59', '2025-04-21 17:36:59'),
(124, 14, '1745275036_10.png', 1, '2025-04-21 17:37:16', '2025-04-21 17:37:16'),
(125, 14, '1745275036_12.png', 0, '2025-04-21 17:37:16', '2025-04-21 17:37:16'),
(126, 14, '1745275036_13.png', 0, '2025-04-21 17:37:16', '2025-04-21 17:37:16'),
(127, 14, '1745275036_14.png', 0, '2025-04-21 17:37:16', '2025-04-21 17:37:16'),
(128, 13, '1745275050_28.png', 1, '2025-04-21 17:37:30', '2025-04-21 17:37:30'),
(129, 13, '1745275050_29.png', 0, '2025-04-21 17:37:30', '2025-04-21 17:37:30'),
(130, 13, '1745275050_30.png', 0, '2025-04-21 17:37:30', '2025-04-21 17:37:30'),
(131, 26, '1745275227_33.png', 1, '2025-04-21 17:40:27', '2025-04-21 17:40:27'),
(132, 26, '1745275227_34.png', 0, '2025-04-21 17:40:27', '2025-04-21 17:40:27'),
(133, 26, '1745275227_38.png', 0, '2025-04-21 17:40:27', '2025-04-21 17:40:27'),
(134, 25, '1745275247_16.png', 1, '2025-04-21 17:40:47', '2025-04-21 17:40:47'),
(135, 25, '1745275247_17.png', 0, '2025-04-21 17:40:47', '2025-04-21 17:40:47'),
(136, 25, '1745275247_18.png', 0, '2025-04-21 17:40:47', '2025-04-21 17:40:47'),
(137, 24, '1745275266_14.png', 1, '2025-04-21 17:41:06', '2025-04-21 17:41:06'),
(138, 24, '1745275266_15.png', 0, '2025-04-21 17:41:06', '2025-04-21 17:41:06'),
(139, 24, '1745275266_19.png', 0, '2025-04-21 17:41:06', '2025-04-21 17:41:06'),
(140, 22, '1745275322_18.png', 1, '2025-04-21 17:42:02', '2025-04-21 17:42:02'),
(141, 22, '1745275322_21.png', 0, '2025-04-21 17:42:02', '2025-04-21 17:42:02'),
(142, 22, '1745275322_22.png', 0, '2025-04-21 17:42:02', '2025-04-21 17:42:02'),
(143, 11, '1745275541_22.png', 1, '2025-04-21 17:45:41', '2025-04-21 17:45:41'),
(144, 11, '1745275541_23.png', 0, '2025-04-21 17:45:41', '2025-04-21 17:45:41'),
(145, 11, '1745275541_26.png', 0, '2025-04-21 17:45:41', '2025-04-21 17:45:41'),
(146, 11, '1745275541_27.png', 0, '2025-04-21 17:45:41', '2025-04-21 17:45:41'),
(147, 10, '1745275552_14.png', 1, '2025-04-21 17:45:52', '2025-04-21 17:45:52'),
(148, 10, '1745275552_18.png', 0, '2025-04-21 17:45:52', '2025-04-21 17:45:52'),
(149, 10, '1745275552_19.png', 0, '2025-04-21 17:45:52', '2025-04-21 17:45:52'),
(150, 9, '1745275562_21.png', 1, '2025-04-21 17:46:02', '2025-04-21 17:46:02'),
(151, 9, '1745275562_22.png', 0, '2025-04-21 17:46:02', '2025-04-21 17:46:02'),
(152, 9, '1745275562_25.png', 0, '2025-04-21 17:46:02', '2025-04-21 17:46:02'),
(153, 9, '1745275562_26.png', 0, '2025-04-21 17:46:02', '2025-04-21 17:46:02'),
(154, 8, '1745275578_22.png', 1, '2025-04-21 17:46:18', '2025-04-21 17:46:18'),
(155, 8, '1745275578_23.png', 0, '2025-04-21 17:46:18', '2025-04-21 17:46:18'),
(156, 8, '1745275578_24.png', 0, '2025-04-21 17:46:18', '2025-04-21 17:46:18'),
(157, 8, '1745275578_25.png', 0, '2025-04-21 17:46:18', '2025-04-21 17:46:18'),
(158, 8, '1745275578_26.png', 0, '2025-04-21 17:46:18', '2025-04-21 17:46:18'),
(162, 30, '1747179851_1000000022.jpg', 1, '2025-05-13 23:44:11', '2025-05-13 23:44:11'),
(163, 30, '1747179851_1000000023.jpg', 0, '2025-05-13 23:44:11', '2025-05-13 23:44:11'),
(171, 2, '1747258342_1000000023.jpg', 1, '2025-05-14 21:32:22', '2025-05-14 21:32:22'),
(172, 2, '1747258342_1000000022.jpg', 0, '2025-05-14 21:32:22', '2025-05-14 21:32:22'),
(173, 31, '1747352703_1000000022.jpg', 1, '2025-05-15 23:45:03', '2025-05-15 23:45:03'),
(174, 31, '1747352703_1000000023.jpg', 0, '2025-05-15 23:45:03', '2025-05-15 23:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `review`, `rating`, `image`, `created_at`, `updated_at`) VALUES
(4, 49, 2, 'ebcccccssssss', 3, '1742421665.png', '2025-03-19 17:01:05', '2025-03-19 17:01:05'),
(5, 49, 2, 'ebcccccssssss', 5, '1742421666.png', '2025-03-19 17:01:06', '2025-03-19 17:01:06'),
(6, 49, 2, 'ebcccccssssss', 3, '1742421667.png', '2025-03-19 17:01:07', '2025-03-19 17:01:07'),
(7, 49, 2, 'ebcccccssssss', 1, '1742421668.png', '2025-03-19 17:01:08', '2025-03-19 17:01:08'),
(8, 49, 2, 'ebcccccssssss', 3, '1742421669.png', '2025-03-19 17:01:09', '2025-03-19 17:01:09'),
(9, 49, 2, 'ebcccccssssss', 3, '1742421670.png', '2025-03-19 17:01:10', '2025-03-19 17:01:10'),
(10, 64, 2, 'assas', 5, NULL, '2025-04-10 16:38:34', '2025-04-10 16:38:34'),
(11, 64, 2, 'qqqqqqq', 3, NULL, '2025-04-10 16:57:35', '2025-04-10 16:57:35'),
(12, 64, 2, 'dafsd', 3, NULL, '2025-04-10 16:57:47', '2025-04-10 16:57:47'),
(13, 64, 2, 'sdsd', 3, NULL, '2025-04-10 16:57:59', '2025-04-10 16:57:59'),
(14, 64, 2, 'saa', 2, NULL, '2025-04-10 16:58:15', '2025-04-10 16:58:15'),
(15, 64, 6, 'sss', 5, NULL, '2025-04-10 17:05:01', '2025-04-10 17:05:01'),
(16, 64, 6, 'dsds', 5, NULL, '2025-04-10 17:05:26', '2025-04-10 17:05:26'),
(17, 64, 2, 'a', 3, NULL, '2025-04-10 17:43:06', '2025-04-10 17:43:06'),
(18, 64, 25, 'Hand To Hande bawkwas', 4, NULL, '2025-04-10 18:40:29', '2025-04-10 18:40:29'),
(19, 64, 25, 'ssssssssssssssss', 3, NULL, '2025-04-10 19:04:07', '2025-04-10 19:04:07'),
(20, 64, 26, 'dsfgsdfh', 3, NULL, '2025-04-11 14:24:25', '2025-04-11 14:24:25'),
(22, 1, 8, 'sss', 5, NULL, '2025-04-14 16:35:56', '2025-04-14 16:35:56'),
(23, 64, 6, 'wergterfgbsrhs', 3, NULL, '2025-04-16 14:25:49', '2025-04-16 14:25:49'),
(24, 64, 6, 'asfasdhgfjt', 4, NULL, '2025-04-21 13:46:47', '2025-04-21 13:46:47'),
(25, 49, 2, 'ebcccccssssss', 3, '1746473113.png', '2025-05-05 19:25:13', '2025-05-05 19:25:13'),
(26, 49, 2, 'ebcccccssssss', 3, NULL, '2025-05-05 21:51:59', '2025-05-05 21:51:59'),
(27, 64, 2, 'ttuirddxfgfdfgggtgff', 5, NULL, '2025-05-05 22:54:35', '2025-05-05 22:54:35'),
(28, 64, 2, 'vvgggfwsgjoursscvnmhss', 5, NULL, '2025-05-05 22:59:01', '2025-05-05 22:59:01'),
(29, 64, 8, 'fcfggvffeghhhdryvdfc', 3, NULL, '2025-05-07 23:31:15', '2025-05-07 23:31:15'),
(30, 49, 2, 'ebcccccssssss', 3, NULL, '2025-05-08 17:42:36', '2025-05-08 17:42:36'),
(31, 49, 2, 'ebcccccssssss', 3, '1746726172.png', '2025-05-08 17:42:52', '2025-05-08 17:42:52'),
(32, 49, 2, 'Test Review', 3, '1746726247.png', '2025-05-08 17:44:07', '2025-05-08 17:44:07'),
(33, 49, 2, 'TEHE fjfnsahdjasdjijd', 3, '1746726891.png', '2025-05-08 17:54:51', '2025-05-08 17:54:51'),
(34, 64, 22, 'jbuhuhuhh7h', 4, NULL, '2025-05-20 21:36:35', '2025-05-20 21:36:35'),
(35, 64, 22, 'uhhbvvgghtctfycycyvvv', 5, NULL, '2025-05-20 21:46:43', '2025-05-20 21:46:43'),
(36, 49, 2, 'ebcccccssssss', 3, NULL, '2025-05-20 21:47:47', '2025-05-20 21:47:47'),
(37, 64, 22, 'jbvuvyvyvyvvy8vuvu', 5, '1747777829.jpg', '2025-05-20 21:50:29', '2025-05-20 21:50:29'),
(38, 64, 8, 'pathetic product', 1, '1747789525.jpg', '2025-05-21 01:05:25', '2025-05-21 01:05:25'),
(39, 13, 6, 'chsjhgdchgdscx', 4, '1748045450.jpg', '2025-05-24 00:10:50', '2025-05-24 00:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-02-19 16:19:03', '2025-02-19 16:19:03'),
(2, 'vendor', 'web', '2025-02-19 11:48:54', '2025-02-19 11:48:54'),
(3, 'user', 'web', '2025-02-19 11:48:54', '2025-02-19 11:48:54'),
(4, 'my-staff', 'web', '2025-04-04 17:16:48', '2025-04-04 17:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(5, 2),
(6, 2),
(9, 2),
(10, 2),
(12, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `vendor_id`, `image`, `description`, `name`, `type`, `status`, `price`, `created_at`, `updated_at`) VALUES
(2, 5, '1745274737_6806c771b5fdf.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Washs', 'Cultas', 'active', 120.00, '2025-02-28 12:18:39', '2025-04-21 17:32:17'),
(4, 5, '1744668670_67fd87fe24736.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Wash with cover', 'Cultas', 'active', 120.00, '2025-02-28 12:18:39', '2025-04-14 17:11:10'),
(5, 6, '1745274931_6806c8338a27e.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'ww', 'Qui et animi et vit', 'active', 451.00, '2025-03-12 11:52:02', '2025-04-21 17:35:31'),
(6, 6, '1745274925_6806c82d88743.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Flynn Key', 'Aute cum debitis ten', 'active', 182.00, '2025-03-12 11:58:25', '2025-04-21 17:35:25'),
(7, 6, '1745274921_6806c82935b05.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Leandra Moreno', 'Dolore adipisci quis', 'active', 626.00, '2025-03-12 11:58:42', '2025-04-21 17:35:21'),
(8, 6, '1745274914_6806c822ceee0.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Celeste Wiley', 'Repudiandae velit do', 'active', 182.00, '2025-03-12 12:03:33', '2025-04-21 17:35:14'),
(10, 5, '1744668653_67fd87ed96485.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Making New', 'New Type', 'active', 120.00, '2025-03-12 12:06:29', '2025-05-14 17:41:17'),
(15, 4, '1747246834_6824def2799cc.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'egegegegegegeg3gehehr', 'Battery Replacement', 'active', 143.00, '2025-04-14 16:48:15', '2025-05-20 21:28:49'),
(17, 23, '1745275365_6806c9e5722b2.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Wash', 'Wasing', 'active', 123.00, '2025-04-21 17:42:45', '2025-04-21 17:42:45'),
(23, 5, '1746722950_681ce086a5d26.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Wash', 'Cultas', 'active', 120.00, '2025-05-08 16:49:10', '2025-05-08 16:49:10'),
(24, 4, '1746725224_681ce96834792.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Wash', 'Cultas', 'active', 120.00, '2025-05-08 17:27:04', '2025-05-08 17:27:04'),
(26, 4, '1746728767_681cf73faccd2.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'on call services', 'Tire Rotation', 'active', 1000.00, '2025-05-08 18:26:07', '2025-05-21 22:52:08'),
(27, 4, '1746728890_681cf7ba44658.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus nobis, esse beatae quasi rem itaque sit sunt quidem dolor magnam tempore? Beatae voluptatibus laboriosam distinctio, voluptas suscipit est officiis temporibus.', 'Car Wash', 'Cultas', 'active', 120.00, '2025-05-08 18:28:10', '2025-05-08 18:28:10'),
(31, 4, '1747432373.png', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'Car Wash', 'Cultas', 'active', 120.00, '2025-05-16 21:52:53', '2025-05-16 21:52:53'),
(32, 4, '1747432504.png', 'qqqqqqqqqqqqqqqqqqqq', 'Car Wash', 'Cultas', 'active', 120.00, '2025-05-16 21:55:04', '2025-05-16 21:55:04'),
(33, 4, '1747432636.png', 'The New Service', 'Editing Services', 'New Type', 'active', 80.00, '2025-05-16 21:55:32', '2025-05-16 21:57:16'),
(35, 4, '1747698173.jpg', 'yffnjgfcffgfff', 'Oil Change', 'Hatchback', 'active', 25.00, '2025-05-19 23:42:53', '2025-05-19 23:42:53'),
(36, 4, '1747699534.jpg', 'udhdhshshshshsh', 'Pickup Truck', 'Oil Change', 'active', 88.00, '2025-05-20 00:05:34', '2025-05-20 00:05:34'),
(37, 4, '1747774909.jpg', 'hshshshdhdduddudygdgswhwhwhshsbsshshshhs', 'Maintenance', 'Oil Change', 'active', 28.00, '2025-05-20 21:01:49', '2025-05-20 21:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `vendor_id`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 4, 20.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35'),
(2, 5, 10.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35'),
(3, 43, 15.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35'),
(4, 24, 30.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35'),
(5, 6, 30.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35'),
(6, 23, 30.00, '2025-02-24 16:41:35', '2025-02-24 16:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` decimal(10,7) DEFAULT NULL,
  `long` decimal(10,7) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `country`, `state`, `city`, `zip`, `phone`, `image`, `gender`, `address`, `about_me`, `fcm_token`, `location`, `lat`, `long`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin@gmail.com', NULL, '$2y$12$Hqjli9j9PWdQ.5n0rJO2ouMhQb9FdU9/G3OY1R9AePnhdtWPW6CXe', 'US', 'SD', 'FG', '12121', '5465455555', '1747237759.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-14 15:49:19'),
(13, 'Chirs Vehicle Store', 'AutoGaragePro@gmail.com', NULL, '$2y$12$Hqjli9j9PWdQ.5n0rJO2ouMhQb9FdU9/G3OY1R9AePnhdtWPW6CXe', 'US', 'US', 'YJ', '12121', '63456345622', '1743009356.jpg', 'male', NULL, NULL, 'cDGxdmVe2UHbstGPr-Km7k:APA91bHgqtLHis2AGtVGvE19J492FTawelSs4PgMyAPz_uV7WKvwttiHeczpEwGepSboZUziHMI9t8evT8aaXbFaAHnswV5_7hlC-AkejNYVx2kfQKih8Hc', NULL, 0.0000000, 0.0000000, NULL, '2025-02-19 17:03:27', '2025-05-23 23:42:23'),
(14, 'Jimme Perfact Car', 'GarageHub@gmail.com', NULL, '$2y$12$f9KvqHD5rc8lWtxzBK4OO.GG2h6hbuum/AM4lOn7ufOskFJHvthoi', 'US', 'US', 'YJ', '12121', '63456345622', '1743009356.jpg', NULL, NULL, NULL, 'dgfhjdghkfyujlghjlgh', NULL, 24.8305594, 67.0726651, NULL, '2025-02-19 17:04:27', '2025-04-21 16:15:56'),
(15, 'Jhon AutoFix', 'CarFix@gmail.com', NULL, '$2y$12$5EWKryceGN5mdWeLFCAACu4Cypy4U88QdccKJ6UXcPzfNmk9SbyyW', 'US', 'US', 'YJ', '12121', '63456345622', '1743009356.jpg', NULL, NULL, NULL, 'dgfhjdghkfyujlghjlgh', NULL, 24.8305594, 67.0726651, NULL, '2025-02-19 17:05:24', '2025-04-21 16:14:54'),
(16, 'Smith Car Store', 'MWG@gmail.com', NULL, '$2y$12$zaLucwfDsv0yFoOnisGDQeiHwHC/ohvO92cx3rbLSeKBqKsf9JFA2', 'US', 'US', 'YJ', '12121', '63456345622', '1743009356.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-19 17:06:32', '2025-04-21 16:25:33'),
(49, 'Christen Russell', 'customer@gmail.com', NULL, '$2y$12$Hqjli9j9PWdQ.5n0rJO2ouMhQb9FdU9/G3OY1R9AePnhdtWPW6CXe', 'US', 'Velit consequatur li', 'Minim dolor commodi', '58794', '+1 (132) 877-2044', '1743009356.jpg', 'other', NULL, NULL, 'dgfhjdghkfyujlghjlgh', NULL, 24.8305594, 67.0726651, NULL, '2025-03-06 16:03:48', '2025-05-16 23:33:45'),
(50, 'Vendor5', 'Vendor5@gmail.com', NULL, '$2y$12$D7Uy6jbVI4gehWx6DL2KDuapHr.CzEsdRnJ0361Qy6bFAUxqqaHQC', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 15:41:30', '2025-03-07 15:41:30'),
(51, 'Vendor6', 'Vendor6@gmail.com', NULL, '$2y$12$23YRVtRx4t0Ldh3L0ihcbehpfFsKbUm0apDpjFrrezXnxGj4.vITi', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 16:23:58', '2025-03-07 16:23:58'),
(52, 'Jeniwer Perfact Car', 'Vendor7@gmail.com', NULL, '$2y$12$3yBFox4.kc6gg/7oJGWWR.WEQ7E7K8D/h878eN0s0VXCT4I.WyId2', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 16:24:11', '2025-04-21 17:07:52'),
(53, 'car gein', 'carrepair@gmail.com', NULL, '$2y$12$zp/Kx2q9OzFB2UKbWGKIVOlo4GCAmIUM3G25xVPgDqen2Ne1HCViq', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 16:25:16', '2025-04-21 17:10:04'),
(54, 'Geni Auto Detail', 'Vendor9@gmail.com', NULL, '$2y$12$sXBx1HL2/S2trR1kHWKcb.hAQdkBzF2GskVuyWEOjejBRh0oh7Kw2', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 16:25:42', '2025-04-21 17:09:04'),
(56, 'VendorStripe', 'VendorStripe@gmail.com', NULL, '$2y$12$bNS5AiWOxzGIiMOvD3OUC.ufnzEHnLMvTT8NqgZipsUbl6xM6HW36', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 12:51:38', '2025-03-17 12:51:38'),
(57, 'VendorStripe1', 'VendorStripe1@gmail.com', NULL, '$2y$12$./bwLhtUGDSrSxfoMsAFvORD0QFlA3YC/26XWe26AiGM.OitJJbMm', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 13:21:07', '2025-03-17 13:21:07'),
(58, 'VendorStripe11', 'VendorStripe11@gmail.com', NULL, '$2y$12$VPvSkDKnzPxdb.2gEUwPCeRz5ur6bW8dsv2zoHiVs./ljHcHGnt6e', 'PK', 'US', 'YJ', '12121', '63456345622', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 13:24:04', '2025-03-17 13:24:04'),
(64, 'final profile', 'developercoder51@gmail.com', NULL, '$2y$12$G39uEDPqTNoYk3H5aRNibeuXCILdRoF3cMrA78S.z4SoXGRcJAUF.', 'PK', 'Califonia', 'KU', '71841', '1212121211', '1747346282_64_user.jpg', 'other', 'fbbbbbbbb', 'fhfhfhfhfhfhfhfhfhfh', 'c7SYz52iQc2L4J1GYngzy9:APA91bG48MiSCKg8wLKEV71CoY164gS_tOOLODjrrAAJnyAMfnDmLd39qjoGGFFJUyOZzuTjISzkSWPefrjZc7VPsz07iGJ6rs2It-ejSK1LZC1K4kR-Q9g', NULL, 0.0000000, 0.0000000, NULL, '2025-04-08 17:29:01', '2025-05-26 17:13:56'),
(66, 'Ila Navarro', 'jonijucav@mailinator.com', NULL, '$2y$12$0JpwoaSxwm6IipjhsMq4pefDbZ/8.i99Xt/VIpIYfVwrwrLNanRK2', 'Dolor reprehenderit', 'Exercitationem eum m', 'Est saepe doloremqu', '21195', '1212121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 13:28:51', '2025-04-09 13:28:51'),
(67, 'Indira Galloway', 'ropoz@mailinator.com', NULL, '$2y$12$ru6PZLfPohbE08nFhZDEMOQii3u0pgwVQr3jeRSsnFTKoWrX9QLQW', 'Sunt dolor esse est', 'Sed amet molestias', 'Ipsa adipisci sit', '83038', '1212121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 13:34:05', '2025-04-09 13:34:05'),
(68, 'Shafira Reilly', 'rymozykaq@mailinator.com', NULL, '$2y$12$n/SA4oxFvmbPppvKBStKQ.uIWE8/1KMq6EPMdyxx0LYJFjK5pflmq', 'Et ex quis dolor dol', 'Consequatur tempor r', 'Dolor sed sed sequi', '57569', '1212121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 13:39:24', '2025-04-09 13:39:24'),
(69, 'Agine Auto Service', 'carracing@gmail.com', NULL, '$2y$12$24xtQCpB59GSNhtdWegtMu9DxTQWiR9UPEvy5gHk6iesQjCfQV.u2', 'Quos labore velit n', 'Quasi corrupti sunt', 'Exercitation est aut', '12222', '1212121212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 15:18:39', '2025-04-21 16:14:29'),
(70, 'test', 'johnsmith30397@gmail.com', NULL, '$2y$12$21msyr5juhmH.OT6RkJ8EOnEZlt76nXlMRiZwj.hUbnO1xhbDbS6W', 'abcasd', 'abc', 'ddea', '12312', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-23 17:10:37', '2025-04-23 17:10:37'),
(71, 'Cara Terrell', 'zelyq@mailinator.com', NULL, '$2y$12$Es4W51bXg3mvCa/Mprnxz.0ikN9JHoCZ1qVdlvY3MIM/59dxCviMq', 'United States', 'Mississippi', 'Southaven', '19918', '+1 (836) 804-2898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-23 18:15:22', '2025-04-23 18:15:22'),
(72, 'Benjamin Mcdowell', 'caty@mailinator.com', NULL, '$2y$12$DFcdnBUIYKvKnYLMpuHfaudhUqctiR1N0pY7iq1Ekl.6D85ZhCIRi', 'United States', 'Arizona', 'Phoenix', '32930', '+1 (523) 801-1472', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-23 18:23:18', '2025-04-23 18:23:18'),
(73, 'user', 'testing@gmail.com', NULL, '$2y$12$7nS1.y34K3SR9V1Dza83H.HDFRtPizolTaVVz9kDgjq7sI4jJtViC', 'Pakistan', NULL, NULL, '12345', '+93316454545', NULL, NULL, NULL, NULL, 'emRA8zQySO-Bf7aOYCdFEq:APA91bEXdazT1Wh3deEBcHND5df5kHy0PgAr9-lNC8JvWQBW1pLg-wact74AC8U4ZU-6ZhJlkJjGvShKPc9qRHJWCawqQErxUPfCdUs7wpm97nTKe1JRKs8', NULL, 24.8306000, 67.0726000, NULL, '2025-04-24 21:20:18', '2025-04-24 21:20:39'),
(74, 'Quinlan Barry', 'haryl@mailinator.com', NULL, '$2y$12$CYhoNAEWUicFpmkX8CgEE.UXuFe9PVh/p/5dUwCu55HdS/7TuaS.S', 'United States', 'West Virginia', 'Huntington', '51793', '+1 (556) 853-3567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 22:05:42', '2025-04-30 22:05:42'),
(76, 'test', 'test@gmail.com', NULL, '$2y$12$o.B5nMOLtcqkP/DpQSb7Ne2O64j5kveVbVzyyfBAU.Zd3BRRm1SkG', 'United States', 'Florida', 'Orlando', '12345', '0015484884', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 18:08:20', '2025-05-09 18:08:20'),
(77, 'Testimng user', 'testuser@gmail.com', NULL, '$2y$12$TGcGug3XKGbCvtld7gwEk.ejIPMPOgsxi5KHn45iC2ZDbsHBNDueO', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:43:29', '2025-05-09 23:43:29'),
(78, 'New Vendor', 'garagevendor@gmail.com', NULL, '$2y$12$TpTJVidNnMM6GXjGzuRPLevoSrfOJ5qQa/fF1Tk7C1sSnNQAGhna6', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:44:30', '2025-05-09 23:44:30'),
(79, 'adg', 'ABC1@gmail.com', NULL, '$2y$12$yjLEXBbqc4tbcLiE0.P.pOBOFa7wQSWgFOhqaYK6SrmUrRqJuTJOS', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:46:52', '2025-05-09 23:46:52'),
(80, 'adg', 'ABC122@gmail.com', NULL, '$2y$12$L6IwK7y5tv3S.oo35N/KB.TrVvw1WmcU4Fu5eyo4zE2PCrGH3AOFa', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:47:46', '2025-05-09 23:47:46'),
(81, 'adg', 'ABC122222@gmail.com', NULL, '$2y$12$q73Dff33d7.QanKW63nzzOv6fcyYkt3diCDD7y32.SJsBSevPZ8vO', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:50:47', '2025-05-09 23:50:47'),
(82, 'adg', 'ABC122222aaa@gmail.com', NULL, '$2y$12$2KJzZk.9DGkMRm6SWvd7LOgF.MnIbE7.LKTTQAWR7IFAV1mLM5.Au', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-09 23:51:48', '2025-05-09 23:51:48'),
(83, 'adg', '0900aaa@gmail.com', NULL, '$2y$12$EgQCUEgmtq6rfCkqMQ5UkOhbkQyrrHEF.C8BkO.RPja/D1LxJC14e', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-12 15:54:53', '2025-05-12 15:54:53'),
(84, 'adg', '0900saaa@gmail.com', NULL, '$2y$12$p5xJ8R6UOaBuYVmn5U7AuuZYT5GwrfpHDKsAfM7MbzB7F.Xi8PSfq', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, 'dgfhjdghkfyujlghjlgh', NULL, 24.8305594, 67.0726651, NULL, '2025-05-12 16:01:36', '2025-05-12 16:04:37'),
(85, 'adg', '0900saaaaaa@gmail.com', NULL, '$2y$12$BXFKxuRUEouEZQ67SjmU.OguIKqUKPFgZ222.s8PrnllU6vTQrfzK', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-12 17:39:57', '2025-05-12 17:39:57'),
(86, 'adg', '0900saaaaaaaaa@gmail.com', NULL, '$2y$12$K3wnc9C.vyRhhIvZtit2IuEUSxXh6Zvo3JUdOXs5F.qZocNqEIbP.', 'UK', 'AS', 'PKS', '12212', '23232323233', NULL, NULL, NULL, NULL, 'dgfhjdghkfyujlghjlgh', NULL, 24.8305594, 67.0726651, NULL, '2025-05-12 17:40:14', '2025-05-12 17:41:20'),
(87, 'test garage', 'garage001@gmail.com', NULL, '$2y$12$DmoJJPm2JDaGECZlDtEsRO3jUPjqkg7wJuPiJ1NDMIpayKa3RB.aq', 'Australia', NULL, NULL, '12345', '+1123456789', NULL, NULL, NULL, NULL, 'etF2sSaFR6i5orIyTNqFtD:APA91bFzWbEw-50zyWBzFZ55bi5DMyJ1ki6-a0Ezbd6OTmojT5AMrdSv37hTf6IfOjMXe5jhSP00bnuYrojPKtnjCUGddhoqb9-f8v5Q-Gz5itga-4urlTg', NULL, 0.0000000, 0.0000000, NULL, '2025-05-12 18:52:01', '2025-05-14 00:03:07'),
(88, 'Pyro Bytes', 'pyrobytesdeveloper@gmail.com', NULL, '$2y$12$1REIA4SBYrBy3L0NTvd.e.dmR7jkYn3NeBN6prUlGHWyBzuH5K7mS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dLlCXiRfRMGA_E6O9DH21H:APA91bEUqElCULTd4BYGPzBL0EPVZtquD5DVr9KYgo87CZ52A45KLEUSjpi4yVmpKFY_9DoJRetkyvh62ki9UnpdVcJAGx-0B-Yn4fWyvnKYCJQDECI12Q0', NULL, 0.0000000, 0.0000000, NULL, '2025-05-16 20:34:40', '2025-05-21 22:36:04'),
(89, 'new garage', 'garage12@gmail.com', NULL, '$2y$12$5sD4GHycgSqviysxTDuKhuySl1sQC9Xlhwaeat/VD3prJnhOhzCdi', 'Australia', NULL, NULL, '12345', '+3586799784', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-20 23:36:25', '2025-05-20 23:36:25'),
(90, 'Apple', 'mark.perreault@pyrobytes.com', NULL, '$2y$12$VwZvbQJhhOu4P.RGiLD6q.7Qybxx.AiurdXLr6mNqjzOA../esK7m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDGxdmVe2UHbstGPr-Km7k:APA91bG8eqxcRDgTNEYZeIUjj6PvSVgXbthvlZwaQD02MMdG7v4jifnaPeZWb-czza_dKPp0qLG4qgTPPisZtyxN82-8n2oqyKo0t22f6WatbEARy5bIVp0', NULL, 0.0000000, 0.0000000, NULL, '2025-05-23 22:04:45', '2025-05-23 23:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_account_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `long` decimal(11,8) DEFAULT NULL,
  `establish_since` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `stripe_account_id`, `name`, `image`, `location`, `lat`, `long`, `establish_since`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 13, NULL, 'Chirs Vehicle Store', '1747940295_13_vendor.jpg', 'Australia', 36.77826100, -119.41793240, '1990', 'My Garage', 2, '2025-02-19 17:03:27', '2025-05-22 18:58:15'),
(5, 14, NULL, 'Perfact Car', '1745270156.png', 'Tenerife, Spain', 28.29156370, -16.62913040, '2025-02-20', 'Tennessee, USA&nbsp;Tennessee, USA&nbsp;Tennessee, USA&nbsp;Tennessee, USA&nbsp;Tennessee, USATennessee, USATennessee, USATennessee, USATennessee, USA', 2, '2025-02-19 17:04:27', '2025-04-21 17:22:18'),
(6, 15, NULL, 'AutoFix', '1745270111.png', 'Chicago Midway International Airport (MDW), South Cicero Avenue, Chicago, IL, USA', 41.78677590, -87.75218840, '2025-02-20', 'Chicago, IL, USA&nbsp;Chicago, IL, USA&nbsp;Chicago, IL, USA&nbsp;Chicago, IL, USA', 2, '2025-02-19 17:05:24', '2025-04-21 17:23:47'),
(7, 16, NULL, 'Car Store', '1745270746.png', 'Texas, USA', 31.96859880, -99.90181310, '2025-02-20', 'Texas, USA&nbsp;Texas, USA&nbsp;Texas, USA&nbsp;Texas, USA&nbsp;Texas, USA&nbsp;Texas, USA&nbsp;Texas, USATexas, USATexas, USA&nbsp;Texas, USA&nbsp;Texas, USA&nbsp;Texas, USATexas, USA', 2, '2025-02-19 17:06:32', '2025-04-21 17:24:06'),
(23, 53, NULL, 'Car Repair', '1745273404.png', 'California City, CA, USA', 35.12580100, -117.98590380, '2025-02-20', 'California City, CA, USA&nbsp;California City, CA, USA&nbsp;California City, CA, USA', 2, '2025-03-07 16:25:16', '2025-04-21 17:24:27'),
(24, 54, NULL, 'Auto Detail', '1745273344.png', 'Chicago Heights, IL, USA', 41.50614600, -87.63559950, '2025-02-20', '<p>Chicago Heights, IL, USA&nbsp;Chicago Heights, IL, USA</p>', 2, '2025-03-07 16:25:42', '2025-04-21 17:24:43'),
(31, 69, NULL, 'Auto Service', '1745270069.png', 'New York, NY, USA', NULL, NULL, '2025-04-16', 'New York, NY, USA&nbsp;New York, NY, USA&nbsp;New York, NY, USA', 2, '2025-04-09 15:18:39', '2025-04-21 17:18:45'),
(32, 76, NULL, 'tets store', '1746814100_681e44944f6a2.png', 'pk', NULL, NULL, '1906', 'sd', 2, '2025-05-09 18:08:20', '2025-05-09 18:10:48'),
(33, 13, NULL, 'adg', '1747068086_682224b6be2e0.png', 'California, USA', 36.77826100, -119.41793240, '2022', 'PKSssssssssssss', 1, '2025-05-12 16:41:26', '2025-05-12 16:41:26'),
(39, 13, NULL, 'adg', '1747082167_68225bb733588.png', 'California, USA', 36.77826100, -119.41793240, '2022', 'PKSssssssssssss', 1, '2025-05-12 20:36:07', '2025-05-12 20:36:07'),
(43, 87, NULL, 'New Garage', '1747082852_68225e64b6a38.jpg', 'USA', 0.00000000, 0.00000000, '1999', 'this is the new garage register', 2, '2025-05-12 20:47:32', '2025-05-12 20:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_reviews`
--

CREATE TABLE `vendor_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_reviews`
--

INSERT INTO `vendor_reviews` (`id`, `user_id`, `vendor_id`, `review`, `rating`, `image`, `created_at`, `updated_at`) VALUES
(3, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742335096.png', '2025-03-18 16:58:16', '2025-03-18 16:58:16'),
(4, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 2, '1742335147.png', '2025-03-18 16:59:07', '2025-03-18 16:59:07'),
(5, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742335410.png', '2025-03-18 17:03:30', '2025-03-18 17:03:30'),
(6, 49, 5, 'simply random text. It has roots in a piece of classical Latin literature from', 1, '1742336088.png', '2025-03-18 17:14:48', '2025-03-18 17:14:48'),
(7, 49, 6, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742336091.png', '2025-03-18 17:14:51', '2025-03-18 17:14:51'),
(8, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337125.png', '2025-03-18 17:32:05', '2025-03-18 17:32:05'),
(9, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337126.png', '2025-03-18 17:32:06', '2025-03-18 17:32:06'),
(10, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337127.png', '2025-03-18 17:32:07', '2025-03-18 17:32:07'),
(11, 49, 7, 'simply random text. It has roots in a piece of classical Latin literature from', 3, '1742337128.png', '2025-03-18 17:32:08', '2025-03-18 17:32:08'),
(12, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337129.png', '2025-03-18 17:32:09', '2025-03-18 17:32:09'),
(13, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337130.png', '2025-03-18 17:32:10', '2025-03-18 17:32:10'),
(14, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337131.png', '2025-03-18 17:32:11', '2025-03-18 17:32:11'),
(15, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337132.png', '2025-03-18 17:32:12', '2025-03-18 17:32:12'),
(16, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337133.png', '2025-03-18 17:32:13', '2025-03-18 17:32:13'),
(17, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337133.png', '2025-03-18 17:32:13', '2025-03-18 17:32:13'),
(19, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337135.png', '2025-03-18 17:32:15', '2025-03-18 17:32:15'),
(20, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337142.png', '2025-03-18 17:32:22', '2025-03-18 17:32:22'),
(21, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337143.png', '2025-03-18 17:32:23', '2025-03-18 17:32:23'),
(22, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337143.png', '2025-03-18 17:32:23', '2025-03-18 17:32:23'),
(23, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337145.png', '2025-03-18 17:32:25', '2025-03-18 17:32:25'),
(24, 49, 4, 'simply random text. It has roots in a piece of classical Latin literature from', 5, '1742337146.png', '2025-03-18 17:32:26', '2025-03-18 17:32:26'),
(26, 64, 5, 'simply random text. It has roots in a piece of classical Latin literature from', 2, '1745361603.png', '2025-04-22 22:40:03', '2025-04-22 22:40:03'),
(27, 64, 4, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 4, NULL, '2025-04-24 16:18:42', '2025-04-24 16:18:42'),
(28, 64, 5, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 3, '1745511548.png', '2025-04-24 16:19:08', '2025-04-24 16:19:08'),
(29, 64, 6, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 5, '1745511561.png', '2025-04-24 16:19:21', '2025-04-24 16:19:21'),
(30, 64, 24, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 2, NULL, '2025-04-24 16:19:30', '2025-04-24 16:19:30'),
(31, 64, 23, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 4, '1745511581.png', '2025-04-24 16:19:41', '2025-04-24 16:19:41'),
(32, 64, 7, 'The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.', 4, NULL, '2025-04-24 16:19:50', '2025-04-24 16:19:50'),
(33, 64, 31, 'cxdwwdghjhgderdff', 5, NULL, '2025-05-05 23:05:45', '2025-05-05 23:05:45'),
(34, 64, 23, 'hccgcgcgcchcufcq', 5, NULL, '2025-05-20 21:55:01', '2025-05-20 21:55:01'),
(35, 64, 23, 'fwgegehrhe1g3grb', 3, '1747778444.jpg', '2025-05-20 22:00:44', '2025-05-20 22:00:44'),
(36, 64, 23, 'htjtjtj5jvebehdnrnrbebeheh', 4, '1747778545.jpg', '2025-05-20 22:02:25', '2025-05-20 22:02:25'),
(37, 49, 4, 'aaaaaaaaaaaaaaaaaaaaaaa', 5, '1747778602.png', '2025-05-20 22:03:22', '2025-05-20 22:03:22'),
(38, 49, 4, 'aaaaaaaaaaaaaaaaaaaaaaa', 5, '1747778796.png', '2025-05-20 22:06:36', '2025-05-20 22:06:36'),
(39, 49, 4, 'New post ldjhdhgbhgdgdgdhjd', 5, '1747778919.png', '2025-05-20 22:08:39', '2025-05-20 22:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(35, 1, 25, '2025-04-11 15:49:30', '2025-04-11 15:49:30'),
(36, 1, 17, '2025-04-11 15:50:35', '2025-04-11 15:50:35'),
(40, 1, 6, '2025-04-11 17:45:36', '2025-04-11 17:45:36'),
(41, 1, 2, '2025-04-11 18:08:52', '2025-04-11 18:08:52'),
(42, 1, 15, '2025-04-11 18:16:10', '2025-04-11 18:16:10'),
(43, 1, 10, '2025-04-11 18:19:48', '2025-04-11 18:19:48'),
(44, 1, 11, '2025-04-11 18:19:50', '2025-04-11 18:19:50'),
(45, 1, 26, '2025-04-14 14:39:04', '2025-04-14 14:39:04'),
(46, 1, 13, '2025-04-14 15:52:02', '2025-04-14 15:52:02'),
(47, 1, 8, '2025-04-14 16:36:02', '2025-04-14 16:36:02'),
(48, 1, 9, '2025-04-14 17:19:15', '2025-04-14 17:19:15'),
(49, 1, 28, '2025-04-14 17:30:00', '2025-04-14 17:30:00'),
(56, 64, 2, '2025-04-30 22:12:58', '2025-04-30 22:12:58'),
(57, 49, 8, '2025-05-02 22:08:10', '2025-05-02 22:08:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availabilities_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_vendor_id_foreign` (`vendor_id`),
  ADD KEY `bookings_availability_id_foreign` (`availability_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_vendor_id_foreign` (`vendor_id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_reviews_user_id_foreign` (`user_id`),
  ADD KEY `vendor_reviews_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wishlists_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_availability_id_foreign` FOREIGN KEY (`availability_id`) REFERENCES `availabilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_reviews`
--
ALTER TABLE `vendor_reviews`
  ADD CONSTRAINT `vendor_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_reviews_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
