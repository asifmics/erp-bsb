-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 05:00 PM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `flag`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'U.S.A', 'country_1_1593599647.jpg', 'usa', '1', '2020-07-01 10:34:07', '2020-07-01 10:34:07'),
(2, 'U.K', 'country_2_1593599687.jpg', 'uk', '1', '2020-07-01 10:34:47', '2020-07-04 12:36:34'),
(3, 'Bangladesh', NULL, 'bangladesh', '1', '2020-07-01 11:10:13', '2020-07-01 12:42:52');

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
(2, 'marketing', 'Marketing', 1, NULL, NULL);

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
(1, 'Head of branch', 'desg-g3xmoxum-o2r2j80d', 1, '2020-09-16 19:48:27', '2020-09-16 19:48:27'),
(2, 'Web Deceloper', 'desg-rmk5ftrg-cle919nk', 1, '2020-09-30 07:01:57', '2020-09-30 07:01:57');

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
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `slug`, `id_no`, `name`, `shift_id`, `designation_id`, `maturity_age`, `eligible_status`, `father_name`, `mother_name`, `religion`, `dob`, `nationality`, `blood_group`, `marital_status`, `gender`, `present_address`, `permanent_address`, `salary_scale`, `branch`, `department`, `image`, `email`, `phone`, `whatsapp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kasjdhsjf', '546556876', 'Faruk', 2, 2, '1970-01-01', 'Yes', 'towhid mia', 'ojifa begum', 'Islam', '12/12/1996', 'Islam', 'A(-ve)', 'Divorced', 'Male', '27skfjkshfsdf', 'fsdfsd dfdb d', '1', '2', '1', 'uploads/employee/Employee_1600602872.jpg', 'farukhaidar3@gmail.com', '2097370298', 'dasfasfadfsdfdfgdfgffghg', 1, NULL, '2020-09-20 12:37:20'),
(2, 'emp-mdt2uehg-fnpqczan', '745937555', 'Faruk Haidar Bd', 2, 2, '1970-01-01', 'No', 'Towhid Mia BD', 'Khairun Nesa', 'Islam', '01/13/1993', 'Bangladesh', 'A(+ve)', 'Single', 'Male', '#80,jafrabad, sara bangla road, dhaka 1207', '26/1 West Jafrabad, Mohammodpur', NULL, '1', '1', 'uploads/employee/Employee_1601374488.jpg', NULL, NULL, NULL, 1, '2020-09-19 05:31:30', '2020-09-29 10:14:52'),
(3, 'emp-kbpt8mit-ypbefuev', '745937533', 'Faruk Haidar', 3, 2, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/17/1992', 'Bangladesh', 'B(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', NULL, NULL, NULL, 'uploads/employee/Employee_1601374517.jpg', NULL, NULL, NULL, 1, '2020-09-19 05:34:12', '2020-09-29 10:15:17'),
(4, 'emp-ybh33rkl-hvtrrzms', '745937534', 'Faruk Haidar BD', 3, 2, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '12/30/1992', 'Bangladesh', 'A(+ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 dhanmondi dhaka 1209', '1', '2', '2', 'uploads/employee/Employee_1600493763.jpg', NULL, NULL, NULL, 1, '2020-09-19 05:36:03', '2020-09-20 05:23:46'),
(5, 'emp-axrh0omo-svmwz9gj', '7459375dsd', 'Faruk Haidar', 3, 2, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '01/02/2020', 'Bangladesh', 'A(-ve)', 'Single', 'Male', '26/1 West Jafrabad, Mohammodpur', '26/1 West Jafrabad, Mohammodpur', NULL, NULL, NULL, 'uploads/employee/Employee_1600603067.jpg', NULL, NULL, NULL, 1, '2020-09-20 11:56:01', '2020-09-20 11:57:47'),
(6, 'emp-7pd713at-pqfmsv1z', '7459375', 'Faruk Haidar BD', 2, 2, '1970-01-01', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/09/2020', 'Bangladesh', 'B(-ve)', 'Married', 'Male', 'fsdv vfbd dbgnfn', 'dgdfb  fgb  f', NULL, NULL, NULL, 'uploads/employee/Employee_1601448071.jpg', NULL, NULL, NULL, 1, '2020-09-30 06:41:11', '2020-09-30 06:41:12'),
(7, 'emp-rbggr4lg-vsgftgku', '74593750k', 'Faruk Haidar', 2, 1, '1970-01-01', 'No', 'Nasir Uddin', 'Ojefa Akter', 'Islam', '01/07/1993', 'Bangladesh', 'A(-ve)', 'Married', 'Male', 'kkkkkk ijhk khkj k', 'jkgk jhgmhmhm', NULL, NULL, NULL, 'uploads/employee/Employee_1601448484.jpg', NULL, NULL, NULL, 1, '2020-09-30 06:48:04', '2020-09-30 06:48:04'),
(8, 'emp-vlju3jee-klis0w1g', '5465568764pl', 'Faruk Haidar BD', 3, 1, '2020-09-11', 'No', 'Towhid Mia', 'Ojefa Akter', 'Islam', '09/10/2020', 'Bangladesh', 'B(+ve)', 'Divorced', 'Male', 'dsvsdfgsd', 'v sdvsdv sdfvdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-30 06:50:13', '2020-09-30 06:50:13');

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
(40, 4, 2, '2020-02-07', NULL, NULL, 'Absent', NULL, NULL, 1, '2020-10-01 11:36:20', '2020-10-01 11:36:32');

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
(2, 'Resigned', 1, '2020-09-08 05:55:23', '2020-09-08 05:55:23'),
(3, 'Left', 1, '2020-09-08 05:55:32', '2020-09-08 05:55:32');

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
(1, 'Pickshop', NULL, 'Web Developer', 'dasdas ddsvsdfagsdg', '2020-05-29', '2020-05-25', '1', 'experience-vnlcwrph-fecjabcr', '2020-09-29 09:06:29', '2020-09-29 09:17:11'),
(2, 'Faruk Haidar BD', NULL, 'Web Developer', 'cskjsdfsdkvlsd sdvksdls dosdjsd nsovsovpsdnvns vsod vsodpv skodpvoskpvo', '2020-05-30', '2020-05-10', '0', 'experience-xxxm4dzs-tijphqbq', '2020-09-29 09:24:57', '2020-09-29 09:25:04'),
(3, 'PickshopBD', 1, 'Web Developer', 'hjfjaks a kjaf jsadas sdjsd sdjcsdcsdjcskdjcsdjcsdclksc skcscjksjcksjck', '2020-06-22', '2020-06-30', '1', 'experience-r2juaoiy-5ilkzpxl', '2020-09-30 12:37:59', '2020-09-30 12:54:33'),
(4, 'Farukhaidarbd', 1, 'Web Developer', 'jsdkhaska skcjahsfkajhksfsjfkajs', '2020-07-04', '2020-06-11', '1', 'experience-voyssdnw-dopidzjo', '2020-09-30 12:40:33', '2020-09-30 12:40:33');

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
(1, 'My mother was very that\'s why i leave for one day', 'holiday-0nqeodnv-ygbu8bct', '2020-04-13 00:00:00', 'My mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one dayMy mother was very that\'s why i leave for one day', '1', '2020-09-27 12:41:39', '2020-09-27 12:41:39'),
(2, 'ffffffffffffffffffffffsdvv fsdvsdfgdfgdf', 'holiday-0uqn5jxy-tjizoscd', '2020-04-13 00:00:00', 'afasfafafafafaf', '1', '2020-09-27 19:08:16', '2020-09-27 19:10:58'),
(3, 'dfgdfgdfgdg', 'holiday-w7li3cfi-mblefdvq', '12/12/2020', 'ggdfg', '1', '2020-09-27 19:25:17', '2020-09-27 19:25:17');

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
(2, 'Monthly Leave', 'leave-qjyhdl8a-rzrsjlir', '9', '0', '2020-09-27 11:38:35', '2020-09-27 12:02:30');

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
(37, '2020_09_29_163225_create_provident_funds_table', 26);

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `country`, `rank`, `details`, `address`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Daffodil International University.', 3, '10', 'qwqwqwqw qw q1', 'trt rtrt rt rtr tr t1', 'university_1_1593772912.png', 'U205efecec876a7b', 1, '2020-07-03 06:23:04', '2020-07-03 10:41:52'),
(2, 'State University', 2, '12', '....', '......', NULL, 'U205f005a6d70314', 1, '2020-07-04 10:31:09', NULL);

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
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_wise_programs`
--

INSERT INTO `university_wise_programs` (`id`, `university`, `category`, `program`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '2020-07-04 10:29:39', NULL),
(2, 1, 1, 2, 1, '2020-07-04 10:34:46', NULL),
(3, 1, 2, 3, 1, '2020-07-04 10:52:57', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saidul Islam Uzzal', 'uzzalbd.creative@gmail.com', NULL, '$2y$10$ANN9jJHvP5q4LWT3fQySsOIYyYc6EUEf/V2S/HSuxQG/QPn4cgv3.', 'Ie5WRYsmCSHelF8lwUPFRIkkgAuq5byPzbArRG2mrnrzdJ7URoU3JPgi7pHD', '2020-06-28 02:23:05', '2020-06-28 02:23:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
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
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `provident_funds`
--
ALTER TABLE `provident_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `employee_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employee_leaves_leave_id_foreign` FOREIGN KEY (`leave_id`) REFERENCES `leaves` (`id`);

--
-- Constraints for table `resignations`
--
ALTER TABLE `resignations`
  ADD CONSTRAINT `resignations_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `resignations_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `terminations`
--
ALTER TABLE `terminations`
  ADD CONSTRAINT `terminations_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `terminations_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
