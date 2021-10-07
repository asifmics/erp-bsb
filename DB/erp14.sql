-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 11:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
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
(1, 'Non-Current Assets', 'Assets', '2020-11-07 05:35:11', '2020-12-08 20:29:58'),
(2, 'Current Assets', 'Assets', '2020-12-08 17:49:05', '2020-12-08 18:05:26'),
(3, 'Non-Current Liabilities', 'Liabilities', '2020-12-08 20:30:18', '2020-12-08 20:30:18'),
(4, 'Current Liabilities', 'Liabilities', '2020-12-08 20:30:33', '2020-12-08 20:30:33'),
(5, 'Owner\'s Equity', 'Liabilities', '2020-12-08 20:32:15', '2020-12-08 20:32:15'),
(6, 'Direct Income', 'Income', '2020-12-09 15:23:15', '2020-12-09 15:33:42'),
(7, 'Indirect Income', 'Income', '2020-12-09 15:23:42', '2020-12-09 15:41:10'),
(8, 'Direct Expenses', 'Expense', '2020-12-09 15:24:10', '2020-12-09 15:34:23'),
(10, 'Indirect Expenses', 'Expense', '2020-12-09 15:33:58', '2020-12-09 15:41:25');

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

--
-- Dumping data for table `account_groups`
--

INSERT INTO `account_groups` (`id`, `name`, `parent_id`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'Fixed Assets', NULL, 1, '2020-12-08 20:33:12', '2020-12-08 20:33:12'),
(2, 'Inter Company Loan', NULL, 2, '2020-12-08 20:34:00', '2020-12-08 20:34:00'),
(3, 'Advances,Deposits and Pre-payments', NULL, 2, '2020-12-08 20:34:25', '2020-12-08 20:34:25'),
(4, 'Cash Account', NULL, 2, '2020-12-08 20:36:28', '2020-12-08 20:36:28'),
(5, 'Bank Account', NULL, 2, '2020-12-08 20:36:55', '2020-12-08 20:36:55'),
(6, 'Savings Bond', NULL, 2, '2020-12-08 20:37:29', '2020-12-08 20:37:29'),
(7, 'Other Assets', NULL, 2, '2020-12-08 20:37:43', '2020-12-08 20:37:43'),
(8, 'Intangible  Assets', NULL, 1, '2020-12-08 20:39:35', '2020-12-08 20:39:35'),
(9, 'Business Capital', NULL, 5, '2020-12-08 20:40:42', '2020-12-08 20:40:42'),
(10, 'Retained Earnings', NULL, 5, '2020-12-08 20:41:01', '2020-12-08 20:41:01'),
(11, 'Long Term Loan', NULL, 3, '2020-12-08 20:41:14', '2020-12-08 20:41:14'),
(12, 'Accounts Payables', NULL, 4, '2020-12-08 20:41:30', '2020-12-08 20:41:30'),
(13, 'Short Term Loan', NULL, 4, '2020-12-08 20:41:42', '2020-12-08 20:41:42'),
(14, 'Student Advance', NULL, 4, '2020-12-08 20:42:22', '2020-12-08 20:42:22'),
(15, 'Payable for Expenses', NULL, 4, '2020-12-08 20:42:35', '2020-12-08 20:42:35'),
(16, 'In Transit Income', NULL, 4, '2020-12-08 20:42:51', '2020-12-08 20:42:51'),
(17, 'Other Liabilities', NULL, 4, '2020-12-08 20:43:10', '2020-12-08 20:43:10'),
(18, 'Advance : Assets Purchases', 3, 2, '2020-12-08 20:53:19', '2020-12-08 20:54:38'),
(19, 'Advance : Expenses', 3, 2, '2020-12-08 20:54:00', '2020-12-08 20:54:00'),
(20, 'Advance : Salary & Allowance', 3, 2, '2020-12-08 20:54:23', '2020-12-08 20:54:23'),
(21, 'Deposit : Security Deposit', 3, 2, '2020-12-08 20:55:13', '2020-12-08 20:55:13'),
(22, 'Advance : Others', 3, 2, '2020-12-08 20:55:42', '2020-12-08 20:55:42'),
(23, 'Advance : Executive Director', 3, 2, '2020-12-08 20:56:09', '2020-12-08 20:56:09'),
(24, 'Loan - Chief Executive', 13, 4, '2020-12-08 20:57:29', '2020-12-08 20:57:29'),
(25, 'Advance : Credit Card', 3, 2, '2020-12-09 15:20:39', '2020-12-09 15:20:39'),
(26, 'Commission', NULL, 6, '2020-12-09 15:25:52', '2020-12-09 15:38:27'),
(27, 'Revenue', NULL, 6, '2020-12-09 15:35:10', '2020-12-09 15:35:10'),
(28, 'Office & Administrative Expenses', NULL, 10, '2020-12-09 15:35:30', '2020-12-09 15:43:45'),
(29, 'Cost of Revenue', NULL, 8, '2020-12-09 15:35:48', '2020-12-09 15:35:48'),
(30, 'Other Income', NULL, 7, '2020-12-09 15:39:16', '2020-12-09 15:42:35'),
(31, 'Financial Expenses', NULL, 10, '2020-12-09 15:44:01', '2020-12-09 15:44:01'),
(32, 'Bank Interest', 30, 7, '2020-12-09 15:46:12', '2020-12-09 15:46:12'),
(33, 'Commission : Counselor', 29, 8, '2020-12-09 17:30:53', '2020-12-09 17:30:53'),
(34, 'Commission : Agent', 29, 8, '2020-12-09 17:31:22', '2020-12-09 17:33:03'),
(35, 'Commission : Assistant Counselor', 29, 8, '2020-12-09 17:31:51', '2020-12-09 17:33:14'),
(36, 'Bank Charge', 28, 10, '2020-12-09 17:39:23', '2020-12-09 17:39:23');

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
(4, 'test', 'test@gmail.com', '93485034958', NULL, 1, '2020-11-30 05:55:04', '2020-11-30 05:55:04'),
(5, 'faruk haidar', 'farukhaidar@gmail.com', '03251632631', NULL, 1, '2020-12-14 16:11:12', '2020-12-14 16:11:12');

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

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `account_name`, `bank_name`, `account_number`, `bank_address`, `account_gl_id`, `charge_gl_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'JANATA BANK LIMITED', 'JANATA BANK LIMITED', '0100215853921', 'Gulshan  Circle -2, Corporate', 31, 50, 1, '2020-12-08 17:43:39', '2020-12-18 11:57:51'),
(2, 'SONALI BANK LIMITED', 'SONALI BANK LIMITED', '0116402000408', '1164-Gulshan New North Circle Bangabandhu Dhaka Central', 32, 51, 1, '2020-12-08 17:54:08', '2020-12-18 11:58:16');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `banch_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `departments`, `status`, `created_at`, `updated_at`, `banch_code`) VALUES
(1, 'Dhanmondi', 'HR', 1, NULL, NULL, '001'),
(2, 'Mohammodpur', 'Marketing', 1, NULL, NULL, '002');

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
-- Table structure for table `certification_agents`
--

CREATE TABLE `certification_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, 'what is your favorite color?', 'question-dpkrz22e-vphgnxjl', 1, 1, '2020-10-04 07:26:46', '2020-10-04 07:26:46'),
(6, 'What is your name?', 'question-lxznh2ly-is5jdo7g', 1, 1, '2021-01-15 06:15:15', '2021-01-15 06:15:15');

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
(4, '7', NULL, '1', '2020-11-16 06:30:37', '2020-11-16 06:30:37'),
(5, '9', NULL, '1', '2020-11-23 19:54:16', '2020-11-23 19:54:16'),
(6, '8', '5', '1', '2020-11-23 19:54:39', '2020-11-23 19:54:39');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `flag`, `slug`, `status`, `reg_fees`, `created_at`, `updated_at`, `country_code`) VALUES
(1, 'U.S.A', 'country_1_1593599647.jpg', 'usa', '1', 4234, '2020-07-01 10:34:07', '2020-07-01 10:34:07', '001'),
(2, 'U.K', 'country_2_1593599687.jpg', 'uk', '1', 524523, '2020-07-01 10:34:47', '2020-07-04 12:36:34', '002'),
(3, 'Bangladesh', 'country_3_1593599687', 'bangladesh', '1', 2222, '2020-07-01 11:10:13', '2020-11-24 07:04:52', '003');

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
(1, 'hr', 'Human Resource', 1, NULL, '2020-11-30 21:39:45'),
(2, 'marketing', 'Marketing', 0, NULL, '2020-10-04 04:58:47'),
(3, 'dept-z8vndlho-4qhbji5s', 'Accounts & Finance', 1, '2020-11-25 17:55:54', '2020-11-25 17:55:54'),
(4, 'dept-b6aonvoh-uz20xqeg', 'Administration', 1, '2020-11-25 17:56:08', '2020-11-25 17:56:08'),
(5, 'dept-qznouwzi-dh6vhpdb', 'Counseling', 1, '2020-11-25 17:56:42', '2020-11-25 17:56:42'),
(6, 'dept-mdr26dbf-2uanc45q', 'Student Management', 1, '2020-11-25 18:00:49', '2020-11-30 21:48:41'),
(7, 'dept-hdateqee-gyepix5o', 'File Section', 0, '2020-11-25 18:09:21', '2020-11-30 21:40:29'),
(8, 'dept-ladsbcgk-ak0sjs59', 'International Communication', 1, '2020-11-25 18:10:02', '2020-11-25 18:10:02'),
(9, 'dept-nvxonite-0ll0elth', 'International Admission', 1, '2020-11-25 18:10:21', '2020-11-25 18:10:21'),
(10, 'dept-hu6ddhho-ncig4arj', 'Visa Processing', 1, '2020-11-25 18:11:03', '2020-11-25 18:11:03'),
(11, 'dept-22kkehxq-qaupwih3', 'Marketing', 1, '2020-11-25 18:11:29', '2020-11-25 18:11:29'),
(12, 'dept-m2i7hi3s-jbhwiorb', 'Travels & Tours', 1, '2020-11-25 18:12:00', '2020-11-25 18:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) NOT NULL,
  `referance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_of` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Counselor', 'counsellor', 1, '2020-12-14 09:31:42', '2020-12-14 20:31:42'),
(3, 'Front Desk Officer', 'receptionist', 1, '2020-11-25 06:32:22', '2020-11-25 17:32:22'),
(4, 'Web Developer', 'desg-rmk5ftrg-cle919nk', 1, '2020-11-30 10:49:45', '2020-11-30 21:49:45'),
(5, 'Head of Visa Section', 'desg-g3xmoxum-o2r2j80d', 1, '2020-11-25 06:53:04', '2020-11-25 17:53:04'),
(10, 'Manager', 'desg-sjwnqduu-ezefrczv', 1, '2020-11-24 22:49:02', '2020-11-24 22:49:02'),
(11, 'Assistant Manager', 'desg-w8e2ttzj-zhz9io26', 1, '2020-11-25 17:27:36', '2020-11-25 17:27:36'),
(12, 'Director', 'desg-re078ilx-o5bvuf10', 1, '2020-11-25 17:28:50', '2020-11-25 17:28:50'),
(13, 'Visa Consultant', 'desg-jmh5tved-kp4fgnyk', 1, '2020-11-25 17:29:51', '2020-11-25 17:29:51'),
(14, 'MLLS', 'desg-zkkoebcl-nwl6cbrb', 1, '2020-11-25 17:53:30', '2020-11-25 17:53:30'),
(15, 'Accounts Officer', 'desg-wtdfo3mp-fhuykvbr', 1, '2020-11-25 17:54:17', '2020-11-25 17:54:17'),
(16, 'Accounts Officer', 'desg-xrtbqu5o-cnpawjzl', 0, '2020-11-28 10:04:44', '2020-11-28 21:04:44'),
(17, 'Adviser - Immigration', 'desg-whjfznbo-p0feodwh', 1, '2020-11-25 17:54:57', '2020-11-25 17:54:57'),
(18, 'Senior Executive', 'desg-czhgjcrd-fztib8v6', 1, '2020-11-30 10:50:37', '2020-11-30 21:50:37'),
(19, 'Asst. Counselor', 'desg-xzy7uayx-e416lr0g', 1, '2020-11-28 21:17:05', '2020-11-28 21:17:05'),
(20, 'Office Assistant', 'desg-whfuijqq-kxow1whc', 1, '2020-11-30 21:51:09', '2020-11-30 21:51:09'),
(21, 'Security Guard', 'desg-ldonxybz-fjym42bc', 1, '2020-11-30 21:51:34', '2020-11-30 21:51:34'),
(22, 'Executive', 'desg-2ssrslkm-occi6c7b', 1, '2020-11-30 21:51:53', '2020-11-30 21:51:53');

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
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `employees` (`id`, `slug`, `id_no`, `name`, `shift_id`, `designation_id`, `joining_date`, `maturity_age`, `eligible_status`, `father_name`, `mother_name`, `religion`, `dob`, `nid`, `tin`, `nationality`, `blood_group`, `marital_status`, `gender`, `present_address`, `permanent_address`, `salary_scale`, `account_no`, `branch`, `department`, `image`, `email`, `phone`, `whatsapp`, `commission_type`, `commission`, `emp_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kasjdhsjf', '546556876', 'Faruk', 2, 4, '1970-01-01', '1970-01-01', 'Yes', 'towhid mia', 'ojifa begum', 'Islam', '12/12/1996', NULL, NULL, 'Islam', 'A(-ve)', 'Divorced', 'Male', '27skfjkshfsdf', 'fsdfsd dfdb d', '1', '432425523', '2', '1', 'uploads/employee/Employee_1600602872.jpg', 'farukhaidar3@gmail.com', '2097370298', '013656296626', NULL, NULL, 2, 1, NULL, '2020-11-16 09:17:13'),
(2, 'emp-mdt2uehg-fnpqczan', '745937555', 'Rakib khan', NULL, 3, '1970-01-01', '1970-01-01', 'No', 'Towhid Mia BD', 'Khairun Nesa', 'Islam', '01/13/1993', NULL, NULL, 'Bangladesh', 'A(+ve)', 'Single', 'Male', '#80,jafrabad, sara bangla road, dhaka 1207', '26/1 West Jafrabad, Mohammodpur', '2', '2147483647', '1', '1', 'uploads/employee/Employee_1601374488.jpg', 'receptionist@gmail.com', '0203254651', '0203254651', NULL, NULL, 1, 1, '2020-09-19 05:31:30', '2021-01-29 05:35:00'),
(3, 'emp-kbpt8mit-ypbefuev', '745937533', 'Faruk Haidar', 2, 2, '2020-10-13', '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/17/1992', NULL, NULL, 'Bangladesh', 'B(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', '1', '6456346246345', '1', '2', 'uploads/employee/Employee_1601374517.jpg', 'counsellor@gmail.com', NULL, NULL, NULL, NULL, 3, 1, '2020-09-19 05:34:12', '2020-10-13 05:25:03'),
(4, 'emp-ybh33rkl-hvtrrzms', '745937534', 'Faruk Haidar BD', 3, 4, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '12/30/1992', NULL, NULL, 'Bangladesh', 'A(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 dhanmondi dhaka 1209', '1', '56456456454353', '2', '2', 'uploads/employee/Employee_1600493763.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-09-19 05:36:03', '2020-09-20 05:23:46'),
(5, 'emp-axrh0omo-svmwz9gj', '7459375dsd', 'Faruk Haidar', 3, 1, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/02/2020', NULL, NULL, 'Bangladesh', 'A(-ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', '1', NULL, '2', '1', 'uploads/employee/Employee_1600603067.jpg', NULL, NULL, NULL, 'fixed', '2000', 1, 0, '2020-09-20 11:56:01', '2020-11-25 18:16:36'),
(6, 'emp-7pd713at-pqfmsv1z', '7459375', 'Faruk Haidar BD', 2, 1, NULL, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/09/2020', NULL, NULL, 'Bangladesh', 'B(-ve)', 'Married', 'Male', 'fsdv vfbd dbgnfn', 'dgdfb  fgb  f', '1', NULL, '1', '1', 'uploads/employee/Employee_1601448071.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-09-30 06:41:11', '2020-09-30 06:41:12'),
(7, 'emp-rbggr4lg-vsgftgku', '74593750k', 'Faruk Haidar', 2, 5, NULL, '1970-01-01', 'No', 'Nasir Uddin', 'Ojefa Akter', 'Islam', '01/07/1993', NULL, NULL, 'Bangladesh', 'A(-ve)', 'Married', 'Male', 'kkkkkk ijhk khkj k', 'jkgk jhgmhmhm', '1', NULL, '2', '2', 'uploads/employee/Employee_1601448484.jpg', NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-09-30 06:48:04', '2020-09-30 06:48:04'),
(8, 'emp-vlju3jee-klis0w1g', '5465568764pl', 'Faruk Haidar BD', 3, 5, NULL, '2020-09-11', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/10/2020', NULL, NULL, 'Bangladesh', 'B(+ve)', 'Divorced', 'Male', 'dsvsdfgsd', 'v sdvsdv sdfvdf', '1', NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-09-30 06:50:13', '2020-11-25 18:16:17'),
(9, 'emp-zyy2tirg-fcecw2yt', '7459375dd', 'zaahira Akter', 2, 1, '2020-10-13', '2020-11-07', 'No', 'Nasir Uddin', 'Khairun Nesa', 'Islam', '08/20/1994', NULL, NULL, 'Bangladesh', 'AB(+ve)', 'Single', 'Female', 'fdsfsd', 'fsdfsdfsfsfsf', '1', NULL, '1', '1', 'uploads/employee/Employee_1602566868.png', NULL, NULL, NULL, NULL, NULL, 2, 0, '2020-10-13 05:27:48', '2020-11-25 18:16:07'),
(10, 'emp-evfbpaem-lql7cxtf', 'BSB00301', 'Mahmuda Akter', 3, 10, '2020-11-25', '2020-10-01', 'No', 'Late Md. Abdul Jabbar Khan', 'Anwara Begum', 'Islam', '04/01/2020', NULL, NULL, 'Bangladesh', 'A(-ve)', 'Married', 'Female', 'Sector # 5, Uttara, Dhaka', 'Vhaluka, Mymensingh', NULL, NULL, NULL, NULL, NULL, 'smritysmuct@gmail.com', '01770-035632', NULL, NULL, NULL, 1, 1, '2020-11-24 22:52:05', '2020-11-25 18:37:12'),
(11, 'emp-0fplqnan-gsjn4bio', 'CAM-2967', 'Bidhan Biswas', 3, 18, '2020-11-28', '1970-01-01', 'No', 'Bimal Biswas', 'Shabita Biswas', 'Hindu', '11/28/2020', NULL, NULL, 'Bangladeshi', 'O(+ve)', 'Married', 'Male', 'Akata Sarak, Nurer Chala, Notun Bazar, Gulshan.', 'Vill :- B-Malonchi, Post :- Mourat, P.S. :- Pangsha, Dist. :- Rajbari.', NULL, NULL, NULL, NULL, 'uploads/employee/Employee_1606558461.jpg', NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-11-28 21:14:21', '2020-11-28 21:21:05'),
(12, 'emp-a7o9euv0-halxsrke', 'BSB00269', 'M Abdur Rahaman khan', 3, 2, '1999-07-27', '2030-04-11', 'No', 'Safez ali khan', 'Monurara Begum', 'Islam', '10/08/2020', NULL, NULL, 'Bangladeshi', 'A(+ve)', 'Married', 'Male', 'notun bazzar dhaka', 'Khulna', '0', NULL, NULL, NULL, NULL, 'counsellor2@gmail.com', NULL, NULL, NULL, NULL, 1, 1, '2020-11-30 19:46:30', '2021-01-14 08:52:19');

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
(83, 8, 2, '2020-11-05', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-05 12:34:08', '2020-11-05 12:34:47'),
(84, 2, 1, '2020-11-12', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-11-23 17:50:26', '2020-11-23 17:50:51'),
(85, 3, 1, '2020-11-12', '23:00:00', '6:00:00', 'Present', NULL, NULL, 1, '2020-11-23 17:50:26', '2020-11-23 17:50:42'),
(86, 6, 1, '2020-11-12', '19:00:00', '6:00:00', 'Present', NULL, NULL, 1, '2020-11-23 17:50:26', '2020-11-23 17:50:42'),
(87, 9, 1, '2020-11-12', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-11-23 17:50:26', '2020-11-23 17:51:53'),
(88, 2, 1, '2020-11-23', '10:00 PM', '4:00 AM', 'Present', NULL, NULL, 1, '2020-11-23 19:31:54', '2020-11-23 19:31:54'),
(89, 3, 1, '2020-11-23', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-11-23 19:31:54', '2020-11-23 19:31:54'),
(90, 6, 1, '2020-11-23', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-11-23 19:31:54', '2020-11-23 19:32:02'),
(91, 9, 1, '2020-11-23', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-11-23 19:31:54', '2020-11-23 19:31:54'),
(92, 4, 2, '2020-12-11', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-24 16:36:35', '2020-11-24 16:36:46'),
(93, 5, 2, '2020-12-11', '12:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-24 16:36:35', '2020-11-24 16:36:46'),
(94, 7, 2, '2020-12-11', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-11-24 16:36:35', '2020-11-24 16:36:53'),
(95, 8, 2, '2020-12-11', '10:00:00', '19:00:00', 'Present', NULL, NULL, 1, '2020-11-24 16:36:35', '2020-11-24 16:36:46'),
(96, 2, 1, '2020-07-09', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-12-19 10:40:00', '2020-12-19 10:40:00'),
(97, 3, 1, '2020-07-09', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-12-19 10:40:00', '2020-12-19 10:40:00'),
(98, 6, 1, '2020-07-09', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2020-12-19 10:40:00', '2020-12-19 10:40:00'),
(99, 2, 1, '2021-01-06', NULL, NULL, 'Absent', NULL, NULL, 1, '2021-01-06 10:29:12', '2021-01-06 10:29:19'),
(100, 3, 1, '2021-01-06', '7:00 PM', '6:00 AM', 'Present', NULL, NULL, 1, '2021-01-06 10:29:12', '2021-01-06 10:29:12'),
(101, 6, 1, '2021-01-06', NULL, NULL, 'Absent', NULL, NULL, 1, '2021-01-06 10:29:12', '2021-01-06 10:29:21');

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
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` double(8,2) DEFAULT NULL,
  `group_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gl_accounts`
--

INSERT INTO `gl_accounts` (`id`, `code`, `name`, `opening_balance`, `group_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Social Islami Bank Ltd., A/C No.04113600297', NULL, 5, 1, NULL, '2020-12-09 17:17:39'),
(2, NULL, 'Cash in Hand', NULL, 4, 1, NULL, '2020-12-08 20:45:06'),
(3, '12002', 'Land & Building', 12000.00, 1, 1, '2020-12-08 20:45:48', '2020-12-18 12:04:45'),
(4, '120', 'Computer & Equipment', 120.00, 1, 1, '2020-12-08 20:46:08', '2021-01-11 09:53:37'),
(5, NULL, 'Cambrian School & College', NULL, 2, 1, '2020-12-08 20:47:02', '2020-12-08 20:47:02'),
(6, NULL, 'Cambrian College Chattogram', NULL, 2, 1, '2020-12-08 20:47:38', '2020-12-08 20:47:38'),
(7, NULL, 'Metropolition School & College', NULL, 2, 1, '2020-12-08 20:48:07', '2020-12-08 20:48:07'),
(8, NULL, 'Cambrian International College of Avaiation', NULL, 2, 1, '2020-12-08 20:48:56', '2020-12-08 20:48:56'),
(9, NULL, 'Daily Prothom Alo', NULL, 12, 1, '2020-12-08 20:58:45', '2020-12-08 20:58:45'),
(10, NULL, 'Daily Amedersomoy', NULL, 12, 1, '2020-12-08 20:59:46', '2020-12-08 20:59:46'),
(11, NULL, 'Daily Amerdesh', NULL, 12, 1, '2020-12-08 21:00:11', '2020-12-08 21:00:11'),
(12, NULL, 'Daily Bhorerdak', NULL, 12, 1, '2020-12-08 21:00:30', '2020-12-08 21:00:30'),
(13, NULL, 'Daily Destiny', NULL, 12, 1, '2020-12-08 21:00:54', '2020-12-08 21:00:54'),
(14, NULL, 'Daily Jaijai Din', NULL, 12, 1, '2020-12-08 21:01:08', '2020-12-08 21:01:08'),
(15, NULL, 'Daily Kalerkanto', NULL, 12, 1, '2020-12-08 21:01:19', '2020-12-08 21:01:19'),
(16, NULL, 'Daily Manab Konto', NULL, 12, 1, '2020-12-08 21:01:31', '2020-12-08 21:01:31'),
(17, NULL, 'Daily Nayadegonta', NULL, 12, 1, '2020-12-08 21:01:44', '2020-12-08 21:01:44'),
(18, NULL, 'Daily Somokal', NULL, 12, 1, '2020-12-08 21:01:57', '2020-12-08 21:01:57'),
(19, NULL, 'Nurul Islam Bhuiyan', NULL, 19, 1, '2020-12-08 21:02:30', '2020-12-08 21:02:30'),
(20, NULL, 'Adv. Mahbubur Rahman', NULL, 19, 1, '2020-12-08 21:02:49', '2020-12-08 21:02:49'),
(21, NULL, 'Osman Ali Babu', NULL, 19, 1, '2020-12-08 21:03:04', '2020-12-08 21:03:04'),
(22, NULL, 'Software', NULL, 8, 1, '2020-12-09 15:12:58', '2020-12-09 15:12:58'),
(24, NULL, 'Bank Interest : Sonali Bank Ltd.,  A/C No.0116402000408', NULL, 32, 1, '2020-12-09 15:47:15', '2020-12-09 15:47:15'),
(25, NULL, 'Bank Interest : Janata Bank Ltd., A/C No.0100215853921', NULL, 32, 1, '2020-12-09 15:47:41', '2020-12-09 15:47:41'),
(26, NULL, 'Bank Interest : Social Islami Bank Ltd., A/C No.04113600297', NULL, 32, 1, '2020-12-09 15:48:06', '2020-12-09 15:48:06'),
(27, NULL, 'Bank Interest : The City Bank Ltd., A/C No. 1421709678001', NULL, 32, 1, '2020-12-09 15:48:29', '2020-12-09 15:48:29'),
(28, NULL, 'Bank Interest : Standard Chartered Bank, A/C No. 01-1270902-01', NULL, 32, 1, '2020-12-09 15:50:45', '2020-12-09 15:52:55'),
(29, NULL, 'The City Bank Ltd., A/C No. 1421709678001', NULL, 5, 1, '2020-12-09 17:18:07', '2020-12-09 17:18:07'),
(30, NULL, 'Standard Chartered Bank, A/C No. 01-1270902-01', NULL, 5, 1, '2020-12-09 17:18:29', '2020-12-09 17:19:55'),
(31, NULL, 'Janata Bank Ltd., A/C No.0100215853921', NULL, 5, 1, '2020-12-09 17:18:43', '2020-12-09 17:18:43'),
(32, NULL, 'Sonali Bank Ltd.,  A/C No.0116402000408', NULL, 5, 1, '2020-12-09 17:18:57', '2020-12-09 17:18:57'),
(33, NULL, 'Cleaning Expenses', NULL, 28, 1, '2020-12-09 17:20:58', '2020-12-09 17:20:58'),
(34, NULL, 'Insurance Premium', NULL, 28, 1, '2020-12-09 17:21:15', '2020-12-09 17:21:15'),
(35, NULL, 'Postage & Courier', NULL, 28, 1, '2020-12-09 17:21:32', '2020-12-09 17:21:32'),
(36, NULL, 'Conveyance', NULL, 28, 1, '2020-12-09 17:22:07', '2020-12-09 17:22:07'),
(37, NULL, 'Medical Expenses', NULL, 28, 1, '2020-12-09 17:22:57', '2020-12-09 17:22:57'),
(38, NULL, 'News Paper, Books & Periodicals', NULL, 28, 1, '2020-12-09 17:23:30', '2020-12-09 17:23:30'),
(39, NULL, 'Commission : International', NULL, 26, 1, '2020-12-09 17:25:31', '2020-12-09 17:25:31'),
(40, NULL, 'Commission : Local', NULL, 26, 1, '2020-12-09 17:25:50', '2020-12-09 17:25:50'),
(41, NULL, 'Service Charge', NULL, 27, 1, '2020-12-09 17:26:47', '2020-12-09 17:26:47'),
(42, NULL, 'Fee : BSB Language Club', NULL, 27, 1, '2020-12-09 17:27:49', '2020-12-09 17:27:49'),
(43, NULL, 'Bank Interest Payment : Standard Chartered Bank ( SME BILL)', NULL, 31, 1, '2020-12-09 17:35:05', '2020-12-09 17:35:05'),
(44, NULL, 'Bank Interest Payment : Standard Chartered Bank, ( LAP )', NULL, 31, 1, '2020-12-09 17:35:42', '2020-12-09 17:35:42'),
(45, NULL, 'Standard Chartered Bank : SME BILL', NULL, 11, 1, '2020-12-09 17:37:27', '2020-12-09 17:37:27'),
(46, NULL, 'Standard Chartered Bank : LAP', NULL, 11, 1, '2020-12-09 17:37:42', '2020-12-09 17:37:42'),
(47, NULL, 'Bank Charge : The City Bank Ltd., A/C No. 1421709678001', NULL, 36, 1, '2020-12-09 17:40:05', '2020-12-09 17:40:05'),
(48, NULL, 'Bank Charge : Social Islami Bank Ltd., A/C No.04113600297', NULL, 36, 1, '2020-12-09 17:40:30', '2020-12-09 17:40:30'),
(49, NULL, 'Bank Charge  :Standard Chartered Bank, A/C No. 01-1270902-01', NULL, 36, 1, '2020-12-09 17:41:17', '2020-12-09 17:41:17'),
(50, NULL, 'Bank Charge : Janata Bank Ltd., A/C No.0100215853921', NULL, 36, 1, '2020-12-09 17:41:36', '2020-12-09 17:41:36'),
(51, NULL, 'Bank Charge : Sonali Bank Ltd.,  A/C No.0116402000408', NULL, 36, 1, '2020-12-09 17:44:08', '2020-12-09 17:44:08'),
(52, NULL, 'Ebrayetul Hasan : 229', NULL, 20, 1, '2020-12-09 17:45:49', '2020-12-09 17:45:49'),
(53, NULL, 'Rajib Hsan Raju : 253', NULL, 20, 1, '2020-12-09 17:46:10', '2020-12-09 17:46:10'),
(54, NULL, 'Abdur Rahman Khan : 269', NULL, 20, 1, '2020-12-09 17:47:12', '2020-12-09 17:47:12'),
(55, NULL, 'Murshidul Hasnat : CAM-3047', NULL, 25, 1, '2020-12-09 17:48:42', '2020-12-09 17:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `hear_bsbs`
--

CREATE TABLE `hear_bsbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hear_bsbs`
--

INSERT INTO `hear_bsbs` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Newspaper', 1, '2021-01-09 11:06:37', '2021-01-09 11:06:37'),
(2, 'Facebook', 1, '2021-01-09 12:16:33', '2021-01-09 12:39:35'),
(3, 'Twitter', 1, '2021-01-09 12:16:41', '2021-01-09 12:16:41'),
(4, 'Linkedin', 1, '2021-01-09 12:16:52', '2021-01-09 12:16:52');

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
-- Table structure for table `international_admissions`
--

CREATE TABLE `international_admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_o_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_particulars` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_method` int(11) DEFAULT NULL,
  `card_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_agents`
--

CREATE TABLE `international_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `valid_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `contact_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `certification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_student_visas`
--

CREATE TABLE `international_student_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_letter_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_on_pro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overseas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notary_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_submit_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laps` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `gl_date`, `referance`, `src_referance`, `memo`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2020-10-17', 'fsdfsd', 'fsdfsdf', 'fdsfsdfsdfsdfsdfsdfsdf', NULL, NULL, '2020-10-28 09:07:35', '2020-10-28 09:07:35'),
(4, '2020-09-30', 'okkkk', 'okkk', 'dfgdfgdfgdfgdfgdfg', NULL, NULL, '2020-10-28 09:11:33', '2020-10-28 09:11:33'),
(5, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', NULL, NULL, '2020-10-28 09:13:58', '2020-10-28 09:13:58'),
(6, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', NULL, NULL, '2020-10-28 09:15:01', '2020-10-28 09:15:01'),
(7, '2020-10-21', 'okkkk', 'okkk', 'dfsdgsfgsdg', NULL, NULL, '2020-10-28 09:15:38', '2020-10-28 09:15:38'),
(10, '2020-10-17', 'faruk', 'faruk', 'cnvnghngh', NULL, NULL, '2020-10-28 10:33:23', '2020-10-28 10:33:23'),
(11, '2020-12-18', '27', 'Student Payment', 'Amount paid by student', NULL, NULL, '2020-12-18 11:55:14', '2020-12-18 11:55:14'),
(12, '2020-12-15', 'test', 'Bank Payment', 'janotabank to sonali bank', NULL, 1, '2020-12-18 12:01:51', '2020-12-18 12:01:51'),
(14, '2021-01-25', '28', 'Student Payment', 'Amount paid by student', NULL, 1, '2021-01-25 05:46:02', '2021-01-25 05:46:02'),
(22, '2021-01-27', '37', 'Student Payment', 'Amount paid by student', NULL, 1, '2021-01-27 12:29:36', '2021-01-27 12:29:36'),
(23, '2021-01-27', '38', 'Student Payment', 'Amount paid by student', NULL, 1, '2021-01-27 12:29:45', '2021-01-27 12:29:45');

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
(8, 10, 1, '2020-10-17', 'dfdfhfg', 54, '2020-10-28 10:33:23', '2020-10-28 10:33:23'),
(9, 11, 2, '2020-12-18', 'test test', 100, '2020-12-18 11:55:14', '2020-12-18 11:55:14'),
(10, 11, 3, '2020-12-18', 'test test', -100, '2020-12-18 11:55:14', '2020-12-18 11:55:14'),
(11, 12, 32, '2020-12-15', 'Payment to Sonali Bank', 100, '2020-12-18 12:01:51', '2020-12-18 12:01:51'),
(12, 12, 31, '2020-12-15', 'janotabank to sonali bank', -100, '2020-12-18 12:01:51', '2020-12-18 12:01:51'),
(13, 13, 9, '1970-01-01', NULL, 26, '2021-01-12 11:24:44', '2021-01-12 11:24:44'),
(14, 13, 1, '1970-01-01', NULL, 12, '2021-01-12 11:24:44', '2021-01-12 11:24:44'),
(15, 14, 2, '2021-01-25', NULL, 50, '2021-01-25 05:46:02', '2021-01-25 05:46:02'),
(16, 14, 3, '2021-01-25', NULL, -50, '2021-01-25 05:46:02', '2021-01-25 05:46:02'),
(17, 22, 2, '2021-01-27', NULL, 100, '2021-01-27 12:29:36', '2021-01-27 12:29:36'),
(18, 22, 3, '2021-01-27', NULL, -100, '2021-01-27 12:29:36', '2021-01-27 12:29:36'),
(19, 23, 2, '2021-01-27', NULL, 100, '2021-01-27 12:29:45', '2021-01-27 12:29:45'),
(20, 23, 3, '2021-01-27', NULL, -100, '2021-01-27 12:29:45', '2021-01-27 12:29:45');

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
(2, 4, 7823748.00, 7823748.00, '2020-06-20', 453, 34534.00, 5345.00, 'loan_hbwomabd-bdvlkpsf', 0, '2020-10-06 07:26:21', '2020-10-10 09:37:11'),
(3, 2, 1235.00, NULL, '2020-07-24', 12, 123.00, NULL, 'loan_vtpiru3l-hpots5uu', 1, '2020-12-31 05:11:52', '2020-12-31 05:11:52'),
(4, 6, 10000.00, NULL, '2021-01-15', 12, 833.33, NULL, 'loan_8txilcv3-hnfriv5d', 1, '2021-01-15 09:27:32', '2021-01-15 09:27:32');

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
(70, '2020_11_17_173828_create_student_money_receipt_details_table', 57),
(71, '2020_08_10_092713_create_departments_table', 1),
(72, '2020_09_17_005547_create_designations_table', 1),
(73, '2020_09_19_124140_create_academics_table', 1),
(74, '2020_09_20_005345_create_trainings_table', 1),
(75, '2020_09_20_222946_create_salary_details_table', 1),
(76, '2020_09_23_165905_create_payments_table', 58),
(77, '2020_09_23_171034_create_deposits_table', 58),
(78, '2020_09_26_105326_create_employee_attendances_table', 1),
(79, '2020_09_27_151419_create_holidays_table', 1),
(80, '2020_10_31_132451_create_company_resolutions_table', 1),
(81, '2020_11_06_144532_create_call_lists_table', 1),
(82, '2020_12_14_121959_create_notifications_table', 59),
(83, '2020_12_16_165256_add_code_to_gl_accounts_table', 59),
(84, '2020_12_18_113721_create_student_interest_countries_table', 59),
(85, '2020_12_18_164148_add_gl_account_id_to_student_requsitions', 59),
(88, '2020_12_18_172140_add_credit_gl_account_id_to_student_requsitions', 60),
(89, '2020_12_21_144713_create_publications_table', 61),
(90, '2021_01_09_142003_create_hear_bsbs_table', 62),
(91, '2021_01_08_123559_create_certification_agents_table', 63),
(92, '2021_01_08_180705_create_international_agents_table', 63),
(93, '2021_01_09_185830_create_international_admissions_table', 63),
(94, '2021_01_12_073121_create_international_student_visas_table', 63),
(95, '2021_01_16_111338_add_nid_to_employees_table', 64),
(96, '2021_01_27_131727_add_branch_code_branches_table', 65),
(97, '2021_01_27_132327_add_country_code_countries_table', 66);

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
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(3, 'App\\User', 18),
(3, 'App\\User', 26),
(3, 'App\\User', 27),
(4, 'App\\User', 4),
(4, 'App\\User', 8),
(4, 'App\\User', 13),
(4, 'App\\User', 14),
(4, 'App\\User', 15),
(4, 'App\\User', 16),
(4, 'App\\User', 17),
(4, 'App\\User', 19),
(4, 'App\\User', 20),
(4, 'App\\User', 21),
(5, 'App\\User', 10),
(5, 'App\\User', 11),
(6, 'App\\User', 12),
(6, 'App\\User', 24),
(9, 'App\\User', 9),
(13, 'App\\User', 23),
(14, 'App\\User', 22),
(21, 'App\\User', 8),
(21, 'App\\User', 16),
(21, 'App\\User', 17),
(23, 'App\\User', 25);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) NOT NULL,
  `referance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_of` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `bank_id`, `referance`, `order_of`, `memo`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '12/15/2020', 1, 'test', 'MD SIR', 'janotabank to sonali bank', '1', NULL, '2020-12-18 12:01:51', '2020-12-18 12:01:51');

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

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `payment_id`, `gl_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 32, 100, 'Payment to Sonali Bank', '2020-12-18 12:01:51', '2020-12-18 12:01:51');

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
(207, 'os', 'web', '2020-10-31 09:09:25', '2020-10-31 09:09:25'),
(208, 'all_visa', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(209, 'insert_visa', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(210, 'edit_visa', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(211, 'view_visa', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(212, 'delete_visa', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(213, 'all_requsition', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(214, 'insert_requsition', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(215, 'edit_requsition', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(216, 'view_requsition', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(217, 'delete_requsition', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(218, 'all_consellor', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(219, 'insert_consellor', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:11'),
(220, 'edit_consellor', 'web', '2020-12-08 06:08:11', '2020-12-08 06:08:12'),
(221, 'view_consellor', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(222, 'delete_consellor', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(223, 'all_receptionist', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(224, 'insert_receptionist', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(225, 'edit_receptionist', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(226, 'view_receptionist', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(227, 'delete_receptionist', 'web', '2020-12-08 06:08:12', '2020-12-08 06:08:12'),
(228, 'okk Test', 'web', '2020-12-08 06:44:49', '2020-12-08 06:44:49'),
(229, 'all_settings', 'web', '2020-12-08 10:01:59', '2020-12-08 10:01:59'),
(230, 'insert_settings', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(231, 'edit_settings', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(232, 'view_settings', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(233, 'delete_settings', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(234, 'all_recycle_bin', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(235, 'insert_recycle_bin', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(236, 'edit_recycle_bin', 'web', '2020-12-08 10:02:00', '2020-12-08 10:02:00'),
(237, 'view_recycle_bin', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(238, 'delete_recycle_bin', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(239, 'all_agent', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(240, 'insert_agent', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(241, 'edit_agent', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(242, 'view_agent', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(243, 'delete_agent', 'web', '2020-12-08 10:02:01', '2020-12-08 10:02:01'),
(244, 'Ok test', 'web', '2020-12-08 21:40:23', '2020-12-08 21:40:23'),
(245, 'okok', 'web', '2020-12-09 21:35:01', '2020-12-09 21:35:01'),
(246, 'all_call', 'web', NULL, NULL),
(247, 'insert_call', 'web', NULL, NULL),
(248, 'delete_call', 'web', NULL, NULL),
(249, 'view_call', 'web', NULL, NULL),
(250, 'edit_call', 'web', NULL, NULL),
(251, 'ppll', 'web', '2020-12-10 17:05:33', '2020-12-10 17:05:33'),
(252, 'insert_publication', 'web', NULL, NULL),
(253, 'edit_publication', 'web', NULL, NULL),
(254, 'all_publication', 'web', NULL, NULL),
(255, 'delete_publication', 'web', NULL, NULL),
(256, 'view_publication', 'web', '2020-12-21 10:24:55', '2020-12-21 10:24:55'),
(257, 'k', 'web', '2020-12-21 10:27:26', '2020-12-21 10:27:26');

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
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `slug`, `description`, `cost`, `qty`, `remarks`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'okk test BD', 'ads_n6til7xq-lshv42sz', NULL, '1250', '120', 'fsdfsdfsdf', 'uploads/publication/Publication_5BKWgAJq.jpg', 0, NULL, NULL, '2020-12-21 11:32:29', '2020-12-21 11:43:10'),
(2, 'Liplate BD', 'ads_kkwwwszi-wgyha2fu', NULL, '1250', '120', 'tesstsrf', 'uploads/publication/Publication_zVaPFxJj.jpg', 1, NULL, NULL, '2020-12-21 11:40:39', '2020-12-21 11:43:33');

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
(3, 4, 2, 'test', 'dasdasf dfvdfvdf', NULL, '04/28/2020', '04/26/2020', NULL, '1', '2020-09-28 05:34:08', '2020-12-19 10:33:29');

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
(3, 'Counsellor', 'web', '2020-11-24 22:38:34', '2020-11-24 22:38:34'),
(4, 'Manager - HR', 'web', '2020-11-24 22:39:29', '2020-11-30 19:19:10'),
(5, 'Assistant Manager - Accounts', 'web', '2020-11-24 22:39:56', '2020-11-30 19:22:02'),
(6, 'Officer - Accounts', 'web', '2020-11-28 20:10:23', '2020-11-30 21:35:49'),
(7, 'Visa Consultant', 'web', '2020-11-28 20:11:18', '2020-11-28 20:11:18'),
(8, 'Manager - International Comminucation', 'web', '2020-11-30 19:18:28', '2020-11-30 19:18:28'),
(9, 'Manager - Accounts', 'web', '2020-11-30 19:18:42', '2020-11-30 19:18:42'),
(10, 'Manager - Visa Section', 'web', '2020-11-30 19:21:28', '2020-11-30 21:33:36'),
(11, 'Manager - File Section', 'web', '2020-11-30 19:21:44', '2020-11-30 19:21:44'),
(12, 'Manager - Student Management', 'web', '2020-11-30 21:33:11', '2020-11-30 21:33:11'),
(14, 'Manager - Marketing Department', 'web', '2020-11-30 21:34:43', '2020-11-30 21:34:43'),
(15, 'Assistant Counselor', 'web', '2020-11-30 21:36:24', '2020-11-30 21:36:24'),
(16, 'Assistant Manager - Visa Section', 'web', '2020-11-30 21:37:36', '2020-11-30 21:37:36'),
(17, 'Executive - File Section', 'web', '2020-11-30 21:37:59', '2020-11-30 21:37:59'),
(21, 'Senior Executive-HR', 'web', '2020-12-10 17:24:45', '2020-12-10 17:24:45'),
(22, 'Planner - Marketing Department', 'web', '2020-12-10 17:50:35', '2020-12-10 17:50:35'),
(23, 'Front Desk Officer', 'web', '2021-01-14 06:38:23', '2021-01-14 06:38:23');

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
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 4),
(11, 21),
(12, 1),
(12, 2),
(12, 4),
(12, 21),
(13, 1),
(13, 2),
(13, 4),
(13, 21),
(14, 1),
(14, 2),
(14, 4),
(14, 21),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(16, 4),
(16, 21),
(17, 1),
(17, 2),
(17, 4),
(17, 21),
(18, 1),
(18, 2),
(18, 4),
(18, 21),
(19, 1),
(19, 2),
(19, 4),
(19, 21),
(20, 1),
(20, 2),
(20, 4),
(21, 2),
(21, 4),
(21, 21),
(22, 1),
(22, 2),
(22, 4),
(22, 21),
(23, 1),
(23, 2),
(23, 4),
(23, 21),
(24, 1),
(24, 2),
(24, 4),
(24, 21),
(25, 1),
(25, 2),
(25, 4),
(26, 2),
(26, 5),
(26, 6),
(26, 9),
(27, 1),
(27, 2),
(27, 5),
(27, 6),
(27, 9),
(28, 2),
(28, 5),
(28, 6),
(28, 9),
(29, 2),
(29, 5),
(29, 6),
(29, 9),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 1),
(36, 2),
(36, 4),
(36, 21),
(37, 1),
(37, 2),
(37, 4),
(37, 21),
(38, 1),
(38, 2),
(38, 4),
(38, 21),
(39, 1),
(39, 2),
(39, 4),
(39, 21),
(40, 1),
(40, 2),
(40, 4),
(41, 2),
(41, 4),
(41, 21),
(42, 2),
(42, 4),
(42, 21),
(43, 2),
(43, 4),
(43, 21),
(44, 2),
(44, 4),
(44, 21),
(45, 2),
(45, 4),
(46, 1),
(46, 2),
(46, 21),
(47, 1),
(47, 2),
(47, 21),
(48, 1),
(48, 2),
(48, 21),
(49, 1),
(49, 2),
(49, 21),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(51, 14),
(51, 22),
(52, 1),
(52, 2),
(52, 14),
(52, 22),
(53, 1),
(53, 2),
(53, 14),
(53, 22),
(54, 1),
(54, 2),
(54, 14),
(54, 22),
(55, 1),
(55, 2),
(55, 14),
(56, 1),
(56, 2),
(56, 4),
(56, 21),
(57, 1),
(57, 2),
(57, 4),
(57, 21),
(58, 1),
(58, 2),
(58, 4),
(58, 21),
(59, 1),
(59, 2),
(59, 4),
(59, 21),
(60, 1),
(60, 2),
(60, 4),
(61, 1),
(61, 2),
(61, 4),
(61, 21),
(62, 1),
(62, 2),
(62, 4),
(62, 21),
(63, 1),
(63, 2),
(63, 4),
(63, 21),
(64, 1),
(64, 2),
(64, 4),
(64, 21),
(65, 1),
(65, 2),
(65, 4),
(66, 1),
(66, 2),
(66, 4),
(66, 21),
(67, 1),
(67, 2),
(67, 4),
(67, 21),
(68, 1),
(68, 2),
(68, 4),
(68, 21),
(69, 1),
(69, 2),
(69, 4),
(69, 21),
(70, 1),
(70, 2),
(70, 4),
(71, 1),
(71, 2),
(71, 4),
(71, 21),
(72, 1),
(72, 2),
(72, 4),
(72, 21),
(73, 1),
(73, 2),
(73, 4),
(73, 21),
(74, 1),
(74, 2),
(74, 4),
(74, 21),
(75, 1),
(75, 2),
(75, 4),
(76, 1),
(76, 2),
(76, 4),
(76, 5),
(76, 21),
(77, 1),
(77, 2),
(77, 4),
(77, 21),
(78, 1),
(78, 2),
(78, 4),
(78, 21),
(79, 1),
(79, 2),
(79, 4),
(79, 5),
(79, 21),
(80, 1),
(80, 2),
(80, 4),
(81, 2),
(81, 4),
(81, 21),
(82, 2),
(82, 4),
(82, 21),
(83, 2),
(83, 4),
(83, 21),
(84, 2),
(84, 4),
(84, 21),
(85, 2),
(85, 4),
(86, 2),
(86, 3),
(86, 5),
(86, 6),
(86, 9),
(86, 23),
(87, 2),
(87, 3),
(87, 5),
(87, 6),
(87, 9),
(87, 23),
(88, 2),
(88, 3),
(88, 5),
(88, 6),
(88, 9),
(88, 23),
(89, 2),
(89, 3),
(89, 5),
(89, 6),
(89, 9),
(89, 23),
(90, 2),
(90, 3),
(90, 23),
(91, 2),
(91, 3),
(91, 5),
(91, 6),
(91, 9),
(92, 2),
(92, 3),
(92, 5),
(92, 6),
(92, 9),
(93, 2),
(93, 3),
(93, 5),
(93, 6),
(93, 9),
(94, 2),
(94, 3),
(94, 5),
(94, 6),
(94, 9),
(95, 2),
(95, 3),
(96, 2),
(96, 5),
(96, 6),
(96, 9),
(97, 2),
(97, 5),
(97, 6),
(97, 9),
(98, 2),
(98, 5),
(98, 6),
(98, 9),
(99, 2),
(99, 5),
(99, 6),
(99, 9),
(100, 2),
(101, 2),
(101, 5),
(101, 6),
(101, 9),
(102, 2),
(102, 5),
(102, 6),
(102, 9),
(103, 2),
(103, 5),
(103, 6),
(103, 9),
(104, 2),
(104, 5),
(104, 6),
(104, 9),
(105, 2),
(106, 1),
(106, 2),
(106, 4),
(106, 21),
(107, 1),
(107, 2),
(107, 4),
(107, 21),
(108, 1),
(108, 2),
(108, 4),
(108, 21),
(109, 1),
(109, 2),
(109, 4),
(109, 21),
(110, 1),
(110, 2),
(110, 4),
(111, 2),
(111, 4),
(111, 21),
(112, 2),
(112, 4),
(112, 21),
(113, 2),
(113, 4),
(113, 21),
(114, 2),
(114, 4),
(114, 21),
(115, 2),
(115, 4),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(121, 3),
(121, 5),
(121, 23),
(122, 2),
(122, 3),
(122, 5),
(122, 23),
(123, 2),
(123, 3),
(123, 5),
(123, 23),
(124, 2),
(124, 3),
(124, 5),
(124, 9),
(124, 23),
(125, 2),
(125, 3),
(125, 23),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(134, 9),
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
(146, 14),
(146, 22),
(147, 2),
(147, 14),
(147, 22),
(148, 2),
(148, 14),
(148, 22),
(149, 2),
(149, 14),
(149, 22),
(150, 2),
(150, 14),
(151, 2),
(151, 5),
(151, 9),
(152, 2),
(152, 5),
(152, 9),
(153, 2),
(153, 5),
(153, 9),
(154, 2),
(154, 5),
(154, 9),
(155, 2),
(156, 2),
(156, 5),
(156, 9),
(157, 2),
(157, 5),
(157, 9),
(158, 2),
(158, 5),
(158, 9),
(159, 2),
(159, 5),
(159, 9),
(160, 2),
(161, 2),
(161, 5),
(161, 6),
(161, 9),
(162, 2),
(162, 9),
(163, 2),
(163, 9),
(164, 2),
(164, 5),
(164, 6),
(164, 9),
(165, 2),
(166, 2),
(166, 5),
(166, 6),
(166, 9),
(167, 2),
(167, 9),
(168, 2),
(168, 9),
(169, 2),
(169, 5),
(169, 6),
(169, 9),
(170, 2),
(171, 2),
(171, 5),
(171, 6),
(171, 9),
(172, 2),
(172, 9),
(173, 2),
(173, 9),
(174, 2),
(174, 5),
(174, 6),
(174, 9),
(175, 2),
(176, 1),
(176, 2),
(176, 4),
(176, 21),
(177, 1),
(177, 2),
(177, 4),
(177, 21),
(178, 1),
(178, 2),
(178, 4),
(178, 21),
(179, 1),
(179, 2),
(179, 4),
(179, 21),
(180, 1),
(180, 2),
(180, 4),
(181, 1),
(181, 2),
(181, 4),
(181, 21),
(182, 1),
(182, 2),
(182, 4),
(182, 21),
(183, 1),
(183, 2),
(183, 4),
(183, 21),
(184, 1),
(184, 2),
(184, 4),
(184, 21),
(185, 1),
(185, 2),
(185, 4),
(186, 2),
(186, 5),
(186, 6),
(186, 9),
(187, 2),
(187, 5),
(187, 6),
(187, 9),
(188, 2),
(188, 9),
(189, 2),
(189, 5),
(189, 6),
(189, 9),
(190, 2),
(191, 2),
(191, 5),
(191, 6),
(191, 9),
(192, 2),
(192, 5),
(192, 6),
(192, 9),
(193, 2),
(193, 9),
(194, 2),
(194, 5),
(194, 6),
(194, 9),
(195, 2),
(196, 2),
(196, 4),
(197, 2),
(197, 4),
(198, 2),
(198, 4),
(199, 2),
(199, 4),
(200, 2),
(200, 4),
(202, 2),
(203, 2),
(204, 2),
(205, 2),
(206, 2),
(208, 2),
(209, 2),
(210, 2),
(211, 2),
(212, 2),
(218, 2),
(219, 2),
(220, 2),
(221, 2),
(222, 2),
(223, 2),
(224, 2),
(225, 2),
(226, 2),
(227, 2),
(229, 2),
(230, 2),
(231, 2),
(231, 3),
(232, 2),
(233, 2),
(234, 2),
(235, 2),
(236, 2),
(237, 2),
(238, 2),
(239, 2),
(240, 2),
(241, 2),
(242, 2),
(243, 2),
(252, 1),
(252, 2),
(253, 1),
(253, 2),
(254, 1),
(254, 2),
(255, 1),
(255, 2),
(256, 1),
(256, 2);

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
(3, 1, 3, 1000.00, '2020-09-20 11:33:57', '2020-09-20 13:09:45'),
(4, 2, 1, 8700.00, '2020-12-12 15:56:45', '2021-01-29 05:35:00'),
(5, 2, 2, 5800.00, '2020-12-12 15:56:46', '2021-01-29 05:35:00'),
(6, 2, 3, 500.00, '2020-12-12 15:56:46', '2020-12-12 15:56:46'),
(7, 2, 4, 725.00, '2020-12-12 15:56:46', '2021-01-29 05:35:00'),
(8, 12, 1, 100.00, '2021-01-19 05:50:37', '2021-01-19 05:50:37'),
(9, 12, 2, 100.00, '2021-01-19 05:50:37', '2021-01-19 05:50:37'),
(10, 12, 3, 100.00, '2021-01-19 05:50:38', '2021-01-19 05:50:38'),
(11, 12, 4, 100.00, '2021-01-19 05:50:38', '2021-01-19 05:50:38'),
(12, 2, 5, 725.00, '2021-01-29 05:35:00', '2021-01-29 05:35:00'),
(13, 2, 6, 0.00, '2021-01-29 05:35:00', '2021-01-29 05:35:00'),
(14, 2, 7, 0.00, '2021-01-29 05:35:00', '2021-01-29 05:35:00'),
(15, 2, 8, 0.00, '2021-01-29 05:35:00', '2021-01-29 05:35:00');

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
(1, 'G-100', 12000.00, 1, '2020-09-08 04:52:28', '2020-09-12 09:08:25'),
(2, 'G-101', 15000.00, 1, '2021-01-16 06:20:36', '2021-01-16 06:20:36');

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
(1, 'Basic Salary', 60.00, 'Percent', '2020-09-08 05:11:16', '2021-01-19 06:30:09'),
(2, 'House Rent', 40.00, 'Percent', '2020-09-08 05:11:42', '2020-09-08 05:11:42'),
(3, 'Medical', 500.00, 'Fixed', '2020-09-08 05:11:58', '2020-09-08 05:11:58'),
(4, 'Conveyance', 5.00, 'Percent', '2020-09-08 05:29:35', '2020-09-08 05:29:35'),
(5, 'Other Allowance', 5.00, 'Percent', '2021-01-19 06:23:38', '2021-01-19 06:23:38'),
(6, 'Special Allowance', 0.00, 'Fixed', '2021-01-19 06:24:46', '2021-01-19 06:24:46'),
(7, 'SSP/OT', 0.00, 'Fixed', '2021-01-19 06:28:53', '2021-01-19 06:28:53'),
(8, 'Arrears', 0.00, 'Fixed', '2021-01-19 06:29:47', '2021-01-19 06:29:47');

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
  `hear_bsb_id` int(11) DEFAULT NULL,
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
  `asstant_consellor` int(11) DEFAULT NULL,
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

INSERT INTO `students` (`id`, `slug`, `id_no`, `name`, `father_name`, `father_profession`, `mother_name`, `mother_profession`, `dob`, `blood_group`, `religion`, `national_id`, `passport_id`, `nationality`, `gender`, `present_address`, `permanent_address`, `email`, `phone`, `image`, `visitor_id`, `guest_date`, `to`, `room`, `purpose_study`, `purpose_ielts`, `purpose_visit`, `purpose_others`, `subject`, `marital_status`, `hear_bsb_id`, `hear_fair`, `hear_seminar`, `hear_staff`, `hear_ads`, `hear_relative`, `hear_newspaper`, `hear_facebook`, `hear_agent`, `hear_leaflet`, `hear_webpage`, `hear_spot`, `hear_tv`, `hear_others`, `ref_by`, `reception`, `counsellor`, `asstant_consellor`, `apply_for`, `admission_date`, `location`, `university`, `course_cat`, `course`, `reg_fees`, `tution_fees`, `total_course_fees`, `mode_of_payment`, `living_cost`, `job_permission`, `application_deadline`, `commencement_date`, `visa_fees`, `ambassy_address`, `service_charge`, `air_tiket`, `comments`, `student_status`, `file_transfer_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'student-q2ryplhm-iskkioje', '7459375', 'Faruk Haidar', NULL, NULL, NULL, NULL, '1993-01-01', NULL, NULL, NULL, NULL, '3', NULL, 'dafasfdasfsdfgsdgfd', '#80,jafrabad, sara bangla road, dhaka 1207', 'farukhaidar3@gmail.com', '01949796940', 'uploads/student/guest_1603450634.PNG', '496546', NULL, 'farjsakjsaks', '77407', 'on', 'on', 'on', NULL, 'I am excited for meet you', 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, 'mfdgdf', '2020-10-21', NULL, 1, 2, 3, '343', '343', '3453453', 'Cash', '3434', 'dfgdgdfg', '1970-01-01', '10/08/2020', '45435', '663 Durant', NULL, '453534', 'fddfghfgjhdfghfgh', 'Student', 5, 1, '2020-10-23 10:57:14', '2021-01-30 10:16:36'),
(2, 'student-q2ryplhm-iskkiow', '42353453456', 'Faruk Haidar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1603452332.PNG', '215897', NULL, '323423', '561352', 'on', 'on', 'on', NULL, 'I am excited for meet you', 'Single', NULL, NULL, 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, 5, NULL, 'sfsdgfdg', '2020-10-14', 3, 1, 2, 1, '43534', '534534', '45345', 'Cash', '5345', 'fhrthfgh', '1970-01-01', '10/20/2020', '345345', '663 Durant', NULL, '435345', 'fddfhfghfdgh', 'Student', NULL, 1, '2020-10-23 11:25:32', '2020-10-27 11:33:30'),
(3, 'student-q2ryplhm-iskkiojo', '5435345345', 'Faruk Haidar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1603454750.png', '516604', NULL, 'dsgdfgsdfgsdfg', '637068', '1', '1', '1', '1', 'I am excited for meet you', 'Single', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, '1970-01-01', 3, 1, 1, 2, NULL, '4534', '5345', 'Cash', '4534', '5345', '1970-01-01', '10/28/2020', '434534', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '4534', 'fgrtyrty', 'Student', 1, 1, '2020-10-23 12:05:51', '2020-11-23 17:05:06'),
(4, 'stu-rkdczeyq-lspj3msb', 'sdfsdfdsg', 'Faruk Haidar', 'dfgdfg', 'dfgdsgdf', 'gdfgdf', 'gdfgdf', '2019-12-31', 'a_positive', 'islam', '435345645', '546456456345', '3', 'male', '#80,jafrabad, sara bangla road, dhaka 1207', 'sdfsdgdfsgdfgdsfgdfg', 'farukhaidar3@gmail.com', '01949796940', 'uploads/student/student_1603455604.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student', NULL, 1, '2020-10-23 12:20:04', '2020-10-23 12:20:05'),
(5, 'student-olagrafr-s1l9zyqc', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1604905262.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 0, '2020-11-09 07:01:02', '2020-11-23 16:38:20'),
(6, 'student-bcregjnr-nisvq0bq', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1604905268.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 0, '2020-11-09 07:01:08', '2020-11-23 16:38:24'),
(7, 'student-z9e76bj9-w8wjwbsb', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1604905342.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 0, '2020-11-09 07:02:22', '2020-11-23 16:38:16'),
(8, 'student-jwkkrrqa-rnnnjooh', NULL, 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1604905499.PNG', '833819', '2020-11-10', 'dsfsdfsd', '595288', '1', '1', '1', NULL, 'I am excited for meet you', 'Single', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '5', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 0, '2020-11-09 07:04:59', '2020-11-23 16:38:10'),
(9, 'student-2qt8amqk-xs5wsu6u', '374701616', 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '250684', '2020-11-18', 'fsdfsdf', '896750', '1', NULL, '1', NULL, 'I am excited for meet you', 'Single', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', 2, 5, NULL, 'Test', '2020-11-18', 3, 1, 1, 2, '7548', '5435', '45345', 'Cash', '45345', 'yes', '1970-01-01', '11/10/2020', 'test', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '4534', 'test', 'Student', NULL, 1, '2020-11-14 04:58:47', '2020-11-23 16:40:04'),
(10, 'student-ispvg3us-3aktbeil', NULL, 'zaahira Akter', NULL, NULL, NULL, NULL, '2020-11-04', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '275503', '2020-11-05', NULL, '46086', '1', NULL, '1', NULL, 'I am excited for meet you', 'Divorced', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, NULL, NULL, '6', 2, 6, NULL, 'sfsdgfdg', '2020-11-03', 3, 1, 2, 1, '434', '23423', '42353452', 'Cash', '423423', 'yes', '1970-01-01', '11/03/2020', '324', 'Dhaka, Bangladesh', NULL, '4534', '3423423', 'Student', NULL, 0, '2020-11-17 09:31:11', '2020-11-23 16:36:16'),
(11, 'student-qpfaqtxj-jqxspbsq', '268703680', 'customer name', NULL, NULL, NULL, NULL, '2020-11-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '351879', '2020-11-17', NULL, '582240', '1', '1', '1', NULL, 'I am excited for meet you', 'Divorced', NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '1', 2, 5, NULL, 'test', '1970-01-01', 3, 1, 1, 2, '5435', '534534', '45353', 'Cash', '34545', 'yes', '2020-10-29', '11/12/2020', '5454', 'dhanmondi 32', NULL, '4534', 'test', 'Student', NULL, 1, '2020-11-20 06:59:01', '2020-11-23 23:06:26'),
(12, 'student-iwyfeydf-w83awahx', '165516450', 'zaahira Akter', NULL, NULL, NULL, NULL, '2020-11-18', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '838459', '2020-11-11', 'Test', '675408', '1', '1', '1', NULL, 'Test', 'Single', NULL, '1', '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '1', 2, 9, NULL, NULL, '2020-11-04', 3, 1, 1, 2, '434', '535', '534543', 'Cash', '45345', 'test', '1970-01-01', '11/19/2020', '5435', 'Dhaka, Bangladesh', NULL, '4534', 'test', 'Student', NULL, 0, '2020-11-23 16:05:52', '2020-11-23 16:36:28'),
(13, 'student-jtruym7g-m6n2gk7b', '1833009900', 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-10', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '182081', '2020-09-29', 'test', '409041', '1', '1', '1', NULL, 'test', 'Single', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', 2, 6, NULL, 'test', '2020-11-04', 3, 1, 1, 2, '54353', '5345', '5345', 'Cash', '5345', 'test', '2020-11-04', '10/28/2020', '53453', '5345', NULL, '5345', 'test', 'Student', NULL, 1, '2020-11-23 16:46:37', '2020-11-23 16:53:41'),
(14, 'student-f3tusdb9-flfqmt5g', '1158447503', 'Faruk', NULL, NULL, NULL, NULL, '2020-11-04', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '409530', '2020-11-11', 'Test', '543545', '1', '1', '1', NULL, 'Test', 'Single', 2, NULL, '1', '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', 2, 6, NULL, 'Test', '2020-11-06', 3, 1, 2, 3, '545', '646', '64543', 'Cash', '543', 'yes', '2020-11-23', '11/04/2020', '646', 'dhanmondi', NULL, '646', 'test', 'Student', 2, 1, '2020-11-23 19:10:33', '2020-11-25 15:37:22'),
(15, 'student-anwohpia-urth17rp', '334462', 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-11-03', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '427284', '2020-11-03', 'test', '5454', '1', '1', '1', '1', NULL, 'Single', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '1', 2, 5, NULL, 'tesats', '1921-08-16', 1, 3, 1, 2, '4234', '43', '43', 'Cash', '12', 'okk', '1970-01-01', '12/16/2020', '123', 'dsfgd hgfgh', NULL, 'gfhfgh', 'fghfghfgh', 'Student', NULL, 1, '2020-11-23 22:54:38', '2020-12-21 08:35:42'),
(16, 'student-uoemhlek-1jemkugf', '65665474', 'Faruk Haidar', NULL, NULL, NULL, NULL, '2020-12-02', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, 'uploads/student/guest_1607922562.jpg', '967270', '2020-12-15', 'test', '557216', '1', '1', '1', NULL, 'test', 'Single', 1, '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, '1', NULL, '1', 2, 5, NULL, 'tesats', '2021-01-08', 3, 1, 1, 2, '2222', '34', '43', 'Cash', NULL, NULL, '1970-01-01', '12/29/2020', NULL, 'Dhaka Bangaldesh', NULL, NULL, NULL, 'Student', NULL, 1, '2020-12-14 16:09:22', '2021-01-08 12:19:38'),
(17, 'student-rcimihio-7wf3dqi6', '37521316', 'Faruk H', NULL, NULL, NULL, NULL, '2020-12-03', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '671126', '2020-12-09', 'test', '830660', '1', '1', '1', NULL, 'test', 'Married', 3, '1', NULL, NULL, '1', NULL, NULL, '1', NULL, '1', '1', NULL, NULL, NULL, '5', 2, 6, NULL, NULL, '2020-12-31', 3, 1, 1, 2, '2222', '34', '43', 'Cash', NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 'Student', 2, 1, '2020-12-14 16:11:12', '2021-01-14 11:18:46'),
(18, 'student-sqlnjbpa-k0dv9q1i', 'BSB-001-003-000022', 'Karim Khan', NULL, NULL, NULL, NULL, '2020-12-30', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '423947', '2021-01-05', NULL, '589243', '1', NULL, '1', NULL, 'test', 'Single', 4, '1', '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '1', 2, NULL, 8, NULL, '2021-01-27', 3, 1, 2, 1, '2222', '4', '44', 'Cash', '132235', 'yes', '2021-01-06', '01/04/2021', NULL, 'Golsun', NULL, 'test', 'teststsetstset', 'Student', NULL, 1, '2021-01-09 07:58:54', '2021-01-27 11:03:22'),
(19, 'student-lblv3ert-s2eeswyb', '318022', 'Asif Khan', NULL, NULL, NULL, NULL, '2020-12-29', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 'asifkhanbd@gmail.com', '0203254651032', NULL, '318022', '2025-09-01', NULL, NULL, '1', NULL, '1', NULL, NULL, 'Single', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2021-01-25 08:26:59', '2021-01-29 05:51:28'),
(20, 'student-1llcvfkg-ewdna6ws', NULL, 'Akram Khan', NULL, NULL, NULL, NULL, '1991-07-11', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, '803587', '2020-07-22', NULL, NULL, '1', '1', '1', NULL, NULL, 'Single', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2021-01-27 07:33:15', '2021-01-27 07:33:15'),
(21, 'student-3nlhvajf-xzhgwdis', NULL, 'Shorf Islam', NULL, NULL, NULL, NULL, '2021-01-04', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'shorifislam@gmail.com', '0213216547', NULL, '413444', '1927-09-06', NULL, NULL, '1', NULL, '1', NULL, NULL, 'Single', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Guest', NULL, 1, '2021-01-27 08:53:18', '2021-01-27 08:53:18'),
(22, 'student-agwithkz-snuulisp', 'BSB-001-003-000015', 'Hafsa Akter', NULL, NULL, NULL, NULL, '2021-01-19', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'hafsaakter@gmail.com', '021321654652', NULL, '521651', '2027-09-01', NULL, NULL, '1', NULL, '1', NULL, NULL, 'Single', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 8, NULL, '2021-01-27', 3, 1, 1, 2, '2222', '34', '43', 'Mastercard', NULL, NULL, '2021-01-05', '01/05/2021', NULL, 'Gulsan Dhanmondi', NULL, '132135', 'testesttest', 'Student', NULL, 1, '2021-01-27 11:09:00', '2021-01-27 11:11:08');

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
-- Table structure for table `student_interest_countries`
--

CREATE TABLE `student_interest_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_program_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addmission_fees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_course_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tution_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `adminssion_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_interest_countries`
--

INSERT INTO `student_interest_countries` (`id`, `student_id`, `country_id`, `university_id`, `university_program_id`, `university_program_category_id`, `addmission_fees`, `total_course_fees`, `tution_fees`, `status`, `adminssion_status`, `created_at`, `updated_at`) VALUES
(2, 15, 1, 3, 2, 1, '4236', '100', '50', 1, 1, '2020-12-19 10:37:07', '2020-12-21 08:26:19'),
(3, 15, 3, 1, 3, 2, '5465', '200', '50', 1, 0, '2020-12-19 12:52:59', '2020-12-21 07:47:35'),
(4, 17, 3, 1, 2, 1, '2222', '43', '34', 1, 1, '2020-12-22 05:15:40', '2020-12-31 11:28:56'),
(5, 17, 1, 3, 2, 1, '4234', '43', '43', 1, 0, '2020-12-31 11:28:53', '2020-12-31 11:28:53'),
(6, 16, 3, 1, 2, 1, '2222', '43', '34', 1, 0, '2021-01-08 12:18:34', '2021-01-08 12:18:34'),
(7, 16, 3, 1, 2, 1, '2222', '43', '34', 1, 1, '2021-01-08 12:18:53', '2021-01-08 12:18:55'),
(8, 18, 3, 1, 1, 2, '2222', '44', '4', 1, 1, '2021-01-09 07:59:14', '2021-01-14 09:20:13'),
(9, 22, 3, 1, 2, 1, '2222', '43', '34', 1, 1, '2021-01-27 11:09:52', '2021-01-27 11:09:56'),
(10, 19, 1, 3, 2, 1, '4234', '43', '43', 1, 1, '2021-01-29 06:18:49', '2021-01-29 06:18:55'),
(11, 21, 1, 3, 2, 1, '4234', '43', '43', 1, 1, '2021-01-29 11:14:16', '2021-01-29 11:35:34'),
(12, 21, 3, 1, 2, 1, '2222', '43', '34', 1, 0, '2021-01-29 11:14:29', '2021-01-29 11:14:29');

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
(5, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 16:41:03', '2020-11-23 16:41:03'),
(6, 1, 'File transfered', 'Student file transfer status chenge Cancel to Active. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 16:41:07', '2020-11-23 16:41:07'),
(7, 1, 'File transfered', 'Student file transfer status chenge Active to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 16:41:10', '2020-11-23 16:41:10'),
(8, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 16:42:33', '2020-11-23 16:42:33'),
(9, 3, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 17:05:01', '2020-11-23 17:05:01'),
(10, 3, 'File transfered', 'Student file transfer status chenge Inactive to Active. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 17:05:06', '2020-11-23 17:05:06'),
(11, 1, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 17:05:16', '2020-11-23 17:05:16'),
(12, 1, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2020-11-23 19:27:38', '2020-11-23 19:27:38'),
(13, 1, 'File transfered', 'Student file transfer status chenge Cancel to Active. This file transfer user Saidul Islam Uzzal', 1, '2020-11-24 22:24:32', '2020-11-24 22:24:32'),
(14, 14, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2020-11-25 15:37:22', '2020-11-25 15:37:22'),
(15, 17, 'File transfered', 'Student file transfer status chenge Inactive. This file transfer user Saidul Islam Uzzal', 1, '2021-01-14 11:17:24', '2021-01-14 11:17:24'),
(16, 17, 'File transfered', 'Student file transfer status chenge Inactive to Cancel. This file transfer user Saidul Islam Uzzal', 1, '2021-01-14 11:18:06', '2021-01-14 11:18:06'),
(17, 17, 'File transfered', 'Student file transfer status chenge Cancel to Inactive. This file transfer user Saidul Islam Uzzal', 1, '2021-01-14 11:18:46', '2021-01-14 11:18:46'),
(18, 1, 'File transfered', 'Student file transfer status chenge Applied For Refund to Enrollment Received. This file transfer user Saidul Islam Uzzal', 1, '2021-01-29 10:55:46', '2021-01-29 10:55:46'),
(19, 1, 'File transfered', 'Student file transfer status chenge Enrollment Received to Enrollment Delivered. This file transfer user Saidul Islam Uzzal', 1, '2021-01-29 10:55:48', '2021-01-29 10:55:48'),
(20, 1, 'File transfered', 'Student file transfer status chenge Enrollment Delivered to Applied For Refund. This file transfer user Saidul Islam Uzzal', 1, '2021-01-29 10:55:50', '2021-01-29 10:55:50'),
(21, 1, 'File transfered', 'Student file transfer status chenge Applied For Refund to File Processing. This file transfer user Saidul Islam Uzzal', 1, '2021-01-29 10:58:05', '2021-01-29 10:58:05'),
(22, 1, 'File transfered', 'Student file transfer status chenge File Processing to Enrollment Received. This file transfer user Saidul Islam Uzzal', 1, '2021-01-29 11:49:09', '2021-01-29 11:49:09'),
(23, 1, 'File transfered', 'Student file transfer status chenge Enrollment Received to File Close. This file transfer user Saidul Islam Uzzal', 1, '2021-01-30 10:16:36', '2021-01-30 10:16:36');

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
(18, 1, '1406108036', '232', '2020-11-23', '1', '2020-11-23 23:13:24', '2020-11-23 23:13:24'),
(19, 1, '626285740', '232', '2020-11-23', '1', '2020-11-23 23:14:15', '2020-11-23 23:14:15'),
(20, 1, '976232614', '12', '2020-11-23', '1', '2020-11-23 23:14:55', '2020-11-23 23:14:55'),
(21, 1, '936619454', '9000', '2020-11-30', '1', '2020-11-30 22:33:32', '2020-11-30 22:33:32'),
(22, 1, '1986649229', '34', '2020-12-02', '1', '2020-12-02 21:15:44', '2020-12-02 21:15:44'),
(23, 1, '1494626599', '10', '2020-12-18', '1', '2020-12-18 11:08:16', '2020-12-18 11:08:16'),
(24, 1, '934769529', '20', '2020-12-18', '1', '2020-12-18 11:13:15', '2020-12-18 11:13:15'),
(28, 1, '2075495745', '50', '2021-01-25', '1', '2021-01-25 05:46:02', '2021-01-25 05:46:02'),
(29, 1, '560591369', '500', '2021-01-25', '1', '2021-01-25 05:47:31', '2021-01-25 05:47:31'),
(31, 22, '1360427731', '100', '2021-01-27', '1', '2021-01-27 11:45:04', '2021-01-27 11:45:04'),
(32, 22, '1647732210', '100', '2021-01-27', '1', '2021-01-27 12:10:39', '2021-01-27 12:10:39'),
(33, 22, '733590676', '100', '2021-01-27', '1', '2021-01-27 12:11:29', '2021-01-27 12:11:29'),
(34, 22, '452497206', '100', '2021-01-27', '1', '2021-01-27 12:20:00', '2021-01-27 12:20:00'),
(35, 22, '915256403', '100', '2021-01-27', '1', '2021-01-27 12:20:36', '2021-01-27 12:20:36'),
(36, 22, '1040183870', '100', '2021-01-27', '1', '2021-01-27 12:22:26', '2021-01-27 12:22:26'),
(37, 22, '703854855', '100', '2021-01-27', '1', '2021-01-27 12:29:36', '2021-01-27 12:29:36'),
(38, 22, '1251417782', '100', '2021-01-27', '1', '2021-01-27 12:29:45', '2021-01-27 12:29:45');

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
(15, '18', 10, '232', NULL, 1, '2020-11-23 23:13:24', '2020-11-23 23:13:24'),
(16, '19', 10, '232', 'fgrgfhfghfh', 1, '2020-11-23 23:14:15', '2020-11-23 23:14:15'),
(17, '20', 6, '4', NULL, 1, '2020-11-23 23:14:55', '2020-11-23 23:14:55'),
(18, '20', 7, '4', NULL, 1, '2020-11-23 23:14:55', '2020-11-23 23:14:55'),
(19, '20', 12, '4', NULL, 1, '2020-11-23 23:14:55', '2020-11-23 23:14:55'),
(20, '21', 8, '9000', NULL, 1, '2020-11-30 22:33:32', '2020-11-30 22:33:32'),
(21, '22', 10, '34', 'It is special descount for student', 1, '2020-12-02 21:15:44', '2020-12-02 21:15:44'),
(22, '23', 3, '10', NULL, 1, '2020-12-18 11:08:16', '2020-12-18 11:08:16'),
(23, '24', 3, '10', '10', 1, '2020-12-18 11:13:15', '2020-12-18 11:13:15'),
(24, '24', 5, '10', NULL, 1, '2020-12-18 11:13:15', '2020-12-18 11:13:15'),
(28, '28', 3, '50', NULL, 1, '2021-01-25 05:46:02', '2021-01-25 05:46:02'),
(36, '37', 8, '100', NULL, 1, '2021-01-27 12:29:36', '2021-01-27 12:29:36'),
(37, '38', 9, '100', NULL, 1, '2021-01-27 12:29:45', '2021-01-27 12:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_requsitions`
--

CREATE TABLE `student_requsitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `payable_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `gl_account_id` bigint(20) DEFAULT NULL,
  `credit_gl_account_id` bigint(20) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_requsitions`
--

INSERT INTO `student_requsitions` (`id`, `name`, `parent_id`, `payable_amount`, `country_id`, `gl_account_id`, `credit_gl_account_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Registration Fees / File opening', NULL, '4343', 2, 2, 3, '1', '2020-11-16 09:19:31', '2020-12-18 11:51:16'),
(4, 'Service Charge / Counselling Fee', NULL, '324', 2, 2, 3, '1', '2020-11-16 09:27:37', '2020-11-16 09:27:37'),
(5, 'Commission', NULL, '4234', 2, 2, 3, '1', '2020-11-16 09:28:51', '2020-11-16 09:28:51'),
(6, 'Miscellaneous Expenses', NULL, '5456', 3, 2, 3, '1', '2020-11-16 09:30:18', '2020-11-16 09:30:18'),
(7, 'University / College application expenses', 6, '754', 3, 2, 3, '1', '2020-11-16 09:31:08', '2020-11-16 09:31:08'),
(8, 'University / College admission expenses', 6, '4325', 3, 2, 3, '1', '2020-11-16 09:31:48', '2020-11-16 09:31:48'),
(9, 'DHL / Postal Expanses', 6, '7657', 3, 2, 3, '1', '2020-11-16 09:32:37', '2020-11-16 09:32:37'),
(10, 'Refundable Subject to Condition', NULL, '2343', 3, 2, 3, '1', '2020-11-16 09:34:57', '2020-11-16 09:34:57'),
(11, 'Accommodation Fee', 10, '7565', 3, 2, 3, '1', '2020-11-16 09:36:02', '2020-11-16 09:36:02'),
(12, 'Administrative Fee', 10, '9679', 3, 2, 3, '1', '2020-11-16 09:36:16', '2020-11-16 09:36:16'),
(16, 'admin', 15, '100', 3, 2, 3, '1', '2020-12-18 10:56:21', '2020-12-18 10:59:41'),
(17, 'Counsellor', 15, '100', 3, 13, 12, '1', '2020-12-18 11:33:04', '2020-12-18 11:33:46');

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
(1, 1, 3, '454', '193', 'It is special descount for student', 1, '2020-11-16 11:55:44', '2021-01-25 05:46:02'),
(2, 1, 4, NULL, NULL, NULL, 1, '2020-11-16 11:55:44', '2020-11-18 11:42:50'),
(3, 1, 5, '44444444', '10', NULL, 1, '2020-11-16 11:55:45', '2020-12-18 11:13:15'),
(4, 1, 6, '3434', '4', NULL, 1, '2020-11-16 11:55:46', '2020-11-23 23:14:55'),
(5, 1, 7, '434', '4', NULL, 1, '2020-11-16 11:55:47', '2020-11-23 23:14:55'),
(6, 1, 8, '45345', '9000', NULL, 1, '2020-11-16 11:55:47', '2020-11-30 22:33:32'),
(7, 1, 9, '435345', NULL, NULL, 1, '2020-11-16 11:55:48', '2020-11-16 11:58:22'),
(8, 1, 10, '345345', '730', NULL, 1, '2020-11-16 11:55:48', '2020-12-02 21:15:44'),
(9, 1, 11, '345345', NULL, NULL, 1, '2020-11-16 11:55:49', '2020-11-16 11:58:22'),
(10, 1, 12, '345345', '4', NULL, 1, '2020-11-16 11:55:49', '2020-11-23 23:14:55'),
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
(31, 17, 6, '454', NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:21:03'),
(32, 17, 7, '555', NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:34:46'),
(33, 17, 8, '225', NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:21:03'),
(34, 17, 9, '452', NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:21:03'),
(35, 17, 10, NULL, NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:20:27'),
(36, 17, 11, NULL, NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:20:27'),
(37, 17, 12, NULL, NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:20:27'),
(38, 17, 16, NULL, NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:20:27'),
(39, 17, 17, NULL, NULL, NULL, 1, '2021-01-09 07:20:27', '2021-01-09 07:20:27'),
(40, 22, 6, '454', NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(41, 22, 7, '454', NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(42, 22, 8, '454', '100', NULL, 1, '2021-01-27 11:43:03', '2021-01-27 12:29:36'),
(43, 22, 9, '454', '100', NULL, 1, '2021-01-27 11:43:03', '2021-01-27 12:29:45'),
(44, 22, 10, '454', NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(45, 22, 11, NULL, NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(46, 22, 12, NULL, NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(47, 22, 16, NULL, NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03'),
(48, 22, 17, NULL, NULL, NULL, 1, '2021-01-27 11:43:03', '2021-01-27 11:43:03');

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
(1, 'Applied For Refund', 1, '2020-11-12 06:36:38', '2021-01-27 11:21:22'),
(2, 'Enrollment Delivered', 1, '2020-11-12 06:36:52', '2021-01-27 11:22:00'),
(3, 'Cancelbd', 0, '2020-11-12 06:37:09', '2020-11-12 06:37:48'),
(4, 'Enrollment Received', 1, '2020-11-12 06:37:43', '2021-01-27 11:22:40'),
(5, 'File Close', 1, '2021-01-27 11:22:51', '2021-01-27 11:22:59'),
(6, 'File Processing', 1, '2021-01-27 11:23:20', '2021-01-27 11:23:20'),
(7, 'Offer Delivered', 1, '2021-01-27 11:25:39', '2021-01-27 11:25:39'),
(8, 'Offer Received', 1, '2021-01-27 11:26:06', '2021-01-27 11:26:06'),
(9, 'Refused Yes OR No', 1, '2021-01-27 11:26:34', '2021-01-27 11:26:34'),
(10, 'Visa Ok', 1, '2021-01-27 11:26:44', '2021-01-27 11:26:44'),
(11, 'Waiting For Refund', 1, '2021-01-27 11:27:10', '2021-01-27 11:27:10');

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
(4, 'AIUB', 3, '5', 'fadfdf', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, 'U205fafa48018bce', 1, NULL, NULL, '2020-11-14 09:33:52', NULL),
(5, 'Harvad University', 1, '10', 'test', 'tset', NULL, 'U205fbb7e0c2a14f', 1, NULL, NULL, '2020-11-23 20:17:00', NULL);

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
(3, 'Masters of Business Administration', 2, '1 Years', 'PC205f005afb94b86', 1, '2020-07-04 10:33:31', NULL);

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
(1, 'Saidul Islam Uzzal', 'uzzalbd.creative@gmail.com', NULL, '$2y$10$ANN9jJHvP5q4LWT3fQySsOIYyYc6EUEf/V2S/HSuxQG/QPn4cgv3.', 'of1aJnzyqWAMgnlVMHGzCBAL806AOZHqvMnjhQl5ZFQmF4ezuqQ9pf7IQtBO', '2020-06-28 02:23:05', '2020-11-23 21:27:42', NULL, NULL, 'Super Admin'),
(2, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$f7t3J9zlQUzgksXADd2x1OBjM1MzYBhPVXm1J1brTGnqq4RYbNXxy', NULL, '2020-11-16 05:49:30', '2020-11-16 05:49:30', '209737029875', NULL, 'Super Admin'),
(3, 'Faruk Haidar', 'bsbrakib@gmail.com', NULL, '$2y$10$cGvwyARXZOwceeLrT1D.GeLHBk9l5zdHfsOuBvHBQ//HoFw9HIWr.', NULL, '2020-11-21 20:41:49', '2020-11-21 20:41:49', '2097576576', NULL, 'Super Admin'),
(4, 'BSB Super Admin', 'adminbsb@gmail.com', NULL, '$2y$10$JXFatZwsIaemKEabXHDABe5skkwYFBj1oWstufTUwS4uF4FSM2vkm', NULL, '2020-11-23 15:54:53', '2020-12-08 17:17:17', '01949796940', NULL, 'Manager - HR'),
(5, 'Faruk Haidar Bd', 'test.creative@gmail.com', NULL, '$2y$10$Fykk6vRWgHcj5f9Xv/bvn.8f49NycmvIH9mnNTypGI41SS.f7Y8ya', NULL, '2020-11-23 17:24:23', '2020-11-23 17:24:23', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(6, 'Faruk Haidar', 'farukhaidar54545@gmail.com', NULL, '$2y$10$7r8QF.3/woA7k.eO.WuTWOFvxZeV/Yzsz3WPow29iqu8NqYOE8.DK', NULL, '2020-11-23 23:19:52', '2020-11-23 23:19:52', '0194979565656', NULL, 'Super Admin'),
(7, 'Murshidul Hasnat', 'murshid@bsb.net', NULL, '$2y$10$N7ZhM0WsYpPbDfRNl6JgJ.YAgIMQP3PD4in.sFkRPEyfe/jAo0FNK', NULL, '2020-11-24 22:34:25', '2020-11-25 18:46:53', '01823-055360', NULL, 'Super Admin'),
(8, 'Nahidul Islam', 'nahid@bsb.net', NULL, '$2y$10$iJrPnAnGczL1RGQ5lIUwo.IQlErLjrJbkRLebuX7lnoRUJnWXMyjS', NULL, '2020-11-25 18:46:17', '2020-12-10 17:26:14', '01823-055340', NULL, 'Senior Executive-HR'),
(9, 'M Abdur Rahman Khan', 'rahman@bsb.net', NULL, '$2y$10$NemY6g8VB27FJ5bkucLIh.gRsaw.k8ZNr..znJMWROzH4BupSfuse', 'LsIWZJtxI2K0zJ9aBa01ZDwJbuMBeJdDMUeFkTkFFUft6lVGU3B6Wd0Z0B9D', '2020-11-28 19:58:43', '2020-12-07 14:59:16', '01823-055302', NULL, 'Manager - Accounts'),
(10, 'Md. Abdur Rouf', 'rouf@bsb.net', NULL, '$2y$10$Eu369/XsSkaFxPls2.vY9OLpFSkJCd8zDGuMl/98Piiky6b0xY.8G', NULL, '2020-11-28 20:06:40', '2020-12-07 15:04:16', '01823-055307', NULL, 'Assistant Manager - Accounts'),
(11, 'Shabiha Sharker', 'shabiha@bsb.net', NULL, '$2y$10$WY.pECKyqIP7GF.ISVUs/OvfGzufGAVxGOxkOaNkETz2r8IgnxCXC', NULL, '2020-11-28 20:07:51', '2020-12-07 15:03:47', '01823-055387', NULL, 'Assistant Manager - Accounts'),
(12, 'SuriaAkter Dina', 'dina@bsb.net', NULL, '$2y$10$NR9rlkLbmDOGLgvzpRoYJu2We4RzaMoDUA240wssryWPYVxzpNZhK', NULL, '2020-11-28 20:09:58', '2020-12-07 15:03:25', NULL, NULL, 'Officer - Accounts'),
(13, 'Mahmuda Akter', 'mahmuda@bsb.net', NULL, '$2y$10$tXByQJzWQskdgffAaQ452OXGdH8q6sW/WSiz1VpI0rOqcodVK6rPC', NULL, '2020-11-28 20:15:14', '2020-11-28 20:15:14', '01762-688031', NULL, 'Manager'),
(14, 'Riten Chakma', 'riten@bsb.net', NULL, '$2y$10$VbIqkSwT7e5FMblsnqU.XuLhD0HAi.2DOKMMPT6tOL.Ly2ZcDMJZm', NULL, '2020-11-28 20:17:25', '2020-11-28 20:17:25', '01626-470770', NULL, 'Manager'),
(15, 'Taufequr Rahman', 'taufequr@bsb.net', NULL, '$2y$10$bvTKfBftu8x3.PR3839gQ.BZ3MWSW8uLaPRWlveHoUEcPFrZFs172', NULL, '2020-11-28 20:19:43', '2020-12-07 21:59:14', '01823-055311', NULL, 'Manager - HR'),
(16, 'Bidhan Biswas', 'bidhan@bsb.net', NULL, '$2y$10$SBvPUNsmE1Nof/8iiLHeDuBGnG6MTZ8INBrbEYHFZHHT4NwQ.BtYO', NULL, '2020-11-28 20:21:10', '2020-12-10 17:25:55', '01823-055339', NULL, 'Senior Executive-HR'),
(17, 'Shahriar Khan', 'shahriar@bsb.net', NULL, '$2y$10$5LIjRErWkL4IKJTJVEsoPe0mLH.BPmD7fu3GTot/6dSRhygLMGXvi', NULL, '2020-11-28 20:22:18', '2020-12-10 17:25:28', '01823-055349', NULL, 'Senior Executive-HR'),
(18, 'Akramul Ashraf', 'akramul@bsb.net', NULL, '$2y$10$W/EbMq5k5u27kWwNiQfzWOkfA13UKpgZBc91ElWmdqN0a/XQtKabu', NULL, '2020-11-28 20:24:03', '2020-11-28 20:24:03', '01762-688102', NULL, 'Counsellor'),
(19, 'Asif Iqbal Sizer', 'sizer@bsb.net', NULL, '$2y$10$7ZISj1y1U6WXTBqVtEETseDCzdOhXju5dX2IaFMVMqEF4p6W9JljG', NULL, '2020-11-28 20:25:31', '2020-11-28 20:25:31', '01762-688148', NULL, 'Manager'),
(20, 'Mostak Ahmed', 'mostak@bsb.net', NULL, '$2y$10$bZUydYeXlqWdOr0B8JVI2.hawOtM8HnotKiolCPcUR..zfOuPkRzq', NULL, '2020-11-28 20:27:14', '2020-11-28 20:27:14', '01720-557111', NULL, 'Manager'),
(21, 'last Test', 'lasttest@gmail.com', NULL, '$2y$10$gSFrgkTeRxthoYD5x1nX8OsbWH/0N4qGpr/xlBeLqzf8KbtMh9EAG', NULL, '2020-12-08 17:20:42', '2020-12-10 23:31:35', '2097370298', NULL, 'Manager - HR'),
(22, 'Utpol Kumar Das', 'utpol@bsb.net', NULL, '$2y$10$IVZ0opnX4n.rbr8YVFUace0ayWZiCss4eA9XqvFYimujJoZaYG2ni', NULL, '2020-12-09 16:56:00', '2020-12-09 16:56:00', '01823-055328', NULL, 'Manager - Marketing Department'),
(23, 'Suma Akter', 'suma@bsb.net', NULL, '$2y$10$iUNDlc8QP4GyyjsEzYpSzu1lf23lMa1.T9l4PcT03cfngOSzIe6HC', NULL, '2020-12-09 16:56:44', '2020-12-09 18:18:12', '01762-688166', NULL, 'Executive - Marketing Department'),
(24, 'Nazmus Sakib', 'sakib@bsb.net', NULL, '$2y$10$8WgkaeIEt/myaHhfHcRVGeemS76u9xkr.Tjci67CNlbbrJj3OEG/O', NULL, '2020-12-10 17:43:13', '2020-12-10 17:43:13', NULL, NULL, 'Officer - Accounts'),
(25, 'Faruk Haidar Bd', 'receptionist@gmail.com', NULL, '$2y$10$VYVmuo2g5fZqICVPJt3KVuFvyrP.VEsva35o/P45e/xfirsaKsEUy', NULL, '2021-01-14 06:39:17', '2021-01-14 06:39:17', NULL, 'uploads/employee/Employee_1601374488.jpg', NULL),
(26, 'Faruk Haidar', 'counsellor@gmail.com', NULL, '$2y$10$aaem9uTxm4R.KXMi.acBH.S861ZrHhr4XJybNS1EfnAZYj8wsDhnq', NULL, '2021-01-14 08:49:19', '2021-01-14 08:49:19', NULL, 'uploads/employee/Employee_1601374517.jpg', NULL),
(27, 'M Abdur Rahaman khan', 'counsellor2@gmail.com', NULL, '$2y$10$1IToRk4NH6INEJMxydLukeqF5D6FcAR0sG2NRuWu79awaWuRZmYYW', NULL, '2021-01-14 08:52:34', '2021-01-14 08:52:34', NULL, NULL, NULL);

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
-- Indexes for table `certification_agents`
--
ALTER TABLE `certification_agents`
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
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
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
-- Indexes for table `hear_bsbs`
--
ALTER TABLE `hear_bsbs`
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
-- Indexes for table `international_admissions`
--
ALTER TABLE `international_admissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_admissions_student_id_foreign` (`student_id`);

--
-- Indexes for table `international_agents`
--
ALTER TABLE `international_agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_agents_university_id_foreign` (`university_id`),
  ADD KEY `international_agents_certification_id_foreign` (`certification_id`),
  ADD KEY `international_agents_country_id_foreign` (`country_id`);

--
-- Indexes for table `international_student_visas`
--
ALTER TABLE `international_student_visas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `international_student_visas_student_id_foreign` (`student_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `publications`
--
ALTER TABLE `publications`
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
-- Indexes for table `salary_details`
--
ALTER TABLE `salary_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_interest_countries`
--
ALTER TABLE `student_interest_countries`
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
-- Indexes for table `university_program_categories`
--
ALTER TABLE `university_program_categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `account_groups`
--
ALTER TABLE `account_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `certification_agents`
--
ALTER TABLE `certification_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_satisfaction_questions`
--
ALTER TABLE `client_satisfaction_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_details`
--
ALTER TABLE `deposit_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_natures`
--
ALTER TABLE `emp_natures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `hear_bsbs`
--
ALTER TABLE `hear_bsbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `international_admissions`
--
ALTER TABLE `international_admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_agents`
--
ALTER TABLE `international_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `international_student_visas`
--
ALTER TABLE `international_student_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `journal_details`
--
ALTER TABLE `journal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marriage_statuses`
--
ALTER TABLE `marriage_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_types`
--
ALTER TABLE `pay_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `provident_funds`
--
ALTER TABLE `provident_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salary_details`
--
ALTER TABLE `salary_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `salary_scales`
--
ALTER TABLE `salary_scales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary_strings`
--
ALTER TABLE `salary_strings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `student_interest_countries`
--
ALTER TABLE `student_interest_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_money_receipts`
--
ALTER TABLE `student_money_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_money_receipt_details`
--
ALTER TABLE `student_money_receipt_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_requsitions`
--
ALTER TABLE `student_requsitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_requsition_details`
--
ALTER TABLE `student_requsition_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_statuses`
--
ALTER TABLE `student_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_visas`
--
ALTER TABLE `student_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `university_programs`
--
ALTER TABLE `university_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_program_categories`
--
ALTER TABLE `university_program_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_wise_programs`
--
ALTER TABLE `university_wise_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `international_admissions`
--
ALTER TABLE `international_admissions`
  ADD CONSTRAINT `international_admissions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `international_agents`
--
ALTER TABLE `international_agents`
  ADD CONSTRAINT `international_agents_certification_id_foreign` FOREIGN KEY (`certification_id`) REFERENCES `certification_agents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `international_agents_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `international_agents_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `international_student_visas`
--
ALTER TABLE `international_student_visas`
  ADD CONSTRAINT `international_student_visas_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
