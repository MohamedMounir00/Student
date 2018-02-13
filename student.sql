-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 09:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `academic_id` int(10) UNSIGNED NOT NULL,
  `academic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`academic_id`, `academic`, `description`) VALUES
(1, '2000', NULL),
(2, '2017-2018', NULL),
(3, '2019-2020', NULL),
(4, '2020-2021', NULL),
(5, '2020-2021', NULL),
(6, '2017-2020', NULL),
(7, '2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batche_id` int(10) UNSIGNED NOT NULL,
  `batche` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batche_id`, `batche`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classe_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `shift_id` int(10) UNSIGNED NOT NULL,
  `time_id` int(10) UNSIGNED NOT NULL,
  `batche_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classe_id`, `academic_id`, `level_id`, `shift_id`, `time_id`, `batche_id`, `group_id`, `start_date`, `end_date`, `active`) VALUES
(1, 6, 2, 1, 3, 1, 1, '2018-01-31', '2018-02-28', 1),
(2, 6, 18, 1, 3, 1, 1, '2018-01-31', '2018-02-28', 1),
(3, 6, 3, 2, 2, 1, 1, '2018-01-03', '2018-01-16', 1),
(4, 6, 10, 2, 3, 1, 1, '2018-01-30', '2018-01-02', 1),
(5, 6, 10, 1, 3, 1, 1, '2018-01-04', '2018-01-02', 1),
(6, 6, 19, 1, 1, 1, 1, '2018-02-28', '2018-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `fee_type_id` int(10) UNSIGNED NOT NULL,
  `fee_heading` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `academic_id`, `level_id`, `fee_type_id`, `fee_heading`, `amount`) VALUES
(1, 6, 10, 1, 'fees', 200),
(2, 6, 3, 1, 'Fees', 500),
(3, 6, 19, 1, 'Fees', 500),
(4, 6, 10, 1, 'Fees', 500);

-- --------------------------------------------------------

--
-- Table structure for table `feetypes`
--

CREATE TABLE `feetypes` (
  `fee_type_id` int(10) UNSIGNED NOT NULL,
  `fee_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feetypes`
--

INSERT INTO `feetypes` (`fee_type_id`, `fee_type`) VALUES
(1, 'school fee');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(10) UNSIGNED NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level`, `description`, `program_id`) VALUES
(1, 'test', 'testttttt', 1),
(2, 'level1', 'level1 for php', 1),
(3, 'level111', 'level111for html', 2),
(4, 'level444', 'level444for html', 2),
(5, 'mmmmmmm', 'nnnnnnnnnnnn', 2),
(6, 'sara', 'sara', 3),
(7, 'lena', 'lenaaaa', 3),
(8, 'mohamed', 'mmmmmmmm', 3),
(9, 'sssss', 'ssssssssssssss', 3),
(10, 'wors', 'wwwwwwwwwwwww', 1),
(11, 'mmmmm,,,,,,', ';;;;;;;;;;;;;;;;;;;;;;;', 1),
(12, 'misr', 'mohgfhjvbj', 1),
(13, 'mmmmmmmmmmmmmmmmm', 'mmmmmmmmmm', 2),
(14, 'nnnnnnnnnn', 'nnnnnnnnnnn', 2),
(15, 'semsma', 'fvfrrr', 3),
(16, 'aaaaaaaaaa', 'aaaaaaaaaaa', 1),
(17, 'xxxxxxxxxxxxxxxx', 'xxxxxxxxxxx', 2),
(18, 'php laravel', 'php laravel', 1),
(19, '1', 'word level1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_15_110157_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2018_01_15_110425_create_students_table', 2),
(4, '2018_01_15_110523_create_academics_table', 2),
(5, '2018_01_15_110600_create_programs_table', 2),
(6, '2018_01_15_110650_create_levels_table', 2),
(7, '2018_01_15_110722_create_shifts_table', 2),
(8, '2018_01_15_110748_create_times_table', 2),
(9, '2018_01_15_111030_create_batches_table', 2),
(10, '2018_01_15_111059_create_groups_table', 2),
(11, '2018_01_15_115758_create_classes_table', 2),
(12, '2018_01_15_115836_create_statues_table', 2),
(13, '2018_01_15_120124_create_feetypes_table', 2),
(14, '2018_01_15_120155_create_fees_table', 2),
(15, '2018_01_15_120227_create_studentfees_table', 2),
(16, '2018_01_15_120259_create_transactions_table', 2),
(17, '2018_01_15_120412_create_receipts_table', 2),
(18, '2018_01_15_120437_create_receiptdetails_table', 2),
(19, '2014_10_12_100000_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program`, `description`) VALUES
(1, 'php', 'php oop mvc  laravel ajax'),
(2, 'html', 'my courses html'),
(3, 'vvvv', 'vvvvv'),
(4, 'word', 'word');

-- --------------------------------------------------------

--
-- Table structure for table `receiptdetails`
--

CREATE TABLE `receiptdetails` (
  `receiptdetail_id` int(10) UNSIGNED NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `transact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receiptdetails`
--

INSERT INTO `receiptdetails` (`receiptdetail_id`, `receipt_id`, `student_id`, `transact_id`) VALUES
(1, 1, 11, 2),
(2, 2, 12, 3),
(3, 3, 13, 4),
(4, 4, 15, 5),
(5, 5, 15, 6),
(6, 6, 16, 7),
(7, 7, 16, 8),
(8, 8, 16, 9),
(9, 9, 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receipt_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Receptionist', NULL, NULL),
(3, 'Manger', NULL, NULL),
(4, 'CEO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `shift_id` int(10) UNSIGNED NOT NULL,
  `shift` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`shift_id`, `shift`, `description`) VALUES
(1, 'moring', NULL),
(2, 'night', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statues`
--

CREATE TABLE `statues` (
  `statue_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statues`
--

INSERT INTO `statues` (`statue_id`, `student_id`, `classe_id`) VALUES
(2, 5, 5),
(3, 6, 4),
(4, 7, 5),
(5, 8, 3),
(6, 9, 4),
(7, 10, 5),
(8, 11, 5),
(9, 12, 5),
(10, 13, 3),
(11, 15, 4),
(12, 16, 6),
(13, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `s_fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentfees`
--

INSERT INTO `studentfees` (`s_fee_id`, `student_id`, `level_id`, `fee_id`, `amount`, `discount`) VALUES
(8, 11, 10, 1, 100.00, 50),
(9, 12, 10, 1, 200.00, 0),
(10, 13, 3, 2, 500.00, 0),
(11, 15, 10, 1, 100.00, 50),
(12, 16, 19, 3, 500.00, 0),
(13, 16, 19, 3, 500.00, 0),
(14, 17, 10, 4, 500.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationnal_card` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateregistred` date NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rac` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `sex`, `dob`, `email`, `status`, `nationality`, `nationnal_card`, `passport`, `phone`, `village`, `commune`, `district`, `province`, `current_address`, `dateregistred`, `photo`, `user_id`, `rac`) VALUES
(4, 'test', 'mounir', 0, '2018-01-03', 'mohamedmounir703@gmail.com', 0, 'egypt', '88888', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-01-31', '', 1, 'test'),
(5, 'test', 'mounir', 0, '2018-01-31', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-01-31', '', 1, 'test'),
(6, 'test', 'mounir', 0, '2018-01-10', 'mohamedmounir703@gmail.com', 1, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-01-31', '', 1, 'test'),
(7, 'test', 'mounir', 0, '2018-01-26', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', 'test', '096543', NULL, NULL, NULL, NULL, NULL, '2018-01-31', '58287.2018-01-31.1517421926.jpg', 1, 'test'),
(8, 'test', 'test', 0, '2018-02-21', 'admin@gmail.com', 0, 'egypt', '88888', '212334', '999999999999', NULL, NULL, NULL, NULL, NULL, '2018-02-01', '78300.2018-02-01.1517509203.jpg', 1, 'test'),
(9, 'mohamed', 'mounir', 0, '2018-01-23', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '999999999999', NULL, NULL, NULL, NULL, NULL, '2018-02-03', '57332.2018-02-03.1517666515.jpg', 1, 'test'),
(10, 'mohamed2', 'mounir2', 0, '2018-01-15', 'mohamedmounir703@gmail.com', 0, 'test', '88888', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-03', '48400.2018-02-03.1517668221.jpg', 1, 'test'),
(11, 'mohamedn', 'nnnnn', 0, '2018-01-23', 'admin@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-03', '16413.2018-02-03.1517668474.jpg', 1, 'test'),
(12, 'محمد', 'منير', 0, '2018-01-15', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-04', '54492.2018-02-04.1517736781.jpg', 1, 'test'),
(13, 'احمد', 'منير', 0, '2018-01-23', 'mohamedmounir703@gmail.com', 0, 'egypt', '88888', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-04', '', 1, 'test'),
(14, 'محمود', 'احمد', 0, '2008-02-07', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-06', '', 1, 'test'),
(15, 'محمود', 'احمد', 0, '2008-02-07', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-06', '', 1, 'test'),
(16, 'ساره', 'السيد', 1, '1994-04-02', 'mohamedmounir703@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-07', '', 1, 'test'),
(17, 'ابرهيم', 'احمد', 0, '2018-01-15', 'admin@gmail.com', 0, 'egypt', '00202', '212334', '096543', NULL, NULL, NULL, NULL, NULL, '2018-02-10', '', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `time_id` int(10) UNSIGNED NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`time_id`, `time`) VALUES
(1, '10:30 AM- :2:30 PM'),
(2, '9:30 AM- :1:30 PM'),
(3, '8:30 AM- :12:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transact_id` int(10) UNSIGNED NOT NULL,
  `transact_date` datetime NOT NULL,
  `remark` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` double(8,2) NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `s_fee_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transact_id`, `transact_date`, `remark`, `description`, `paid`, `fee_id`, `student_id`, `user_id`, `s_fee_id`) VALUES
(2, '2018-02-03 18:00:06', 'USD', 'complete', 100.00, 1, 11, 1, 8),
(3, '2018-02-04 09:33:03', 'USD', 'complte', 200.00, 1, 12, 1, 9),
(4, '2018-02-04 13:18:44', 'USD', 'complte', 500.00, 2, 13, 1, 10),
(5, '2018-02-06 18:38:50', 'USD', 'غير كامل', 50.00, 1, 15, 1, 11),
(6, '2018-02-06 19:36:15', NULL, NULL, 50.00, 1, 15, 1, 11),
(8, '2018-02-07 12:14:25', 'USD', 'كامل', 200.00, 3, 16, 1, 12),
(9, '2018-02-08 13:18:27', 'USD', 'باقى 300', 200.00, 3, 16, 1, 13),
(10, '2018-02-10 14:14:07', NULL, NULL, 500.00, 4, 17, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'mohamed', 'mohamed', 'mohamedmounir703@gmail.com', '$2y$10$.ThPLeze8BvwUdZMi3fI5ek7SkaaFXTew0DK8x4z2SEVmpBpIwmXi', 'o06SvCpakRoBxJ8hMLjaV7VP3qeGXTu5TTzXClsEstfgbK1aUSG8qKz8Vn6p', 1, NULL, NULL),
(2, 2, 'user', 'user', 'user@gmail.com', '$2y$10$SPzthe1TECUF46wzIeHgPOcDxN/dl/YESD8sGXLR992Gjo9lps2QG', 'yZvKVCUh7oDUFB9ahVourXOUID6AghfjCGsyPyZjhmE7e0k2ViyQBLrixq6t', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batche_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classe_id`),
  ADD KEY `classes_academic_id_foreign` (`academic_id`),
  ADD KEY `classes_level_id_foreign` (`level_id`),
  ADD KEY `classes_shift_id_foreign` (`shift_id`),
  ADD KEY `classes_time_id_foreign` (`time_id`),
  ADD KEY `classes_batche_id_foreign` (`batche_id`),
  ADD KEY `classes_group_id_foreign` (`group_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `fees_academic_id_foreign` (`academic_id`),
  ADD KEY `fees_level_id_foreign` (`level_id`),
  ADD KEY `fees_fee_type_id_foreign` (`fee_type_id`);

--
-- Indexes for table `feetypes`
--
ALTER TABLE `feetypes`
  ADD PRIMARY KEY (`fee_type_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `levels_program_id_foreign` (`program_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `receiptdetails`
--
ALTER TABLE `receiptdetails`
  ADD PRIMARY KEY (`receiptdetail_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `statues`
--
ALTER TABLE `statues`
  ADD PRIMARY KEY (`statue_id`),
  ADD KEY `statues_student_id_foreign` (`student_id`),
  ADD KEY `statues_classe_id_foreign` (`classe_id`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`s_fee_id`),
  ADD KEY `studentfees_student_id_foreign` (`student_id`),
  ADD KEY `studentfees_level_id_foreign` (`level_id`),
  ADD KEY `studentfees_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `transactions_fee_id_foreign` (`fee_id`),
  ADD KEY `transactions_student_id_foreign` (`student_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_s_fee_id_foreign` (`s_fee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `academic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batche_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feetypes`
--
ALTER TABLE `feetypes`
  MODIFY `fee_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receiptdetails`
--
ALTER TABLE `receiptdetails`
  MODIFY `receiptdetail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `shift_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statues`
--
ALTER TABLE `statues`
  MODIFY `statue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `s_fee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `time_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `classes_batche_id_foreign` FOREIGN KEY (`batche_id`) REFERENCES `batches` (`batche_id`),
  ADD CONSTRAINT `classes_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `classes_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `classes_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`shift_id`),
  ADD CONSTRAINT `classes_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `times` (`time_id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`academic_id`),
  ADD CONSTRAINT `fees_fee_type_id_foreign` FOREIGN KEY (`fee_type_id`) REFERENCES `feetypes` (`fee_type_id`),
  ADD CONSTRAINT `fees_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`);

--
-- Constraints for table `statues`
--
ALTER TABLE `statues`
  ADD CONSTRAINT `statues_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`classe_id`),
  ADD CONSTRAINT `statues_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD CONSTRAINT `studentfees_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `studentfees_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `studentfees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`fee_id`),
  ADD CONSTRAINT `transactions_s_fee_id_foreign` FOREIGN KEY (`s_fee_id`) REFERENCES `studentfees` (`s_fee_id`),
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
