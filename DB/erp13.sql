-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 05:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpone`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `pass_year` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `exam`, `employee_id`, `institut`, `group`, `board`, `grade`, `pass_year`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'JSC', 1, 'West Dhanmondi yousuf high scholl', 'Commerce', 'dhaka', 5, 2020, 1, 'acd-hvhgqtd1-ifjuizc6', '2020-09-20 11:22:27', '2020-09-30 12:49:27'),
(3, 'SSC', 1, 'creative shaper', 'Commerce', 'dhaka', 5, 2020, 1, 'acd-ssllnasv-2q59l9os', '2020-09-20 11:30:28', '2020-09-20 11:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `account_classes`
--

CREATE TABLE `account_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Assets','Liabilities','Income','Expense') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_classes`
--

INSERT INTO `account_classes` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Asset', 'Assets', '2020-11-07 05:35:11', '2020-11-07 05:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `account_groups`
--

CREATE TABLE `account_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `class_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance` double(8,2) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `employee_id`, `slug`, `advance`, `date`, `reason`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'advance-lilfzi4q-ixbxfxiv', 234222.00, '2020-10-03', 'dfgdfgdfgdg', '09', '2020', 1, '2020-10-03 08:48:04', '2020-10-03 09:00:36'),
(7, 1, 'advance-kdxjdg12-rtreukaf', 32344.00, '2020-10-30', 'dfgdfgdfgdg kfdslk fdlfdl', '05', '2030', 1, '2020-10-03 09:01:39', '2020-10-03 09:01:39'),
(10, 1, 'advance-zb48qkwb-c9oiewuw', 4656.00, '2020-10-10', NULL, '05', '2020', 1, '2020-10-10 10:38:23', '2020-10-10 10:38:23'),
(11, 2, 'advance-azvcmqn9-l0t38gzv', 3423.00, '1921-04-14', NULL, '10', '2024', 1, '2020-11-21 06:37:44', '2020-11-21 06:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `ad_details`
--

CREATE TABLE `ad_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_details`
--

INSERT INTO `ad_details` (`id`, `title`, `slug`, `description`, `cost`, `remarks`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Desert Riding Turning So much Flowery BD', 'ads_n8bffh2s-yge9l1ym', 'jfkskdlfs vlsk slkvls lskvlsksdasdasdasdasdasdasda', '3240', 'jfkskdlfs vlsk slkvls lskvlsks', 'uploads/ads/Ads_jhDfsJGI.jpg,uploads/ads/Ads_Dt1MfoTy.jpg,uploads/ads/Ads_gtXLIdfS.png', 1, '2020-10-05 10:59:16', '2020-10-05 11:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar BD', 'farukhaidar3@gmail.com', '2097370298', '663 Durant, 1', 1, '2020-11-14 12:21:28', '2020-11-14 12:34:27'),
(3, 'testbd', 'test@gmail.com', '2097370298', 'dhanmondi 32', 1, '2020-11-14 13:12:12', '2020-11-14 13:12:24'),
(4, 'test', 'test@gmail.com', '93485034958', NULL, 1, '2020-11-30 05:55:04', '2020-11-30 05:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_gl_id` bigint(20) NOT NULL,
  `charge_gl_id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0=Savings Account, 1=Current Account, 2=Credit Account, 3=Cash Account',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `departments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi', 'HR', 1, NULL, NULL),
(2, 'Mohammodpur', 'Marketing', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `call_lists`
--

CREATE TABLE `call_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_lists`
--

INSERT INTO `call_lists` (`id`, `name`, `number`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar BD', '34534534534534', 'fasfasfasfasfasfasfasf\r\n                    gdfgdfgdfg', 1, '2020-11-06 10:15:03', '2020-11-06 10:15:40'),
(2, 'Faruk Haidar', '34534534534534', 'fffffffffffffffffffff', 1, '2020-11-06 10:15:57', '2020-11-06 10:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Faruk Haidar', 'farukhaidar3@gmail.com', '2097370298', 1, '2020-10-04 08:20:21', '2020-10-04 08:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `client_satisfaction_questions`
--

CREATE TABLE `client_satisfaction_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `publish` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_satisfaction_questions`
--

INSERT INTO `client_satisfaction_questions` (`id`, `question`, `slug`, `status`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'What Is your Name?', 'question-hpuhxm4g-5m3yolba', 1, 1, '2020-10-04 04:55:57', '2020-10-04 05:34:50'),
(3, 'where are you live in?', 'question-5axzxj3q-rbv0ehxw', 1, 1, '2020-10-04 07:25:05', '2020-10-04 07:25:05'),
(4, 'How old are you?', 'question-v5yokhbu-dgs9ycox', 1, 0, '2020-10-04 07:25:27', '2020-10-04 08:44:10'),
(5, 'what is your favorite color?', 'question-dpkrz22e-vphgnxjl', 1, 1, '2020-10-04 07:26:46', '2020-10-04 07:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `client_satisfaction_responses`
--

CREATE TABLE `client_satisfaction_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_details_id` int(11) DEFAULT NULL,
  `question_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_satisfaction_responses`
--

INSERT INTO `client_satisfaction_responses` (`id`, `client_details_id`, `question_id`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, '1', 'Faruk Haidar', 1, '2020-10-04 08:20:22', '2020-10-04 08:20:22'),
(6, 4, '3', 'dasdas', 1, '2020-10-04 08:20:22', '2020-10-04 08:20:22'),
(7, 4, '4', 'dasdas', 1, '2020-10-04 08:20:23', '2020-10-04 08:20:23'),
(8, 4, '5', 'dasdas', 1, '2020-10-04 08:20:23', '2020-10-04 08:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `company_resolutions`
--

CREATE TABLE `company_resolutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_resolutions`
--

INSERT INTO `company_resolutions` (`id`, `title`, `pdf_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Desert Riding Turning So much Flowery', 'uploads/resolution/resolution_V7IFTsF6.pdf', 0, '2020-10-31 08:52:36', '2020-10-31 09:31:39'),
(2, 'The information of Taxa csadad', 'uploads/resolution/resolution_ngX4pPTM.pdf', 1, '2020-10-31 09:22:18', '2020-10-31 09:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `name`, `email`, `slug`, `subject`, `details`, `c_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar', 'farukhaidar3@gmail.com', NULL, 'dfdsfsdfsdf', 'klsdkfjsld cksdjsld lskvldkvlsldsdlv;sdl;vsl;vls', 'Pending', '1', '2020-10-04 12:54:16', '2020-10-05 05:25:59'),
(2, 'Faruk Haidar', 'farukhaidar3@gmail.com', 'complain-fozy75il-ioh1ckn8', 'I am excited for meet you', 'jfakslf sfjsfas aksjaksda dajdalkda scasjacja scjasjc acnkskdkdas djasdj jasd jsdasdhasjdh', 'Pending', '1', '2020-10-05 04:34:11', '2020-10-05 05:26:03'),
(3, 'Faruk Haidar', 'farukhaidar3@gmail.com', 'complain-eocacbs9-vpqoqf9n', 'hfdjshfjs dhsfsjhj', 'sdjfshidjfsd vsdjhksd isdufsd sdjsbdc sjdfskdn', 'Solve', '1', '2020-10-05 04:35:05', '2020-10-05 05:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_generates`
--

CREATE TABLE `counsellor_generates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counsellor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counsellor_generates`
--

INSERT INTO `counsellor_generates` (`id`, `counsellor_id`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', NULL, '1', '2020-11-16 06:21:19', '2020-11-16 06:21:19'),
(3, '3', '1', '1', '2020-11-16 06:30:13', '2020-11-16 06:30:13'),
(4, '7', NULL, '1', '2020-11-16 06:30:37', '2020-11-16 06:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `reg_fees` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `flag`, `slug`, `status`, `reg_fees`, `created_at`, `updated_at`) VALUES
(1, 'U.S.A', 'country_1_1593599647.jpg', 'usa', '1', 4234, '2020-07-01 10:34:07', '2020-07-01 10:34:07'),
(2, 'U.K', 'country_2_1593599687.jpg', 'uk', '1', 524523, '2020-07-01 10:34:47', '2020-07-04 12:36:34'),
(3, 'Bangladesh', 'country_3_1593599687', 'bangladesh', '1', 2222, '2020-07-01 11:10:13', '2020-11-24 07:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `slug`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hr', 'HR', 1, NULL, NULL),
(2, 'marketing', 'Marketing', 0, NULL, '2020-10-04 04:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_details`
--

CREATE TABLE `deposit_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deposit_id` bigint(20) NOT NULL,
  `gl_id` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Agent', 'agent', 1, '2020-10-24 10:36:41', NULL),
(2, 'Counsellor', 'counsellor', 1, '2020-10-24 10:36:49', NULL),
(3, 'Receptionist', 'receptionist', 1, '2020-10-24 10:36:58', NULL),
(4, 'Web Deceloper', 'desg-rmk5ftrg-cle919nk', 1, '2020-10-24 10:37:08', '2020-09-30 07:01:57'),
(5, 'Head of branch', 'desg-g3xmoxum-o2r2j80d', 1, '2020-10-24 10:37:18', '2020-09-16 19:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `joining_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maturity_age` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eligible_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_scale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `slug`, `id_no`, `name`, `shift_id`, `designation_id`, `joining_date`, `maturity_age`, `eligible_status`, `father_name`, `mother_name`, `religion`, `dob`, `nationality`, `blood_group`, `marital_status`, `gender`, `present_address`, `permanent_address`, `salary_scale`, `account_no`, `branch`, `department`, `image`, `email`, `phone`, `whatsapp`, `commission_type`, `commission`, `emp_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kasjdhsjf', '546556876', 'Faruk', 2, 4, '1970-01-01', '1970-01-01', 'Yes', 'towhid mia', 'ojifa begum', 'Islam', '12/12/1996', 'Islam', 'A(-ve)', 'Divorced', 'Male', '27skfjkshfsdf', 'fsdfsd dfdb d', '1', '432425523', '2', '1', 'uploads/employee/Employee_1600602872.jpg', 'farukhaidar3@gmail.com', '2097370298', 'dasfasfadfsdfdfgdfgffghg', NULL, NULL, 2, 0, NULL, '2020-11-16 09:17:13'),
(2, 'emp-mdt2uehg-fnpqczan', '745937555', 'Faruk Haidar Bd', 2, 3, '1970-01-01', '1970-01-01', 'No', 'Towhid Mia BD', 'Khairun Nesa', 'Islam', '01/13/1993', 'Bangladesh', 'A(+ve)', 'Single', 'Male', '#80,jafrabad, sara bangla road, dhaka 1207', '26/1 West Jafrabad, Mohammodpur', '1', '2147483647', '1', '1', 'uploads/employee/Employee_1601374488.jpg', 'farukhaidarbd@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-09-19 05:31:30', '2020-09-29 10:14:52'),
(3, 'emp-kbpt8mit-ypbefuev', '745937533', 'Faruk Haidar', 2, 2, '2020-10-13', '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/17/1992', 'Bangladesh', 'B(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', '1', '6456346246345', '1', '2', 'uploads/employee/Employee_1601374517.jpg', 'farukhaidards@gmail.com', NULL, NULL, 'fixed', '2000', 3, 1, '2020-09-19 05:34:12', '2020-11-25 10:35:38'),
(4, 'emp-ybh33rkl-hvtrrzms', '745937534', 'Faruk Haidar BD', 3, 4, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '12/30/1992', 'Bangladesh', 'A(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 dhanmondi dhaka 1209', '1', '56456456454353', '2', '2', 'uploads/employee/Employee_1600493763.jpg', 'farukhaidara@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-09-19 05:36:03', '2020-09-20 05:23:46'),
(5, 'emp-axrh0omo-svmwz9gj', '7459375dsd', 'Faruk Haidar', 3, 1, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/02/2020', 'Bangladesh', 'A(-ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', '1', NULL, '2', '1', 'uploads/employee/Employee_1600603067.jpg', 'farukhaidard3@gmail.com', NULL, NULL, 'fixed', '2000', 1, 1, '2020-09-20 11:56:01', '2020-10-27 08:25:43'),
(6, 'emp-7pd713at-pqfmsv1z', '7459375', 'Faruk Haidar BD', 2, 1, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/09/2020', 'Bangladesh', 'B(-ve)', 'Married', 'Male', 'fsdv vfbd dbgnfn', 'dgdfb  fgb  f', '1', NULL, '1', '1', 'uploads/employee/Employee_1601448071.jpg', 'farukhaidar63@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-09-30 06:41:11', '2020-09-30 06:41:12'),
(7, 'emp-rbggr4lg-vsgftgku', '74593750k', 'Faruk Haidar', 2, 5, NULL, '1970-01-01', 'No', 'Nasir Uddin', 'Ojefa Akter', 'Islam', '01/07/1993', 'Bangladesh', 'A(-ve)', 'Married', 'Male', 'kkkkkk ijhk khkj k', 'jkgk jhgmhmhm', '1', NULL, '2', '2', 'uploads/employee/Employee_1601448484.jpg', 'farukhaidar37@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-09-30 06:48:04', '2020-09-30 06:48:04'),
(8, 'emp-vlju3jee-klis0w1g', '5465568764pl', 'Faruk Haidar BD', 3, 5, NULL, '2020-09-11', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/10/2020', 'Bangladesh', 'B(+ve)', 'Divorced', 'Male', 'dsvsdfgsd', 'v sdvsdv sdfvdf', '1', NULL, '2', '2', NULL, 'farukhaidar43@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-09-30 06:50:13', '2020-09-30 06:50:13'),
(9, 'emp-zyy2tirg-fcecw2yt', '7459375dd', 'zaahira Akter', 2, 1, '2020-10-13', '2020-11-07', 'No', 'Nasir Uddin', 'Khairun Nesa', 'Islam', '08/20/1994', 'Bangladesh', 'AB(+ve)', 'Single', 'Female', 'fdsfsd', 'fsdfsdfsfsfsf', '1', NULL, '1', '1', 'uploads/employee/Employee_1602566868.png', 'uzzalbd.creative@gmail.com', NULL, NULL, NULL, NULL, 2, 1, '2020-10-13 05:27:48', '2020-12-02 06:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendanc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `branch_id`, `date`, `in_time`, `out_time`, `attendanc`, `leave`, `type`, `status`, `created_at`, `updated_at`) VALUES
(18, 1, 2, '2020-01-10', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 09:09:30', '2020-10-01 11:36:04'),
(19, 4, 2, '2020-01-10', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-10-01 09:09:31', '2020-10-01 11:35:20'),
(20, 1, 2, '2020-01-11', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 09:13:25', '2020-10-01 10:14:22'),
(21, 4, 2, '2020-01-11', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 09:13:25', '2020-10-01 10:14:25'),
(22, 1, 2, '2020-01-12', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-01 09:15:00', '2020-10-01 09:15:00'),
(23, 1, 2, '2020-01-13', '6:00 PM', '6:30 AM', 'Present', NULL, NULL, 1, '2020-10-01 09:17:15', '2020-10-01 09:17:15'),
(24, 4, 2, '2020-01-13', '8:45 AM', '5:45 AM', 'Present', NULL, NULL, 1, '2020-10-01 09:17:15', '2020-10-01 09:17:15'),
(25, 1, 2, '2020-01-17', '8:00 PM', '7:00 AM', 'Present', NULL, NULL, 1, '2020-10-01 09:43:47', '2020-10-01 09:43:47'),
(26, 4, 2, '2020-01-17', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-01 09:43:47', '2020-10-01 09:43:47'),
(27, 1, 2, '2020-01-31', '8:00 PM', '7:00 AM', 'Present', NULL, NULL, 1, '2020-10-01 09:45:19', '2020-10-01 09:45:19'),
(28, 4, 2, '2020-01-31', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-01 09:45:20', '2020-10-01 09:45:20'),
(29, 1, 2, '2020-02-01', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 10:29:48', '2020-10-01 10:29:58'),
(30, 4, 2, '2020-02-01', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 10:29:48', '2020-10-01 10:30:05'),
(31, 1, 2, '2020-01-30', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 10:30:28', '2020-10-01 10:41:37'),
(32, 4, 2, '2020-01-30', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-10-01 10:30:28', '2020-10-01 10:41:26'),
(33, 1, 2, '2020-01-25', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 10:42:17', '2020-10-01 10:42:23'),
(34, 4, 2, '2020-01-25', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-01 10:42:17', '2020-10-01 10:42:17'),
(35, 1, 2, '2020-01-15', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 10:45:48', '2020-10-01 10:49:57'),
(36, 4, 2, '2020-01-15', '13:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-10-01 10:45:48', '2020-10-01 10:49:43'),
(37, 1, 2, '2020-01-28', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 11:09:48', '2020-10-01 11:09:58'),
(38, 4, 2, '2020-01-28', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-01 11:09:48', '2020-10-01 11:09:48'),
(39, 1, 2, '2020-02-07', '8:00 PM', '7:00 AM', 'Present', NULL, NULL, 1, '2020-10-01 11:36:18', '2020-10-01 11:36:18'),
(40, 4, 2, '2020-02-07', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 11:36:20', '2020-10-01 11:36:32'),
(41, 1, 2, '2020-06-10', '1:01:15', '14:01:15', 'Absent', NULL, NULL, 1, '2020-10-06 12:20:36', '2020-10-06 12:21:28'),
(42, 4, 2, '2020-06-10', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-10-06 12:20:36', '2020-10-06 12:21:29'),
(43, 1, 2, '2020-10-06', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-06 12:22:57', '2020-10-06 12:22:57'),
(44, 4, 2, '2020-10-06', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-06 12:22:58', '2020-10-06 12:22:58'),
(45, 1, 2, '2020-10-21', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 06:54:14', '2020-10-21 06:54:14'),
(46, 4, 2, '2020-10-21', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 06:54:14', '2020-10-21 06:54:14'),
(47, 2, 1, '2020-10-21', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 06:54:48', '2020-10-21 06:54:48'),
(48, 1, 2, '2020-10-22', '19:00:00', '6:00:00', 'Present', NULL, NULL, 1, '2020-10-21 08:50:01', '2020-10-21 09:06:15'),
(49, 4, 2, '2020-10-22', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-10-21 08:50:01', '2020-10-21 09:06:15'),
(50, 1, 2, '2020-10-24', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 09:01:50', '2020-10-21 09:01:50'),
(51, 4, 2, '2020-10-24', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:01:50', '2020-10-21 09:01:50'),
(52, 1, 2, '1970-01-01', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 09:05:56', '2020-10-21 09:05:56'),
(53, 4, 2, '1970-01-01', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:05:56', '2020-10-21 09:05:56'),
(54, 5, 2, '1970-01-01', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:05:56', '2020-10-21 09:05:56'),
(55, 7, 2, '1970-01-01', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 09:05:56', '2020-10-21 09:05:56'),
(56, 8, 2, '1970-01-01', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:05:56', '2020-10-21 09:05:56'),
(57, 5, 2, '2020-10-22', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:06:15', '2020-10-21 09:06:15'),
(58, 7, 2, '2020-10-22', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 09:06:15', '2020-10-21 09:06:15'),
(59, 8, 2, '2020-10-22', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:06:15', '2020-10-21 09:06:15'),
(60, 1, 2, '2020-10-26', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-21 09:45:36', '2020-10-21 09:45:41'),
(61, 4, 2, '2020-10-26', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:45:36', '2020-10-21 09:45:36'),
(62, 5, 2, '2020-10-26', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:45:36', '2020-10-21 09:45:36'),
(63, 7, 2, '2020-10-26', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-21 09:45:36', '2020-10-21 09:45:36'),
(64, 8, 2, '2020-10-26', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-21 09:45:36', '2020-10-21 09:45:36'),
(65, 1, 2, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:31', '2020-10-31 06:34:31'),
(66, 4, 2, '2020-10-29', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:31', '2020-10-31 06:34:31'),
(67, 5, 2, '2020-10-29', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:31', '2020-10-31 06:34:31'),
(68, 7, 2, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:31', '2020-10-31 06:34:31'),
(69, 8, 2, '2020-10-29', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:31', '2020-10-31 06:34:31'),
(70, 2, 1, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:51', '2020-10-31 06:34:51'),
(71, 3, 1, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:51', '2020-10-31 06:34:51'),
(72, 6, 1, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:51', '2020-10-31 06:34:51'),
(73, 9, 1, '2020-10-29', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-10-31 06:34:51', '2020-10-31 06:34:51'),
(74, 1, 2, '2020-10-10', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-11-05 04:50:09', '2020-11-05 04:50:09'),
(75, 4, 2, '2020-10-10', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-11-05 04:50:09', '2020-11-05 04:50:09'),
(76, 5, 2, '2020-10-10', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-11-05 04:50:09', '2020-11-05 04:50:41'),
(77, 7, 2, '2020-10-10', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-11-05 04:50:09', '2020-11-05 04:50:09'),
(78, 8, 2, '2020-10-10', '10:00 AM', '7:00 PM', 'Present', NULL, NULL, 1, '2020-11-05 04:50:09', '2020-11-05 04:50:09'),
(79, 1, 2, '2020-11-05', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-11-05 12:34:07', '2020-11-05 12:34:55'),
(80, 4, 2, '2020-11-05', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-05 12:34:07', '2020-11-05 12:34:46'),
(81, 5, 2, '2020-11-05', '0:00:00', '0:00:00', 'Absent', NULL, NULL, 1, '2020-11-05 12:34:08', '2020-11-05 12:34:47'),
(82, 7, 2, '2020-11-05', '19:00:00', '6:00:00', 'Present', NULL, NULL, 1, '2020-11-05 12:34:08', '2020-11-05 12:34:47'),
(83, 8, 2, '2020-11-05', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-05 12:34:08', '2020-11-05 12:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `leave_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_to` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_day` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `approved` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_id`, `reason`, `slug`, `date_from`, `date_to`, `total_day`, `status`, `approved`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'dfsdfksdhfsdjhvkdjgfkdj', 'emp-leave-cmeupg9e-s8xxx9ew', '05/04/2020', '07/11/2020', '68', '1', 'No', '2020-09-29 05:30:45', '2020-09-29 07:35:52'),
(2, 4, 1, 'daskljlasjvc askfjahsf asmcaksjhkasc ascasjhas caskl', 'emp-leave-o6raikrx-ftzfpyjt', '05/10/2020', '05/16/2020', '6', '1', 'No', '2020-09-29 05:38:24', '2020-09-29 07:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `emp_natures`
--

CREATE TABLE `emp_natures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_statuses`
--

CREATE TABLE `emp_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_statuses`
--

INSERT INTO `emp_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Active', 1, NULL, NULL),
(2, 'Resigned', 1, '2020-09-08 05:55:23', '2020-09-08 05:55:23'),
(3, 'Left', 1, '2020-09-08 05:55:32', '2020-09-08 05:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `event_management`
--

CREATE TABLE `event_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_management`
--

INSERT INTO `event_management` (`id`, `title`, `date_from`, `date_to`, `slug`, `description`, `cost`, `remarks`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'The information of Taxa csadad', '1905-05-02', '1905-04-21', 'event_90rjq1rb-5fws6agm', 'This is the home category', '3242', 'dasca advadvadsvasvasv ad ad', 'uploads/event/event_iOUKp7Lg.jpg,uploads/event/event_to1gkThO.jpg,uploads/event/event_ZnClE6kG.png', 0, '2020-10-05 09:08:15', '2020-10-06 07:26:25'),
(3, 'Desert Riding Turning So much Flowery', '2020-09-30', '1905-04-28', 'event_cxravtw7-lqyb58em', 'This is the home category', '3242', 'dasfagsgsfgdf dfbdf df df ddg d dg dg', 'uploads/event/event_pYzJn5zx.jpg,uploads/event/event_seFG51Xq.jpg,uploads/event/event_FOB5ykzq.png', 1, '2020-10-05 09:54:26', '2020-10-05 09:54:26'),
(4, 'Desert Riding Turning So much Flowery', '1905-04-17', '1905-04-29', 'event_yqvoxcmj-tbxpisf3', 'kjdfjksd dksjfskdfjskdfj', '3242', 'safsdfsdfsdfsdfsfsf', 'uploads/event/event_sfgjsWbM.jpg', 0, '2020-10-05 09:59:37', '2020-10-05 10:04:10'),
(5, 'The information of Taxa csadad', '2020-10-12', '1905-04-28', 'event_ennp7zfp-f6jadx2q', 'dasda', '3242', 'dasdasdasdasd', 'uploads/event/event_sUgiToiM.jpg,uploads/event/event_CyqpT1ym.jpg', 0, '2020-10-05 10:01:09', '2020-10-05 10:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `company_name`, `employee_id`, `designation`, `description`, `date_to`, `date_from`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pickshop', 1, 'Web Developer', 'dasdas ddsvsdfagsdg', '2020-05-29', '2020-05-25', '1', 'experience-vnlcwrph-fecjabcr', '2020-09-29 09:06:29', '2020-09-29 09:17:11'),
(2, 'Faruk Haidar BD', 1, 'Web Developer', 'cskjsdfsdkvlsd sdvksdls dosdjsd nsovsovpsdnvns vsod vsodpv skodpvoskpvo', '2020-05-30', '2020-05-10', '0', 'experience-xxxm4dzs-tijphqbq', '2020-09-29 09:24:57', '2020-09-29 09:25:04'),
(3, 'PickshopBDBD', 1, 'Web Developer', 'hjfjaks a kjaf jsadas sdjsd sdjcsdcsdjcskdjcsdjcsdclksc skcscjksjcksjck', '2020-06-22', '2020-06-30', '1', 'experience-r2juaoiy-5ilkzpxl', '2020-09-30 12:37:59', '2020-10-03 07:10:48'),
(5, 'Creative Shepar', 1, 'Web Developer', 'dafadgdfvdfvd', '2020-03-27', '2020-02-23', '0', 'experience-ger1jzcm-r8vy9v1l', '2020-10-03 06:52:13', '2020-10-05 10:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gl_accounts`
--

CREATE TABLE `gl_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gl_accounts`
--

INSERT INTO `gl_accounts` (`id`, `name`, `group_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar', 1, 1, NULL, NULL),
(2, 'Rakib Khan', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `reason`, `slug`, `date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'My mother was very that\'s why i leave for one day', 'holiday-0nqeodnv-ygbu8bct', '2020-04-13 ', 'My mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one day', '0', '2020-09-27 12:41:39', '2020-10-31 06:16:19'),
(2, 'ffffffffffffffffffffffsdvv fsdvsdfgdfgdf', 'holiday-0uqn5jxy-tjizoscd', '2020-04-13 ', 'afasfafafafafaf', '0', '2020-09-27 19:08:16', '2020-10-31 06:16:23'),
(3, 'dfgdfgdfgdg', 'holiday-w7li3cfi-mblefdvq', '2020-10-29', 'ggdfg', '0', '2020-09-27 19:25:17', '2020-10-31 06:16:29'),
(4, 'My mother was very that\'s why i leave for one day', 'holiday-p0paruls-6bo2bvpw', '1970-01-01', 'fasfasfasf', '0', '2020-10-31 06:16:07', '2020-10-31 06:16:33'),
(5, 'Mother Day', 'holiday-9ej1sdvo-czrttypb', '2020-10-28', 'fsdfsdfsdf', '1', '2020-10-31 06:17:15', '2020-10-31 06:17:15'),
(6, 'My mother was very that\'s why', 'holiday-hb6xtlkw-jiuwzt9w', '2020-10-27', 'dasdfdsfsdf', '1', '2020-10-31 06:17:38', '2020-10-31 06:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `installment_details`
--

CREATE TABLE `installment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `installment_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_details`
--

INSERT INTO `installment_details` (`id`, `loan_id`, `installment_amount`, `payment_date`, `received_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '87593', '2020-10-08', 'Faruk Haidar BD', 1, '2020-10-07 07:51:21', '2020-10-07 08:33:31'),
(2, 2, '23444', '2020-10-22', 'Faruk Haidar', 0, '2020-10-07 08:34:32', '2020-10-07 08:35:53'),
(3, 2, '3234', '2020-10-10', 'Faruk Haidar', 1, '2020-10-10 08:55:37', '2020-10-10 08:55:37'),
(4, 2, '875934343', '2020-10-10', 'Faruk Haidar', 0, '2020-10-10 09:04:21', '2020-10-10 09:04:29'),
(5, 2, '87593', '2020-10-10', 'Faruk Haidar', 0, '2020-10-10 09:21:32', '2020-10-10 09:25:05'),
(6, 2, '7823740', '2020-10-10', 'Faruk Haidar BD', 0, '2020-10-10 09:26:15', '2020-10-10 09:28:20'),
(7, 2, '7823740', '2020-10-10', 'Faruk Haidar BD', 0, '2020-10-10 09:28:45', '2020-10-10 09:30:44'),
(8, 2, '7823740', '2020-11-05', 'Faruk Haidar BD', 0, '2020-10-10 09:34:25', '2020-10-10 09:34:55'),
(9, 2, '7823740', '2020-10-10', 'Faruk Haidar BD', 1, '2020-10-10 09:36:00', '2020-10-10 09:36:00'),
(10, 2, '8', '2020-10-10', 'Faruk Haidar BD', 1, '2020-10-10 09:37:11', '2020-10-10 09:37:11'),
(11, 1, '3240', '2020-10-10', 'Faruk Haidar BD', 1, '2020-10-10 09:42:02', '2020-10-10 10:24:09'),
(12, 1, '5', '2020-10-10', 'Faruk Haidar BD', 1, '2020-10-10 10:24:50', '2020-10-10 10:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gl_date` date NOT NULL,
  `referance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src_referance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `gl_date`, `referance`, `src_referance`, `memo`, `created_at`, `updated_at`) VALUES
(1, '2020-10-17', 'fsdfsd', 'fsdfsdf', 'fdsfsdfsdfsdfsdfsdfsdf', '2020-10-28 09:07:35', '2020-10-28 09:07:35'),
(4, '2020-09-30', 'okkkk', 'okkk', 'dfgdfgdfgdfgdfgdfg', '2020-10-28 09:11:33', '2020-10-28 09:11:33'),
(5, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', '2020-10-28 09:13:58', '2020-10-28 09:13:58'),
(6, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', '2020-10-28 09:15:01', '2020-10-28 09:15:01'),
(7, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', '2020-10-28 09:15:38', '2020-10-28 09:15:38'),
(10, '2020-10-17', 'faruk', 'faruk', 'cnvnghngh', '2020-10-28 10:33:23', '2020-10-28 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `journal_details`
--

CREATE TABLE `journal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_id` bigint(20) NOT NULL,
  `gl_id` bigint(20) NOT NULL,
  `txn_date` date NOT NULL,
  `memo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_details`
--

INSERT INTO `journal_details` (`id`, `journal_id`, `gl_id`, `txn_date`, `memo`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-10-17', 'dfgdfg', 45, '2020-10-28 09:08:31', '2020-10-28 09:08:31'),
(2, 1, 1, '2020-10-17', 'dgdfgdf', 46, '2020-10-28 09:08:31', '2020-10-28 09:08:31'),
(3, 1, 1, '2020-09-30', 'dgdfhfhfh', 66, '2020-10-28 09:11:33', '2020-10-28 09:11:33'),
(4, 1, 2, '2020-09-30', 'fdgdfhd', 55, '2020-10-28 09:11:33', '2020-10-28 09:11:33'),
(5, 7, 2, '2020-10-21', 'fgdfg', 45, '2020-10-28 09:15:38', '2020-10-28 09:15:38'),
(6, 7, 1, '2020-10-21', 'dfsdfgsdg', 45, '2020-10-28 09:15:38', '2020-10-28 09:15:38'),
(7, 10, 1, '2020-10-17', 'dfgdfsdfh', 50, '2020-10-28 10:33:23', '2020-10-28 11:16:11'),
(8, 10, 1, '2020-10-17', 'dfdfhfg', 54, '2020-10-28 10:33:23', '2020-10-28 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `type`, `slug`, `leave_day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Annul Leave BD', 'leave-ea5pdrd7-zbcph8bj', '13', '1', '2020-09-27 11:35:40', '2020-09-27 12:03:18'),
(2, 'Monthly Leave', 'leave-qjyhdl8a-rzrsjlir', '9', '0', '2020-09-27 11:38:35', '2020-09-27 12:02:30'),
(3, 'Annul Leave BD', 'leave-xm6y1cnz-xefg4fhz', '15', '0', '2020-10-13 06:09:40', '2020-10-13 06:09:48'),
(4, 'Annul Leave', 'leave-g0aovzmm-ytacmdmn', '17', '1', '2020-10-13 06:09:54', '2020-10-13 06:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `loan_amount` double(13,2) DEFAULT NULL,
  `paid_amount` double(13,2) DEFAULT NULL,
  `loan_taken_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `monthly_installment` double(13,2) DEFAULT NULL,
  `given_installment` double(13,2) DEFAULT 0.00,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`id`, `employee_id`, `loan_amount`, `paid_amount`, `loan_taken_date`, `duration`, `monthly_installment`, `given_installment`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 7823740.00, 3245.00, '2020-06-10', 430, 345340.00, 342340.00, 'loan_6et2qpa0-lifz3xjq', 1, '2020-10-06 07:20:44', '2020-10-10 10:25:16'),
(2, 4, 7823748.00, 7823748.00, '2020-06-20', 453, 34534.00, 5345.00, 'loan_hbwomabd-bdvlkpsf', 0, '2020-10-06 07:26:21', '2020-10-10 09:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_statuses`
--

CREATE TABLE `marriage_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marriage_statuses`
--

INSERT INTO `marriage_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'No Record', 1, '2020-07-06 07:18:16', NULL),
(2, 'Single', 1, '2020-07-06 07:18:16', NULL),
(3, 'Married', 1, '2020-07-06 08:18:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_08_10_092713_create_departments_table.php', 0),
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_07_01_092856_create_countries_table', 2),
(11, '2020_07_01_192403_create_university_program_categories_table', 3),
(12, '2020_07_03_120555_create_universities_table', 4),
(13, '2020_07_03_165232_create_university_programs_table', 5),
(14, '2020_07_04_161429_create_university_wise_programs_table', 6),
(15, '2020_07_05_142653_create_permission_tables', 7),
(16, '2020_07_06_121521_create_marriage_statuses_table', 8),
(19, '2020_08_10_094012_create_branches_table', 11),
(21, '2020_08_10_094859_create_emp_natures_table', 13),
(23, '2020_08_10_100059_create_emp_statuses_table', 15),
(25, '2020_08_10_095406_create_pay_types_table', 17),
(26, '2020_08_10_100707_create_salary_scales_table', 18),
(27, '2020_09_08_104021_create_salary_strings_table', 18),
(29, '2020_08_10_094518_create_shifts_table', 19),
(31, '2020_09_04_095349_create_employees_table', 20),
(32, '2020_09_27_152952_create_leaves_table', 21),
(33, '2020_09_27_154424_create_resignations_table', 22),
(34, '2020_09_27_154523_create_terminations_table', 23),
(35, '2020_09_28_172455_create_employee_leaves_table', 24),
(36, '2020_09_29_134014_create_experiences_table', 25),
(37, '2020_09_29_163225_create_provident_funds_table', 26),
(38, '2020_10_03_105211_create_advance_salaries_table', 27),
(39, '2020_10_03_170233_create_client_satisfaction_questions_table', 28),
(40, '2020_10_04_122407_create_client_details_table', 29),
(41, '2020_10_04_122754_create_client_satisfaction_responses_table', 30),
(42, '2020_10_04_165813_create_complains_table', 31),
(43, '2020_10_05_113407_create_event_management_table', 32),
(44, '2020_10_05_160858_create_ad_details_table', 33),
(46, '2020_10_05_185023_create_loan_details_table', 34),
(47, '2020_10_05_185929_create_installment_details_table', 35),
(50, '2020_10_15_115943_create_student_academics_table', 37),
(51, '2020_10_15_121216_create_student_documents_table', 38),
(52, '2020_10_16_150132_create_student_visas_table', 39),
(53, '2020_10_23_111325_create_student_experiances_table', 40),
(54, '2020_10_09_104218_create_students_table', 41),
(55, '2020_10_20_201243_create_account_classes_table', 42),
(56, '2020_10_22_083901_create_account_groups_table', 43),
(57, '2020_10_22_191806_create_gl_accounts_table', 44),
(58, '2020_10_23_084230_create_bank_accounts_table', 45),
(59, '2020_10_23_114908_create_journals_table', 46),
(60, '2020_10_23_114933_create_journal_details_table', 47),
(61, '2020_11_01_110300_create_payment_details_table', 48),
(62, '2020_11_01_111827_create_deposit_details_table', 49),
(63, '2020_11_12_120421_create_student_statuses_table', 50),
(64, '2020_11_12_151512_create_student_logs_table', 51),
(65, '2020_11_14_164349_create_agents_table', 52),
(66, '2020_11_16_103655_create_counsellor_generates_table', 53),
(67, '2020_11_16_133032_create_student_requsitions_table', 54),
(68, '2020_11_16_163928_create_student_requsition_details_table', 55),
(69, '2020_11_17_172424_create_student_money_receipts_table', 56),
(70, '2020_11_17_173828_create_student_money_receipt_details_table', 57);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 5),
(1, 'App\\User', 8),
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 5),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 10),
(2, 'App\\User', 11),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(2, 'App\\User', 15),
(4, 'App\\User', 16);

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
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) NOT NULL,
  `gl_id` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_types`
--

CREATE TABLE `pay_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_types`
--

INSERT INTO `pay_types` (`id`, `name`, `pay_days`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Weekly', '7', 1, '2020-09-08 04:37:34', '2020-09-08 04:37:34'),
(2, 'Monthly', '30', 1, '2020-09-08 04:37:52', '2020-09-08 04:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'all_user', 'web', '2020-10-30 05:26:41', '2020-10-30 05:26:41'),
(2, 'insert_user', 'web', '2020-10-30 05:26:41', '2020-10-30 05:26:41'),
(3, 'edit_user', 'web', '2020-10-30 05:26:42', '2020-10-30 05:26:42'),
(4, 'view_user', 'web', '2020-10-30 05:26:42', '2020-10-30 05:26:42'),
(5, 'delete_user', 'web', '2020-10-30 05:26:42', '2020-10-30 05:26:42'),
(6, 'all_branch', 'web', '2020-10-30 05:26:42', '2020-10-30 05:26:42'),
(7, 'insert_branch', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(8, 'edit_branch', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(9, 'view_branch', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(10, 'delete_branch', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(11, 'all_department', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(12, 'insert_department', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(13, 'edit_department', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(14, 'view_department', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(15, 'delete_department', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(16, 'all_designation', 'web', '2020-10-30 05:26:43', '2020-10-30 05:26:43'),
(17, 'insert_designation', 'web', '2020-10-30 05:26:44', '2020-10-30 05:26:44'),
(18, 'edit_designation', 'web', '2020-10-30 05:26:44', '2020-10-30 05:26:44'),
(19, 'view_designation', 'web', '2020-10-30 05:26:44', '2020-10-30 05:26:44'),
(20, 'delete_designation', 'web', '2020-10-30 05:26:45', '2020-10-30 05:26:45'),
(21, 'all_employee', 'web', '2020-10-30 05:26:45', '2020-10-30 05:26:45'),
(22, 'insert_employee', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(23, 'edit_employee', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(24, 'view_employee', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(25, 'delete_employee', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(26, 'all_country', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(27, 'insert_country', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(28, 'edit_country', 'web', '2020-10-30 05:26:46', '2020-10-30 05:26:46'),
(29, 'view_country', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(30, 'delete_country', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(31, 'all_complain', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(32, 'insert_complain', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(33, 'edit_complain', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(34, 'view_complain', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(35, 'delete_complain', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(36, 'all_emp_status', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(37, 'insert_emp_status', 'web', '2020-10-30 05:26:47', '2020-10-30 05:26:47'),
(38, 'edit_emp_status', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(39, 'view_emp_status', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(40, 'delete_emp_status', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(41, 'all_emp_nature', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(42, 'insert_emp_nature', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(43, 'edit_emp_nature', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(44, 'view_emp_nature', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(45, 'delete_emp_nature', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(46, 'all_pay_type', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(47, 'insert_pay_type', 'web', '2020-10-30 05:26:48', '2020-10-30 05:26:48'),
(48, 'edit_pay_type', 'web', '2020-10-30 05:26:49', '2020-10-30 05:26:49'),
(49, 'view_pay_type', 'web', '2020-10-30 05:26:49', '2020-10-30 05:26:49'),
(50, 'delete_pay_type', 'web', '2020-10-30 05:26:50', '2020-10-30 05:26:50'),
(51, 'all_event', 'web', '2020-10-30 05:26:50', '2020-10-30 05:26:50'),
(52, 'insert_event', 'web', '2020-10-30 05:26:50', '2020-10-30 05:26:50'),
(53, 'edit_event', 'web', '2020-10-30 05:26:50', '2020-10-30 05:26:50'),
(54, 'view_event', 'web', '2020-10-30 05:26:50', '2020-10-30 05:26:50'),
(55, 'delete_event', 'web', '2020-10-30 05:26:51', '2020-10-30 05:26:51'),
(56, 'all_holiday', 'web', '2020-10-30 05:26:51', '2020-10-30 05:26:51'),
(57, 'insert_holiday', 'web', '2020-10-30 05:26:51', '2020-10-30 05:26:51'),
(58, 'edit_holiday', 'web', '2020-10-30 05:26:51', '2020-10-30 05:26:51'),
(59, 'view_holiday', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(60, 'delete_holiday', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(61, 'all_leave', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(62, 'insert_leave', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(63, 'edit_leave', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(64, 'view_leave', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(65, 'delete_leave', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(66, 'all_salary_scale', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(67, 'insert_salary_scale', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(68, 'edit_salary_scale', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(69, 'view_salary_scale', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(70, 'delete_salary_scale', 'web', '2020-10-30 05:26:52', '2020-10-30 05:26:52'),
(71, 'all_salary_string', 'web', '2020-10-30 05:26:53', '2020-10-30 05:26:53'),
(72, 'insert_salary_string', 'web', '2020-10-30 05:26:53', '2020-10-30 05:26:53'),
(73, 'edit_salary_string', 'web', '2020-10-30 05:26:53', '2020-10-30 05:26:53'),
(74, 'view_salary_string', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(75, 'delete_salary_string', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(76, 'all_salary_details', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(77, 'insert_salary_details', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(78, 'edit_salary_details', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(79, 'view_salary_details', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(80, 'delete_salary_details', 'web', '2020-10-30 05:26:54', '2020-10-30 05:26:54'),
(81, 'all_shift', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(82, 'insert_shift', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(83, 'edit_shift', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(84, 'view_shift', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(85, 'delete_shift', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(86, 'all_student', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(87, 'insert_student', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(88, 'edit_student', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(89, 'view_student', 'web', '2020-10-30 05:26:55', '2020-10-30 05:26:55'),
(90, 'delete_student', 'web', '2020-10-30 05:26:56', '2020-10-30 05:26:56'),
(91, 'all_university', 'web', '2020-10-30 05:26:56', '2020-10-30 05:26:56'),
(92, 'insert_university', 'web', '2020-10-30 05:26:56', '2020-10-30 05:26:56'),
(93, 'edit_university', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(94, 'view_university', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(95, 'delete_university', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(96, 'all_university_program', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(97, 'insert_university_program', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(98, 'edit_university_program', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(99, 'view_university_program', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(100, 'delete_university_program', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(101, 'all_university_program_category', 'web', '2020-10-30 05:26:57', '2020-10-30 05:26:57'),
(102, 'insert_university_program_category', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(103, 'edit_university_program_category', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(104, 'view_university_program_category', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(105, 'delete_university_program_category', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(106, 'all_termination', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(107, 'insert_termination', 'web', '2020-10-30 05:26:58', '2020-10-30 05:26:58'),
(108, 'edit_termination', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(109, 'view_termination', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(110, 'delete_termination', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(111, 'all_resignation', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(112, 'insert_resignation', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(113, 'edit_resignation', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(114, 'view_resignation', 'web', '2020-10-30 05:26:59', '2020-10-30 05:26:59'),
(115, 'delete_resignation', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(116, 'all_role', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(117, 'insert_role', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(118, 'edit_role', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(119, 'view_role', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(120, 'delete_role', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(121, 'all_guest', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(122, 'insert_guest', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(123, 'edit_guest', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(124, 'view_guest', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(125, 'delete_guest', 'web', '2020-10-30 05:27:00', '2020-10-30 05:27:00'),
(126, 'all_guest', 'web', '2020-10-30 05:27:01', '2020-10-30 05:27:01'),
(127, 'insert_guest', 'web', '2020-10-30 05:27:01', '2020-10-30 05:27:01'),
(128, 'edit_guest', 'web', '2020-10-30 05:27:02', '2020-10-30 05:27:02'),
(129, 'view_guest', 'web', '2020-10-30 05:27:02', '2020-10-30 05:27:02'),
(130, 'delete_guest', 'web', '2020-10-30 05:27:02', '2020-10-30 05:27:02'),
(131, 'all_client_details', 'web', '2020-10-30 05:27:02', '2020-10-30 05:27:02'),
(132, 'insert_client_details', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(133, 'edit_client_details', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(134, 'view_client_details', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(135, 'delete_client_details', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(136, 'all_client_question', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(137, 'insert_client_question', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(138, 'edit_client_question', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(139, 'view_client_question', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(140, 'delete_client_question', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(141, 'all_client_response', 'web', '2020-10-30 05:27:03', '2020-10-30 05:27:03'),
(142, 'insert_client_response', 'web', '2020-10-30 05:27:04', '2020-10-30 05:27:04'),
(143, 'edit_client_response', 'web', '2020-10-30 05:27:04', '2020-10-30 05:27:04'),
(144, 'view_client_response', 'web', '2020-10-30 05:27:04', '2020-10-30 05:27:04'),
(145, 'delete_client_response', 'web', '2020-10-30 05:27:04', '2020-10-30 05:27:04'),
(146, 'all_advertisment', 'web', '2020-10-30 05:27:04', '2020-10-30 05:27:04'),
(147, 'insert_advertisment', 'web', '2020-10-30 05:27:05', '2020-10-30 05:27:05'),
(148, 'edit_advertisment', 'web', '2020-10-30 05:27:05', '2020-10-30 05:27:05'),
(149, 'view_advertisment', 'web', '2020-10-30 05:27:05', '2020-10-30 05:27:05'),
(150, 'delete_advertisment', 'web', '2020-10-30 05:27:06', '2020-10-30 05:27:06'),
(151, 'all_loan_details', 'web', '2020-10-30 05:27:06', '2020-10-30 05:27:06'),
(152, 'insert_loan_details', 'web', '2020-10-30 05:27:06', '2020-10-30 05:27:06'),
(153, 'edit_loan_details', 'web', '2020-10-30 05:27:06', '2020-10-30 05:27:06'),
(154, 'view_loan_details', 'web', '2020-10-30 05:27:06', '2020-10-30 05:27:06'),
(155, 'delete_loan_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(156, 'all_installment_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(157, 'insert_installment_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(158, 'edit_installment_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(159, 'view_installment_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(160, 'delete_installment_details', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(161, 'all_account_class', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(162, 'insert_account_class', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(163, 'edit_account_class', 'web', '2020-10-30 05:27:07', '2020-10-30 05:27:07'),
(164, 'view_account_class', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(165, 'delete_account_class', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(166, 'all_account_group', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(167, 'insert_account_group', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(168, 'edit_account_group', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(169, 'view_account_group', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(170, 'delete_account_group', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(171, 'all_bank_account', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(172, 'insert_bank_account', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(173, 'edit_bank_account', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(174, 'view_bank_account', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(175, 'delete_bank_account', 'web', '2020-10-30 05:27:08', '2020-10-30 05:27:08'),
(176, 'all_employee_attendance', 'web', '2020-10-30 05:27:09', '2020-10-30 05:27:09'),
(177, 'insert_employee_attendance', 'web', '2020-10-30 05:27:09', '2020-10-30 05:27:09'),
(178, 'edit_employee_attendance', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(179, 'view_employee_attendance', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(180, 'delete_employee_attendance', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(181, 'all_employee_leave', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(182, 'insert_employee_leave', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(183, 'edit_employee_leave', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(184, 'view_employee_leave', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(185, 'delete_employee_leave', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(186, 'all_gl_account', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(187, 'insert_gl_account', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(188, 'edit_gl_account', 'web', '2020-10-30 05:27:10', '2020-10-30 05:27:10'),
(189, 'view_gl_account', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(190, 'delete_gl_account', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(191, 'all_journal', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(192, 'insert_journal', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(193, 'edit_journal', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(194, 'view_journal', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(195, 'delete_journal', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(196, 'all_marriage_status', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(197, 'insert_marriage_status', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(198, 'edit_marriage_status', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(199, 'view_marriage_status', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(200, 'delete_marriage_status', 'web', '2020-10-30 05:27:11', '2020-10-30 05:27:11'),
(201, 'test', 'web', '2020-10-30 05:34:46', '2020-10-30 05:34:46'),
(202, 'all_resolution', 'web', NULL, NULL),
(203, 'insert_resolution', 'web', NULL, NULL),
(204, 'edit_resolution', 'web', NULL, NULL),
(205, 'view_resolution', 'web', NULL, NULL),
(206, 'delete_resolution', 'web', NULL, NULL),
(207, 'os', 'web', '2020-10-31 09:09:25', '2020-10-31 09:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `provident_funds`
--

CREATE TABLE `provident_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_provident` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_provident` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provident_funds`
--

INSERT INTO `provident_funds` (`id`, `employee_id`, `company_provident`, `employee_provident`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', '1284', '4213', 1, '2020-09-30 10:30:28', '2020-09-30 10:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `resignation_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resignation_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resignations`
--

INSERT INTO `resignations` (`id`, `employee_id`, `branch_id`, `resignation_for`, `reason`, `slug`, `notice_date`, `resignation_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'jjs adfjh vdjfsd kdfjnskdjn sdgdfg', 'Bestkjvldkvldfk djkgdkfgdfg', NULL, '05/09/2020', '09/17/2020', NULL, '0', '2020-09-28 04:56:19', '2020-09-29 05:33:01'),
(2, 4, 2, 'ffffffffffffff', 'cccccccccccccccccc asjdkas c sajdicsdjvhin ksivjsdoivjosldklvsklvk', NULL, '04/25/2020', '04/17/2020', NULL, '0', '2020-09-28 05:11:37', '2020-09-28 05:34:21'),
(3, 4, 2, 'jjs adfjh vdjfsd kdfjnskdjn sdgdfg', 'dasdasf dfvdfvdf', NULL, '04/28/2020', '04/26/2020', NULL, '1', '2020-09-28 05:34:08', '2020-09-28 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-10-29 09:26:19', '2020-10-29 09:26:19'),
(2, 'Super Admin', 'web', '2020-10-29 09:26:42', '2020-10-29 09:26:42'),
(3, 'Editor', 'web', '2020-11-30 10:08:31', '2020-11-30 10:08:31'),
(4, 'Counsellor', 'web', '2020-12-03 05:46:59', '2020-12-03 05:46:59');

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
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(5, 2),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 2),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 2),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(86, 4),
(87, 2),
(87, 4),
(88, 2),
(88, 4),
(89, 2),
(89, 4),
(90, 2),
(90, 4),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(139, 2),
(140, 2),
(141, 2),
(142, 2),
(143, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2),
(148, 2),
(149, 2),
(150, 2),
(151, 2),
(152, 2),
(153, 2),
(154, 2),
(155, 2),
(156, 2),
(157, 2),
(158, 2),
(159, 2),
(160, 2),
(161, 2),
(162, 2),
(163, 2),
(164, 2),
(165, 2),
(166, 2),
(167, 2),
(168, 2),
(169, 2),
(170, 2),
(171, 2),
(172, 2),
(173, 2),
(174, 2),
(175, 2),
(176, 2),
(177, 2),
(178, 2),
(179, 2),
(180, 2),
(181, 2),
(182, 2),
(183, 2),
(184, 2),
(185, 2),
(186, 2),
(187, 2),
(188, 2),
(189, 2),
(190, 2),
(191, 2),
(192, 2),
(193, 2),
(194, 2),
(195, 2),
(196, 2),
(197, 2),
(198, 2),
(199, 2),
(200, 2),
(202, 2),
(203, 2),
(204, 2),
(205, 2),
(206, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE `salary_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `string_id` bigint(20) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`id`, `employee_id`, `string_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12000.00, '2020-09-20 11:33:57', '2020-09-20 13:09:45'),
(2, 1, 2, 7000.00, '2020-09-20 11:33:57', '2020-09-20 13:09:45'),
(3, 1, 3, 1000.00, '2020-09-20 11:33:57', '2020-09-20 13:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `salary_scales`
--

CREATE TABLE `salary_scales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_scales`
--

INSERT INTO `salary_scales` (`id`, `name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'G-100', 12000.00, 1, '2020-09-08 04:52:28', '2020-09-12 09:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `salary_strings`
--

CREATE TABLE `salary_strings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_strings`
--

INSERT INTO `salary_strings` (`id`, `name`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 60.00, 'Persent', '2020-09-08 05:11:16', '2020-09-08 05:11:16'),
(2, 'House Rent', 40.00, 'Persent', '2020-09-08 05:11:42', '2020-09-08 05:11:42'),
(3, 'Health', 500.00, 'Fixed', '2020-09-08 05:11:58', '2020-09-08 05:11:58'),
(4, 'TA', 300.00, 'Fixed', '2020-09-08 05:29:35', '2020-09-08 05:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `start`, `end`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Night A', '7:00 PM', '6:00 AM', 'Next Day', 1, '2020-09-08 05:54:08', '2020-09-08 05:54:08'),
(3, 'Day Shift', '10:00 AM', '7:00 PM', 'Same Day', 1, '2020-09-30 07:00:13', '2020-09-30 07:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_study` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_ielts` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_visit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_others` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_fair` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_seminar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_staff` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_ads` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_relative` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_newspaper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_leaflet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_webpage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_spot` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_tv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_others` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reception` int(11) DEFAULT NULL,
  `counsellor` int(11) DEFAULT NULL,
  `apply_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `university` int(11) DEFAULT NULL,
  `course_cat` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `reg_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tution_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_course_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commencement_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ambassy_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_tiket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_transfer_status` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `slug`, `id_no`, `name`, `father_name`, `father_profession`, `mother_name`, `mother_profession`, `dob`, `blood_group`, `religion`, `national_id`, `passport_id`, `nationality`, `gender`, `present_address`, `permanent_address`, `email`, `phone`, `image`, `visitor_id`, `guest_date`, `to`, `room`, `purpose_study`, `purpose_ielts`, `purpose_visit`, `purpose_others`, `subject`, `marital_status`, `hear_fair`, `hear_seminar`, `hear_staff`, `hear_ads`, `hear_relative`, `hear_newspaper`, `hear_facebook`, `hear_agent`, `hear_leaflet`, `hear_webpage`, `hear_spot`, `hear_tv`, `hear_others`, `ref_by`, `reception`, `counsellor`, `apply_for`, `admission_date`, `location`, `university`, `course_cat`, `course`, `reg_fees`, `tution_fees`, `total_course_fees`, `mode_of_payment`, `living_cost`, `job_permission`, `application_deadline`, `commencement_date`, `visa_fees`, `ambassy_address`, `service_charge`, `air_tiket`, `comments`, `student_status`, `file_transfer_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'student-q2ryplhm-iskkioje', '7459375', 'Faruk Haidar', NULL, NULL, NULL, NULL, '1993-01-01', NULL, NULL, NULL, NULL, '3', NULL, 'dafasfdasfsdfgsdgfd', '#80,jafrabad, sara bangla road, dhaka 1207', 'farukhaidar3@gmail.com', '01949796940', 'uploads/student/guest_1603450634.PNG', '496546', NULL, 'farjsakjsaks', '77407', 'on', 'on', 'on', NULL, 'I am excited for meet you', 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'mfdgdf', '2020-10-21', NULL, 1, 2, 3, '343', '343', '3453453', 'Cash', '3434', 'dfgdgdfg', '1970-01-01', '10/08/2020', '45435', '663 Durant', NULL, '453534', 'fddfghfgjhdfghfgh', 'Student', 4, 1, '2020-10-23 10:57:14', '2020-12-01 09:52:57'),
(2, 'student-q2ryplhm-iskkiow', '42353453456', 'Faruk Haidar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhaidarbd@gmail.com', NULL, 'uploads/student/guest_1603452332.PNG', '215897', NULL, '323423', '561352', 'on', 'on', 'on', NULL, 'I am excited for meet you', 'Single', NULL, 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, 7, 'sfsdgfdg', '2020-10-14', 3, 1, 2, 1, '43534', '534534', '45345', 'Cash', '5345', 'fhrthfgh', '1970-01-01', '10/20/2020', '345345', '663 Durant', NULL, '435345', 'fddfhfghfdgh', 'Student', NULL, 1, '2020-10-23 11:25:32', '2020-10-27 11:33:30'),
(3, 'student-q2ryplhm-iskkiojo', '5435345345', 'Faruk Haidar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhaxidarv@gmail.com', NULL, 'uploads/student/guest_1603454750.png', '516604', NULL, 'dsgdfgsdfgsdfg', '637068', '1', '1', '1', '1', 'I am excited for meet you', 'Single', '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, 2, NULL, '1970-01-01', 3, 1, 1, 2, NULL, '4534', '5345', 'Cash', '4534', '5345', '1970-01-01', '10/28/2020', '434534', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '4534', 'fgrtyrty', 'Student', NULL, 1, '2020-10-23 12:05:51', '2020-11-06 12:13:03'),
(4, 'stu-rkdczeyq-lspj3msb', 'sdfsdfdsg', 'Faruk Haidar', 'dfgdfg', 'dfgdsgdf', 'gdfgdf', 'gdfgdf', '2019-12-31', 'a_positive', 'islam', '435345645', '546456456345', '3', 'male', '#80,jafrabad, sara bangla road, dhaka 1207', 'sdfsdgdfsgdfgdsfgdfg', 'farukhaidarv@gmail.com', '01949796940', 'uploads/student/student_1603455604.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student', 2, 1, '2020-10-23 12:20:04', '2020-11-25 04:44:43'),
(5, 'student-olagrafr-s1l9zyqc', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhaidasrv@gmail.com', NULL, 'uploads/student/guest_1604905262.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', 4, 1, '2020-11-09 07:01:02', '2020-11-27 05:23:44'),
(6, 'student-bcregjnr-nisvq0bq', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhaidarv@gmail.com', NULL, 'uploads/student/guest_1604905268.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2020-11-09 07:01:08', '2020-11-09 07:01:08'),
(7, 'student-z9e76bj9-w8wjwbsb', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'dfarukhaidarv@gmail.com', NULL, 'uploads/student/guest_1604905342.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2020-11-09 07:02:22', '2020-11-09 07:02:22'),
(8, 'student-jwkkrrqa-rnnnjooh', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhdaidarv@gmail.com', NULL, 'uploads/student/guest_1604905499.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2020-11-09 07:04:59', '2020-11-09 07:04:59'),
(9, 'student-2qt8amqk-xs5wsu6u', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhadsidarv@gmail.com', NULL, NULL, '652291', '2020-11-18', 'fsdfsdf', '896750', '1', NULL, '1', NULL, 'I am excited for meet you', 'Single', '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', 1, 1, '2020-11-14 04:58:47', '2020-12-02 09:09:44'),
(10, 'student-ispvg3us-3aktbeil', NULL, 'zaahira Akter', NULL, NULL, NULL, NULL, '2020-11-04', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'frrarukhaidarv@gmail.com', NULL, NULL, '275503', '2020-11-05', NULL, '46086', '1', NULL, '1', NULL, 'I am excited for meet you', 'Divorced', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, NULL, NULL, '6', 2, 7, 'sfsdgfdg', '2020-11-03', 3, 1, 2, 1, '434', '23423', '42353452', 'Cash', '423423', 'yes', '1970-01-01', '11/03/2020', '324', 'Dhaka, Bangladesh', NULL, '4534', '3423423', 'Student', NULL, 1, '2020-11-17 09:31:11', '2020-11-17 09:47:29'),
(11, 'student-qpfaqtxj-jqxspbsq', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'farukhdsfaidarv@gmail.com', NULL, NULL, '490543', '2020-11-17', NULL, '582240', '1', '1', '1', NULL, 'I am excited for meet you', 'Divorced', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '1', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2020-11-20 06:59:01', '2020-11-20 06:59:01'),
(12, 'student-uetltqrb-h9hw4k3u', NULL, 'zaahira Akter', NULL, NULL, NULL, NULL, '2020-11-18', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '138269', '2020-11-17', 'test', '75811', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, '4', 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2020-11-30 05:55:04', '2020-11-30 05:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_academics`
--

INSERT INTO `student_academics` (`id`, `student_id`, `exam`, `institut`, `department`, `board`, `grade`, `pass_year`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'SSC', 'DSC', 'commerce', 'Dhaka', '5.00', '2013', 1, '2020-10-15 08:46:17', '2020-10-15 08:46:17'),
(3, 1, 'HSC', 'DSC', 'commerce', 'Dhaka', '5.00', '2015', 1, '2020-10-15 08:46:18', '2020-10-15 08:46:18'),
(4, 2, 'JSC', 'RSC', 'commerce', 'Dhaka', '5.00', '2018', 1, '2020-10-15 08:52:04', '2020-10-15 08:52:04'),
(5, 2, 'SSC', 'DSC', 'commerce', 'Dhaka', '5.00', '4343', 1, '2020-10-15 08:52:04', '2020-10-15 08:52:04'),
(7, 1, 'JSC', 'creative shaper', 'commerce', 'dhaka', '5.00', '2020', 1, '2020-10-19 06:36:39', '2020-10-19 06:36:39'),
(8, 3, 'JSC', 'dfgdfgf', 'fghfghf', 'Dhaka', '5.00', '3423', 1, '2020-10-22 06:07:42', '2020-10-22 06:07:42'),
(9, 3, 'gdfg', 'dfsdf', 'sdfsdfs', 'Dhaka', '5.00', '3232', 1, '2020-10-22 06:07:42', '2020-10-22 06:07:42'),
(10, 1, 'JSC', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2122', 1, '2020-10-23 10:57:14', '2020-10-23 10:57:14'),
(11, 1, 'PSC', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 10:57:15', '2020-10-23 10:57:15'),
(12, 2, 'JSC', 'dsad', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 11:25:32', '2020-10-23 11:25:32'),
(13, 2, 'PSC', 'fsdfsdf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 11:25:33', '2020-10-23 11:25:33'),
(14, 2, 'SSC', 'dsfsdgsd', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 11:25:34', '2020-10-23 11:25:34'),
(15, 3, 'test', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 12:05:51', '2020-10-23 12:05:51'),
(16, 3, 'gdfg', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-10-23 12:05:52', '2020-10-23 12:05:52'),
(17, 4, 'JSC', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2323', 1, '2020-10-23 12:20:05', '2020-10-23 12:20:05'),
(18, 4, 'PSC', 'dgdfgdf', 'commerce', 'Dhaka', '5.00', '5345', 1, '2020-10-23 12:20:06', '2020-10-23 12:20:06'),
(19, 4, 'dsfdsg', 'fgsdfg', 'dfgdsf', 'gdfgdf', '5.00', '5435', 1, '2020-10-23 12:20:06', '2020-10-23 12:20:06'),
(20, 7, 'JSC', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-11-09 07:02:22', '2020-11-09 07:02:22'),
(21, 8, 'JSC', 'dfgdfgf', 'commerce', 'Dhaka', '5.00', '2020', 1, '2020-11-09 07:04:59', '2020-11-09 07:04:59'),
(22, 9, 'JSC', 'DSC', 'commerce', 'Dhaka', '5.00', '2121', 1, '2020-11-14 04:58:47', '2020-11-14 04:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_documents`
--

CREATE TABLE `student_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `document_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_documents`
--

INSERT INTO `student_documents` (`id`, `student_id`, `document_title`, `document_type`, `document`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Passport', 'image', 'uploads/document/document_1602827053.png', 1, '2020-10-15 08:46:18', '2020-10-16 05:44:13'),
(2, 2, 'National Id BD', 'image', 'uploads/document/document_1602826951.png', 1, '2020-10-15 08:46:19', '2020-10-16 05:42:31'),
(4, 2, 'Passport BD', 'image', 'uploads/document/document_1602826936.png', 1, '2020-10-15 08:52:04', '2020-10-16 05:42:16'),
(6, 2, 'National Id BD', 'image', 'uploads/document/document_1602826834.png', 1, '2020-10-16 05:40:34', '2020-10-16 05:40:34'),
(8, 3, 'Passport', 'image', 'uploads/document/document_1603346862.PNG', 1, '2020-10-22 06:07:42', '2020-10-22 06:07:42'),
(9, 3, 'gdfgd', 'image', 'uploads/document/document_1603346863.PNG', 1, '2020-10-22 06:07:43', '2020-10-22 06:07:43'),
(10, 4, 'Passport', 'image', 'uploads/document/document_1603455607.PNG', 1, '2020-10-23 12:20:07', '2020-10-23 12:20:07'),
(11, 4, 'gdfgd', 'image', 'uploads/document/document_1603455608.PNG', 1, '2020-10-23 12:20:08', '2020-10-23 12:20:08'),
(12, 1, 'National Id BD', 'image', 'uploads/document/document_1603519710.PNG', 1, '2020-10-24 06:08:30', '2020-10-24 06:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_experiances`
--

CREATE TABLE `student_experiances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_experiances`
--

INSERT INTO `student_experiances` (`id`, `student_id`, `company`, `duration`, `designation`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Faruk Haidar', '4', 'web developer', 1, '2020-10-23 10:57:15', '2020-10-23 10:57:15'),
(2, 1, 'Farukhaidarbd', '3', 'Web designer', 1, '2020-10-23 10:57:15', '2020-10-23 10:57:15'),
(3, 2, 'Farukhaidarbd', '4', 'web developer', 1, '2020-10-23 11:25:35', '2020-10-23 11:25:35'),
(4, 2, 'Faruk Haidar', '3', 'web developer', 1, '2020-10-23 11:25:36', '2020-10-23 11:25:36'),
(5, 3, 'Farukhaidarbd', '4', 'web developer', 1, '2020-10-23 12:05:52', '2020-10-23 12:05:52'),
(6, 3, 'Faruk Haidar', '4', 'web developer', 1, '2020-10-23 12:05:53', '2020-10-23 12:05:53'),
(7, 8, 'Farukhaidarbd', '4', 'web developer', 1, '2020-11-09 07:04:59', '2020-11-09 07:04:59'),
(8, 9, NULL, NULL, NULL, 1, '2020-11-14 04:58:47', '2020-11-14 04:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `student_id`, `type`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'File transfered', 'Student file transfer status  chenge Cancel to Active. This file transfer user Saidul Islam Uzzal', 1, '2020-11-12 11:41:38', '2020-11-12 11:41:38'),
(2, 1, 'File transfered', 'Student file transfer status chenge Active to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-12 11:45:14', '2020-11-12 11:45:14'),
(3, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-12 12:51:23', '2020-11-12 12:51:23'),
(4, 1, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-18 11:41:06', '2020-11-18 11:41:06'),
(5, 4, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-25 04:44:43', '2020-11-25 04:44:43'),
(6, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-25 05:39:49', '2020-11-25 05:39:49'),
(7, 1, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-25 06:54:53', '2020-11-25 06:54:53'),
(8, 9, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-26 06:42:19', '2020-11-26 06:42:19'),
(9, 9, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-26 07:26:12', '2020-11-26 07:26:12'),
(10, 5, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-26 07:26:28', '2020-11-26 07:26:28'),
(11, 5, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-27 05:23:44', '2020-11-27 05:23:44'),
(12, 9, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-27 09:37:28', '2020-11-27 09:37:28'),
(13, 9, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-27 09:37:33', '2020-11-27 09:37:33'),
(14, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-12-01 09:52:57', '2020-12-01 09:52:57'),
(15, 9, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-12-02 09:09:30', '2020-12-02 09:09:30'),
(16, 9, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-12-02 09:09:40', '2020-12-02 09:09:40'),
(17, 9, 'File transfered', 'Student file transfer status chenge Cancel to Active. This file transfer user Saidul Islam Uzzal', 1, '2020-12-02 09:09:44', '2020-12-02 09:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_money_receipts`
--

CREATE TABLE `student_money_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `money_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_money_receipts`
--

INSERT INTO `student_money_receipts` (`id`, `student_id`, `money_receipt`, `amount`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '125293088', '89', '2020-11-18', '1', '2020-11-18 06:21:17', '2020-11-18 06:21:17'),
(2, 2, '924381362', '232', '2020-11-18', '1', '2020-11-18 06:26:09', '2020-11-18 06:26:09'),
(3, 2, '1896062614', '232', '2020-11-18', '1', '2020-11-18 06:27:34', '2020-11-18 06:27:34'),
(4, 2, '768787287', '232', '2020-11-18', '1', '2020-11-18 06:29:46', '2020-11-18 06:29:46'),
(5, 2, '1275826376', '232', '2020-11-18', '1', '2020-11-18 06:30:37', '2020-11-18 06:30:37'),
(6, 2, '256259953', '232', '2020-11-18', '1', '2020-11-18 06:32:11', '2020-11-18 06:32:11'),
(7, 2, '72595525', '232', '2020-11-18', '1', '2020-11-18 06:32:31', '2020-11-18 06:32:31'),
(8, 2, '118637626', '89', '2020-11-18', '1', '2020-11-18 06:37:25', '2020-11-18 06:37:25'),
(9, 2, '172582813', '232', '2020-11-18', '1', '2020-11-18 06:37:41', '2020-11-18 06:37:41'),
(10, 2, '1349336028', '232', '2020-11-18', '1', '2020-11-18 06:39:17', '2020-11-18 06:39:17'),
(11, 2, '852965911', '89', '2020-11-18', '1', '2020-11-18 06:41:46', '2020-11-18 06:41:46'),
(12, 2, '1457715811', '290', '2020-11-18', '1', '2020-11-18 06:45:22', '2020-11-18 06:45:22'),
(14, 2, '718401318', '232', '2020-11-18', '1', '2020-11-18 06:49:51', '2020-11-18 06:49:51'),
(16, 2, '577220272', '95', '2020-11-18', '1', '2020-11-18 07:17:06', '2020-11-18 07:17:06'),
(17, 2, '1151785968', '232', '2020-11-18', '1', '2020-11-18 08:25:23', '2020-11-18 08:25:23'),
(18, 1, '404903966', '4777', '2020-11-25', '1', '2020-11-25 07:08:30', '2020-11-25 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_money_receipt_details`
--

CREATE TABLE `student_money_receipt_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `money_receipt_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requsition_details_id` int(11) NOT NULL,
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_money_receipt_details`
--

INSERT INTO `student_money_receipt_details` (`id`, `money_receipt_id`, `requsition_details_id`, `paid`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', 10, '232', NULL, 1, '2020-11-18 06:27:34', '2020-11-18 06:27:34'),
(2, '4', 10, '232', NULL, 1, '2020-11-18 06:29:46', '2020-11-18 06:29:46'),
(3, '5', 10, '232', NULL, 1, '2020-11-18 06:30:37', '2020-11-18 06:30:37'),
(4, '6', 10, '232', NULL, 1, '2020-11-18 06:32:11', '2020-11-18 06:32:11'),
(5, '7', 10, '232', NULL, 1, '2020-11-18 06:32:31', '2020-11-18 06:32:31'),
(6, '8', 8, '89', NULL, 1, '2020-11-18 06:37:25', '2020-11-18 06:37:25'),
(7, '9', 3, '232', NULL, 1, '2020-11-18 06:37:42', '2020-11-18 06:37:42'),
(8, '10', 3, '232', NULL, 1, '2020-11-18 06:39:17', '2020-11-18 06:39:17'),
(9, '11', 3, '89', NULL, 1, '2020-11-18 06:41:47', '2020-11-18 06:41:47'),
(10, '14', 4, '232', NULL, 1, '2020-11-18 06:49:51', '2020-11-18 06:49:51'),
(11, '16', 10, '21', NULL, 1, '2020-11-18 07:17:06', '2020-11-18 07:17:06'),
(12, '16', 8, '32', NULL, 1, '2020-11-18 07:17:06', '2020-11-18 07:17:06'),
(13, '16', 6, '42', NULL, 1, '2020-11-18 07:17:07', '2020-11-18 07:17:07'),
(14, '17', 6, '232', NULL, 1, '2020-11-18 08:25:23', '2020-11-18 08:25:23'),
(15, '18', 6, '434', NULL, 1, '2020-11-25 07:08:30', '2020-11-25 07:08:30'),
(16, '18', 12, '4343', NULL, 1, '2020-11-25 07:08:30', '2020-11-25 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_requsitions`
--

CREATE TABLE `student_requsitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `payable_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_requsitions`
--

INSERT INTO `student_requsitions` (`id`, `name`, `parent_id`, `payable_amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Registration Fees / File opening', NULL, '4343', '1', '2020-11-16 09:19:31', '2020-11-16 09:19:31'),
(4, 'Service Charge / Counselling Fee', NULL, '324', '1', '2020-11-16 09:27:37', '2020-11-16 09:27:37'),
(5, 'Commission', NULL, '4234', '1', '2020-11-16 09:28:51', '2020-11-16 09:28:51'),
(6, 'Miscellaneous Expenses', NULL, '5456', '1', '2020-11-16 09:30:18', '2020-11-16 09:30:18'),
(7, 'University / College application expenses', 6, '754', '1', '2020-11-16 09:31:08', '2020-11-16 09:31:08'),
(8, 'University / College admission expenses', 6, '4325', '1', '2020-11-16 09:31:48', '2020-11-16 09:31:48'),
(9, 'DHL / Postal Expanses', 6, '7657', '1', '2020-11-16 09:32:37', '2020-11-16 09:32:37'),
(10, 'Refundable Subject to Condition', NULL, '2343', '1', '2020-11-16 09:34:57', '2020-11-16 09:34:57'),
(11, 'Accommodation Fee', 10, '7565', '1', '2020-11-16 09:36:02', '2020-11-16 09:36:02'),
(12, 'Administrative Fee', 10, '9679', '1', '2020-11-16 09:36:16', '2020-11-16 09:36:16'),
(13, 'test', NULL, '5345', '1', '2020-11-25 05:16:32', '2020-11-25 05:16:32'),
(14, 'test2', 13, '5345', '1', '2020-11-30 12:31:59', '2020-11-30 12:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_requsition_details`
--

CREATE TABLE `student_requsition_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `requsition_id` int(11) DEFAULT NULL,
  `payable_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_requsition_details`
--

INSERT INTO `student_requsition_details` (`id`, `student_id`, `requsition_id`, `payable_amount`, `paid`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '454', '23', 'It is special descount for student', 1, '2020-11-16 11:55:44', '2020-11-17 06:51:03'),
(2, 1, 4, '324', NULL, NULL, 1, '2020-11-16 11:55:44', '2020-11-25 05:53:20'),
(3, 1, 5, '44444444', NULL, NULL, 1, '2020-11-16 11:55:45', '2020-11-16 12:41:18'),
(4, 1, 6, '3434', '434', NULL, 1, '2020-11-16 11:55:46', '2020-11-25 07:08:30'),
(5, 1, 7, '434', NULL, NULL, 1, '2020-11-16 11:55:47', '2020-11-16 12:53:42'),
(6, 1, 8, '45345', NULL, NULL, 1, '2020-11-16 11:55:47', '2020-11-16 11:58:21'),
(7, 1, 9, '435345', NULL, NULL, 1, '2020-11-16 11:55:48', '2020-11-16 11:58:22'),
(8, 1, 10, '345345', '232', NULL, 1, '2020-11-16 11:55:48', '2020-11-18 06:32:31'),
(9, 1, 11, '345345', NULL, NULL, 1, '2020-11-16 11:55:49', '2020-11-16 11:58:22'),
(10, 1, 12, '345345', '4343', NULL, 1, '2020-11-16 11:55:49', '2020-11-25 07:08:31'),
(11, 2, 3, '324', '553', NULL, 1, '2020-11-17 05:49:51', '2020-11-18 06:41:47'),
(12, 2, 4, '2222', '232', NULL, 1, '2020-11-17 05:49:51', '2020-11-18 06:49:51'),
(13, 2, 5, NULL, NULL, NULL, 1, '2020-11-17 05:49:52', '2020-11-17 05:49:52'),
(14, 2, 6, '324', '274', NULL, 1, '2020-11-17 05:49:52', '2020-11-18 08:25:23'),
(15, 2, 7, NULL, NULL, NULL, 1, '2020-11-17 05:49:52', '2020-11-17 05:49:52'),
(16, 2, 8, '324', '121', NULL, 1, '2020-11-17 05:49:52', '2020-11-18 07:17:07'),
(17, 2, 9, NULL, NULL, NULL, 1, '2020-11-17 05:49:52', '2020-11-17 05:49:52'),
(18, 2, 10, '111111', '21', NULL, 1, '2020-11-17 05:49:52', '2020-11-18 07:17:07'),
(19, 2, 11, NULL, NULL, NULL, 1, '2020-11-17 05:49:52', '2020-11-17 05:49:52'),
(20, 2, 12, NULL, NULL, NULL, 1, '2020-11-17 05:49:52', '2020-11-17 05:49:52'),
(21, 3, 3, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(22, 3, 4, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(23, 3, 5, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(24, 3, 6, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(25, 3, 7, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(26, 3, 8, '9', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:52:58'),
(27, 3, 9, '94577', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:52:59'),
(28, 3, 10, '324', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(29, 3, 11, '324', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(30, 3, 12, '111111', NULL, NULL, 1, '2020-11-17 05:51:43', '2020-11-17 05:51:43'),
(31, 10, 3, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(32, 10, 4, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(33, 10, 5, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(34, 10, 6, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(35, 10, 7, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(36, 10, 8, NULL, NULL, NULL, 1, '2020-12-01 10:37:18', '2020-12-01 10:37:18'),
(37, 10, 9, NULL, NULL, NULL, 1, '2020-12-01 10:37:19', '2020-12-01 10:37:19'),
(38, 10, 10, NULL, NULL, NULL, 1, '2020-12-01 10:37:19', '2020-12-01 10:37:19'),
(39, 10, 11, NULL, NULL, NULL, 1, '2020-12-01 10:37:19', '2020-12-01 10:37:19'),
(40, 10, 12, NULL, NULL, NULL, 1, '2020-12-01 10:37:20', '2020-12-01 10:37:20'),
(41, 10, 13, NULL, NULL, NULL, 1, '2020-12-01 10:37:20', '2020-12-01 10:37:20'),
(42, 10, 14, NULL, NULL, NULL, 1, '2020-12-01 10:37:20', '2020-12-01 10:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_statuses`
--

CREATE TABLE `student_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_statuses`
--

INSERT INTO `student_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Active', 1, '2020-11-12 06:36:38', '2020-11-12 06:36:38'),
(2, 'Inactive', 1, '2020-11-12 06:36:52', '2020-11-12 06:36:52'),
(3, 'Cancelbd', 0, '2020-11-12 06:37:09', '2020-11-12 06:37:48'),
(4, 'Cancel', 1, '2020-11-12 06:37:43', '2020-11-12 06:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `student_visas`
--

CREATE TABLE `student_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_visas`
--

INSERT INTO `student_visas` (`id`, `student_id`, `place`, `issue_date`, `expire_date`, `duration`, `passport_number`, `dob`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'India', '2020-09-28', '2020-10-06', '43', '5346534764756', '2020-10-14', 1, '2020-10-16 10:12:37', '2020-10-16 10:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termination_date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminations`
--

INSERT INTO `terminations` (`id`, `employee_id`, `branch_id`, `reason`, `slug`, `notice_date`, `termination_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'ffffffffffffffffffffffsdvv fsdvsdfgdfgdf', 'termination-upol9pt0-mbhd1suq', '04/14/2020', '05/08/2020', 'fasdfc sdkvjsdvk kvsjvklskldvksv', '1', '2020-09-28 05:31:22', '2020-09-28 05:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `employee_id`, `institut`, `topic`, `board`, `grade`, `pass_year`, `duration`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Web desgin and Development BD', 1, 'creative shaper', 'Web-desgin , Web development', 'dhaka', NULL, '2020', '6month', '1', 'train-8ecml3tx-wjn6cpgz', '2020-09-20 11:41:18', '2020-09-20 11:41:18'),
(3, 'WordPress Theme Customization', 1, 'creative shaper', 'Theme development', 'dhaka', NULL, '2020', '6 month', '1', 'train-hffdkpf7-nblnq5by', '2020-09-20 11:49:53', '2020-09-20 11:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `country`, `rank`, `details`, `address`, `image`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Daffodil International University.', 3, '10', 'qwqwqwqw qw q1', 'trt rtrt rt rtr tr t1', 'university_1_1593772912.png', 'U205efecec876a7b', 1, NULL, NULL, '2020-07-03 06:23:04', '2020-07-03 10:41:52'),
(2, 'State University', 2, '12', '....', '......', NULL, 'U205f005a6d70314', 1, NULL, NULL, '2020-07-04 10:31:09', NULL),
(3, 'AIBT', 1, '5', 'This is the best university in the world', '#80,jafrabad, sara bangla road, dhaka 1207', 'university_3_1605338832.jpg', 'U205faf86cfcde78', 1, NULL, NULL, '2020-11-14 07:27:11', '2020-11-14 09:33:13'),
(4, 'AIUB', 3, '5', 'fadfdf', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, 'U205fafa48018bce', 1, NULL, NULL, '2020-11-14 09:33:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_programs`
--

CREATE TABLE `university_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_programs`
--

INSERT INTO `university_programs` (`id`, `name`, `category`, `duration`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science And Enigineering', 2, '4 Years', 'PC205eff27a896135', 1, '2020-07-03 12:42:16', '2020-07-03 13:40:24'),
(2, 'Bachelor Business Administration', 1, '4 Years', 'PC205f005ab836444', 1, '2020-07-04 10:32:24', NULL),
(3, 'Masters of Business Administration', 2, '1 Years', 'PC205f005afb94b86', 1, '2020-07-04 10:33:31', NULL),
(4, 'AAB', 2, '43', 'PC205fc77aed1c6cb', 1, '2020-12-02 11:30:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `university_program_categories`
--

CREATE TABLE `university_program_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_program_categories`
--

INSERT INTO `university_program_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Under Graduate Program', 'under-graduate-program', 1, '2020-07-02 05:31:16', '2020-07-03 05:29:30'),
(2, 'Graduate Program', 'graduate-program', 1, '2020-07-02 05:32:24', '2020-07-03 05:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `university_wise_programs`
--

CREATE TABLE `university_wise_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `total_tution_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tution_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_wise_programs`
--

INSERT INTO `university_wise_programs` (`id`, `university`, `category`, `program`, `duration`, `total_tution_fees`, `tution_fees`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 4, '44', '4', 1, '2020-07-04 10:29:39', NULL),
(2, 1, 1, 2, 2, '43', '34', 1, '2020-07-04 10:34:46', NULL),
(3, 1, 2, 3, 3, '67', '6', 1, '2020-07-04 10:52:57', NULL),
(4, 3, 2, 2, 4, '55', '3', 1, '2020-11-23 11:18:19', NULL),
(5, 3, 2, 2, 5, '65', '28', 1, '2020-11-24 06:22:24', NULL),
(6, 3, 1, 2, 43, '43', '43', 1, '2020-11-24 07:19:49', NULL),
(7, 3, 2, 1, 3, '44', '34', 1, '2020-11-24 09:10:06', NULL),
(8, 3, 2, 3, 3, '43', '5423', 1, '2020-11-24 09:28:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `image`, `role`) VALUES
(1, 'Saidul Islam Uzzal', 'uzzalbd.creative@gmail.com', NULL, '$2y$10$ANN9jJHvP5q4LWT3fQySsOIYyYc6EUEf/V2S/HSuxQG/QPn4cgv3.', 'OwWZP5kDVbtIE6XcNSbftu4bywlI355j4qBqgqor8NfvH2qciLyt7ufLvVFA', '2020-06-28 02:23:05', '2020-11-23 10:27:05', NULL, NULL, 'Super Admin'),
(2, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$f7t3J9zlQUzgksXADd2x1OBjM1MzYBhPVXm1J1brTGnqq4RYbNXxy', NULL, '2020-11-16 05:49:30', '2020-11-16 05:49:30', '209737029875', NULL, 'Super Admin'),
(3, 'Faruk Haidar Bd', 'farukhaikkjrbd@gmail.com', NULL, '$2y$10$d1Vv9IVmAbUboJpQcjr1B.80iC/6HlIJsNOT9XB56DcZoBEP6l/4q', NULL, '2020-11-27 05:51:05', '2020-11-27 05:59:05', NULL, 'uploads/employee/Employee_1601374488.jpg', 'Super Admin'),
(4, 'Faruk Haidar Bd', 'farukhaidgggbd@gmail.com', NULL, '$2y$10$nzQ70e/G96SljQBWp2AlleMKalOFMjEYLLrORYKvjJYZhAvLzh2Ke', NULL, '2020-11-27 06:01:23', '2020-11-27 06:01:23', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(5, 'Faruk Haidar Bd', 'farukhaidar37@gmail.com', NULL, '$2y$10$FxooPlumG7b33Vg3u6D5EesootjQomq0h91toTGHpTWgBIK3O9OJO', NULL, '2020-11-27 06:12:18', '2020-11-30 09:50:30', NULL, 'uploads/employee/Employee_1601374488.jpg', 'Admin'),
(6, 'Faruk Haidar Bd', 'testbd@gmail.com', NULL, '$2y$10$uoXs0j0627S/T6.Wk5QY5uZ9TfJ6sg8lMYzewIgbrmktCmzVfhA/q', NULL, '2020-11-30 06:18:26', '2020-11-30 09:50:01', NULL, NULL, 'Super Admin'),
(7, 'Faruk Haidar Bd', 'dsfsdfsdfsdf@gmail.com', NULL, '$2y$10$TZ7M1hKPuxRDcnYYp9NhpuouxMjN2zq88y6oG343JQx47AEH3hUGm', NULL, '2020-11-30 06:23:18', '2020-11-30 10:09:38', NULL, 'uploads/employee/Employee_1601374488.jpg', 'Editor'),
(8, 'Faruk Haidar', 'farukhaidar3@gmail.com', NULL, '$2y$10$Ef2JB4eADS1kf3w4cdkFiunPzg5326HS.vX0EiMrQBBf2msxCnZ7i', NULL, '2020-11-30 06:25:48', '2020-12-02 08:59:51', '2097370298', 'uploads/employee/Employee_1601374488.jpg', 'Super Admin'),
(9, 'Faruk Haidar Bd', 'ddfsdfsd@gmail.com', NULL, '$2y$10$qlIEwtumNJCwSo6aYQn7zuUyUlv1GypYFvxmFKzvQXVAfZ4vPk3ni', NULL, '2020-11-30 06:40:22', '2020-11-30 06:40:22', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(10, 'Faruk Haidar Bd', 'bappi143@gmail.com', NULL, '$2y$10$8bqYsE./iVmvVKnFMaMNGe97m4akoV2M5fypKxALmkR3ELmIKGeqG', NULL, '2020-11-30 06:58:46', '2020-11-30 06:58:46', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(11, 'Faruk Haidar Bd', 'bsb143@gmail.com', NULL, '$2y$10$9KSnZ7Xqr4/xEGT.uKSKXOffEllsSNcTVeR.F/63B0ePqHGJFiQeS', NULL, '2020-11-30 07:01:24', '2020-11-30 07:01:24', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(12, 'Faruk Haidar Bd', 'bsb898@gmail.com', NULL, '$2y$10$OToE4rP2.cSJ2k6f/C7vTuL3fDfaPc1PyXPAAR2yo3LLsc1oemlaa', NULL, '2020-11-30 07:03:59', '2020-11-30 07:03:59', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(13, 'Faruk Haidar Bd', 'okkktest@gmail.com', NULL, '$2y$10$QhQbnpDuOUP47RADSXbs1uRb2Kj8Rerp/pMe72Uo78aupJ7fscaZ.', NULL, '2020-11-30 07:05:34', '2020-11-30 07:05:34', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(14, 'Faruk Haidar Bd', 'finetest@gmail.com', NULL, '$2y$10$sjOqqbk/n6VSg6scZaAJtubVw5sPnDCKPOQKGMmDyoc65ECTY8GLy', NULL, '2020-11-30 07:08:40', '2020-11-30 07:08:40', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(15, 'Faruk Haidar', 'farukhaidards@gmail.com', NULL, '$2y$10$5jXxLHAlUmm.cnH38iDffOFBedgW30PR9imErgW5q4dPxeoikJsQe', NULL, '2020-11-30 09:54:23', '2020-12-02 08:15:49', NULL, 'uploads/employee/Employee_1601374517.jpg', 'Super Admin'),
(16, 'faruk haidar', 'farukhaidarbd@gmail.com', NULL, '$2y$10$okJrZ0nS7JIusD1xXjGXY.PYktPXLfulAhWGPftP8QsHnfd8ORlaO', NULL, '2020-12-02 09:31:33', '2020-12-03 05:29:52', '01949754545', NULL, 'Editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_classes`
--
ALTER TABLE `account_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_groups`
--
ALTER TABLE `account_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_details`
--
ALTER TABLE `ad_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_lists`
--
ALTER TABLE `call_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_satisfaction_questions`
--
ALTER TABLE `client_satisfaction_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_satisfaction_responses`
--
ALTER TABLE `client_satisfaction_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_resolutions`
--
ALTER TABLE `company_resolutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counsellor_generates`
--
ALTER TABLE `counsellor_generates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_details`
--
ALTER TABLE `deposit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_attendances_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_attendances_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_leaves_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_leaves_leave_id_foreign` (`leave_id`);

--
-- Indexes for table `emp_natures`
--
ALTER TABLE `emp_natures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_statuses`
--
ALTER TABLE `emp_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_management`
--
ALTER TABLE `event_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl_accounts`
--
ALTER TABLE `gl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_details`
--
ALTER TABLE `installment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_details`
--
ALTER TABLE `journal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriage_statuses`
--
ALTER TABLE `marriage_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marriage_statuses_name_unique` (`name`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_types`
--
ALTER TABLE `pay_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provident_funds`
--
ALTER TABLE `provident_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignations`
--
ALTER TABLE `resignations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resignations_employee_id_foreign` (`employee_id`),
  ADD KEY `resignations_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_scales`
--
ALTER TABLE `salary_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_strings`
--
ALTER TABLE `salary_strings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_experiances`
--
ALTER TABLE `student_experiances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_money_receipts`
--
ALTER TABLE `student_money_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_money_receipt_details`
--
ALTER TABLE `student_money_receipt_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requsitions`
--
ALTER TABLE `student_requsitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requsition_details`
--
ALTER TABLE `student_requsition_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_statuses`
--
ALTER TABLE `student_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_visas`
--
ALTER TABLE `student_visas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terminations_employee_id_foreign` (`employee_id`),
  ADD KEY `terminations_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_programs`
--
ALTER TABLE `university_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_wise_programs`
--
ALTER TABLE `university_wise_programs`
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
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_classes`
--
ALTER TABLE `account_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ad_details`
--
ALTER TABLE `ad_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `call_lists`
--
ALTER TABLE `call_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_satisfaction_questions`
--
ALTER TABLE `client_satisfaction_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_satisfaction_responses`
--
ALTER TABLE `client_satisfaction_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_resolutions`
--
ALTER TABLE `company_resolutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `counsellor_generates`
--
ALTER TABLE `counsellor_generates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposit_details`
--
ALTER TABLE `deposit_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_management`
--
ALTER TABLE `event_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gl_accounts`
--
ALTER TABLE `gl_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `installment_details`
--
ALTER TABLE `installment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `journal_details`
--
ALTER TABLE `journal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_documents`
--
ALTER TABLE `student_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_experiances`
--
ALTER TABLE `student_experiances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_money_receipts`
--
ALTER TABLE `student_money_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_money_receipt_details`
--
ALTER TABLE `student_money_receipt_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_requsitions`
--
ALTER TABLE `student_requsitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_requsition_details`
--
ALTER TABLE `student_requsition_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `student_statuses`
--
ALTER TABLE `student_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `university_programs`
--
ALTER TABLE `university_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `university_wise_programs`
--
ALTER TABLE `university_wise_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
