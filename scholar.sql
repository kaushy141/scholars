-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 03:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `point` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mode` enum('Credit','Debit') DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(15) DEFAULT NULL,
  `device` varchar(250) DEFAULT NULL,
  `created_by` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `title`, `content`, `variant`, `link`, `created_date`, `ip_address`, `device`, `created_by`) VALUES
(1, 1, 'Account', 'Signin successfull', 'Primary', NULL, '0000-00-00 00:00:00', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(2, 1, 'Account', 'Signin successfull', 'Primary', NULL, '0000-00-00 00:00:00', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(3, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2022-12-24 19:49:16', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(4, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2022-12-24 19:54:33', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(5, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2022-12-24 19:57:07', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(6, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2022-12-27 08:45:39', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(7, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2022-12-27 09:16:21', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(8, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-02 10:30:14', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(9, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-02 11:08:24', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(10, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-02 11:09:22', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(11, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-02 11:36:37', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(12, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-02 11:38:48', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(13, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-03 06:46:39', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(14, 4, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-03 09:33:38', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(15, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-03 13:04:25', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(16, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-03 13:36:23', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(17, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-04 10:49:42', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(18, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-05 07:54:43', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(19, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-05 12:58:14', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(20, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-06 08:49:33', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(21, 4, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 07:11:39', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(22, 2, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 07:20:35', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(23, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 07:23:39', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(24, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 08:25:31', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(25, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 08:26:25', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(26, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-09 08:27:12', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(27, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-10 13:07:07', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(28, 2, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-10 13:22:40', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(29, 1, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-10 13:23:12', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(30, 4, 'Account', 'Signin successfull', 'Primary', NULL, '2023-01-11 05:42:45', '127.0.0.1', 'Windows 10|Firefox 108.0', 0),
(31, 5, 'Account', 'Account password changed', 'warning', NULL, '2023-01-11 06:47:13', '127.0.0.1', 'Windows 10|Firefox 108.0', 4),
(32, 6, 'Account', 'Account activated', 'success', NULL, '2023-01-11 06:47:27', '127.0.0.1', 'Windows 10|Firefox 108.0', 4),
(33, 2, 'Account', 'Signin successfull', 'primary', NULL, '2023-01-12 09:30:07', '127.0.0.1', 'Windows 10|Firefox 108.0', 2),
(34, 1, 'Account', 'Signin successfull', 'primary', NULL, '2023-01-12 09:31:51', '127.0.0.1', 'Windows 10|Firefox 108.0', 1),
(35, 1, 'Account', 'Signin successfull', 'primary', NULL, '2023-01-13 06:44:23', '127.0.0.1', 'Windows 10|Firefox 108.0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `line1` varchar(50) DEFAULT NULL,
  `line2` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `line1`, `line2`, `district`, `state`, `country`, `pincode`, `created_date`, `status`) VALUES
(1, 6, '21', 'Panaki', 'Kanpur', 'UTTAR PRADESH', 'India', '226017', '2022-12-24 00:05:56', 1),
(2, 1, '21', 'Panaki', 'Kanpur', 'UTTAR PRADESH', 'India', '226017', '2022-12-24 00:28:34', 1),
(3, 7, 'hreyeryer', 'eryeryeryer', 'eryeryeryery', 'ANDAMAN and NICOBAR', 'India', '664363', '2022-12-27 15:50:00', 1),
(4, 4, 'vdvddfvfdv', 'cvdfvdf', 'bfdgdfgd', 'ANDAMAN and NICOBAR', 'India', '645746', '2022-12-27 16:56:02', 1),
(5, 4, 'csafsdfsdg', 'sdgsdgsdg', 'sdgsdgdsdgsdg', 'ANDAMAN and NICOBAR', 'India', '643643', '2022-12-27 17:07:39', 1),
(6, 4, 'gfgjfg', 'jgfjfgj', 'jfgjfgjfg', 'ANDAMAN and NICOBAR', 'India', '546745', '2022-12-27 19:03:47', 1),
(7, 4, 'gdgdfg', 'dfgdfg', 'dfgdfgdf', 'ANDAMAN and NICOBAR', 'India', '454354', '2022-12-27 19:04:19', 1),
(8, 2, 'dgdfgdf', 'dfgdfgd', 'dfgdfgdf', 'ANDAMAN and NICOBAR', 'India', '434234', '2023-01-04 19:48:00', 1),
(9, 5, 'rrwerwe', 'rwer', 'rerwerwrw', 'ANDAMAN and NICOBAR', 'India', '243244', '2023-01-05 15:06:21', 1),
(10, 5, 'rrwerwe', 'rwerff', 'rerwerwrw', 'ANDAMAN and NICOBAR', 'India', '243244', '2023-01-05 15:06:45', 1),
(11, 8, 'rewwwe', 'wetewtew', 'tewtwetewt', 'RAJASTHAN', 'India', '344242', '2023-01-06 15:25:20', 1),
(12, 7, 'dfgdfgdf', 'hdfhdfhdf', 'hdfhdfhdfh', 'ANDAMAN and NICOBAR', 'India', '663463', '2023-01-06 16:54:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) NOT NULL,
  `key` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documnet_id` int(10) NOT NULL,
  `document_path` varchar(50) DEFAULT NULL,
  `document_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donner_profile`
--

CREATE TABLE `donner_profile` (
  `donner_user_id` int(10) NOT NULL,
  `donner_business` varchar(50) DEFAULT NULL,
  `donner_uuid` varchar(50) DEFAULT NULL,
  `donner_tax_id` varchar(50) DEFAULT NULL,
  `donner_about` varchar(5000) DEFAULT NULL,
  `donner_income_range` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identities`
--

CREATE TABLE `identities` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identities`
--

INSERT INTO `identities` (`id`, `name`, `image`, `created_date`, `created_by`, `status`) VALUES
(1, 'Adhar Number', 'public/uploads/identities/c/4/1673526043_b946d446489e47b2b79a.png', '2023-01-12 17:30:05', 0, 1),
(2, 'Driving Licence', 'public/uploads/identity/k/h/1673529450_068c504084336277c063.png', '2023-01-12 17:30:05', 0, 1),
(3, 'Pan Number', 'public/uploads/identity/2/p/1673527240_efe5eb8681bcb5e9c5b3.png', '2023-01-12 17:30:05', 0, 1),
(4, 'Rashan Card Number', 'public/uploads/identity/2/k/1673529325_d717827cdf054313e74d.png', '2023-01-12 17:30:05', 0, 1),
(5, 'Votter Card', 'public/uploads/identity/d/0/1673529311_0e1fd2dd15a4cf622020.png', '2023-01-12 17:30:05', 0, 1),
(6, 'Passport', 'public/uploads/identities/t/f/1673525903_51aca95c5099b37f7ef5.png', '0000-00-00 00:00:00', 1, 1),
(7, 'Birth Certificate', 'public/uploads/identity/o/x/1673529299_647c47820034bb96234f.png', '2023-01-12 17:50:43', 1, 1),
(8, 'National Identity Certificate', 'public/uploads/identity/p/f/1673529288_d83c488f0b2a5de9faa0.png', '2023-01-12 17:55:25', 1, 1),
(9, 'Local Munciple Authority', 'public/uploads/identity/p/7/1673527220_23512f8f8a3b54d01521.png', '2023-01-12 18:10:20', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `incomesource`
--

CREATE TABLE `incomesource` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incomesource`
--

INSERT INTO `incomesource` (`id`, `name`, `status`) VALUES
(1, 'Private Business', 1),
(2, 'Govt. Employee', 1),
(3, 'Private Employee', 1),
(4, 'Export/Import of Goods', 1),
(5, 'Non-governmental organization', 1),
(6, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` datetime DEFAULT NULL,
  `device` varchar(250) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `session_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `user_id`, `login_time`, `logout_time`, `device`, `ip_address`, `session_id`) VALUES
(1, 1, '2022-12-25 00:59:14', '0000-00-00 00:00:00', 'Windows 10|Firefox 108.0', '127.0.0.1', 'h3rr0i33nv14hom3u3qgacnjpkujnh7k'),
(2, 1, '2022-12-25 00:59:59', '0000-00-00 00:00:00', 'Windows 10|Firefox 108.0', '127.0.0.1', '7gh2ffunridoc5r5bft4i076janq6jfm'),
(3, 1, '2022-12-25 01:00:53', '0000-00-00 00:00:00', 'Windows 10|Firefox 108.0', '127.0.0.1', '4cubih2ufoeuni7tf4dtt2f82iuhs35i'),
(4, 1, '2022-12-25 01:01:37', '2022-12-24 13:34:14', 'Windows 10|Firefox 108.0', '127.0.0.1', 'qg3jmpgsdo9pij3bdafrgs7ci0q8sis8'),
(5, 1, '2022-12-25 01:09:46', '2022-12-24 13:42:08', 'Windows 10|Firefox 108.0', '127.0.0.1', 'pjp1o6m9tm8bvv620cg1itqo7o1mgu12'),
(6, 1, '2022-12-25 01:15:17', '2022-12-24 13:46:29', 'Windows 10|Firefox 108.0', '127.0.0.1', 'dbbli7k1ma1vgtfk1shtdsddpdmvtc98'),
(7, 1, '2022-12-25 01:16:31', '2022-12-24 13:47:22', 'Windows 10|Firefox 108.0', '127.0.0.1', 'a0ii3dsjnvor2a0qtd22u55mje1jvefr'),
(8, 1, '2022-12-25 01:17:24', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'ta69vk3tg13p1jvq84qnvfdtvsmprfbk'),
(9, 1, '2022-12-25 01:18:42', '2022-12-24 13:49:13', 'Windows 10|Firefox 108.0', '127.0.0.1', 'ta69vk3tg13p1jvq84qnvfdtvsmprfbk'),
(10, 1, '2022-12-25 01:19:16', '2022-12-24 13:54:31', 'Windows 10|Firefox 108.0', '127.0.0.1', '290apqmmb3ht78ttbrnj21kold0alp3a'),
(11, 1, '2022-12-25 01:24:33', '2022-12-24 13:56:41', 'Windows 10|Firefox 108.0', '127.0.0.1', 'n50n5u7tvgpvlmb6auu6mujvfosf5d85'),
(12, 1, '2022-12-25 01:27:07', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'ai0an63g4dv0fpd40jpem44thetnak0c'),
(13, 1, '2022-12-27 14:15:38', '2022-12-27 03:14:37', 'Windows 10|Firefox 108.0', '127.0.0.1', 'h6jdcnip08qdchlrs2aoq1b4s60j2pc9'),
(14, 1, '2022-12-27 14:46:21', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', '9759so40ehsdhjqoo8j1kn2vvje1lo44'),
(15, 1, '2023-01-02 16:00:14', '2023-01-02 05:08:14', 'Windows 10|Firefox 108.0', '127.0.0.1', 't8a7r0lidlbigk5qtbfj8ojc9chlbgcf'),
(16, 1, '2023-01-02 16:38:24', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', '0mf4m83mi1rr3bojckc2v44d9m744lts'),
(17, 1, '2023-01-02 16:39:22', '2023-01-02 05:36:25', 'Windows 10|Firefox 108.0', '127.0.0.1', '0mf4m83mi1rr3bojckc2v44d9m744lts'),
(18, 1, '2023-01-02 17:06:37', '2023-01-02 05:38:28', 'Windows 10|Firefox 108.0', '127.0.0.1', '7fh3rapq9k5racfkhc7afqgqe92o6fu8'),
(19, 1, '2023-01-02 17:08:48', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'doinoevh9hp0ct3eit6u1a88m43d32ss'),
(20, 1, '2023-01-03 12:16:39', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'nhhqn6ca431du344irkrdhe45jlorn8u'),
(21, 4, '2023-01-03 15:03:38', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', '9hdc2lmd2ljrcho5rurrg0a7p8fuoual'),
(22, 1, '2023-01-03 18:34:25', '2023-01-03 07:36:09', 'Windows 10|Firefox 108.0', '127.0.0.1', 'sha7vlnai6dae1s4av8b8dvjvct44vjj'),
(23, 1, '2023-01-03 19:06:23', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'ko8lg8q1bj5n7ru88gsigr75litupr7g'),
(24, 1, '2023-01-04 16:19:42', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'u0g49gq7pva7fr31ah4l8hf97pmjf8o6'),
(25, 1, '2023-01-05 13:24:43', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'rm174db4grjmc1hn2ehd1dsd417pcesk'),
(26, 1, '2023-01-05 18:28:14', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', '13cj95vq7si01051jiejvi54dsofcfkd'),
(27, 1, '2023-01-06 14:19:33', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'tl90gid0db683gf09q08utfp228fdmts'),
(28, 4, '2023-01-09 12:41:39', '2023-01-09 01:14:13', 'Windows 10|Firefox 108.0', '127.0.0.1', '60211v3la4b3s1flbtjst7k0m8ke7imj'),
(29, 2, '2023-01-09 12:50:35', '2023-01-09 01:23:17', 'Windows 10|Firefox 108.0', '127.0.0.1', 'f2h8v36m3pchtkvdqbeknocbfqliboo7'),
(30, 1, '2023-01-09 12:53:39', '2023-01-09 02:24:11', 'Windows 10|Firefox 108.0', '127.0.0.1', 'bh6qcasgceasdlhokv49u2l2kpsebcoi'),
(31, 1, '2023-01-09 13:55:31', '2023-01-09 02:26:07', 'Windows 10|Firefox 108.0', '127.0.0.1', '28au5m2g7a1p0pag1kd46tpgr5da8nvf'),
(32, 1, '2023-01-09 13:56:25', '2023-01-09 02:26:43', 'Windows 10|Firefox 108.0', '127.0.0.1', 'b3ph4jg3iger51s72pbib20eoguee3ss'),
(33, 1, '2023-01-09 13:57:12', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'q4f6rjnmtvlojnjbc22o5s19unvoftl0'),
(34, 1, '2023-01-10 18:37:07', '2023-01-10 07:07:21', 'Windows 10|Firefox 108.0', '127.0.0.1', 'dt872j3up8r57uu08fsokat70cs8kqkt'),
(35, 2, '2023-01-10 18:52:40', '2023-01-10 07:22:46', 'Windows 10|Firefox 108.0', '127.0.0.1', '022vio8aop0p5j3c6jpt83hmkbr0sld6'),
(36, 1, '2023-01-10 18:53:12', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'hq9ob5vhjjba0ddc8odfl9a8akoag9p1'),
(37, 4, '2023-01-11 11:12:44', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'iqcj3ngnhf6r3br7agr06jtkc9h0nv21'),
(38, 2, '2023-01-12 15:00:07', '2023-01-12 03:30:41', 'Windows 10|Firefox 108.0', '127.0.0.1', 'e60kdb2s16ssakd1ilmjlc5fo4rkiqdt'),
(39, 1, '2023-01-12 15:01:51', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', 'jv0liv7uc0k6h9tdn2bct5t4ll349c9u'),
(40, 1, '2023-01-13 12:14:23', NULL, 'Windows 10|Firefox 108.0', '127.0.0.1', '3geao298beuncnerkt4g1330n0ihdnod');

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) DEFAULT NULL,
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metrics`
--

INSERT INTO `metrics` (`id`, `name`, `details`, `created_date`, `image`, `created_by`, `status`) VALUES
(1, '8th Marksheet', NULL, '2023-01-12 18:56:03', 'public/uploads/metrics/w/9/1673529963_5ffc7f2b1473c37af0b2.png', 0, 1),
(2, '10th Certificate', NULL, '2023-01-13 12:16:07', 'public/uploads/metrics/4/w/1673592367_2eec460246ac6c04c55a.png', 0, 1),
(3, '10+2 Certitifate', NULL, '2023-01-13 12:17:21', 'public/uploads/metrics/t/5/1673592441_821204a154c1267bd909.png', 0, 1),
(4, '10+2 Marksheet', NULL, '2023-01-13 12:17:55', 'public/uploads/metrics/h/c/1673592475_1816fce8013eac683065.png', 0, 1),
(5, 'Graduation Certificate', NULL, '2023-01-13 12:18:22', 'public/uploads/metrics/p/x/1673592502_c5519440471612a1be16.png', 0, 1),
(6, 'Graduation Marksheet', NULL, '2023-01-13 12:18:55', 'public/uploads/metrics/7/7/1673592535_71e021d7e007d17a33f7.png', 0, 1),
(7, 'Post Graduation Certificate', NULL, '2023-01-13 12:19:37', 'public/uploads/metrics/d/q/1673592577_f04b2776253ded3c365d.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qrcodes`
--

CREATE TABLE `qrcodes` (
  `id` int(10) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `point` int(10) NOT NULL DEFAULT 0,
  `is_used` int(1) NOT NULL DEFAULT 0,
  `used_user_id` int(10) NOT NULL DEFAULT 0,
  `used_date` datetime DEFAULT NULL,
  `is_printed` int(1) DEFAULT 0,
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `name`, `image`, `created_date`, `created_by`, `status`) VALUES
(1, '8th Standared', 'public/uploads/qualification/a/6/1673529516_4959dcc2837c85669a83.png', '2023-01-12 18:48:36', 0, 1),
(2, '10th Standared', 'public/uploads/qualification/v/7/1673529923_5c0ae66db1fe74ff0258.png', '2023-01-12 18:55:23', 0, 1),
(3, '10+2 Intermediate Passed', 'public/uploads/qualification/1/s/1673592874_944cecd212024de3877c.png', '2023-01-13 12:24:34', 0, 1),
(4, 'Graduation', 'public/uploads/qualification/r/b/1673592899_7154c02dff30d199b10b.png', '2023-01-13 12:24:59', 0, 1),
(5, 'Post Graduation', 'public/uploads/qualification/t/6/1673592921_f34a5f24bc314b28aa88.png', '2023-01-13 12:25:21', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qualification_metrics`
--

CREATE TABLE `qualification_metrics` (
  `metric_id` int(10) NOT NULL DEFAULT 0,
  `qualification_id` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`id`, `name`, `details`, `image`, `created_date`, `created_by`, `status`) VALUES
(1, 'State Minister Scholar', NULL, 'public/uploads/scholar/c/r/1673011111_56215f920c6283aae19e.png', '0000-00-00 00:00:00', 0, 0),
(2, 'Prim minister Rural Scholarship', 'About prim minister Rural Scholarship', 'public/uploads/scholar/5/t/1673529156_c772a02c8e2e4b45fd72.png', '2023-01-06 18:50:27', 0, 1),
(3, '10th Standared Scholarship', 'About 10th Standard Scholarship', 'public/uploads/scholar/5/l/1673011417_958b0b39170672a6acf4.png', '2023-01-06 18:52:37', 0, 1),
(4, 'New Scholar By Admin', NULL, 'public/uploads/scholar/q/o/1673523456_bf281b1fcfd19aeed639.png', '2023-01-12 17:07:36', 0, 1),
(5, '8th Standared Scholar', NULL, 'public/uploads/scholar/8/6/1673529487_2a63b3d66791c67ebd8b.png', '2023-01-12 18:38:58', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `id` int(10) NOT NULL,
  `scholar_id` int(10) DEFAULT 0,
  `amount` int(10) DEFAULT 0,
  `year` year(4) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `reg_start_date` datetime DEFAULT NULL,
  `reg_end_date` datetime DEFAULT NULL,
  `announce_date` datetime DEFAULT NULL,
  `cycle` enum('Monthly','Quaterly','Half Yearly','Yearly','Once Only') DEFAULT NULL,
  `auto_renew` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`id`, `scholar_id`, `amount`, `year`, `publish_date`, `reg_start_date`, `reg_end_date`, `announce_date`, `cycle`, `auto_renew`, `created_date`, `updated_date`, `deleted_date`, `created_by`, `status`) VALUES
(1, 2, 435345, 2023, '2023-01-14 00:00:00', '2023-01-15 00:00:00', '2023-01-16 00:00:00', '2023-01-17 00:00:00', 'Yearly', 1, '2023-01-13 13:59:04', NULL, NULL, 0, 1),
(2, 3, 2000, 2023, '2023-01-13 00:00:00', '2023-01-16 00:00:00', '2023-01-17 00:00:00', '2023-01-18 00:00:00', 'Yearly', 1, '2023-01-13 17:43:48', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scholar_applied`
--

CREATE TABLE `scholar_applied` (
  `id` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `scholar_id` int(10) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholar_qualification`
--

CREATE TABLE `scholar_qualification` (
  `scholar_id` int(10) NOT NULL DEFAULT 0,
  `qualification_id` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar_qualification`
--

INSERT INTO `scholar_qualification` (`scholar_id`, `qualification_id`, `status`) VALUES
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(3, 1, 1),
(3, 2, 1),
(4, 1, 1),
(5, 1, 1),
(5, 2, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `status`) VALUES
(1, 'ANDHRA PRADESH', 105, 1),
(2, 'ASSAM', 105, 1),
(3, 'ARUNACHAL PRADESH', 105, 1),
(4, 'BIHAR', 105, 1),
(5, 'GUJRAT', 105, 1),
(6, 'HARYANA', 105, 1),
(7, 'HIMACHAL PRADESH', 105, 1),
(8, 'JAMMU and KASHMIR', 105, 1),
(9, 'KARNATAKA', 105, 1),
(10, 'KERALA', 105, 1),
(11, 'MADHYA PRADESH', 105, 1),
(12, 'MAHARASHTRA', 105, 1),
(13, 'MANIPUR', 105, 1),
(14, 'MEGHALAYA', 105, 1),
(15, 'MIZORAM', 105, 1),
(16, 'NAGALAND', 105, 1),
(17, 'ORISSA', 105, 1),
(18, 'PUNJAB', 105, 1),
(19, 'RAJASTHAN', 105, 1),
(20, 'SIKKIM', 105, 1),
(21, 'TAMIL NADU', 105, 1),
(22, 'TRIPURA', 105, 1),
(23, 'UTTAR PRADESH', 105, 1),
(24, 'WEST BENGAL', 105, 1),
(25, 'DELHI', 105, 1),
(26, 'GOA', 105, 1),
(27, 'PONDICHERY', 105, 1),
(28, 'LAKSHDWEEP', 105, 1),
(29, 'DAMAN & DIU', 105, 1),
(30, 'DADRA & NAGAR', 105, 1),
(31, 'CHANDIGARH', 105, 1),
(32, 'ANDAMAN and NICOBAR', 105, 1),
(33, 'UTTARANCHAL', 105, 1),
(34, 'JHARKHAND', 105, 1),
(35, 'CHATTISGARH', 105, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dealer` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `line1` varchar(100) DEFAULT NULL,
  `line2` varchar(100) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `mobile`, `dealer`, `image`, `about`, `line1`, `line2`, `district`, `state`, `country`, `position`, `created_date`, `updated_date`, `deleted_date`, `status`) VALUES
(1, 'teeeyter', '6436345353', 'ryeryery', 'store/c/m/1672135709_89a87a32948f45c81cbf.jpeg', 'dyeryeery', 'reterteter', 'yyeryryeryer', 'yryeryeyeryer', 'ANDAMAN and NICOBAR', 'India', 8, '2022-12-27 14:25:13', NULL, NULL, 0),
(2, 'gsdgsd', '5643464364', 'dfghdshg', 'store/b/3/1672135800_b3ce857aa1e72222fcb8.jpg', '2dgdhdfhdfh', 'fdhdhdf', 'dfhdfhdf', 'hdfhdfhd', 'ANDAMAN and NICOBAR', 'India', 1, '2022-12-27 15:39:59', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `student_user_id` int(10) NOT NULL,
  `student_dob` date DEFAULT NULL,
  `student_father_name` varchar(50) DEFAULT NULL,
  `student_mother_name` varchar(50) DEFAULT NULL,
  `student_permanent_address` varchar(500) DEFAULT NULL,
  `student_local_address` varchar(500) DEFAULT NULL,
  `student_school_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `code` varchar(32) DEFAULT NULL,
  `type` int(10) NOT NULL DEFAULT 0,
  `fname` varchar(30) DEFAULT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `address_id` int(10) DEFAULT 0,
  `district` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT 0,
  `charges` double(10,2) NOT NULL DEFAULT 0.00,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `status` enum('Unverified','Active','Deleted','Suspended') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `type`, `fname`, `mname`, `lname`, `email`, `mobile`, `password`, `address_id`, `district`, `state`, `country`, `image`, `email_verified`, `mobile_verified`, `charges`, `created_date`, `updated_date`, `deleted_date`, `status`) VALUES
(1, 'fc3e264edc2acd0cf356babbf39bda52', 1, 'Kaushal', NULL, 'Sachan', 'kaushyedu@gmail.com', '894788883', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 1, 1, 0.00, '2022-12-09 18:07:48', NULL, NULL, 'Active'),
(2, 'c16c052845d10a0fec95b969c4c55dd0', 2, 'Kaushal', '', 'Sachan', 'kaushyedu2@gmail.com', '7894561232', '25d55ad283aa400af464c76d713c07ad', 8, NULL, 'ANDAMAN and NICOBAR', 'India', 'public/img/user_default.png', 1, 1, 0.00, '2022-12-09 18:57:36', NULL, NULL, 'Suspended'),
(3, '8a7832214425b3f4fd8b4c609673d537', 1, 'Kaushal', NULL, 'Sachan', 'kaushyedu3@gmail.com', '8978978999', '251c1a8acc5fae4bf6eab5aba0ed8473', NULL, NULL, NULL, NULL, 'public/img/user_default.png', 0, 0, 0.00, '2022-12-09 19:20:19', NULL, NULL, 'Active'),
(4, '7280a9b101fc8e421b619c031f9e33c7', 1, 'Kaushal', '', 'Sachan', 'cooldudekaushy@gmail.com', '7894561239', '25d55ad283aa400af464c76d713c07ad', 7, 'dfgdfgdf', 'ANDAMAN and NICOBAR', 'India', 'public/img/user_default.png', 1, 1, 1.00, '2022-12-09 19:20:50', NULL, NULL, 'Unverified'),
(5, 'a94f853353abf08755cc7a71a6b90981', 2, 'Kaushal', 'Singh', 'Sachan', 'ksssssjjjfkfk@gmail.com', '8947889123', 'eefa5c7446c38e5f2def619ede7933a4', 10, 'rerwerwrw', 'ANDAMAN and NICOBAR', 'India', 'public/img/user_default.png', 1, 1, 250.00, '2022-12-23 22:16:08', NULL, NULL, 'Active'),
(6, '8d8abc45a6048e7d3c5f7fb5c9abc12a', 2, 'Kuldeep', 'Singh', 'Kumar', 'kuldeep@gmail.com', '8947889123', 'BtkYr2bv', 1, 'Kanpur', 'UTTAR PRADESH', 'India', 'public/img/user_default.png', 1, 1, 9000.00, '2022-12-24 00:05:56', NULL, NULL, 'Active'),
(7, '0a56e87a9c6996d0bd4fa5d687e352f7', 2, 'rtewr', 'eryewrywery', 'ryeryereyr', 'kaushyedu66@gmail.com', '5475475754', NULL, 12, 'hdfhdfhdfh', 'ANDAMAN and NICOBAR', 'India', 'public/uploads/user/r/k/1673004274_db6631fcc857172f22ff.png', 1, 1, 4444.00, '2022-12-27 15:50:00', NULL, NULL, 'Active'),
(8, '43a21875d0e40b6ea5dad2694938c321', 3, 'dsdfsd', 'fsdfsdf', 'dffsdf', 'dfsdsfs@gggg.ccc', '8675745645', NULL, 11, NULL, 'RAJASTHAN', 'India', 'public/uploads/user/3/z/1672998920_562c067e8bfb63d226c9.png', 1, 1, 0.00, '2023-01-06 15:25:19', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_identities`
--

CREATE TABLE `user_identities` (
  `user_id` int(10) NOT NULL DEFAULT 1,
  `identity_id` int(10) NOT NULL DEFAULT 1,
  `identity_value` varchar(50) DEFAULT NULL,
  `identity_doc` int(10) DEFAULT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_identities`
--

INSERT INTO `user_identities` (`user_id`, `identity_id`, `identity_value`, `identity_doc`, `modified_date`) VALUES
(5, 3, '56456363463', NULL, '0000-00-00 00:00:00'),
(6, 4, '686707900', NULL, '2022-12-24 00:38:20'),
(6, 4, '686707900', NULL, '2022-12-24 00:45:39'),
(6, 4, '686707900', NULL, '2022-12-24 00:46:13'),
(6, 4, '686707900', NULL, '2022-12-24 00:48:50'),
(6, 4, '686707900', NULL, '2022-12-24 00:49:18'),
(6, 4, '686707900', NULL, '2022-12-24 00:49:32'),
(6, 5, '686707900', NULL, '2022-12-24 00:49:57'),
(7, 1, '57466346363463634', NULL, '2022-12-27 15:50:00'),
(2, 1, '121312321', NULL, '2023-01-04 19:58:50'),
(2, 2, '3213131231', NULL, '2023-01-04 19:58:51'),
(5, 3, '56456363463', NULL, '2023-01-06 15:20:56'),
(5, 3, '56456363463', NULL, '2023-01-06 15:23:52'),
(8, 1, '424445555352', NULL, '2023-01-06 15:25:20'),
(5, 3, '56456363463', NULL, '2023-01-06 16:38:32'),
(5, 3, '56456363463', NULL, '2023-01-06 16:39:11'),
(6, 5, '686707900', NULL, '2023-01-06 16:40:18'),
(7, 1, '57466346363463634', NULL, '2023-01-06 16:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_incomesource`
--

CREATE TABLE `user_incomesource` (
  `user_id` int(10) NOT NULL DEFAULT 0,
  `incomesource_id` int(10) NOT NULL DEFAULT 0,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_incomesource`
--

INSERT INTO `user_incomesource` (`user_id`, `incomesource_id`, `modified_date`) VALUES
(2, 1, '2023-01-04 14:21:09'),
(2, 5, '2023-01-04 14:21:09'),
(5, 1, '2023-01-05 08:21:52'),
(5, 2, '2023-01-05 08:21:52'),
(5, 5, '2023-01-05 08:21:52'),
(8, 2, '2023-01-06 09:55:20'),
(8, 6, '2023-01-06 09:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `login_id` int(10) NOT NULL,
  `login_user_id` int(10) NOT NULL DEFAULT 0,
  `login_browser` varchar(500) DEFAULT NULL,
  `login_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `login_token` varchar(250) DEFAULT NULL,
  `login_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_metrics`
--

CREATE TABLE `user_metrics` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `metrics_id` int(10) NOT NULL DEFAULT 0,
  `passing_year` date DEFAULT NULL,
  `obtained_marks` double(10,2) NOT NULL DEFAULT 0.00,
  `total_marks` double(10,2) NOT NULL DEFAULT 0.00,
  `document_id` int(10) NOT NULL DEFAULT 0,
  `is_verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `type_access` varchar(500) DEFAULT NULL,
  `type_status` tinyint(1) NOT NULL DEFAULT 0,
  `type_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type_name`, `type_access`, `type_status`, `type_created_date`) VALUES
(1, 'Admin', '0', 1, '2022-11-11 15:20:22'),
(2, 'Donner', '1', 1, '2022-11-11 15:20:22'),
(3, 'Customer', '0', 1, '2022-11-11 15:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT 0,
  `type` enum('Mail','Mobile') DEFAULT NULL,
  `token` varchar(256) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `validation_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `type`, `token`, `created_date`, `validation_date`, `status`) VALUES
(1, 1, 'Mail', '5dbfee50919db391d8146086ba00ff86', '0000-00-00 00:00:00', NULL, 0),
(2, 2, 'Mail', 'b3fb52e80d10d48dc2cc972e978c96a9', '2022-12-09 18:57:36', NULL, 0),
(3, 3, 'Mail', 'cafe5b7d656175d151685791d462b55f', '2022-12-09 19:20:19', NULL, 1),
(4, 4, 'Mail', '79a85dc5687fc52d8d71ca0cb6fb9be3', '2022-12-09 19:20:50', NULL, 1),
(5, 5, 'Mail', '4d1eabbd15169570cc3eff51e73de12f', '2023-01-09 13:08:41', NULL, 1),
(6, 5, 'Mail', 'f45ac84c83c376ba94604df5506d0254', '2023-01-09 13:10:04', NULL, 1),
(7, 5, 'Mail', '8f1a353f6aca25f8f0a3c06a1dd55395', '2023-01-09 13:12:26', NULL, 1),
(8, 5, 'Mail', '7881db9ebfd103c1aefbdfd3fb034ee3', '2023-01-09 13:12:32', NULL, 0),
(9, 5, 'Mail', '617e1b1ead54a2e0b26d837146fd47ac', '2023-01-09 13:22:53', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documnet_id`);

--
-- Indexes for table `donner_profile`
--
ALTER TABLE `donner_profile`
  ADD UNIQUE KEY `donner_user_id` (`donner_user_id`);

--
-- Indexes for table `identities`
--
ALTER TABLE `identities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomesource`
--
ALTER TABLE `incomesource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrcodes`
--
ALTER TABLE `qrcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar_applied`
--
ALTER TABLE `scholar_applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD UNIQUE KEY `student_user_id` (`student_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_metrics`
--
ALTER TABLE `user_metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documnet_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identities`
--
ALTER TABLE `identities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incomesource`
--
ALTER TABLE `incomesource`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qrcodes`
--
ALTER TABLE `qrcodes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scholar`
--
ALTER TABLE `scholar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholar_applied`
--
ALTER TABLE `scholar_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_metrics`
--
ALTER TABLE `user_metrics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
