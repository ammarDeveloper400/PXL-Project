-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 12:14 AM
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
-- Database: `dedezutl_pxl`
--
CREATE DATABASE IF NOT EXISTS `dedezutl_pxl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dedezutl_pxl`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `lparent` int(11) NOT NULL DEFAULT 0,
  `lang_id` int(11) NOT NULL DEFAULT 0,
  `region_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `admin_profile_pic` varchar(255) DEFAULT 'dummy_image.png',
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `deleted_by` int(11) NOT NULL DEFAULT 0,
  `satff` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `lparent`, `lang_id`, `region_id`, `name`, `email`, `username`, `password`, `status`, `session_id`, `admin_profile_pic`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_by`, `satff`) VALUES
(1, 0, 0, 0, 'Administrator', 'info@dedevelopers.com', 'admin', 'ef73781effc5774100f87fe2f437a435', 1, '2COwQsMN9xVB5R1XH6mA', 'e1e683e3619e42ee205b8b35b1445b84.png', 0, '2018-09-11 17:17:47', 0, '2023-03-29 16:49:01', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_history`
--

CREATE TABLE `admin_login_history` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_time` datetime NOT NULL,
  `browser` varchar(150) NOT NULL,
  `platfrom` varchar(150) NOT NULL,
  `user_agent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin_login_history`
--

INSERT INTO `admin_login_history` (`id`, `admin_id`, `ip`, `date_time`, `browser`, `platfrom`, `user_agent`) VALUES
(1, 1, '110.39.77.115', '2023-03-29 14:17:41', 'Chrome Version = 111.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(2, 1, '39.37.169.43', '2023-03-29 15:38:25', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(3, 1, '72.255.36.36', '2023-03-29 16:41:34', 'Opera Version = 96.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0'),
(4, 1, '45.48.130.88', '2023-03-30 00:45:18', 'Chrome Version = 111.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(5, 1, '39.37.169.43', '2023-03-30 00:56:14', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(6, 1, '72.255.36.36', '2023-03-30 00:56:15', 'Opera Version = 96.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0'),
(7, 1, '72.255.36.36', '2023-03-30 04:09:15', 'Chrome Version = 111.0.0.0', 'Android', 'Mozilla/5.0 (Linux; Android 13; KB2005) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36'),
(8, 1, '39.37.169.43', '2023-03-30 12:21:33', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(9, 1, '72.255.36.36', '2023-03-30 14:45:28', 'Opera Version = 96.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0'),
(10, 1, '152.58.54.190', '2023-03-30 21:24:58', 'Firefox Version = 111.0', 'Android', 'Mozilla/5.0 (Android 13; Mobile; rv:109.0) Gecko/111.0 Firefox/111.0'),
(11, 1, '72.255.36.36', '2023-03-31 11:10:13', 'Opera Version = 96.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0'),
(12, 1, '39.55.192.15', '2023-04-06 00:29:20', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(13, 1, '39.55.192.15', '2023-04-09 03:50:02', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(14, 1, '72.255.36.36', '2023-04-09 21:57:41', 'Opera Version = 97.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 OPR/97.0.0.0'),
(15, 1, '39.55.192.15', '2023-04-09 23:38:19', 'Chrome Version = 111.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'),
(16, 1, '72.255.36.36', '2023-04-09 23:38:30', 'Opera Version = 97.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 OPR/97.0.0.0'),
(17, 1, '39.55.192.15', '2023-04-10 20:33:52', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(18, 1, '72.255.36.36', '2023-04-11 11:40:42', 'Opera Version = 97.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 OPR/97.0.0.0'),
(19, 1, '110.39.77.115', '2023-04-11 11:46:28', 'Chrome Version = 112.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(20, 1, '39.55.192.15', '2023-04-12 12:56:16', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(21, 1, '119.160.96.171', '2023-04-24 23:28:00', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(22, 1, '119.160.96.171', '2023-04-25 10:12:26', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(23, 1, '72.255.21.67', '2023-05-01 21:00:31', 'Chrome Version = 112.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(24, 1, '72.255.36.36', '2023-05-02 17:06:26', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(25, 1, '72.255.36.36', '2023-05-02 17:12:23', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(26, 1, '72.255.36.36', '2023-05-02 18:15:33', 'Chrome Version = 112.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(27, 1, '39.55.243.4', '2023-05-02 19:49:22', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(28, 1, '39.55.243.4', '2023-05-04 10:27:29', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(29, 1, '72.255.36.36', '2023-05-04 10:33:41', 'Opera Version = 98.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0'),
(30, 1, '110.39.77.115', '2023-05-05 14:53:01', 'Chrome Version = 112.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(31, 1, '39.55.243.4', '2023-05-05 15:15:45', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(32, 1, '110.39.77.115', '2023-05-05 15:51:03', 'Chrome Version = 112.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(33, 1, '72.255.36.36', '2023-05-05 16:57:40', 'Opera Version = 98.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0'),
(34, 1, '72.255.36.36', '2023-05-05 17:31:04', 'Opera Version = 98.0.0.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 OPR/98.0.0.0'),
(35, 1, '72.255.36.36', '2023-05-08 18:35:00', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(36, 1, '39.55.196.168', '2023-05-08 23:22:38', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(37, 1, '39.55.215.9', '2023-05-10 16:08:45', 'Chrome Version = 112.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'),
(38, 1, '39.55.251.184', '2023-05-16 21:49:31', 'Chrome Version = 113.0.0.0', 'Apple', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36'),
(39, 1, '127.0.0.1', '2023-05-17 23:57:10', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0'),
(40, 1, '127.0.0.1', '2023-05-18 12:23:16', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0'),
(41, 1, '::1', '2023-05-18 14:06:56', 'Chrome Version = 92.0.4515.131', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 Edg/92.0.902.67'),
(42, 1, '::1', '2023-05-18 14:08:13', 'Chrome Version = 92.0.4515.131', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 Edg/92.0.902.67'),
(43, 1, '127.0.0.1', '2023-05-18 15:36:40', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0'),
(44, 1, '127.0.0.1', '2023-05-19 08:38:24', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0'),
(45, 1, '127.0.0.1', '2023-05-19 20:36:10', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0'),
(46, 1, '127.0.0.1', '2023-05-22 23:15:50', 'Firefox Version = 112.0', 'Windows', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 0,
  `assigned_on` datetime NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `admin_id`, `role`, `assigned_on`, `role_name`) VALUES
(1, 1, -1, '2022-06-22 10:13:36', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `athlete_evaluation`
--

CREATE TABLE `athlete_evaluation` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `evaluation_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athlete_evaluation`
--

INSERT INTO `athlete_evaluation` (`id`, `uID`, `evaluation_data`) VALUES
(1, 1, '{\"field_1\":\"88\",\"field_2\":\"\",\"field_3\":\"\",\"field_4\":\"\",\"field_5\":\"\",\"field_6\":\"\",\"field_7\":\"\",\"field_8\":\"\",\"field_9\":\"\",\"field_10\":\"\"}'),
(2, 33, '{\"field_1\":\"a\",\"field_2\":\"b\",\"field_3\":\"cd\",\"field_4\":\"r\",\"field_5\":\"r\",\"field_6\":\"t\",\"field_7\":\"y\",\"field_8\":\"j\",\"field_9\":\"h\",\"field_10\":\"\"}'),
(3, 5, '{\"field_1\":\"\",\"field_2\":\"\",\"field_3\":\"\",\"field_4\":\"\",\"field_5\":\"\",\"field_6\":\"\",\"field_7\":\"\",\"field_8\":\"\",\"field_9\":\"\",\"field_10\":\"\"}'),
(4, 38, '{\"field_1\":\"0\",\"field_2\":\"5\",\"field_3\":\"6\",\"field_4\":\"4\",\"field_5\":\"7\",\"field_6\":\"4\",\"field_7\":\"8\",\"field_8\":\"4\",\"field_9\":\"7\",\"field_10\":\"7\"}');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `coach_name` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `from_time` varchar(10) DEFAULT NULL,
  `to_time` varchar(10) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=accepted, 2= rejected',
  `total_hours` varchar(20) DEFAULT NULL,
  `total_price` decimal(20,2) NOT NULL DEFAULT 0.00,
  `payment_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `uID`, `coach_id`, `coach_name`, `name`, `gender`, `phone`, `address`, `date`, `from_time`, `to_time`, `notes`, `created_at`, `status`, `total_hours`, `total_price`, `payment_id`) VALUES
(1, 1, 25, 'Coach', 'Bilal Yousaf', 'Male', '03333333333333', 'Lahore', '2023-05-15', '15:00', '17:00', 'Testing', '2023-05-01', 1, '2', '19.98', 1),
(2, 33, 34, 'Coach Ammar', 'Ammar', 'Male', '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', '2023-05-02', '13:24', '14:44', 'Nothing', '2023-05-01', 1, '1.33', '33.25', 0),
(3, 33, 34, 'Coach Ammar', 'Ammar', 'Male', '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', '2023-05-03', '14:34', '17:36', '', '2023-05-01', 1, '3.03', '75.75', 2),
(4, 33, 34, 'Coach Ammar', 'Ammar', 'Male', '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', '2023-05-22', '13:44', '21:43', 'yoo', '2023-05-05', 2, '7.98', '199.50', 0),
(5, 33, 25, 'Coach', 'Ammar', 'Male', '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', '2023-05-23', '21:40', '20:40', '', '2023-05-05', 0, '1', '9.99', 0),
(6, 33, 34, 'Coach Ammar', 'Ammar', 'Male', '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', '2023-05-16', '20:41', '21:41', 'yoo', '2023-05-05', 1, '1', '25.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `chat` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` varchar(20) NOT NULL,
  `m_read` int(11) NOT NULL DEFAULT 0,
  `sender_id` int(11) NOT NULL DEFAULT 0,
  `media` text DEFAULT NULL,
  `is_coach` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `user_id`, `player_id`, `chat`, `image`, `created_at`, `m_read`, `sender_id`, `media`, `is_coach`) VALUES
(1, 4, 10, NULL, NULL, '', 1, 0, NULL, 0),
(2, 4, 10, 'yo', NULL, '2023-03-22 16:40:00', 1, 4, NULL, 0),
(9, 4, 10, 'hi', NULL, '2023-03-22 16:42:07', 1, 10, NULL, 0),
(11, 34, 33, NULL, NULL, '', 1, 0, NULL, 0),
(12, 34, 33, 'heloo', NULL, '2023-04-11 11:18:02', 1, 34, NULL, 0),
(13, 34, 33, 'file', NULL, '2023-04-11 11:18:48', 1, 33, '77558fd2f466a396fda34a2c56023234.docx', 0),
(14, 34, 33, 'mm', NULL, '2023-04-11 11:19:05', 1, 33, NULL, 0),
(15, 34, 33, 'kkk', NULL, '2023-04-11 11:19:09', 1, 33, NULL, 0),
(16, 34, 31, NULL, NULL, '', 1, 0, NULL, 1),
(17, 34, 31, 'hello', NULL, '2023-04-11 11:28:23', 1, 34, NULL, 1),
(18, 34, 34, NULL, NULL, '', 1, 0, NULL, 1),
(19, 34, 31, 'there?', NULL, '2023-04-11 11:29:37', 0, 34, NULL, 1),
(20, 34, 33, 'ok', NULL, '2023-04-11 11:30:35', 1, 33, NULL, 0),
(21, 33, 31, NULL, NULL, '', 1, 0, NULL, 1),
(22, 33, 31, 'helooo', NULL, '2023-04-11 11:37:12', 1, 33, NULL, 1),
(23, 33, 3, NULL, NULL, '', 1, 0, NULL, 0),
(24, 33, 28, NULL, NULL, '', 1, 0, NULL, 1),
(25, 33, 28, 'helo', NULL, '2023-04-11 11:38:56', 0, 33, NULL, 1),
(26, 1, 25, NULL, NULL, '', 1, 0, NULL, 1),
(27, 1, 25, 'Hi', NULL, '2023-05-01 20:54:51', 0, 1, NULL, 1),
(28, 5, 25, NULL, NULL, '', 1, 0, NULL, 1),
(29, 6, 29, NULL, NULL, '', 1, 0, NULL, 1),
(30, 6, 34, NULL, NULL, '', 1, 0, NULL, 1),
(31, 33, 25, NULL, NULL, '', 1, 0, NULL, 1),
(32, 34, 33, 'yoo', NULL, '2023-05-05 17:39:09', 1, 33, NULL, 0),
(33, 33, 5, NULL, NULL, '', 1, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupoun` varchar(20) NOT NULL,
  `disocunt` decimal(10,0) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupoun`, `disocunt`, `status`) VALUES
(1, 'PAK', '10', 1),
(2, 'PKKK', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `lparent` int(11) NOT NULL DEFAULT 0,
  `lang_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `code` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `lparent`, `lang_id`, `name`, `subject`, `code`, `email`, `content`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `deleted_by`) VALUES
(1, 0, 2, 'Reset Password', 'Reset Password', 'reset-password', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#FFFFFF\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 18px; line-height: 35px; font-weight: 600; color: #32353b; text-align: inherit;\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit; background: #f0f0f0; padding: 20px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" width=\"27\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0px; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; color: #515358; text-align: center;\" align=\"center\" width=\"27\" height=\"25\"><a style=\"display: inline-block; width: auto; height: 100%; padding: 7px 20px 6px 20px; font-size: 16px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #ffffff; line-height: 1.54; background: #be1e2d; border: 1px solid #FF7300; text-decoration: none; text-transform: uppercase; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;\" href=\"[BUTTONLINK]\" target=\"_blank\" rel=\"noopener noreferrer\">[BUTTONTEXT]</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%!important; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%!important; min-width: 100%!important; margin: 0; padding: 0; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table class=\"x_container x_footer-content\" style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, '2017-10-16 10:08:01', 1, '2017-11-21 13:43:01', 1, 0, 0),
(3, 0, 2, 'Account Verification', 'Account Verification', 'account-verification', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#FFFFFF\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 18px; line-height: 35px; font-weight: 600; color: #32353b; text-align: inherit;\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit; background: #f0f0f0; padding: 20px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" width=\"27\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%!important; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%!important; min-width: 100%!important; margin: 0; padding: 0; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table class=\"x_container x_footer-content\" style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, '2017-11-03 16:30:58', 1, '2017-11-21 13:38:41', 1, 0, 0),
(4, 0, 2, 'Contact Us', 'Contact Us', 'contact-us', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#ffffff\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 18px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; text-align: left; word-break: break-word; border-collapse: collapse!important;\" height=\"40\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; text-align: left;\" height=\"40\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" width=\"22%\" height=\"30\">FULL NAME</td>\r\n<td align=\"center\" width=\"5%\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[SENDER]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Eamil Address</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[EMAIL]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Phone #</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[PHONE]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Subject</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[SUBJECTU]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" colspan=\"3\" height=\"30\">Message:</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" colspan=\"3\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr>\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c;\" align=\"center\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; text-align: center; color: #98999c;\" align=\"center\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; text-align: center; color: #98999c;\" align=\"center\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 1, '2017-11-08 13:43:47', 1, '2020-06-01 22:46:22', 1, 0, 0),
(5, 1, 1, 'Reset Password', 'Reset Password', 'reset-password', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#FFFFFF\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 18px; line-height: 35px; font-weight: 600; color: #32353b; text-align: inherit;\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit; background: #f0f0f0; padding: 20px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" width=\"27\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0px; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; color: #515358; text-align: center;\" align=\"center\" width=\"27\" height=\"25\"><a style=\"display: inline-block; width: auto; height: 100%; padding: 7px 20px 6px 20px; font-size: 16px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #ffffff; line-height: 1.54; background: #be1e2d; border: 1px solid #FF7300; text-decoration: none; text-transform: uppercase; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;\" href=\"[BUTTONLINK]\" target=\"_blank\" rel=\"noopener noreferrer\">[BUTTONTEXT]</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%!important; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%!important; min-width: 100%!important; margin: 0; padding: 0; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table class=\"x_container x_footer-content\" style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, '2017-10-16 10:08:01', 1, '2017-11-21 13:43:01', 1, 0, 0),
(6, 3, 1, 'Account Verification', 'Account Verification', 'account-verification', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#FFFFFF\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 18px; line-height: 35px; font-weight: 600; color: #32353b; text-align: inherit;\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit; background: #f0f0f0; padding: 20px;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" width=\"27\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%!important; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%!important; min-width: 100%!important; margin: 0; padding: 0; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table class=\"x_container x_footer-content\" style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, '2017-11-03 16:30:58', 1, '2017-11-21 13:38:41', 1, 0, 0),
(7, 4, 1, 'Contact Us', 'Contact Us', 'contact-us', 'info@dedevelopers.com', '<table style=\"width: 800px; text-align: left; margin: 30px auto 0 auto; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; vertical-align: top; border: 10px solid #be1e2d; border-spacing: 0; border-collapse: collapse; background-color: #fff;\" align=\"center\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 30px 10px; font-size: 14px; font-weight: normal; line-height: 19px; vertical-align: top; text-align: left; color: #515358; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; min-width: 100%; margin: 0 0 0px 0; padding: 0; vertical-align: top; text-align: left; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"width: 100%; min-width: 100%; margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse;\">\r\n<tbody>\r\n<tr style=\"padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; vertical-align: top; font-size: 14px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; line-height: 20px; color: #515358; word-break: break-word; border-collapse: collapse!important;\" align=\"center\" valign=\"top\"><a style=\"height: 48px; width: 220px; text-align: center; display: block; clear: both;\" title=\"DeDevelopers\" href=\"[BASEURL]\" target=\"_blank\" rel=\"noopener noreferrer\"><img style=\"width: 100%; border: none; outline: none; text-decoration: none;\" src=\"[LOGO]\" alt=\"[BASEURL]\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 20px auto; line-height: 1; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 100%; margin: 0 auto; padding: 0; vertical-align: top; text-align: inherit; border-spacing: 0; border-collapse: collapse; background-color: #ffffff;\" bgcolor=\"#ffffff\">\r\n<tbody>\r\n<tr style=\"margin: 0; padding: 0; vertical-align: top; text-align: left;\" align=\"left\">\r\n<td style=\"margin: 0; padding: 0; font-size: 13px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; vertical-align: top; text-align: left; word-break: break-word; border-collapse: collapse!important;\" align=\"left\" valign=\"top\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td width=\"5%\">&nbsp;</td>\r\n<td width=\"90%\">\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 18px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; text-align: left; word-break: break-word; border-collapse: collapse!important;\" height=\"40\">Hi [USER]!</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; line-height: 20px; text-align: left;\" height=\"40\">[SUBJECT]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0 0 30px 0; font-size: 12px; line-height: 35px; color: #32353b; text-align: inherit;\">\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" width=\"22%\" height=\"30\">FULL NAME</td>\r\n<td align=\"center\" width=\"5%\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[SENDER]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Eamil Address</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[EMAIL]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Phone #</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[PHONE]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" height=\"30\">Subject</td>\r\n<td align=\"center\">:</td>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\">[SUBJECTU]</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 0; font-size: 12px; font-weight: bold; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left; text-transform: uppercase;\" colspan=\"3\" height=\"30\">Message:</td>\r\n</tr>\r\n<tr>\r\n<td style=\"margin: 0; padding: 10px 15px; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; color: #515358; text-align: left;\" colspan=\"3\" height=\"25\">[MESSAGE]</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td width=\"5%\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"width: 100%; height: 2px; margin: 30px auto; text-align: center; border: 0 none; color: #dedede; background-color: #dedede;\" />\r\n<table style=\"width: 100%; border-spacing: 0; border-collapse: collapse; text-align: inherit;\">\r\n<tbody>\r\n<tr>\r\n<td class=\"x_center\" style=\"margin: 0; padding: 0; font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; vertical-align: top; text-align: center; color: #98999c;\" align=\"center\">&copy; 2015 - 2017 DeDevelopers All rights reserved</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; text-align: center; color: #98999c;\" align=\"center\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size: 12px; font-weight: normal; font-family: \'Open Sans\',Arial,Helvetica,sans-serif; text-align: center; color: #98999c;\" align=\"center\">This is an important notification helping you quickly get the most out of DeDevelopers.&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 1, '2017-11-08 13:43:47', 1, '2020-06-01 22:46:22', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events_affiliates`
--

CREATE TABLE `events_affiliates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'dummy.png',
  `link_external` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(20) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_affiliates`
--

INSERT INTO `events_affiliates` (`id`, `title`, `description`, `image`, `link_external`, `status`, `created_at`, `type`) VALUES
(1, 'Athletics', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy.png', 'https://www.google.com', 1, '2023-02-20', 1),
(2, 'Athletics 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy.png', 'https://www.google.com', 1, '2023-02-20', 1),
(3, 'Athletics 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy.png', 'https://www.google.com', 1, '2023-02-20', 1),
(4, 'Athletics 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy.png', 'https://www.google.com', 1, '2023-02-20', 1),
(5, 'Affiliates', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy_affiliates.png', 'https://www.google.com', 1, '2023-02-20', 2),
(6, 'Affiliates 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis, tellus lacus vestibulum dolor, eu bibendum quam metus ac turpis. Etiam blandit neque odio', 'dummy_affiliates.png', 'https://www.google.com', 1, '2023-02-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `lparent` int(11) NOT NULL DEFAULT 0,
  `lang_id` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(150) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` int(11) NOT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `lparent`, `lang_id`, `parent_id`, `title`, `parent`, `slug`, `description`, `image`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `deleted_by`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 0, 2, 0, 'Faq 1', 0, 'faq-1', '<p>Faq 1 Description</p>', NULL, 1, '2021-03-04 09:36:50', 1, '2021-03-04 09:36:50', 1, 0, 0, NULL, NULL, NULL),
(2, 1, 1, 0, 'Faq 1 Arabic', 0, 'faq-1-arabic', '<p>Faq 1 Arabic</p>', NULL, 1, '2021-03-04 09:36:50', 1, '2021-03-04 09:36:50', 1, 0, 0, NULL, NULL, NULL),
(3, 0, 2, 0, 'Faq 2', 0, 'faq-2', '<p>Faq 2</p>', NULL, 1, '2021-03-04 09:37:10', 1, '2021-03-04 09:37:10', 1, 1, 1, NULL, NULL, NULL),
(4, 3, 1, 0, 'Faq 2 Arabic', 0, 'faq-2-arabic', '<p>Faq 2 Des</p>', NULL, 1, '2021-03-04 09:37:10', 1, '2021-03-04 09:37:10', 1, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_default` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` int(11) NOT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `lparent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `direction`, `title`, `slug`, `image`, `status`, `is_default`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `deleted_by`, `meta_title`, `meta_keywords`, `meta_description`, `lparent`) VALUES
(1, 'RTL', 'Arabic', 'arabic', '8f0d07dd16310d8ef1e26982e65b6e71.png', 1, 0, '2020-05-12 16:33:36', 1, '2021-01-27 01:44:29', 3, 0, 0, NULL, NULL, NULL, 0),
(2, 'LTR', 'English', 'english', '74f4d2e8264fd97080449b8ae92129f5.png', 1, 1, '2020-05-12 16:35:36', 1, '2020-08-24 16:07:18', 3, 0, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `n_type` int(11) NOT NULL DEFAULT 0 COMMENT '1=msg',
  `n_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `created_at`, `n_type`, `n_read`) VALUES
(1, 3, 'Bilal Yousaf has sent you a message.', '2023-03-13 01:15:09', 1, 0),
(2, 4, 'Bilal Yousaf has sent you a message.', '2023-03-13 10:16:59', 1, 0),
(3, 4, 'Haris Khan has sent you a message.', '2023-03-13 16:58:11', 1, 0),
(4, 4, 'Haris Khan has sent you a message.', '2023-03-13 16:58:41', 1, 0),
(5, 10, 'ammar afzal has sent you a message.', '2023-03-13 17:02:09', 1, 0),
(6, 4, 'Haris Khan has sent you a message.', '2023-03-13 17:20:02', 1, 0),
(7, 4, 'Haris Khan has sent you a message.', '2023-03-13 17:26:21', 1, 0),
(8, 4, 'Haris Khan has sent you a message.', '2023-03-13 17:28:07', 1, 0),
(9, 10, 'ammar afzal has sent you a message.', '2023-03-22 16:05:44', 1, 0),
(10, 4, 'Bilal Yousaf has sent you a message.', '2023-03-22 16:06:56', 1, 0),
(11, 4, 'Bilal Yousaf has sent you a message.', '2023-03-22 16:07:35', 1, 0),
(12, 1, 'ammar afzal has sent you a message.', '2023-03-22 16:18:01', 1, 0),
(13, 1, 'ammar afzal has sent you a message.', '2023-03-22 16:34:32', 1, 0),
(14, 10, 'ammar afzal has sent you a message.', '2023-03-22 16:37:17', 1, 0),
(15, 10, 'ammar afzal has sent you a message.', '2023-03-22 16:40:00', 1, 0),
(16, 10, 'Bilal Yousaf has sent you a message.', '2023-03-22 16:40:34', 1, 0),
(17, 1, 'ammar afzal has sent you a message.', '2023-03-22 16:40:47', 1, 0),
(18, 1, 'Haris Khan has sent you a message.', '2023-03-22 16:41:51', 1, 0),
(19, 4, 'Haris Khan has sent you a message.', '2023-03-22 16:42:07', 1, 0),
(20, 33, 'Coach Ammar has sent you a message.', '2023-04-11 11:18:02', 1, 0),
(21, 34, 'Ammar has sent you a message.', '2023-04-11 11:18:48', 1, 0),
(22, 34, 'Ammar has sent you a message.', '2023-04-11 11:19:05', 1, 0),
(23, 34, 'Ammar has sent you a message.', '2023-04-11 11:19:09', 1, 0),
(24, 31, 'Coach Ammar has sent you a message.', '2023-04-11 11:28:23', 1, 0),
(25, 31, 'Coach Ammar has sent you a message.', '2023-04-11 11:29:37', 1, 0),
(26, 34, 'Ammar has sent you a message.', '2023-04-11 11:30:35', 1, 0),
(27, 31, 'Ammar has sent you a message.', '2023-04-11 11:37:12', 1, 0),
(28, 28, 'Ammar has sent you a message.', '2023-04-11 11:38:56', 1, 0),
(29, 25, 'Bilal Yousaf has sent you a message.', '2023-05-01 20:54:51', 1, 0),
(30, 25, '<b>Bilal Yousaf</b>  has sent you a booking request.', '2023-05-01 20:55:40', 2, 0),
(31, 1, '<b>Coach (Coach)</b>  has \"<b style=\"color:green\">ACCEPTED</b>\" your booking request.', '2023-05-01 20:56:53', 2, 0),
(32, 25, '<b>Bilal Yousaf</b>  has \"<b style=\"color:green\">Made Payment</b>\" againts your order #1', '2023-05-01 20:57:46', 2, 0),
(33, 34, '<b>Ammar</b>  has sent you a booking request.', '2023-05-01 23:24:39', 2, 0),
(34, 33, '<b>Coach Ammar (Coach)</b>  has \"<b style=\"color:green\">ACCEPTED</b>\" your booking request.', '2023-05-01 23:25:05', 2, 0),
(35, 34, '<b>Ammar</b>  has sent you a booking request.', '2023-05-01 23:31:45', 2, 0),
(36, 33, '<b>Coach Ammar (Coach)</b>  has \"<b style=\"color:green\">ACCEPTED</b>\" your booking request.', '2023-05-01 23:32:23', 2, 0),
(37, 34, '<b>Ammar</b>  has \"<b style=\"color:green\">Made Payment</b>\" againts your order #3', '2023-05-05 17:37:32', 2, 0),
(38, 34, 'Ammar has sent you a message.', '2023-05-05 17:39:09', 1, 0),
(39, 34, '<b>Ammar</b>  has sent you a booking request.', '2023-05-05 17:39:57', 2, 0),
(40, 33, '<b>Coach Ammar (Coach)</b>  has \"<b style=\"color:red\">REJECTED</b>\" your booking request.', '2023-05-05 17:40:17', 2, 0),
(41, 25, '<b>Ammar</b>  has sent you a booking request.', '2023-05-05 17:41:04', 2, 0),
(42, 34, '<b>Ammar</b>  has sent you a booking request.', '2023-05-05 17:41:55', 2, 0),
(43, 33, '<b>Coach Ammar (Coach)</b>  has \"<b style=\"color:green\">ACCEPTED</b>\" your booking request.', '2023-05-05 17:42:07', 2, 0),
(44, 34, '<b>Ammar</b>  has \"<b style=\"color:green\">Made Payment</b>\" againts your order #6', '2023-05-05 17:42:24', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `shipping_fee` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(20,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `transaction_id` varchar(50) DEFAULT NULL,
  `payment_done` int(11) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `created_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uID`, `product_id`, `price`, `address`, `street`, `zipcode`, `shipping_fee`, `tax`, `discount`, `transaction_id`, `payment_done`, `status`, `created_at`) VALUES
(1, 1, 3, '450.00', 'It tower', '45', '54000', '0.00', '60.00', '10.00', '54K33580E7406213S', 1, 2, '2023-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(20,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `status`) VALUES
(1, 'Free', '0.00', 1),
(2, 'Vitality', '4.00', 1),
(3, 'Development', '8.00', 1),
(4, 'Pro', '12.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages_list`
--

CREATE TABLE `packages_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages_list`
--

INSERT INTO `packages_list` (`id`, `title`, `pID`) VALUES
(14, 'Personal Profile and dashboard', 3),
(15, 'Coach Network', 3),
(16, 'Exclusive content', 3),
(17, 'Full biological data capabilities', 3),
(18, 'Personal Profile and dashboard', 4),
(19, 'Coach Network', 4),
(20, 'Nutition insights and analysis \r\nfrom data', 3),
(21, 'Premium personalized workouts', 3),
(22, 'Propensity bundles and coaching', 3),
(23, 'Add-on Services: Biometrics,\r\nNutrition, Coaching, Sportswear, \r\nEquipment etc', 3),
(24, 'Exclusive affiliate connections', 3),
(25, 'Exclusive content', 4),
(26, 'Full biological data capabilities', 4),
(27, 'Nutition insights and analysis \r\nfrom data', 4),
(28, 'Full range personalized workouts', 4),
(29, 'Propensity bundles and coaching', 4),
(30, 'Discounted Biometrics, Nutrition,\r\nCoaching, Sportswear, Events, \r\nEquipment, Conferences, \r\nTechnologies, Competitor data,\r\n Media etc', 4),
(31, 'Exclusive affiliate connections', 4),
(42, 'Personal Profile and dashboard', 1),
(43, 'Coach Network', 1),
(44, 'Exclusive content', 1),
(45, 'Basic personalized workouts', 1),
(46, 'Add-on Services: Biometrics,Nutrition, Coaching, Sportswear, Equipment etc', 1),
(47, 'Personal Profile and dashboard', 2),
(48, 'Coach Network', 2),
(49, 'Exclusive content', 2),
(50, 'Full biological data capabilities', 2),
(51, 'Premium personalized workouts', 2),
(52, 'Propensity bundles', 2),
(53, 'Add-on Services: Biometrics,Nutrition, Coaching, Sportswear, Equipment etc', 2),
(54, 'Access to affiliates', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `lparent` int(11) NOT NULL DEFAULT 0,
  `lang_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `by_default_banner` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ip` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `slug` text NOT NULL,
  `w_image` varchar(255) DEFAULT 'dummy_image.png',
  `show_sections` varchar(255) DEFAULT '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `lparent`, `lang_id`, `title`, `descriptions`, `image`, `by_default_banner`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `ip`, `created_at`, `updated_at`, `is_deleted`, `created_by`, `updated_by`, `deleted_by`, `slug`, `w_image`, `show_sections`) VALUES
(1, 0, 2, 'About Us', '<p><span style=\"font-weight: 400;\">Souqpack is a leading packaging company in the GCC market. We operate through an integrated strategy in more than 20 countries including Europe, the USA, Australia, Russia, and the Middle East, to fulfill all client&rsquo;s needs with eco-friendly packaging products.&nbsp;We have been founded to be packaging suppliers to multinational brands for 17 years.</span></p>\r\n<p><span style=\"font-weight: 400;\">According to the new industry variable, we have agreed to go digital with the introduction of <strong>SouqPack </strong>E-commerce, where all packaging items are available in any quantity to accommodate any size of the company.&nbsp;</span><span style=\"font-weight: 400;\">Generally, we promise a high degree of customer service from the moment of order approval to receipt to ensure that it completely satisfies the specifications.</span></p>\r\n<p>&nbsp;</p>\r\n<div class=\"first-sentence-half\">&nbsp;</div>\r\n<p>&nbsp;</p>', '', 0, '', '', '', 1, '110.36.238.98', '2017-10-18 12:40:28', 127, 0, 1, 3, 0, 'about-us', 'dummy_image.png', '1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(2, 0, 2, 'Terms and Conditions', '<ol>\r\n<li><strong>Introduction<br /> Welcome to Souqpack.com. These are the terms and conditions governing your access to and use of the website Souqpack.com and its related sub-domains, sites, services, and tools (the \"Site\"). By accepting these terms and conditions (including the linked information herein), and by using the Site, you represent that you agree to comply with these terms and conditions with Souqpack.com FZ-LLC (\"we\", \"us\" or \"Souqpack.com\") in relation to your use of the Site (the \"User Agreement\"). This User Agreement is effective upon acceptance. If you do not agree to be bound by this User Agreement please do not access, register with, or use this Site.<br /> Before you may become or continue as a member of the Site, you must read, agree with and accept this User Agreement and Souqpack.com\'s Privacy Policy (the \"Privacy Policy\"). You should read this User Agreement and the Privacy Policy and access and read all further linked information referred to in this User Agreement, as such information contains further terms and conditions that apply to you as a user of Souqpack.com. Such linked information including but not limited to the Privacy Policy is hereby incorporated by reference into this User Agreement.</strong></li>\r\n<li><strong>Eligibility for Membership<br />com wishes to ensure that its members are able to form legally binding contracts and further that minors do not purchase unsuitable content. Therefore membership of the Site is not available to persons under the age of 18 years. You represent that you are 18 years of age or over the age of 18 years before you become a member of the Site. Without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law, Souqpack.com reserves the right to limit or withdraw access to the Site or the membership of any person if Souqpack.com believes that person is under the age of 18 years. The Site is not available to persons whose membership has been suspended or withdrawn by Souqpack.com. Further, if you are registering as a business entity, you represent that you have the authority to bind that entity to this User Agreement and that you and the business entity will comply with all applicable laws relating to online trading. No person or business entity may register as a member of the Site more than once.</strong></li>\r\n<li><strong>Your Account and Registration Obligations<br /> When you register as a member of the Site you have been or will be required to provide certain information and register a username and password for use on this Site.<br /> On becoming a member of the Site, you agree:</strong>\r\n<ul>\r\n<li><strong>You are responsible for maintaining the confidentiality of, and restricting access to and use of, your account and password, and accept responsibility for all activities that occur under your account and password. You agree to immediately notify Souqpack.com of any unauthorized use of your password or account or any other breach of security. In no event will Souqpack.com be liable for any direct, indirect, or consequential loss or loss of profits, goodwill, or damage whatsoever resulting from the disclosure of your username and/or password. You may not use another person\'s account at any time, without the express permission of the account holder. You agree to reimburse Souqpack.com for any improper, unauthorized, or illegal use of your account by you or by any person obtaining access to the Site, services, or otherwise by using your designated username and password, whether or not you authorized such access.</strong></li>\r\n<li><strong>You will provide true, accurate, current, and complete information about yourself as prompted by Souqpack.com\'s registration form (the \"Registration Data\").</strong></li>\r\n<li><strong>You will not include:<br /> (i) any of your contact details, including but not limited to email addresses, telephone numbers, or other personal details; or (ii) the word \"souq\" in your registration user ID.</strong></li>\r\n<li><strong>Your store name shall not include the word \"souq\".</strong></li>\r\n<li><strong>You will treat any other member\'s information provided to you (in accordance with these terms of use and the information on the Site) by Souqpack.com or any other user as confidential.</strong></li>\r\n<li><strong>If you make a payment for our products or services on our website, the details you are asked to submit will be provided directly to our payment provider via a secured connection.</strong></li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<ul>\r\n<li><strong>You will maintain and promptly update the Registration Data to keep it true, accurate, current, and complete. If you provide any information that is untrue, inaccurate, not current or incomplete or if Souqpack.com has reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, or not in accordance with this User Agreement, without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law, Souqpack.com has the right to indefinitely suspend, limit or withdraw your access to the Site and/or your membership of the Site.</strong></li>\r\n</ul>\r\n<p><strong>Souqpack.com may (in its sole discretion and at any time), make any inquiries it considers necessary (whether directly or through a third party), and request that you provide it with further information or documentation, including without limitation to verify your identity and/or ownership of your financial instruments. Without limiting the foregoing, if you are a business entity or registered on behalf of a business entity such information or documentation may include your trade license, other incorporation documents, and/or documentation showing any person\'s authority to act on your behalf. You agree to provide any information and/or documentation to Souqpack.com upon such requests. You acknowledge and agree that if you do not, Souqpack.com without liability may limit, suspend or withdraw your access to the Site and/or your membership of the Site. We also reserve the right to cancel unconfirmed/unverified accounts or accounts that have been inactive for a long time.</strong></p>\r\n<ol>\r\n<li><strong>Electronic Communications<br /> You agree that we may communicate with you by email or by posting notices on the Site. You agree that all agreements, notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing. Souqpack.com requires your agreement during the registration process to send you promotional emails to let you know about any new changes, features, or promotional activities added to the Site. If at any time, you decide that you do not wish to receive promotional emails, you can opt-out of receiving such promotional emails by clicking on the link at the bottom of any promotional email.</strong></li>\r\n<li><strong>Amendments to this User Agreement<br /> You acknowledge and agree that Souqpack.com shall endeavor to give you notice for any amendment to this User Agreement that materially increases your obligations or decreases your rights under the User Agreement (\"Substantial Amendment\") in accordance with the terms of this User Agreement. You acknowledge and agree that Souqpack.com at its sole discretion and without liability may make amendments that are not Substantial Amendments without your further specific agreement at any time with immediate effect by posting a notice of the amendment on the Site.</strong></li>\r\n<li><strong>Fees and Services<br />com is not an auction house nor a bank and does not offer auction or banking services. The Site is an online platform allowing for the sale and purchase of items between end-user sellers and buyers.<br /> Membership on the Site is free. Souqpack.com does not charge any fee for browsing, bidding, and buying listed items on the Site. Souqpack.com charges transaction fees to all sellers when their item is successfully sold on the Site, listing fees for classifieds, and special listing fees to sellers who use the special listing feature for listing their items.<br /> Sellers must pay all fees due and payable to Souqpack.com after a successful sale and in the case that a buyer does not complete the transaction, the seller may seek a refund of the relevant transaction fees from Souqpack.com by submitting an online no-sale claim.<br /> Before you list an item for sale through the Site, we request you to review the fees that you will be charged based on our Fees &amp; Credit Policy which we may amend from time to time with immediate effect by posting the changes on the Site.<br /> Souqpack.com may choose to temporarily change the fees for our services for promotional events (for example, free shipping days) or new services, and such temporary changes are effective in accordance with their terms when we post them on the Site.<br /> Unless otherwise stated, all fees shall be quoted in your country\'s currency. You must pay all fees payable to Souqpack.com (and any applicable taxes or charges) within 30 days of the date of any invoice to you from Souqpack.com with a valid payment method as set out in our Fees &amp; Credit Policy.<br /> In case of non-payment of fees and/or any applicable taxes and charges by you to Souqpack.com, without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law, Souqpack.com without liability reserves the right to:</strong>\r\n<ul>\r\n<li><strong>issue you with a warning regarding the non-payment in question.</strong></li>\r\n<li><strong>temporarily or indefinitely suspend, limit or withdraw your access to the Site and/or your membership, if you fail to make the outstanding payment within 7 calendar days of Souqpack.com issuing a warning to you.</strong></li>\r\n<li><strong>com also reserves the right to take any necessary steps including legal action in case of non-payment of fees by you to Souqpack.com</strong></li>\r\n<li><strong>for accounts over 30 days past due, deduct the amount owed from your MyWallet account balance (and you acknowledge and agree to Souqpack.com doing so in these circumstances) and confirm the same to you by email.</strong></li>\r\n<li><strong>deduct from your MyWallet.</strong></li>\r\n<li><strong>invoice you for a fixed late payment fee (as set out in our Fees and Credit Policy from time to time).</strong></li>\r\n<li><strong>take any steps Souqpack.com considers necessary including without limitation legal action for recovery of the outstanding fees and/or any applicable taxes and charges.</strong></li>\r\n</ul>\r\n</li>\r\n<li><strong>Your Information<br /> You grant Souqpack.com a non-exclusive, worldwide, perpetual, irrevocable, royalty-free, sub-licensable (through multiple tiers) right to use any information or material, personal or otherwise, that you provide to us or other users of the Site and/or post on the Site in the registration, bidding, buying, listing or selling process, in the feedback area or through any e-mail or by way of any other feature or use of the Site (the \"Information\") for the purposes of operating and promoting the Site in accordance with this User Agreement and the Privacy Policy. You are solely responsible for the Information, and we act as a passive conduit for your online distribution and publication of the Information.</strong></li>\r\n<li><strong>Use of the Site<br /> While using the Site, you will not:</strong>\r\n<ul>\r\n<li><strong>post Information or content or list items in an inappropriate category or areas on our Site;</strong></li>\r\n<li><strong>post items you do not have a right to link to or include;</strong></li>\r\n<li><strong>post items that are concurrently listed for sale on a website other than the Site;</strong></li>\r\n<li><strong>post Information that is (in our sole discretion) false, fraudulent, inaccurate, misleading, libelous, defamatory, slanderous, unlawfully threatening or would be reasonably considered to constitute harassment;</strong></li>\r\n<li><strong>post comments, questions, or answers that are not factual in nature including without limitation make any racist comments, use profanity, abuse another user, disrespect another\'s culture or make any other derogatory or inappropriate comments;</strong></li>\r\n<li><strong>post counterfeit or stolen items;</strong></li>\r\n<li><strong>post Information or items which infringe any third party\'s intellectual property rights, other proprietary rights, or right to privacy;</strong></li>\r\n<li><strong>post obscene Information or content, including but not limited to pornography or any representation which may (in our sole discretion) be considered indecent;</strong></li>\r\n<li><strong>post Information or content which may (in our sole discretion) constitute offensive or critical political content or content that is contrary to the public interest;</strong></li>\r\n<li><strong>post any Information or content or list items which may (in our sole discretion) be considered culturally or religiously offensive in any way;</strong></li>\r\n<li><strong>post any Information or content or list items which (in our sole discretion) may not be considered to be in compliance with general Islamic Shariah law, rules, morals, values, ethics and traditions;</strong></li>\r\n<li><strong>post Information or content or list items which may (in our sole discretion) threaten national security;</strong></li>\r\n<li><strong>post Information or content or list items which may (in our sole discretion) constitute or be considered to promote gambling;</strong></li>\r\n<li><strong>use \"keyword spamming\" in listing items for sale (when you place brand names or other inappropriate keywords in a title or description for the purpose of gaining attention or diverting members to a listing);</strong></li>\r\n<li><strong>fail to deliver payment for items purchased by you, unless the seller has materially changed the item\'s description or related matters after you bid, a clear typographical error is made, or you cannot authenticate the seller\'s identity;</strong></li>\r\n<li><strong>fail to deliver items purchased from you, unless the buyer fails to meet the posted terms, or you cannot authenticate the buyer\'s identity;</strong></li>\r\n<li><strong>attempt to conclude transactions relating to an auction or offer for sale on the Site (including by canceling an auction or offer of sale) outside of the Site;</strong></li>\r\n<li><strong>use contacts made by buying or selling on the Site to solicit (including by email or otherwise) sales on other items directly and/or from another website;</strong></li>\r\n<li><strong>claim an item was not sold when in Souqpack.com\'s sole discretion the item was sold in accordance with this User Agreement and the Site\'s policies;</strong></li>\r\n<li><strong>in case of purchase of/placing a successful bid for an artwork which is marked as \"non-exportable\" on the Site you agree that the artwork shall not be exported out of the United Arab Emirates or otherwise dealt in any such manner which shall be in contravention of any applicable laws and regulations for the time being in force;</strong></li>\r\n<li><strong>manipulate or attempt to manipulate the Site in any way including the prices of any item or services on the Site (either alone or in conjunction with other users);</strong></li>\r\n<li><strong>circumvent or manipulate our fee structure, the billing process, or fees owed to Souqpack.com;</strong></li>\r\n<li><strong>take any action that may undermine the Site\'s feedback and rating systems (including but not limited to the display, import, or export of feedback information off the Site or use of such information for purposes unrelated to Souqpack.com);</strong></li>\r\n<li><strong>transfer your Site account (including feedback) and username to another party without our consent;</strong></li>\r\n<li><strong>distribute or post spam, unsolicited or bulk electronic communications, chain letters, or pyramid schemes;</strong></li>\r\n<li><strong>distribute viruses, Trojan horses, worms, time bombs, cancelbots, Easter eggs, or other computer programming technologies that may harm the Site or the interests or property of the Site\'s users;</strong></li>\r\n<li><strong>create liability for us or cause us to lose (in whole or in part) the services of our ISPs or other suppliers;</strong></li>\r\n<li><strong>take any action that imposes or may impose (in our sole discretion) an unreasonable or disproportionately large load on our infrastructure;</strong></li>\r\n<li><strong>interfere or attempt to interfere with the proper working of the Site;</strong></li>\r\n<li><strong>attempt to take over another user\'s account or carry out any hacking or phishing of the Site or user accounts and related features;</strong></li>\r\n<li><strong>export or re-export any Site tools except in compliance with the export control laws of any relevant jurisdictions;</strong></li>\r\n<li><strong>copy, modify, or distribute any content from the Site or otherwise infringe the Site\'s copyright material and/or trademarks in any way;</strong></li>\r\n<li><strong>violate any laws, rules, regulations, guidelines, third party rights, or our policies;</strong></li>\r\n<li><strong>abuse Souqpack.com\'s Shipping Policy, MyWallet Policy, Listing Policy, or any of Souqpack.com\'s other policies or terms and conditions posted on the Site from time to time;</strong></li>\r\n<li><strong>We accept payments online using Visa and MasterCard, credit/debit card in SAR;</strong></li>\r\n<li></li>\r\n<li><strong>directly or indirectly, offer, attempt to offer, trade-in, attempt to trade in,&nbsp;or include descriptions or links to any of the following items:</strong>\r\n<ul>\r\n<li><strong>securities, including shares, bonds, debentures, or any other financial instruments or assets of any description;</strong></li>\r\n<li><strong>living or dead creatures and/or the whole or any part of any animal which has been kept or preserved by any means whether artificial or natural including rugs, skins, specimens of animals, antlers, horns, hair, feathers, nails, teeth, musk, eggs, nests, other animal products of any description the sale and purchase of which is prevented or restricted in any manner by applicable laws;</strong></li>\r\n<li><strong>weapons of any description;</strong></li>\r\n<li><strong>liquor, tobacco products, drugs, psychotropic substances, narcotics, intoxicants of any description, medicines, palliative/curative substances;</strong></li>\r\n<li><strong>religious items, including books, artifacts, etc. of any description or any other such item which is likely to affect the religious sentiments of any person;</strong></li>\r\n<li><strong>antiquities and art treasures as defined in applicable laws pertaining to antiquities and national treasures;</strong></li>\r\n<li><strong>used cellular phone SIM Cards, except if the transaction is in accordance with the local operators\' rules pertaining to the transfer of ownership of the same;</strong></li>\r\n<li><strong>items that to your knowledge are defective, fake, damaged, false or misleading or that may through normal use harm another Site user\'s interest or health;</strong></li>\r\n<li><strong>any items identical to other items you have up for auction but which are priced lower than your other items\' price, the reserve price of such other item / minimum bid amount;&nbsp;</strong><strong>fresh food;</strong></li>\r\n<li><strong>non-transferable vouchers; and chemicals.</strong></li>\r\n</ul>\r\n</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p><strong>You undertake, represent, and warrant that:</strong></p>\r\n<ul>\r\n<li><strong>you are 18 years of age or over the age of 18 years;</strong></li>\r\n<li><strong>if you are a corporate representative, you have the authority to bind the corporate entity;</strong></li>\r\n<li><strong>you are the sole and exclusive legal and beneficial owner of all items of any description that you wish to offer for sale on the Site and you have complete right, title, and authority to deal in and offer for sale such items;</strong></li>\r\n<li><strong>you will inform Souqpack.com of any postings, items, or transactions that appear to be in violation of this User Agreement;</strong></li>\r\n<li><strong>you shall comply with all applicable domestic and international laws and regulations regarding and relating to your use of the Site;</strong></li>\r\n<li><strong>information you provide on the Site in respect of items you wish to sell shall be as accurate as reasonably possible;</strong></li>\r\n<li><strong>you will not disclose your contact details including but not limited to phone numbers, addresses, or email addresses in the bidding, buying, or listing processes, or anywhere on the Site including the feedback area, discussion forum, or through any e-mail feature of the Site intended to bypass the use of Souqpack.com;</strong></li>\r\n<li><strong>you will not use the contact information provided to you during the course of a transaction on the Site to solicit additional sales offline or on another website;</strong></li>\r\n<li><strong>you will not harvest or otherwise collect information about users, including but not limited to email addresses and other contact information;</strong></li>\r\n<li><strong>you will not disclose or publicize any personal information about users or otherwise access or use information about other users in a manner which (in our sole discretion) may constitute a breach of privacy and/or applicable laws.</strong></li>\r\n</ul>\r\n<ol>\r\n<li><strong>Copyright<br /> All content included on the Site, including but not limited to text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property and copyright work of either Souqpack.com, its users, its content suppliers or its licensors and is protected by copyright, trademarks, patents or other intellectual property rights and laws. The compilation of the content on the Site is the exclusive property and copyright of Souqpack.com and is protected by copyright, trademarks, patents, or other intellectual property rights and laws.</strong></li>\r\n<li><strong>Trademarks<br /> \"Souqpack.com\" and related logos, and other words and logos on the Site are either unregistered trademarks or registered trademarks of Souqpack.com and are protected by international trademark and other intellectual property rights and laws. Souqpack.com\'s trademarks may not be used in connection with any product or service that is not Souqpack.com\'s nor in any manner that disparages or discredits Souqpack.com. All other trademarks not owned by Souqpack.com that appear on the Site are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by Souqpack.com.</strong></li>\r\n<li><strong>Abusing Souqpack.com<br /> Please report problems of any kind or violations of this User Agreement to Souqpack.com. If you believe that your intellectual property rights have been violated, please notify Souqpack.com. Without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law, Souqpack.com may limit, suspend or withdraw a user\'s access to the Site and/or a user\'s membership of the Site or remove hosted content. Also, Souqpack.com can choose to take other technical and/or legal steps against users who create problems or possible legal liabilities of any kind, who infringe on the intellectual property rights of third parties, or who act inconsistently with this User Agreement or our policies.</strong></li>\r\n<li><strong>Buyer Protection<br />com has a \"Buyer Protection Program\" which seeks to assist buyers to ensure their purchase is protected against fraud by any sellers on the Site. The Buyer Protection Program involves reimbursement by Souqpack.com to the buyer of the value of the item only. To be eligible under the Buyer Protection Program a buyer needs to file a complaint with Souqpack.com within 48 hours of receiving (or not receiving) the relevant item. Souqpack.com will investigate the matter and if it has been determined (by Souqpack.com in its sole discretion) that the seller has intentionally defrauded the buyer in relation to the item for which Souqpack.com has reimbursed the buyer, Souqpack.com may limit, suspend or withdraw the seller\'s access to the Site and/or the seller\'s membership and Souqpack.com may charge the seller for Souqpack.com\'s costs in reimbursing the buyer and for any handling and shipping (in accordance with the Fees &amp; Credit Policy. Souqpack.com reserves the right to take such further steps as it considers necessary including without limitation legal action. You acknowledge and agree that if any item returned to Souqpack.com by a buyer is illegal or otherwise unlawful that Souqpack.com may in its sole discretion destroy the item or take any other steps as it considers necessary.<br /> Shipping fees for returned Items :</strong>\r\n<ul>\r\n<li><strong>Return item due to Seller\'s Fault (Item is not as described &ndash; item defective ... etc.)</strong>\r\n<ol>\r\n<li><strong>If the buyer claimed Within the 15 Days of the date of delivery<br /> -Souq pays the Delivery Shipment Fees<br /> -Seller Pays the Return Shipment Fees<br /> -In case the submitted return request by the customer is not approved by Souq and the customer rejected to receive back the unit, Souq has the right after 60 days from the customer&rsquo;s rejection date to dispose of the item.</strong></li>\r\n<li><strong>If the buyer claimed after the 15 Days of the date of delivery ( *Only if returned approved )<br /> -Buyer pays the Delivery Shipment Fees<br /> -Seller Pays the Return Shipment Fees<br /> -In case the submitted return request by the customer is not approved by Souq and the customer rejected to receive back the unit, Souq has the right after 60 days from the customer&rsquo;s rejection date to dispose of the item.</strong></li>\r\n</ol>\r\n</li>\r\n<li><strong>Return item due to Buyer\'s Fault (* Item in the original state &amp; condition when purchased and received.)</strong>\r\n<ol>\r\n<li><strong>If the buyer claimed within the 15 Days of the date of delivery.<br /> -Souq pays the Delivery Shipment Fees<br /> -Souq Pays the Return Shipment Fees</strong></li>\r\n<li><strong>If the buyer claimed after the 15 Days of the date of delivery (* Only if returned approved )<br /> -Buyer pays the Delivery Shipment Fees<br /> -Buyer Pays the Return Shipment Fees</strong></li>\r\n</ol>\r\n</li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<ol start=\"5\">\r\n<li><strong>Platform for Communication<br /> The Site is only a platform for communication whereby users may meet and interact with one another for the purpose of the sale and purchase of items. Souqpack.com does not buy or sell items. Souqpack.com is not and cannot be a party to or control in any manner any transaction between two users of the Site and cannot guarantee that a buyer or seller will complete a transaction or accept the return of an item or provide any refund for the same.</strong></li>\r\n<li><strong>Undeliverable Items<br />com and its affiliates shall have the right to discard, destroy, liquidate or auction and as it may deem appropriate any of the Sellers goods/Items within sixty (60) days after receipt by the Courier Company in the event of those goods/Items are being returned/undelivered from the Customers for any reason, provided that the Seller has been notified of the said return of the Items/Goods by email to his email address provided by the Seller and in the event that the Seller did not arrange for the pickup of the these returned items/goods. This clause shall be considered as an explicit authorization to Souqpack.com to destroy and/or liquated any of the items/goods mentioned above and shall be without any objection from the Sellers and without any liability to Souqpack.com. Furthermore, Souqpack.com is also authorized to deduct any fees or costs that might be incurred through the disposition and/or liquidation of the above which shall be claimed and/or deducted from the account of the Seller.</strong></li>\r\n<li><strong>Privacy</strong></li>\r\n</ol>\r\n<p><strong>Venice.com has an SSL security certificate to ensure that all the data you enter is encrypted and we are constantly updating it.</strong><strong><br /> Souqpack.com takes reasonable measures (physical, organizational, and technological) to safeguard against unauthorized access to your personally identifiable information and to safely store your personally identifiable information. However, the Internet is not a secure medium and the privacy of your personal information can never be guaranteed. Souqpack.com has no control over the practices of third parties (e.g. website links to this Site or third parties who misrepresent themselves as you or someone else). You agree that Souqpack.com may process your personal information that you provide to it for the purposes of providing the services on Souqpack.com and for sending marketing communications to you and that the Privacy Policy of this Site governs our collection, processing, use, and any transfer of your personally identifiable information.</strong></p>\r\n<ol start=\"8\">\r\n<li><strong>Breach of User Agreement<br /> Without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law or otherwise, Souqpack.com may immediately and without liability: limit your activity, remove your bids, end your listings, warn other users of your actions, temporarily / indefinitely suspend, limit or withdraw your membership, and/or limit or withdraw your access to the Site:</strong>\r\n<ul>\r\n<li><strong>If you breach this User Agreement;</strong></li>\r\n<li><strong>If Souqpack.com is unable to verify or authenticate any information you provide; or</strong></li>\r\n<li><strong>If Souqpack.com believes (in its sole discretion) that your actions may cause legal liability for you, other users, or Souqpack.com.</strong></li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p><strong>Souqpack.com may at any time at its sole discretion reinstate suspended users. A user that has been indefinitely suspended or had their membership withdrawn may not register or attempt to register with Souqpack.com or use the Site in any manner whatsoever until such time that such user is reinstated by Souqpack.com. Notwithstanding the foregoing, if you breach this User Agreement Souqpack.com reserves the right to recover any amounts due and owing by you to Souqpack.com or any losses and damages caused by you to Souqpack.com and to take such steps including legal action and/or the initiation of criminal proceedings against you as Souqpack.com in its sole discretion deems necessary. Our failure to act with respect to a breach by you or others does not constitute a waiver of Souqpack.com\'s right to take any actions with respect to that or subsequent or similar breaches. Souqpack.com does not guarantee that it will take action against all breaches that there may be of this User Agreement.</strong></p>\r\n<ol>\r\n<li><strong>Bidding and Buying</strong></li>\r\n</ol>\r\n<p><br /> <strong>All bids (under the \"auction\" format) (\"Bids\") and all purchases (under the \"Buy It Now\" format) (\"Purchases\") on the Site are a commitment by you to complete the purchase of the item on which you have placed the Bid or which you have purchased. If you are the highest bidder/purchaser for any item and your Bid / Purchase is accepted by the seller (\"Winning Buyer\"), you are obligated to complete the transaction with the seller. In order for you to qualify and be identified as the Winning Buyer of an auction, the following priority parameters are applied by Souqpack.com:</strong></p>\r\n<ul>\r\n<li><strong>Price: a higher price Bid always supersedes any lower price bids;</strong></li>\r\n<li><strong>Quantity: Between Bids of the same price, a Bid for a higher quantity shall supersede;</strong></li>\r\n<li><strong>Time: Between Bids of the same price and for the same quantity, the Bid which was placed first in point of time shall supersede other such Bids.</strong></li>\r\n</ul>\r\n<p><strong>You acknowledge and agree that in the event that dual Winning Buyers are displayed on the Site for a single auction, the user who receives an email from the Site declaring them the Winning Buyer will be the only Winning Buyer for that auction. Souqpack.com\'s decision on the success or otherwise of a bid shall be final and binding. It reserves the right to reject or void bids, whether winning or not, that it deems not to have been made in good faith, or that are restricted or prohibited.</strong></p>\r\n<p><strong>As a Winning B. By bidding or purchasing an item, you agree to be bound by the conditions of sale included by the seller in the item\'s description on the Site (so long as those conditions of sale are not in violation of this User Agreement or are not in compliance with applicable laws). A Winning buyer must contact the seller or initiate an order for the item within 48 hours of the relevant auction closing or of a successful Purchase. As a buyer on the Site, we encourage you to post feedback on the seller after the auction is closed. In the case of consumer goods generally available in retail stores, sellers on the Site may or may not specify the normal retail prices of items being sold. You are advised to independently verify the retail prices of such items if you so desire.</strong></p>\r\n<p><strong>You agree not to test the Site with false bids or purchases, nor to use a false name, other false personal information, or use an unauthorized or known invalid credit card to Bid or Purchase. Without prejudice to the rights and remedies available to Souqpack.com under this User Agreement or at law, Souqpack.com may take such steps as it deems appropriate or necessary including taking legal action against users who intentionally enter erroneous, fictitious or fraudulent Bids or Purchases. Please be aware that even if you do not give Souqpack.com your real name, your web browser transmits a unique address to us, which can be used by law enforcement officials to identify you.</strong></p>\r\n<ol>\r\n<li><strong>Selling &amp; Hosting Auctions<br /> As a registered member of the Site, you may list item(s) for sale on the Site. You may only offer for sale or sell item(s) on the Site in compliance with applicable laws and you must be legally able to offer for sale or sell such items under applicable laws. Listings may only include text descriptions, graphics, and pictures that describe your item for sale. All listed items must be listed in an appropriate category on the Site. Soliciting business offline or outside of the Site, by indicating your contact details (e.g. contact phone number, address, or e-mail) in the item listing or elsewhere on the Site other than in your registration data is expressly prohibited and would constitute a breach of this User Agreement. All of your listed items must be kept in stock to allow for the immediate completion of your transaction with a Winning Buyer. The listing description of the item must not be misleading and must describe the actual current condition of the item. If the item description does not match the actual current condition of the item, you agree to refund any amounts in relation to that item that you may have received from the buyer. You agree not to list a single item multiple times for \"buy now\" sales, including without limitation across various categories on the Site. You acknowledge and agree that Souqpack.com has the right to delete such multiple listings of the same item.<br /> If you receive at least one bid at or above your stated minimum price (or in the case of reserve auctions, at or above the reserve price as defined by the seller in their reserve auction (the \"Reserve Price\")), you are legally obligated to complete the sale with the Winning Buyer. You agree to contact or ship to the Winning Buyer within 48 hours of an item selling successfully and supply the item to the Winning Buyer in a merchantable condition within 48 hours of verifying payment by the Winning Buyer (if the payment is made through MyWallet) or confirming the order by the Winning Buyer (if payment is to be made through COD), unless the Winning Buyer fails to meet the terms of your listing (such as payment method), you cannot authenticate the Winning Buyer\'s identity by way of making direct contact with them, or as otherwise agreed between you and the Winning Buyer. Without limiting any rights or remedies available to Souqpack.com under this User Agreement or at law, Souqpack.com may suspend, limit or withdraw your access to the Site and/or your membership of the Site if you are found to have engaged in false or fraudulent activity in connection with the use of the Site. As sellers on the Site, we encourage you to post feedback on each buyer after an auction is closed. An auction is successfully closed if it receives at least one bid prior to the date and time (as specified in that particular auction) beyond which no further bids are to be accepted (the \"Auction End Date\"). Notwithstanding this, a reserve auction is successfully closed if at least one bid above the Reserve Price is received prior to the Auction End Date.<br /> Immediately after an auction is successfully closed an e-mail is sent from the Site to both the Winning Buyer and the seller providing each of them with the contact information of the other party (including email address, shipping address, and a contact phone number if allowed by them when bidding/purchasing or selling) to enable them to get in touch with each other for the sole purpose of fulfilling the transaction. Please note that the contact information that will be sent out will be the information that is provided by the users in their registration data on Souqpack.com. You acknowledge and agree that Souqpack.com has the right to use your registration data for this purpose and that Souqpack.com is not responsible for the accuracy or otherwise of any user\'s registration data. You acknowledge and agree that you will not use another user\'s data for any purpose other than fulfilling a relevant transaction resulting from selling item(s) on the Site.</strong></li>\r\n<li><strong>Providing Feedback<br />com encourages buyers and sellers on the Site to provide feedback on each other\'s conduct after a transaction has closed; as this helps all users know what it is like to deal with the said buyer/seller. Your feedback will be displayed along with your user ID on the Site. You cannot retract the feedback once you have left it. Souqpack.com will not be responsible or liable in any way for the feedback that you post on the Site. You agree not to make comments that are not factual in nature including without limitation making any racist comments, using profanity, abusing another user, disrespecting another culture or any other derogatory or inappropriate comments. You further agree not to post feedback in order to solicit sales outside of the Site and not to display contact information of any person within any feedback. If you continuously receive negative feedback ratings, without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law, Souqpack.com reserves the right to suspend, limit or withdraw your access to the Site and/or your membership of the Site.<br /> You acknowledge and agree that your feedback consists of comments left by other users with whom you transact and a composite feedback number compiled by Souqpack.com and that together these convey your full user profile. As feedback ratings are not designed for any purpose other than for facilitating trading between the users, you agree that you shall not market or export your Souqpack.com feedback rating in any venue other than on the Site. Souqpack.com does not provide the technical ability to allow you to import feedback from other websites to the Site because a composite number, without the corresponding feedback, does not reflect your true online reputation within our community.</strong></li>\r\n<li><strong>Withdrawal of Access and/or Membership<br /> Without prejudice to any other rights and remedies of Souqpack.com under this User Agreement or at law or otherwise, Souqpack.com may limit, suspend or withdraw your membership and/or your access to the Site at any time, without notice, for any reason, including without limitation, breach of this User Agreement.</strong></li>\r\n<li><strong>No Warranty<br />com makes no warranty that defects will be corrected or that the Site or its servers are free of viruses or anything else which may be harmful or destructive. The nature of Internet communications means that this Site may be susceptible to data corruption, interception, non-availability, and delays. The Site may also be unavailable from time to time due to repairs, maintenance, or development work. You agree that Souqpack.com has no obligation to provide support for the Site. You expressly agree that you use the Site at your own risk.</strong></li>\r\n<li><strong>Limitation of Liabilities<br /> To the extent permitted by law, Souqpack.com, its officers, employees, agents, affiliates, and suppliers shall not be liable for any loss or damage whatsoever whether direct, indirect, incidental, special, consequential or exemplary, including but not limited to, losses or damages for loss of profits, goodwill, business, opportunity, data or other intangible losses arising out of or in connection with your use of the Site, its services or this User Agreement (however arising, including negligence or otherwise and whether or not Souqpack.com has been advised of the possibility of such losses or damages).<br /> If you are dissatisfied with the Site or any content or materials on it, your sole exclusive remedy is to discontinue your use of it. Further, you agree that any unauthorized use of the Site and its services as a result of your negligent act or omission would result in irreparable injury to Souqpack.com, and Souqpack.com shall treat any such unauthorized use as subject to the terms and conditions of this User Agreement.</strong></li>\r\n</ol>\r\n<p><strong>Veneia.com will NOT deal or provide any services or products to any of OFAC (Office of Foreign Assets Control), sanctions countries in accordance with the law of KSA.</strong></p>\r\n<p>&nbsp;</p>\r\n<ol start=\"6\">\r\n<li><strong>Indemnity<br /> You agree to indemnify and hold Souqpack.com and its affiliates, officers, employees, agents, and suppliers harmless from any and all claims, demands, actions, proceedings, losses, liabilities, damages, costs, expenses (including reasonable legal costs and expenses), howsoever suffered or incurred due to or arising out of your breach of this User Agreement, or your violation of any law or the rights of a third party.</strong></li>\r\n<li><strong>Relationship and Notice<br /> None of the provisions of this User Agreement shall be deemed to constitute a partnership or agency between you and Souqpack.com and you shall have no authority to bind Souqpack.com in any manner whatsoever.<br /> Except as explicitly stated otherwise, any notices to Souqpack.com from you shall be given by you by email to Souqpack.com at legal@Souqpack.com with a physical copy sent to us by mail or courier, such notice deemed given on confirmation of its receipt to you by Souqpack.com by return email. Any notices to you from Souqpack.com shall be given by notices posted on the Site or by email to the email address you provide to us during the registration process and shall be deemed to be received by you 48 hours after any such email is sent. Alternatively, we may give you notice by mail or prepaid shipping to the address provided to us during the registration process. In such case, notice shall be deemed given 7 days after the date of mailing.</strong></li>\r\n<li><strong>Transfer of Rights and Obligations<br /> You hereby grant Souqpack.com the right to, and irrevocably acknowledge and agree that Souqpack.com may at any time, transfer all or any part of its rights, benefits, obligations, or liabilities (whether express or assumed) under this User Agreement to any of its affiliates without requiring your further specific agreement. Souqpack.com agrees to use all reasonable endeavors to provide notice to you of any transfer by way of a posting on the Site. You may not at any time, without the prior written consent of Souqpack.com, transfer all or any part of your rights, benefits, obligations, or liabilities (whether express or assumed) under this User Agreement without the prior written consent of Souqpack.com.</strong></li>\r\n<li><strong>General<br /> If any clause of this User Agreement shall be deemed invalid, void, or for any reason unenforceable, such clause shall be deemed severable and shall not affect the validity and enforceability of the remaining clauses of this User Agreement. This User Agreement (as amended from time to time in accordance with the terms of this User Agreement) sets forth the entire understanding and agreement between you and Souqpack.com with respect to the subject matter hereof.<br /> No person who is not a party to this User Agreement shall have any right to enforce any term of this User Agreement. If this User Agreement is translated into any language other than English, whether on the Site or otherwise, the English text shall prevail.</strong></li>\r\n<li><strong>Governing Law</strong></li>\r\n</ol>\r\n<p><strong>KSA is our country of domicile, so Any dispute or claim arising out of or in connection with this website shall be governed and construed in accordance with the&nbsp;</strong><strong>laws of KSA.</strong></p>\r\n<p>&nbsp;</p>', '4e4db1944dca5cb49281d14010fbd20a.jpg', 0, 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 1, '110.36.238.98', '2017-10-18 12:43:42', 127, 0, 1, 3, 0, 'terms-and-conditions', 'dummy_image.png', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');
INSERT INTO `pages` (`id`, `lparent`, `lang_id`, `title`, `descriptions`, `image`, `by_default_banner`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `ip`, `created_at`, `updated_at`, `is_deleted`, `created_by`, `updated_by`, `deleted_by`, `slug`, `w_image`, `show_sections`) VALUES
(3, 0, 2, 'Privacy and Policy', '<p>Privacy Policy All information contained in our Souq packaging is for information only, the terms and conditions of obtaining the use of this information and materials are subject to change, without notice to the products and services listed, as well as associated fees, interest rates, And balance requirements may vary between geographical locations. All products and services are offered at all locations. Your eligibility for certain products or services is subject to souq pack Portal sales.</p>\r\n<p>&nbsp;</p>\r\n<p>As part of the registration on the Souq pack Web site at http://www.souqpack.com/ or use it, you will be asked to provide us with specific personal information, for example, your name, shipping address, email address, telephone number, and other similar information. We may also require certain financial information from you to secure the purchase. When we provide this information, we take all precautions to safeguard your information by not accessing, using, or disclosing it in an unauthorized manner, so that all personal information is fully encrypted.</p>\r\n<p>&nbsp;</p>\r\n<p>All credit/debit card details and personally identifiable information will NOT be stored, sold, shared, rented, or leased to any third parties.</p>\r\n<p>The Website Policies and Terms &amp; Conditions may be changed or updated occasionally to meet the requirements and standards. Therefore the Customers&rsquo; are encouraged to frequently visit these sections in order to be updated about the changes on the website. Modifications will be effective on the day they are posted.</p>\r\n<p>Cookies Policy:</p>\r\n<p>A cookie is only a text string of information transmitted by the souq pack website for packaging http://www.souqpack.com/ to a cookie from the browser on your computer\'s hard drive so that the site can recognize you when you look and remember some information About you. This can include the pages you have visited, the choices you made from the lists, any specific information you have entered into the forms, and the time and date of visit. Cookies Session: These are temporary cookies that end at the end of a browser session. That is when you leave the site. Cookies allow the site to recognize you as you navigate between pages during a single browser session, and allows you to use the most efficient site. For example, session cookies enable a website to remember that the user has placed the items in the online shopping cart. Persistent cookies: In contrast to session cookies, persistent cookies are stored on your equipment between browsing sessions until the expiration or deletion. Because it allows you to \"recognize\" you on your return, remember your options, services tailored to you as well as session cookies and persistent cookies, there may be other cookies that are assigned by the site that you have chosen to visit such a site, In order to provide us or third parties with information</p>', '4a0c5a6f6dd85f5d21cb9b629f32ad1f.jpg', 0, 'Privacy and Policy', 'Privacy and Policy', 'Privacy and Policy', 1, '110.36.238.98', '2017-10-18 12:44:22', 127, 0, 1, 3, 0, 'privacy-policy', 'dummy_image.png', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(6, 1, 1, 'من نحن', '<p style=\"text-align: right;\">سوق باك هي إحدي شركات التعبئة والتغليف الرائدة في أسواق مجلس التعاون الخليجي، تعمل باستراتيجية في أكثر من 20 دولة ومنطقة بما في ذلك أوروبا والولايات المتحدة الأمريكية وأستراليا وروسيا والشرق الأوسط استجابة لمتطلبات عملائنا في صناعة منتجات التغليف صديقة البيئة. على مدار 17 عام تمكنا من التطور لنكون أحد موردي التعبئة والتغليف للعديد من العلامات التجارية العالمية. وتبعاً لمتغيرات السوق العالمية قررنا التحول إلى العالم الرقمي بإطلاق سوق باك للتجارة الالكترونية حيث تجد كل منتجات التعبئة والتغليف متاحة بأي كمية لتناسب كل المشروعات أياً كان حجمها، بشكل عام تضمن لك سوق باك تجربة&nbsp;استخدام رائعة من لحظة تأكيدك الطلب وحتى استلامه والتأكد من مطابقته بالكامل للمواصفات المطلوبة.</p>', '', 0, '', '', '', 1, '110.36.238.98', '2017-10-18 12:40:28', 127, 0, 1, 3, 0, 'about-us', 'dummy_image.png', '1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(7, 3, 1, 'سياسة الخصوصية', '<p style=\"text-align: right;\">سياسة الخصوصية جميع المعلومات الواردة لدينا سوق باك للتغليف <u>http://www.souqpack.com</u><u>/</u> هى لأجل المعلومات فقط، أحكام وشروط الحصول على استخدام هذه المعلومات والمواد تخضع للتغيير، دون إشعار للمنتجات والخدمات المذكورة، فضلا عن الرسوم المرتبطة، وأسعار الفائدة، ومتطلبات التوازن قد تختلف بين المواقع الجغرافية. تقدم جميع المنتجات والخدمات في جميع المواقع. أهليتك للحصول على منتجات أو خدمات معينة تخضع الى مبيعات بوابة فينسيا.</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">كجزء من التسجيل على الموقع سوق باك للتغليف <u>http://www.souqpack.com</u><u>/</u>&nbsp; أو استخدامه سوف يُطلب منك تزويدنا بمعلومات شخصية محددة، على سبيل المثال&nbsp; الاسم، عنوان الشحن، بريدك الالكتروني، رقم هاتفك، معلومات اخرى مشابهة. وقد نحتاج ايضًا بعض معلومات مالية محددة منك لضمان عملية الشراء، عند تزويدنا بتلك المعلومات نتخذ كافة الاحتياطات لمحافظة على معلوماتك، وذلك بعدم الوصول اليها او استخدامها او الافصاح عنها بشكل غير مخول، بحيث تكون جميع المعلومات الشخصية مُشفرة تمامًا.</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">كما أن جميع تفاصيل بطاقات الائتمان ومعلومات التعريف الشخصية لن يتم تخزينها، أو بيعها، أو مشاركتها، أو تأجيرها لأي طرف ثالث.<br /> &nbsp;يمكن تغيير سياسات الموقع الإلكتروني والشروط والأحكام ، أو تحديثها في بعض الأحيان لتلبية المتطلبات والمعايير. وبالتالي&nbsp; يتم تشجيع العملاء على زيارة هذه الأقسام بشكل متكرر، حتى يتم تحديث التغييرات على الموقع الإلكتروني. ستكون التعديلات سارية في يوم نشرها.</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>', '8830e7255610d17a7aa8f0d97e9f0094.jpg', 0, 'Privacy and Policy', 'Privacy and Policy', 'Privacy and Policy', 1, '110.36.238.98', '2017-10-18 12:44:22', 127, 0, 1, 3, 0, 'privacy-policy', 'dummy_image.png', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(8, 2, 1, 'Terms and Conditions', '<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;مرحباً بك في موقع <a href=\"http://www.souqpack.com\">www.souqpack.com</a>&nbsp;الإلكتروني (\"الموقع\").</p>\r\n<p style=\"text-align: center;\">تنص شروط الاستخدام هذه وجميع السياسات والشروط الإضافية (في حال تطبيقها) الموجودة على الموقع على الشروط التي نقدمها لك للدخول الى واستخدام الموقع والخدمات والتطبيقات، بما في ذلك تطبيق الهاتف الجوال الخاصة بنا (ويُشار إليها مجتمعة بـ\"الخدمات\"). يمكنك معرفة جميع السياسات والشروط الإضافية من هنا&nbsp;<a href=\"https://www.noon.com/ar-sa/\">www.souqpack.com</a>&nbsp;(\"الوثائق القانونية\"). تُدرج تلك الوثائق القانونية بالإشارة إليها في شروط الاستخدام الماثلة.</p>\r\n<p style=\"text-align: center;\">حال وصولك و/ أو تسجيلك و/ أو استمرارك في استخدام الخدمات أو الوصول إليها، فأنت توافق على الالتزام بشروط الاستخدام هذه والوثائق القانونية بأثر فوري.</p>\r\n<p style=\"text-align: center;\">ان شروط الاستخدام هذه والوثائق القانونية خاضعة للتعديل من قبلنا في اي وقت. إن استمرار استخدامك للموقع بعد نشر أي تغيير يعني موافقتك على شروط الاستخدام هذه والوثائق القانونية التي تم تعديلها.</p>\r\n<ol style=\"text-align: center;\">\r\n<li>شروط التسجيل</li>\r\n<ol>\r\n<li>يحق لك التسجيل كمشترٍ أو بائع والاستفادة من الخدمات إذا توفرت لديك معايير الاهلية التالية:</li>\r\n<ol>\r\n<li>للمشترين:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>أن تكون بالغاً السن القانونية لتتمكن من شراء المنتجات في بلد إقامتك.</li>\r\n<li>أن تكون قادراً على تقديم عنوان في الإمارات العربية المتحدة أو في المملكة العربية السعودية لتسليم المنتجات.</li>\r\n</ul>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<ol>\r\n<li>للبائعين:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>أن يكون لديك شركة تجارية مسجلة وفقاً لقوانين الدولة الخاصة بك.</li>\r\n<li>أن يكون لديك ترخيص تجاري سارٍ.</li>\r\n<li>أن يمكنك تقديم ما يثبت تفويض الأفراد الذين يقومون بالتسجيل في الموقع أو باستخدامه.</li>\r\n<li>تقديم إثبات الهوية للشخص المفوض.</li>\r\n<li>تقديم بيانات مصرفية داعمة.</li>\r\n<li>تقر وتوافق على أنه قد تنطبق بعض المتطلبات الإضافية لبعض الفئات من المنتجات.</li>\r\n</ul>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<li>للتسجيل على الموقع، سنحتاج إلى تقديم بعض المعلومات، ولن يتم قبول تسجيلك في الموقع إذا لم يتم تقديم المعلومات اللازمة لنا. لدينا الحق في رفض أي من عمليات التسجيل دون إبداء الأسباب. كما يحق لنا أيضاً القيام بعمليات التحقق اللازمة للتأكد من هويتك ومتطلبات التسجيل.</li>\r\n<li>وبمجرد الانتهاء من التسجيل بنجاح، يستمر التسجيل الخاص بك لفترة غير محددة خاضعاً لاحتمال تعليقه أو إلغائه وفقاً للبند رقم 6 من شروط الاستخدام هذه.</li>\r\n</ol>\r\n<li>الالتزامات الخاصة بك</li>\r\n<ol>\r\n<li>عند استخدامك للخدمات أو وصولك إليها، فأنت توافق على ما يلي:</li>\r\n<ol>\r\n<li>مسؤوليتك عن الحفاظ على الخصوصية وتقييد الوصول إلى الحساب الخاص بك واستخدامه هو وكلمة المرور، والموافقة على تحمل مسؤولية جميع الأنشطة التي تتم باسم الحساب الخاص بك وكلمة المرور الخاصة بك.</li>\r\n<li>الموافقة على إخطارنا فورا عن أي استخدام غير مصرح به لكلمة المرور أو الحساب الخاص بك أو أي خرقٍ آخر لمعايير الاستخدام الآمن للموقع.</li>\r\n<li>تقديم المعلومات الكاملة والحقيقية والدقيقة والحالية عن نفسك وعن استخدامك للخدمات كما هو محدد من قبلنا.</li>\r\n<li>عدم الإفصاح للغير (باستثناء ما يلزم أو ما هو محدد من قبلنا) عن معلومات المستخدم المقدمة لك.</li>\r\n<li>التعاون مع الطلبات الصادرة عنا للحصول على معلومات إضافية فيما يتعلق بأهليتكك واستخدامك لخدماتنا.</li>\r\n</ol>\r\n<li>عند استخدامك للخدمات أو وصولك إليها، فأنت توافق على أنك لن تقوم بما يلي:</li>\r\n<ol>\r\n<li>نشر أو إدراج أو تحميل أي من المحتويات أو المواد غير المناسبة أو المحظورة في موقعنا، بما في ذلك:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>المحتوى أو المواد غير الملائمة أخلاقياً أو دينياً بأي شكلٍ من الأشكال.</li>\r\n<li>المحتوى أو المواد التي لا تتوافق مع القانون المحلي والشريعة الإسلامية والقواعد والأخلاق والقيم والآداب والتقاليد.</li>\r\n<li>المحتوى أو المواد التي قد تُهدد الأمن القومي.</li>\r\n<li>المحتوى أو المواد التي قد تروج أو تندرج في إطار المقامرة.</li>\r\n<li>الأوراق المالية، بما في ذلك الأسهم أو السندات أو الصكوك أو أي من الأوراق المالية الأخرى أو أي من الأصول.</li>\r\n<li>المخلوقات الحية أو النافقة و/ أو أي جزء من أي حيوان تم الاحتفاظ به أو الحفاظ عليه بأي من الوسائل الصناعية أو الطبيعية.</li>\r\n<li>أي من الأسلحة.</li>\r\n<li>الخمر ومنتجات التبغ والمخدرات والمواد المؤثرة على العقل والمواد المنومة والمسكرات بأي من أنواعها والأدوية الطبية.</li>\r\n<li>حسب علمك، المواد التي تكون معيبة أو زائفة أو تالفة أو مضللة أو قد تسبب ضررا عند استخدامها بشكلٍ طبيعي لمصلحة مستخدم آخر للموقع أو لصحته.</li>\r\n<li>قسائم غير قابلة للتحويل.</li>\r\n<li>المواد الكيميائية.</li>\r\n</ul>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<ol>\r\n<li>نشر المواد التي لا يحق لك مشاركة الرابط الخاص بها أو إدراجها.</li>\r\n<li>نشر المواد المزيفة أو المسروقة.</li>\r\n<li>خرق القانون أو التحايل عليه، أو خرق أي من حقوق الغير أو الأنظمة الخاصة بنا أو السياسات أو خرق القرارات المتعلقة بحالة الحساب الخاص بك.</li>\r\n<li>استخدام الخدمات إذا لم تعد تستوفي معايير أهلية الاستخدام أو كنتَ غير قادر على إبرام عقود ملزمة قانونياً أو تم ايقاف حسابك بشكلٍ مؤقت أو لأجلٍ غير مسمى.</li>\r\n<li>عدم تسديدك ثمن المنتجات التي قمت بشرائها، إلا إذا كان هناك سبب قانوني يؤيد ذلك في أي من السياسات الخاصة بنا.</li>\r\n<li>عدم تسليم العملاء المنتجات التي قمت ببيعها (إذا انطبق ذلك)، إلا إذا كان هناك سبب قانوني يؤيد موقفك ومذكور في أي من السياسات الخاصة بنا.</li>\r\n<li>استخدام معلومات الاتصال المقدمة لك أثناء عقد الصفقة عبر الموقع لمحاولة زيادة مبيعاتك خارج حدود الموقع أو عبر مواقع أخرى.</li>\r\n<li>التلاعب في سعر أي من المنتجات.</li>\r\n<li>التدخل في القوائم الخاصة بالمستخدمين الآخرين.</li>\r\n<li>اتخاذ أي إجراء من شأنه أن يقلل من تقييم الموقع وأنظمة التصنيف.</li>\r\n<li>نشر المحتوى الخاطئ أو غير الدقيق أو المضلل أو المخادع أو التشهيري أو ما شابه.</li>\r\n<li>نقل الحساب الخاص بك إلى طرف آخر دون الحصول على موافقة خطية مسبقة من قبلنا.</li>\r\n<li>نشر الرسائل أو المراسلات الإلكترونية غير المرغوب فيها أو ما شابه ذلك.</li>\r\n<li>نشر الفيروسات أو أيٍّ من التقنيات الآخرى التي قد تضر بخدماتنا أو بمصالح المستخدمين الآخرين أو أملاكهم.</li>\r\n<li>خرق:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>القوانين الخاصة بحقوق النشر، العلامة التجارية، براءة الاختراع، الأخلاق، الإعلان، قاعدة البيانات، و/ أو أي من حقوق الملكية الفكرية (ويُشار إليها مجتمعة بـ&nbsp;<strong>\"</strong><strong>حقوق الملكية الفكرية</strong><strong>\"</strong>) التي تتعلق بنا أو المرخصة لنا.</li>\r\n<li>أي من حقوق الملكية الفكرية التي تتعلق بالغير.</li>\r\n</ul>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<ol>\r\n<li>جمع المعلومات الخاصة بالمستخدمين دون الحصول على موافقتهم.</li>\r\n<li>أو التحايل على أي من الإجراءات التقنية التي نتبعها لتقديم الخدمات.</li>\r\n</ol>\r\n</ol>\r\n<li>حقوق الملكية الفكرية</li>\r\n<ol>\r\n<li>باستثناء الحقوق التي تم منحها صراحة وفقاً لشروط الاستخدام هذه:</li>\r\n<ol>\r\n<li>جميع المحتويات الواردة في الموقع تدخل في إطار ملكيتنا الخاصة أو ضمن الملكية الخاصة بمرخصينا، بما في ذلك على سبيل المثال لا الحصر النصوص والرسوم البيانية والشعارات والصور والمقاطع الصوتية والتنزيلات الرقمية والبرمجيات. فنحن (أو المرخصون لنا، وفقاً لما تقتضيه الحالة) نحتفظ بجميع حقوقنا، وملكيتنا ومصلحتنا بالموقع والخدمات -وذلك على سبيل المثال لا الحصر- بجميع حقوق الملكية الفكرية الواردة ضمن شروط الاستخدام هذه.</li>\r\n<li>وأيضاً جميع الحقوق والملكيات والمصالح لأي من المعلومات أو المواد أو المحتويات الأخرى التي تقدمها أنت من خلال استخدامك للخدمات بالإضافة الى جميع حقوق الملكية الفكرية الخاصة بك والواردة ضمن شروط الاستخدام هذه ستصبح ملكاً لنا.</li>\r\n</ol>\r\n<li>توافق على أنه لا يحق لك استخدام العلامات التجارية الخاصة بنا دون وجود موافقة خطية مسبقة.</li>\r\n<li>إن جميع الحقوق غير المخولة لك بشكلٍ واضح في شروط الاستخدام الماثلة يتم الاحتفاظ بها لنا أو للمرخصين لنا.</li>\r\n</ol>\r\n<li>الضمانات والتعهدات والإقرارات</li>\r\n<ol>\r\n<li>تضمن وتتعهد وتقر بما يلي:</li>\r\n<ol>\r\n<li>الامتثال التام للاستمرار بالعمل وفقاً للقوانين والأنظمة واللوائح المطبقة، بما في ذلك على سبيل المثال لا الحصر الالتزام بالتشريعات المتعلقة بقوانين الخصوصية وتنظيم المحتوى.</li>\r\n<li>لديك السلطة الكاملة للتعاقد وفقاً لشروط الاستخدام الماثلة، وأن تنفيذك التزامك بموجب شروط الاستخدام هذه لا يتعارض مع:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>أي من القوانين أو القواعد أو اللوائح أو الإرشادات الحكومية التي تخضع لها.</li>\r\n<li>أي من الاتفاقيات الأخرى التي كنت طرفاً فيها أو التي عليك الالتزام بها.</li>\r\n</ul>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<ol>\r\n<li>إذا قمت بإنشاء حساب أو استخدامه بالنيابة عن شركة فأنت بذلك مخول بالتصرف نيابة عن هذه الشركة وتضمن التزامها بالعمل بشروط الاستخدام الماثلة. ويُعد هذا الحساب ملكاً لهذه الشركة وتحت إدارتها.</li>\r\n<li>أنك مالك أو مخول بمنح الحقوق والتراخيص التي منحتنا إياها وفق شروط الاستخدام هذه.</li>\r\n<li>أي محتوى قمت بتقديمه كجزء من استخدامك للخدمات ولأي من المنتجات التي تقوم بإدراجها، لا ينتهك حقوق الغير في أي مكان حول العالم، على سبيل المثال لا الحصر أي من حقوق الملكية الفكرية (سواء كانت مسجلة أم لا).</li>\r\n</ol>\r\n<li>وفقاً للبند &lrm;5-1، فإن الخدمات تُقدم إليك على \"حالتها الحالية\" دون ضمانات أو تعهدات أو إقرارات. فنحن نخلي مسؤوليتنا عن جميع الضمانات أو التعهدات أو الإقرارات بجميع أشكالها، سواء الصريحة أو الضمنية أو الإضافية، على سبيل المثال لا الحصر جميع الضمانات أو التعهدات أو الإقرارات الخاصة بصلاحية المحتوى للأغراض التجارية أو ملاءمته لغرض محدد أو عام أو عدم مخالفته أو خرقه لأي حقوق أو كون خدماتنا آمنة أو خالية من العيوب أو سوف تعمل دون وجود أي عطل أو سيتم تقديمها في الوقت المناسب أو على العموم.</li>\r\n<li>وعلاوة على ذلك، فعلى الرغم من أننا نحاول أن نتوخى الدقة قدر المستطاع، فإننا لا نضمن أن تكون مواصفات المنتج أو أي محتوى آخر لأي خدمة دقيقاً أو كاملاً أو موثوقاً به أو حديثاً أو خالياً من الأخطاء. بالإضافة إلى ذلك -وبناءً على كونك مشترياً- فأنت توافق على أننا غير مسؤولين عن فحص أو اختبار القوائم أو محتوى الخدمات المقدمة من قبلنا أو من قبل الغير، وأنك لن تحاول أن تضع على عاتقنا مسؤولية أي من الأخطاء او العيوب في اي من القوائم. وبناءً على كونك بائعاً فإنك مسؤول عن مراجعة دقة المحتوى الوارد ضمن القوائم الخاصة بك وأنك لن تحاول أن تضع على عاتقنا أو على عاتق مقدمي المحتوى/ الكتيب مسؤولية وجود أخطاء أو عدم الدقة.</li>\r\n</ol>\r\n<li>المسؤولية والتعويضات</li>\r\n<ol>\r\n<li>لا يوجد في شروط الاستخدام هذه ما من شأنه أن يحد أو يعف مسؤولية أي من الأطراف عن:</li>\r\n<ol>\r\n<li>الاحتيال، بما في ذلك التدليس، الذي يقوم به هذا الطرف.</li>\r\n<li>الوفاة أو الإصابة الشخصية نتيجة لإهمال هذا الطرف.</li>\r\n<li>أي من المسؤوليات الأخرى التي لا يمكن حدها أو الإعفاء منها وفقاً للقانون المعمول به.</li>\r\n</ol>\r\n<li>وفقاً للبند &lrm;5-1، ففي جميع الأحوال لن نتحمل نحن وشركتنا الأم وشركاتنا الفرعية والشركات التابعة ومديرونا ومديروهم والمسؤولون والوكلاء والموظفون والموردون والمقاولون من الباطن أو المرخصين -سواء بناءً على دعوى أو مطالبة في العقد أو ضرر أو إهمال أو خرق واجب قانوني أو خرق لشروط الاستخدام هذه- مسؤوليةَ أي دعوى خاصة بخسارة الأرباح أو فقد البيانات أو المعلومات أو عطل في العمل أو أي خسارة مالية أو أي أضرار خاصة أو غير مباشرة أو عرضية حتى وإن تم إخطارنا نحن أو الشركات التابعة أو المديرين أو المسؤولين أو الوكلاء أو الموظفين أو المرخصين أو الموردين أو المقاولين من الباطن باحتمال وجود مثل هذه الأضرار.</li>\r\n<li>بالإضافة إلى الحد الذي يسمح به القانون المعمول به، فنحن (بما في ذلك، الشركة الأم أو الشركات الفرعية أو الشركات التابعة أو المديرون أو المسؤولون أو الوكلاء أو الموظفون أو الموردون أو المقاولون من الباطن أو المرخصين) لن نتحمل المسؤولية، كما أنك تقر بأنك لن تضع على عاتقنا مسؤولية حدوث أي ضرر أو فقدان ناتجة بشكلٍ مباشر أو غير مباشر عن:</li>\r\n<ol>\r\n<li>المحتوى أو المعلومات الأخرى التي تقدمها عند استخدامك للخدمات.</li>\r\n<li>استخدامك للخدمات أو عدم قدرتك على استخدامها.</li>\r\n<li>التسعير أو الشحن أو التنسيق أو أيٍّ من الإرشادات المقدمة من قبلنا.</li>\r\n<li>التأخر أو الانقطاع في تقديم الخدمات.</li>\r\n<li>الفيروسات أو غيرها من البرامج الضارة التي وجدت من خلال الوصول إلى الخدمات.</li>\r\n<li>وجود أخطاء في الخدمات أو أعطال أو عدم دقة بأي شكل من الأشكال.</li>\r\n<li>تلف الجهاز الخاص بك من خلال استخدام المنتجات التي تم بيعها على الموقع أو من خلال خدماتنا.</li>\r\n<li>المحتوى أو أفعال أو امتناع عن فعل الغير المستخدمين لخدماتنا.</li>\r\n<li>التعليق أو أي اجراءات أخرى نتخذها متعلقة باستخدامك للخدمات.</li>\r\n<li>الفترة الزمنية التي تظهر فيها القوائم الخاصة بك في نتائج البحث أو طريقة ظهورها.</li>\r\n<li>حاجتك إلى تعديل الممارسات أو المحتوى أو السلوك أو خسارتك أو عدم قدرتك على القيام بالأعمال التجارية نتيجة لوجود تغيرات في شروط الاستخدام هذه.</li>\r\n</ol>\r\n<li>ووفقاً للبند &lrm;5-1، إذا ثبت أن البند &lrm;5-2 أو &lrm;5-3 غير قابل للتنفيذ أو التطبيق لأي سبب من الأسباب، ، تقتصر التزاماتنا الكلية بما في ذلك التزام الشركة الأم أو الشركات الفرعية أو التابعة لنا ومديريها أو مسؤوليها أو وكلائها أو موظفيها أو مورديها أو مقاوليها من الباطن أو المرخصين تجاهك سواء كان ذلك نتيجة لأي دعوى أو مطالبة في العقد أو إهمال أو خرق لأي واجب قانوني أو بخلاف ذلك ناتجة عن شروط الاستخدام هذه أو على علاقة بها، ستكون بحد أقصى، القيمة الأدنى&nbsp;</li>\r\n<ol>\r\n<li>السعر الذي تم بيع المنتج به على الموقع وأسعار الشحن الأصلية.</li>\r\n<li>مبلغ الرسوم المتنازع عليها، على ان لا تتجاوز قيمتها إجمالي قيمة الرسوم التي تم تسديدها إلينا خلال فترة الأثني عشر(12) شهراً التي تسبق الإجراء الذي أدى إلى المسؤولية.</li>\r\n<li>ثلاثمائة (300) ريال سعودي.</li>\r\n</ol>\r\n<li>توافق على تعويضنا وإبراء ذمتنا، بما في ذلك تعويض وإبرام ذمة شركتنا الأم والشركات التابعة لها وفروعها والمديرين والمسؤولين والوكلاء والموظفين والموردين والمقاولين من الباطن والمرخصين المتعلقين بشركتنا أو بالشركة الأم والشركات الفرعية والتابعة من وضد أي خسائر وأضرار ونفقات (بما في ذلك الرسوم القانونية وأتعاب المحامين ) (\"المطالبات\") التي تنشأ عن:</li>\r\n<ol>\r\n<li>أي ادعاءات أو مطالبات قدمها الغير نتيجة لاستخدامك الخدمات.</li>\r\n<li>انتهاك أي من الأحكام الواردة في شروط الاستخدام هذه، بما في ذلك على سبيل المثال لا الحصر أي من الضمانات والتعهدات والإقرارات.</li>\r\n<li>انتهاك أي من القوانين المعمول بها، على سبيل المثال لا الحصر قوانين حماية البيانات أو قوانين مكافحة البريد الإلكتروني العشوائي.</li>\r\n<li>الطريقة التي تقوم من خلالها استخدام خدماتنا، على سبيل المثال لا الحصر المحتوى الذي تقوم بنشره، والمنتجات التي تقوم بإدراجها أو العلامات التجارية الخاصة بك التي تنتهك أياً من حقوق الملكية الفكرية للغير أو أن يكون المحتوى الخاص بك به افتراءات أو هجاء أو قذف أو انتهاك لأي من الحقوق الأخرى (بما في ذلك حقوق الخصوصية) المتعلقة بالغير (بما في ذلك مستخدمي المواقع الأخرين).</li>\r\n</ol>\r\n</ol>\r\n<li>التعليق أو الإنهاء أو الإلغاء</li>\r\n<ol>\r\n<li>مع عدم المساس بأيٍّ من الحقوق أو التعويضات أو دون أي مسؤولية تجاهك، يحق لنا حد أو تعليق أو سحب إمكانية دخولك او استخدامك للخدمات أو إلغاء طلب أي منتجات و/ أو حذف المحتوى المقدم من قبلك وفقاً لتقديرنا الخاص. وتجنبا للشك، سيتم رد أي مبالغ تم دفعها واستلامها من قبلنا فيما يتعلق بطلب منتجات تم إلغائه.</li>\r\n</ol>\r\n<li>الإبلاغ عن انتهاك شروط الاستخدام:</li>\r\n<ol>\r\n<li>نلتزم بضمان امتثال المنتجات والمحتوى الوارد في الموقع لشروط الاستخدام هذه. إذا كان المحتوى الوارد لا يتناسب مع شروط الاستخدام هذه يُرجى إخطارنا وسنقوم نحن بالتحقيق في الأمر.</li>\r\n</ol>\r\n<li>الشركات التابعة ل سوق باك والخدمات الإضافية</li>\r\n<ol>\r\n<li>توفر شركة سوق باك للتسويق الالكتروني شركة الشخص الواحد و/أو الشركات التابعة لها (\"الشركات التابعة لسوق باك\") ميزات الموقع والمنتجات والخدمات الأخرى لك عند استخدامك أو اشتراكك كمشتري و/أو كبائع في الموقع. \"شركة تابعة\" تعني ، فيما يتعلق بشخص معين ، أي شركة تسيطر بشكل مباشر أو غير مباشر أو تخضع لسيطرة أو تخضع لسيطرة مشتركة مع هذا الشخص.</li>\r\n<li>لتعزيز تجربتك عبر الموقع ومع الشركات التابعة لـ سوق باك، فإنك توافق بموجب هذا على أنه يجوز لنا إنشاء خدمات و / أو وظائف و / أو حسابات إضافية نيابة عنك، وذلك باستخدام المعلومات التي تقدمها لنا على الموقع.</li>\r\n</ol>\r\n<li>أحكام عامة</li>\r\n<ol>\r\n<li><strong>القانون المطبق</strong><strong>:</strong>&nbsp;إن شروط الاستخدام هذه وأياً من الحقوق أو الواجبات غير التعاقدية ذات الصلة يجب إخضاعها وتفسيرها للقوانين المطبقة في المملكة العربية السعودية..</li>\r\n<li><strong>حل النزاعات</strong><strong>:</strong>&nbsp;إذا كان لديك أي من المشكلات الخاصة بخدماتنا يُرجى الاتصال بنا&lrm;. وسنعمل جاهدين على حل المشكلة التي تواجهك في أقرب فرصة ممكنة. يتم تسوية أي من النزاعات أو الخلافات المتعلقة بشروط الاستخدام هذه، بما في ذلك أي حقوق أو واجبات غير تعاقدية ذات صلة عن طريق محاكم المملكة العربية السعودية.</li>\r\n<li><strong>حقوق الغير</strong><strong>:</strong>&nbsp;الشخص الذي لا يُعد جزءاً من شروط الاستخدام هذه ليس لديه أي حق في تنفيذ أي من شروطها.</li>\r\n<li><strong>علاقة الأطراف</strong><strong>:</strong>&nbsp;لا يوجد في شروط الاستخدام هذه ما يمكن للأطراف أو للغير تأويله أو تفسيره ليفسر العلاقة بيننا على أنها بين شركاء أو وكلاء أو يوجِد مشروعاً مشتركاً بين الأطراف، ولكنه من المفهوم والواضح أن كل الأطراف في الاتفاق هي أطراف مستقلة .</li>\r\n<li><strong>التأكيدات الإضافية</strong><strong>:</strong>&nbsp;تقوم الأطراف بالتصرفات اللازمة أو الترتيب لاتخاذ التصرفات اللازمة وتحرير المستندات وغيرها من الأمور التي تقع ضمن سلطتها من أجل إنفاذ شروط الاستخدام هذه والتحقق من العمل بها، بما في ذلك على سبيل المثال لا الحصر مساعدة كل طرف على الالتزام بالقانون المعمول به.</li>\r\n<li><strong>التنازل</strong><strong>:</strong>&nbsp;تلتزم شروط الاستخدام هذه بضمان تحقيق الفائدة للأطراف ولخلفائهم المعنيين والمُفوضين رسمياً. توافق على أنك لن تقوم بالتنازل عن أو نقل شروط الاستخدام أو أي من الحقوق أو الواجبات الخاصة بك والمتعلقة بشروط الاستخدام هذه، سواء كان ذلك بشكلٍ مباشر أو غير مباشر، دون الحصول مسبقاً على موافقة خطية من قبلنا.</li>\r\n<li><strong>مجمل الاتفاق</strong><strong>:</strong>&nbsp;إن شروط الاستخدام هذه والوثائق المشار إليها أو المدرجة في شروط الاستخدام تمثل مجمل الاتفاق بين الأطراف فيما يتعلق بموضوع الاتفاقية وتسمو على وتحجب جميع الاتفاقيات والمفاوضات والإقرارات السابقة، الخطية أو الشفهية، ذات الصلة بالموضوع. باستثناء ما هو محدد في شروط الاستخدام والوثائق المشار إليها أو المدرجة في شروط الاستخدام الماثلة فلا توجد أي شروط أو إقرارات أو ضمانات أو تعهدات أو اتفاقيات بين الأطراف سواء كان ذلك مباشراً أو غير مباشر أو جماعياً أو صريحاً أو ضمنياً.</li>\r\n<li><strong>التعديلات</strong><strong>:</strong>&nbsp;لا يحق إجراء أي تعديل على شروط الاستخدام هذه أو إدخال أي إضافة أو تكملتها. نحن نحتفظ بالحق في إدخال أي تعديل أو تغيير أو إضافة أو إكمال شروط الاستخدام هذه في أي وقت أو من وقتٍ لآخر. وسنقوم بنشر النسخة الحالية لشروط الاستخدام على الموقع وستكون سارية المفعول عند نشرها على الموقع أو بناء على الموعد المحدد من جانبنا بصفته \"تاريخ السريان\" (إن وجد). إن استخدامك المستمر للخدمات في حال حدوث أي تغييرات يُعد موافقة منك على الالتزام بشروط الاستخدام المعدلة.</li>\r\n<li><strong>قابلية الفصل بين البنود</strong><strong>:</strong>&nbsp;إذا ما تم اعتبار أي من أحكام شروط الاستخدام هذه ملغًى من قبل أيٍّ من المحاكم المختصة أو غير قانوني أو غير معمول به فإنه يتم إلغاء هذا لبند من شروط الاستخدام هذه وتستمر باقي الشروط والأحكام قائمة سارية نافذة طالما ظل الجوهر القانوني والاقتصادي للصفقات التي تمت تحت شروطها قائماً دون أي تأثير معاكس على أطرافها.</li>\r\n<li><strong>القوة القاهرة</strong><strong>:</strong>&nbsp;لا يتحمل أي طرف مسؤولية وجود الخسارة أو الضرر أو التأخير أو عدم الوفاء نتيجة للأعمال الخارجة عن السيطرة لأي من الأطراف سواء كان ذلك العمل يمكن توقعه (مثل القضاء والقدر والإجراءات الصادرة عن السلطات التشريعية أو القضائية أو التنظيمية لأي من الحكومة الفيدرالية أو المحلية أو السلطات القضائية أو الإجراءات التي يقوم بها أي من المقاولين من الباطن التابعين لنا أو أي طرف ثالث مورد البضائع أو الخدمات لنا أو الاضطرابات العمالية أو الانقطاع الكامل للتيار الكهربائي أو المقاطعة الاقتصادية).</li>\r\n<li><strong>عدم التنازل</strong><strong>:</strong>&nbsp;إن التنازل عن أي من الأحكام الواردة في شروط الاستخدام لا يُعد تنازلاً عن أي من الأحكام الأخرى (المشابهة أو غير المشابهة)، ولا يعد أي تنازل آخر تنازلاً مستمراً عن أي من الأحكام المعنية، ما لم ننص على ذلك صراحة وخطياً.</li>\r\n<li><strong>التواصل</strong><strong>:</strong>&nbsp;يمكنك التواصل معنا عبر البريد الإلكتروني، أو عبر مواقع التواصل الإجتماعي الخاص بنا ، أو المحادثة المباشرة على الموقع، أو الاتصال بمركز الاتصال الخاص بنا على الرقم 971582166632 (في الإمارات العربية المتحدة) أو&nbsp;966552222048<strong>&nbsp;</strong>(في المملكة العربية السعودية).</li>\r\n<li><strong>استمرار النفاذ</strong><strong>:</strong>&nbsp;جميع الأحكام التي يُنص على أنها تظل سارية أو التي تسري بطبيعتها بعد إنهاء التعاقد تظل نافذة المفعول بعد إنهاء أو تعليق عضويتك في الموقع.</li>\r\n</ol>\r\n</ol>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>سياسة الضمان</strong></p>\r\n<p style=\"text-align: center;\"><strong>عن الضمان</strong><strong>:</strong></p>\r\n<ol style=\"text-align: center;\">\r\n<li>تضمن سياسة الضمان الخاصة بسوق باك على حماية منتجك من أي عيوب في الخامات والمواد أو التصميم أو التصنيع التي قد تحدث بعد الشراء. في الحالات التي تقوم سوق باك ببيع المنتج مباشرة إليك ولمنتجات محددة، سيتم تقديم ضمان لمدة ثلاثة ايام للمنتجات الغير مطبوعة التي تم شراؤها داخل المملكة العربية السعودية. وفي الحالات التي تم شراء المنتجات من قبل بائع آخر، ستطبق شروط ضمان هذا البائع</li>\r\n<li>في الحالات التي تعتبر فيها سوق باك هي البائع، تتم الإصلاحات المشمولة بالضمان في سوق باك . وفي الحالات التي يتم فيها شراء منتج عن طريق بائع لا سوق باك ، تسري شروط ضمان البائع المعني.</li>\r\n<li>للاستفادة من خدمات الضمان تتطلب الفاتورة الأصلية للتحقق من الرقم التسلسلي وصلاحية الضمان.</li>\r\n<li>فترة إصلاح الضمان هي (15) يوم عمل للمنتجات المشمولة بالضمان من تاريخ استلام المنتج في مستودعات سوق باك وحتى إرسالها.</li>\r\n<li>لا يغطي الضمان جميع المنتجات، تحقق دائمًا من قائمة المنتجات لمعرفة ما إذا كانت مشمولة في تغطية الضمان</li>\r\n<li>لا يمكن تمديد أو تجديد الإصلاح أو الاستبدال في هذا الضمان أو تجديد فترة الضمان. تتوافق شروط الضمان مع سياسة سوق باك.</li>\r\n<li>إذا كان لا يمكن إصلاح المنتج ولكن لا يزال تحت ضمان الشركة المصنعة، فسوف نقدم لك منتج بديل (من نفس البائع)، وإذا لم يتوفر بديل، فسيتم رد أموالك بالكامل.</li>\r\n<li>للاستفادة من خدمات الضمان في حال حدوث أي خلل في منتجك خلال فترة الضمان الصالحة، يرجى أن تقوم برفع طلب من خلال حسابك في سوق باك مع إرفاق صور المنتج والرقم التسلسلي وإرسالها وسنقوم بالتواصل معك خلال 24 ساعة لنتمكن من التحقق من نوع الخلل وتحديد موعد لاستلام المنتج.</li>\r\n</ol>\r\n<table style=\"margin-left: auto; margin-right: auto;\" width=\"741\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><strong>البائع</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>مدة الضمان</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>المنتجات المطبوعة</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>عدد المطالبات لكل خطآ في المنتج</strong><strong>*</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>سوق باك</p>\r\n</td>\r\n<td>\r\n<p>3 ايام (السعودية)</p>\r\n</td>\r\n<td>\r\n<p>14 يوم (السعودية)</p>\r\n</td>\r\n<td>\r\n<p>3</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>بائع آخر</p>\r\n</td>\r\n<td>\r\n<p>يُرجى الرجوع إلى شروط ضمان الجهة الخارجية</p>\r\n</td>\r\n<td>\r\n<p>يُرجى الرجوع إلى شروط ضمان الجهة الخارجية</p>\r\n</td>\r\n<td>\r\n<p>يُرجى الرجوع إلى شروط ضمان الجهة الخارجية</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">*محمي خلال فترة الضمان</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">يمكنك الاتصال بنا عبر البريد الإلكتروني أو وسائل التواصل الاجتماعي أو على الموقع</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong>&nbsp; &nbsp; &nbsp; </strong><strong>مركز المساعدة </strong><strong>:- <a href=\"mailto:help@souqpack.com\">help@souqpack.com</a></strong></p>\r\n<p style=\"text-align: center;\"><strong>&nbsp; &nbsp; &nbsp;</strong><strong>الدعم عبر البريد الآلكتروني </strong><strong>:- <a href=\"mailto:care@souqpack.com\">care@souqpack.com</a></strong></p>\r\n<p style=\"text-align: center;\"><strong>&nbsp; &nbsp; &nbsp; </strong><strong>راسلنا علي&nbsp;</strong><strong>what&rsquo;s App :- &nbsp;</strong><strong>٠٥٥٢٢٢٢٠٤٨</strong></p>\r\n<p style=\"text-align: center;\"><strong>شروط البيع</strong></p>\r\n<ol style=\"text-align: center;\">\r\n<li><strong>مقدمة</strong></li>\r\n<ol>\r\n<li>يُقصد بشروط البيع الأحكام والشروط التي يتم بموجبها توريد وتسليم المشتريات إليك كمشترٍ على موقع&nbsp;<a href=\"https://www.noon.com/ar-sa/\">www.souqpack.com</a>&nbsp;أو على تطبيق الهاتف المتحرك الخاص بنا (المشار إليهما مجتمعين بـ\"الموقع\") الذي تمتلكه وتُديره شركة سوق باك.</li>\r\n<li>يرجى قراءة هذه الشروط بعناية قبل متابعة عملية الشراء عبر الموقع، يُعد إرسالك لأمر الشراء عبر الموقع موافقة منك على شروط البيع هذه والالتزام بما ورد فيها بأثر فوري.</li>\r\n<li>بالإضافة، يرجى قراءة سياسة الخصوصية الخاصة بنا، حيث يخضع استخدامك للموقع وشروط البيع هذه لسياسة الخصوصية الخاصة بنا.</li>\r\n</ol>\r\n<li><strong>قبول أمر الشراء</strong></li>\r\n<ol>\r\n<li><strong>المورد</strong><strong>:</strong>&nbsp;حسب ما تم تحديده في الموقع، يتم بيع كل منتج في أمر الشراء إما من قبلنا أو من قبل بائع محلي او عالمي.</li>\r\n<li><strong>قبول أمر الشراء</strong><strong>:</strong>&nbsp;يتم قبول أمر الشراء الصادر منك من قبلنا عندما نخطرك بالقبول كتابة (سواء بالبريد الإلكتروني أو برسالة قصيرة على الهاتف المتحرك)، وإذا لم يتيسر لنا قبول أمر الشراء الصادر منك فسوف نُخطرك بذلك كتابة أو من خلال مكالمة هاتفية يعقبه إخطار خطي عبر البريد الإلكتروني أو رسالة قصيرة على الهاتف المتحرك، ولن يتم خصم قيمة المنتج من حسابك.</li>\r\n<li><strong>السداد</strong><strong>:</strong>&nbsp;السداد: إصدارك لأمر الشراء هو تفويض منك لنا أو لأي طرف ثالث متخصص في عمليات السداد الإلكتروني بخصم قيمة المشتريات من رصيد بطاقتك الائتمانية أو بطاقة الخصم، علماً بأننا نقبل السداد بموجب:</li>\r\n<ol>\r\n<li>بطاقة ائتمانية أو بطاقة الخصم.</li>\r\n<li>أو من خلال محفظتك الإلكترونية</li>\r\n<li>أو نقداً عند التسليم (مبلغ لا يتجاوز 8,500 ريال سعودي)</li>\r\n</ol>\r\n<li>من أجل تخويل الدفعات ببطاقات ائتمانية/الخصم يجوز أن نطلب منك فتح حساب لدى شركات معالجة المدفوعات الأخرى الخاصة بنا، بما في ذلك قبول الاحكام والشروط الخاصة بها وتقديم التفاصيل الخاصة بك نيابة عنك. وتخولنا أنت بموجبه القيام بذلك ولن نكون مسؤولين أمامك عن أي ضرر أو خسارة قد تتكبدها نتيجة لذلك.</li>\r\n<li>يجوز لنا أن نضيف أو نلغي بطاقات دفع أو وسائل دفع معينة تم قبولها من قبلنا وذلك في أي وقت ودون أي إخطار مسبق من جانبنا.</li>\r\n<li><strong>إلغاء أمر الشراء</strong><strong>:</strong>&nbsp;يمكنك إلغاء أمر الشراء فوراً قبل شحن المنتج لأي سبب كان فقط بالمنتجات الغير المطبوعة .</li>\r\n<li><strong>إلغاء طلبيتك من قبلنا</strong><strong>:</strong>&nbsp;يحق لنا إلغاء طلبيتك عند:</li>\r\n<ol>\r\n<li>عدم تسديد قيمة المشتريات عند استحقاقها.</li>\r\n<li>إخفاقك خلال الفترة الزمنية المعقولة التي نحددها لك في تزويدنا بالمعلومات المطلوبة لتسليم المنتجات إليك.</li>\r\n<li>عدم سماحك لنا خلال فترة زمنية معقولة بتسليم المنتجات إليك أو إخفاقك في تسلُّمها.</li>\r\n<li>في حال محاولة الشراء بالجملة أو الشراء المتعدد وفقًا للبند 2.8 أدناه.</li>\r\n</ol>\r\n<li><strong>شراء بالجملة والشراء المتعدد</strong><strong>:&nbsp;</strong>نحتفظ بالحق في رفض أي طلبات، ووفقًا لتقديرنا الخاص، إذا اكتشفنا شراءًا بالجملة أو شراء متعدد لمنتجات مماثلة.</li>\r\n</ol>\r\n<li><strong>توصيل طلبك</strong></li>\r\n<ol>\r\n<li><strong>تكلفة التوصيل</strong><strong>:</strong>&nbsp;تكون تكلفة توصيل المنتجات وفقاً للاسعار المذكورة على الموقع.</li>\r\n<li><strong>تاريخ التوصيل</strong><strong>:</strong>&nbsp;سيتم عرض هذه المعلومات لك على الموقع.</li>\r\n<li><strong>التأخير في التوصيل</strong><strong>:</strong></li>\r\n<ol>\r\n<li>إذا تأخر توصيلنا للمنتج لأسباب خارجة عن إرادتنا فسوف نتصل بك بأسرع ما يمكن لإعلامك بذلك، وسوف نتخذ خطوات للتقليل من تبعات التأخير في التوصيل.</li>\r\n<li>إذا لم يكن هناك أي شخص في عنوانك لتسلُّم المنتج وتعذَّر توصيل المنتج بالبريد على صندوق بريدك فسوف نعلمك في حينه عن كيفية تسليم المنتج أو تسلُّمك إياه.</li>\r\n<li>إذا لم تتمكن من تسلُّم المنتج منا كما هو متفق عليه أو لم تتمكن من إعادة تحديد موعد آخر لتسليم المنتج بعد تعذُّر تسليمه لك في عنوانك فسوف نتصل بك للحصول على المزيد من التعليمات. سوف نلغي طلبيتك وفقاً لشروط البيع الماثلة عند تعذُّر اتصالنا بك أو ترتيبنا لموعد جديد للتسليم أو التسلُّم على الرغم من جهودنا المتواصلة في هذا الشأن.</li>\r\n</ol>\r\n<li><strong>التوصيل من خارج البلاد</strong><strong>:</strong>&nbsp;قد يتم تسجيلك كمستورد في حال طلبك توصيل منتجات تكون من خارج البلاد. وفي هذه الحالة، يجب عليك التحقق من أن المنتجات المطلوبة مطابقة للقانون واللوائح، وعليك أيضاً الالتزام بسداد كافة الرسوم والجمارك المقررة على مشترياتك . وفيما يتعلق بالجمارك، يرجى الأخذ في الاعتبار ما يلي:</li>\r\n<ol>\r\n<li>قد تخضع لرسوم الاستيراد و/أو الضرائب عند طلب المنتجات التي تتطلب التوصيل من خارج البلاد، والتي قد تُفرض بمجرد وصول الطرد إلى الوجهة المحددة؛</li>\r\n<li>عليك ان تتحمل مباشرة أي رسوم إضافية للتخليص الجمركي، والعلم بأن ليس لدينا السيطرة على هذه الرسوم؛</li>\r\n<li>تختلف السياسات الجمركية من بلد إلى آخر، لذا يجب عليك الاتصال بمكتب الجمارك المحلي للحصول على مزيد من المعلومات (فيما يتعلق بالعمليات الجمركية والرسوم المطبقة)؛ و</li>\r\n<li>يجب أن تكون على علم بأن المنتجات التي تتطلب التوصيل من خارج البلاد قد تكون عرضة للفتح والتفتيش من قبل موظفي الجمارك في بلد المقصد.</li>\r\n</ol>\r\n<li><strong>ملكية المنتجات</strong><strong>:</strong>&nbsp;تصبح المنتجات مملوكة منك بمجرد ان نوصلها إليك في عنوان التسليم وسدادك لقيمتها كاملة.</li>\r\n<li><strong>إصدار الفواتير</strong><strong>:</strong>&nbsp;سوف نصدر فاتورة إلكترونية بقيمة مشترياتك ونرسلها إلى بريدك الإلكتروني الذي تزودنا به.</li>\r\n</ol>\r\n<li><a href=\"https://help.noon.com/hc/ar/articles/115001231234-%D9%85%D8%A7-%D9%87%D9%8A-%D8%B3%D9%8A%D8%A7%D8%B3%D8%A9-%D8%A7%D9%84%D8%A5%D8%B1%D8%AC%D8%A7%D8%B9-%D9%84%D8%AF%D9%89-%D9%86%D9%88%D9%86-\"><strong>الإرجاع والإستبدال</strong></a></li>\r\n<ol>\r\n<li>يوضح الجدول التالي سياسة الإرجاع والإستبدال الخاصة بنا حسب فئة كل منتج:</li>\r\n</ol>\r\n</ol>\r\n<table style=\"margin-left: auto; margin-right: auto;\">\r\n<thead>\r\n<tr>\r\n<td>\r\n<p><strong>أسباب الإرجاع والإستبدال</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>إمكانية الإرجاع والإستبدال</strong></p>\r\n</td>\r\n<td>\r\n<p><strong>شروط الإرجاع</strong></p>\r\n</td>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>استلامك المنتج الخاطئ،</p>\r\n<p>استلامك منتجا ليس كما تم وصفه في الموقع، أو</p>\r\n<p>استلامك منتجا تالفا.</p>\r\n</td>\r\n<td>\r\n<p>نعم</p>\r\n<p>بالنسبة للمنتجات الغير مطبوعة، يجب عليك إرجاع المنتج خلال ثلاثة (3) أيام من تسلمك إياه.</p>\r\n</td>\r\n<td>\r\n<p>&nbsp;</p>\r\n<p>لم يسبق استخدام المنتج، ويكون على حالته الأصلية بغلافه الأصلي ويتضمن جميع البطاقات.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<ol style=\"text-align: center;\">\r\n<li>&nbsp;</li>\r\n<li>&nbsp;</li>\r\n<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;المنتجات غير القابلة للإرجاع:&nbsp;لا يحق لك إرجاع أو إستبدال أيٍّ من المنتجات التالية:<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;التي سبق استخدامها أو تسببتَ أنت في الإضرار بها أو أصبحت على حال يختلف عما تسلَّمتها عليه.<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;أي مواد استهلاكية تم استخدامها أو تركيبها في شيء آخر.<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;أي منتجات خالية من الرقم المتسلسل الخاص بها أو تم التلاعب به.<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;أي منتجات من التي شملت الطباعة عليها<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bull;&nbsp;المنتجات غير القابلة لللإرجاع لأسباب صحية، التي تم فتحها بعد التوصيل، أو إذا تم خلطها مع عناصر أخرى بعد التوصيل.</li>\r\n<ol>\r\n<li>كيفية الاتصال بنا )للإرجاع والإستبدال (:&nbsp;يمكنك التواصل معنا عبر البريد الإلكتروني، أو عبر مواقع التواصل الإجتماعي الخاص بنا، أو المحادثة المباشرة على الموقع، أو الاتصال بمركز الاتصال الخاص بنا على رقم الهاتف971582166632 (في الإمارات العربية المتحدة) أو 966552222048 (في المملكة العربية السعودية</li>\r\n<li><strong>كيفية إعادة المبالغ</strong></li>\r\n<ol>\r\n<li>وفقا للبند 2-4، بالنسبة للمنتجات التي تم تسليمها، سوف نقوم بإعادة قيمة المنتج الخاضع للإرجاع بالكامل بما في ذلك رسوم إرجاع المنتج إلينا (باستثناء الرسوم التي تم دفعها لشحن المنتج إليك) وينطبق هذا على الحالات التالية:</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<ul style=\"text-align: center;\">\r\n<li>المنتجات المعيبة أو التي يخالف وصفُها ما ورد على الموقع.</li>\r\n<li>إذا كان سبب الإرجاع عائداً لخطأ من جانبنا مثل الخطأ في التسعير أو الوصف أو التأخير في التسليم عن الميعاد المتفق عليه، وغير ذلك.</li>\r\n</ul>\r\n<p style=\"text-align: center;\">ولجميع الحالات الأخرى، سوف نقوم بإعادة قيمة المنتج الخاضع للإرجاع (باستثناء الرسوم التي تم دفعها لشحن المنتج إليك) على أن تتحمل أنت كلفة رسوم إرجاع المنتج إلينا.</p>\r\n<p style=\"text-align: center;\">بالنسبة للمنتجات التي لم يتم تسليمها، يحق لك تسلُّم قيمتها كاملة إذا ألغيت أمر الشراء وفقا للبند 2-6</p>\r\n<ol style=\"text-align: center;\">\r\n<ol>\r\n<li><strong>إجراءات إعادة المبالغ</strong><strong>:</strong>&nbsp;سيكون إعادة المبلغ مماثلاً لنفس طريقة سدادك إياه، وذلك على النحو التالي:</li>\r\n<ol>\r\n<li>إذا كنت قد سددت القيمة نقداً عند التسليم، فسوف نقوم بإعادة القيمة إلى محفظتك الإلكترونية، أو</li>\r\n<li>إذا كنت قد سددت القيمة بموجب بطاقة ائتمانية/الخصم، يمكنك الاختيار بين اعادة المبلغ للبطاقة الائتمانية /الخصم، أو وضعها في محفظتك الالكترونية.</li>\r\n</ol>\r\n<li><strong>متى يتم إعادة المبلغ</strong><strong>:</strong>&nbsp;يتم إعادة المبلغ لك في نفس وقت تسلمنا وفحص المنتج في مركز تهيئة بضائع العميل الخاص بنا، وسيكون تسلمك المبلغ النهائي على النحو التالي:</li>\r\n<ol>\r\n<li>إذا سيتم إعادة المبلغ إلى بطاقتك الائتمانية/الخصم: يتم ذلك خلال ثلاثين (30) يوماً من يوم تسلمنا المنتج الذي تم إرجاعه في مركز تهيئة بضائع العميل الخاص بنا.</li>\r\n<li>إذا سيتم إعادة المبلغ إلى محفظتك الالكترونية فسوف نقوم بإعادة المبلغ فوراً بعد تسلمنا للمنتج في مركز تهيئة بضائع العميل الخاص بنا، وفحص المنتج من قبلنا، أو</li>\r\n<li>إذا ألغيت أمر الشراء قبل موعد الشحن سيتم إعادة المبلغ إليك آلياً.</li>\r\n</ol>\r\n</ol>\r\n</ol>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<ol style=\"text-align: right;\">\r\n<li style=\"text-align: center;\"><strong>المسؤولية القانونية</strong></li>\r\n<ol style=\"text-align: center;\">\r\n<li>لا يوجد في شروط البيع هذه ما من شأنه أن يحد أو يعف مسؤولية أي طرف عن:</li>\r\n<ol>\r\n<li>التحايل، بما في ذلك التدليس الذي يرتكبه هذا الطرف؛ .</li>\r\n<li>الوفاة أو الإصابة الشخصية الناجمة عن الإهمال من جانب هذا الطرف.</li>\r\n<li>أي مسؤولية أخرى لا يجوز حدها أو الإعفاء منها بموجب القانون المعمول به .</li>\r\n</ol>\r\n<li>وفقاً للبند 1-7، لن نكون مسؤولين نحن أو شركتنا الأم أو شركاتنا الفرعية أو التابعة أو العاملون لدينا أو لديهم من مديرين أو أعضاء مجالس إدارة أو موظفين أو وكلاء أو موردين أو مقاولين من الباطن أو المرخصين، تأسيساً على حكم محكمة أو مطالبة ناشئة عن العقد أو على القانون المدني أو بسبب التقصير أو الإخلال بواجبات قانونية أو ناشئة عن شروط البيع الماثلة أو متعلقة بها، عن خسارة أرباح أو بيانات أو معلومات أو أي أضرار لاحقة أو عرضية أو غير مباشرة أو خاصة، حتى لو تم إخطارنا نحن أو شركاتنا التابعة أو مديرينا أو أعضاء مجالس إداراتنا أو وكلائنا أو موظفينا أو المرخصين أو مقاولي الباطن أو الموردين بإمكانية بحدوث مثل تلك الأضرار.</li>\r\n<li>بالإضافة إلى ذلك، أنه وحسب ما يسمح به القانون الساري، فإننا &ndash;ويشمل ذلك شركتنا الأم أو شركاتنا الفرعية أو التابعة أو العاملين لدينا أو لديهم من مديرين أو أعضاء مجالس إدارة أو موظفين أو وكلاء أو موردين أو مقاولين من الباطن أو المرخصين- لن نكون مسؤولين قانوناً، كما أنك تؤكد موافقتك هنا على عدم مسؤوليتنا عن أي أضرار أو خسائر قد تنشأ عما يلي سواء مباشرة أو بطرق غير مباشرة:</li>\r\n<ol>\r\n<li>التوصيل المتأخر للمنتجات أو الإخفاق في توصيل جزء منها إذا أخفقت أنت نفسك في تزويدنا بالمعلومات التي نحتاجها خلال وقت معقول منذ تاريخ طلبنا ذلك أو إذا أخفقت في سداد القيمة.</li>\r\n<li>الأضرار التي قد تنتج عن الإصلاحات غير المصرح بها للمنتجات.</li>\r\n<li>فقدان أي بيانات مخزنة أو تم حفظها في المنتجات التي تم إصلاحها أو إستبدالها.</li>\r\n<li>اعتمادك تماماً على المحتوى أو أي معلومات أخرى يوفرها الموقع وتخص المنتج الذي أصدرت له أمر الشراء.</li>\r\n<li>استخدامك أو عدم قدرتك على استخدام المنتج الذي طلبته.</li>\r\n<li>تأخر أو تعطل الموقع أو تأخر أو تعطل خدماتنا.</li>\r\n<li>الفيروسات أو البرمجيات الخبيثة الإلكترونية الناتجة عن استخدام المنتج الذي طلبته.</li>\r\n<li>الضرر الواقع على جهازك الخاص نتيجة استخدام المنتج الذي طلبته.</li>\r\n<li>فقدانك فرصة عمل أو عدم قدرتك على ممارسة أعمالك أو ما شابه بسبب عدم قدرتنا على توصيل المنتج الذي طلبته في الوقت المحدد.</li>\r\n<li>أي أعمال أو أحداث خارجة عن إرادتنا.</li>\r\n</ol>\r\n<li>طبقاً للبند 1-7، إذا تبين أن البنود 3-6 و 2-7 و3-7 ليست مطبقة أو غير نافذة لأي سبب من الأسباب فعندئذٍ تنحصر المسؤولية القانونية الكاملة لنا أو لشركتنا الأم أو شركاتنا الفرعية أو التابعة أو العاملين لدينا أو لديهم من مديرين أو أعضاء مجالس إدارة أو موظفين أو وكلاء أو موردين أو مقاولين من الباطن أو المرخصين تجاهك سواء بناءً على حكم محكمة أو مطالبة ناشئة عن العقد أو بسبب التقصير أو الإخلال بواجبات قانونية أو ناشئة عن شروط البيع الماثلة أو تتعلق بها، في الحدود التالية بحد أقصى القيمة الادنى لـ:</li>\r\n<ol>\r\n<li>سعر المنتج المباع على الموقع وتكاليف شحنها الأصلية وتكاليف شحن إرجاع المنتج، أو</li>\r\n<li>مبلغ ثلاثمائة (300) ريال سعودي</li>\r\n</ol>\r\n<li>توافق بموجب هذا على تعويضنا وإخلاء مسؤوليتنا نحن أو شركتنا الأم أو شركاتنا الفرعية أو التابعة أو العاملين لدينا أو لديهم من مديرين أو أعضاء مجالس إدارة أو موظفين أو وكلاء أو موردين أو مقاولين من الباطن أو المرخصين، عن الخسائر أو الأذى أو الأضرار أو المصروفات (بما في ذلك الرسوم القانونية واتعاب المحامين) الناشئة عن أو لها علاقة بـ:</li>\r\n<ol>\r\n<li>أي مطالبات أو طلبات يقدمها أي طرف ثالث تكون ناشئة عن استخدامك للموقع ولخدماتنا.</li>\r\n<li>مخالفتك أياً من شروط وأحكام هذا الاتفاق بما فيها ودون قصر أي ضمانات أو إقرارات أو تعهدات.</li>\r\n<li>أو أي مخالفة للقوانين المعمول بها.</li>\r\n</ol>\r\n</ol>\r\n<li style=\"text-align: center;\"><strong>احكام عــــامة</strong></li>\r\n<ol>\r\n<li style=\"text-align: center;\"><strong>القانون المعمول به</strong><strong>:</strong>&nbsp;تخضع شروط البيع وأي حقوق والتزامات غير تعاقدية ناشئة عن شروط البيع المذكورة أو ذات صلة بها للقوانين المطبقة في المملكة العربية السعودية وتُفسَّر وفقاً لهذه القوانين.</li>\r\n<li style=\"text-align: center;\"><strong>تسوية المنازعات</strong><strong>:</strong></li>\r\n<ol style=\"text-align: center;\">\r\n<li>إذا كنت غير راضٍ عن أي المنتجات التي اشتريتها عبر الموقع، يمكنك التواصل معنا عبر البريد الإلكتروني، أو عبر مواقع التواصل الإجتماعي الخاص بنا ، أو المحادثة المباشرة على الموقع، أو الاتصال بمركز الاتصال الخاص بنا&nbsp;</li>\r\n<li>إذا لم تستطع التوصل الى حل حسب ما ورد في البند 2-8 (أ) خلال خمسة وأربعين (45) يوماً من إخطارك للبائع بمشكلتك، يمكنك اللجوء إلى التحكيم وفقاً لقواعد التحكيم الخاصة بـ DIFC-LCIA من قبل محكم واحد. ويكون مركز التحكيم في مركز دبي المالي العالمي وتكون اللغة الانكليزية هي لغة التحكيم.</li>\r\n</ol>\r\n<li style=\"text-align: center;\"><strong>حقوق الغير</strong><strong>:</strong>&nbsp;لا يحق لأي طرف غير أطراف هذه الاتفاقية وضع أيٍّ من بنودها موضع التنفيذ.</li>\r\n<li style=\"text-align: center;\"><strong>علاقة الأطراف</strong><strong>:</strong>&nbsp;لا يجوز تفسير أيٍّ من المذكور في محتوى شروط البيع الماثلة أو اعتباره سواء من أطرافها أو من قبل أي طرف ثالث على أنه مشاركة أو شركة مشتركة بين أطراف الاتفاق، حيث إنه من المفهوم أن أطراف الاتفاق دخلوا في علاقة تعاقد على أداء خدمة كل منهم مستقل عن الآخر.</li>\r\n<li style=\"text-align: center;\"><strong>التأكيدات الإضافية</strong><strong>:</strong>&nbsp;اتفق الأطراف على أن تعمل وتنفذ أو تتخذ الترتيبات لعمل وتنفيذ كل فعل مطلوب أو وثيقة أو أي شيء بشكل معقول كلٍّ في نطاق صلاحياته لتنفيذ وتفعيل شروط البيع الماثلة إلى أقصى مدى لها بما في ذلك ودون قصر مساعدة بعضهما البعض في الامتثال للقانون المعمول به.</li>\r\n<li style=\"text-align: center;\"><strong>التنازل</strong><strong>:</strong>&nbsp;شروط البيع هذه ملزمة لضمان مصلحة أطرافها وخلفائهم والمتنازل لهم المسموح لهم، وتوافق على عدم التنازل عن أو نقل صلاحية تلك الشروط أو أي من الحقوق أو الالتزامات التي تخصك بموجب شروط البيع الماثلة سواء مباشرة أو بطريقة غير مباشرة دون الحصول على موافقة مبدئية خطية من قبلنا على ألا نمتنع من جانبنا عن إصدار الموافقة دون إبداء سبب معقول.</li>\r\n<li style=\"text-align: center;\"><strong>مجمل الاتفاق</strong><strong>:</strong>&nbsp;تحتوي شروط البيع هذه والوثائق المشار إليها أو المرفقة بها على مجمل الاتفاق بين الأطراف فيما يخص موضوعها، وتُلغي كل الاتفاقيات السابقة، والمفاوضات والإقرارات سواء خطية أو شفهية فيما يتعلق بموضوعها. لا توجد بين أطراف الاتفاقية الماثلة أي شروط أو إقرارات أو ضمانات أو تعهدات أو اتفاقيات أخرى سواء مباشرة أو غير مباشرة أو صريحة أو ضمنية غير تلك الاتفاقية الماثلة والمستندات والوثائق المشار إليها أو المرفقة به.</li>\r\n<li style=\"text-align: center;\"><strong>التعديلات والتغييرات</strong><strong>:</strong>&nbsp;لا يمكن تغيير أو تنويع أو تعديل أو استكمال شروط البيع هذه بأي شكل من قبلك وحدك، ونحتفظ بحقنا في تعديل وتنويع واستكمال شروط البيع في أي وقت ومن حين لآخر. سوف نقوم أيضاً بنشر النسخة الحالية من شروط البيع على الموقع، وسيكون كل تغيير س<', '0447190266535caa678346462786716a.jpg', 0, 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 1, '110.36.238.98', '2017-10-18 12:43:42', 127, 0, 1, 3, 0, 'terms-and-conditions', 'dummy_image.png', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
(9, 0, 2, 'Refund  Policy', '<p><u></u><strong>Replacement and Return Policy<br /></strong>Your satisfaction is our goal</p>\r\n<p><strong>Conditions for returning the product<br /></strong>We offer a return policy that enables you to return the product within 3 days of receiving it. Please note that the following conditions must be met to successfully process a product return request:<br />The product can be returned within 3 days from the date of receipt.<br />The product must be in its original packaging with attachments as you have completed the number and quality.<br />It should not be used and be tightly closed.</p>\r\n<p><strong>Who bears the costs of return?<br /></strong>&nbsp;If you receive a product other than the product you ordered, we will cover shipping and return costs.<br />If there is no error or defect in the product but you no longer want it for some reason we are happy to serve you to replace the product after the approval of the sales department, but the store will not bear the cost of shipping and return.</p>\r\n<h4>&nbsp;<strong>What documents do I need for replacement and retrieval?</strong></h4>\r\n<ul>\r\n<li>To replace or retrieve any of your purchases, you need to provide the original receipt (invoice or purchase slip), gift receipt, or delivery notice, as well as valid photo identification.</li>\r\n</ul>\r\n<p><strong><u>Note: All shipments and returns<br /></u></strong>Shipping and handling Taxes are non-refundable.<br />Return shipping may be deducted from your assigned amount.<br />Please keep all packaging requirements for your order<br /><br /> <strong>Refunds will be done only through the Original Mode of Payment. </strong></p>', '03b5a0683b8053416e455ef4d223a2bd.jpg', 0, '', '', '', 1, '', '2020-06-17 19:14:39', 127, 0, 1, 3, 0, 'return-policy', 'dummy_image.png', '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1');
INSERT INTO `pages` (`id`, `lparent`, `lang_id`, `title`, `descriptions`, `image`, `by_default_banner`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `ip`, `created_at`, `updated_at`, `is_deleted`, `created_by`, `updated_by`, `deleted_by`, `slug`, `w_image`, `show_sections`) VALUES
(10, 9, 1, 'سياسة الاسترجاع', '<p style=\"text-align: right;\"><strong>شروط الإرجاع</strong><br />لم يسبق استخدام المنتج، ويكون على حالته الأصلية بغلافه الأصلي ويتضمن جميع البطاقات.-</p>\r\n<p style=\"text-align: right;\"><strong>إمكانية الإرجاع والإستبدال<br /></strong></p>\r\n<p style=\"text-align: right;\">بالنسبة للمنتجات الغير مطبوعة، يجب عليك إرجاع المنتج خلال ثلاثة (3) أيام من تسلمك إياه.-</p>\r\n<p style=\"text-align: right;\"><strong>أسباب الإرجاع والإستبدال</strong><br />&nbsp;استلامك المنتج الخاطيء-<br />&nbsp;استلامك منتج ليس كما تم وصفه في الموقع.-<br />&nbsp; استلامك منتج تالف.-<br /><br /><strong>&nbsp;المنتجات غير القابلة للإرجاع</strong><br />&nbsp;لا يحق لك إرجاع أو إستبدال أيٍّ من المنتجات التالية<br />أولا: التي سبق استخدامها أو تسببتَ أنت في الإضرار بها أو أصبحت على حال يختلف عما تسلَّمتها عليه.<br />ثانيا: أي مواد استهلاكية تم استخدامها أو تركيبها في شيء آخ.<br />ثالثا: أي منتجات خالية من الرقم المتسلسل الخاص بها أو تم التلاعب به.<br />رابعا: أي منتجات من التي شملت الطباعة عليها<br />خامسا: المنتجات غير القابلة لللإرجاع لأسباب صحية، التي تم فتحها بعد التوصيل، أو إذا تم خلطها مع عناصر أخرى بعد التوصيل.<br /><br /><strong>كيفية الاتصال بنا للإرجاع والإستبدال</strong><br />يمكنك التواصل معنا عبر البريد الإلكتروني، أو عبر مواقع التواصل الإجتماعي الخاص بنا، أو المحادثة المباشرة على الموقع، أو الاتصال بمركز الاتصال الخاص بنا على رقم الهاتف971582166632&nbsp;في الإمارات العربية المتحدة أو 966552222048 في المملكة العربية السعودية</p>\r\n<p style=\"text-align: right;\"><strong>كيفية إعادة المبالغ<br /></strong>المنتجات المعيبة أو التي يخالف وصفُها ما ورد على الموقع.<br />إذا كان سبب الإرجاع عائداً لخطأ من جانبنا مثل الخطأ في التسعير أو الوصف أو التأخير في التسليم عن الميعاد المتفق عليه، وغير ذلك.<br />ولجميع الحالات الأخرى، سوف نقوم بإعادة قيمة المنتج الخاضع للإرجاع (باستثناء الرسوم التي تم دفعها لشحن المنتج إليك) على أن تتحمل أنت كلفة رسوم إرجاع المنتج إلينا.<br />بالنسبة للمنتجات التي لم يتم تسليمها، يحق لك تسلُّم قيمتها كاملة إذا ألغيت أمر الشراء&nbsp;<br /><br /><strong>إجراءات إعادة المبالغ</strong><strong><br />&nbsp;سيكون إعادة المبلغ مماثلاً لنفس طريقة سدادك إياه، وذلك على النحو التالي<br /></strong>إذا كنت قد سددت القيمة نقداً عند التسليم، فسوف نقوم بإعادة القيمة إلى محفظتك الإلكترونية، أوإذا كنت قد سددت القيمة بموجب بطاقة ائتمانية/الخصم، يمكنك الاختيار بين اعادة المبلغ للبطاقة الائتمانية /الخصم، أو وضعها في محفظتك الالكترونية.<br /><strong>متى يتم إعادة المبلغ</strong><strong><br />&nbsp;يتم إعادة المبلغ لك في نفس وقت تسلمنا وفحص المنتج في مركز تهيئة بضائع العميل الخاص بنا، وسيكون تسلمك المبلغ النهائي على النحو التالي<br /></strong>إذا سيتم إعادة المبلغ إلى بطاقتك الائتمانية/الخصم: يتم ذلك خلال ثلاثين (30) يوماً من يوم تسلمنا المنتج الذي تم إرجاعه في مركز تهيئة بضائع العميل الخاص بنا.إذا سيتم إعادة المبلغ إلى محفظتك الالكترونية فسوف نقوم بإعادة المبلغ فوراً بعد تسلمنا للمنتج في مركز تهيئة بضائع العميل الخاص بنا، وفحص المنتج من قبلنا، أوإذا ألغيت أمر الشراء قبل موعد الشحن سيتم إعادة المبلغ إليك آلياً.</p>', 'b5a47630b43df39252f1b23980fa4ad6.jpg', 0, '', '', '', 1, '', '2020-06-17 19:14:39', 127, 0, 1, 3, 0, 'return-policy', 'dummy_image.png', '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `amount_paid` decimal(20,2) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `json_response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `bID`, `uID`, `coach_id`, `amount_paid`, `created_at`, `json_response`) VALUES
(1, 1, 1, 25, '19.98', '2023-05-01 20:57:46', '4TD11827FW501662J'),
(2, 3, 33, 34, '75.75', '2023-05-05 17:37:32', '2FG21011XU975850J'),
(3, 6, 33, 34, '25.00', '2023-05-05 17:42:24', '0SJ44066S7683892K');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'shop_image.png',
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(20) NOT NULL,
  `is_test` int(11) NOT NULL DEFAULT 0,
  `country` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `image`, `description`, `status`, `created_at`, `is_test`, `country`) VALUES
(1, 'Product 1', '100.00', 'shop_image.png', 'Lorm ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis.', 1, '2023-02-20', 1, NULL),
(2, 'Product 2', '100.00', 'shop_image.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis.', 1, '2023-02-20', 0, NULL),
(3, 'Product 3', '100.00', 'shop_image.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis, erat sit amet ultricies mattis.', 1, '2023-02-20', 0, NULL),
(5, 'dummy product', '500.00', 'bea09215f7f9aaf6dd24d82c662af408.jpeg', 'adding new product for testing', 1, '2023-03-29 16:55:08', 0, NULL),
(26, 'Product 20', '100.00', 'dsti4sihzk5hq7bf61u4bsr37ws5ek.png', 'Desc 7', 1, '2023-05-19 20:36:25', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `task_date` varchar(20) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `uID`, `title`, `task_date`, `start_time`, `end_time`) VALUES
(1, 1, 'Cardio for 30 minutes', '2023-03-10', '15:53:00', '16:55:00'),
(2, 1, 'Delivery Update', '2023-03-11', '03:00:00', '05:00:00'),
(3, 10, 'Cardio', '2023-03-15', '17:54:00', '17:54:00'),
(4, 4, 'test', '2023-03-16', '19:09:00', '20:07:00'),
(5, 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,', '2023-03-14', '14:35:00', '17:35:00'),
(6, 10, 'Gym', '2023-03-16', '14:56:00', '14:56:00'),
(7, 33, 'test', '2023-04-10', '13:35:00', '18:36:00'),
(8, 34, 'test schedule', '2023-04-12', '01:18:00', '04:17:00'),
(9, 6, 'testing', '2023-05-01', '20:22:00', '20:30:00'),
(10, 5, 'New task ', '2023-05-01', '20:00:00', '21:00:00'),
(11, 37, 'test', '2023-05-23', '19:45:00', '16:45:00'),
(12, 33, 'test', '2023-05-16', '21:54:00', '19:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(150) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_logo_small` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `copy_right` text NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `snapchat` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `map_address` text DEFAULT NULL,
  `color_icon` varchar(100) DEFAULT '#000',
  `color_heading` varchar(100) DEFAULT '#000',
  `color_body` varchar(100) DEFAULT '#fff',
  `slider_time` int(11) DEFAULT 5,
  `style_name` varchar(255) DEFAULT 'style.css?version=new',
  `client_title` varchar(255) DEFAULT NULL,
  `client_logo` varchar(255) DEFAULT NULL,
  `show_email` int(1) NOT NULL DEFAULT 1,
  `show_mobile` int(1) NOT NULL DEFAULT 1,
  `show_fb` int(1) NOT NULL DEFAULT 1,
  `show_tw` int(1) NOT NULL DEFAULT 1,
  `show_li` int(1) NOT NULL DEFAULT 1,
  `show_gp` int(1) NOT NULL DEFAULT 1,
  `show_skype` int(1) NOT NULL DEFAULT 1,
  `show_address` int(11) NOT NULL DEFAULT 0,
  `show_chistmas_popup` int(1) DEFAULT 0,
  `site_favicon` varchar(255) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `currency_ar` varchar(20) DEFAULT NULL,
  `currency_space` int(1) NOT NULL DEFAULT 0,
  `currency_position` int(11) NOT NULL DEFAULT 0,
  `shipping_fee` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(20,2) NOT NULL DEFAULT 0.00,
  `twillio_pub` text DEFAULT NULL,
  `twillio_sec` text DEFAULT NULL,
  `site_title_ar` varchar(200) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `frontend_url` text DEFAULT NULL,
  `footer_about` text DEFAULT NULL,
  `footer_about_ar` text DEFAULT NULL,
  `hard_region` int(1) NOT NULL DEFAULT 0,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_title_ar` varchar(255) DEFAULT NULL,
  `meta_desc_en` varchar(255) DEFAULT NULL,
  `meta_desc_ar` varchar(255) DEFAULT NULL,
  `meta_keys_en` varchar(255) DEFAULT NULL,
  `meta_keys_ar` varchar(255) DEFAULT NULL,
  `paypal_username` varchar(255) DEFAULT NULL,
  `paypal_password` varchar(255) DEFAULT NULL,
  `paypal_signature` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_logo`, `site_logo_small`, `mobile`, `email`, `copy_right`, `twitter`, `snapchat`, `instagram`, `facebook`, `linkedin`, `google_plus`, `skype`, `address`, `map_address`, `color_icon`, `color_heading`, `color_body`, `slider_time`, `style_name`, `client_title`, `client_logo`, `show_email`, `show_mobile`, `show_fb`, `show_tw`, `show_li`, `show_gp`, `show_skype`, `show_address`, `show_chistmas_popup`, `site_favicon`, `meta_title`, `meta_keywords`, `meta_description`, `currency`, `currency_ar`, `currency_space`, `currency_position`, `shipping_fee`, `tax`, `twillio_pub`, `twillio_sec`, `site_title_ar`, `youtube`, `frontend_url`, `footer_about`, `footer_about_ar`, `hard_region`, `meta_title_en`, `meta_title_ar`, `meta_desc_en`, `meta_desc_ar`, `meta_keys_en`, `meta_keys_ar`, `paypal_username`, `paypal_password`, `paypal_signature`) VALUES
(1, 'PXL', 'd41c2f575803afad7692f9fbc81a7e64.svg', 'b955ff7db11dc1cc4f09ed3140240f03.png', '+000 000 0000', 'info@dedevelopers.org', '', 'https://twitter.com', 'https://www.snapchat.com', 'https://www.instagram.com', 'https://www.facebook.com', '', '', '', 'Qatar', 'IT Tower, Lahore Pakistan', 'rgb(255, 0, 0)', 'rgb(255, 0, 0)', 'rgb(255, 255, 2', 5, 'minfied_css_1535980922.css', 'c_logo', '2794728d21a8434e8eb6834ef5b7352b.png', 0, 0, 0, 0, 0, 0, 0, 0, 1, '110967e4e7f515978ff7455c64e19178.svg', NULL, NULL, NULL, NULL, NULL, 0, 0, '0.00', '15.00', 'AC3101a99f30c4d5c9860b7a4a00aecefd', '92d0ccf3a6b8d818c92268b2d807cfde', NULL, 'https://youtube.com/', 'http://192.168.100.3/souqpack/', NULL, NULL, 1, 'Souq Pack | Online shopping for packaging products in Saudi Arabia & Riyadh', 'سوق باك | تسوق أونلاين منتجات التعبئة والتغليف بالسعودية والرياض', 'Shop from the largest assortment of packaging products in Saudi Arabia, Souq Pack factory meets your business needs, such as bags and cups, plastic boxes, plastic tableware, printed tissues, packing papers and more. Shop now', 'تسوق من أكبر تشكيلة منتجات تعبئة وتغليف بالسعودية ،  مصنع سوق باك يلبى احتياجات أعمالك من أكياس و أكواب , علب بلاستيك , مستلزمات مائدة بلاستيكية , مناديل مطبوعة وأوراق التغليف والمزيد. تسوق الآن', 'Pak market, packaging products store, packaging products shopping', 'سوق باك , متجر منتجات تعبئة وتغليف , تسوق منتجات التعبئة والتغليف', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `title`, `status`) VALUES
(1, 'Cricket', 1),
(2, 'Hockey', 1),
(4, 'Volleyball', 1),
(5, 'Wrestling', 1),
(6, 'Jumping', 1),
(7, 'Tennis', 1),
(8, 'Football', 1),
(10, 'Basketball', 1),
(11, 'Soccer', 1),
(12, 'Golf', 1),
(16, 'Boxing', 1),
(21, 'Swimming', 1),
(23, 'Rugby', 1),
(28, 'Baseball', 1),
(33, 'Athletics', 1),
(34, 'Bowling', 1),
(35, 'Figure skating', 1),
(36, 'Gymnastics', 1),
(37, 'Ice Hockey', 1),
(38, 'Table Tennis', 1),
(39, 'Polo', 1),
(40, 'American Football', 1),
(41, 'Softball', 1),
(42, 'Cross Country', 1),
(43, 'Surfing', 1),
(44, 'Diving', 1),
(45, 'Sprint Running', 1),
(46, 'Sailing', 1),
(47, 'Archery', 1),
(48, 'Dressage', 1),
(49, 'Motorcycle racing', 1),
(50, 'Badminton', 1),
(51, 'Karate', 1),
(52, 'Skeleton Sport', 1),
(53, 'Triathlon', 1),
(54, 'Kickboxing', 1),
(55, 'Motocross', 1),
(56, 'Judo', 1),
(57, 'Taekwondo', 1),
(58, 'Shunty', 1),
(59, 'Fencing', 1),
(60, 'Lacrosse', 1),
(61, 'Snooker', 1),
(62, 'Rowing', 1),
(63, 'Snowboarding', 1),
(64, 'Weightlifting', 1),
(65, 'Futsal', 1),
(66, 'Squash', 1),
(67, 'Handball', 1),
(68, 'Target Shooting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_detail` text NOT NULL,
  `task_date` varchar(100) NOT NULL,
  `complete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `uID`, `task_name`, `task_detail`, `task_date`, `complete`) VALUES
(1, 1, 'Meeting', 'Meeting with PXL client on thursday', '2023-03-08', 1),
(2, 1, 'Delivery Update', 'Update teh delivery of the project on monday', '2023-03-13', 1),
(3, 1, 'test', 'test', '2023-03-10', 1),
(4, 1, 'Test', 'Test', '2023-03-24', 1),
(5, 10, 'Checking', 'Test', '2023-03-11', 1),
(6, 10, 'Cardio', 'test', '2023-03-15', 1),
(7, 4, 'ww', 'test', '2023-03-15', 1),
(8, 10, 'hh', 'test', '2023-03-10', 1),
(9, 10, 'hhhhh', 'test', '2023-03-17', 1),
(10, 10, 'Gym', 'test', '2023-03-15', 0),
(11, 10, 'Cardio', 'test', '2023-03-09', 1),
(12, 10, 'Dinner', 'test', '2023-03-18', 0),
(13, 10, 'Lunch', 'test', '2023-03-24', 0),
(14, 10, 'Meeting at 5', 'test', '2023-03-23', 1),
(15, 28, 'Gym', 'test', '2023-04-13', 0),
(16, 28, 'Meeting', 'test', '2023-04-07', 0),
(17, 4, 'Cardio', 'test', '2023-04-12', 0),
(18, 33, 'tasl1', 'test', '2023-04-10', 1),
(19, 33, 'task2', 'test', '2023-04-11', 0),
(20, 34, 'task2', 'test', '2023-04-11', 1),
(21, 34, 'task2', 'test', '2023-04-12', 1),
(22, 42, 'Complete Athletic Evaluation', 'test', '2023-05-17', 0),
(23, 42, 'Complete Biological Evaluation', 'test', '2023-05-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `test_1` varchar(255) NOT NULL,
  `hemoglobin` varchar(255) DEFAULT NULL,
  `hematocrit` varchar(255) DEFAULT NULL,
  `white_blood_count` varchar(255) DEFAULT NULL,
  `platelet_count` varchar(255) DEFAULT NULL,
  `glucose` varchar(255) DEFAULT NULL,
  `creatine` varchar(255) DEFAULT NULL,
  `ast` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `protein` varchar(100) DEFAULT NULL,
  `anion` varchar(100) DEFAULT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `uID`, `test_1`, `hemoglobin`, `hematocrit`, `white_blood_count`, `platelet_count`, `glucose`, `creatine`, `ast`, `alt`, `protein`, `anion`, `created_at`) VALUES
(1, 1, '786320966cea2d63983cbfda872a6a8d.pdf', '60', '10', '20', '', '', '', '', '', '', '', '2023-05-01'),
(2, 19, '64886573b391892b29e245269b10341d.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `string` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `code_text` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_by` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `session_id_key` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'dummy_image.png',
  `lifetime_random` text DEFAULT NULL,
  `api_logged_sess` text DEFAULT NULL,
  `api_logged_time` datetime DEFAULT current_timestamp(),
  `lparent` int(11) NOT NULL DEFAULT 0,
  `guest_id` varchar(50) DEFAULT NULL,
  `push_id` text DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `current_sport` varchar(100) DEFAULT NULL,
  `sports` text DEFAULT NULL,
  `package_id` varchar(20) NOT NULL,
  `subscriptin_start` int(11) NOT NULL DEFAULT 0,
  `subscriptin_date` varchar(20) DEFAULT NULL,
  `subscription_expiry` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `transaction_amount` decimal(20,2) DEFAULT NULL,
  `payment_done` int(11) NOT NULL DEFAULT 0,
  `otp_code` varchar(20) DEFAULT NULL,
  `delete_now` int(11) NOT NULL DEFAULT 0,
  `delete_date` varchar(100) DEFAULT NULL,
  `password_change` varchar(100) DEFAULT NULL,
  `email_verify` int(11) NOT NULL DEFAULT 0,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `overview` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `wallet` decimal(20,2) NOT NULL DEFAULT 0.00,
  `is_public` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `username`, `password`, `string`, `code`, `code_text`, `phone`, `address`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `deleted_by`, `session_id`, `session_id_key`, `profile_pic`, `lifetime_random`, `api_logged_sess`, `api_logged_time`, `lparent`, `guest_id`, `push_id`, `gender`, `country`, `state`, `city`, `zip`, `mobile`, `dob`, `height`, `weight`, `current_sport`, `sports`, `package_id`, `subscriptin_start`, `subscriptin_date`, `subscription_expiry`, `transaction_id`, `transaction_amount`, `payment_done`, `otp_code`, `delete_now`, `delete_date`, `password_change`, `email_verify`, `user_type`, `overview`, `experience`, `wallet`, `is_public`) VALUES
(1, 'Bilal Yousaf', 'info@dedevelopers.com', 'dedevelopers', 'ef73781effc5774100f87fe2f437a435', NULL, NULL, NULL, '03333333333333', 'Lahore', 1, '2023-03-08 11:14:32', NULL, NULL, NULL, 0, NULL, NULL, NULL, '3a0fb5c5bb70fc5b57ce753f9b77ab6c.jpg', NULL, NULL, '2023-03-08 11:14:32', 0, NULL, NULL, NULL, '166', NULL, NULL, NULL, NULL, '25', '5.11', '75', '1', 'all', '3', 1, '2023-03-09', '2023-04-08', '8D875655KY2503135', '0.00', 1, '7494', 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(3, 'Bilal Yousaf', 'dedevelopers@hotmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '03255659595', 'Lahore', 1, '2023-03-09 17:28:53', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-09 07:28:53', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25', NULL, NULL, 'psl', 'Football, volleyball', '3', 1, '2023-03-09', '2023-04-08', '8UK22486N9472400X', '8.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(5, 'Anya Singh', 'anyasingh070605@gmail.com', NULL, '93a88a969617a63225b94c62b137532e', NULL, NULL, NULL, '6572446754', '17272 Newhope Street', 1, '2023-03-10 06:55:18', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-09 20:55:18', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', NULL, NULL, 'Tennis', 'Tennis', '3', 1, '2023-03-10', '2023-04-09', '72V0095018465232F', '8.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(6, 'Kaveon', 'kj@kaveon.com', NULL, '9b65d12c7410d1576de545c60bc19f3b', NULL, NULL, NULL, '5551234567', '555 main street', 1, '2023-03-10 07:13:18', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'e94ab27d8d650c7bc21285b3b6912a6f.jpg', NULL, NULL, '2023-03-09 21:13:18', 0, NULL, NULL, NULL, '231', NULL, NULL, NULL, NULL, '49', NULL, NULL, '5', 'all', '4', 1, '2023-03-14', '2023-04-13', '63S48768AV937103N', '12.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(7, 'Bala Raju', 'balarajuuk@gmail.com', NULL, 'b1907b39a5a9d67c63f517088963a669', NULL, NULL, NULL, '6302485010', '48-3-8, Day & Night Hospital Road, Dwarakanagar, Visakhapatnam 530016, India', 1, '2023-03-10 20:20:16', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-10 10:20:16', 0, NULL, NULL, NULL, '101', NULL, NULL, NULL, NULL, '51', '5.7', '90', '7', 'all', '1', 0, '2023-05-03', NULL, NULL, '0.00', 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(8, 'Amar Vajja', 'amarlohitvajja@gmail.com', NULL, '1410e89997d9bfba0c05c28290c590b0', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-10 20:20:20', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-10 10:20:20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(9, 'Haris Khan', 'check@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '030047474747', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', 0, '2023-03-11 10:24:29', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-11 00:24:29', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, 'Cricket', 'Cricket', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(10, 'Haris Khan', 'lookingforharis@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', 1, '2023-03-13 16:18:39', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-13 07:18:39', 0, NULL, NULL, NULL, '8', NULL, NULL, NULL, NULL, '25', NULL, NULL, 'Cricket', 'all', '2', 1, '2023-03-13', '2023-04-12', '2WV17058XS3152019', '4.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(11, 'Anya', 'anyalovesai@gmail.com', NULL, '93a88a969617a63225b94c62b137532e', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 06:11:22', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-13 21:11:22', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(12, 'CHRISTOPHER EMKEY', 'CHRIS@ETCHFITSPORTS.COM', NULL, '4e6df07e9c56569e614163994c82ce27', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 20:34:24', NULL, NULL, NULL, 0, NULL, 'GZK0wsnRzpjDwpX2M3vUHAVtW', NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 11:34:24', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, '9839', 0, NULL, NULL, 0, 1, NULL, NULL, '0.00', 1),
(13, 'Chris', 'hello@encignia.com', NULL, 'e184c70fc2fa59319ca44d70455d1b6b', NULL, NULL, NULL, '610 8675309', '1122 Blake Bt', 1, '2023-03-14 20:44:29', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 11:44:29', 0, NULL, NULL, NULL, '231', NULL, NULL, NULL, NULL, '20', NULL, NULL, '3', 'all', '3', 1, '2023-03-14', '2023-04-13', '2H897720SJ070145J', '8.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(14, 'Christopher Emkey', 'Chris@etchfitsports.com', NULL, '4e6df07e9c56569e614163994c82ce27', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 20:46:15', NULL, NULL, NULL, 0, NULL, 'gyK20cysbYOaly2WzquywGRwU', NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 11:46:15', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, 1, NULL, NULL, '0.00', 1),
(15, 'Julia Logan', 'jalogan94@gmail.com', NULL, '8079b7c37856e096ab01863fe55b0755', NULL, NULL, NULL, '7149073228', 'jalogan94@gmail.com', 1, '2023-03-14 22:07:33', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 13:07:33', 0, NULL, NULL, NULL, '231', NULL, NULL, NULL, NULL, '28', NULL, NULL, '3', 'all', '2', 1, '2023-03-14', '2023-04-13', '1GV19337YA128033A', '4.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(16, 'Dina Aranguri', 'dinjulietaa@gmail.com', NULL, 'df3aeb956868ce0cf641f4bbd80ec84a', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 22:07:33', NULL, NULL, NULL, 0, NULL, 'VMZd5aGWmSRCmj55MNUU05J2D', NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 13:07:33', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 0, 1, NULL, NULL, '0.00', 1),
(17, 'Dina Aranguri', 'dinajulietaa@gmail.com', NULL, '0a6fd90365f38f4a1ef2f1cf66949a9f', NULL, NULL, NULL, '7145010210', '500 Clubhouse Ave, B', 1, '2023-03-14 22:09:20', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-14 13:09:20', 0, NULL, NULL, NULL, '231', NULL, NULL, NULL, NULL, '34', NULL, NULL, '5', 'all', '3', 1, '2023-03-14', '2023-04-13', '4AL793000W921081E', '8.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(18, 'Anya', '349981894@gapps.yrdsb.ca', NULL, '93a88a969617a63225b94c62b137532e', NULL, NULL, NULL, '6475096375', '539 Cornell Centre Blvd', 0, '2023-03-14 23:32:40', NULL, NULL, NULL, 0, NULL, NULL, NULL, '415978c6f181375cd922508d573a5300.jpg', NULL, NULL, '2023-03-14 14:32:40', 0, NULL, NULL, NULL, '38', NULL, NULL, NULL, NULL, '17', NULL, NULL, '3', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(20, 'KJ', 'info@kaveon.com', NULL, 'eadfa2edb4b2851da50190d7f9dc4192', NULL, NULL, NULL, '5551234567', '123 Main St', 1, '2023-03-18 09:00:12', NULL, NULL, NULL, 0, NULL, NULL, NULL, '35476acaf56bd8e13a277dbcc502afb8.jpg', NULL, NULL, '2023-03-18 00:00:12', 0, NULL, NULL, NULL, '15', NULL, NULL, NULL, NULL, '46', NULL, NULL, '7', 'all', '2', 1, '2023-03-18', '2023-04-17', '249364592U3846920', '4.00', 1, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(21, 'kj', 'info@shoqtennis.com', NULL, 'eadfa2edb4b2851da50190d7f9dc4192', NULL, NULL, NULL, '5556678888', '222 sss', 0, '2023-03-21 23:28:24', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-21 14:28:24', 0, NULL, NULL, NULL, '16', NULL, NULL, NULL, NULL, '46', NULL, NULL, '7', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(22, 'lukasz', 'lswierzewski1@gmail.com', NULL, '12bce374e7be15142e8172f668da00d8', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-23 14:09:45', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-03-23 05:09:45', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(25, 'Coach', 'coach@coach.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '1234567890', 'ABC Address', 1, '2023-04-06 15:26:47', NULL, NULL, NULL, 0, NULL, 'xUOk9XyL87GULRbqQbJwsOux9', NULL, 'dummy_image.png', NULL, NULL, '2023-04-06 06:26:47', 0, NULL, NULL, NULL, '231', NULL, NULL, NULL, NULL, '9.99', NULL, NULL, 'Project Manager', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 2, 'I am MATT ROBERTS PERSONAL TRAINING SPECIALISE IN FAT LOSS, SPORTS PERFORMANCE, STRENGTH AND CONDITIONING, POSTURAL REHABILITATION AND MUCH MORE.<br />\r\n<br />\r\nmy goal is to make a client’s body become extremely efficient, reduce inflammation, increase muscle responsiveness and recovery, to improve performance, longevity and energy as a result. I want you to be active and perform highly now and for many years to come, performance and longevity are our combined goals.', 'I\'m an ISSA Certified Personal Trainer and Certified Fitness Coach. <br />\r\nI\'m a Certified Nutrition Coach from Precision Nutrition. The best organization in the world in nutrition coaching. <br />\r\nBefore being a trainer, I\'m a Pharmacist who studied nutrition, anatomy, and biochemistry.<br />\r\nI\'ve over five years of experience and helped many clients to reach their goals using my science-based programs.', '15.00', 1),
(29, 'Anya Singh', 'anyasingh070605@gmail.com', NULL, '93a88a969617a63225b94c62b137532e', NULL, NULL, NULL, NULL, NULL, 1, '2023-04-06 19:37:41', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-04-06 10:37:41', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 2, NULL, NULL, '0.00', 1),
(33, 'Ammar', 'ammarafzal400@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', 1, '2023-04-09 22:33:40', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-04-09 13:33:40', 0, NULL, NULL, NULL, '166', NULL, NULL, NULL, NULL, '30', '', '56', '1', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(34, 'Coach Ammar', 'ammarafzal400@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '123456789', 'test address', 1, '2023-04-09 22:43:39', NULL, NULL, NULL, 0, NULL, NULL, NULL, '9dc6bfcf393a5e66e3e7430d51100290.jpg', NULL, NULL, '2023-04-09 13:43:39', 0, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, '25', NULL, NULL, 'cricket', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 2, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.<br />\r\n<br />\r\nDonec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', '•	Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. <br />\r\n•	Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. <br />\r\n•	Aenean imperdiet. Etiam ultricies nisi vel augue.<br />\r\n•	Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. <br />\r\n•	Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. <br />\r\n•	Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.<br />\r\n<br />\r\nAliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.<br />\r\n<br />\r\nCurabitur ullamcorper ultricies nisi. <br />\r\nNam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. <br />\r\n•	Nam quam nunc, <br />\r\no	blandit vel, luctus <br />\r\n•	pulvinar, hendrerit id, lorem.<br />\r\n', '100.75', 1),
(35, 'Haris', 'haris@novaeno.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, 1, '2023-04-24 23:30:07', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-04-24 14:30:07', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(37, 'Ammar Afzal', 'ammar.nayyartech@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, 1, '2023-04-25 10:15:03', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-04-25 01:15:03', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, '9586', 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(39, 'Haris Khan', 'sootilibaas@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, '03004748787', 'H # 10/A , ST# 5 Nawab Street,, Chohan Road, Islampura', 0, '2023-05-02 17:07:36', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-05-02 08:07:36', 0, NULL, NULL, NULL, '166', NULL, NULL, NULL, NULL, '28', '5', '50', '58', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(40, 'Bala', '247bala@gmail.com', NULL, 'b1907b39a5a9d67c63f517088963a669', NULL, NULL, NULL, NULL, NULL, 0, '2023-05-03 07:56:24', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'dummy_image.png', NULL, NULL, '2023-05-02 22:56:24', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1),
(41, 'Akshara', 'aksharasunkari02@gmail.com', NULL, '4e2ad3d2b801fee1975d4007e0e8358c', NULL, NULL, NULL, '+918790630051', 'my home mangala hyderabad', 0, '2023-05-04 09:30:46', NULL, NULL, NULL, 0, NULL, NULL, NULL, '5a9157fa1cdd3a43a574d60c7ce07e12.png', NULL, NULL, '2023-05-04 00:30:46', 0, NULL, NULL, NULL, '101', NULL, NULL, NULL, NULL, '26', '5.9', '84', '21', 'all', '', 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_bank`
--

CREATE TABLE `user_bank` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_bank`
--

INSERT INTO `user_bank` (`id`, `uID`, `account_name`, `bank_name`, `account_number`, `created_at`) VALUES
(1, 25, 'Coach', 'Meezan Bank', 'PKMEZ123456789000', '2023-05-01 20:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_exercises`
--

CREATE TABLE `user_exercises` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `exercide_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `finished_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_exercises`
--

INSERT INTO `user_exercises` (`id`, `uID`, `exercide_id`, `category`, `time`, `finished_at`) VALUES
(1, 33, 5, 'Power', '25.00', '2023-05-05 15:21:21'),
(2, 33, 2, 'Power', '5.00', '2023-05-05 16:59:29'),
(3, 5, 8, 'Endurance', '2.00', '2023-05-08 10:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_save_address`
--

CREATE TABLE `user_save_address` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, '67', 243, '2021-01-26 21:45:53'),
(2, '107', 21, '2021-01-29 20:31:35'),
(3, '107', 145, '2021-01-29 20:31:46'),
(5, '119', 205, '2021-01-31 00:07:43'),
(6, '120', 205, '2021-01-31 00:13:06'),
(7, '194', 229, '2021-02-10 11:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `uID`, `amount`, `status`, `created_at`) VALUES
(1, 25, '4.98', 1, '2023-05-01 20:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `title_1` varchar(255) NOT NULL,
  `sub_head` varchar(255) NOT NULL,
  `strength` varchar(255) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'dummy.png',
  `for_plan` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`id`, `title`, `category`, `title_1`, `sub_head`, `strength`, `time`, `image`, `for_plan`, `status`, `created_at`) VALUES
(2, 'Strength Training', 'Endurance', 'Power', 'Full Equipment', 'Full', NULL, '13c09ee9c2a7a7af784909f774d34d22.png', 0, 1, '2023-02-20'),
(5, 'test', 'Speed', 'test123', 'test', 'test', NULL, '8f8f09f5590c97140c2b9dc2ec57f89b.png', 0, 1, '2023-05-05'),
(6, 'Full Equipment', 'Speed', 'Strength Training', 'Mat', 'Speed 2', NULL, 'dummy.png', 0, 1, '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `workout_exercises`
--

CREATE TABLE `workout_exercises` (
  `id` int(11) NOT NULL,
  `wID` int(11) NOT NULL,
  `title` text NOT NULL,
  `time` decimal(20,2) NOT NULL,
  `description` text DEFAULT NULL,
  `intensity` varchar(20) NOT NULL,
  `calories` varchar(20) DEFAULT NULL,
  `equipments` varchar(100) DEFAULT NULL,
  `technique_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `created_at` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_exercises`
--

INSERT INTO `workout_exercises` (`id`, `wID`, `title`, `time`, `description`, `intensity`, `calories`, `equipments`, `technique_description`, `image`, `video`, `created_at`, `status`) VALUES
(1, 1, 'Complete 10 Jump Squats Every Minute for 6 Minutes', '6.00', 'To further challenge yourself, try widening your stance to perform a sumo squat instead. This variation can add variety to your lower body strength training routine', 'High', '382', '2 Dumbells', '1. Inhale while pushing your hips back and lowering into a squat position. Keep your core tight, back straight, and your knees forward during this movement.<br />\r\n<br />\r\n2. Exhale while returning to the starting position. Focus on keeping your weight evenly distributed throughout your heel and midfoot.', 'f37f652eff92676c19e961c08c6cb3f0.jpg', '6e46915fc602aaa58446f7233843a1f4.mp4', '2023-05-05 17:01:58', 1),
(2, 1, 'Accumulate 100 Jump Squats in Less Than 5 Minutes', '5.00', 'To further challenge yourself, try widening your stance to perform a sumo squat instead. This variation can add variety to your lower body strength training routine', 'High', '500', '3 Dumbells', '1. Inhale while pushing your hips back and lowering into a squat position. Keep your core tight, back straight, and your knees forward during this movement.<br />\r\n<br />\r\n2. Exhale while returning to the starting position. Focus on keeping your weight evenly distributed throughout your heel and midfoot.', 'f37f652eff92676c19e961c08c6cb3f0.jpg', '6e46915fc602aaa58446f7233843a1f4.mp4', '2023-05-05 14:55:34', 1),
(7, 5, 'test1', '1.00', 'test', 'test', '2', 'test', 'test', NULL, NULL, '2023-05-05 17:21:17', 1),
(8, 2, 'poer11', '2.00', 'poer11', 'poer11', '3', 'poer11', 'poer11', NULL, NULL, '2023-05-05 17:22:45', 1),
(9, 2, 'poer22', '3.00', 'poer22', 'poer22', '2', 'poer22', 'poer22', NULL, NULL, '2023-05-05 17:23:11', 1),
(10, 6, 'Complete 10 Jump Squats Every Minute on the Minute for 6 Minutes', '10.00', 'To further challenge yourself, try widening your stance to perform a sumo squat instead. This variation can add variety to your lower body strength training routine<br />\r\n<br />\r\n', 'High', '105', 'Mat', '1. Inhale while pushing your hips back and lowering into a squat position. Keep your core tight, back straight, and knees forward during this movement.<br />\r\n2. Exhale while returning to the starting position. Focus on keeping your weight evenly distributed throughout your heel and midfoot.<br />\r\n', NULL, NULL, '2023-05-08 18:38:13', 1),
(11, 6, 'Complete 20 Pushups Every Minute on the Minute for 6 Minutes', '5.00', 'To further challenge yourself, try widening your stance to perform a sumo squat instead. This variation can add variety to your lower body strength training routine<br />\r\n<br />\r\n', 'High', '50', 'Mat', '1. Inhale while pushing your hips back and lowering into a squat position. Keep your core tight, back straight, and knees forward during this movement.<br />\r\n2. Exhale while returning to the starting position. Focus on keeping your weight evenly distributed throughout your heel and midfoot.<br />\r\n', NULL, NULL, '2023-05-08 18:39:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_history`
--
ALTER TABLE `admin_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `athlete_evaluation`
--
ALTER TABLE `athlete_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_affiliates`
--
ALTER TABLE `events_affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_list`
--
ALTER TABLE `packages_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bank`
--
ALTER TABLE `user_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_exercises`
--
ALTER TABLE `user_exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_save_address`
--
ALTER TABLE `user_save_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_exercises`
--
ALTER TABLE `workout_exercises`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin_login_history`
--
ALTER TABLE `admin_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `athlete_evaluation`
--
ALTER TABLE `athlete_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events_affiliates`
--
ALTER TABLE `events_affiliates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages_list`
--
ALTER TABLE `packages_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_bank`
--
ALTER TABLE `user_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_exercises`
--
ALTER TABLE `user_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_save_address`
--
ALTER TABLE `user_save_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workout_exercises`
--
ALTER TABLE `workout_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
