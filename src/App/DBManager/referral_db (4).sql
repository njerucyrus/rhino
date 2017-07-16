-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2017 at 05:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `referral_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `earning_account`
--

CREATE TABLE `earning_account` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalEarning` float NOT NULL,
  `balance` float NOT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earning_account`
--

INSERT INTO `earning_account` (`id`, `userId`, `totalEarning`, `balance`, `updatedAt`) VALUES
(49, 34, 5520, 0, NULL),
(50, 35, 0, 0, NULL),
(51, 36, 0, 0, NULL),
(52, 37, 4720, 0, NULL),
(53, 38, 0, 0, NULL),
(54, 39, 4800, 0, NULL),
(55, 40, 0, 0, NULL),
(56, 41, 5200, 0, NULL),
(57, 42, 5200, 0, NULL),
(58, 43, 0, 0, NULL),
(59, 44, 0, 0, NULL),
(60, 45, 4000, 0, NULL),
(61, 48, 0, 0, NULL),
(62, 49, 0, 0, NULL),
(63, 50, 0, 0, NULL),
(64, 51, 0, 0, NULL),
(65, 52, 0, 0, NULL),
(66, 53, 0, 0, NULL),
(67, 54, 0, 0, NULL),
(68, 55, 0, 0, NULL),
(69, 56, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transactionId` varchar(128) NOT NULL,
  `userId` int(11) NOT NULL,
  `paymentMethod` varchar(32) NOT NULL,
  `amount` float NOT NULL,
  `phoneNumber` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `datePaid` timestamp NULL DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transactionId`, `userId`, `paymentMethod`, `amount`, `phoneNumber`, `email`, `datePaid`, `status`) VALUES
(1, 'ATPid_e8e594baa5982e634913e6b5d025baa5', 62, 'Mpesa', 10, '+254701201390', 'ken@gmail.com', '2017-06-23 05:00:00', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmations`
--

CREATE TABLE `payment_confirmations` (
  `id` int(11) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `referredBy` varchar(32) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `mpesaCode` varchar(32) DEFAULT NULL,
  `txnDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_code_counts`
--

CREATE TABLE `referral_code_counts` (
  `id` int(11) NOT NULL,
  `referralCode` varchar(128) NOT NULL,
  `l1Count` int(11) DEFAULT '0',
  `l2Count` int(11) DEFAULT '0',
  `l3Count` int(11) DEFAULT '0',
  `l4Count` int(11) DEFAULT '0',
  `l5Count` int(11) DEFAULT '0',
  `l6Count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_code_counts`
--

INSERT INTO `referral_code_counts` (`id`, `referralCode`, `l1Count`, `l2Count`, `l3Count`, `l4Count`, `l5Count`, `l6Count`) VALUES
(21, '9YV42D', 3, 2, 2, 2, 2, 6),
(22, '4P3IB0', 0, 0, 0, 0, 0, 0),
(23, 'MWWC4V', 0, 0, 0, 0, 0, 0),
(24, 'XR28C8', 2, 2, 2, 2, 6, 0),
(25, 'DDA4NR', 0, 0, 0, 0, 0, 0),
(26, 'FNAW4B', 2, 2, 2, 6, 0, 0),
(27, '09QPPD', 0, 0, 0, 0, 0, 0),
(28, 'UH8DVY', 2, 2, 6, 0, 0, 0),
(29, 'T3C9SM', 2, 6, 0, 0, 0, 0),
(30, '14JY5Z', 0, 0, 0, 0, 0, 0),
(31, '268YZT', 0, 0, 0, 0, 0, 0),
(32, 'D96KAZ', 5, 0, 0, 0, 0, 0),
(33, 'XNFJ4L', 0, 0, 0, 0, 0, 0),
(34, 'GDJRV7', 0, 0, 0, 0, 0, 0),
(35, '5T89MC', 0, 0, 0, 0, 0, 0),
(36, 'X0BR5T', 0, 0, 0, 0, 0, 0),
(37, 'DX3LDT', 0, 0, 0, 0, 0, 0),
(38, 'MGPGRA', 0, 0, 0, 0, 0, 0),
(39, 'N5M0Y2', 0, 0, 0, 0, 0, 0),
(40, 'CI0TNY', 0, 0, 0, 0, 0, 0),
(41, 'OIYMVP', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `referral_earnings`
--

CREATE TABLE `referral_earnings` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `referralCode` varchar(128) DEFAULT NULL,
  `l1Earning` float DEFAULT '0',
  `l2Earning` float DEFAULT '0',
  `l3Earning` float DEFAULT '0',
  `l4Earning` float DEFAULT '0',
  `l5Earning` float DEFAULT '0',
  `l6Earning` float DEFAULT '0',
  `totalEarning` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_earnings`
--

INSERT INTO `referral_earnings` (`id`, `userId`, `referralCode`, `l1Earning`, `l2Earning`, `l3Earning`, `l4Earning`, `l5Earning`, `l6Earning`, `totalEarning`) VALUES
(21, 34, '9YV42D', 2400, 1200, 800, 400, 240, 480, 5520),
(22, 35, '4P3IB0', 0, 0, 0, 0, 0, 0, 0),
(23, 36, 'MWWC4V', 0, 0, 0, 0, 0, 0, 0),
(24, 37, 'XR28C8', 1600, 1200, 800, 400, 720, 0, 4720),
(25, 38, 'DDA4NR', 0, 0, 0, 0, 0, 0, 0),
(26, 39, 'FNAW4B', 1600, 1200, 800, 1200, 0, 0, 4800),
(27, 40, '09QPPD', 0, 0, 0, 0, 0, 0, 0),
(28, 41, 'UH8DVY', 1600, 1200, 2400, 0, 0, 0, 5200),
(29, 42, 'T3C9SM', 1600, 3600, 0, 0, 0, 0, 5200),
(30, 43, '14JY5Z', 0, 0, 0, 0, 0, 0, 0),
(31, 44, '268YZT', 0, 0, 0, 0, 0, 0, 0),
(32, 45, 'D96KAZ', 4000, 0, 0, 0, 0, 0, 4000),
(33, 48, 'XNFJ4L', 0, 0, 0, 0, 0, 0, 0),
(34, 49, 'GDJRV7', 0, 0, 0, 0, 0, 0, 0),
(35, 50, '5T89MC', 0, 0, 0, 0, 0, 0, 0),
(36, 51, 'X0BR5T', 0, 0, 0, 0, 0, 0, 0),
(37, 52, 'DX3LDT', 0, 0, 0, 0, 0, 0, 0),
(38, 53, 'MGPGRA', 0, 0, 0, 0, 0, 0, 0),
(39, 54, 'N5M0Y2', 0, 0, 0, 0, 0, 0, 0),
(40, 55, 'CI0TNY', 0, 0, 0, 0, 0, 0, 0),
(41, 56, 'OIYMVP', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `referral_tree`
--

CREATE TABLE `referral_tree` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userReferralCode` varchar(128) DEFAULT NULL,
  `l1` varchar(128) DEFAULT NULL,
  `l2` varchar(128) DEFAULT NULL,
  `l3` varchar(128) DEFAULT NULL,
  `l4` varchar(128) DEFAULT NULL,
  `l5` varchar(128) DEFAULT NULL,
  `l6` varchar(128) DEFAULT NULL,
  `accountCredited` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_tree`
--

INSERT INTO `referral_tree` (`id`, `userId`, `userReferralCode`, `l1`, `l2`, `l3`, `l4`, `l5`, `l6`, `accountCredited`) VALUES
(33, 34, '9YV42D', '', NULL, NULL, NULL, NULL, NULL, 0),
(34, 35, '4P3IB0', '9YV42D', '', NULL, NULL, NULL, NULL, 0),
(35, 36, 'MWWC4V', '9YV42D', '', NULL, NULL, NULL, NULL, 0),
(36, 37, 'XR28C8', '9YV42D', '', NULL, NULL, NULL, NULL, 0),
(37, 38, 'DDA4NR', 'XR28C8', '9YV42D', '', NULL, NULL, NULL, 0),
(38, 39, 'FNAW4B', 'XR28C8', '9YV42D', '', NULL, NULL, NULL, 0),
(39, 40, '09QPPD', 'FNAW4B', 'XR28C8', '9YV42D', '', NULL, NULL, 0),
(40, 41, 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', '', NULL, NULL, 0),
(41, 42, 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', '', NULL, 0),
(42, 43, '14JY5Z', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', '', NULL, 0),
(43, 44, '268YZT', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', '', 0),
(44, 45, 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', '', 0),
(45, 48, 'XNFJ4L', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(46, 49, 'GDJRV7', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(47, 50, '5T89MC', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(48, 51, 'X0BR5T', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(49, 52, 'DX3LDT', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(50, 53, 'MGPGRA', 'D96KAZ', 'T3C9SM', 'UH8DVY', 'FNAW4B', 'XR28C8', '9YV42D', 0),
(51, 54, 'N5M0Y2', '', NULL, NULL, NULL, NULL, NULL, 0),
(52, 55, 'CI0TNY', '', NULL, NULL, NULL, NULL, NULL, 0),
(53, 56, 'OIYMVP', '', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `payoutDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `urlName` varchar(255) NOT NULL,
  `url` varchar(128) NOT NULL,
  `category` enum('E-learning','Work study') DEFAULT NULL,
  `description` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `urlName`, `url`, `category`, `description`) VALUES
(8, ' Hp-life e-learning ', 'https://hplife.edcastcloud.com', 'E-learning', NULL),
(9, ' Global health learning', 'https://www.globalhealthlearning.org', 'E-learning', NULL),
(10, ' Alison', 'https://alison.com', 'E-learning', NULL),
(11, ' Khan academy ', 'https://www.khanacademy.org', 'E-learning', NULL),
(12, 'University of the people', 'http://www.uopeople.edu', 'E-learning', NULL),
(13, 'Lynda', 'https://www.lynda.com', 'E-learning', NULL),
(14, 'Open colleges ', 'http://www.opencolleges.edu.au', 'E-learning', NULL),
(15, 'Open2study ', 'https://www.open2study.com', 'E-learning', NULL),
(16, 'Coursera', 'https://www.coursera.org', 'E-learning', NULL),
(17, 'University of Wollongong', 'http://www.uow.edu.au', 'E-learning', NULL),
(18, 'Online course report ', 'http://onlinecoursereport.com', 'E-learning', NULL),
(19, 'World bank', 'https://olc.worldbank.org', 'E-learning', NULL),
(20, 'Future Learn ', 'https://www.futurelearn.com', 'E-learning', NULL),
(21, 'Yali', 'https://yali.state.gov/courses', 'E-learning', NULL),
(22, 'GCF Learn ', 'https://www.gcflearnfree.org/windowsxp', 'E-learning', NULL),
(23, 'M-Post ', 'https://www.ajiradigital.go.ke/mpost', 'Work study', NULL),
(24, 'Niko Job', 'http://nikojob.yhub.co.ke', 'Work study', NULL),
(25, 'Eva', 'https://eva.genius.co.ke', 'Work study', NULL),
(26, 'Tuko Works ', 'http://www.tukoworks.co.ke', 'Work study', NULL),
(27, 'Crowd Source Africa ', 'https://crowdsourceafrica.com', 'Work study', NULL),
(28, 'Cloud Factory', 'https://www.cloudfactory.com', 'Work study', NULL),
(29, 'Freelancer', 'https://www.freelancer.com', 'Work study', NULL),
(30, 'Upwork', 'https://www.upwork.com', 'Work study', NULL),
(31, 'Iwriter', 'https://www.iwriter.com', 'Work study', NULL),
(32, 'Guru', 'http://www.guru.com', 'Work study', NULL),
(33, 'Truelancer', 'https://www.truelancer.com', 'Work study', NULL),
(34, 'Fiverr', 'https://www.fiverr.com', 'Work study', NULL),
(35, 'Transcribe', 'https://www.transcribe.com', 'Work study', NULL),
(36, 'Gotranscript', 'https://gotranscript.com', 'Work study', NULL),
(37, 'People per Hour ', 'https://www.peopleperhour.com', 'Work study', NULL),
(38, 'Machine Design ', 'http://www.machinedesign.com', 'Work study', NULL),
(39, 'Cadcowd', 'https://www.cadcrowd.com', 'Work study', NULL),
(40, 'Springboard', 'https://www.springboard.com', 'Work study', NULL),
(41, 'R-Users ', 'https://www.r-users.com', 'Work study', NULL),
(42, 'Toptal', 'https://www.toptal.com', 'Work study', NULL),
(43, 'Kaggle ', 'https://www.kaggle.com', 'Work study', NULL),
(44, 'WordPress', 'https://www.wordpress.com', 'Work study', NULL),
(45, 'Metafilter', 'https://www.metafilter.com', 'Work study', NULL),
(46, 'Gigster', 'https://www.gigster.com', 'Work study', NULL),
(47, 'Problogger', 'https://problogger.com', 'Work study', NULL),
(48, '99 Designs', 'https://www.99designs.com', 'Work study', NULL),
(49, 'Krop', 'https://www.krop.com', 'Work study', NULL),
(50, 'Local Solo', 'https://www.localsolo.com', 'Work study', NULL),
(51, 'Design crowd ', 'https://www.designcrowd.com', 'Work study', NULL),
(52, 'Smallbiztrends ', 'Smallbiztrends ', 'Work study', NULL),
(53, 'Study Pool', 'https://www.studypool.com/', 'Work study', NULL),
(54, 'Writer Bay ', 'http://www.writerbay.com/', 'Work study', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_logs`
--

CREATE TABLE `transaction_logs` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(140) NOT NULL,
  `txnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_logs`
--

INSERT INTO `transaction_logs` (`id`, `userId`, `amount`, `description`, `txnDate`) VALUES
(1, 34, 5520, 'Referral Earning Payout', '2017-06-23 21:33:43'),
(2, 37, 4720, 'Referral Earning Payout', '2017-06-23 21:33:43'),
(3, 39, 4800, 'Referral Earning Payout', '2017-06-23 21:33:43'),
(4, 41, 5200, 'Referral Earning Payout', '2017-06-23 21:33:43'),
(5, 42, 5200, 'Referral Earning Payout', '2017-06-23 21:33:43'),
(6, 45, 4000, 'Referral Earning Payout', '2017-06-23 21:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userReferralCode` varchar(128) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `idNo` int(20) NOT NULL,
  `phoneNumber` varchar(13) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `paymentStatus` enum('paid','pending') NOT NULL,
  `accountStatus` enum('active','blocked','pending') NOT NULL,
  `lastLogin` timestamp NULL DEFAULT NULL,
  `loginIp` varchar(128) NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userReferralCode`, `fullName`, `idNo`, `phoneNumber`, `email`, `username`, `password`, `paymentStatus`, `accountStatus`, `lastLogin`, `loginIp`, `createdAt`, `updatedAt`, `isAdmin`) VALUES
(34, '9YV42D', 'user one', 1, '1', '1@gmail.com', 'user1', '$2y$10$3JFat2HnJ/30wVW61G6YCOJ.tQwWMg5FC01M1Blp9EDD7UeIqdZ.O', 'pending', 'active', NULL, '105.230.222.74', '2017-07-14 09:26:45', NULL, 1),
(35, '4P3IB0', 'user three', 3, '3', '3@gmail.com', 'user3', '$2y$10$r0Rei69olb0uYXV8tZkWsOl8ajeMo48xK3O7Pa3FpqxUnuermrMle', 'pending', 'active', NULL, '105.230.222.74', '2017-06-26 10:18:24', NULL, 1),
(36, 'MWWC4V', 'user two', 222, '222', 'user2@mail.com', 'user2', '$2y$10$l4i2yi03q05yt8RwVVEDv.oHPVnUdyUWFEQEzHsDLSdbD9fOvEDDm', 'pending', 'active', NULL, '105.230.222.74', '2017-07-14 09:27:19', NULL, 0),
(37, 'XR28C8', 'user four', 4, '4', '4@gmail.com', 'user4', '$2y$10$Ceq.sd9KjBpbBRaGV8lpguGEXmoRIsjKmPdPMO7teXRSUQorK8IDm', 'pending', 'active', NULL, '105.230.222.74', '2017-07-14 09:27:12', NULL, 0),
(38, 'DDA4NR', 'user five', 5, '5', '5@gmail.com', 'user5', '$2y$10$LFxnDk.2L53Q6jaSH0jNkOBIGyGZ8u/VRAlA4L53J5OMgi/a.bGV.', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:44:36', NULL, 0),
(39, 'FNAW4B', 'user six', 884384, '4483484', 'user6@mail.com', 'user6', '$2y$10$19KYgYO3pPuQQImULR9T6epZeaYPq1mTpSjj7jM1Wf5Mu9Xg3zdVm', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(40, '09QPPD', 'user eight', 39843034, '9393032023032', 'user8@mail.com', 'user8', '$2y$10$.HUsX4jlxMa1YYrPYr7s/.jASwYRqAdVYb1hfKFJaPPJBISz3m5q6', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(41, 'UH8DVY', 'user seven', 7, '0712122', 'samgithae01@gmail.com', 'user7', '$2y$10$EN2EusGRAo/HIzpYPNMt2OUCz5yOqiFsDdq351KOPGwXPDBRzK2VS', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(42, 'T3C9SM', 'user nine', 2147483647, '4449494', 'user9@mail.com', 'user9', '$2y$10$G6gjBeeWJsVPpClu4x4Mu.mKc3/7.P5Yc.cqRVz5LQQ6zbIoLIa6W', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(43, '14JY5Z', 'USER ten', 10, '10', '10user@gmail.com', 'user10', '$2y$10$fT..qeoFhNiiJ3PGVVE0iePwk.wP61NH8NbMrUyNk9Dnn32mGU/Ga', 'pending', 'blocked', NULL, '105.230.222.74', '2017-06-23 11:03:31', NULL, 0),
(44, '268YZT', 'user eleven', 2147483647, '32833832', 'user11@mail.com', 'user11', '$2y$10$Lxc9fHE.hCY4KFwFpENAeucRkWwWZE8CL7E9AHRHFA8gFlI0ZDqHm', 'pending', 'active', NULL, '105.230.222.74', '2017-06-23 11:01:13', NULL, 0),
(45, 'D96KAZ', 'user twelve', 12, '12', 'samgithae02@gmail.com', 'user12', '$2y$10$wMUbWJl36NQ8quVsDijc7uce5TDpnDasRfmRDHcxwm7obfp8J033q', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(48, 'XNFJ4L', 'user thirteen', 13, '13', '13@gmail.com', 'user13', '$2y$10$nvKMEUa63.4VIbJ60a9WHeBk0fQegpQJaRGtiGzPeWodKguDjk59.', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(49, 'GDJRV7', 'user forteen', 141414141, '41414141', 'user14@mail.com', 'user14', '$2y$10$19qxbY/krMeVM/AoCQB3.utNHdlatGXZX67UmqRE8OYvUZJKMPhwi', 'pending', 'active', NULL, '105.230.222.74', '2017-06-16 23:35:15', NULL, 0),
(50, '5T89MC', 'user fiveteen', 1515151, '151515151', 'user15@mail.com', 'user15', '$2y$10$8CoUKmSXMbjaBFuv6Xks0.K4CkwzBiyuK3dCYJymAkYcwoCbGVTd.', 'pending', 'active', NULL, '105.231.0.63', '2017-06-17 09:03:49', NULL, 0),
(51, 'X0BR5T', 'user sixteen', 1616616161, '616161616161', 'user16@mail.com', 'user16', '$2y$10$GQvMLmqXr/wsUt4DrBViyuW1p8GPNggUKAWgEqcHOay8Hu3cWBef6', 'pending', 'active', NULL, '105.231.0.63', '2017-06-17 09:03:49', NULL, 0),
(52, 'DX3LDT', 'user seventeen', 2147483647, '171717171', 'user17@mail.com', 'user17', '$2y$10$sjEfSQBc7zBcmacF0.NX0uco1oR4AMf7ykoJ86FeNP4byC2FFIR.S', 'pending', 'active', NULL, '105.231.0.63', '2017-06-17 09:03:49', NULL, 0),
(53, 'MGPGRA', 'user eighteen', 2147483647, '18181818181', 'user18@mail.com', 'user18', '$2y$10$QO55LG1dklhQLQEZnGzgvO2cutjoX9pDSleq74g9LdAj49ZYCVXum', 'pending', 'active', NULL, '105.231.0.63', '2017-06-17 09:03:49', NULL, 0),
(54, 'N5M0Y2', 'Stephen Njoroge Muriuki', 30058111, '707408734', 'snjoroge27@gmail.com', 'StephenNjoroge', '$2y$10$Nr28Ig/kqWVV664yvhrDgOQr5Zv26mpNz8k64U9SlQktgo3uNXu66', 'pending', 'active', NULL, '105.231.0.63', '2017-06-17 10:51:54', NULL, 0),
(55, 'CI0TNY', 'Samuel Njiri Njuguna', 22531173, '0724168727', 'njirisam@gmai.com', 'njirisam', '$2y$10$oeWPocGNn02c8lK0BqEcHOjaY/nf9pt0VSfesBg.nvyISNcJtAmSO', 'pending', 'active', NULL, '196.202.161.150', '2017-06-25 20:56:50', NULL, 0),
(56, 'OIYMVP', 'Ruth Ngonyo Mwaura', 24181571, '0720425414', 'ruthwilliam85@gmail.com', 'Ruth Mwaura', '$2y$10$ySomuntDW52cpmL8mylOxeLaUR7J0cCMqa4gsduzwx41eiFWWAHim', 'pending', 'pending', NULL, '105.51.89.116', '2017-06-20 04:02:24', NULL, 0),
(62, 'BECSE8', 'KEN', 432331, '+254701201390', 'testmail@gmail.com', 'ken', '$2y$10$dMsHJMEZ5RMqGRHXjUWyi.8RLXCMlkITlwDHEIXWoWIv3C4T/wK02', 'paid', 'active', NULL, '105.230.226.231', '2017-06-23 11:09:21', NULL, 0),
(63, '10HHI1', 'o', 132443, '701201390', 'info@asilie-learning.co.ke', 'hudutech', '$2y$10$whwh7rCnivxNg9yjOxNG7OghSlnnfodsavnqYU2Yl09AxY0lovMV6', 'pending', 'pending', NULL, '154.76.161.153', '2017-06-23 14:34:44', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `earning_account`
--
ALTER TABLE `earning_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_confirmations`
--
ALTER TABLE `payment_confirmations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_code_counts`
--
ALTER TABLE `referral_code_counts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referralCode` (`referralCode`),
  ADD UNIQUE KEY `referralCode_2` (`referralCode`);

--
-- Indexes for table `referral_earnings`
--
ALTER TABLE `referral_earnings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referralCode` (`referralCode`);

--
-- Indexes for table `referral_tree`
--
ALTER TABLE `referral_tree`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userReferralCode` (`userReferralCode`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userReferralCode` (`userReferralCode`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `earning_account`
--
ALTER TABLE `earning_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_confirmations`
--
ALTER TABLE `payment_confirmations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_code_counts`
--
ALTER TABLE `referral_code_counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `referral_earnings`
--
ALTER TABLE `referral_earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `referral_tree`
--
ALTER TABLE `referral_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `transaction_logs`
--
ALTER TABLE `transaction_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
