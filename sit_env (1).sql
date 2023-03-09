-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 05:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sit_env`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` bigint(20) NOT NULL,
  `instanceid` varchar(10) DEFAULT NULL,
  `serverid` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A= Active D= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `instanceid`, `serverid`, `type`, `name`, `username`, `password`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, '2', '1', '1', 'Finacle', 'qateam', 'mweu3YYNNTQD', 'Finacle SIT DB', '2023-03-01 07:56:49', '0000-00-00 00:00:00', 'A'),
(2, '1', '1', '1', 'BPMS', 'BPMS', 'kuRHKyjWwZEP', 'BPMS SIT DB', '2023-03-01 07:56:49', '0000-00-00 00:00:00', 'A'),
(3, '1', '1', '1', 'Etender', 'ETENDER', 'TGwkDBmy', 'Etender SIT DB', '2023-03-01 07:56:49', '0000-00-00 00:00:00', 'A'),
(4, '1', '3', '2', 'BPMS', 'jboss', '1Qu@lity!', 'BPMS & BB SIT File log', '2023-03-01 07:56:49', '0000-00-00 00:00:00', 'A'),
(5, '2', '1', '1', 'XBS', 'XBS', 'kuRHKyjWwZEP', 'XBS schema', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(6, '2', '1', '1', 'XRS', 'XRS', 'kuRHKyjWwZEP', 'XRS schema', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(7, '2', '1', '1', 'XBC', 'XBC', 'kuRHKyjWwZEP', 'XBC schema', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(8, '2', '1', '1', 'XBT', 'XBT', 'kuRHKyjWwZEP', 'XBT schema', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(9, '1', '1', '1', 'Camunda', 'ERINCAMUNDA', 'kuRHKyjWwZEP', 'Camunda SIT', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(10, '1', '1', '1', 'Digitalbank', 'DIGITALBANKING', 'NChTNEsa', 'DigitalBank SIT', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(11, '1', '1', '1', 'Online Billing', 'BILLING', 'HZmmGxyH', 'Online Billing SIT', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(12, '1', '1', '1', 'Digitalbank', 'XACBANKAPZ', 'kuRHKyjWwZEP', 'DigitalBank SIT', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A'),
(13, '1', '1', '1', 'Digitalbank', 'XACBANKMCRS', 'kuRHKyjWwZEP', 'DigitalBank SIT', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `instances`
--

CREATE TABLE `instances` (
  `instanceid` bigint(20) NOT NULL,
  `instancename` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A= Active D= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `instances`
--

INSERT INTO `instances` (`instanceid`, `instancename`, `created_at`, `updated_at`, `status`) VALUES
(1, 'aux', '2023-02-11 05:35:18', '2023-02-11 05:35:18', 'A'),
(2, 'finaclesit', '2023-02-11 05:35:18', '2023-02-11 05:35:18', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `last_login`
--

CREATE TABLE `last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `last_login`
--

INSERT INTO `last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(17, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-11 16:09:09'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 14:52:48'),
(19, 2, '{\"role\":\"2\",\"roleText\":\"Viewers\",\"name\":\"Viewer\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 15:50:02'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 15:50:24'),
(21, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:26:25'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:28:50'),
(23, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:29:02'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:29:26'),
(25, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:35:00'),
(26, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:38:05'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Mac OS X', '2023-02-12 16:51:01'),
(28, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-13 11:02:49'),
(29, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-13 17:29:03'),
(30, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 08:56:44'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 09:36:50'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 09:42:48'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 18:08:57'),
(34, 2, '{\"role\":\"2\",\"roleText\":\"Viewers\",\"name\":\"Viewer\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 18:13:27'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-14 18:23:44'),
(36, 2, '{\"role\":\"2\",\"roleText\":\"Viewers\",\"name\":\"Viewer\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-15 10:25:12'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-15 15:10:31'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-15 15:32:12'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-16 10:18:39'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-02-27 12:02:18'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-01 14:34:18'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-02 09:49:03'),
(43, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-02 14:20:52'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-03 08:48:04'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-03 14:20:47'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-06 08:59:08'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-06 15:59:29'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-07 10:02:41'),
(49, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-07 16:53:00'),
(50, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-09 08:40:39'),
(51, 1, '{\"role\":\"1\",\"roleText\":\"Administrator\",\"name\":\"Admin\"}', '::1', 'Chrome 109.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'Windows 10', '2023-03-09 09:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(1, 'Administrator'),
(2, 'Viewers');

-- --------------------------------------------------------

--
-- Table structure for table `schemaandsubsytem`
--

CREATE TABLE `schemaandsubsytem` (
  `schemaid` varchar(100) NOT NULL,
  `subsystemid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schemaandsubsytem`
--

INSERT INTO `schemaandsubsytem` (`schemaid`, `subsystemid`) VALUES
('13', '1'),
('1', '1'),
('10', '1'),
('3', '2'),
('5', '2'),
('4', '2'),
('10', '2'),
('3', '3'),
('3', '4'),
('10', '6');

-- --------------------------------------------------------

--
-- Table structure for table `schema_names`
--

CREATE TABLE `schema_names` (
  `id` bigint(20) NOT NULL,
  `schema_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A= Active D= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schema_names`
--

INSERT INTO `schema_names` (`id`, `schema_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'TBAADM', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(2, 'ERINCAMUNDA', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(3, 'BPMS', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(4, 'DIGITALBANKING', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(5, 'BILLING', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(6, 'ETENDER', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(7, 'XACBANKAPZ', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(8, 'XACBANKMCRS', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(9, 'XRS', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(10, 'XBS', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(11, 'XBC', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(12, 'XBT', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(13, 'MSE_PROD', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(14, 'WSO2', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A'),
(15, 'XACINFO', '2023-03-06 02:56:49', '0000-00-00 00:00:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `serverandinstance`
--

CREATE TABLE `serverandinstance` (
  `serverid` varchar(100) NOT NULL,
  `instanceid` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `serverandinstance`
--

INSERT INTO `serverandinstance` (`serverid`, `instanceid`, `created_at`, `updated_at`) VALUES
('1', '1', '2020-04-04 02:15:29', '2020-04-04 02:15:29'),
('1', '2', '2020-04-04 02:15:29', '2020-04-04 02:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `serverid` bigint(20) NOT NULL,
  `servername` varchar(100) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `server_info` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(10) NOT NULL COMMENT 'Server type: 1=db, 2=app',
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A= Active D= Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`serverid`, `servername`, `ip_address`, `server_info`, `description`, `created_at`, `updated_at`, `type`, `status`) VALUES
(1, 'Oracle server', '172.25.0.113', '', 'Finacle and Subsystems database', '2023-02-11 05:45:29', '2023-02-11 05:45:29', 1, 'A'),
(2, 'Windows server', '172.25.0.195', '', 'Windows server USSD, XACINFO, CAM', '2023-02-11 05:45:29', '2023-02-11 05:45:29', 2, 'A'),
(3, 'BB and BPMS server', '172.25.0.109', '', 'BB, Camunda and BPMS', '2023-02-11 05:45:29', '2023-02-11 05:45:29', 2, 'A'),
(4, 'WSO2', '172.25.0.181', '', 'WSO2 service', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(5, 'BIP', '172.25.0.116', '', 'BI', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(6, 'Digitalbank', '172.25.8.13', '', 'Digitalbank', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(7, 'MSE', '172.25.0.200', '', 'MSE', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(8, 'LDMS', '172.25.0.124', '', 'LDMS', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(9, 'Camunda', '172.25.0.115', '', 'Camunda', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(10, 'CAM', '172.25.0.74', '', 'CAM services', '2023-03-02 05:13:17', '0000-00-00 00:00:00', 2, 'A'),
(12, 'test', '172.25.0.15', 'sss', ' s', '2023-03-06 20:30:12', NULL, 2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `subsystems`
--

CREATE TABLE `subsystems` (
  `id` bigint(20) NOT NULL,
  `appserverid` varchar(20) DEFAULT NULL,
  `instanceid` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `schema` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A= Active D= Deactive',
  `dbserverid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subsystems`
--

INSERT INTO `subsystems` (`id`, `appserverid`, `instanceid`, `name`, `link`, `schema`, `description`, `created_at`, `updated_at`, `status`, `dbserverid`) VALUES
(1, '7', '1', 'MSE', 'http://mse-finuat/', 'MSE', 'Үнэт цаасны арилжааны төлбөр тооцоог Монгол банкаар дамжуулан АТТБ-руу шилжүүлнэ. ', '2023-02-27 07:56:49', '0000-00-00 00:00:00', 'A', '1'),
(2, NULL, '1', 'XACLITE', 'http://172.25.9.18:8080/#/home-page', 'billing, digitalbank, ', 'XACLITE - Удирдлагын систем', '2023-02-27 07:56:49', '0000-00-00 00:00:00', 'A', '1'),
(3, '3', '1', 'BPMS', 'http://172.25.0.109:8080/#/login', 'BPMS', 'BPMS', '2023-03-02 08:13:17', '0000-00-00 00:00:00', 'A', '1'),
(4, '3', '1', 'Branch Banking', 'http://172.25.0.109:8080/#/login', 'BPMS', 'Branch Banking', '2023-03-02 08:13:17', '0000-00-00 00:00:00', 'A', '1'),
(5, '8', '1', 'LDMS', 'http://ldmsqa-test/sites/dms/Pages/default.aspx', '', 'LDMS', '2023-03-02 08:13:17', '0000-00-00 00:00:00', 'A', '1'),
(6, '10', '2', 'CAM', 'http://172.25.0.74:8080/', 'XBS', 'CAM Servies', '2023-03-02 08:13:17', '0000-00-00 00:00:00', 'A', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@example.com', '1Xacbank!', 'Admin', '99999999', 1, 0, 0, '2023-02-03 15:56:49', 1, '2023-02-03 15:56:49'),
(2, 'viewer@example.com', '1Xacbank!', 'Viewer', '88888888', 2, 0, 1, '2023-02-03 15:56:49', 1, '2023-02-03 15:56:49'),
(3, 'test@example.com', 'pass123', 'Test', '99898898', 2, 0, 1, '2023-03-09 09:56:49', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instances`
--
ALTER TABLE `instances`
  ADD PRIMARY KEY (`instanceid`);

--
-- Indexes for table `last_login`
--
ALTER TABLE `last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `schema_names`
--
ALTER TABLE `schema_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`serverid`);

--
-- Indexes for table `subsystems`
--
ALTER TABLE `subsystems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instances`
--
ALTER TABLE `instances`
  MODIFY `instanceid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `last_login`
--
ALTER TABLE `last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schema_names`
--
ALTER TABLE `schema_names`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `serverid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subsystems`
--
ALTER TABLE `subsystems`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
