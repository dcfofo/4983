-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 02:24 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SHOP_REGISTRY`
--

-- --------------------------------------------------------

--
-- Table structure for table `CF543`
--

CREATE TABLE IF NOT EXISTS `CF543` (
  `Control_no` varchar(10) NOT NULL,
  `Fault` text NOT NULL,
  `Fix` text,
  `Opened_by` varchar(25) DEFAULT NULL,
  `Closed_by` varchar(25) DEFAULT NULL,
  `SN` varchar(25) NOT NULL,
  `543_opened` timestamp NULL DEFAULT NULL,
  `543_closed` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CF543`
--

INSERT INTO `CF543` (`Control_no`, `Fault`, `Fix`, `Opened_by`, `Closed_by`, `SN`, `543_opened`, `543_closed`) VALUES
('25fd7d', 'Shaft Sheared', 'Spline replaced serv.', 'Avr Bloggins', 'MCpl Johnson', '124', '2016-05-05 16:47:00', '2016-05-20 16:47:00'),
('2c4d85', 'Spring Missing', 'Serv. Spring installed', 'Avr Bloggins', 'Cpl Trace', 'q989', '2017-05-30 11:47:00', '2017-06-12 11:47:00'),
('33ki8h', 'Lense Damaged', 'Lense replaced. Tested serv. IAW CFTO', 'Cpl Jones', 'Cpl Jones', 'in67', '2017-12-11 13:47:00', NULL),
('33we4r', 'Brushes WTL', '', 'Avr Bloggins', 'MCpl Johnson', 'q987', '2017-07-10 11:47:00', NULL),
('3cc7f8', 'OSI 363 due', 'OSI 363 carried out serv.', 'Cpl Shea', 'Cpl Shea', 'zx17', '2017-01-21 21:47:00', '2017-02-21 21:47:00'),
('4j7u9u', 'Sheared spline', 'Spline shaft replaced IAW CFTO', 'MCpl Castro', 'MCpl Castro', 'm12', '2017-09-19 19:47:00', '2017-09-25 19:47:00'),
('5g5t7g', 'Wiring harness damaged', 'Wired replaced. Functioned serv.', 'MCpl Hilchey', 'MCpl Hilchey', 'm23', '2017-09-21 17:47:00', NULL),
('7f7t4t', 'Resistance beyond limits', 'Rewired IAW ref.', 'Cpl Jones', 'Cpl Jones', 'i48', '2016-03-11 13:47:00', '2016-03-20 18:47:00'),
('9a8s7d', 'Faulty spring', 'Springs replaced. Functioned Serv.', 'Cpl Trace', 'Cpl Trace', 'q987', '2016-05-30 11:47:00', '2016-12-30 10:47:00'),
('d7rr5g', 'Liner torn', 'Liner replaced. Chute packed IAW CFTO', 'MCpl Ray', 'Cpl Shea', 'zx17', '2016-10-21 20:47:00', '2016-11-21 21:47:00'),
('gg7h4u', 'OSI 361 due', 'OSI 361 carried out serv.', 'MCpl Ray', 'MCpl Ray', 'l99', '2017-05-30 11:47:00', '2017-07-30 11:47:00'),
('h8t6n1', 'Shaft Sheared', 'Spline replaced serv.', 'Avr Bloggins', 'MCpl Johnson', '124', '2017-09-21 17:47:00', '2017-09-29 17:47:00'),
('ko4l9j', 'OSI 363 due', 'OSI 363 carried out serv.', 'Cpl Shea', 'Cpl Shea', 'zx19', '2017-01-21 21:47:00', '2017-02-21 21:47:00'),
('ooy6o6', 'Faulty spring', 'Springs replaced. Functioned Serv.', 'Cpl Trace', 'Cpl Trace', 'q987', '2016-03-30 11:47:00', '2016-04-10 19:47:00'),
('pt78i8', 'OSI 361 due', 'OSI 361 carried out serv.', 'Cpl Shea', 'Cpl Shea', 'l100', '2018-01-09 12:47:00', NULL),
('qq7w8e', 'Leaky pad', 'Pad replaced. See Support work', 'MCpl Castro', 'Cpl Black', 'b33', '2018-01-11 18:47:00', NULL),
('s5rg7b', 'Pad WTL', 'Serv pad installed', 'Cpl Black', 'MCpl Castro', 'b35', '2017-05-30 11:47:00', '2017-07-30 11:47:00'),
('s96ff3', 'Shaft Sheared', 'Spline replaced serv.', 'Avr Bloggins', 'MCpl Johnson', '124', '2018-01-10 19:47:00', NULL),
('v4hh5u', 'Indicator TX''d', 'Tested IAW CFTO. Serv.', 'MCpl Kanis', 'MCpl Kanis', 'in66', '2016-09-11 12:47:00', '2016-09-17 12:20:00'),
('ww93j4', 'Faulty spring', 'Springs replaced. Functioned Serv.', 'Cpl Trace', 'Cpl Trace', 'q987', '2016-04-20 11:47:00', '2016-04-30 22:10:00'),
('x7xv5t', 'Low spread on start', 'Wiring harness replaced. Functioned serv.', 'MCpl Bond', 'Cpl Robinson', '123', '2017-05-05 16:47:00', '2017-06-05 16:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `COMPONENT`
--

CREATE TABLE IF NOT EXISTS `COMPONENT` (
  `SN` varchar(25) NOT NULL,
  `PN` varchar(25) NOT NULL,
  `NSN` varchar(16) NOT NULL,
  `Comp_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMPONENT`
--

INSERT INTO `COMPONENT` (`SN`, `PN`, `NSN`, `Comp_name`) VALUES
('123', 'p559-6', '2222-00-365-9632', 'EDC'),
('124', 'p559-6', '2222-00-365-9632', 'EDC'),
('b33', 'b456-3', '3337-00-456-9874', 'Brake Assy'),
('b35', 'b456-3', '3337-00-456-9874', 'Brake Assy'),
('i47', 'ii-6', '6666-00-898-9855', 'TRU Wiring Harness'),
('i48', 'ii-6', '6666-00-898-9855', 'TRU Wiring Harness'),
('in66', 'I456', '0215-00-987-3541', 'Indicator, Altimeter'),
('in67', 'I456', '0215-00-987-3541', 'Indicator, Altimeter'),
('l100', 'l99-5', '7458-00-568-9147', 'Liferaft Assy'),
('l99', 'l99-4', '7458-00-568-9147', 'Liferaft Assy'),
('m12', '662-9', '8858-00-654-1563', 'Motor Assy'),
('m23', '662-10', '8858-00-654-1563', 'Motor Assy'),
('q987', 'w753-1', '1111-00-568-7894', 'Brush Block Assy'),
('q989', 'w753-1', '1111-00-568-7894', 'Brush Block Assy'),
('zx17', 't845-7', '4444-00-147-6589', 'Parachute Assy'),
('zx19', 't845-7', '4444-00-147-6589', 'Parachute Assy');

-- --------------------------------------------------------

--
-- Table structure for table `LOG`
--

CREATE TABLE IF NOT EXISTS `LOG` (
  `id` int(11) NOT NULL,
  `Shop` varchar(15) NOT NULL,
  `Control_no` varchar(10) NOT NULL,
  `Date_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Date_closed` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Log_closed_by` varchar(40) DEFAULT NULL,
  `In_shop` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LOG`
--

INSERT INTO `LOG` (`id`, `Shop`, `Control_no`, `Date_in`, `Date_closed`, `Log_closed_by`, `In_shop`) VALUES
(1, 'Engine Bay', '25fd7d', '2016-05-05 16:47:00', '2018-02-19 01:22:47', 'ford.dc', 0),
(2, 'Engine Bay', '2c4d85', '2017-05-30 11:47:00', '2017-06-12 11:47:00', 'ford.dc', 1),
(3, 'AVS Labs', '33ki8h', '2017-12-11 13:47:00', NULL, NULL, 0),
(4, 'Engine Bay', '33we4r', '2017-07-10 11:47:00', NULL, NULL, 0),
(5, 'ALSE Shop', '3cc7f8', '2017-01-21 21:47:00', '2017-02-21 21:47:00', 'bambury.s', 1),
(6, 'Component Shop', '4j7u9u', '2017-09-19 19:47:00', '2017-09-25 19:47:00', 'hilchey.sd', 1),
(7, 'Component Shop', '5g5t7g', '2017-09-21 17:47:00', NULL, NULL, 0),
(8, 'AVS Labs', '7f7t4t', '2016-03-11 13:47:00', '2016-03-20 18:47:00', 'shehata.kn', 1),
(9, 'Engine Bay', '9a8s7d', '2016-05-30 11:47:00', '2018-02-19 01:22:59', 'snow.pj', 1),
(10, 'ALSE Shop', 'd7rr5g', '2016-10-21 20:47:00', '2016-11-21 21:47:00', 'bambury.s', 0),
(11, 'ALSE Shop', 'gg7h4u', '2017-05-30 11:47:00', '2017-07-30 11:47:00', 'bambury.s', 1),
(12, 'Engine Bay', 'h8t6n1', '2017-09-21 17:47:00', '2017-09-29 17:47:00', 'snow.pj', 1),
(13, 'ALSE Shop', 'ko4l9j', '2017-01-21 21:47:00', '2017-02-21 21:47:00', 'bambury.s', 1),
(14, 'ALSE Shop', 'pt78i8', '2018-01-09 12:47:00', NULL, NULL, 0),
(15, 'Component Shop', 'qq7w8e', '2018-01-11 18:47:00', NULL, NULL, 0),
(16, 'Component Shop', 's5rg7b', '2017-05-30 11:47:00', '2017-07-30 11:47:00', 'hilchey.sd', 1),
(17, 'Engine Bay', 's96ff3', '2018-01-10 19:47:00', NULL, NULL, 0),
(18, 'AVS Labs', 'v4hh5u', '2016-09-11 12:47:00', '2016-09-17 12:20:00', 'shehata.kn', 1),
(19, 'Engine Bay', 'x7xv5t', '2017-05-05 16:47:00', '2017-06-05 16:47:00', 'ford.dc', 1),
(20, 'Engine Bay', 'ooy6o6', '2016-03-30 11:47:00', '2018-02-19 00:49:28', 'ford.dc', 0),
(21, 'Engine Bay', 'ww93j4', '2016-04-20 11:47:00', '2018-02-19 01:20:43', 'ford.dc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TECHNICIAN`
--

CREATE TABLE IF NOT EXISTS `TECHNICIAN` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Shop` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TECHNICIAN`
--

INSERT INTO `TECHNICIAN` (`Username`, `Password`, `Shop`) VALUES
('bambury.s', '$2y$10$ZaMjdd3GhPcyxHnnnCI4XO367Lq9lhQmNYMHKFGgsrAAnNFLpmhoa', 'ALSE Shop'),
('bloggins.fv', '$2y$10$oJiBll4VeqGQxZVL3DmufONOsXoVXYWHUzTXbuFrP69UyoPKRf9V6', 'Engine Bay'),
('castro.dr', '$2y$10$BtGC9FkS/Iu7IsmyABzi.ecO.Y1/h2OoOdlwzuf3genHzWXpIg.zW', 'Component Shop'),
('day.d', '$2y$10$TCAJD9Ll9wg/.2W.Z1fEc.nlwg2yC0CAb1YYgRizxmvhQDTyC9eZC', 'Engine Bay'),
('ford.dc', '$2y$10$zUjrzVY7zpEZ8G4IO7mjruAKiQwQPtMXBOPjeb3XKP193whCPqzpK', 'Engine Bay'),
('hilchey.sd', '$2y$10$bcreFDP21n8d0hcv1rw0XOOwvEp4TACLWxMRKA6hZX.Retlxxx1Ne', 'Component Shop'),
('johnson.jj', '$2y$10$sN/wnqmNYkPDcoymwCapVeAAmDaQXFV.Q1hN4Z/F8pnTU2iuvVCG.', 'Engine Bay'),
('Jones.kd', '$2y$10$xuOvBAhH.RUn4r4Smu75..Kp5KpGLl32e.Fl7PX9I/04j6PoTC5by', 'AVS Labs'),
('Kanis.tt', '$2y$10$bnj1FUQxlomJ4nb0UYhHhe7p0RzY9cKoHS5mmi452XHNLuMKdHy5.', 'AVS Labs'),
('ray.wp', '$2y$10$iEL35YmA/L8kmUiwpQN2a.IRWsa.LKLt7uVJv6J4cUAJjM6iPUpHy', 'ALSE Shop'),
('shea.js', '$2y$10$xYYrbNqBQQYneUYMCdelluXsZtzbdFggYGu/UZY3o/nqL/dD/9vRG', 'ALSE Shop'),
('shehata.kn', '$2y$10$2DqAy4Osj81qqMmbv7bl9eC1cymG1CMeeYndPQf4tAD132oNOwOBK', 'AVS Labs'),
('snow.pj', '$2y$10$V.jHF0pXNZEUPN/s6NyHCOvPrWaNoLlmDgjWdmkUSKe6Sf18w9wy6', 'Engine Bay'),
('trace.as', '$2y$10$aTPBxcAx9QoSPAKIYySxU.s1oZaGbAU8LLtukYQ17IspqnEXeKfVO', 'Engine Bay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CF543`
--
ALTER TABLE `CF543`
  ADD PRIMARY KEY (`Control_no`);

--
-- Indexes for table `COMPONENT`
--
ALTER TABLE `COMPONENT`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `LOG`
--
ALTER TABLE `LOG`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TECHNICIAN`
--
ALTER TABLE `TECHNICIAN`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `LOG`
--
ALTER TABLE `LOG`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
